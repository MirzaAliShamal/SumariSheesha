<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Zivi - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('admin/css/app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href="{{asset('admin/img/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('admin/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/bundles/prism/prism.css') }}">
    <style>

    </style>
    @yield('css')

</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <form id="logout-form" class="d-none" method="post" action="{{ route('logout') }}">@csrf</form>
            {{-- NAVBAR STARTS HERE --}}
            @include('admin.components.navbar')
            {{-- NAVBAR ENDS HERE --}}

            {{-- SIDEBAR STARTS HERE --}}
            @include('admin.components.sidebar')
            {{-- SIDEBAR ENDS HERE--}}

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>
            {{-- <div class="content">
                <div class="content">
                </div>
            </div> --}}
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2019 <div class="bullet"></div> Design By <a href="#">Redstar</a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{asset('admin/js/app.min.js')}}"></script>
    <!-- JS Libraies -->
    <script src="{{asset('admin/bundles/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/bundles/amcharts4/core.js')}}"></script>
    <script src="{{asset('admin/bundles/amcharts4/charts.js')}}"></script>
    <script src="{{asset('admin/bundles/amcharts4/animated.js')}}"></script>
    <script src="{{asset('admin/bundles/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('admin/bundles/datatables/datatables.min.js')}}"></script>
    <script src="{{ asset('admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('admin/bundles/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('admin/bundles/prism/prism.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{asset('admin/js/page/index.js')}}"></script>
    <!-- Template JS File -->
    <script src="{{asset('admin/js/scripts.js')}}"></script>
    <!-- Custom JS File -->
    <script src="{{asset('admin/js/custom.js')}}"></script>

    <script>
         var table = $('.datatables').DataTable({
                "sort": true,
                "ordering": true,
                "pagingType": "full_numbers",
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }
            });
    </script>
</body>

</html>
