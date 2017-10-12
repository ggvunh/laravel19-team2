@extends('admin.admin-master')
@section('content')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       User
       <small>Edit user</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{url('admin/product/listproduct')}}"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">User</a></li>
       <li class="active"><a href="">Edit user<a></li>
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
                             <a class="navbar-brand" class="mytile"><p>EDIT USERS</p></a>
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
                   <form role="form" action="{{url('admin/product/editusers')}}/{{$user->id}}" method="post" id="form">
                      {!!csrf_field()!!}
                       <div class="form-group">
                          <label for="user-name">User name</label>
                          <input type="text" name="user-name" class="form-control" id="user-name" value="{{$user->name}}">
                       </div>
                        @if ($errors->has('product-name'))
                             <span class="help-block">
                                 <strong>{{ $errors->first('product-name') }}</strong>
                             </span>
                        @endif
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Roles">Roles</label>
                            <select name="roles" id="roles" class="form-control">
                               <option value="0">User</option>
                               <option value="1">Admin</option>
                            </select>
                        </div>

                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}">
                       </div>
                        @if ($errors->has('product-name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('product-name') }}</strong>
                            </span>
                        @endif

                        <div class="form-group">
                          <label for="text">Address</label>
                          <input type="address" name="address" class="form-control" id="address" value="{{$user->address}}">
                        </div>
                        @if ($errors->has('product-name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('product-name') }}</strong>
                            </span>
                        @endif

                        <div class="form-group">
                          <label for="text">Phone number</label>
                          <input type="number" name="phone_number" class="form-control" id="phone_number" value="{{$user->phone_number}}">
                        </div>
                        @if ($errors->has('product-name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('product-name') }}</strong>
                            </span>
                        @endif

                       <div class="box-footer">
                           <button type="submit" name="add" class="btn btn-primary">EDIT</button>
                       </div>
                   </form>
               </div>
           </div>
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 @stop
