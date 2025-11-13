<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Vendor as bizhub;
use App\ApiHelper;

class BizHubController extends Controller
{
    public function __construct()
    {
        $this->apiHelper = new ApiHelper();
    }

    public function get_bizhub(Request $request)
    {
        $data = bizhub::all();
        return $this->apiHelper->resp([
            'bizhub' => $data
        ]);
    }

    public function add_bizhub(Request $request)
    {
        $receivedData = json_decode($request->getContent(), true);

        $requiredFields = ['name', 'phone_number', 'service', 'location', 'operation_time', 'image_base64', 'status'];
        $fieldCheck = $this->apiHelper->fieldChecker($receivedData, $requiredFields);

        if ($fieldCheck) {
            return $this->apiHelper->resp([
                'error' => $fieldCheck['error'],
                'missing_fields' => $fieldCheck['missing_fields']
            ], 400);
        }

        $base64 = $receivedData['image_base64'];
        $imageData = base64_decode($base64);
        
        $imageName = uniqid().'.png';

        Storage::disk('public')->put('bizhub/'.$imageName, $imageData);

        $vendor = new bizhub();
        $vendor->name = $receivedData['name'];
        $vendor->phone_number = $receivedData['phone_number'];
        $vendor->service = $receivedData['service'];
        $vendor->location = $receivedData['location'];
        $vendor->operation_time = $receivedData['operation_time'];
        $vendor->image_path = '/storage/bizhub/'.$imageName;
        $vendor->status = $receivedData['status'];
        $vendor->save();

        return $this->apiHelper->resp([
            'message' => 'BizHub vendor added successfully',
            'vendor' => $vendor
        ]);
    }

    public function get_specific_bizhub($id)
    {
        $vendor = bizhub::find($id);
        if (!$vendor) {
            return $this->apiHelper->resp([
                'error' => 'Vendor not found'
            ], 404);
        }

        return $this->apiHelper->resp([
            'vendor' => $vendor
        ]);
    }

    public function update_bizhub(Request $request, $id)
    {
        $vendor = bizhub::find($id);
        if (!$vendor) {
            return $this->apiHelper->resp([
                'error' => 'Vendor not found'
            ], 404);
        }

        $receivedData = json_decode($request->getContent(), true);

        foreach ($receivedData as $key => $value) {
            if ($key === 'image_base64') {
                $base64 = $value;
                $imageData = base64_decode($base64);
                
                $imageName = uniqid().'.png';
                Storage::disk('public')->put('bizhub/'.$imageName, $imageData);
                $vendor->image_path = '/storage/bizhub/'.$imageName;
            } else {
                $vendor->$key = $value;
            }
        }

        $vendor->save();

        return $this->apiHelper->resp([
            'message' => 'BizHub vendor updated successfully',
            'vendor' => $vendor
        ]);
    }

    public function delete_bizhub(Request $request, $id)
    {
        $vendor = bizhub::find($id);
        if (!$vendor) {
            return $this->apiHelper->resp([
                'error' => 'Vendor not found'
            ], 404);
        }

        $vendor->delete();

        return $this->apiHelper->resp([
            'message' => 'BizHub vendor deleted successfully'
        ]);
    }
}
