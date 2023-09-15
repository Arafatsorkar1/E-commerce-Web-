<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandApiController extends Controller
{
    public function getImageUrl(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'brand-image' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/brand-image'), $imageName);
            $imageUrl = 'upload/brand-image/' . $imageName;
        } else {
            $imageUrl = null;
        }

        return $imageUrl;
    }

    public function brandStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'nullable',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            try {
                $imageUrl = $this->getImageUrl($request);

                $brandData = [
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'status' => $request->input('status'),
                    'image' => $imageUrl,
                ];

                $brand = Brand::create($brandData);

                return response()->json([
                    'status' => 201,
                    'message' => 'Brand created successfully',
                    'data' => $brand,
                ], 201);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Brand could not be created',
                    'error' => $e->getMessage(),
                ], 500);
            }
        }
    }
}
