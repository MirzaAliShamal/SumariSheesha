<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title') - Sumari Sheesha</title>

    {{-- External Libraries --}}
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/css/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/css/slick-theme.css') }}" type="text/css">

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

    @yield('css')
</head>
<body>
    @include('front.components.header')

    @yield('content')

    @include('front.components.footer')


    <script src="{{ asset('theme/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/js/slick.min.js') }}"></script>
    <script src="{{ asset('theme/js/main.js') }}"></script>

    @yield('js')
</body>
</html>
