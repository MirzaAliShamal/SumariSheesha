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
    <a href="{{ route('admin.brand_product.add') }}" class="btn btn-primary">Add Product</a>
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
                            <th>Product code</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Flavour</th>
                            <th>Color</th>
                            <th>Price(GBP)</th>
                            <th style="width: 2%">Status</th>
                            <th class="text-right" style="width: 20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item )
                        <tr>
                            <td><b>#SSBP{{ $item->uuid }}</b></td>
                            <td>
                                <div style="height: 50px; width:50px">
                                    @if($item->image)
                                        <img src="{{ asset($item->image) }}" style="width: 100%; height:100%; object-fit:cover" alt="">
                                    @else
                                        <img src="{{ asset('uploads/products/empty.png') }}" class="rounded mr-75" alt="product image"  style="height:100%; width:100%; object-fit: cover">
                                    @endif
                                </div>
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->brand->name }}</td>
                            <td>{{ $item->flavour ? $item->flavour->name : 'N/A'}} </td>
                            <td>{{ $item->color ? $item->color->name : 'N/A'}}</td>
                            <td>{{ $item->price }}</td>
                            @if($item->status)
                                <td>
                                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                        <div class="badge-outline col-cyan">Available</div>
                                    </div>
                                </td>
                            @else
                            <td>
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <div class="badge-outline col-red">Unvailable</div>
                                </div>
                            </td>
                            @endif
                            <td class="text-right">
                                <button onclick="deleteAlert('{{ route('admin.brand_product.delete',$item->id) }}')" class="btn btn-danger btn-sm" title="delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <a href="{{ route('admin.brand_product.edit',$item->id) }}" class="btn btn-success btn-sm" title="edit">
                                    <i class="far fa-edit"></i>
                                </a>
                                @if($item->status)
                                    <button onclick="alertMessage('{{ route('admin.brand_product.status',$item->id) }}')" class="btn btn-info btn-sm" title="Change Status">
                                        <i class="far fa-check-circle"></i>
                                    </button>
                                @else
                                    <button onclick="alertMessage('{{ route('admin.brand_product.status',$item->id) }}')" class="btn btn-warning btn-sm" title="Change Status">
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
