@extends('admin.admin-master')
@section('content')
     <div class="content-wrapper nxp-admin">
    <!-- Content Header (Page header) -->
       <div id="ajax_loader" class="ajax-load-qa"><h2 class="loading">Loading...</h2></div>
       <section class="content-header">
            <h1>
              Order
              <small>List of Orders</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}" class="click"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{url('admin/order/orders')}}">Order</a></li>
                <li><a href="#">List of Orders<a></li>
            </ol>
       </section>
       <section class="content">
          <div class="row">
        <!-- left column -->
            <div class="col-md-12">
            <!-- general form elements -->
                 <div class="box box-primary">
                      <div class="box-header with-border">
                         <nav class="navbar">
                              <div class="container-fluid">
                                    <div class="navbar-header">
                                      <a class="navbar-brand" class="mytile"><p class="myp">LIST OF ORDERS</p></a>
                                    </div>
                                    <a><form class="navbar-form navbar-left form1" action="{{url('admin/order/search')}}" method="get">
                                      <div class="form-group">
                                           <span style="color: black;font-weight: bold">Status</span><select name="status" class="form-control" style=" width:100px">
                                              <option value="0">Both</option>
                                              <option value="1">Undilevery</option>
                                              <option value="2">Dilevery</option>
                                              <option value="3">Canceled</option>
                                           </select>
                                            <span style="color: black; font-weight: bold">Start</span><input type="date" class="form-control " style="width:155px" name="search1" @if(isset($search_input1))
                                               value="{{$search_input1}}"
                                           @endif>
                                            <span style="color: black;font-weight: bold">Finish</span><input type="date" class="form-control " style="width:155px" name="search2" @if(isset($search_input2))
                                               value="{{$search_input2}}"
                                           @endif>
                                      </div>
                                      <button type="submit" class="btn btn-info click"  id="search" style="margin-left: 30px">Search</button>
                                    </form></a>
                              </div>
                         </nav>
                     </div>
                      <div class="box">
                          <div class="box-body">
                              <div>
                                 <span style="color: red;font-size:20px">Have </span><span style="color: black;font-size: 25px" >
                                      @if(isset($count_search))
                                        {{$count_search}}
                                      @else
                                          0
                                      @endif
                                    </span><span style="color: red;font-size:20px">Orders in table</span>
                                    <span style="font-size: 20px">&nbsp&nbsp/&nbsp&nbsp</span><span style="color: blue;font-size:20px">Total money:</span>
                                    <span style="color: black;font-size: 25px" >
                                       @if(isset($count_money))
                                        {{number_format($count_money)}}<span>&nbsp&nbsp&nbsp</span><span style="color: red">VNĐ</span>
                                      @else
                                          0<span>&nbsp&nbsp&nbsp</span><span style="color: red">VNĐ</span>
                                      @endif
                                    </span>
                              </div>
                              <p>Export orders: <a href="{{ route('export-order') }}"><span class="glyphicon glyphicon-export"></span></a></p>
                                <table class="table table-bordered" id="mytable" border="0">
                                    <tr class="mytr" >
                                        <th class="myth">Order code</th>
                                        <th class="myth">Total money</th>
                                        <th class="myth">Customer Email</th>
                                        <th class="myth">Address</th>
                                        <th class="myth">Note</th>
                                        <th class="myth">Delivery day</th>
                                        <th class="myth">Status</th>
                                        <th class="myth">Detail</th>
                                        <th class="myth">Change status</th>
                                    </tr>
                                    @if(isset($orders))
                                    @foreach($orders as $bill)
                                    <tr>
                                        <td class="myth">{{$bill->id}}</td>
                                        <td class="myth">{{number_format($bill->total)}}</td>
                                        <td class="myth">{{$bill->user->email}}</td>
                                        <td class="myth">{{$bill->order_address}}</td>
                                        <td class="myth">{{$bill->note}}</td>
                                        <td class="myth">{{date('d-m-Y',strtotime($bill->date_order))}}</td>
                                        <td class="bamtd" style=" color:darkblue;font-weight: bold;">
                                        	@if(($bill->status) == 0)
                                                 Undelivered
                                            @elseif(($bill->status) == 1)
                                                 Delivery
                                            @else
                                                 Cancelled
                                        	@endif
                                        </td>
                                        <td class="myth"><span class="glyphicon glyphicon-list-alt"></span><a href="{{url('admin/order/detailorder')}}/{{$bill->id}}" style="color:red" class="click">Detail</a></td>
                                        <td class="myth change">
                                            @if(($bill->status) ==2 )
                                            <span class="glyphicon glyphicon-remove"></span>
                                            @else
                                            <a href="{{url('admin/order/check')}}/{{$bill->id}}"><button class="btn btn-info">Change</button></a></td>
                                            @endif
                                    </tr>
                                    @endforeach
                                    @endif
                                </table>
                          </div>
                        @if(isset($orders))
                        {{$orders->links()}}
                        @endif
                      </div>
                 </div>
            </div>
         </div>
       </section>
    </div>
@stop
