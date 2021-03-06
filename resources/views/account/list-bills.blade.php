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
                </form><br>
                <div class="banner-left"><a href="#"><img src="images/products/0.png" alt="hinh anh"></a>
                    <div class="banner-content">
                        <h1>Khuyến mãi</h1>
                        <h2>20%</h2>
                        <p></p>
                        <a href="#">mua ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-right">
                <h2>DANH SÁCH ĐƠN ĐẶT HÀNG</h2>
                <table class="table table-bordered" id="mytable" border="0">
                    <tr>
                        <th class="myth">Mã đơn hàng</th>
                        <th class="myth">Ngày đặt hàng</th>
                        <th class="myth">Tổng cộng</th>
                        <th class="myth">Địa chỉ giao hàng</th>
                        <th class="myth">Tình trạng</th>
                        <th class="myth">Cancel</th>

                    </tr>
                    @foreach($bills as $bill)
                    <tr>
                        <td><strong><a href="{{ url('account/orderdetail/'.$bill->id) }}">#{{ $bill ->id }}</a></strong></td>
                        <td>{{ $bill ->date_order }}</td>
                        <td>{{ $bill ->total }}</td>
                        <td>{{ $bill ->order_address }}</td>
                        <td> @if($bill ->status==0)
                            chưa giao hàng
                            @elseif($bill ->status==1)
                            đã giao hàng
                            @else
                            đã hủy đơn hàng
                            @endif
                         </td>
                         @if($bill ->status==0)
                            <td class="myth"></span><a href="{{ url('account/orderlists/'.$bill->id.'/cancel') }}" style="color:red" class="click"> Cancel</a></td>
                         @elseif($bill ->status==1)
                            <td class="myth"><span style="color: green;" class="glyphicon glyphicon-ok"></span></td>
                         @else
                            <td class="myth"><span class="glyphicon glyphicon-remove"></span></td>
                         @endif
                    </tr>
                    @endforeach
                </table>
                {{$bills->links()}}
            </div><!-- /.col-right -->
        </div>
    </div>
</div><!-- /.main -->

@stop
