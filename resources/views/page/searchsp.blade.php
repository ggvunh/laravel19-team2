@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-left">
            </div>
            <div class="col-sm-9 col-right">
                <div class="page-title">
                    <h1>TÌM KIẾM SẢN PHẨM</h1>
                    <h4>Tìm thấy: sản phẩm</h4>
                </div>
                <div class="toolbar">
                    <div class="pager">
                        <div class="sort-by hidden-xs">
                            <label>sắp xếp theo:</label>
                            <select class="form-control input-sm">
                                <option selected="selected">Mặc Định</option>
                                <option>Tên Sản Phẩm</option>
                                <option>Giá Sản Phẩm</option>
                            </select>
                            <a title="Set Descending Direction" href="#"><span class="fa fa-sort-amount-desc"></span></a>
                        </div>
                    </div><!--- /.pager -->
                </div><!-- /.toolbar -->
                <div class="row products">
                    @foreach($products as $a)
                        <div class="col-md-4 col-sm-6">
                            <div class='productslider-item item'>
                                <div class="item-inner">
                                    <div class="images-container">
                                        <div class="product_icon">
                                            <div class='new-icon'><span>new</span></div>
                                        </div>
                                        <div class="product_icon">
                                            <div class='sale-icon'><span>sale</span></div>
                                        </div>
                                        <a href="#" title="Nunc facilisis" class="product-image">
                                            <img src="images/products/{{ $a->image }}" alt="Nunc facilisis" />
                                        </a>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a href="{{url('view_chitiet/'.$a->id)}}" class="link-quickview">Xem chi tiết</a></li>
                                                <li><a href="#" class="link-compare">So Sánh</a></li>
                                                <li><a href="#" class="link-cart">Thêm vào giỏ hàng</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="des-container">
                                        <h2 class="product-name"><a href="#" title="Nunc facilisis">{{$a->name}}</a></h2>
                                        <div class="price-box">
                                            <p class="special-price">
                                                <span class="price-label">gia khuyenmai</span>
                                                <span class="price">{{number_format($a->promotion_price)}}</span>
                                            </p>
                                            <p class="old-price">
                                                <span class="price-label">gia goc: </span>
                                                <span class="price">{{number_format($a->unit_price)}}</span>
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
                {{$products->links()}}
                </div><!-- /.product -->
                <div class="toolbar">
                    <div class="pager">
                        <div class="sort-by hidden-xs">
                            <label>Sort By:</label>
                            <select class="form-control input-sm">
                                <option selected="selected">Position</option>
                                <option>Name</option>
                                <option>Price</option>
                            </select>
                            <a title="Set Descending Direction" href="#"><span class="fa fa-sort-amount-desc"></span></a>
                        </div>
                    </div><!-- /.pager -->
                </div><!-- /.toolbar -->
            </div><!-- /.col-right -->

        </div>
    </div>
@stop
