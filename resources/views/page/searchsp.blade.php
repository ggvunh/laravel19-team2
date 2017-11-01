@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-left">
                <img src="images/lienhe.gif" alt="lien he qc" style="max-width:100%; margin-top: 20px; min-width:100%">
                <form class="form-search-nxp" method="GET" action="search-is-price">
                    <div class="form-nxp">
                        <h3>Tìm theo giá</h3>
                    </div>
                    <label class="nxp-111"><b>Từ(*)</b></label>
                    <input type="text" name="keymin" value="{{ isset($_GET['keymin']) ? $_GET['keymin'] : ''}}" placeholder="giá từ..."><br>
                    @if ($errors->has('keymin'))
                         <span class="help-block">
                             <strong>{{ $errors->first('keymin') }}</strong>
                         </span>
                    @endif
                        <label class="nxp-111"><b>Đến(*)</b></label>
                        <input type="text" name="keymax" value="{{ isset($_GET['keymax']) ? $_GET['keymax'] : ''}}" placeholder="đến..."><br>
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
                <div class="page-title">
                    <h1>TÌM KIẾM SẢN PHẨM</h1>
                    <h4>Từ khóa tìm kiếm: <b></b></h4>
                    <h4>Tìm thấy: <b>{{ $products->total() }}</b> sản phẩm</h4>
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
                                        <a href="{{url('xem_chitiet/'.$product->id.'&'.$product->category_id)}}" title="Nunc facilisis" class="product-image">
                                            <img src="images/products/{{ $product->image }}" alt="Nunc facilisis" />
                                        </a>
                                        <button id="{{$product->id}}" class="btn btn-default btn-sm add-cart-nxp add_to_card btn btn-danger"  name="{{$product->name}}" style="font-size:24px"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Mua Hàng </button>
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
                </div><!-- /.product -->
                <div class="clearfix"></div>
                {{$products->appends(['key' => $key])->links()}}
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
