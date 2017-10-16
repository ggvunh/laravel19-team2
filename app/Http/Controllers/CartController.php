<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
class CartController extends Controller
{
    public function addCart($id)
    {
        $product_buy=Product::find($id);
        Cart::add(['id' => $id, 'name' => $product_buy->name, 'qty' => 1, 'price' => $product_buy->promotion_price, 'options' => ['img' => $product_buy->image]]);
        return redirect()->route('cart');
    }

    public function cart()
    {
        $content = Cart::content();
        var_dump($content);
        // return view('cart.cart', compact('content'));
    }
}
