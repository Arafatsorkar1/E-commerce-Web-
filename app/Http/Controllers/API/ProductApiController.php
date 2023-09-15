<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{


    public function productStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'brand_id' => 'required|exists:brands,id',
            'unit_id' => 'required|exists:units,id',
            'name' => 'required',
            'code' => 'nullable',
            'model' => 'nullable',
            'stock_amount' => 'required|numeric',
            'regular_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'short_description' => 'required',
            'long_description' => 'nullable',
            'status' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            try {
                $imageUrl = $this->getImageUrl($request);

                $product = Product::create([
                    'category_id' => $request->input('category_id'),
                    'sub_category_id' => $request->input('sub_category_id'),
                    'brand_id' => $request->input('brand_id'),
                    'unit_id' => $request->input('unit_id'),
                    'name' => $request->input('name'),
                    'code' => $request->input('code'),
                    'model' => $request->input('model'),
                    'stock_amount' => $request->input('stock_amount'),
                    'regular_price' => $request->input('regular_price'),
                    'selling_price' => $request->input('selling_price'),
                    'short_description' => $request->input('short_description'),
                    'long_description' => $request->input('long_description'),
                    'status' => $request->input('status'),
                    'image' => $imageUrl,
                ]);

                return response()->json([
                    'status' => 201,
                    'message' => 'Product created successfully',
                    'data' => $product,
                ], 201);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Product could not be created',
                    'error' => $e->getMessage(),
                ], 500);
            }
        }
    }
}
