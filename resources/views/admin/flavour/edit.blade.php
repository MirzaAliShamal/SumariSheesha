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
    <li class="breadcrumb-item">
        <a href="{{ route('admin.flavour.list') }}">Flavour</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
</ul>

<div class="col-12">
    <div class="card mt-5">
        <div class="card-header">
            <h4>Edit Flavour</h4>
        </div>
        <form action="{{ route('admin.flavour.save', $flavour->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label> Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $flavour->name }}" id="name" required="">
                </div>
                <div class="form-group">
                    <label> Description</label>
                    <textarea name="description" id="description" class="form-control">{{ $flavour->description }}</textarea>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

</div>
@endsection
