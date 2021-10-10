@extends("layouts.admin")

@section("title", "General")

@section("nav-title", "General")

@section("content")


<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">General</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.cms.general') }}">General</a>
    </li>
    <li class="breadcrumb-item active">Add</li>
</ul>

<div class="col-12">
    <div class="card mt-5">
        <div class="card-header">
            <h4>ADD General</h4>
        </div>
        <form action="{{ route('admin.cms.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <div class="form-group col-6 col-md-6">
                    <label> Fav Icon</label>
                    <input type="file" class=" dropify" name="fav_icon" data-default-file="{{ asset(setting('fav_icon')) }}">
                </div>
                <div class="form-group col-6 col-md-6">
                    <label> Logo</label>
                   <input type="file" class="dropify" name="logo"  data-default-file="{{ asset(setting('logo')) }}">
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
            <h4>ADD</h4>
        </div>
        <form action="{{ route('admin.cms.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <div class="form-group col-12 col-md-12">
                    <label>Site Title</label>
                    <input type="text" class=" form-control" name="site_title" value="{{ setting('site_title') }}">
                </div>
                <div class="form-group col-12 col-md-12">
                    <label> Footer Text</label>
                    <textarea class="summernote" name="footer_text">{!! setting('footer_text') !!}</textarea>
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
            <h4>ADD SEO Details</h4>
        </div>
        <form action="{{ route('admin.cms.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <div class="form-group col-12 col-md-12">
                    <label>Meta Keywords (seperate by ,)</label>
                    <input type="text" class=" form-control" name="meta_keywords" value="{{ setting('meta_keywords') }}">
                </div>
                <div class="form-group col-12 col-md-12">
                    <label> Footer Text</label>
                    <textarea class="summernote" name="meta_description">{!! setting('meta_description') !!}</textarea>
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
            <h4>ADD Social Links</h4>
        </div>
        <form action="{{ route('admin.cms.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <div class="form-group col-12 col-md-12">
                    <label>Facebbok Url</label>
                    <input type="text" class=" form-control" name="facebook" value="{{ setting('facebook') }}">
                </div>
                <div class="form-group col-12 col-md-12">
                    <label> Twitter</label>
                    <input type="text" class=" form-control" name="twitter" value="{{ setting('twitter') }}">
                </div>
                <div class="form-group col-12 col-md-12">
                    <label> Instagram</label>
                    <input type="text" class=" form-control" name="instagram" value="{{ setting('instagram') }}">
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
