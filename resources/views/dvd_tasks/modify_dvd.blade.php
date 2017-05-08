@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-body">


    <form action="{{ url('modify_dvd/'. $dvd->dvd_id) }}" method="post" class="form-horizontal">
      <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-6">
          <input type="text" name="name" id="name" class="form-control" value="{{ $dvd->name }}">
        </div>
      </div>
      <div class="form-group">
        <label for="rating" class="col-sm-3 control-label">Rating</label>
        <div class="col-sm-6">
          <input type="text" name="rating" id="rating" class="form-control" value="{{ $dvd->rating }}">
        </div>
      </div>
      <div class="form-group">
        <label for="price" class="col-sm-3 control-label">Price</label>
        <div class="col-sm-6">
          <input type="text" name="price" id="price" class="form-control" value="{{ $dvd->price }}">
        </div>
      </div>
      <div class="form-group centered">
        <div class"col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-warning">Modify DVD</button>
        </div>
      </div>
      {{ csrf_field() }}
    </form>
  </div>
</div>
@endsection
