 @extends('admin.admin-master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div id="ajax_loader" class="ajax-load-qa"><h2 class="loading">Loading...</h2></div> 
    <section class="content-header">
      <h1>
        Category
        <small>Add product category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin')}}" class="click"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/product/listcategories')}}" class="click">Category</a></li>
        <li class="active"><a href="#">Add category<a></li>
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
              <h3 class="box-title">ADD CATEGORY</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

           
            <form role="form" action="{{url('admin/product/addcategories')}}" method="post">
               {!!csrf_field()!!}
              <div class="box-body">
                <div class="form-group">
                  <label for="cateproduct-name">Category name</label>
                  <input type="text" name="cateproduct-name" class="form-control" id="cateproduct-name">
                </div>
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
