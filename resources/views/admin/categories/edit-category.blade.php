@extends('admin.admin-master')
@section('content')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper nxp-admin">
   <!-- Content Header (Page header) -->
   <div id="ajax_loader" class="ajax-load-qa"><h2 class="loading">Loading...</h2></div>
   <section class="content-header">
     <h1>
       Product
       <small>Edit category</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{url('admin')}}" class="click"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="{{url('admin/category/listcategories')}}" class="click">Category</a></li>
       <li class="active"><a href="">Edit category<a></li>
     </ol>
   </section>
   <!-- Main content -->
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
                             <a class="navbar-brand" class="mytile"><p class="myp">EDIT CATEGORY</p></a>
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
                   <form role="form" action="{{url('admin/category/editcategories')}}/{{$category->id}}" method="post" id="form">
                      {!!csrf_field()!!}
                       <div class="form-group">
                          <label for="category-name">Category name</label>
                          <input type="text" name="category-name" class="form-control" id="category-name" value="{{$category->name}}">
                       </div>
                        @if ($errors->has('category-name'))
                             <span class="help-block">
                                 <strong>{{ $errors->first('category-name') }}</strong>
                             </span>
                        @endif
                       <div class="box-footer">
                           <button type="submit" name="add" class="btn btn-primary click">EDIT</button>
                       </div>
                   </form>
               </div>
           </div>
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 @stop
