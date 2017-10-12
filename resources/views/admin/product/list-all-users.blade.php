@extends('admin.admin-master')
 @section('content')
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <section class="content-header">
        <h1>
          Category
          <small>List of User</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{url('admin/product/listcategory')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Category</a></li>
          <li class="active"><a href="{{url('admin/product/listuser')}}">List of Users<a></li>
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
                      <a class="navbar-brand" class="mytile"><p>LIST OF USERS</p></a>
                    </div>
                    <form class="navbar-form navbar-left">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                      </div>
                      <button type="submit" class="btn btn-info">Search</button>
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
                    <tr class="mytr" >
                      <th class="myth">User code</th>
                      <th class="myth">User name</th>
                      <th class="myth">Gender</th>
                      <th class="myth">Roles</th>
                      <th class="myth">Email</th>
                      <th class="myth">Address</th>
                      <th class="myth">Phone Number</th>
                      <th class="myth">Edit</th>
                      <th class="myth">Delete</th>
                    </tr>
                    @foreach($users as $user)
                    <tr>
                        <td >{{$user->id}}</td>
                        <td >{{$user->name}}</td>
                        <td >{{$user->gender}}</td>
                        <td >{{$user->roles}}</td>
                        <td >{{$user->email}}</td>
                        <td >{{$user->address}}</td>
                        <td >{{$user->phone_number}}</td>
                        <td ><span class="glyphicon glyphicon-pencil"></span><a href="{{url('admin/product/editusers')}}/{{$user->id}}" style="color:red">Edit</a></td>
                        <td ><span class="glyphicon glyphicon-trash"></span><a href="{{url('admin/product/deleteusers')}}/{{$user->id}}" style="color:red" class="delete">Delete</a></td>
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
