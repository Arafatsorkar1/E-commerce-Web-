<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.product.index', [
            'categories'        => Category::all(),
            'subCategories'     => SubCategory::all(),
            'brands'            => Brand::all(),
            'units'             => Unit::all(),
        ]);
    }

    public function getSubcategoryByCategory()
    {

        return response()->json(SubCategory::where('category_id', $_GET['id'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'This field cannot be empty'
        ]);

        $product = Product::storeProduct($request);
        $otherImage = OtherImage::otherImage($request->other_image,  $product->id);
        return back()->with('msg', 'Product is Created');
    }

    public function manage()
    {
        $product = Product::all();
        return view('admin.product.manage', ['products' => $product]);
    }

    public function details($id)
    {
        return view('admin.product.details', ['product' => Product::find($id)]);
    }

    public function delete($id)
    {
        $product = Product::deleteProduct($id);
        OtherImage::deleteOtherImage($id);
        return back()->with('noti', 'Product is Deleted');
    }

    public function edit($id)
    {

        return view('admin.product.edit', [
            'product'             =>  Product::find($id),
            'categories'          =>  Category::all(),
            'subCategories'       =>  SubCategory::all(),
            'brands'              =>  Brand::all(),
            'units'               =>  Unit::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::updateProduct($request, $id);
        if($request->other_image){
            $otherImage = OtherImage::updateOtherImage($request->other_image,  $id);
        }
        return redirect(route('product.manage'))->with('msg', 'Product is Updated');
    }

}
