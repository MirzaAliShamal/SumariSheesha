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
    <li class="breadcrumb-item">
        <a href="{{ route('admin.sub.category.list') }}">Sub Category</a>
    </li>
    <li class="breadcrumb-item active">Add</li>
</ul>

<div class="col-12">
    <div class="card mt-5">
        <div class="card-header">
            <h4>ADD Sub Category</h4>
        </div>
        <form action="{{ route('admin.sub.category.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label> Select Category</label>
                    <select name="category" id="category" class="form-control select2">
                        <option value=""selected disabled>Nothing Selected</option>
                        @foreach ($list as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label> Name</label>
                    <input type="text" class="form-control" name="name" id="name" required="">
                </div>
                <div class="form-group">
                    <label> Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

</div>
@endsection
