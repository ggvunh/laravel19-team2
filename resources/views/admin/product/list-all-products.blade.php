@extends('admin.admin-master')
 @section('content')
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <section class="content-header">
        <h1>
          Product
          <small>List of Products</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{url('admin/product/listproduct')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Product</a></li>
          <li class="active"><a href="{{url('admin/product/listproduct')}}">List of Products<a></li>
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
                      <a class="navbar-brand" class="mytile"><p>LIST OF PRODUCTS</p></a>
                    </div>
                    <form class="navbar-form navbar-left">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                      </div>
                      <button type="submit" class="btn btn-info">Search</button>
                      <a href="{{url('admin/product/addproduct')}}"><button type="button" class="btn btn-info mybtn">Add Product</button></a>
                    </form>
                  </div>
                           </nav>
                      </div>
                      @if(session('infor'))    <!-- display infor -->
                     <div class="alert alert-success">
                         <p>{{ session('infor') }}</p>
                     </div>
                        @endif
                        <div class="box">
                          <div class="box-body">
                          <table class="table table-bordered" id="mytable" border="0">
                    <tr class="mytr">
                      <th class="myth">Product code</th>
                      <th class="myth">Product image</th>
                      <th class="myth">Product name</th>
                      <th class="myth">Product category</th>
                      <th class="myth">Description</th>
                      <th class="myth">Quantity</th>
                      <th class="myth">Unit</th>
                      <th class="myth">Unit-Price</th>
                      <th class="myth">Promotion-Price</th>
                      <th class="myth">Edit</th>
                      <th class="myth">Delete</th>
                    </tr>
                    @foreach($product as $dt)
                    <tr>
                        <td >{{$dt->id}}</td>
                        <td >{{$dt->image}}</td>
                        <td >{{$dt->name}}</td>
                        <td >{{$dt->Category->name}}</td>
                        <td >{{$dt->description}}</td>
                        <td >{{$dt->quantity}}</td>
                        <td >{{$dt->unit}}</td>
                        <td >{{$dt->unit_price}}</td>
                        <td >{{$dt->promotion_price}}</td>
                        <td ><span class="glyphicon glyphicon-pencil"></span><a href="{{url('admin/product/editproduct')}}/{{$dt->id}}" style="color:red">Edit</a></td>
                        <td ><span class="glyphicon glyphicon-trash"></span><a href="{{url('admin/product/deleteproduct')}}/{{$dt->id}}" style="color:red" class="delete">Delete</a></td>
                    </tr>
                    @endforeach
                            </table>
                            </div>
                      </div>
                      {{$product->links()}}
                 </div>
            </div>
         </div>
        </section>
   </div>
 @stop
