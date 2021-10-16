{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Forgot Password - Sumari Sheesha</title>

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
        <div class="container mb-3">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="text-center mb-5">
                        <a href="{{ route('home') }}"><img src="{{ asset('theme/images/logo.png') }}" width="120px" class="img-fluid" alt=""></a>
                    </div>
                    <div class="card bg-light-dark p-3">
                        <div class="card-header text-center">

                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}

                        </div>
                        <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email Address -->
                            <div>
                                <label for="email"> Email</label>

                                <input id="email" class="form-control" type="email" name="email"  required autofocus />
                            </div>

                            <div class="form-group mt-3 text-center">
                                <button class="button button-md">
                                    Email Password reset link
                                </button>
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
