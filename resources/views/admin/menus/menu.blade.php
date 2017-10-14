@extends('admin.admin-master')
 @section('content')
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       <section class="content-header">
        <h1>
          Menu manage
          <small>List of Menus</small>
        </h1>
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
                      <a class="navbar-brand" class="mytile"><p>LIST OF MENU</p></a>
                    </div>
                    <form class="navbar-form navbar-left">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                      </div>
                      <button type="submit" class="btn btn-success">Search</button>

                      <a href="{{url('admin/product/add-menu')}}"><button type="button" class="btn btn-success mybtn">Add Menu</button></a>=======
            
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
                    <tr class="mytr">
                      <th class="myth">Menu Id</th>
                      <th class="myth">Menu name</th>
                      <th class="myth">Edit</th>
                      <th class="myth">Delete</th>
                    </tr>
                    @foreach($menus as $menu)
                    <tr>
                        <td >{{$menu->id}}</td>
                        <td >{{$menu->name}}</td>
                        <td ><span class="glyphicon glyphicon-pencil"></span><a href="{{url('admin/product/edit-menu/'.$menu->id)}}" style="color:red">Edit</a></td>
                        <td ><span class="glyphicon glyphicon-trash"></span><a href="{{url('admin/product/delete-menu/'.$menu->id)}}" style="color:red" class="delete">Delete</a></td>

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
