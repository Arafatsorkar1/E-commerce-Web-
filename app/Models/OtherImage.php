<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;

    private static $otherImage, $otherImages, $imageName, $imageUrl;

    public static function getImageUrl($image)
    {
        if ($image) {
            self::$imageName = "product-other-image" . rand(100000, 1000000) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("/upload/product-other-image"),  self::$imageName);
            self::$imageUrl = "upload/product-other-image/" . self::$imageName;
        }else{
            self::$imageUrl = null;
        }
        return self::$imageUrl;
    }

    public static function otherImage($images, $id)
    {

        foreach ($images as $image) {
            self::$otherImage = new OtherImage();
            self::$otherImage->product_id       = $id;
            self::$otherImage->other_image      = self::getImageUrl($image);
            self::$otherImage->save();
        }

    }


    public static function updateOtherImage($images, $id)
    {
        
        self::deleteOtherImage($id);
        self::otherImage($images, $id);

    }

    public static function deleteOtherImage($id)
    {
      self::$otherImages = OtherImage::where('product_id', $id)->get();

        foreach (self::$otherImages as $image) {
            if(file_exists($image->other_image)){
                unlink($image->other_image);
            }
            $image->delete();
        }

    }
}
