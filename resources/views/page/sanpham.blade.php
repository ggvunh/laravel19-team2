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
                                        <div class="box-hover">
                                            <ul class="">
                                                <!-- <li><a href="{{url('xem_chitiet/'.$product->id.'&'.$product->category_id)}}" class="link-quickview">Xem chi tiết</a></li> -->
                                                <li><a href="{{url('xem_chitiet/'.$product->id.'&'.$product->category_id)}}"><button type="button" class="glyphicon glyphicon-zoom-in btn btn-danger"> Xem chi tiết</button></a></li>
                                                <li><button type="button" id="{{$product->id}}" class="add_to_card glyphicon glyphicon-shopping-cart btn btn-danger"  name="{{$product->name}}"> Mua Hàng</button></li>
                                                <!-- <li><a ><button class="add_to_card link-cart" id="{{$product->id}}" name="{{$product->name}}" >Mua hàng</button></a></li> -->
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
                </div><!-- /.product -->
                <div class="nxpcenter">
                    {{$products->links()}}
                </div>
            </div><!-- /.col-right -->
        </div>
    </div>
</div><!-- /.main -->
<script>
    $(document).ready(function(){
        $(".add_to_card").click(function(){
            //$qty = $(this).find(".qty1").val();
            $rowid = $(this).attr('id');
            $name = 'add_product';
            $.ajax({
                type: "GET",
                url: 'dat-hang/add-cartproduct/'+$rowid+'/'+$name,
                data: {"id":$rowid, "name":$name},
                success:function(data){
                    $("#cart").load("views.partials.cart");
                   $('#qtyspcart').text(data[0]);
                   $('#total_cart').text(data[1]);
                }
            });
        });
    });
</script>
@stop
