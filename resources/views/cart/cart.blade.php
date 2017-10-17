@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <div class="container">
                    <ul class="breadcrumb">
                    	<li><a href="#">Home</a></li>
                        <li class="active">Shopping Cart</li>
                   	</ul>
                </div>
            </div>
            <div class="main">
            	<div class="container">
                    <div class="cart">
                        <h2>CHI TIẾT GIỎ HÀNG</h2>
                        <div class="table-responsive">
                    	<table class="table custom-table">
                            <thead>
                                <tr class="first last">
                                    <th>Xóa</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên Sản phẩm</th>
                                    <th>Sửa</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\Cart::content() as $content)
                            	   <tr>
                    					<td class="text-center"><a class="btn-remove" href="{{url('deletecart/'.$content->rowId)}}"><span class="fa fa-trash-o"></span></a></td>
                    					<td><a class="product-image" title="Primis in faucibus" href="#">
                                        	<img alt="Primis in faucibus" src="{{asset('images/products/'.$content->options->img)}}">
                                        </a></td>
                    					<td>
                                        	<a href="#">{{$content->name}}</a>
                                            <div class="text-muted">Size: 42<br>
                                            Color: Red</div>
                                        </td>
                    					<td class="text-center"><a href="#">Edit</a></td>
                                		<td class="qty">
                                       		<input type="number" name="qty" value="{{$content->qty}}" style="text-align:center">
                                    	</td>
                                		<td class="subtotal">{{$content->price}}</td>
                        				<td class="grandtotal">{{$content->price*$content->qty}}</td>
            					    </tr>
                                @endforeach
                        	</tbody>
                        </table>
                        </div>
                        <div class="text-right">
                        	<a href="{{url('/')}}" class="btn btn-default btn-md">TIẾP TỤC MUA HÀNG</a>
                        </div>
                        <div class="line2"></div>
                        <div class="row">
                            <div class="col-sm-4">
                            	<h4>THÔNG TIN KHÁCH HÀNG</h4>
                                <p class="text-muted">Nhập thông tin nhận hàng.</p>
                                <div class="form-group">
                                	<label class="control-label">Tên Khách Hàng <em>*</em></label>
                                    <input class="form-control" type="text" name="" value="{{Auth::user()->name}}" disabled >
                                </div>
                                <div class="form-group">
                                	<label class="control-label">Địa chỉ <em>*</em></label>
                                    <input class="form-control" type="text" name="" value="{{Auth::user()->address}}" disabled>
                                </div>
                                <div class="form-group">
                                	<label class="control-label">Email <em>*</em></label>
                                    <input class="form-control" type="text" name="" value="{{Auth::user()->email}}" disabled>
                                </div>
                                <div class="form-group">
                                	<label class="control-label">Số Điện Thoại <em>*</em></label>
                                    <input class="form-control" type="text" name="" value="{{Auth::user()->phone_number}}" disabled>
                                </div>
                            </div>
                            <form  action="checkout" method="GET">
                            	<div class="col-sm-4">
                                    <h4>THÔNG TIN NHẬN HÀNG</h4>
                                    <p class="text-muted">Nhập thông tin nhận hàng.</p>
                                    <div class="form-group">
                                    	<label class="control-label">Địa chỉ nhận hàng <em>*</em></label>
                                        <input class="form-control" type="text" name="address" value="{{Auth::user()->address}}" >
                                    </div>
                                    <div class="form-group">
                                    	<label class="control-label">Ghi Chú </label>
                                        <input class="form-control" type="text" name="note" value="{{'tên:' .Auth::user()->name.' số ĐT:'.Auth::user()->phone_number}}"  >
                                    </div>
                                </div>
                            	<div class="col-sm-4">
                                	<table class="table table-cart-total">
                                    	<tr>
                                        	<td>Tổng Tiền:</td>
                                            <td class="text-right">{{\Cart::total()}}</td>
                                        </tr>
                                    	<tr>
                                        	<td>Số Tiền Phải Thanh Toán:</td>
                                            <td class="text-right">{{\Cart::total()}}</td>
                                        </tr>
                                    </table>
        							<div class="text-right">
                                    	<p><button type="submit" class="btn btn-default btn-md fwb">THANH TOÁN</button></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.main -->
        </div>
    </div>
@stop