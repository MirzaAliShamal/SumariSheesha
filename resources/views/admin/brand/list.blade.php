@extends("layouts.admin")

@section("title", "Brand")

@section("nav-title", "Brand")

@section("content")


<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Brand</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item active">Brand</li>
</ul>
<div class="container mb-2 text-right">
    <a href="{{ route('admin.brand.add') }}" class="btn btn-primary">Add Brand</a>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Brand</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="datatables table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="20px">
                                #
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th class="text-right" width="20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->location }}</td>
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
                                <button onclick="deleteAlert('{{ route('admin.brand.delete',$item->id) }}')" class="btn btn-danger " title="delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <a href="{{ route('admin.brand.edit',$item->id) }}" class="btn btn-success " title="edit">
                                    <i class="far fa-edit"></i>
                                </a>
                                @if($item->status)
                                    <button onclick="alertMessage('{{ route('admin.brand.status',$item->id) }}')" class="btn btn-info" title="Change Status">
                                        <i class="far fa-check-circle"></i>
                                    </button>
                                @else
                                    <button onclick="alertMessage('{{ route('admin.brand.status',$item->id) }}')" class="btn btn-warning" title="Change Status">
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
