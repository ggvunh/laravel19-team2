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
                                    <a href="#"></a>
                              </div>
                         </nav>
                      </div>
                      <div class="box">
                          <div class="box-body">
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
                                    @foreach($orderlists as $orderlist)
                                    <tr>
                                        <td class="myth">{{$orderlist->id}}</td>
                                        <td class="myth">{{number_format($orderlist->total)}}</td>
                                        <td class="myth">{{$orderlist->user->email}}</td>
                                        <td class="myth">{{$orderlist->order_address}}</td>
                                        <td class="myth">{{$orderlist->note}}</td>
                                        <td class="myth">{{date('d-m-Y',strtotime($orderlist->date_order))}}</td>
                                        <td class="bamtd" style=" color:darkblue;font-weight: bold;">
                                        	@if(($orderlist->status) == 0)
                                                 Undelivered
                                            @elseif(($orderlist->status) == 1)
                                                 Delivery
                                            @else
                                                 Cancelled
                                        	@endif
                                        </td>
                                        <td class="myth"><span class="glyphicon glyphicon-list-alt"></span><a href="{{url('admin/order/detailorder')}}/{{$orderlist->id}}" style="color:red" class="click">Detail</a></td>
                                        <td class="myth change">
                                            @if(($orderlist->status) ==2 )
                                            <span class="glyphicon glyphicon-remove"></span>
                                            @else
                                            <a href="{{url('admin/order/check')}}/{{$orderlist->id}}"><button class="btn btn-info">Change</button></a></td>
                                            @endif
                                    </tr>
                                    @endforeach
                                </table>
                          </div>
                        @if(isset($orderlists))
                        {{$orderlists->links()}}
                        @endif
                      </div>
                 </div>
            </div>
         </div>
       </section>
    </div>
@stop
