<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoriApiController extends Controller
{
    public function getImageUrl(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'subcategory-image' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/subcategory-image'), $imageName);
            $imageUrl = 'upload/subcategory-image/' . $imageName;
        } else {
            $imageUrl = null;
        }

        return $imageUrl;
    }

    public function subCategoryStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
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

                $subcategoryData = [
                    'category_id' => $request->input('category_id'),
                    'name' => $request->input('name'),
                    'image' => $imageUrl,
                ];

                if ($request->has('description')) {
                    $subcategoryData['description'] = $request->input('description');
                }

                if ($request->has('status')) {
                    $subcategoryData['status'] = $request->input('status');
                }

                $subcategory = SubCategory::create($subcategoryData);
//                SubCategory::create([
//                    'category_id' => $request->input('category_id'),
//                    'name' => $request->input('name'),
//                    'description' => $request->input('description'),
//                    'status' => $request->input('status'),
//                ]);

                return response()->json([
                    'status' => 201,
                    'message' => 'SubCategory created successfully',
                    'data' => $subcategory,
                ], 201);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 500,
                    'message' => 'SubCategory could not be created',
                    'error' => $e->getMessage(),
                ], 500);
            }
        }
    }
}
