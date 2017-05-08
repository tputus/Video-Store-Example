@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-body">


    <form action="{{ url('modify_customer/'. $customer->customer_id) }}" method="post" class="form-horizontal">
      <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-6">
          <input type="text" name="name" id="name" class="form-control" value="{{ $customer->name }}">
        </div>
      </div>
      <div class="form-group">
        <label for="date_of_birth" class="col-sm-3 control-label">D.O.B</label>
        <div class="col-sm-6">
          <input type="text" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ $customer->date_of_birth }}">
        </div>
      </div>
      <div class="form-group">
        <label for="address" class="col-sm-3 control-label">Address</label>
        <div class="col-sm-6">
          <input type="text" name="address" id="address" class="form-control" value="{{ $customer->address }}">
        </div>
      </div>
      <div class="form-group">
        <label for="phone" class="col-sm-3 control-label">Phone</label>
        <div class="col-sm-6">
          <input type="text" name="phone" id="phone" class="form-control" value="{{ $customer->phone }}">
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Email</label>
        <div class="col-sm-6">
          <input type="text" name="email" id="email" class="form-control" value="{{ $customer->email }}">
        </div>
      </div>
      <div class="form-group centered">
        <div class"col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-warning">Modify Customer</button>
        </div>
      </div>
      {{ csrf_field() }}
    </form>
  </div>
</div>
@endsection
