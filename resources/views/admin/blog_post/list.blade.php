@extends("layouts.admin")

@section("title", "Blog Posts")

@section("nav-title", "Blog Posts")

@section("content")


<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Blog Posts</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item active">Blog Post</li>
</ul>
<div class="container mb-2 text-right">
    <a href="{{ route('admin.blog.post.add') }}" class="btn btn-primary">Add Post</a>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Blog Post</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="datatables table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="20px">
                                #
                            </th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Posted By</th>
                            <th>Status</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div style="height: 50px; width:50px">
                                    @if($item->featured_image)
                                        <img src="{{ asset($item->featured_image) }}" style="width: 100%; height:100%; object-fit:cover" alt="">
                                    @else
                                        <img src="{{ asset('uploads/products/empty.png') }}" class="rounded mr-75" alt="product image"  style="height:100%; width:100%; object-fit: cover">
                                    @endif
                                </div>
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->blogCategory->name }}</td>
                            <td>{{ $item->user->name }}</td>
                            @if($item->status == "1")
                                <td>
                                    <div class="badge badge-primary badge-shadow">In Review</div>
                                </td>
                            @elseif($item->status == "2")
                                <td>
                                    <div class="badge badge-warning badge-shadow">Draft</div>
                                </td>
                            @elseif($item->status == "3")
                                <td>
                                    <div class="badge badge-success badge-shadow">Published</div>
                                </td>
                            @elseif($item->status == "4")
                                <td>
                                    <div class="badge badge-danger badge-shadow">Rejected</div>
                                </td>
                            @endif
                            <td class="text-right">
                                <button onclick="deleteAlert('{{ route('admin.blog.post.delete',$item->id) }}')" class="btn btn-danger " title="delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <a href="{{ route('admin.blog.post.edit',$item->id) }}" class="btn btn-success " title="edit">
                                    <i class="far fa-edit"></i>
                                </a>
                                <div class="dropdown d-inline mr-2">
                                    <button class="btn btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.blog.post.status', $item->id) }}?status=1">Mark as In Review</a>
                                        <a class="dropdown-item" href="{{ route('admin.blog.post.status', $item->id) }}?status=2">Mark as Draft</a>
                                        <a class="dropdown-item" href="{{ route('admin.blog.post.status', $item->id) }}?status=3">Mark as Published</a>
                                        <a class="dropdown-item" href="{{ route('admin.blog.post.status', $item->id) }}?status=4">Mark as Rejected</a>
                                    </div>
                                </div>
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
