@extends('admin.admin-master')
@section('content')
     <div class="content-wrapper" style="height: 1138px"> 
    <!-- Content Header (Page header) -->
       <div id="ajax_loader" class="ajax-load-qa"><h2 class="loading">Loading...</h2></div> 
       <section class="content-header">
            <h1>
              Order
              <small>Search Orders by Product name</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}" class="click"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{url('admin/order/listorders')}}">Order</a></li>
                <li class="active"><a href="#">Search Orders by Product name<a></li>
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
                                      <a class="navbar-brand" class="mytile"><p class="myp" style="font-size:35px">SEARCH ORDERS BY PRODUCT NAME</p></a>
                                    </div>
                                    <form class="navbar-form navbar-left" action="
                                    {{url('admin/order/srchPrname')}}" method="post">
                                         {!!csrf_field()!!}
                                          <div class="form-group">
                                              <input name="search"  type ="text" class="form-control">
                                              </input>
                                          </div>
                                           <button type="submit" class="btn btn-info click"  id="search">Search</button> 
                                    </form>
                              </div>
                         </nav> 
                      </div>
                      <div class="box">
                          <div class="box-body">
                            <span style="color: red;font-size:20px">Found <span style="color: black">
                                      @if(isset($result_Prname))
                                        {{count($result_Prname)}}
                                      @else
                                          0
                                      @endif
                                    </span>Orders whith the Product name:<span style="color: black">
                                      @if(isset($Prname_search))
                                        {{$Prname_search}}
                                      @endif
                                      </span></span>
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
                                    @if(isset($result_Prname))
                                    @foreach($result_Prname as $rs)
                                    <tr>
                                        <td class="myth">{{$rs->id}}</td>
                                        <td class="myth">{{$rs->total}}</td>
                                        <td class="myth">{{$rs->order_address}}</td>
                                        <td class="myth">{{$rs->note}}</td>
                                        <td class="myth">{{date('d-m-Y',strtotime($rs->date_order))}}</td>
                                        <td class="myth">
                                          @if(($rs->status) == 0)
                                                 Undelivered
                                            @else 
                                                 Delivered     
                                          @endif
                                        </td>
                                        <td class="myth"><span class="glyphicon glyphicon-list-alt"></span><a href="{{url('admin/order/detailorder')}}/{{$rs->id}}" style="color:red" class="click">Detail</a></td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </table> 
                          </div>
                      </div>
                     
                 </div>       
            </div>   
         </div>                  
       </section>
    </div>
@stop