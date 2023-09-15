<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
      private static $brand, $image, $imageName, $imageUrl;
    protected $fillable = ['name', 'description', 'image', 'status'];

    public static function getImageUrl($request)
    {
        if($request->image){
            self::$image = $request->image;
            self::$imageName = "brand-image".time().'.'.self::$image->getClientOriginalExtension();
            self::$image->move(public_path("/upload/brand-image"),  self::$imageName);
            self::$imageUrl = "upload/brand-image/".self::$imageName;
        }else{
            self::$imageUrl = null;
        }
        return self::$imageUrl;
    }

    public static function storeBrand($request)
    {
        self::$brand = new Brand();
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image = self::getImageUrl($request);
        self::$brand->status = $request->status;
        self::$brand->save();
    }


     public static function updateBrand($request, $id)
    {
        self::$brand = Brand::find($id);

        if($request->image){
            if(file_exists( self::$brand->image)){
                unlink( self::$brand->image);
            }
            self::$brand->image = self::getImageUrl($request);
        }else{

        }
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->status = $request->status;
        self::$brand->save();
    }


    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);
        if(file_exists(self::$brand->image)){
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }


}
