<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriApiController extends Controller
{
    public function getImageUrl(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'category-image' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/category-image'), $imageName);
            $imageUrl = 'upload/category-image/' . $imageName;
        } else {
            $imageUrl = null;
        }

        return $imageUrl;
    }
    public function categoryStore(Request $request)
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

                $categoryData = [
                    'name' => $request->input('name'),
                    'image' => $imageUrl,
                ];


                if ($request->has('description')) {
                    $categoryData['description'] = $request->input('description');
                }

                if ($request->has('status')) {
                    $categoryData['status'] = $request->input('status');
                }

                $category = Category::create($categoryData);

                return response()->json([
                    'status' => 201,
                    'message' => 'Category created successfully',
                    'data' => $category,
                ], 201);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Category could not be created',
                    'error' => $e->getMessage(),
                ], 500);
            }
        }
    }


}
