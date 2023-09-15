<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static function getImageUrl($request)
    {
        if ($request->image) {
            $image = $request->image;
            $imageName = 'category-image' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/upload/category-image'), $imageName);
            $imageUrl = 'upload/category-image/' . $imageName;
        } else {
            $imageUrl = null;
        }

        return $imageUrl;

    }

    public static function storeCategory($request)
    {

        $category               = new Category();
        $category->name         = $request->name;
        $category->description  = $request->description;
        $category->status  = $request->status;
        $category->image        =  self::getImageUrl($request);

        $category->save();
    }

    public static function deleteCategory($id)
    {
        $category = Category::find($id);
        if (file_exists($category->image)) {
            unlink($category->image);
        }

        $category->delete();
    }

    public static function updateCategory($request)
    {
        $category = Category::find($request->id);
        if ($request->image) {
            if (file_exists($category->image)) {
                unlink($category->image);
            }


            $category->image = self::getImageUrl($request);
        }

        $category->name         = $request->name;
        $category->description  = $request->description;
        $category->status  = $request->status;
        $category->save();
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
