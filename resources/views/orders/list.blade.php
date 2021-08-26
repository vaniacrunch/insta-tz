@extends('layout.main')
@section('content')
    <table>
        <thead>
        <tr>
            <th>Id#</th>
            <th>Username</th>
            <th>Order Id</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>

        @if(!$orders->isEmpty())
        <tbody>
        @foreach($orders as $key => $order)
        <tr>
            <td>{{ $key }}</td>
            <td>{{ $order->ig_username }}</td>
            <td>{{ $order->order_id }}</td>
            <td>{{ $order->order_id }}</td>
            <td><a href="{{ route('orders.order', $order->id) }}" class="btn">View</a></td>
        </tr>
        @endforeach
        </tbody>
            @endif
    </table>
    @endsection
