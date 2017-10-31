@extends('admin.admin-master')
 @section('content')
   <div class="content-wrapper nxp-admin">
    <!-- Content Header (Page header) -->
     <div id="ajax_loader" class="ajax-load-qa"><h2 class="loading">Loading...</h2></div>
       <section class="content-header">
        <h1>
          Category
          <small>List of Categories</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{url('admin')}}" class="click"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="{{url('admin/category/listcategories')}}" class="click">Category</a></li>
          <li><a href="#">List of Categories<a></li>
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
                                      <a class="navbar-brand" class="mytile"><p class="myp">LIST OF CATEGORY</p></a>
                                    </div>
                                </div>
                          </nav>
                        </div>
                          <a href="{{url('admin/category/addcategories/')}}" class="click"><button type="button" class="btn btn-info mybtn ">Add Category</button></a>
                        <div class="box">
                          <div class="box-body">
                              <table class="table table-bordered" id="mytable" border="0">
                                    <tr class="mytr" >
                                      <th class="myth">Category code</th>
                                      <th class="myth">Category name</th>
                                      <th class="myth">Edit</th>
                                      <th class="myth">Delete</th>
                                    </tr>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td >{{$category->id}}</td>
                                        <td >{{$category->name}}</td>
                                        <td ><span class="glyphicon glyphicon-pencil"></span><a href="{{url('admin/category/editcategories')}}/{{$category->id}}" style="color:red" class="click">Edit</a></td>
                                        <td ><span class="glyphicon glyphicon-trash"></span><a href="{{url('admin/category/deletecategories')}}/{{$category->id}}" style="color:red" class="simpleConfirm">Delete</a></td>
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
