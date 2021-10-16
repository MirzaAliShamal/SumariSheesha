@extends("layouts.admin")

@section("title", "Payment")


@section("content")


<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Payment</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.cms.home') }}">CMS</a>
    </li>
    <li class="breadcrumb-item active">Payment</li>
</ul>

<div class="col-12">
    <div class="card mt-5">
        <div class="card-header">
            <h4>PayPal API Keys</h4>
        </div>
        <form action="{{ route('admin.cms.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">

                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Client ID</label>
                        <input type="text" class=" form-control" name="paypal_client_id" value="{{ setting('paypal_client_id') }}">
                    </div>
                </div>
                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Secret ID</label>
                        <input type="text" class=" form-control" name="paypal_secret_id" value="{{ setting('paypal_secret_id') }}">
                    </div>
                </div>
                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Mode</label>
                        <input type="text" class=" form-control" name="paypal_mode" value="{{ setting('paypal_mode') }}">
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
