<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gateway;
use App\Traits\Upload;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Exception;

class ManualGatewayController extends Controller
{
    use Upload;

    public function index()
    {
        $data['methods'] = Gateway::manual()->orderBy('sort_by', 'asc')->get();
        return view('admin.payment_methods.manual.list', $data);
    }

    public function create()
    {
        $data['basicControl'] = basicControl();
        return view('admin.payment_methods.manual.create', $data);
    }

    public function store(Request $request)
    {

        $rules = [
            'name' => "required|min:3",
            'description' => 'required|string|min:3',
            'note' => 'required|string|min:3',
            'manual_gateway_status' => "nullable|integer|in:0,1",
            'field_name.*' => 'required|string',
            'input_type.*' => 'required|in:text,textarea,file,date,number',
            'is_required.*' => 'required|in:required,optional',
            'receivable_currencies' => 'required|array',
            'receivable_currencies.*.currency' => 'required|string|max:255|regex:/^[A-Z\s]+$/',
            'receivable_currencies.*.conversion_rate' => 'required|numeric',
            'receivable_currencies.*.min_limit' => 'required|numeric',
            'receivable_currencies.*.max_limit' => 'required|numeric',
            'receivable_currencies.*.percentage_charge' => 'required|numeric',
            'receivable_currencies.*.fixed_charge' => 'required|numeric',
            'image' => 'required|mimes:png,jpeg,gif|max:10240',
        ];

        $customMessages = [
            'note.required' => 'The payment description field is required.',
            'field_name.*.required' => 'The form label field is required.',
            'input_type.*.required' => 'The input type field is required.',
            'is_required.*.required' => 'The required field is required.',
            'input_type.*.in' => 'The Input type is invalid.',
            'is_required.*.in' => 'The required value is invalid.',
            'receivable_currencies.*.currency.required' => 'The receivable currency currency symbol field is required.',
            'receivable_currencies.*.conversion_rate.required' => 'The receivable currency convention rate field is required.',
            'receivable_currencies.*.conversion_rate.numeric' => 'The convention rate for receivable currency must be a number.',
            'receivable_currencies.*.min_limit.required' => 'The receivable currency min limit field is required.',
            'receivable_currencies.*.min_limit.numeric' => 'The min limit for receivable currency must be a number.',
            'receivable_currencies.*.max_limit.required' => 'The receivable currency max limit field is required.',
            'receivable_currencies.*.max_limit.numeric' => 'The max limit for receivable currency must be a number.',
            'receivable_currencies.*.percentage_charge.required' => 'The receivable currency percentage charge field is required.',
            'receivable_currencies.*.percentage_charge.numeric' => 'The percentage charge for receivable currency must be a number.',
            'receivable_currencies.*.fixed_charge.required' => 'The receivable currency fixed charge name is required.',
            'receivable_currencies.*.fixed_charge.numeric' => 'The fixed charge for receivable currency must be a number.',
        ];


        $input_form = [];
        if ($request->has('field_name')) {
            for ($a = 0; $a < count($request->field_name); $a++) {
                $arr = array();
                $arr['field_name'] = clean($request->field_name[$a]);
                $arr['field_label'] = $request->field_name[$a];
                $arr['type'] = $request->input_type[$a];
                $arr['validation'] = $request->is_required[$a];
                $input_form[$arr['field_name']] = $arr;
            }
        }

        if ($request->hasFile('image')) {
            try {
                $image = $this->fileUpload($request->image, config('filelocation.gateway.path'), null, null, 'webp', 60);
                if ($image) {
                    $gatewayImage = $image['path'];
                    $driver = $image['driver'];
                }
            } catch (\Exception $exp) {
                return back()->with('alert', 'Image could not be uploaded.');
            }
        }

        // Handle instruction images upload
        $instructionImages = [];
        if ($request->hasFile('instruction_images')) {
            foreach ($request->file('instruction_images') as $instructionImage) {
                if ($instructionImage) {
                    try {
                        $uploaded = $this->fileUpload($instructionImage, config('filelocation.gateway.path'), null, null, 'webp', 60);
                        if ($uploaded) {
                            $instructionImages[] = $uploaded['path'];
                        }
                    } catch (\Exception $exp) {
                        // Continue with other images if one fails
                    }
                }
            }
        }

        $request->validate($rules, $customMessages);

        $collection = collect($request->receivable_currencies);
        $supportedCurrency = $collection->pluck('currency')->all();
        
        // Prepare extra parameters with instruction images
        $extraParameters = [];
        if (!empty($instructionImages)) {
            $extraParameters['instruction_images'] = $instructionImages;
        }
        
        $response = Gateway::create([
            'name' => $request->name,
            'code' => Str::slug($request->name),
            'supported_currency' => $supportedCurrency,
            'receivable_currencies' => $request->receivable_currencies,
            'parameters' => $input_form,
            'extra_parameters' => !empty($extraParameters) ? json_encode($extraParameters) : null,
            'image' => $gatewayImage ?? null,
            'driver' => $driver ?? null,
            'status' => $request->status,
            'note' => $request->note,
            'description' => $request->description
        ]);

        if (!$response) {
            throw new \Exception('Unexpected error! Please try again.');
        }

        return back()->with('success', 'Gateway data has been add successfully.');

    }

    public function edit($id)
    {
        $data['basicControl'] = basicControl();
        $data['method'] = Gateway::where('id', $id)->firstOr(function () {
            throw new Exception("Invalid Gateways Request");
        });
        return view('admin.payment_methods.manual.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $rules = [
            'name' => "required|min:3|unique:gateways,name," . $id,
            'description' => 'required|string|min:3',
            'note' => 'required|string|min:3',
            'manual_gateway_status' => "nullable|integer|in:0,1",
            'field_name.*' => 'required|string',
            'input_type.*' => 'required|in:text,textarea,file,date,number',
            'is_required.*' => 'required|in:required,optional',
            'receivable_currencies' => 'required|array',
            'receivable_currencies.*.currency' => 'required|string|max:255|regex:/^[A-Z\s]+$/',
            'receivable_currencies.*.conversion_rate' => 'required|numeric',
            'receivable_currencies.*.min_limit' => 'required|numeric',
            'receivable_currencies.*.max_limit' => 'required|numeric',
            'receivable_currencies.*.percentage_charge' => 'required|numeric',
            'receivable_currencies.*.fixed_charge' => 'required|numeric',
            'image' => 'nullable|mimes:png,jpeg,gif|max:10240',
        ];

        $customMessages = [
            'note.required' => 'The payment description field is required.',
            'field_name.*.required' => 'The form label field is required.',
            'input_type.*.required' => 'The input type field is required.',
            'is_required.*.required' => 'The required field is required.',
            'input_type.*.in' => 'The Input type is invalid.',
            'is_required.*.in' => 'The required value is invalid.',
            'receivable_currencies.*.currency.required' => 'The receivable currency currency symbol field is required.',
            'receivable_currencies.*.conversion_rate.required' => 'The receivable currency convention rate field is required.',
            'receivable_currencies.*.conversion_rate.numeric' => 'The convention rate for receivable currency must be a number.',
            'receivable_currencies.*.min_limit.required' => 'The receivable currency min limit field is required.',
            'receivable_currencies.*.min_limit.numeric' => 'The min limit for receivable currency must be a number.',
            'receivable_currencies.*.max_limit.required' => 'The receivable currency max limit field is required.',
            'receivable_currencies.*.max_limit.numeric' => 'The max limit for receivable currency must be a number.',
            'receivable_currencies.*.percentage_charge.required' => 'The receivable currency percentage charge field is required.',
            'receivable_currencies.*.percentage_charge.numeric' => 'The percentage charge for receivable currency must be a number.',
            'receivable_currencies.*.fixed_charge.required' => 'The receivable currency fixed charge name is required.',
            'receivable_currencies.*.fixed_charge.numeric' => 'The fixed charge for receivable currency must be a number.',
        ];


        $gateway = Gateway::where('id', $id)->firstOr(function () {
            throw new Exception("Invalid Gateways Request");
        });

        if (1000 > $gateway->id) {
            return back()->with('error', 'Invalid Gateways Request');
        }


        $input_form = [];
        if ($request->has('field_name')) {
            for ($a = 0; $a < count($request->field_name); $a++) {
                $arr = array();
                $arr['field_name'] = clean($request->field_name[$a]);
                $arr['field_label'] = $request->field_name[$a];
                $arr['type'] = $request->input_type[$a];
                $arr['validation'] = $request->is_required[$a];
                $input_form[$arr['field_name']] = $arr;
            }
        }

        $request->validate($rules, $customMessages);

        if ($request->hasFile('image')) {
            try {
                $image = $this->fileUpload($request->image, config('filelocation.gateway.path'), null, null, 'webp', 60, $gateway->image, $gateway->driver);
                if ($image) {
                    $gatewayImage = $image['path'];
                    $driver = $image['driver'];
                }
            } catch (\Exception $exp) {
                return back()->with('alert', 'Image could not be uploaded.');
            }
        }

        // Handle instruction images upload
        $existingExtraParams = json_decode($gateway->extra_parameters ?? '{}', true);
        $existingInstructionImages = $existingExtraParams['instruction_images'] ?? [];
        $instructionImages = $existingInstructionImages;
        
        if ($request->hasFile('instruction_images')) {
            $instructionImages = [];
            foreach ($request->file('instruction_images') as $index => $instructionImage) {
                if ($instructionImage) {
                    try {
                        // Delete old image if exists
                        $oldImage = $existingInstructionImages[$index] ?? null;
                        $uploaded = $this->fileUpload($instructionImage, config('filelocation.gateway.path'), null, null, 'webp', 60, $oldImage, $gateway->driver);
                        if ($uploaded) {
                            $instructionImages[] = $uploaded['path'];
                        }
                    } catch (\Exception $exp) {
                        // Keep existing image if upload fails
                        if (isset($existingInstructionImages[$index])) {
                            $instructionImages[] = $existingInstructionImages[$index];
                        }
                    }
                } else {
                    // Keep existing image if no new upload
                    if (isset($existingInstructionImages[$index])) {
                        $instructionImages[] = $existingInstructionImages[$index];
                    }
                }
            }
        }

        $collection = collect($request->receivable_currencies);
        $supportedCurrency = $collection->pluck('currency')->all();

        // Prepare extra parameters with instruction images
        $extraParameters = $existingExtraParams;
        if (!empty($instructionImages)) {
            $extraParameters['instruction_images'] = $instructionImages;
        }

        $response = $gateway->update([
            'name' => $request->name,
            'supported_currency' => $supportedCurrency,
            'receivable_currencies' => $request->receivable_currencies,
            'parameters' => $input_form,
            'extra_parameters' => !empty($extraParameters) ? json_encode($extraParameters) : $gateway->extra_parameters,
            'image' => $gatewayImage ?? $gateway->image,
            'driver' => $driver ?? $gateway->driver,
            'status' => $request->manual_gateway_status,
            'note' => $request->note,
            'description' => $request->description
        ]);

        if (!$response) {
            throw new Exception('Unexpected error! Please try again.');
        }

        return back()->with('success', 'Gateway data has been updated.');

    }

}
