<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;

class OrderController extends Controller
{
    public function listOrders ()
    {
        $bills = Bill::all();
    	return view('admin.orders.list-orders')->with(['bills'=>$bills]);
    }

    public function detailOrder ($id)
    {
        $dt_bill = BillDetail::where('bill_id',$id)->get();
        return view('admin.orders.detail-order')->with(['dt_bill'=>$dt_bill]);
    }

    public function undileveryOrder ()
    {
        $unOrder = Bill::where('status','0')->get();
        return view('admin.orders.order-undilevery')->with(['unOrder'=>$unOrder]);
    }

    public function dileveryOrder ()
    {
        $dileOrder = Bill::where('status','1')->get();
        return view('admin.orders.order-dilevery')->with(['dileOrder'=>$dileOrder]);
    }
}
