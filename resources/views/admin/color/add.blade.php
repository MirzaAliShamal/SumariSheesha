@extends("layouts.admin")

@section("title", "Color")

@section("nav-title", "Color")

@section("content")


<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Color</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.color.list') }}">Color</a>
    </li>
    <li class="breadcrumb-item active">Add</li>
</ul>

<div class="col-12">
    <div class="card mt-5">
        <div class="card-header">
            <h4>ADD Color</h4>
        </div>
        <form action="{{ route('admin.color.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label> Name</label>
                    <input type="text" class="form-control" name="name" id="name" required="">
                </div>
                <div class="form-group">
                    <label> Description</label>
                    <input type="text" class="form-control" name="description" id="description" >
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

</div>
@endsection
