<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }



    public function store(Request $request)
    {

        // DB::table('categories')->insert([            //using Query Builder//
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'image' => $request->image,
        //     'status' => $request->status,
        // ]);
        // return back()->with('msg','Category is Created');


        $request->validate([                          //using Eloquent ORM (MVC Pattern)
            'name' => 'required'
        ],[
            'name.required' => 'This field cannot be empty'
        ]);
       $category = Category::storeCategory($request);
        return back()->with('msg','Category is Created');
    }

    public function manage()
    {
        $category = Category::all();
        return view('admin.category.manage',['categories'=>$category]);
    }

    public function delete($id)
    {
        $category = Category::deleteCategory($id);
        return back()->with('noti','Category is Deleted');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',['category'=>$category]);
    }

    public function update(Request $request)
    {
       $category = Category::updateCategory($request);
        return redirect(route('category.manage'))->with('msg','Category is Updated');
    }

   
}
