@extends('master')
@section('content')

  <div class="breadcrumbs">
      <div class="container">
          <ul class="breadcrumb">
              <li><a href="{{ url('/') }}">Trang chủ</a></li>
              <li class="active">Sản phẩm</li>
          </ul>
      </div>
  </div>

  <div class="main">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-left">
            </div><!-- /.col-left -->
            <div class="col-sm-9 col-right">
                <div class="page-title">
                    <h1>SẢN PHẨM</h1>
                </div>
                <div class="toolbar">
                    <div class="pager">
                        <div class="sort-by hidden-xs">
                            <label>Lọc theo:</label>
                            <select class="form-control input-sm">
                                <option selected="selected">Tên Sản Phẩm</option>
                                <option>Giá Sản Phẩm</option>
                            </select>
                            <a title="Set Descending Direction" href="#"><span class="fa fa-sort-amount-desc"></span></a>
                        </div>
                    </div><!--- /.pager -->
                </div><!-- /.toolbar -->
                <div class="row products">
                    @foreach($products as $category)
                        <div class="col-md-4 col-sm-6">
                            <div class='productslider-item item'>
                                <div class="item-inner">
                                    <div class="images-container">
                                        <div class="product_icon">
                                            @if(($category->new)==1)
                                                <div class='new-icon'><span>new</span></div>
                                            @endif
                                        </div>
                                        <div class="product_icon">
                                            @if(($category->deals)==1)
                                                <div class='sale-icon'><span>sale</span></div>
                                            @endif
                                        </div>
                                        <a href="#" title="Nunc facilisis" class="product-image">
                                            <img src="images/products/{{ $category->image }}" alt="Nunc facilisis" />
                                        </a>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a href="{{url('xem_chitiet/'.$category->id.'&'.$category->category_id)}}" class="link-quickview">Xem chi tiết</a></li>
                                                <li><a href="#" class="link-compare">So Sánh</a></li>
                                                <li><a href="#" class="link-cart">Thêm vào giỏ hàng</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="des-container">
                                        <h2 class="product-name"><a href="#" title="Nunc facilisis">{{$category->name}}</a></h2>
                                        <div class="price-box">
                                            <p class="special-price">
                                                <span class="price-label">gia khuyenmai</span>
                                                <span class="price">{{number_format($category->promotion_price)}}</span>
                                            </p>
                                            <p class="old-price">
                                                <span class="price-label">gia goc: </span>
                                                <span class="price">{{number_format($category->unit_price)}}</span>
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
                <div class="nxpcenter">
                    {{$products->links()}}
                </div>
            </div><!-- /.col-right -->
        </div>
    </div>
</div><!-- /.main -->


@stop
