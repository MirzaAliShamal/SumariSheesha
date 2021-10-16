<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Login - Sumari Sheesha</title>

    {{-- External Libraries --}}
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap-datepicker.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/css/mdtimepicker.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/css/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/css/slick-theme.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Reggae+One&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500&display=swap">
    <link rel="stylesheet" href="{{ asset('theme/fonts/css/all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/fonts/css/tabler-icons.css') }}" type="text/css">

    {{-- Stylesheet --}}
    <link rel="stylesheet" href="{{ asset('theme/css/main.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/css/responsive.css') }}" type="text/css">
    <style>
        div .text-danger .font-medium{
            margin-left: 25px;
        }
    </style>
</head>

<body>
    <section class="bg-home d-table w-100" style="background-image: url('{{ asset('theme/images/hero-bg.png') }}')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="text-center mb-5">
                        <a href="{{ route('home') }}"><img src="{{ asset('theme/images/logo.png') }}" width="120px" class="img-fluid" alt=""></a>
                    </div>
                    <div class="card bg-light-dark p-3">
                        <div class="card-header text-center">
                            <h3>Login Here</h3>
                        </div>
                        <x-auth-validation-errors class="mb-4 text-danger"  :errors="$errors" />
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="card-body">
                               <div class="form-group">
                                   <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" autocomplete="off">
                               </div>
                               <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" autocomplete="off">
                               </div>
                               <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="remember_me" name="remember">
                                        <label class="form-check-label" for="remember_me">Remember Me</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    @if (Route::has('password.request'))
                                       <small>
                                        <a class="text-decoration-underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                       </small>
                                    @endif
                                </div>

                                <div class="form-group mt-3 text-center">
                                        <button type="submit" class="button button-md">Login</button>
                                </div>

                                <div class="form-group mt-4 text-center">
                                    <p class="mb-0"><small>Don't have an account? <a href="{{ route('register') }}" class="text-decoration-underline">Register</a></small></p>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>




    <script src="{{ asset('theme/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@v1.0.2-rc2/mdtimepicker.min.js"></script>
    <script src="{{ asset('theme/js/slick.min.js') }}"></script>
    <script src="{{ asset('theme/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

</body>
