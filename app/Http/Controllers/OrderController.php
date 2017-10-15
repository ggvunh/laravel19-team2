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
}
