<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view("admin.brand.index");
    }

    public function store(Request $request)
    {
        $brand = Brand::storebrand($request);
        return back()->with("msg", "Brand is created Successfully");
    }

    public function manage()
    {
        return view('admin.brand.manage',['brands'=>Brand::all()]);
    }

    public function edit($id)
    {
        return view('admin.brand.edit',[
            'brand' => Brand::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::updateBrand($request, $id);
        return redirect(route('brand.manage'))->with('msg',"Brand is Updated Successfully");
    }

    public function delete($id)
    {
        $brand = Brand::deleteBrand($id);
        return back()->with("noti", "Brand Deteled Successfully");
    }

}
