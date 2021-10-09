@extends('layouts.front')

@section('title', 'Dashboard')
@section('css')
    <style>
        .font{
            font-size: 16px !important;
        }
    </style>
@endsection
@section('content')
<section class="bg-half d-table w-100 bg-page" style="background-image: url('{{ asset('theme/images/hero-bg.png') }}');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Dashboard</h2>
            </div>
        </div>
    </div>
</section>

<section class="section bg-light-dark" >

    <div class="container">
        <div class="align-items-center row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="navigation" style="text-align: center; margin-bottom:20px; padding:20px">
                    <ul class="nav">
                        <li><a href="{{ route('user.dashboard.order') }}" class="font bg-dark py-2 px-4 d-inline-block"  style="border-radius: 6px">Orders</a></li>
                        <li><a href="{{ route('user.dashboard.booking') }}" class="font bg-dark py-2 px-4 d-inline-block"  style="border-radius: 6px">Bookings</a></li>
                        <li><a href="{{ route('user.dashboard.profile') }}"class="font bg-dark py-2 px-4 d-inline-block" style="border-radius: 6px">Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-9 col-sm-9 col-9 mb-4">
                <div class="card border-0 rounded shadow bg-dark">
                    <div class="card-body">
                        <h5 class="text-md-start text-center">Personal Detail :</h5>

                        <div class="mt-3 text-md-start text-center d-sm-flex">
                            <div style="width: 100px; height:100px; justify-content-center" >
                                @if($user->image)
                                    <img src="{{ asset($user->image) }}" id="avatar-img" class=" float-md-left rounded-circle " style="height: 100%; width:100%; object-fit:cover" alt="">
                                @else
                                    <img src="{{ asset('empty.jpg') }}" id="avatar-img" class=" float-md-left rounded-circle " style="height: 100%; width:100%; object-fit:cover" alt="">
                                @endif
                            </div>
                            &nbsp;
                            <div class="mt-md-4 mt-3 mt-sm-0">
                                <form action="{{ route('user.dashboard.profile.image') }}" method="POST" id="image-form" enctype="multipart/form-data">
                                    @csrf
                                    <label for="image" class="button button-md mt-2">Change Picture</label>
                                    <input type="file" id="image" name="image" hidden>
                                </form>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('user.dashboard.profile.bio') }}" >
                            @csrf
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input name="name" value="{{ $user->name }}" id="name" type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="Name :" autocomplete="off">
                                        @error('name')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Email</label>
                                        <input name="email" value="{{ $user->email }}" id="email" type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email :" autocomplete="off">
                                        @error('email')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!--end col-->

                            </div><!--end row-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="button button-md" type="submit">Save Changes</button>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form><!--end form-->


                        <div class="row mt-4">
                            <div class="col-md-6 mt-4 pt-2">
                                <h5>Contact Info :</h5>

                                <form  method="POST" action="{{ route('user.dashboard.profile.contact') }}">
                                    @csrf
                                    <div class="row mt-4">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Phone No. :</label>

                                                <input name="phone" value="{{ $user->phone }}" id="phone" type="text" class="form-control  @error('phone') is-invalid @enderror" placeholder="Phone :" autocomplete="off">
                                                @error('name')
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12 mt-2 mb-0">
                                            <button class="btn button button-md">Add</button>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div><!--end col-->

                            <div class="col-md-6 mt-4 pt-2">
                                <h5>Change password :</h5>
                                <form action="{{ route('user.dashboard.profile.password') }}" method="POST">
                                    @csrf
                                    <div class="row mt-4">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Old password :</label>
                                                <input type="password" name="old_password" class="form-control  @error('old_password') is-invalid @enderror" placeholder="Old password" autocomplete="off">
                                                @error('old_password')
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">New password :</label>

                                                <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="New password" autocomplete="off">
                                                @error('password')
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Re-type New password :</label>

                                                <input type="password" name="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror" placeholder="Re-type New password" autocomplete="off">
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12 mt-2 mb-0">
                                            <button class="button button-md">Save password</button>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div><!--end col-->
                        </div><!--end row-->
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


