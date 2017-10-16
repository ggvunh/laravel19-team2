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
                    	<form>
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
                        	<a href="#" class="btn btn-default btn-md">TIẾP TỤC MUA HÀNG</a>
                            <button type="submit" class="btn btn-danger btn-md">MUA HÀNG</button>
                        </div>
                        <div class="line2"></div>
                        <div class="row">
                        	<div class="col-sm-4">
                            	<h4>ESTIMATE SHIPPING AND TAX</h4>
                                <p class="text-muted">Nhập thông tin ship hàng &amp; thuế</p>
                                <div class="form-group">
                                	<label class="control-label">Quốc gia <em>*</em></label>
                                    <select class="form-control">
                                    	<option>-- Select options  --</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                	<label class="control-label">Tỉnh/Thành phố <em>*</em></label>
                                    <select class="form-control">
                                    	<option>-- Select options  --</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                	<label class="control-label">Mã Zip / Mã Bưu điện</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                	<button type="button" class="btn btn-default btn-md">GET A QUOTE</button>
                                </div>
                            </div>
                        	<div class="col-sm-4">
                            	<h4>DISCOUNT CODE</h4>
                            	<p class="text-muted">Enter your coupon code if you have one</p>
                                <div class="form-group">
                                	<label class="control-label">&nbsp;</label>
                                	<input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                	<button type="button" class="btn btn-default btn-md">APPLY COUPON</button>
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
                                	<p><button type="button" class="btn btn-default btn-md fwb">PROCCED TO CHECKOUT</button></p>
                                    <p><a href="#" class="text-muted">Checkout with multiples address</a></p>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.main -->
        </div>
    </div>
@stop
