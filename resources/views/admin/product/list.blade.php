@extends("layouts.admin")

@section("title", "Product")

@section("nav-title", "Product")

@section("content")


<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Product</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item active">Product</li>
</ul>
<div class="container mb-2 text-right">
    <a href="{{ route('admin.product.add') }}" class="btn btn-primary">Add Product</a>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Product</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="datatables table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10%">Code</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price(GBP)</th>
                            <th>Status</th>
                            <th>Featured Home <small>(click to change)</small></th>
                            <th >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item )
                        <tr>
                            <td style="width: 10%"><b>#SSP{{ $item->uuid }}</b></td>
                            <td>
                                <div style="height: 50px; width:50px">
                                    @if(count($item->images) > 0)
                                        <img src="{{ asset($item->images->first()->image) }}" style="width: 100%; height:100%; object-fit:cover" alt="">
                                    @else
                                        <img src="{{ asset('uploads/products/empty.png') }}" class="rounded mr-75" alt="product image"  style="height:100%; width:100%; object-fit: cover">
                                    @endif
                                </div>
                            </td>
                            <td title="{{ $item->name }}">{{ Str::limit($item->name, 15, '...') }}</td>
                            <td>{{ $item->category->name }}</td>
                            @if($item->quantity > 3)
                                <td>{{ $item->quantity }}</td>
                            @else
                                <td><b class="text-danger">{{ $item->quantity }}</b></td>
                            @endif
                            <td>{{ $item->price }}</td>
                            @if($item->status)
                                <td>
                                    <div class="badge badge-success badge-shadow">Active</div>
                                </td>
                            @else
                                <td>
                                    <div class="badge badge-danger badge-shadow">Disabled</div>
                                </td>
                            @endif

                            @if($item->featured_on_home)
                                <td>
                                    <a href="{{ route('admin.product.featured.status', $item->id) }}">
                                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                            <div class="badge-outline col-cyan">Yes</div>
                                        </div>
                                    </a>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('admin.product.featured.status', $item->id) }}">
                                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                            <div class="badge-outline col-red">No</div>
                                        </div>
                                    </a>
                                </td>
                            @endif
                            <td>
                                <button onclick="deleteAlert('{{ route('admin.product.delete',$item->id) }}')" class="btn btn-danger btn-sm" title="delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <a href="{{ route('admin.product.edit',$item->id) }}" class="btn btn-success btn-sm" title="edit">
                                    <i class="far fa-edit"></i>
                                </a>
                                @if($item->status)
                                    <button onclick="alertMessage('{{ route('admin.product.status',$item->id) }}')" class="btn btn-info btn-sm" title="Change Status">
                                        <i class="far fa-check-circle"></i>
                                    </button>
                                @else
                                    <button onclick="alertMessage('{{ route('admin.product.status',$item->id) }}')" class="btn btn-warning btn-sm" title="Change Status">
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
