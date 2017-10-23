@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-left">
            </div>
            <div class="col-sm-9 col-right">
                <h2>Chi tiết sản phẩm</h2>
                @foreach($product as $product)
                <div class="col-sm-7">
                    <img class="nxpimg" src="images/products/{{ $product->image }}" alt="">
                </div>
                <div class="col-sm-5">
                    <p class="product-name">
                        <span class="nxp_namesp">{{ $product->name }}</span>
                    </p>
                    <p class="nxp_promotion_price">
                        Giá Ưu đãi:
                        <span class="price">{{number_format($product->promotion_price)}}</span>
                    </p>
                    <p class="old-price">
                        Giá Gốc:
                        <span class="price">{{number_format($product->unit_price)}}</span>
                    </p>
                    <p>Tình trạng: còn hàng</p>
                    <div class="form-group">
                        <div class="">
                            <label class="ngp-grup">Số lượng:</label>
                        </div>

                        <div class="input-group qty">
                            <input type="number" name="qty" value="1" style="text-align:center;">
                        </div><!-- /input-group -->
                        <div class="">
                            <a href="{{url('dat-hang/add-cartviewdetail/'.$product->id.'/'.$product->name)}}"><button class="btn btn-danger btn-cart">Add to cart</button></a>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                </div>
                <div class="product-tab tab-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#product-desc" data-toggle="tab">SẢN PHẨM LIÊN QUAN</a></li>
                        <li><a href="#product-review" data-toggle="tab">MÔ TẢ SẢN PHẨM</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="product-desc">
                            @foreach($products as $product)
                                <div class="col-md-4 col-sm-6">
                                <div class='productslider-item item'>
                                    <div class="item-inner">
                                        <div class="images-container">
                                            <div class="product_icon">
                                                @if(($product->new)==1)
                                                    <div class='new-icon'><span>new</span></div>
                                                @endif
                                            </div>
                                            <div class="product_icon">
                                                @if(($product->deals)==1)
                                                    <div class='sale-icon'><span>sale</span></div>
                                                @endif
                                            </div>
                                            <a href="#" title="Nunc facilisis" class="product-image">
                                                <img src="images/products/{{ $product->image }}" alt="Nunc facilisis" />
                                            </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a href="{{url('xem_chitiet/'.$product->id.'&'.$product->category_id)}}" class="link-quickview">Xem chi tiết</a></li>
                                                    <li><a href="#" class="link-cart">Mua hàng</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="des-container">
                                            <h2 class="product-name"><a href="#" title="Nunc facilisis">{{$product->name}}</a></h2>
                                            <div class="price-box">
                                                <p class="special-price">
                                                    <span class="price-label">gia khuyenmai</span>
                                                    <span class="price">{{number_format($product->promotion_price)}}</span>
                                                </p>
                                                <p class="old-price">
                                                    <span class="price-label">gia goc: </span>
                                                    <span class="price">{{number_format($product->unit_price)}}</span>
                                                </p>
                                            </div>
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:67%"></div>
                                                </div>
                                                <span class="amount"><a href="#">3 Review(s)</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="clearfix"></div>
                            {{$products->links()}}
                        </div>
                        <div class="tab-pane" id="product-review">
                            {{$product->description}}
                        </div>
                    </div>
                </div><!-- /.product-tab -->
                @endforeach
            </div>
        </div>
    </div>
@stop
