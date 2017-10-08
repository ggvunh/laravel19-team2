 @extends('admin.admin-master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product
        <small>Add Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product</a></li>
        <li class="active"><a href="#">Add product<a></li>
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
              <h3 class="box-title">ADD PRODUCT</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('admin.errors')
            <form role="form" action="{{url('admin')}}" method="post">
               {!!csrf_field()!!}
              <div class="box-body">
                <div class="form-group">
                  <label for="product-name">Product name</label>
                  <input type="text" name="product-name" class="form-control" id="product-name">
                </div>
                <div class="form-group">
                  <label for="product-cate">Product Category</label>
                  <select class="form-control" name="product-cate">               
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">2</option>
                  </select>  
                </div>
            </select>  
                <div class="form-group">
                  <label for="description">Descriptions</label>
                  <textarea name="description" id="description"  class="form-control" cols="30" rows="5"></textarea>
                <div class="form-group">
                  <label for="quantity">Quantities</label>
                  <input type="number" name="quantity" class="form-control" id="quantity">
                </div>
                <div class="form-group">
                  <label for="unitprice">Unit-Price</label>
                  <input type="text" name="unitprice" class="form-control" id="unitprice">
                </div>
                <div class="form-group">
                  <label for="promotion-price">Promotion-Price</label>
                  <input type="text" name="promotion-price" class="form-control" id="promotion-price">
                </div>
                <div class="form-group">
                  <label for="product_image">Product-Image</label>
                  <input type="file" id="product-image" name="product-image">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="add" class="btn btn-primary">Add</button>
              </div>
            </form>
          </div>   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @stop
