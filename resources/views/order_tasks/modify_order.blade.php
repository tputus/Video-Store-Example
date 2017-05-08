@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-body">


    <form action="{{ url('modify_order/'. $order->order_id) }}" method="post" class="form-horizontal">
      <div class="form-group">
        <label for="dvd_id" class="col-sm-3 control-label">DVD ID</label>
        <div class="col-sm-6">
          <select name = "dvd_id">
            @foreach ($dvds as $dvd)
              @if ($dvd->dvd_id == $order->dvd_id)
                <option value="{{ $dvd->dvd_id }}" selected = 'true'>{{ $dvd->name }}</option>
              @else
                <option value="{{ $dvd->dvd_id }}">{{ $dvd->name }}</option>
              @endif  
            @endforeach
          </select>
        </div>
      </div>
    <input type="hidden" name="customer_id" id="customer_id" class="form-control" value="{{ $order->customer_id }}">
      <div class="form-group">
        <label for="start_date" class="col-sm-3 control-label">Start Date</label>
        <div class="col-sm-6">
          <input type="text" name="start_date" id="start_date" class="form-control" value="{{ $order->start_date }}">
        </div>
      </div>
      <div class="form-group">
        <label for="due_date" class="col-sm-3 control-label">Due Date</label>
        <div class="col-sm-6">
          <input type="text" name="due_date" id="due_date" class="form-control" value="{{ $order->due_date }}">
        </div>
      </div>
      <div class="form-group centered">
        <div class"col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-warning">Modify Order</button>
        </div>
      </div>
      {{ csrf_field() }}
    </form>
  </div>
</div>
@endsection
