 @extends('admin.product.admin-master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sản phẩm
        <small>Thêm loại sản phẩm</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin/product/listproduct')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sản phẩm</a></li>
        <li class="active"><a href="{{url('admin/product/addcategory')}}">Thêm loại sản phẩm<a></li>
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
              <h3 class="box-title">THÊM SẢN PHẨM</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('admin.product.errors') <!-- display errors -->
            @if(session('infor'))    <!-- display infor -->
               <div class="alert alert-success">
                   <p>{{ session('infor') }}</p>
               </div>
            @endif
            <form role="form" action="{{url('admin/product/addcategory')}}" method="post">
               {!!csrf_field()!!}
              <div class="box-body">
                <div class="form-group">
                  <label for="cateproduct-name">Tên loại sản phẩm</label>
                  <input type="text" name="cateproduct-name" class="form-control" id="cateproduct-name">
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="add" class="btn btn-primary">THÊM</button>
              </div>
            </form>
          </div>   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @stop
