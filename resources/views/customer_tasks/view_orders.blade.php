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

    <form action="{{ url('customers') }}" method="post" class="form-horizontal">
      <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-6">
          <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>
      </div>
      <div class="form-group">
        <label for="date_of_birth" class="col-sm-3 control-label">D.O.B</label>
        <div class="col-sm-6">
          <input type="text" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
        </div>
      </div>
      <div class="form-group">
        <label for="address" class="col-sm-3 control-label">Address</label>
        <div class="col-sm-6">
          <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
        </div>
      </div>
      <div class="form-group">
        <label for="phone" class="col-sm-3 control-label">Phone</label>
        <div class="col-sm-6">
          <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Email</label>
        <div class="col-sm-6">
          <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>
      </div>
      <div class="form-group centered">
        <div class"col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-success">Add Customer</button>
        </div>
      </div>
      {{ csrf_field() }}
    </form>
  </div>
</div>

@if ($customers->count() > 0)
<div class="flex-top position-ref full-height">
  <div class="panel panel-default">
    <div class="panel-heading centered">
      Existing Customers
    </div>
    <div class="panel-body">
      <table class="table table-striped">
        <thead>
          <th>Name</th>
          <th>D.O.B.</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Email</th>
          <th>&nbsp;</th>
        </thead>
        <tbody>
          @foreach ($customers as $customer)
            <tr>
              <td>{{ $customer->name }}</td>
              <td>{{ $customer->date_of_birth }}</td>
              <td>{{ $customer->address }}</td>
              <td>{{ $customer->phone }}</td>
              <td>{{ $customer->email }}</td>
              <td>
                  <form action="{{ url('modify_customer/' . $customer->customer_id) }}" method="get">
                    <button type-"submit" class="btn btn-warning btn-sm">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>

                    {{ csrf_field() }}
                  </form>
              </td>
              <td>
                  <form action="{{ url('/customers/' . $customer->customer_id) }}" method="post">
                    <button type-"submit" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                    {{ method_field('DELETE')}}

                    {{ csrf_field() }}
                  </form>
              </td>
              <td>
                  <form action="{{ url('/customers/viewOrders/' . $customer->customer_id) }}" method="get">
                    <button type-"submit" class="btn btn-success btn-sm">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>

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
