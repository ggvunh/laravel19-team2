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
use Mail;
class CartController extends Controller
{
    public function addCart($id)
    {
        $product_buy = Product::find($id);
        Cart::add(['id' => $product_buy->id, 'name' => $product_buy->name, 'qty' => 1, 'price' => $product_buy->promotion_price, 'options' => ['img' => $product_buy->image]]);
        return redirect()->route('home');
    }

    public function addCartSearch($id)
    {
        $product_buy = Product::find($id);
        Cart::add(['id' => $product_buy->id, 'name' => $product_buy->name, 'qty' => 1, 'price' => $product_buy->promotion_price, 'options' => ['img' => $product_buy->image]]);
        return redirect()->route('homesearch');
    }

    public function addCartProduct($id)
    {
        $product_buy = Product::find($id);
        Cart::add(['id' => $product_buy->id, 'name' => $product_buy->name, 'qty' => 1, 'price' => $product_buy->promotion_price, 'options' => ['img' => $product_buy->image]]);
        return redirect()->route('homeproduct');
    }
    public function addCartviewdetail1($id)
    {
        $qtyup = 0;
        $product_buy = Product::find($id);
        Cart::add(['id' => $product_buy->id, 'name' => $product_buy->name, 'qty' => 1, 'price' => $product_buy->promotion_price, 'options' => ['img' => $product_buy->image]]);
        return redirect()->route('cart');
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
        if(Cart::total() > 0)
        {
            $order_address = $req->input('address');
            $note = $req->input('note');
            $bill = new Bill();
            $bill->date_order = date('Y-m-d');
            $bill->total = Cart::total();
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
                $billdetail->product_id = $content->id;
                $billdetail->unit_price = $content->price;
                $billdetail->save();
            }
            $carts = Cart::content();
            Session::forget('cart');
            return view('cart.hoadon', compact('bill', 'carts'));
        } else{
            return redirect('/');
        }
    }

    public function sendmail()
    {
        $data=['hoten' => 'Phuong nguyen'];
        Mail::send('mail.mail', $data, function($message){
            $message->from('mail.guitarshoppkh@gmail.com','Guitarshop PKH');
            $message->to('nguyenxuanphuong1211@gmail.com','Nguyen xuan Phuong')->subject('Mail Guitarshop');
        });
    }

    public function update_qty_cart(Request $rq)
    {
        if(Request::ajax()){
            $x=$rq->qty;
            dd($x);
        }
    }
}
