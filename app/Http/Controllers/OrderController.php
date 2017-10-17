<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;
use App\Product;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderController extends Controller
{
    public function listOrders ()
    {
        $bills = Bill::orderBy('id','desc')->paginate(25);
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

    public function dateSearch ()
    {   
        return view('admin.orders.search-date');
    }

    public function postdateSearch (Request $rq)
    {
        $date_search = $rq->input('search');
        $result_search = Bill::where('created_at',$date_search)->paginate(5);
        return view('admin.orders.search-date')->with(['result_search'=>$result_search,'date_search'=>$date_search]);
    }

    public function monthSearch ()
    {   
        return view('admin.orders.search-month');
    }

     public function postmonthSearch (Request $rq)
    {
        $month_search = $rq->input('search');
        $result_all = Bill::all();
        $result_month =array();
        for($i=0;$i<count($result_all);$i=$i+1)
        {
            $tam = getdate(strtotime($result_all[$i]->created_at));
            if($tam['mon'] == $month_search){
                array_push($result_month,$result_all[$i]);
            }
        }
        return view('admin.orders.search-month')->with(['result_month'=> $result_month,'month_search'=>$month_search]);
    }
    
    public function PrnameSearch ()
    {   
        return view('admin.orders.nameProduct-search');
    }

     public function postPrnameSearch (Request $rq)
    {
        $Prname_search = $rq->input('search');
        $bills = Bill::all();
        $bill_details = BillDetail::all();
        $bill_details_tam =array();
        $result_Prname =array();
        $products = Product::where('name','like','%'.$Prname_search.'%')->get();
            for($i=0;$i<count($products);$i=$i+1){
                for($j=0;$j<count($bill_details);$j=$j+1) {
                    if(($products[$i]->id) == ($bill_details[$j]->product_id)){
                         array_push($bill_details_tam,$bill_details[$j]);
                    }
                }  
            }
            for($i=0;$i<count($bill_details_tam);$i=$i+1){
                for($j=0;$j<count($bills);$j=$j+1) {
                    if(($bill_details_tam[$i]->bill_id) == ($bills[$j]->id)){
                         array_push($result_Prname,$bills[$j]);
                    }
                }  
            }
        return view('admin.orders.nameProduct-search')->with(['result_Prname'=>$result_Prname,'Prname_search'=> $Prname_search]);
    }
}