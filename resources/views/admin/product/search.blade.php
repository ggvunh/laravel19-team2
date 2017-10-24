
 @extends('admin.admin-master')
 @section('content')
  <div class="content-wrapper nxp-admin">
    <!-- Content Header (Page header) -->
    <div id="ajax_loader" class="ajax-load-qa"><h2 class="loading">Loading...</h2></div>
     <section class="content-header">
          <h1>
            Product
            <small>List of Products</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="{{url('admin/product/listproduct')}}">Product</a></li>
              <li><a href="#">List of Products<a></li>
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
                                      <a class="navbar-brand" class="mytile"><p class="myp">LIST OF PRODUCTS</p></a>
                                    </div>
                                    <form class="navbar-form navbar-left" action="{{url('admin/product/searchproduct')}}" method="GET">
                                          <div class="form-group">
                                              <input type="text" class="form-control" placeholder="Search" id="search" name="search">
                                          </div>
                                           <button type="submit" class="btn btn-info"  id="search">Search</button>
                                          <a href="{{url('admin/product/addproduct')}}" class="click"><button type="button" class="btn btn-info mybtn">Add Product</button></a>
                                    </form>
                              </div>
                         </nav>
                      </div>
                      <div class="box">
                          <div class="box-body">
                            <span style="color: red;font-size:20px">Found <span style="color: black">{{count($products)}}</span> products</span>
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
                                    @foreach($result_search as $dt)
                                    <tr>
                                          <td >{{$dt->id}}</td>
                                          <td ><img src="{{asset('images/products/'.$dt->image)}}" alt="" style="width: 50px; height: 50px;"> </td>
                                          <td >{{$dt->name}}</td>
                                          <td >{{$dt->Category->name}}</td>
                                          <td >{{$dt->description}}</td>
                                          <td >{{$dt->quantity}}</td>
                                          <td >{{$dt->unit}}</td>
                                          <td >{{number_format($dt->unit_price)}}<span>&nbsp&nbsp&nbsp</span><span style="color: red">VNĐ</span></td>
                                          <td >{{number_format($dt->promotion_price)}}<span>&nbsp&nbsp&nbsp</span><span style="color: red">VNĐ</span></td>
                                          <td ><span class="glyphicon glyphicon-pencil"></span><a href="{{url('admin/product/editproduct')}}/{{$dt->id}}" style="color:red" class="click">Edit</a></td>
                                          <td ><span class="glyphicon glyphicon-trash"></span><a href="{{url('admin/product/deleteproduct')}}/{{$dt->id}}" style="color:red" class="simpleConfirm">Delete</a></td>
                                    </tr>
                                    @endforeach
                                </table>
                          </div>
                          {{$result_search->links()}}
                      </div>
                 </div>
            </div>
         </div>
       </section>
   </div>
 @stop
