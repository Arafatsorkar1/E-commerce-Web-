<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    private static $subCategory, $image, $imageName, $imageUrl;
    protected $fillable = ['name', 'description', 'image', 'status'];

    public static function getImageUrl($request)
    {
        if($request->image){
            self::$image = $request->image;
            self::$imageName = "subCategory-image".time().'.'.self::$image->getClientOriginalExtension();
            self::$image->move(public_path("/upload/subCategory-image"),  self::$imageName);
            self::$imageUrl = "upload/subCategory-image/".self::$imageName;
        }else{
            self::$imageUrl = null;
        }
        return self::$imageUrl;
    }

    public static function storeSubCategory($request)
    {
        self::$subCategory = new SubCategory();
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->image = self::getImageUrl($request);
        self::$subCategory->status = $request->status;
        self::$subCategory->save();
    }


     public static function updateSubCategory($request, $id)
    {
        self::$subCategory = SubCategory::find($id);

        if($request->image){
            if(file_exists( self::$subCategory->image)){
                unlink( self::$subCategory->image);
            }
            self::$subCategory->image = self::getImageUrl($request);
        }else{

        }
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->status = $request->status;
        self::$subCategory->save();
    }


    public static function deleteSubCategory($id)
    {
        self::$subCategory = SubCategory::find($id);
        if(file_exists(self::$subCategory->image)){
            unlink(self::$subCategory->image);
        }
        self::$subCategory->delete();
    }



    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
