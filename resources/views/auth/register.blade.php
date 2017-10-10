@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">

        </div>
        <div class="col-sm-9">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading"><h3>Đăng ký</h3></div>

                  <div class="panel-body">
                      <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                          {{ csrf_field() }}

                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="name" class="col-md-4 control-label">Name</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"autofocus placeholder="Nhập tên đăng ký">

                                  @if ($errors->has('name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="email" class="col-md-4 control-label">E-Mail</label>

                              <div class="col-md-6">
                                  <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Nhập email đăng ký">

                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                              <label for="address" class="col-md-4 control-label">Address</label>

                              <div class="col-md-6">
                                  <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Nhập địa chỉ đăng ký">

                                  @if ($errors->has('address'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('address') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                              <label for="phone" class="col-md-4 control-label">Phone</label>

                              <div class="col-md-6">
                                  <input id="phone_number" type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Nhập số điện thoại">

                                  @if ($errors->has('phone'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('phone') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password" class="col-md-4 control-label">Password</label>

                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">

                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                              <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                              <div class="col-md-6">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu">

                                  @if ($errors->has('password_confirmation'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="password" class="col-md-4 control-label">Gender</label>

                              <div class="col-md-6">
                                  <input type="radio" name="gender" value="Male" checked> Nam
                                  <input type="radio" name="gender" value="Female"> Nữ<br>
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary">
                                      Register
                                  </button>
                              </div>
                          </div>


                      </form>
                  </div>

              </div>
          </div>
        </div>

    </div>
</div>
@endsection
