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
                <h2>ĐƠN HÀNG NHẬN ĐƯỢC</h2>
                <table class="table table-bordered" id="mytable" border="0">
                    <tr>
                        <th class="myth">Mã đơn hàng</th>
                        <th class="myth">Ngày</th>
                        <th class="myth">Tổng cộng</th>
                        <th class="myth">Địa chỉ giao hàng</th>
                    </tr>
                    <tr>
                        <td>#{{$bill ->id}}</td>
                        <td>{{$bill ->date_order}}</td>
                        <td>{{number_format($bill ->total)}}</td>
                        <td>{{$bill ->order_address}}</td>
                    </tr>
                </table>


                 <h3>Chi tiết đơn hàng</h3><br>
                 <table class="table table-bordered" id="mytable" border="0">
                     <tr>
                         <th class="myth">Sản phẩm</th>
                         <th class="myth">Số lượng</th>
                         <th class="myth">Thành tiền</th>
                     </tr>
                     @foreach($carts as $cart)
                     <tr>
                         <td>{{$cart ->name}}</td>
                         <td>{{$cart ->qty}}</td>
                         <td>{{number_format($cart ->price*$cart->qty)}}</td>
                     </tr>
                     @endforeach

                 </table><br>
                 <h3>Chi tiết khách hàng</h3><br>
                 <table class="table table-bordered" id="mytable" border="0">
                     <tr>
                         <th>Tên</th>
                         <td>{{Auth::user()->name}}</td>
                     </tr>
                     <tr>
                         <th>Số điện thoại</th>
                         <td>{{Auth::user()->phone_number}}</td>
                     </tr>
                     <tr>
                         <th>Email</th>
                         <td>{{Auth::user()->email}}</td>
                     </tr>
                     <tr>
                         <th>Địa chỉ</th>
                         <td>{{Auth::user()->address}}</td>
                     </tr>
                 </table><br>
            </div><!-- /.col-right -->
            <h3>Cám ơn quý khách đã mua hàng tại guitarshoppkh.vn</h3>
            <p>Nhân viên sẽ liên hệ với quý khách qua số điện thoại hoặc email.</p>
            <p>Trân Trọng!!!</p>
        </div>
    </div>
</div><!-- /.main -->

@stop
