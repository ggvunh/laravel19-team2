@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">

        </div>
        <div class="col-sm-9">
          <div class="col-md-8 col-md-offset-2 loginpak ">
              <div class="panel panel-default">
                  <div class="panel-heading"><h3>Đăng nhập</h3></div>

                  <div class="panel-body">
                      <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                          {{ csrf_field() }}

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label for="email" class="col-md-4 control-label">E-Mail<span>*</span></label>

                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label for="password" class="col-md-4 control-label">Password<span>*</span></label>

                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control" name="password" >
                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                      </label>
                                  </div>
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-8 col-md-offset-4">
                                  <button type="submit" class="btn btn-danger">
                                      Login
                                  </button>

                                  <a class="btn btn-link" href="{{ route('password.request') }}">
                                      Forgot Your Password?
                                  </a>
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
