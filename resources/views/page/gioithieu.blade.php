@extends('master')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}">Trang chủ</a></li>
            <li class="active">Giới thiệu</li>
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
             <h2><strong>Giới thiệu</strong></h2>
             <hr>
             <br>
             <h4 style="color: Green;">GuitarShop PKH Chuyên cung cấp các sản phẩm Guitar ngoại nhập chính hãng</h4>
             <br>
             <h4 style="color: red;">– Acoustic, Classic, Electric, Bass, Âm li, Effect Pedals, Phụ Kiện</h4>
             <h4 style="color: red;">– Chế độ bảo hành chính hãng</h4>
             <h4 style="color: red;">– Giao hàng toàn quốc</h4>
             <h4 style="color: red;">– Địa chỉ:  Tp Đà Nẵng</h4>
             <h4 style="color: red;">– Hotline: 0934.83.83.81</h4>
             <br>
             <h4 style="color: green;">Một số thương hiệu: </h4>
             <h4 style="color: blue;">Fender, Jackson, Ibanez, LTD, Roland, Marshall, Cort, Vox, Line 6, TC, Peavey, Zoom,
                 Takamine, Samick, D’Addario, ErnieBall, Elixir, Dunlop, DR… </h4>
            <br>
            <h4 style="color: grey;">Hân hạnh được phục vụ Quý Khách Hàng!</h4>

          </div><!-- /.col-right -->
      </div>
  </div>
</div><!-- /.main -->

@stop
