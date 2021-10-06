@extends("layouts.admin")

@section("title", "Bookings")

@section("nav-title", "Bookings")

@section("content")


<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Bookings</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item active">Bookings</li>
</ul>


<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Bookings</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="datatables table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="20px">
                                #
                            </th>
                            <th>Date</th>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th width="5%">Total Amount(GBP)</th>
                            <th>Status</th>
                            <th>Payment Status</th>
                            <th class="text-right"width="20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item )
                        <tr>
                            <td><b>BO{{ $item->uuid }}</b></td>
                            <td>{{ $item->created_at->format('d/m/y') }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->brandProduct->name }}</td>
                            <td>{{ $item->amount }}</td>
                            @if($item->status)
                            <td>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <div class="badge-outline col-red">Pending</div>
                                </div>
                            </td>
                            @else
                            <td>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <div class="badge-outline col-cyan">Delivered</div>
                                </div>
                            </td>
                            @endif
                            @if($item->payment_status)
                            <td>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <div class="badge-outline col-cyan">PAID</div>
                                </div>
                            </td>
                            @else
                            <td>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <div class="badge-outline col-red">Unpaid</div>
                                </div>
                            </td>
                            @endif
                            <td class="text-right">


                                @if($item->status)
                                <button onclick="alertMessage('{{ route('admin.booking.status',$item->id) }}')"
                                    class="btn btn-info" title="Change Status">
                                    <i class="far fa-check-circle"></i>
                                </button>
                                @else
                                <button onclick="alertMessage('{{ route('admin.booking.status',$item->id) }}')"
                                    class="btn btn-warning" title="Change Status">
                                    <i class="fas fa-times"></i>
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

