<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel='shortcut icon' type='image/x-icon' href="{{asset(setting('fav_icon')) }}" />
    <meta name="current" content="{{ auth()->user()->id }}">
    <meta name="role" content="{{ auth()->user()->role }}">
    <title>@yield('title') - {{ setting('site_title') }}</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('admin/css/app.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/bundles/prism/prism.css') }}">
    {{-- IZITOAST CSS FILE --}}
    <link rel="stylesheet" href="{{ asset('admin/bundles/izitoast/css/iziToast.min.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <link rel="stylesheet" href="{{ asset('admin/bundles/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/bundles/select2/dist/css/select2.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .dropify-wrapper .dropify-preview {
            background-color: #f6f6f6 !important;
        }
        .ck-editor__editable_inline {
            min-height: 400px;
        }
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
    <script>
        let notification_url = "{{ route('notification') }}";
    </script>
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
    <script src="{{ asset('admin/bundles/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('admin/bundles/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSGmioE5YdinM_BR5MDEyB3E7qamhiDNw&callback=initMap&libraries=places&v=weekly" async defer></script>
    <!--  CKEditor Plugin    -->
    <script src="{{ asset('admin/bundles/summernote/summernote-bs4.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    {{-- IZITOAST JS FILES --}}
    <script src="{{ asset('admin/bundles/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('admin/js/page/toastr.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('admin/js/page/sweetalert.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{asset('admin/js/page/index.js')}}"></script>
    <!-- Template JS File -->
    <script src="{{asset('admin/js/scripts.js')}}"></script>
    <!-- Custom JS File -->
    <script src="{{asset('admin/js/custom.js')}}"></script>
    <script src="{{ mix('js/app.js') }}"></script>

    @if(session('success'))
        <script>
             iziToast.success({
                title: 'Alert!',
                message: '{{ session("success") }}',
                position: 'topRight'
            });
        </script>
    @elseif(session('error'))
        <script>
            iziToast.error({
                title: 'Alert!',
                message: '{{ session("error") }}',
                position: 'topRight'
            });
        </script>
    @endif

    <script>
        ClassicEditor.create( document.querySelector( '#editor' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
         // Dropify
         $('.dropify').dropify();

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
            function deleteAlert(url) {
                swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                buttons: true,
                dangerMode: true,

                }).then((willDelete) => {
                    if (willDelete) {
                        location.href = url;
                    }
                });
            }
            function alertMessage(url) {
                swal({
                title: 'Are you sure?',
                text: 'This will change the status of this Item!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,

                }).then((willDelete) => {
                    if (willDelete) {
                        location.href = url;
                    }
                });
            }

    </script>
    @yield('js')

</body>

</html>
