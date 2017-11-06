@extends('master')
@section('content')
    <div class="main">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-left">
                <img src="images/lienhe.gif" alt="lien he qc" style="max-width:100%; margin-top: 20px; min-width:100%">
                <form class="form-search-nxp" method="GET" action="search-is-price">
                    <div class="form-nxp">
                        <h3>Tìm theo giá</h3>
                    </div>
                    <label class="nxp-111"><b>Từ(*)</b></label>
                    <input type="number" min="0" name="keymin" value="{{ isset($_GET['keymin']) ? $_GET['keymin'] : ''}}" placeholder="giá từ..."><br>
                    @if ($errors->has('keymin'))
                         <span class="help-block">
                             <strong>{{ $errors->first('keymin') }}</strong>
                         </span>
                    @endif
                        <label class="nxp-111"><b>Đến(*)</b></label>
                        <input type="number" min="0" name="keymax" value="{{ isset($_GET['keymax']) ? $_GET['keymax'] : ''}}" placeholder="đến..."><br>
                    @if ($errors->has('keymax'))
                         <span class="help-block">
                             <strong>{{ $errors->first('keymax') }}</strong>
                         </span>
                    @endif
                    <div class="center">
                        <button class="btn-nxp" type="submit" name="button">Tìm kiếm</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-9 col-right">
                <div class="">
                    <div class="flexslider ma-nivoslider">
                        <div class="ma-loading"></div>
                        <div id="ma-inivoslider-banner7" class="slides">
                            <img src="images/slider/slider-01.png" class="dn" alt="" title="#banner7-caption1"  />
                            <img src="images/slider/slider-02.png" class="dn" alt="" title="#banner7-caption2"  />
                            <img src="images/slider/slider-03.png" class="dn" alt="" title="#banner7-caption3"  />
                        </div>

                    </div><!-- /.flexslider -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-left">
                <div class="banner-left"><a href="#"><img src="images/products/0.png" alt="hinh anh"></a>
                    <div class="banner-content">
                        <h1>Khuyễn mãi</h1>
                        <h2>20%</h2>
                        <p></p>
                        <a href="#">mua ngay</a>
                    </div>
                </div>
                <div class="block">
                    <div class="title-group"><h2>Nhận xét</h2></div>
                    <div id="clients-say" class="owl-container">
                        <div class="owl">
                            <div class='testimonial-list'>
                                <div class="testimonial-sidebar-content">
                                    <div class="content">
                                        <a href="#">Shop uy tín, nhanh gọn. Chủ shop cực nhiệt tình và thoải mái ♡...</a>
                                    </div>
                                    <div class="post-by">
                                        <div class="testimonial-content-avatar">
                                            <img src="" alt="image" />
                                        </div>
                                        <div class="box-author">
                                            <span class="testimonial-author">Phan Anh Khoa</span>
                                            <span class="testimonial-date">November 6, 2017</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='testimonial-list'>
                                <div class="testimonial-sidebar-content">
                                    <div class="content">
                                        <a href="#">Shop nhiệt tình.đàn ngon,giá vừa túi tiền.nói chung là ok...</a>
                                    </div>
                                    <div class="post-by">
                                        <div class="testimonial-content-avatar">
                                            <img src="" alt="image" />
                                        </div>
                                        <div class="box-author">
                                            <span class="testimonial-author">Dương Đông Hưng</span>
                                            <span class="testimonial-date">November 6 2017</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='testimonial-list'>
                                <div class="testimonial-sidebar-content">
                                    <div class="content">
                                        <a href="#">Chất lượng tốt , ok 😄😄. Nhân viên lại thân thiện... </a>
                                    </div>
                                    <div class="post-by">
                                        <div class="testimonial-content-avatar">
                                            <img src="" alt="image" />
                                        </div>
                                        <div class="box-author">
                                            <span class="testimonial-author">Nguyễn Xuân Phương</span>
                                            <span class="testimonial-date">November 6, 2017</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.block - Latest News -->
            </div><!-- /.col-left -->
            <div class="col-sm-9 col-right">
                <div class="featuredproductslider-container">
                    <div class="title-group1"><h2>Nổi Bật</h2></div>
                    <div id="featured-products" class="owl-container">
                        <div class="owl">
                          @foreach($hot_products as $product)
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
                                        <a href="{{ url('xem_chitiet/'.$product->id.'&'.$product->category_id) }}" title="Nunc facilisis" class="product-image">
                                            <img src="images/products/{{ $product->image }}" alt="Nunc facilisis" />
                                        </a>
                                        <button id="{{$product->id}}" class="btn btn-default btn-sm add-cart-nxp add_to_card btn btn-danger"  name="{{$product->name}}" style="font-size:24px"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Mua Hàng </button>
                                    </div>
                                    <div class="des-container">
                                        <h2 class="product-name"><a title="Nunc facilisis">{{ $product->name }}</a></h2>
                                        <div class="price-box">
                                            <p class="special-price">
                                                <span class="price-label">Special Price</span>
                                                <span class="price">{{ number_format($product->promotion_price) }}đ</span>
                                            </p>
                                            <p class="old-price">
                                                <span class="price-label">Regular Price: </span>
                                                <span class="price">{{ number_format($product->unit_price) }}đ</span>
                                            </p>
                                        </div>
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <div class="rating" style="width:67%"></div>
                                            </div>
                                            <!-- <span class="amount"><a href="#">3 Bình luận</a></span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                          @endforeach
                        </div>
                    </div>
                </div><!-- /.featuredproductslider-container -->

                <div class="newproductslider-container">
                    <div class="title-group1"><h2>Mới nhất</h2></div>
                    <div id="new-products" class="owl-container">
                        <div class="owl">
                          @foreach($new_products as $product)
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
                                        <a href="{{ url('xem_chitiet/'.$product->id.'&'.$product->category_id)}}" title="Nunc facilisis" class="product-image">
                                            <img src="images/products/{{ $product->image }}" alt="Nunc facilisis" />
                                        </a>
                                        <button id="{{$product->id}}" class="btn btn-default btn-sm add-cart-nxp add_to_card btn btn-danger"  name="{{$product->name}}" style="font-size:24px"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Mua Hàng </button>
                                    </div>
                                    <div class="des-container">
                                        <h2 class="product-name"><a title="Nunc facilisis">{{ $product->name }}</a></h2>
                                        <div class="price-box">
                                            <p class="special-price">
                                                <span class="price-label">Special Price</span>
                                                <span class="price">{{ number_format($product->promotion_price) }}đ</span>
                                            </p>
                                            <p class="old-price">
                                                <span class="price-label">Regular Price: </span>
                                                <span class="price">{{ number_format($product->unit_price) }}đ</span>
                                            </p>
                                        </div>
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <div class="rating" style="width:67%"></div>
                                            </div>
                                            <!-- <span class="amount"><a href="#">3 Review(s)</a></span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                          @endforeach
                        </div>
                    </div>
                </div><!-- /.newproductslider-container -->
                <div class="newproductslider-container">
                    <div class="title-group1"><h2>Ưu đãi</h2></div>
                    <div id="new-products" class="owl-container">
                        <div class="owl">
                          @foreach($deal_products as $product)
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
                                        <a href="{{ url('xem_chitiet/'.$product->id.'&'.$product->category_id) }}" title="Nunc facilisis" class="product-image">
                                            <img src="images/products/{{ $product->image }}" alt="Nunc facilisis" />
                                        </a>
                                        <button id="{{$product->id}}" class="btn btn-default btn-sm add-cart-nxp add_to_card btn btn-danger"  name="{{$product->name}}" style="font-size:24px"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Mua Hàng </button>
                                    </div>
                                    <div class="des-container">
                                        <h2 class="product-name"><a title="{{ $product->name }}">{{ $product->name }}</a></h2>
                                        <div class="price-box">
                                            <p class="special-price">
                                                <span class="price-label">Special Price</span>
                                                <span class="price">{{ number_format($product->promotion_price) }}</span>
                                            </p>
                                            <p class="old-price">
                                                <span class="price-label">Regular Price: </span>
                                                <span class="price">{{ number_format($product->unit_price) }}</span>
                                            </p>
                                        </div>
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <div class="rating" style="width:67%"></div>
                                            </div>
                                            <!-- <span class="amount"><a href="#">3 Review(s)</a></span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                          @endforeach
                        </div>
                    </div>
                </div><!-- /.newproductslider-container -->

            </div><!-- /.col-right -->
        </div>
    </div>
</div><!-- /.main -->
@stop
