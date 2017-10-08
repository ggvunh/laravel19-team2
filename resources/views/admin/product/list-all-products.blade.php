@extends('admin.product.admin-master')
 @section('content')
   <div class="content-wrapper">
   	<!-- Content Header (Page header) -->
       <section class="content-header">
	      <h1>
	        Product
	        <small>List All Products</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li><a href="#">Product</a></li>
	        <li class="active"><a href="{{url('admin/product/listproduct')}}"> List All products<a></li>
	      </ol>
       </section>
       <section class="content">
          <div class="row">
        <!-- left column -->
	          <div class="col-md-12">
	          <!-- general form elements -->
	               <div class="box box-primary">
	                    <div class="box-header with-border">
	                        <h3 class="box-title">LIST ALL PRODUCTS</h3>
	                    </div>
	                    @if(session('infor'))    <!-- display infor -->
			               <div class="alert alert-success">
			                   <p>{{ session('infor') }}</p>
			               </div>
                        @endif
	                    <table class="table table-bordered" id="mytable" border="1">
						    <tr>
							    <th>Product Code</th>
							    <th>Product Image</th>
							    <th>Product Name</th>
							    <th>Product Category</th>
							    <th>Quantity</th>
							    <th>Unit</th>
							    <th>Unit-Price</th>
							    <th>Promotion-Price</th>
							    <th>Edit</th>
							    <th>Delete</th>
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
						        <td><a href="{{url('admin/product/editproduct')}}/{{$dt->id}}">Edit</a></td>
						        <td><a href="{{url('admin/product/deleteproduct')}}/{{$dt->id}}">Delete</a></td>
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