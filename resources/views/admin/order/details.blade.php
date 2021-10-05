@extends("layouts.admin")

@section("title", "Order Details")

@section("nav-title", "Order Details")

@section("content")


<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Order Details</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item active">Order Details</li>
</ul>


<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Order Details</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="datatables table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="20px">
                                #
                            </th>
                            <th>Product Name</th>
                            <th> Note</th>
                            <th>Quantity</th>
                            <th>Price(GBP)</th>
                            <th>Total(GBP)</th>
                            {{-- <th class="text-right">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->order->note ? $item->order->note : 'N/A' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>
                            <td><b>{{ $item->total }}</b></td>
                            {{-- <td class="text-right">

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
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

