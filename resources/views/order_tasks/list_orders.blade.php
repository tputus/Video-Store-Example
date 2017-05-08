@extends('layouts.app')

@section('content')

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
          <th>Customer ID</th>
          <th>Start Date</th>
          <th>Due Date</th>
          <th>Returned?</th>
          <th>&nbsp;</th>
        </thead>
        <tbody>
          @foreach ($orders as $order)
            <tr>
              <td>{{ $order->dvd_id }}</td>
              <td>{{ $order->customer_id }}</td>
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
                  <form action="{{ url('modify_order/' . $order->order_id) }}" method="get">
                    <button type-"submit" class="btn btn-warning btn-sm">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>

                    {{ csrf_field() }}
                  </form>
              </td>
              <td>
                  <form action="{{ url('/order/' .  $order->order_id) }}" method="post">
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
