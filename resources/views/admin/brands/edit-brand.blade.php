@extends('admin.admin-master')
@section('content')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div id="ajax_loader" class="ajax-load-qa"><h2 class="loading">Loading...</h2></div> 
   <section class="content-header">
     <h1>
       Product
       <small>Edit brand</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{url('admin')}}" class="click"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="{{url('admin/brand/listbrands')}}" class="click">Brand</a></li>
       <li class="active"><a href="">Edit brand<a></li>
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
                             <a class="navbar-brand" class="mytile"><p class="myp">EDIT BRAND</p></a>
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
                   <form role="form" action="{{url('admin/brand/editbrands')}}/{{$brand->id}}" method="post" id="form" enctype="multipart/form-data">
                      {!!csrf_field()!!}
                       <div class="form-group">
                          <label for="brand-name">Brand name</label>
                          <input type="text" name="brand-name" class="form-control" id="brand-name" value="{{$brand->name}}">
                       </div>
                        @if ($errors->has('brand-name'))
                             <span class="help-block">
                                 <strong>{{ $errors->first('brand-name') }}</strong>
                             </span>
                        @endif
                        <div class="form-group">
                             <label for="brand-image">Brand image</label>
                             <input type="file" id="brand-image" name="brand-image" value="{{$brand->logo}} " >
                        </div>
                         @if ($errors->has('brand-image'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('brand-image') }}</strong>
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
