@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-left">
            </div>
            <div class="col-sm-9 col-right">
                <h2>Chi tiết sản phẩm</h2>
                @foreach($product as $a)
                <div class="col-sm-7">
                    <img class="nxpimg" src="images/products/{{ $a->image }}" alt="">
                </div>
                <div class="col-sm-5">
                    <p class="product-name">
                        <span class="nxp_namesp">{{ $a->name }}</span>
                    </p>
                    <p class="nxp_promotion_price">
                        Giá Ưu đãi:
                        <span class="price">{{number_format($a->promotion_price)}}</span>
                    </p>
                    <p class="old-price">
                        Giá Gốc:
                        <span class="price">{{number_format($a->unit_price)}}</span>
                    </p>
                    <p>Tình trạng: còn hàng</p>
                    <a href="#"><button class="btn btn-danger btn-cart">Add to cart</button></a>
                </div>
                <div class="clearfix">
                </div>
                <div class="product-tab tab-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#product-desc" data-toggle="tab">MÔ TẢ SẢN PHẨM</a></li>
                        <li><a href="#product-review" data-toggle="tab">HÌNH ẢNH LIÊN QUAN</a></li>
                        <li><a href="#product-tags" data-toggle="tab">VIDEO</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="product-desc">
                            {{$a->description}}
                        </div>
                        <div class="tab-pane" id="product-review">.sdfsdfd..</div>
                        <div class="tab-pane" id="product-tags">.dfsdfsd..</div>
                    </div>
                </div><!-- /.product-tab -->
                @endforeach
            </div>
        </div>
    </div>
@stop
