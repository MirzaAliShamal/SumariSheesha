@extends("layouts.admin")

@section("title", "Coupon")


@section("content")


<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Coupon</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.cms.home') }}">CMS</a>
    </li>
    <li class="breadcrumb-item active">Coupon</li>
</ul>

<div class="col-12">
    <div class="card mt-5">
        <div class="card-header">
            <h4>Coupon setting</h4>
        </div>
        <form action="{{ route('admin.cms.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">

                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Coupon Code</label>
                        <input type="text" class=" form-control" name="coupon_code" value="{{ setting('coupon_code') }}">
                    </div>
                </div>
                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Coupon percentage</label>
                        <input type="number" class=" form-control" name="coupon_percentage" value="{{ setting('coupon_percentage') }}">
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
