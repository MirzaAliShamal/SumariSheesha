@extends("layouts.admin")

@section("title", "Home")


@section("content")


<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Home</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.cms.general') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">Add</li>
</ul>

<div class="col-12">
    <div class="card mt-5">
        <div class="card-header">
            <h4>ADD Home heading</h4>
        </div>
        <form action="{{ route('admin.cms.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <div class="form-group col-12 col-md-12">
                    <label> Home Heading</label>
                    <input type="text" class=" form-control" name="home_heading" value="{{ setting('home_heading') }}">
                </div>
                <div class="form-group col-12 col-md-12">
                    <label> Home Text</label>
                    <input type="text" class=" form-control" name="home_text" value="{{ setting('home_text') }}">
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<div class="col-12">
    <div class="card mt-5">
        <div class="card-header">
            <h4>ADD Gallery Video</h4>
        </div>
        <form action="{{ route('admin.cms.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <div class="form-group col-12 col-md-12">
                    <label>Home Gallery Video</label>
                    <input type="file" class=" dropify" name="home_gallery_video" data-default-file="{{ asset(setting('home_gallery_video')) }}">
                </div>
                <div class="form-group col-12 col-md-12">
                    <label> Home Gallery Text</label>
                    <textarea class="summernote" name="home_gallery_text">{!! setting('home_gallery_text') !!}</textarea>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection
