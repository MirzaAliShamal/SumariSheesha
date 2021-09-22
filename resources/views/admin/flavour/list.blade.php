@extends("layouts.admin")

@section("title", "Flavour")

@section("nav-title", "Flavour")

@section("content")


<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Flavour</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item active">Flavour</li>
</ul>
<div class="container mb-2 text-right">
    <a href="{{ route('admin.flavour.add') }}" class="btn btn-primary">Add Flavour</a>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Flavours</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="datatables table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">
                                #
                            </th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
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
                                <button onclick="" class="btn btn-danger " title="delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <a href="" class="btn btn-success " title="edit">
                                    <i class="far fa-edit"></i>
                                </a>
                                @if($item->status)
                                    <a href="{{ route('admin.flavour.status',$item->id) }}" class="btn btn-info " title="Change Status">
                                        <i class="far fa-check-circle"></i>
                                    </a>
                                @else
                                    <a href="{{ route('admin.flavour.status',$item->id) }}" class="btn btn-warning " title="Change Status">
                                        <i class="fas fa-times"></i>
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
