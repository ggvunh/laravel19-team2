<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use App\User;
use App\Bill;
use App\BillDetail;
use Session;
use Auth;
class CartController extends Controller
{
    public function addCart($id)
    {
        $product_buy=Product::find($id);
        Cart::add(['id' => $id, 'name' => $product_buy->name, 'qty' => 1, 'price' => $product_buy->promotion_price, 'options' => ['img' => $product_buy->image]]);
        return redirect()->route('home');
    }

    public function cart()
    {
        $content = Cart::content();
        return redirect()->route('home');
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('home');
    }

    public function getcheckout()
    {
        return view('cart.cart');
    }
    public function checkout( Request $req)
    {
        $order_address = $req->input('address');
        $note = $req->input('note');
        $bill = new Bill();
        $bill->date_order = date('Y-m-d');
        $bill->total = (float)\Cart::total();
        $bill->order_address = $order_address;
        $bill->note = $note;
        $bill->status = '0';
        $bill->user_id = Auth::id();
        $bill->save();

        foreach(\Cart::content() as $content)
        {
            $billdetail = new BillDetail();
            $billdetail->quantity = $content->qty;
            $billdetail->bill_id = $bill->id;
            $billdetail->product_id = $content->qty;
            $billdetail->unit_price = $content->price;
            $billdetail->save();
        }
        Session::forget('cart');
        return redirect()->route('home');

    }
}