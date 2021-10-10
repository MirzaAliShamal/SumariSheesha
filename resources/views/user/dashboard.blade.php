@extends('layouts.front')

@section('title', 'Dashboard')
@section('css')
    <style>
        .font{
            font-size: 16px !important;
        }
        .text-white option{
            color: black;
        }
    </style>
@endsection
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

<section class="section bg-light-dark" >

    <div class="container">
        <div class="align-items-center row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="navigation" style="text-align: center; margin-bottom:20px; padding:20px">
                    <ul class="nav">
                        <li><a href="{{ route('user.dashboard.order') }}" class="font bg-dark py-2 px-4 d-inline-block" style="border-radius: 6px">Orders</a></li>
                        <li><a href="{{ route('user.dashboard.booking') }}" class="font bg-dark py-2 px-4 d-inline-block" style="border-radius: 6px">Bookings</a></li>
                        <li><a href="{{ route('user.dashboard.profile') }}"class="font bg-dark py-2 px-4 d-inline-block" style="border-radius: 6px">Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-9 col-sm-9 col-9 mb-4">
                <div class="card border-0 rounded shadow bg-dark">
                    <div class="card-body">
                        <h5>Orders List</h5>
                        <table class="table datatables table-bordered text-white">
                            <thead>
                                <th>#</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>status</th>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="bg-dark text-white">
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
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    $(document).ready(function () {

        $('[name="DataTables_Table_0_length"]').addClass('text-white');
    });
</script>
@endsection

