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

    <form action="{{ url('order') }}" method="post" class="form-horizontal">
      <div class="form-group">
        <label for="dvd_id" class="col-sm-3 control-label">DVD ID</label>
        <div class="col-sm-6">
          <select name = "dvd_id">
            @foreach ($dvds as $dvd)
              <option value="{{ $dvd->dvd_id }}">{{ $dvd->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
          <input type="hidden" name="customer_id" id="customer_id" class="form-control" value="{{ $customer_id }}">
      <div class="form-group">
        <label for="start_date" class="col-sm-3 control-label">Start Date</label>
        <div class="col-sm-6">
          <input type="text" name="start_date" id="start_date" class="form-control" value="{{ old('start') }}">
        </div>
      </div>
      <div class="form-group">
        <label for="due_date" class="col-sm-3 control-label">Due Date</label>
        <div class="col-sm-6">
          <input type="text" name="due_date" id="due_date" class="form-control" value="{{ old('due') }}">
        </div>
      </div>
      <div class="form-group centered">
        <div class"col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-success">Add Order</button>
        </div>
      </div>
      {{ csrf_field() }}
    </form>
  </div>
</div>

@if ($orders->count() > 0)
<div class="flex-top position-ref full-height">
  <div class="panel panel-default">
    <div class="panel-heading centered">
      Existing Orders
    </div>
    <div class="panel-body">
      <table class="table table-striped">
        <thead>
          <th>DVD ID</th>
          <th>Start Date</th>
          <th>Due Date</th>
          <th>Returned?</th>
          <th>&nbsp;</th>
        </thead>
        <tbody>
          @foreach ($orders as $order)
            <tr>
              <td>{{ $order->dvd_id }}</td>
              <td>{{ $order->start_date }}</td>
              <td>{{ $order->due_date }}</td>
              <td>
                  @if ($order->returned == 0)
                    No
                  @else
                    Yes
                  @endif
              </td>
              <td>
                  <form action="{{ url('/modify_order/' . $order->order_id) }}" method="get">
                    <button type-"submit" class="btn btn-warning btn-sm">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>

                    {{ csrf_field() }}
                  </form>
              </td>
              <td>
                  <form action="{{ url('/order/' . $order->order_id) }}" method="post">
                    <button type-"submit" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                    {{ method_field('DELETE')}}

                    {{ csrf_field() }}
                  </form>
              </td>
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
