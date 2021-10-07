@extends('layouts.front')

@section('title', 'Dashboard')

@section('content')
<section class="bg-half d-table w-100 bg-page" style="background-image: url('{{ asset('theme/images/hero-bg.png') }}');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Dashboard</h2>
            </div>
        </div>
    </div>
</section>

<section class="section bg-light-dark">
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-lg-3 col-md-3 col-sm-3 col-3" style="margin-top: 50px">
                <div style="margin-bottom: 40px">
                   <h3> <a href="{{ route('user.dashboard') }}">Orders</a></h3>
                </div>
                <div>
                   <h3> <a href="{{ route('user.dashboard') }}">Bookings</a></h3>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-9 mb-4">
                <h3 class="text-center" style="margin-bottom: 20px">Order List</h3>
                <table class="table table-bordered text-white">
                    <thead>
                        <th>#</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>status</th>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td><b>PO{{ $order->uuid }}</b></td>
                                <td>{{ $order->created_at->format('d-m-y') }}</td>
                                <td>{{ $order->total }}</td>
                                @if($order->status)
                                <td>
                                    <b class="text-danger">Pending</b>
                                </td>
                                @else
                                <td>
                                    <b class="text-success">Delivered</b>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

