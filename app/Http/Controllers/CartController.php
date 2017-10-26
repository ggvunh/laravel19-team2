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
use Twilio;
use App\Mail\OrderShipped;
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
            $date_order = $req->input('date_oder');
            $bill = new Bill();
            $bill->date_order = $date_order;
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
            $code = $bill->id;
            $phone = Auth::user()->phone_number;
            $phonetrim = substr(trim($phone),1,strlen($phone)-1);
            $phone_send = '+84'.$phonetrim;
            // Twilio::message($phone_send, 'Guitarshop: bạn đã checkout thành công! mã order: #'.$code);
            // Mail::to(Auth::user()->email)->send(new OrderShipped());
            Session::forget('cart');
            return view('cart.hoadon', compact('bill', 'carts'));
        } else{
            return redirect('/');
        }

    }

    public function xemdonhang()
    {
        $content = Cart::content();
        return view('mail.mail', compact('content'));
    }

        public function update_qty_cart(Request $rq)
    {
        if($rq->ajax()){
            $qty = $rq->qty;
            $rowId = $rq->id;
            Cart::update($rowId, $qty);
            $cart = Cart::get($rowId);
            $price = $cart->price * $cart->qty;
        }
       return Response([number_format($price),number_format(Cart::total())]);
    }
}
