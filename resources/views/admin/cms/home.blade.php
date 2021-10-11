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
        <a href="{{ route('admin.cms.home') }}">CMS</a>
    </li>
    <li class="breadcrumb-item active">Home</li>
</ul>

<div class="col-12">
    <div class="card mt-5">
        <div class="card-header">
            <h4>Main Section</h4>
        </div>
        <form action="{{ route('admin.cms.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Main Background Image</label>
                        <input type="file" class="dropify" name="main_bg_image" data-default-file="{{ asset(setting('main_bg_image')) }}">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Main Heading</label>
                        <input type="text" class=" form-control" name="main_heading" value="{{ setting('main_heading') }}">
                    </div>
                    <div class="form-group">
                        <label>Main Text</label>
                        <textarea name="main_text" id="main_text" class="form-control" style="height: 100px !important">{{ setting('main_text') }}</textarea>
                    </div>
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
            <h4>Gallery Section</h4>
        </div>
        <form action="{{ route('admin.cms.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Gallery Video</label>
                        <input type="file" class="dropify" name="gallery_video" data-default-file="{{ asset(setting('gallery_video')) }}" accept="video/mp4,video/x-m4v,video/*">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Gallery Text</label>
                        <textarea name="gallery_text" id="gallery_text" class="form-control" style="height: 200px !important">{{ setting('gallery_text') }}</textarea>
                    </div>
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
            <h4>Deals Section</h4>
        </div>
        <form action="{{ route('admin.cms.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Deals Text</label>
                        <textarea name="deals_text" id="deals_text" class="form-control" style="height: 200px !important">{{ setting('deals_text') }}</textarea>
                    </div>
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
            <h4>About Us Section</h4>
        </div>
        <form action="{{ route('admin.cms.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>About Us</label>
                        <textarea name="about" id="about" class="form-control" style="height: 300px !important">{{ setting('about') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection
