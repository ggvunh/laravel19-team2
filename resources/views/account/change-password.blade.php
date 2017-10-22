@extends('master')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}">Trang chủ</a></li>
            <li class="active">Đổi mật khẩu</li>
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
              <div class="container">
                  <div class="row">
                      <div class="col-sm-1">

                      </div>
                      <div class="col-sm-11">
                          <body>
                              <div class="body">
                                  <h2 class="tttk"><b>Đổi mật khẩu</b></h2><br>
                                  <form name="xuly" action="{{ url('account/change-password') }}" method="post">
                                      {!!csrf_field()!!}

                                      <label class="lb" for=""><b>Nhập mật khẩu mới</b></label><span class="sp">*</span><br>
                                      <input class="ip form-control" type="password" name="password" autofocus>
                                      @if ($errors->has('password'))
                                          <span class="help-block" style="color: red;">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
                                      <br><br>

                                      <label class="lb" for=""><b>Nhập lại mật khẩu</b></label><span class="sp">*</span><br>
                                      <input class="ip form-control" type="password" name="repassword">
                                      @if ($errors->has('repassword'))
                                          <span class="help-block" style="color: red;">
                                              <strong>{{ $errors->first('repassword') }}</strong>
                                          </span>
                                      @endif
                                      <br><br>

                                      <input class="btn bton" type="submit" value="Lưu" name="submit">
                                  </form>
                              </div>
                        </body>
                      </div>
                  </div>
              </div>

          </div><!-- /.col-right -->
      </div>
  </div>
</div><!-- /.main -->

@stop
