<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\ApiHelper;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\Facility;

class FasilityController extends Controller
{
    public function __construct()
    {
        $this->apiHelper = new ApiHelper();
    }

    public function get_fasiliti(Request $request)
    {
        $data = Facility::all();
        return $this->apiHelper->resp([
            'fasiliti' => $data
        ]);
    }

    public function add_fasiliti(Request $request)
    {
        $receivedData = json_decode($request->getContent(), true);

        $requiredFields = ['name', 'description', 'location', 'image_base64', 'is_available'];
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

        Storage::disk('public')->put('fasiliti/'.$imageName, $imageData);

        $facility = new Facility();
        $facility->name = $receivedData['name'];
        $facility->description = $receivedData['description'];
        $facility->location = $receivedData['location'];
        $facility->image_path = 'fasiliti/'.$imageName;
        $facility->is_available = $receivedData['is_available'] == "true" ? 1 : 0;
        $facility->save();

        return $this->apiHelper->resp([
            'message' => 'Facility added successfully',
            'facility' => $facility
        ], 201);
    }

    public function delete_fasiliti(Request $request, $id)
    {
        $facility = Facility::find($id);
        if (!$facility) {
            return $this->apiHelper->resp([
                'error' => 'Facility not found'
            ], 404);
        }

        // Delete the image file if it exists
        if ($facility->image_path && Storage::disk('public')->exists($facility->image_path)) {
            Storage::disk('public')->delete($facility->image_path);
        }

        $facility->delete();

        return $this->apiHelper->resp([
            'message' => 'Facility deleted successfully'
        ]);
    }

    public function update_fasiliti(Request $request, $id)
    {
        $facility = Facility::find($id);
        if (!$facility) {
            return $this->apiHelper->resp([
                'error' => 'Facility not found'
            ], 404);
        }

        $receivedData = json_decode($request->getContent(), true);

        // Update fields if they are provided
        if (isset($receivedData['name'])) {
            $facility->name = $receivedData['name'];
        }
        if (isset($receivedData['description'])) {
            $facility->description = $receivedData['description'];
        }
        if (isset($receivedData['location'])) {
            $facility->location = $receivedData['location'];
        }
        if (isset($receivedData['is_available'])) {
            $facility->is_available = $receivedData['is_available'] == "true" ? 1 : 0;
        }
        if (isset($receivedData['image_base64'])) {
            // Delete old image
            if ($facility->image_path && Storage::disk('public')->exists($facility->image_path)) {
                Storage::disk('public')->delete($facility->image_path);
            }

            // Save new image
            $base64 = $receivedData['image_base64'];
            $imageData = base64_decode($base64);
            $imageName = uniqid().'.png';
            Storage::disk('public')->put('fasiliti/'.$imageName, $imageData);
            $facility->image_path = 'fasiliti/'.$imageName;
        }

        $facility->save();

        return $this->apiHelper->resp([
            'message' => 'Facility updated successfully',
            'facility' => $facility
        ]);
    }
}
