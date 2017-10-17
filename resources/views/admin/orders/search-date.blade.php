@extends('admin.admin-master')
@section('content')
     <div class="content-wrapper" style="height: 1138px"> 
    <!-- Content Header (Page header) -->
       <div id="ajax_loader" class="ajax-load-qa"><h2 class="loading">Loading...</h2></div> 
       <section class="content-header">
            <h1>
              Order
              <small>Search Orders by Date</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}" class="click"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{url('admin/order/listorders')}}">Order</a></li>
                <li class="active"><a href="#">Search Orders by Date<a></li>
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
                                      <a class="navbar-brand" class="mytile"><p class="myp">SEARCH ORDERS BY DATE</p></a>
                                    </div>
                                    <a><form class="navbar-form navbar-left" action="
                                    {{url('admin/order/srchdate')}}" method="get">
                                          <div class="form-group">
                                              <input type="date" class="form-control" id="search" name="search" value="{{old('search')}}">
                                          </div>
                                           <button type="submit" class="btn btn-info click"  id="search">Search</button> 
                                    </form></a>
                              </div>
                         </nav> 
                      </div>
                      <div class="box">
                          <div class="box-body">
                            <span style="color: red;font-size:20px">Found <span style="color: black">
                                      @if(isset($result_search))
                                        {{count($result_search)}}
                                      @else
                                          0
                                      @endif
                                    </span>Orders in date: <span style="color: black">
                                      @if(isset($date_search))
                                        {{date('d-m-Y',(strtotime($date_search)))}}
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
                                    @if(isset($result_search))
                                    @foreach($result_search as $rs)
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
                          @if(isset($result_search))
                          {{$result_search->links()}} 
                          @endif
                      </div>   
                 </div>       
            </div>   
         </div>                  
       </section>
    </div>
@stop