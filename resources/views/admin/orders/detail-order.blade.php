@extends('admin.admin-master')
@section('content')
     <div class="content-wrapper nxp-admin"> 
    <!-- Content Header (Page header) -->
       <div id="ajax_loader" class="ajax-load-qa"><h2 class="loading">Loading...</h2></div>
       <section class="content-header">
            <h1>
              Order
              <small>Detail of Orders</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}" class="click"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{url('admin/order/listorders')}}">Order</a></li>
                <li class="active"><a href="#">Detail of Orders<a></li>
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
                                      <a class="navbar-brand" class="mytile"><p class="myp">DETAIL OF ORDERS</p></a>
                                    </div>
                              </div>
                         </nav>
                      </div>
                      <div class="box">
                          <div class="box-body">
                                <table class="table table-bordered" id="mytable" border="0">
                                    <tr class="mytr">
                                        <th class="myth">Order code</th>
                                        <th class="myth">Product name</th>
                                        <th class="myth">Product image</th>
                                        <th class="myth">Quantity</th>
                                        <th class="myth">Unit price</th>
                                        <th class="myth">Total money</th>
                                    </tr>
                                    @foreach($dt_bill as $dt)
                                    <tr class="mytr">
                                        <td class="myth">{{$dt->id}}</td>
                                        <td class="myth">{{$dt->product->name}}</td>
                                        <td ><img src="{{asset('images/products/'.$dt->product->image)}}" alt="" style="width: 50px; height: 50px;"> </td>
                                        <td class="myth">{{$dt->quantity}}</td>
                                        <td class="myth">{{$dt->product->promotion_price}}</td>
                                        <td class="myth">{{($dt->quantity)*($dt->product->promotion_price)}}</td>
                                        <td class="myth">
                                            @if(($dt->status) == 0)
                                                 Undelivered
                                            @else
                                                 Delivery
                                            @endif
                                        </td>
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
