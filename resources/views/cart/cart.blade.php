@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <form  action="{{url('dat-hang/checkout')}}" method="GET">
                <meta name="token" content="{{ csrf_token() }}">
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
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\Cart::content() as $content)
                            	   <tr>
                    					<td class="text-center"><a class="btn-remove" href="{{url('dat-hang/deletecart/'.$content->rowId)}}"><span class="fa fa-trash-o"></span></a></td>
                    					<td><a class="product-image" title="Primis in faucibus" href="#">
                                        	<img alt="Primis in faucibus" src="{{asset('images/products/'.$content->options->img)}}">
                                        </a></td>
                    					<td>
                                        	<a href="#">{{$content->name}}</a>
                                            <div class="text-muted">Size: 42<br>
                                            Color: Red</div>
                                        </td>
                                		<td class="qty" id="{{$content->rowId}}">
                                       		<input type="number" class="qty1" name="qty" value="{{$content->qty}}" style="text-align:center">
                                    	</td>
                                		<td class="subtotal">{{$content->price}}</td>
                        				<td id="price_pro" class="grandtotal">{{$content->price*$content->qty}}</td>
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
                                    <div class="form-group">
                                    	<label class="control-label">Ngày order </label><br>
                                        <input class="form-control" name="date_oder" type="date" id="date" value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                </div>
                            	<div class="col-sm-4">
                                	<table class="table table-cart-total">
                                    	<tr>
                                        	<td>Tổng Tiền:</td>
                                            <td id="total" class="text-right">{{\Cart::total()}}</td>
                                        </tr>
                                    	<tr>
                                        	<td>Số Tiền Phải Thanh Toán:</td>
                                            <td id="total" class="text-right">{{\Cart::total()}}</td>
                                        </tr>
                                    </table>
        							<div class="text-right">
                                    	   <p><button type="submit" class="btn btn-default btn-md fwb" >THANH TOÁN</button></p>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div><!-- /.main -->
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".qty1").click(function(){
                $qty = $(this).val();
                $rowid = $(this).attr('id');
                $.ajax({
                        type: "GET",
                        url: 'dat-hang/update_qty_cart/'+$rowid+'/'+$qty,
                        data: {"id":$rowid, "qty":$qty },
                        success:function(data){
                           $('#price_pro').text(data);
                        }
                    });
            });
        });
    </script>
    <!-- <script>
        $(document).ready(function(){
            $(".qty").click( function(){
                var rowid = $(this).attr('id');
                var qty = $(this).find(".qty1").val();
                var token = $("input[name = 'token']").val();
                if(qty<=0){
                    alert('số lượng lớn hơn 0');
                }else {
                    $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                      }
                    });
                        $.ajax({
                            type: "GET",
                            url: 'dat-hang/update_qty_cart/'+rowid+'/'+qty,
                            data: {"token":token, "id":rowid, "qty":qty },
                            success:function(data){
                                alert(data);
                            },error:function(){
                                alert("error!!!!");
                            }
                        });
                    }
            });
        });
    </script> -->
@stop
