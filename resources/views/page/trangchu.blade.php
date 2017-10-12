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
                    <label class="nxp-111"><b>Từ</b></label>
                    <input type="text" name="min" value="" placeholder="5.000.000"><br>
                    <label class="nxp-111"><b>Đến</b></label>
                    <input type="text" name="max" value="" placeholder="10.000.000"><br>
                    <div class="center">
                        <button class="btn-danger" type="submit" name="button">Tìm kiếm</button>
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
                                        <a href="#">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros...</a>
                                    </div>
                                    <div class="post-by">
                                        <div class="testimonial-content-avatar">
                                            <img src="" alt="test" />
                                        </div>
                                        <div class="box-author">
                                            <span class="testimonial-author">Mr rooney</span>
                                            <span class="testimonial-date">March 24, 2015</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='testimonial-list'>
                                <div class="testimonial-sidebar-content">
                                    <div class="content">
                                        <a href="#">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et...</a>
                                    </div>
                                    <div class="post-by">
                                        <div class="testimonial-content-avatar">
                                            <img src="" alt="test" />
                                        </div>
                                        <div class="box-author">
                                            <span class="testimonial-author">Robert Carlo</span>
                                            <span class="testimonial-date">January 30, 2015</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='testimonial-list'>
                                <div class="testimonial-sidebar-content">
                                    <div class="content">
                                        <a href="#">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et... </a>
                                    </div>
                                    <div class="post-by">
                                        <div class="testimonial-content-avatar">
                                            <img src="" alt="test" />
                                        </div>
                                        <div class="box-author">
                                            <span class="testimonial-author">mr Lee</span>
                                            <span class="testimonial-date">January 30, 2015</span>
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
                          @foreach($hot_products as $hot)
                            <div class='productslider-item item'>
                                <div class="item-inner">
                                    <div class="images-container">
                                        <div class="product_icon">
                                            @if(($hot->new)==1)
                                                <div class='new-icon'><span>new</span></div>
                                            @endif
                                        </div>
                                        <div class="product_icon">
                                            @if(($hot->deals)==1)
                                                <div class='sale-icon'><span>sale</span></div>
                                            @endif
                                        </div>
                                        <a href="{{ url('chi-tiet-sp') }}" title="Nunc facilisis" class="product-image">
                                            <img src="images/products/{{ $hot->image }}" alt="Nunc facilisis" />
                                        </a>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a href="{{url('xem_chitiet/'.$hot->id.'&'.$hot->category_id)}}" class="link-quickview">Xem chi tiết</a></li>
                                                <li><a href="#" class="link-compare">So Sánh</a></li>
                                                <li><a href="#" class="link-cart">Add giỏ hàng</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="des-container">
                                        <h2 class="product-name"><a href="#" title="Nunc facilisis">{{ $hot->name }}</a></h2>
                                        <div class="price-box">
                                            <p class="special-price">
                                                <span class="price-label">Special Price</span>
                                                <span class="price">{{ number_format($hot->promotion_price) }}đ</span>
                                            </p>
                                            <p class="old-price">
                                                <span class="price-label">Regular Price: </span>
                                                <span class="price">{{ number_format($hot->unit_price) }}đ</span>
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
                          @foreach($new_products as $new)
                            <div class='productslider-item item'>
                                <div class="item-inner">
                                    <div class="images-container">
                                        <div class="product_icon">
                                            @if(($new->new)==1)
                                                <div class='new-icon'><span>new</span></div>
                                            @endif
                                        </div>
                                        <div class="product_icon">
                                            @if(($new->deals)==1)
                                                <div class='sale-icon'><span>sale</span></div>
                                            @endif
                                        </div>
                                        <a href="{{ url('chi-tiet-sp') }}" title="Nunc facilisis" class="product-image">
                                            <img src="images/products/{{ $new->image }}" alt="Nunc facilisis" />
                                        </a>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a href="{{url('xem_chitiet/'.$new->id.'&'.$new->category_id)}}" class="link-quickview">Xem chi tiết</a></li>
                                                <li><a href="#" class="link-compare">So Sánh</a></li>
                                                <li><a href="#" class="link-cart">Add giỏ hàng</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="des-container">
                                        <h2 class="product-name"><a href="#" title="Nunc facilisis">{{ $new->name }}</a></h2>
                                        <div class="price-box">
                                            <p class="special-price">
                                                <span class="price-label">Special Price</span>
                                                <span class="price">{{ number_format($new->promotion_price) }}đ</span>
                                            </p>
                                            <p class="old-price">
                                                <span class="price-label">Regular Price: </span>
                                                <span class="price">{{ number_format($new->unit_price) }}đ</span>
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
                          @foreach($deal_products as $deal)
                            <div class='productslider-item item'>
                                <div class="item-inner">
                                    <div class="images-container">
                                        <div class="product_icon">
                                            @if(($deal->new)==1)
                                                <div class='new-icon'><span>new</span></div>
                                            @endif
                                        </div>
                                        <div class="product_icon">
                                            @if(($deal->deals)==1)
                                                <div class='sale-icon'><span>sale</span></div>
                                            @endif
                                        </div>
                                        <a href="{{ url('chi-tiet-sp') }}" title="Nunc facilisis" class="product-image">
                                            <img src="images/products/{{ $deal->image }}" alt="Nunc facilisis" />
                                        </a>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a href="{{url('xem_chitiet/'.$deal->id.'&'.$deal->category_id)}}" class="link-quickview">Xem chi tiết</a></li>
                                                <li><a href="#" class="link-compare">So Sánh</a></li>
                                                <li><a href="#" class="link-cart">Add giỏ hàng</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="des-container">
                                        <h2 class="product-name"><a href="#" title="{{ $deal->name }}">{{ $deal->name }}</a></h2>
                                        <div class="price-box">
                                            <p class="special-price">
                                                <span class="price-label">Special Price</span>
                                                <span class="price">{{ number_format($deal->promotion_price) }}</span>
                                            </p>
                                            <p class="old-price">
                                                <span class="price-label">Regular Price: </span>
                                                <span class="price">{{ number_format($deal->unit_price) }}</span>
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
