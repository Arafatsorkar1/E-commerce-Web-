<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view("admin.subCategory.index",['categories'=> Category::all()]);
    }

    public function store(Request $request)
    {
        $subCategory = SubCategory::storeSubCategory($request);
        return back()->with("msg", "Sub Category created Successfully");
    }

    public function manage()
    {
        return view('admin.subCategory.manage',['subCategories'=>SubCategory::all()]);
    }

    public function edit($id)
    {
        return view('admin.subCategory.edit',[
            'subCategory' => SubCategory::find($id),
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $subCategory = SubCategory::updateSubCategory($request, $id);
        return redirect(route('subCategory.manage'))->with('msg',"Sub-category is Updated Successfully");
    }

    public function delete($id)
    {
        $subCategory = SubCategory::deleteSubCategory($id);
        return back()->with("noti", "Sub-category Deteled Successfully");
    }


}
