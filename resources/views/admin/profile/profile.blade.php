@extends("layouts.admin")

@section("title", "Product")

@section("nav-title", "Product")

@section("content")


<section class="section">
    <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
            <h4 class="page-title m-b-0">Profile</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fas fa-home"></i></a>
        </li>
        <li class="breadcrumb-item">Profile</li>
    </ul>
    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                    <div class="card-body">
                        <div class="author-box-center">
                            <div style="width: 100px; height:100px; margin-left:33%">
                                @if(auth()->user()->image)
                                <img alt="image" src="{{ asset(auth()->user()->image) }}"
                                    class="rounded-circle" style="width: 100%; height:100%; object-fit:cover">
                                @else
                                <img alt="image" src="{{ asset('admin/img/user.png') }}"
                                    class="rounded-circle author-box-picture">
                                @endif
                            </div>
                            <div class="mt-md-4 mt-3 mt-sm-0">
                                <form action="{{ route('user.dashboard.profile.image') }}" method="POST" id="image-form" enctype="multipart/form-data">
                                    @csrf
                                    <label for="image" class="btn btn-primary ">Change Picture</label>
                                    <input type="file" id="image" name="image" hidden>
                                </form>
                            </div>
                            <div class="clearfix"></div>
                            <div class="author-box-name">
                                <a href="#">{{ auth()->user()->name }}</a>
                            </div>
                            <div class="author-box-job">Admin</div>
                        </div>

                    </div>
                </div>


            </div>
            <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                    <div class="padding-20">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab2" data-toggle="tab" href="#settings"
                                    role="tab" aria-selected="false">Setting</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade active show" id="settings" role="tabpanel"
                                aria-labelledby="profile-tab2">
                                <form method="POST" action="{{ route('admin.profile.save') }}" class="needs-validation">
                                    @csrf
                                    <div class="card-header">
                                        <h4>Edit Profile</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label> Name</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ auth()->user()->name }}">
                                                @error('name')
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-7 col-12">
                                                <label>Email</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email }}">
                                                @error('email')
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-5 col-12">
                                                <label>Phone</label>
                                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ auth()->user()->phone }}">
                                                @error('email')
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                                <form method="POST" action="{{ route('admin.profile.password') }}" class="needs-validation">
                                    @csrf
                                    <div class="card-header">
                                        <h4>Edit Password</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label> Old Password</label>
                                                <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" placeholder="Enter Current Password">
                                                @error('old_password')
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-7 col-12">
                                                <label>New Password</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter New Password">
                                                @error('password')
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-5 col-12">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Retype New Password">
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    $(document).on('change','#image',function () {
        $('#image-form').submit();
    });
</script>
@endsection
