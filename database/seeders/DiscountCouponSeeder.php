<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DiscountCouponSeeder extends Seeder
{
    public function run()
    {
        $coupons = [
            [
                'title' => 'Welcome Discount',
                'code' => 'WELCOME10',
                'discount' => 10,
                'discount_type' => 'percent',
                'used_limit' => 100,
                'is_unlimited' => 0,
            ],
            [
                'title' => 'Save $5',
                'code' => 'SAVE5',
                'discount' => 5,
                'discount_type' => 'flat',
                'used_limit' => 50,
                'is_unlimited' => 0,
            ],
            [
                'title' => 'Mega Sale',
                'code' => 'MEGA20',
                'discount' => 20,
                'discount_type' => 'percent',
                'used_limit' => 30,
                'is_unlimited' => 0,
            ],
            [
                'title' => 'First Time Buyer',
                'code' => 'FIRSTBUY',
                'discount' => 15,
                'discount_type' => 'percent',
                'used_limit' => 200,
                'is_unlimited' => 0,
            ],
            [
                'title' => 'VIP Discount',
                'code' => 'VIP50',
                'discount' => 50,
                'discount_type' => 'percent',
                'used_limit' => 10,
                'is_unlimited' => 0,
            ],
            [
                'title' => 'Unlimited Discount',
                'code' => 'UNLIMITED5',
                'discount' => 5,
                'discount_type' => 'percent',
                'used_limit' => 0,
                'is_unlimited' => 1,
            ],
        ];

        foreach ($coupons as $couponData) {
            Coupon::updateOrCreate(
                ['code' => $couponData['code']],
                [
                    'title' => $couponData['title'],
                    'discount' => $couponData['discount'],
                    'discount_type' => $couponData['discount_type'],
                    'used_limit' => $couponData['used_limit'],
                    'is_unlimited' => $couponData['is_unlimited'],
                    'total_use' => 0,
                    'status' => 1,
                    'start_date' => now(),
                    'end_date' => now()->addMonths(6),
                    'top_up_list' => null,
                    'card_list' => null,
                ]
            );

            $this->command->info("Created coupon: {$couponData['code']} - {$couponData['title']}");
        }

        $this->command->info("\n✓ Successfully seeded discount coupons!");
    }
}
