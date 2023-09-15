<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use ShoppingCart;

class CartController extends Controller
{
    public function index()
    {
        return view('website.cart.index', ['cart_products' => ShoppingCart::all()]);
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        ShoppingCart::add($product->id, $product->name, $request->qty, $product->selling_price, ['image' => $product->image, 'category' => $product->category->name, 'brand' => $product->brand->name]);
        return redirect(route('show-cart'));
    }

    public function removeFromCart($id)
    {
        $product = Product::find($id);
        ShoppingCart::remove($id);
        return redirect(route('show-cart'));
    }

    public function updateCart(Request $request, $id)
    {
        $product = Product::find($id);
        ShoppingCart::update($id,  $request->qty);
        return redirect(route('show-cart'));
    }
}
