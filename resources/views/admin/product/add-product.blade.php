 @extends('admin.admin-master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper nxp-admin">
    <!-- Content Header (Page header) -->
    <div id="ajax_loader" class="ajax-load-qa"><h2 class="loading">Loading...</h2></div>
    <section class="content-header">
          <h1>
                Product
                <small>Add product</small>
          </h1>
          <ol class="breadcrumb">
                <li><a href="{{url('admin')}}" class="click"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{url('admin/product/listproduct')}}" class="click">Product</a></li>
                <li><a href="#" class="click">Add product<a></li>
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
                                    <a class="navbar-brand" class="mytile"><p class="myp">ADD PRODUCTS</p></a>
                                 </div>
                                 <form class="navbar-form navbar-left" action="{{url('admin/product/searchproduct')}}" method="GET">
                                      <div class="form-group">
                                          <input type="text" class="form-control" placeholder="Search" name="search">
                                      </div>
                                      <button type="submit" class="btn btn-info click">Search</button>
                                      <a href="{{url('admin/product/addproduct')}}" class="click"><button type="button" class="btn btn-info mybtn">Add Product</button></a>
                                 </form>
                            </div>
                        </nav>
                   </div>
                   <div class="box">
                        <div class="box-body">
                            <form action="{{url('admin/product/addproduct')}}" method="post" id="form"  enctype="multipart/form-data">
                                  {!!csrf_field()!!}
                                        <div class="form-group">
                                           <label for="product-name">Product name</label>
                                           <input type="text" name="product-name" class="form-control" id="product-name" value="{{old('product-name')}}">
                                        </div>
                                        @if ($errors->has('product-name'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('product-name') }}</strong>
                                              </span>
                                         @endif
                                        <div class="form-group">
                                             <label for="product-cate">Product Category</label>
                                             <select class="form-control" name="product-cate" style ="color: red">                                               @foreach($category as $ct)
                                                <option value="{{$ct->id}}">{{$ct->name}}</option>
                                                @endforeach
                                             </select>
                                        </div>
                                        <div class="form-group">
                                             <label for="product-brand">Product Brand</label>
                                             <select class="form-control" name="product-brand" style ="color: red">                                               @foreach($brand as $br)
                                                <option value="{{$br->id}}">{{$br->name}}</option>
                                                @endforeach
                                             </select>
                                        </div>
                                        <div class="form-group">
                                               <label for="description">Product description</label>
                                               <textarea name="description" id="description"  class="form-control" cols="30" rows="5">{{old('description')}}</textarea>
                                        </div>
                                         @if ($errors->has('description'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('description') }}</strong>
                                              </span>
                                         @endif
                                        <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input type="number" name="quantity" class="form-control" id="quantity" min="1" value="{{old('quantity')}}">
                                        </div>
                                          @if ($errors->has('quantity'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('quantity') }}</strong>
                                              </span>
                                         @endif
                                        <div class="form-group">
                                            <label for="unitprice">Unit Price</label>
                                            <input type="number" name="unitprice" class="form-control" id="unitprice" min="1" value="{{old('unitprice')}}">
                                        </div>
                                         @if ($errors->has('unitprice'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('unitprice') }}</strong>
                                              </span>
                                         @endif
                                        <div class="form-group">
                                            <label for="promotion-price">Promotion-Price</label>
                                            <input type="number" name="promotion-price" class="form-control" id="promotion-price" min="1" value="{{old('promotion-price')}}">
                                        </div>
                                         @if ($errors->has('promotion-price'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('promotion-price') }}</strong>
                                              </span>
                                         @endif
                                        <div class="form-group">
                                            <label for="unit">Unit</label>
                                            <input type="text" name="unit" class="form-control" id="unit" value="{{old('unit')}}">
                                        </div>
                                       @if ($errors->has('unit'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('unit') }}</strong>
                                            </span>
                                       @endif
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
                                             <label for="product-image">Product image</label>
                                             <input type="file" id="product-image" name="product-image">
                                        </div>
                                         @if ($errors->has('product-image'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('product-image') }}</strong>
                                              </span>
                                         @endif
                                  <div class="box-footer">
                                      <button type="submit" name="add" class="btn btn-primary click">SAVE</button>
                                  </div>
                            </form>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @stop
