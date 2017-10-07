@extends('master')
@section('content')
  <div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-3">
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
        <div class="row">
            <div class="col-sm-3 col-left">
                <div class="timely">
                    <div class="title-group"><h2>Liên hệ QC</h2></div>
                    <div id="timely-owl" class="owl-container">
                        <div class="owl">
                          @foreach($products as $product)
                            <div class='timer-item item'>
                                <div class="item-inner">
                                    <div class="images-container">
                                        <a href="#" title="Fusce aliquam" class="product-image"><img src="images/products/{{ $product->image }}" alt="Fusce aliquam" /></a>
                                        <div class="box-timer">
                                            <div class="countbox_1 timer-grid"></div>
                                        </div>
                                    </div>
                                    <div class="content-box">
                                        <h2 class="product-name"><a href="#" title="Fusce aliquam">{{ $product->name }}</a></h2>
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
                                            <!-- <span class="amount"><a href="#">1 Review(s)</a></span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                          @endforeach
                        </div>
                    </div>
                </div><!-- /.timely -->
                <div class="block">
                    <div class="title-group"><h2>ý kiến khách hàng</h2></div>
                    <div id="clients-say" class="owl-container">
                        <div class="owl">
                            <div class='testimonial-list'>
                                <div class="testimonial-sidebar-content">
                                    <div class="content">
                                        <a href="#">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros...</a>
                                    </div>
                                    <div class="post-by">
                                        <div class="testimonial-content-avatar">
                                            <img src="images/avatar/avatar-01.jpg" alt="test" />
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
                                            <img src="images/avatar/avatar-02.jpg" alt="test" />
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
                                            <img src="images/avatar/avatar-03.jpg" alt="test" />
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
                                            <div class='new-icon'><span>new</span></div>
                                        </div>
                                        <a href="{{ url('chi-tiet-sp') }}" title="Nunc facilisis" class="product-image">
                                            <img src="images/products/{{ $hot->image }}" alt="Nunc facilisis" />
                                        </a>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a href="{{ url('chi-tiet-sp') }}" class="link-quickview">Quick View</a></li>
                                                <li><a href="{{ url('gio-hang') }}" class="link-cart">Add to Cart</a></li>
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
                                            <!-- <span class="amount"><a href="#">3 Review(s)</a></span> -->
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
                                            <div class='new-icon'><span>new</span></div>
                                            <div class="sale-icon"><span>sale</span></div>
                                        </div>
                                        <a href="{{ url('chi-tiet-sp') }}" title="Nunc facilisis" class="product-image">
                                            <img src="images/products/{{ $new->image }}" alt="Nunc facilisis" />
                                        </a>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a href="{{ url('chi-tiet-sp') }}" class="link-quickview">Quick View</a></li>
                                                <li><a href="{{ url('gio-hang') }}" class="link-cart">Add to Cart</a></li>
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
                                            <div class='new-icon'><span>new</span></div>
                                            <div class="sale-icon"><span>sale</span></div>
                                        </div>
                                        <a href="{{ url('chi-tiet-sp') }}" title="Nunc facilisis" class="product-image">
                                            <img src="images/products/{{ $deal->image }}" alt="Nunc facilisis" />
                                        </a>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a href="{{ url('chi-tiet-sp') }}" class="link-quickview">Quick View</a></li>
                                                <li><a href="{{ url('gio-hang') }}" class="link-cart">Add to Cart</a></li>
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
