 @extends('admin.product.admin-master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sản phẩm
        <small>Thêm sản phẩm</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin/product/listproduct')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sản phẩm</a></li>
        <li class="active"><a href="{{url('admin/product/addproduct')}}">Thêm sản phẩm<a></li>
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
            <form role="form" action="{{url('admin/product/addproduct')}}" method="post">
               {!!csrf_field()!!}
              <div class="box-body">
                <div class="form-group">
                  <label for="product-name">Tên sản phẩm</label>
                  <input type="text" name="product-name" class="form-control" id="product-name">
                </div>
                <div class="form-group">
                  <label for="product-cate">Loại sản phẩm</label>
                  <select class="form-control" name="product-cate">               
                    @foreach($category as $ct)
                    <option value="{{$ct->id}}">{{$ct->name}}</option>
                    @endforeach
                  </select>  
                </div>
            </select>  
                <div class="form-group">
                  <label for="description">Mô tả sản phẩm</label>
                  <textarea name="description" id="description"  class="form-control" cols="30" rows="5"></textarea>
                <div class="form-group">
                  <label for="quantity">Số lượng sản phẩm</label>
                  <input type="number" name="quantity" class="form-control" id="quantity" min="1">
                </div>
                <div class="form-group">
                  <label for="unitprice">Đơn giá sản phẩm</label>
                  <input type="number" name="unitprice" class="form-control" id="unitprice" min="1">
                </div>
                <div class="form-group">
                  <label for="promotion-price">Giá ưu đãi</label>
                  <input type="number" name="promotion-price" class="form-control" id="promotion-price" min="1">
                </div>
                <div class="form-group">
                  <label for="unit">Đơn vị sản phẩm</label>
                  <input type="text" name="unit" class="form-control" id="unit">
                </div>
                <div class="form-group">
                  <label for="status">Sản phẩm hot</label>
                  <select name="status" id="status" class="form-control">
                    <option value="1">Có</option>
                    <option value="0">Không</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="version">Sản phẩm mới</label>
                  <select name="version" id="version" class="form-control">
                    <option value="0">Không</option>
                    <option value="1">Có</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="deals">Ưu đãi</label>
                  <select name="deals" id="deals" class="form-control">
                    <option value="1">Có</option>
                    <option value="0">Không</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="product-image">Hình ảnh sản phẩm</label>
                  <input type="file" id="product-image" name="product-image">
                </div>
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
