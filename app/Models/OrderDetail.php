<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ShoppingCart;

class OrderDetail extends Model
{
    use HasFactory;
    private static $orderDetail, $orderDetails;

    public static function newOrderDetail($orderId)
    {
        foreach (ShoppingCart::all() as $item){
            self::$orderDetail                  = new OrderDetail();
            self::$orderDetail->order_id        =  $orderId;
            self::$orderDetail->product_id      =  $item->id;
            self::$orderDetail->product_name    =  $item->name;
            self::$orderDetail->product_price   =  $item->price;
            self::$orderDetail->product_qty     =  $item->qty;
            self::$orderDetail->save();

            ShoppingCart::remove($item->__raw_id);
        }
    }

    public static function deleteOrderDetail($id){
        self::$orderDetails = OrderDetail::where('order_id', $id)->get();
        foreach(self::$orderDetails as self::$orderDetail){
            self::$orderDetail->delete();
        }
    }
}
