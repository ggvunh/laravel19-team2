@extends('admin.admin-master')
@section('content')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Brand
       <small>Add Brand</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{url('admin/product/listproduct')}}"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Brand</a></li>
       <li class="active"><a href="{{url('admin/brand/addbrands')}}">Add brand<a></li>
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
             <h3 class="box-title">ADD BRAND</h3>
           </div>
           <!-- /.box-header -->
           <!-- form start -->

           @if(session('infor'))    <!-- display infor -->
              <div class="alert alert-success">
                  <p>{{ session('infor') }}</p>
              </div>
           @endif
           <form role="form" action="{{url('admin/brand/addbrands')}}" method="post" enctype="multipart/form-data">
              {!!csrf_field()!!}
             <div class="box-body">
               <div class="form-group">
                 <label for="brand-name">Brand name</label>
                 <input type="text" name="brand-name" class="form-control" id="brand-name">
               </div>
               @if ($errors->has('brand-name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('brand-name') }}</strong>
                    </span>
               @endif

               <div class="form-group">
                    <label for="product-image">Brand image</label>
                    <input type="file" id="brand-image" name="brand-image">
               </div>
               @if ($errors->has('brand-image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('brand-name') }}</strong>
                    </span>
               @endif
             <!-- /.box-body -->
             <div class="box-footer">
               <button type="submit" name="add" class="btn btn-primary">ADD</button>
             </div>
           </form>
         </div>
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 @stop
