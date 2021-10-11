@extends("layouts.admin")

@section("title", "Sub Category")

@section("nav-title", "Sub Category")

@section("content")


<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Sub Category</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item active">Sub Category</li>
</ul>
<div class="container mb-2 text-right">
    <a href="{{ route('admin.sub.category.add') }}" class="btn btn-primary">Add Sub Category</a>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Sub Category</h4>
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
                            <th>Category</th>
                            <th>Description</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td class="text-right">
                                <button onclick="deleteAlert('{{ route('admin.sub.category.delete',$item->id) }}')" class="btn btn-danger " title="delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <a href="{{ route('admin.sub.category.edit',$item->id) }}" class="btn btn-success " title="edit">
                                    <i class="far fa-edit"></i>
                                </a>

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
