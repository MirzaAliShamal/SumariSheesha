@extends("layouts.admin")

@section("title", "Earnings")

@section("nav-title", "Earnings")

@section("content")


<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Earnings</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item active">Earnings</li>
</ul>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Earnings</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="datatables table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="20px">
                                #
                            </th>
                            <th>Transaction Type</th>
                            <th>Payer Id</th>
                            <th>Payment Method</th>
                            <th>Amount</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @if($item->logable_type == 'App\Models\Booking')
                                <td>Booking</td>
                            @else
                                <td>Order</td>
                            @endif
                            <td>{{ $item->payer_id }}</td>
                            <td>{{ $item->payment_method }}</td>
                            <td>{{ $item->amount }}</td>
                            <td class="text-right">
                            @if($item->logable_type == 'App\Models\Booking')
                                <a href="{{ route('admin.earning.view',[$item->logable_id,'booking']) }}" class="btn btn-success " title="view Details">
                                    <i class="far fa-eye"></i>
                                </a>
                            @else
                                <a href="{{ route('admin.earning.view',$item->logable_id) }}" class="btn btn-success " title="view Details">
                                    <i class="far fa-eye"></i>
                                </a>
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
