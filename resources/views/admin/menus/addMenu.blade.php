@extends('admin.admin-master')
@section('content')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper nxp-admin">
   <!-- Content Header (Page header) -->
   <div id="ajax_loader" class="ajax-load-qa"><h2 class="loading">Loading...</h2></div>
   <section class="content-header">
     <h1>
       Menu
       <small>Add Menu</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{url('admin')}}" class="click"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="{{url('admin/menu/manager-menu')}}" class="click">Menu</a></li>
       <li class="active"><a href="#">Add menu<a></li>
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
             <h3 class="box-title">ADD Menu</h3>
           </div>
           <!-- /.box-header -->
           <!-- form start -->
           <form class="form-horizontal" method="POST" action="createMenu">
               {{ csrf_field() }}
               <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                   <label for="name" class="col-md-4 control-label">Menu Name</label>
                   <div class="col-md-6">
                       <input id="name" name="menu" type="text" class="form-control" value="{{ old('menu') }}"autofocus placeholder="enter name menu"><br>
                       @if ($errors->has('menu'))
                            <span class="help-block">
                                <strong>{{ $errors->first('menu') }}</strong>
                            </span>
                       @endif
                   </div>
               </div>
               <div class="form-group">
                   <div class="col-md-6 col-md-offset-4">
                       <button type="submit" class="btn btn-primary">
                           save
                       </button>
                   </div>
               </div>
           </form>
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 @stop
