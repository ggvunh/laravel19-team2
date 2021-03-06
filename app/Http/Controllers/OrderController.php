<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;
use App\Product;
use App\User;
use Toastr;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    public function searchOrder(Request $rq)
    {
         $search_input1 = $rq->search1;
         $search_input2 = $rq->search2;
         $status        = $rq->status;
        if(($search_input1 != null)and($search_input2 != null))
        {
            if($status==0)
            {
                $Search_up = date('Y-m-d',(strtotime($search_input2))).' '.'23'.':'.'59'.':'.'59';
                $Search_down = date('Y-m-d',(strtotime($search_input1))).' '.'00'.':'.'00'.':'.'00';
                $result_search_date = Bill::whereBetween('created_at',[ $Search_down, $Search_up])->orderBy('id','desc')->paginate(25);

                $result_search = $result_search_date ;
                $x = Bill::whereBetween('created_at',[ $Search_down, $Search_up])->get();
                $count_search = count($x);
                $count_money = 0;
                for($i=0;$i< $count_search;$i=$i+1){
                    $count_money=($count_money+($x[$i]->total));
                }

            }elseif ($status ==1){
                $Search_up = date('Y-m-d',(strtotime($search_input2))).' '.'23'.':'.'59'.':'.'59';
                $Search_down = date('Y-m-d',(strtotime($search_input1))).' '.'00'.':'.'00'.':'.'00';
                $result_search_date = Bill::whereBetween('created_at',[ $Search_down, $Search_up])
                                      ->where('status','0')
                                      ->orderBy('id','desc')->paginate(25);
                $result_search = $result_search_date ;
                $x = Bill::whereBetween('created_at',[ $Search_down, $Search_up])
                                      ->where('status','0')
                                      ->orderBy('id','desc')->get();
                $count_search = count($x);
                $count_money = 0;
                for($i=0;$i< $count_search;$i=$i+1){
                    $count_money=($count_money+($x[$i]->total));
                }

            }elseif($status ==2){
                $Search_up = date('Y-m-d',(strtotime($search_input2))).' '.'23'.':'.'59'.':'.'59';
                $Search_down = date('Y-m-d',(strtotime($search_input1))).' '.'00'.':'.'00'.':'.'00';
                $result_search_date = Bill::whereBetween('created_at',[ $Search_down, $Search_up])
                                      ->where('status','1')
                                      ->orderBy('id','desc')->paginate(25);

                $result_search = $result_search_date ;
                $x = Bill::whereBetween('created_at',[ $Search_down, $Search_up])
                                      ->where('status','1')
                                      ->orderBy('id','desc')->get();
                $count_search = count($x);
                $count_money = 0;
                for($i=0;$i< $count_search;$i=$i+1){
                    $count_money=($count_money+($x[$i]->total));
                }
            }else{
                $Search_up = date('Y-m-d',(strtotime($search_input2))).' '.'23'.':'.'59'.':'.'59';
                $Search_down = date('Y-m-d',(strtotime($search_input1))).' '.'00'.':'.'00'.':'.'00';
                $result_search_date = Bill::whereBetween('created_at',[ $Search_down, $Search_up])
                                      ->where('status','2')
                                      ->orderBy('id','desc')->paginate(25);

                $result_search = $result_search_date ;
                $x = Bill::whereBetween('created_at',[ $Search_down, $Search_up])
                                      ->where('status','2')
                                      ->orderBy('id','desc')->get();
                $count_search = count($x);
                $count_money = 0;
                for($i=0;$i< $count_search;$i=$i+1){
                    $count_money=($count_money+($x[$i]->total));
                }
            }
            }elseif(($search_input1 == null)and($search_input2 == null)){
                if($status==0)
                {
                    $result_search = Bill::orderBy('id','desc')->paginate(25);
                    $x =  Bill::orderBy('id','desc')->get();
                    $count_search = count($x);
                    $count_money = 0;
                    for($i=0;$i< $count_search;$i=$i+1){
                             $count_money=($count_money+($x[$i]->total));
                    }
                }elseif($status==1)
                {
                    $result_search = Bill::where('status','0')->paginate(25);
                    $x = Bill::where('status','0')->get();
                    $count_search = count($x);
                    $count_money = 0;
                    for($i=0;$i< $count_search;$i=$i+1){
                             $count_money=($count_money+($x[$i]->total));
                    }
                }elseif($status==2)
                {
                    $result_search = Bill::where('status','1')->paginate(25);
                    $x = Bill::where('status','1')->get();
                    $count_search = count($x);
                    $count_money = 0;
                    for($i=0;$i< $count_search;$i=$i+1){
                             $count_money=($count_money+($x[$i]->total));
                    }
                }else{
                    $result_search = Bill::where('status','2')->paginate(25);
                    $x = Bill::where('status','2')->get();
                    $count_search = count($x);
                    $count_money = 0;
                    for($i=0;$i< $count_search;$i=$i+1){
                             $count_money=($count_money+($x[$i]->total));
                    }
                }
            }else{
                Toastr::warning('Incorrect search data entry', $title = null, $options = []);

                return view('admin.orders.search-orders');
            }
        return view('admin.orders.search-orders')->with(['result_searchs'=>$result_search->appends(Input::except('page')),'count_search'=>$count_search,'search_input2'=>$search_input2,'search_input1'=>$search_input1,'count_money'=>$count_money]);
    }

    public function listOrders ()
    {   
        $orders = Bill::orderBy('id','desc')->paginate(25);
        $x = Bill::all();
        $count_search = count($x);
        $count_money = 0;
            for($i=0;$i< $count_search;$i=$i+1){
                $count_money=($count_money+($x[$i]->total));
            }
        return view('admin.orders.list-order')->with(['orders'=>$orders,'count_search'=>$count_search,'count_money'=>$count_money]);
    }

    public function detailOrder ($id)
    {
        $dt_bills = BillDetail::where('bill_id',$id)->get();
        return view('admin.orders.detail-order', compact('id', 'dt_bills'));
    }

    public function checkOrder ($id)
    {
        $check = Bill:: find($id);
            if($check->status ==0){
                $check->status = '1';
            }else{
                $check->status = '0';
            }
        $check->save();
        Toastr::success('Change Order status successful', $title = null, $options = []);
        return redirect()->back();
    }

    public function Calendar()
    {
        $result_calendar =[0];
        $u = getdate(strtotime(date('Y-m-d')));
        $time_up = $u['year'].'-'.$u['mon'].'-'.'31'.' '.'23'.':'.'59'.':'.'59';
        $time_down = $u['year'].'-'.$u['mon'].'-'.'1'.' '.'00'.':'.'00'.':'.'00';
        $dilevery_order = Bill::whereBetween('created_at',[$time_down, $time_up])->get();
        foreach($dilevery_order as $x){
             $u =$x->created_at;
             $t = getdate(strtotime($u));
             $day = $t['mday'];
             array_push($result_calendar,$day);
        }
        return view('admin.calendar.calendar')->with(['result_calendar'=>$result_calendar]);
    }

    public function Calendar_detal($date)
    {
        $count =0;
        $curent_date = getdate(strtotime(date('Y-m-d')));
        $time = $curent_date['year'].'-'.$curent_date['mon'].'-'.$date;
        $time_up =$time.' '.'23'.':'.'59'.':'.'59';
        $time_down =$time.' '.'00'.':'.'00'.':'.'00';
        $calendar_detal_result = Bill::whereBetween('created_at',[$time_down, $time_up])->get();
        for($i=0;$i<count($calendar_detal_result);$i=$i+1){
            $count = $count + $calendar_detal_result[$i]->total;
        }
        return view('admin.calendar.calendar_detail')->with(['calendar_detal_result'=> $calendar_detal_result,'count'=> $count,'time'=>$time]);
    }

    public function Chart ()
    {
        $result1 =[0];
        $result2 =[0];
        $result3 =[0];
        for($i=1;$i<=12;$i++){
            $curent_date = getdate(strtotime(date('Y-m-d')));
            $time1 = $curent_date['year'].'-'.$i.'-'.'1';
            $time2 = $curent_date['year'].'-'.$i.'-'.'31';
            $time_up =$time2.' '.'23'.':'.'59'.':'.'59';
            $time_down =$time1.' '.'00'.':'.'00'.':'.'00';
            $chart1 = Bill::whereBetween('created_at',[$time_down, $time_up])
                      ->where('status','2')->get();
            $chart2 = Bill::whereBetween('created_at',[$time_down, $time_up])
                      ->where('status','0')->get();
            $chart3 = Bill::whereBetween('created_at',[$time_down, $time_up])
                      ->where('status','1')->get();
            $slg1 =count($chart1);
            $slg2 =count($chart2);
            $slg3 =count($chart3);
            array_push( $result1, $slg1);
            array_push( $result2, $slg2);
            array_push( $result3, $slg3);
        }
        return view('admin.calendar.chart')->with(['result2'=>$result2,'result1'=>$result1,'result3'=>$result3]);
    }
}

// use Illuminate\Support\Collection;
// use Illuminate\Pagination\LengthAwarePaginator;
// //2cai tren bo tren name space
// $currentPage = LengthAwarePaginator::resolveCurrentPage();
// $col = new Collection($products);
// $perPage = 5; // so san pham o moi trang
// $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
// $bien_truyenquaview = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, $currentPage,[‘path’ => LengthAwarePaginator::resolveCurrentPath()] );
// // dem bien $bien_truyenquaview truyen qua view binh thuong,phan trang nhu paginate, neu khong giu duoc link khi chuyen trang thi dung cai nhu bua truoc tui noi ong do...
