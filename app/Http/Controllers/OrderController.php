<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;
use App\Product;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    public function searchOrder(Request $rq)
    {   
         $search_input = $rq->search;
        if($search_input != null)
        {

            $search = str_replace('/','-', $search_input);
            $Search = date('Y-m-d',(strtotime($search)));
            $Search_up = $Search.' '.'23'.':'.'59'.':'.'59';
            $Search_down = $Search.' '.'00'.':'.'00'.':'.'00';
            $result_search_date = Bill::whereBetween('created_at',[$Search_down, $Search_up])->orderBy('id','desc')->paginate(25);
            
            $curent_date = getdate(strtotime(date('Y-m-d')));
            $time_up = $curent_date['year'].'-'.$search_input.'-'.'31';
            $time_down = $curent_date['year'].'-'.$search_input.'-'.'1';
            $result_search_month = Bill::whereBetween('created_at',[$time_down, $time_up])->orderBy('id','desc')->paginate(25);
            
            $bills = Bill::all();
            $bill_details = BillDetail::all();
            $bill_details_tam =array();
            $result_search_name =array();
            $products = Product::where('name','like','%'.$search_input.'%')->orderBy('id','desc')->get();
                for($i = 0;$i<count($products);$i = $i+1){
                    for($j = 0;$j<count($bill_details);$j = $j+1) {
                        if(($products[$i]->id) == ($bill_details[$j]->product_id)){
                             array_push($bill_details_tam,$bill_details[$j]);
                        }
                    }  
                }
                for($i = 0;$i<count($bill_details_tam);$i = $i+1){
                    for($j = 0;$j<count($bills);$j = $j+1) {
                        if(($bill_details_tam[$i]->bill_id) == ($bills[$j]->id)){
                             array_push($result_search_name,$bills[$j]);
                        }
                    }  
                }
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $col = new Collection($result_search_name);
            $perPage = 25;
            $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
            $result_search_proname = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage,['path' => LengthAwarePaginator::resolveCurrentPath()] );

            if(count( $result_search_date)>0)
            {
                $result_search = $result_search_date ;
                $x = Bill::whereBetween('created_at',[$Search_down, $Search_up])->get();
                $count_search = count($x);
                $count_money = 0;
                for($i=0;$i< $count_search;$i=$i+1){
                    $count_money=($count_money+($x[$i]->total));
                }
            }
            if(count( $result_search_month)>0)
            {
                $result_search = $result_search_month;
                $x = Bill::whereBetween('created_at',[$time_down, $time_up])->get();
                $count_search = count($x);
                $count_money = 0;
                for($i=0;$i< $count_search;$i=$i+1){
                    $count_money=($count_money+($x[$i]->total));
                }
            }
            if(count( $result_search_proname)>0)
            {
                $result_search = $result_search_proname ;
                $x = $result_search_name;
                $count_search = count($x);
                $count_money = 0;
                for($i=0;$i< $count_search;$i=$i+1){
                    $count_money=($count_money+($x[$i]->total));
                }
            }

            if((count( $result_search_date)==0) and(count( $result_search_month)==0) and(count( $result_search_proname)==0))
            {   
                $result_search_tam = [];
                $x = $result_search_tam;
                $count_search = count($x);
                $count_money = 0;
                for($i=0;$i< $count_search;$i=$i+1){
                    $count_money=($count_money+($x[$i]->total));
                }
                $currentPage = LengthAwarePaginator::resolveCurrentPage();
                $col = new Collection($result_search_tam);
                $perPage = 25;
                $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
                $result_search_pro = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage,['path' => LengthAwarePaginator::resolveCurrentPath()] );
                $result_search =   $result_search_pro; 
            }
        }else{
            $result_search = Bill::orderBy('id','desc')->paginate(25);
            $x =  Bill::orderBy('id','desc')->get();
            $count_search = count($x);
            $count_money = 0;
            for($i=0;$i< $count_search;$i=$i+1){
                    $count_money=($count_money+($x[$i]->total));
            }
        }
       
        return view('admin.orders.list-orders')->with(['result_searchs'=>$result_search->appends(Input::except('page')),'count_search'=>$count_search,'search_input'=>$search_input,'count_money'=>$count_money]);
    }
        
    public function listOrders ()
    {
        return view('admin.orders.list-orders');
    }

    public function detailOrder ($id)
    {
        $dt_bills = BillDetail::where('bill_id',$id)->get();
        return view('admin.orders.detail-order')->with(['dt_bills'=>$dt_bills]);
    }

}