@extends('layouts.app')

@section('content')

<div class="panel panel-default">
  <div class="panel-body">

    @if($errors->count() > 0)
      <div class="centered"> There were {{ $errors->count() }} errors: </div>
      @foreach ($errors->all() as $error)
        <div class="centered">{{ $error }}</div>
      @endforeach
    @endif

    <form action="{{ url('dvds') }}" method="post" class="form-horizontal">
      <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-6">
          <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>
      </div>
      <div class="form-group">
        <label for="rating" class="col-sm-3 control-label">Rating</label>
        <div class="col-sm-6">
          <input type="text" name="rating" id="rating" class="form-control" value="{{ old('rating') }}">
        </div>
      </div>
      <div class="form-group">
        <label for="price" class="col-sm-3 control-label">Price</label>
        <div class="col-sm-6">
          <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
        </div>
      </div>
      <div class="form-group centered">
        <div class"col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-success">Add DVD</button>
        </div>
      </div>
      {{ csrf_field() }}
    </form>
  </div>
</div>

@if ($dvds->count() > 0)
<div class="flex-top position-ref full-height">
  <div class="panel panel-default">
    <div class="panel-heading centered">
      Existing Dvds
    </div>
    <div class="panel-body">
      <table class="table table-striped">
        <thead>
          <th>Name</th>
          <th>Rating</th>
          <th>Price</th>
          <th>Available</th>
          <th>&nbsp;</th>
        </thead>
        <tbody>
          @foreach ($dvds as $dvd)
            <tr>
              <td>{{ $dvd->name }}</td>
              <td>{{ $dvd->rating }}</td>
              <td>{{ $dvd->price }}</td>
              <td>
                @if ($dvd->available == 0)
                  No
                @else
                  Yes
                @endif
              </td>

              <td>
                  <form action="{{ url('modify_dvd/' . $dvd->dvd_id) }}" method="get">
                    <button type-"submit" class="btn btn-warning">
                      <span class="glyphicon glyphicon-pencil"></span>
                  </button>

                    {{ csrf_field() }}
                  </form>
              </td>
              <td>
                  <form action="{{ url('/dvds/' . $dvd->dvd_id) }}" method="post">
                    <button type-"submit" class="btn btn-danger">
                      <span class="glyphicon glyphicon-trash"></span>
                  </button>
                    {{ method_field('DELETE')}}

                    {{ csrf_field() }}
                  </form>
              </td

            </tr>
          @endforeach
        </tbody>
        </thead>
      </table>
    </div>
  </div>
</div>
@endif
@endsection
