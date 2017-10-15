@extends('admin.admin-master')
@section('content')
    <div class="container nxp-admin">
    <div class="row">
        <div class="col-sm-12">
          <div class="col-md-8 col-md-offset-2 registerpak">
              <div class="panel panel-default">
                  <div class="panel-heading"><h3>Create Menu </h3></div>

                  <div class="panel-body">
                      <form class="form-horizontal" method="POST" action="createMenu">
                          {{ csrf_field() }}

                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="name" class="col-md-4 control-label">Menu Name</label>
                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control" name="menu" value="{{ old('menu') }}"autofocus placeholder="enter name menu">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary">
                                      save
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
@stop
