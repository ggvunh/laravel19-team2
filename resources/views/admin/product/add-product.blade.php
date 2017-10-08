 @extends('admin.product.admin-master')
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
        <li class="active"><a href="{{url('admin/product/addproduct')}}">Add product<a></li>
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
            @include('admin.product.errors') <!-- display errors -->
            @if(session('infor'))    <!-- display infor -->
               <div class="alert alert-success">
                   <p>{{ session('infor') }}</p>
               </div>
            @endif
            <form role="form" action="{{url('admin/product/addproduct')}}" method="post">
               {!!csrf_field()!!}
              <div class="box-body">
                <div class="form-group">
                  <label for="product-name">Product name</label>
                  <input type="text" name="product-name" class="form-control" id="product-name">
                </div>
                <div class="form-group">
                  <label for="product-cate">Product Category</label>
                  <select class="form-control" name="product-cate">               
                    @foreach($data as $dt)
                    <option value="{{$dt->id}}">{{$dt->name}}</option>
                    @endforeach
                  </select>  
                </div>
            </select>  
                <div class="form-group">
                  <label for="description">Descriptions</label>
                  <textarea name="description" id="description"  class="form-control" cols="30" rows="5"></textarea>
                <div class="form-group">
                  <label for="quantity">Quantities</label>
                  <input type="number" name="quantity" class="form-control" id="quantity" min="1">
                </div>
                <div class="form-group">
                  <label for="unitprice">Unit-Price</label>
                  <input type="number" name="unitprice" class="form-control" id="unitprice" min="1">
                </div>
                <div class="form-group">
                  <label for="promotion-price">Promotion Price</label>
                  <input type="number" name="promotion-price" class="form-control" id="promotion-price" min="1">
                </div>
                <div class="form-group">
                  <label for="unit">Unit</label>
                  <input type="text" name="unit" class="form-control" id="unit">
                </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <select name="status" id="status" class="form-control">
                    <option value="1">Hot</option>
                    <option value="0">Normal</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="version">Version</label>
                  <select name="version" id="version" class="form-control">
                    <option value="0">Old</option>
                    <option value="1">New</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="deals">Deals</label>
                  <select name="deals" id="deals" class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="product-image">Product-Image</label>
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
