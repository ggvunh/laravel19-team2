@extends('admin.admin-master')
@section('content')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper nxp-admin">
     <!-- Content Header (Page header) -->
     <div id="ajax_loader" class="ajax-load-qa"><h2 class="loading">Loading...</h2></div>
     <section class="content-header">
        <h1>
             Menu
             <small>Edit menu</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin')}}" class="click"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{url('admin/menu/manager-menu')}}" class="click">Menu</a></li>
            <li class="active"><a href="">Edit Menu<a></li>
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
                                 <a class="navbar-brand" class="mytile"><p class="myp">EDIT MENU</p></a>
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
                       <form class="form-horizontal" method="POST" action="updateMenu">
                           {{ csrf_field() }}
                           <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                               <label for="name" class="col-md-4 control-label">Menu Name</label>
                               @foreach($menu as $menu)
                                   <div class="col-md-6">
                                       <input type="hidden" name="id" value="{{$menu->id}}">
                                       <input type="text" class="form-control" name="name" value="{{$menu->name}}" autofocus>
                                   </div>
                               @endforeach
                           </div>
                           <div class="form-group">
                               <div class="col-md-6 col-md-offset-4">
                                   <button type="submit" class="btn btn-primary">
                                       update
                                   </button>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 @stop
