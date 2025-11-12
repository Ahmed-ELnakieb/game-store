<?php


namespace App\Traits;

use App\Jobs\CodeSendBuyer;
use App\Jobs\UserTrackingJob;
use App\Models\Campaign;
use App\Models\Collection;
use App\Models\Deposit;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\TopUp;
use App\Models\TopUpService;
use App\Models\Transaction;
use Carbon\Carbon;
use http\Env\Response;

trait MakeOrder
{
    use Notify;

    public function orderCreate($totalAmount, $orderFor, $info = null, $orderInterface = 'WEB', $user = null)
    {
        $order = Order::create([
            'user_id' => ($orderInterface == 'API') ? $user->id : auth()->id(),
            'amount' => $totalAmount,
            'info' => $info,
            'payment_status' => 0,
            'status' => 0,
            'order_for' => $orderFor,
            'utr' => 'O' . strRandom(),
            'order_interface' => $orderInterface,
        ]);

        return $order;
    }

    public function orderDetailsCreate($order, $services, $model, $quantities = []): void
    {
        if (!$services instanceof \Illuminate\Support\Collection) {
            $services = collect([$services]);
        }
        $orderDetails = [];
        foreach ($services as $key => $service) {
            // Handle new pricing structure
            $quantityData = isset($order->order_interface) && $order->order_interface === 'API'
                ? ($quantities[$key] ?? 1)
                : ($quantities[$service->id] ?? 1);
            
            $qty = is_array($quantityData) ? ($quantityData['quantity'] ?? 1) : $quantityData;
            $pricingId = is_array($quantityData) ? ($quantityData['pricing_id'] ?? null) : null;
            $durationId = is_array($quantityData) ? ($quantityData['duration_id'] ?? null) : null;
            
            // Calculate price and discount based on pricing if available
            if ($pricingId) {
                $pricing = \App\Models\ServicePricing::find($pricingId);
                if ($pricing) {
                    $price = $pricing->price;
                    $discount = 0;
                    if ($pricing->discount > 0) {
                        if ($pricing->discount_type == 'percentage') {
                            $discount = ($pricing->discount * $pricing->price) / 100;
                        } else {
                            $discount = $pricing->discount;
                        }
                    }
                } else {
                    $price = $service->price;
                    $discount = $service->getDiscount();
                }
            } else {
                $price = $service->price;
                $discount = $service->getDiscount();
            }
            
            $orderDetails[] = [
                'user_id' => $order->user_id,
                'order_id' => $order->id,
                'parent_id' => $model == TopUpService::class ? $service->top_up_id : $service->card_id,
                'detailable_type' => $model,
                'detailable_id' => $service->id,
                'pricing_id' => $pricingId,
                'duration_id' => $durationId,
                'name' => $service->name,
                'image' => $service->image,
                'image_driver' => $service->image_driver,
                'price' => $price,
                'discount' => $discount,
                'qty' => $qty,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        OrderDetail::insert($orderDetails);
    }

    public function depositCreate($checkAmountValidate, $depositableType = null, $depositableId = null)
    {
        $deposit = Deposit::create([
            'user_id' => auth()->id(),
            'payment_method_id' => $checkAmountValidate['gateway_id'],
            'payment_method_currency' => $checkAmountValidate['currency'],
            'amount' => $checkAmountValidate['amount'],
            'amount_in_base' => $checkAmountValidate['payable_amount_baseCurrency'],
            'percentage_charge' => $checkAmountValidate['percentage_charge'],
            'fixed_charge' => $checkAmountValidate['fixed_charge'],
            'charge' => $checkAmountValidate['charge'],
            'payable_amount' => $checkAmountValidate['payable_amount'],
            'status' => 0,
            'depositable_type' => $depositableType,
            'depositable_id' => $depositableId,
        ]);

        return $deposit;
    }

    public function orderCompleteAction($order, $deposit): void
    {
        $order->payment_status = 1;
        $order->payment_method_id = $deposit->payment_method_id;
        $order->save();

        $this->increaseCampaignSell($order);

        if ($order->coupon_id) {
            $coupon = $order->coupon;
            $coupon->total_use += 1;
            $coupon->save();
        }

        $this->newTransaction($order->user_id, $order->amount, $this->getRemark($order), '-', $order->id, Order::class);
        $this->notifyToAll($deposit);

        if ($order->order_for == 'card') {
            $basicControl = basicControl();
            
            // Check if we should use queue or execute directly
            if ($basicControl->use_queue_for_orders) {
                // Use queue (async)
                dispatch(new CodeSendBuyer($order));
            } else {
                // Execute directly (sync)
                $this->processOrderDirectly($order);
            }
        }

        UserTrackingJob::dispatch($order->user_id, request()->ip(), $this->getRemark($order));
    }

    protected function processOrderDirectly($order): void
    {
        $basicControl = basicControl();
        
        // Check if auto-complete is enabled
        if (!$basicControl->auto_complete_orders) {
            // If disabled, just mark order as pending (status = 0)
            $order->status = 0;
            $order->save();
            return;
        }
        
        // Auto-complete is enabled, assign codes immediately
        try {
            \DB::beginTransaction();
            
            $orderStatus = 1;
            foreach ($order->orderDetails as $detail) {
                $service = $detail->detailable;
                if (!$service) {
                    continue;
                }

                // Get available codes for this service and duration
                $codeLists = \App\Models\Code::where('codeable_type', \App\Models\CardService::class)
                    ->where('codeable_id', $service->id)
                    ->where('duration_id', $detail->duration_id)
                    ->where('status', 1)
                    ->take($detail->qty)
                    ->get();
                    
                $sendCodeList = $codeLists->pluck('passcode');
                $stock_short = max(0, $detail->qty - count($sendCodeList));

                $detail->card_codes = json_encode($sendCodeList->toArray());
                $detail->stock_short = $stock_short;
                $detail->status = ($stock_short == 0) ? 1 : 3;
                $detail->save();

                if ($stock_short) {
                    $orderStatus = 3;
                }

                // Mark codes as sold and assign to user with expiration
                foreach ($codeLists as $code) {
                    $code->status = 0; // Mark as sold
                    $code->user_id = $order->user_id;
                    $code->activated_at = now();
                    
                    // Set expiration based on duration
                    if ($code->duration) {
                        $code->expires_at = now()->addDays($code->duration->days);
                    }
                    
                    $code->save();
                }

                // Update sell count
                $card = $service->card()->select(['id', 'sell_count'])->first();
                if ($card) {
                    $card->sell_count += 1;
                    $card->save();
                }
            }

            $order->status = $orderStatus;
            $order->save();
            
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            // Log error but don't fail the payment
            \Log::error('Order auto-complete failed: ' . $e->getMessage());
        }
    }

    public function increaseCampaignSell($order): void
    {
        $oderDetails = $order->orderDetails;
        if (!empty($oderDetails)) {
            foreach ($oderDetails as $detail) {
                $service = $detail->detailable;

                $campaign = Campaign::firstOrNew();
                if ($service->is_offered && $campaign->status && $campaign->start_date <= Carbon::now() &&
                    $campaign->end_date >= Carbon::now()) {
                    $service->offered_sell += 1;
                    $service->save();
                }
            }
        }
    }

    public function newTransaction($userId, $amount, $remark, $trxType = '+', $transactionalId = null, $transactionalType = null): void
    {
        $transaction = new Transaction();
        $transaction->transactional_id = $transactionalId;
        $transaction->transactional_type = $transactionalType;
        $transaction->user_id = $userId;
        $transaction->amount_in_base = $amount;
        $transaction->trx_type = $trxType;
        $transaction->trx_id = strRandom();
        $transaction->remarks = $remark;
        $transaction->save();
    }

    public function notifyToAll($deposit): void
    {
        $basicControl = basicControl();
        try {
            $params = [
                'amount' => getAmount($deposit->amount_in_base, $basicControl->fraction_number),
                'currency' => $basicControl->currency_symbol,
                'gateway' => $deposit->gateway?->name ?? 'Wallet',
                'transaction' => $deposit->trx_id,
            ];

            $action = [
                "link" => route('user.fund.index'),
                "icon" => "fa fa-money-bill-alt text-white"
            ];

            $this->sendMailSms($deposit->user, 'BUYER_PAYMENT', $params);
            $this->userPushNotification($deposit->user, 'BUYER_PAYMENT', $params, $action);
            $this->userFirebasePushNotification($deposit->user, 'BUYER_PAYMENT', $params);

            $adminParams = [
                'username' => optional($deposit->user)->username ?? null,
                'amount' => getAmount($deposit->amount_in_base, $basicControl->fraction_number),
                'currency' => $basicControl->currency_symbol,
                'gateway' => $deposit->gateway->name ?? null,
                'transaction' => $deposit->trx_id,
            ];

            $adminAction = [
                "name" => optional($deposit->user)->firstname . ' ' . optional($deposit->user)->lastname,
                "image" => getFile(optional($deposit->user)->image_driver, optional($deposit->user)->image),
                "link" => route('admin.payment.log'),
                "icon" => "fas fa-ticket-alt text-white"
            ];

            $this->adminMail('BUYER_PAYMENT_ADMIN', $adminParams);
            $this->adminPushNotification('BUYER_PAYMENT_ADMIN', $adminParams, $adminAction);
            $this->adminFirebasePushNotification('BUYER_PAYMENT_ADMIN', $adminAction);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function getRemark($order)
    {
        $paymentMethod = $this->getPaymentMethod($order);

        switch ($order->order_for) {
            case 'topup':
                return $this->generateRemark('Direct Top Up', $paymentMethod);
            case 'card':
                return $this->generateRemark('Card', $paymentMethod);
            default:
                return 'Unknown order type';
        }
    }

    protected function getPaymentMethod($order)
    {
        return $order->payment_method_id == '-1' ? 'Wallet' : $order->gateway?->name;
    }

    protected function generateRemark($orderType, $paymentMethod)
    {
        return "Payment For $orderType Via $paymentMethod";
    }

    public function payByWallet($order, $user = null)
    {

        try {
            if (!$user) {
                $user = $order->user()->select(['id', 'firstname', 'lastname', 'balance'])->first();
            }
            if (!$user) {
                return [
                    'status' => false,
                    'message' => 'User not found',
                ];
            }
            if ($user->balance < $order->amount) {
                return [
                    'status' => false,
                    'message' => 'You have sufficient balance to order',
                ];
            }

            $user->balance -= $order->amount;
            $user->save();

            $deposit = new Deposit();
            $deposit->user_id = $user->id;
            $deposit->payment_method_id = -1;
            $deposit->payment_method_currency = basicControl()->base_currency;
            $deposit->amount = $order->amount;
            $deposit->amount_in_base = $order->amount;
            $deposit->percentage_charge = 0;
            $deposit->fixed_charge = 0;
            $deposit->charge = 0;
            $deposit->payable_amount = $order->amount;
            $deposit->trx_id = strRandom();
            $deposit->status = 0;
            $deposit->depositable_type = null;
            $deposit->depositable_id = null;

            $this->orderCompleteAction($order, $deposit);

            return [
                'status' => true
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
}
