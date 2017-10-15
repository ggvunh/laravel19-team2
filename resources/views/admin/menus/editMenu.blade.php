@extends('admin.admin-master')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-sm-12">
          <div class="col-md-8 col-md-offset-2 registerpak">
              <div class="panel panel-default">
                  <div class="panel-heading"><h3>Edit Menu </h3></div>
                  <div class="panel-body">
                      <form class="form-horizontal" method="POST" action="updateMenu">
                          {{ csrf_field() }}
                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label for="name" class="col-md-4 control-label">Menu Name</label>
                              @foreach($menu as $menu)
                                  <div class="col-md-6">
                                      <input type="hidden" name="id" value="{{$menu->id}}">
                                      <input type="text" class="form-control" name="name" value="{{$menu->name}}" autofocus>
                                  </div>
                              @endforeach
                          </div>
                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-danger">
                                      update
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
