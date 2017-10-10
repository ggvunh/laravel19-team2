@extends('admin.product.admin-master')
 @section('content')
   <div class="content-wrapper">
   	<!-- Content Header (Page header) -->
       <section class="content-header">
	      <h1>
	        Sản phẩm
	        <small>Danh sách sản phẩm</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="{{url('admin/product/listproduct')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li><a href="#">Sản phẩm</a></li>
	        <li class="active"><a href="{{url('admin/product/listproduct')}}">Danh sách sản phẩm<a></li>
	      </ol>
       </section>
       <section class="content">
          <div class="row">
        <!-- left column -->
	          <div class="col-md-12">
	          <!-- general form elements -->
	               <div class="box box-primary">
	                    <div class="box-header with-border">
	                        <h3 class="box-title">DANH SÁCH SẢN PHẨM</h3>
	                    </div>
	                    @if(session('infor'))    <!-- display infor -->
			               <div class="alert alert-success">
			                   <p>{{ session('infor') }}</p>
			               </div>
                        @endif
	                    <table class="table table-bordered" id="mytable" border="1">
						    <tr>
							    <th>Mã sản phẩm</th>
							    <th>Hình ảnh sản phẩm</th>
							    <th>Tên sản phẩm</th>
							    <th>Loại sản phẩm</th>
							    <th>Số lượng</th>
							    <th>Đơn vị</th>
							    <th>Đơn giá sản phẩm</th>
							    <th>Giá ưu đãi</th>
							    <th>Sửa</th>
							    <th>Xóa</th>
						    </tr>
						    @foreach($data as $dt)
						    <tr>
						        <td>{{$dt->id}}</td>	
						        <td>{{$dt->image}}</td>
						        <td>{{$dt->name}}</td>
						        <td>{{$dt->Category->name}}</td>
						        <td>{{$dt->quantity}}</td>
						        <td>{{$dt->unit}}</td>
						        <td>{{$dt->unit_price}}</td>
						        <td>{{$dt->promotion_price}}</td>
						        <td><a href="{{url('admin/product/editproduct')}}/{{$dt->id}}">Sửa</a></td>
						        <td><a href="{{url('admin/product/deleteproduct')}}/{{$dt->id}}">Xóa</a></td>
						    </tr>  
						    @endforeach  
                            {{$data->links()}}
                        </table> 
	                </div>   
	          </div>
          </div>
        </section>
   </div>
 @stop