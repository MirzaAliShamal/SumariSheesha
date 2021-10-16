@extends("layouts.admin")

@section("title", "Orders")

@section("nav-title", "Orders")

@section("content")


<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Orders</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item active">Orders</li>
</ul>


<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Orders</h4>
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
                            <th>Address</th>
                            <th>Contact no</th>
                            <th>Total Amount(GBP)</th>
                            <th>Status</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item )
                        <tr>
                            <td><b>PO{{ $item->uuid }}</b></td>
                            <td>{{ $item->created_at->format('d/m/y') }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user->address->address }}</td>
                            <td>{{ $item->user->phone }}</td>
                            <td>{{ $item->total }}</td>
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
                            <td class="text-right">
                                {{-- <button onclick="deleteAlert('{{ route('admin.flavour.delete',$item->id) }}')"
                                class="btn btn-danger " title="delete">
                                <i class="fas fa-trash"></i>
                                </button> --}}
                                <a href="{{ route('admin.order.view',$item->id) }}" class="btn btn-success order-details" title="details">
                                    <i class="far fa-eye"></i>
                                </a>
                                @if($item->status)
                                <button onclick="alertMessage('{{ route('admin.order.status',$item->id) }}')"
                                    class="btn btn-info" title="Change Status">
                                    <i class="far fa-check-circle"></i>
                                </button>
                                @else
                                <button onclick="alertMessage('{{ route('admin.order.status',$item->id) }}')"
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

