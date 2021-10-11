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
        <a href="{{ route('admin.cms.general') }}">CMS</a>
    </li>
    <li class="breadcrumb-item active">General</li>
</ul>

<div class="col-12">
    <div class="card mt-5">
        <div class="card-header">
            <h4>Logo / Favicon</h4>
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
            <h4>Site Settings</h4>
        </div>
        <form action="{{ route('admin.cms.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <div class="form-group col-12 col-md-12">
                    <label>Site Title</label>
                    <input type="text" class=" form-control" name="site_title" value="{{ setting('site_title') }}">
                </div>
                <div class="form-group col-12 col-md-12">
                    <label>Meta Keywords <small>(seperate by ,)</small></label>
                    <input type="text" class="form-control" name="meta_keywords" value="{{ setting('meta_keywords') }}">
                </div>
                <div class="form-group col-12 col-md-12">
                    <label>Meta Desription</label>
                    <textarea class="form-control" name="meta_description">{!! setting('meta_description') !!}</textarea>
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
            <h4>Contact Us Settings</h4>
        </div>
        <form action="{{ route('admin.cms.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <div class="form-group col-12 col-md-12">
                    <label>Address</label>
                    <input type="text" class=" form-control" name="address" value="{{ setting('address') }}">
                </div>
                <div class="form-group col-12 col-md-12">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ setting('phone') }}">
                </div>
                <div class="form-group col-12 col-md-12">
                    <label>Meta Desription</label>
                    <input type="email" class="form-control" name="email" value="{{ setting('email') }}">
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
            <h4>Footer Settings</h4>
        </div>
        <form action="{{ route('admin.cms.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <div class="form-group col-12 col-md-12">
                    <label>Footer Text</label>
                    <textarea class="form-control" name="footer_text" style="height: 300px !important;">{!! setting('footer_text') !!}</textarea>
                </div>
                <div class="form-group col-12 col-md-12">
                    <label>Facebook</label>
                    <input type="text" class=" form-control" name="facebook" placeholder="username" value="{{ setting('facebook') }}">
                </div>
                <div class="form-group col-12 col-md-12">
                    <label>Twitter</label>
                    <input type="text" class=" form-control" name="twitter" placeholder="username" value="{{ setting('twitter') }}">
                </div>
                <div class="form-group col-12 col-md-12">
                    <label>Instagram</label>
                    <input type="text" class=" form-control" name="instagram" placeholder="username" value="{{ setting('instagram') }}">
                </div>
                <div class="form-group col-12 col-md-12">
                    <label>LinkedIn</label>
                    <input type="text" class=" form-control" name="linkedin" placeholder="username" value="{{ setting('linkedin') }}">
                </div>
                <div class="form-group col-12 col-md-12">
                    <label>Whatsapp</label>
                    <input type="text" class=" form-control" name="whatsapp" placeholder="number" value="{{ setting('whatsapp') }}">
                </div>
                <div class="form-group col-12 col-md-12">
                    <label>TikTok</label>
                    <input type="text" class=" form-control" name="tiktok" placeholder="username" value="{{ setting('tiktok') }}">
                </div>
                <div class="form-group col-12 col-md-12">
                    <label>Snapchat</label>
                    <input type="text" class=" form-control" name="snapchat" placeholder="username" value="{{ setting('snapchat') }}">
                </div>
                <div class="form-group col-12 col-md-12">
                    <label>YouTube</label>
                    <input type="text" class=" form-control" name="youtube" placeholder="username" value="{{ setting('youtube') }}">
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
