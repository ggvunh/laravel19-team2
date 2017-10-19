@extends('admin.admin-master')
 @section('content')
   <div class="content-wrapper nxp-admin">
    <!-- Content Header (Page header) -->
     <div id="ajax_loader" class="ajax-load-qa"><h2 class="loading">Loading...</h2></div>
       <section class="content-header">
        <h1>
          Brand
          <small>List of Brands</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{url('admin')}}" class="click"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="{{url('admin/brand/listbrands')}}" class="click">Brand</a></li>
          <li class="active"><a href="#">List of Brands<a></li>
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
                      <a class="navbar-brand" class="mytile"><p class="myp">LIST OF BRANDS</p></a>
                    </div>
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
                    <tr class="mytr" >
                      <th class="myth">Brand code</th>
                      <th class="myth">Brand name</th>
                      <th class="myth">Brand image</th>
                      <th class="myth">Edit</th>
                      <th class="myth">Delete</th>
                    </tr>
                    @foreach($brands as $brand)
                    <tr>
                        <td >{{$brand->id}}</td>
                        <td >{{$brand->name}}</td>
                        <td ><img src="{{asset('images/brand/'.$brand->logo)}}" alt="" style="width: 100px; height: 50px;"></td>
                        <td ><span class="glyphicon glyphicon-pencil"></span><a href="{{url('admin/brand/editbrands')}}/{{$brand->id}}" style="color:red" class="click">Edit</a></td>
                        <td ><span class="glyphicon glyphicon-trash"></span><a href="{{url('admin/brand/deletebrands')}}/{{$brand->id}}" style="color:red" class="simpleConfirm">Delete</a></td>
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
