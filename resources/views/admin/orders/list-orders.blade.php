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
                <li><a href="{{url('admin/order/listorders')}}">Order</a></li>
                <li class="active"><a href="#">List of Orders<a></li>
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
                                          <form class="navbar-form navbar-left"> 
                                          <a href="{{url('admin/order/searchdate')}}" class="click">
                                          <button type="button" class="btn btn-info">Search by Date</button></a>      
                                          <a href="{{url('admin/order/searchmonth')}}" class="click">
                                          <button type="button" class="btn btn-info">Search by Month</button></a> 
                                          <a href="{{url('admin/order/searchPrname')}}" class="click">
                                          <button type="button" class="btn btn-info">Search by Product name</button></a>           
                                          <a href="{{url('admin/order/dilevery')}}" class="click">
                                          <button type="button" class="btn btn-info">Delivered</button></a>
                                          <a href="{{url('admin/order/undilevery')}}" class="click"><button type="button" class="btn btn-info ">Undelivered</button></a> 
                                          </form> 
                              </div>
                         </nav>
                      </div>
                      <div class="box">
                          <div class="box-body">
                                <table class="table table-bordered" id="mytable" border="0">
                                    <tr class="mytr" >
                                        <th class="myth">Order code</th>
                                        <th class="myth">Total money</th>
                                        <th class="myth">Address</th>
                                        <th class="myth">Note</th>
                                        <th class="myth">Delivery day</th>
                                        <th class="myth">Status</th>
                                        <th class="myth">Detail</th>
                                    </tr>
                                    @foreach($bills as $bill)
                                    <tr>
                                        <td class="myth">{{$bill->id}}</td>
                                        <td class="myth">{{$bill->total}}</td>
                                        <td class="myth">{{$bill->order_address}}</td>
                                        <td class="myth">{{$bill->note}}</td>
                                        <td class="myth">{{date('d-m-Y',strtotime($bill->date_order))}}</td>
                                        <td class="myth">
                                        	@if(($bill->status) == 0)
                                                 Undelivered
                                            @else
                                                 Delivery
                                        	@endif
                                        </td>
                                        <td class="myth"><span class="glyphicon glyphicon-list-alt"></span><a href="{{url('admin/order/detailorder')}}/{{$bill->id}}" style="color:red" class="click">Detail</a></td>
                                    </tr>
                                    @endforeach
                                </table>
                          </div>
                      </div>

                 </div>
            </div>
         </div>
       </section>
    </div>
@stop
