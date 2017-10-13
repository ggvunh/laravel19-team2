 @extends('admin.admin-master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
        <small>Add category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin/product/listproduct')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">category</a></li>
        <li class="active"><a href="{{url('admin/category/addcategories')}}">Add category<a></li>
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

            @if(session('infor'))    <!-- display infor -->
               <div class="alert alert-success">
                   <p>{{ session('infor') }}</p>
               </div>
            @endif
            <form role="form" action="{{url('admin/category/addcategories')}}" method="post">
               {!!csrf_field()!!}
              <div class="box-body">
                <div class="form-group">
                  <label for="cateproduct-name">Category name</label>
                  <input type="text" name="cateproduct-name" class="form-control" id="cateproduct-name">
                </div>
                @if ($errors->has('cateproduct-name'))
                     <span class="help-block">
                         <strong>{{ $errors->first('cateproduct-name') }}</strong>
                     </span>
                @endif
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
