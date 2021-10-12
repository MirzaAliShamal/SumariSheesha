<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset(setting('fav_icon')) }}" type="image/x-icon">
    <title>@yield('title') - {{ setting('site_title') }}</title>

    @yield('meta')

    {{-- External Libraries --}}
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap-datepicker.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/css/mdtimepicker.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/css/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme/css/slick-theme.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

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
        #DataTables_Table_0_filter input{
            color: white;
        }
        #DataTables_Table_0_length{
            color: white;
        }
        #DataTables_Table_0_info{
            color: white;
        }
        .dataTables_empty{
            color: #000000;
        }
    </style>
    @yield('css')
</head>

<body class="position-relative">
    <form method="POST" class="d-none" id="logout-form"  action="{{ route('logout') }}">@csrf</form>

    @include('front.components.header')

    @yield('content')

    @include('front.components.footer')

    <div class="age-modal-wrapper">
        <div class="age-modal" style="background-image: url('{{ asset('theme/images/modal-bg.png') }}');">
            <div class="age-modal-inner">
                <h2>Confirm your age</h2>
                <p>We requires user to be 18 years old, <br> please confirm your age</p>

                <div class="form-check d-inline-block">
                    <input class="form-check-input" type="checkbox" value="1" id="age-restrict">
                    <label class="form-check-label" for="age-restrict">
                        I confirm that I'm 18 years old or younger
                    </label>
                </div>
                <br>
                <button class="button button-md mt-5">Submit</button>
            </div>
        </div>
    </div>


    <script src="{{ asset('theme/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@v1.0.2-rc2/mdtimepicker.min.js"></script>
    <script src="{{ asset('theme/js/slick.min.js') }}"></script>
    <script src="{{ asset('theme/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

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
    @yield('js')

    <script>
        var table = $('.datatables').dataTable({
            "sort": true,
            "ordering": true,
            "pagingType": "full_numbers",
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });
        $(document).on('click','.addToCart',function () {
            var id = $(this).data('id');
            if($(this).data('url') == '1'){
                var url = "{{ route('user.add.cart') }}"
            }
            else if($(this).data('url') == '2'){
                var qty= $('#qty').val()
                var url = "{{ route('user.add.cart') }}/"+qty ;
            }
            if( $(this).data('check') != '1' ){
                $(this).text('Added');
                $(this).removeClass('addToCart');
            }
            // console.log(id);
            $.get(url,
                {
                    _token: "{{csrf_token()}}",
                    id:id,
                },
                function(response){
                    console.log(response);
                    if (response.status) {
                        $('.shopping-cart-footer').html('');
                        $('.shopping-cart').addClass('active');
                        $('.total').text(response.total);
                        $('.shopping-cart-items').html(response.html);

                        iziToast.success({
                            title:'Alert!',
                            message:'Added to Cart successully',
                            position:'topRight'
                        });
                    }
                    else if(response.error == 404){
                        iziToast.error({
                            title:'Alert!',
                            message:'Sorry desired quantity is not available right now!',
                            position:'topRight'
                        });
                    }

                }
            )
        });
        $(document).on('click','.remove-cart',function () {
            var id = $(this).data('id');
            $(this).closest('li').remove();
            $(this).closest('tr').remove();
            // $(this).text('Add to Cart');
            // $(this).addClass('addToCart');
            // console.log(id);
            $.get('{{route('user.remove.cart')}}',
                {
                    _token: "{{csrf_token()}}",
                    id:id,
                },
                function(response){
                    console.log(response);
                    if (response.status) {
                        $('.shopping-cart-footer').html('');
                        $('.total').text(response.total);
                        $('.shopping-cart-items').html(response.html);
                        $('.cart-empty-show').html(response.view_cart);
                        iziToast.success({
                            title:'Alert!',
                            message:'Item successfully removed from cart!',
                            position:'topRight'
                        });
                    }
                }
            )
        });
        $(document).on('click','.update-cart',function () {
            var id = $(this).data('id');

            $.get('{{route('user.update.cart')}}',
                {
                    _token: "{{csrf_token()}}",
                    id:id,
                },
                function(response){
                    console.log(response);
                    if (response.status) {
                        $('.shopping-cart-footer').html('');
                        $('.total').text(response.total);
                        $('.shopping-cart-items').html(response.html);
                        $('.shopping-cart').addClass('active');
                        iziToast.success({
                            title:'Alert!',
                            message:'Quantity updated Successfully!',
                            position:'topRight'
                        });
                    }
                }
            )
        });
        // $(document).on('click','.checkout-cart',function () {
        //     @if (auth()->user())
        //         var id = $(this).data('id');
        //         $(this).closest('li').remove();
        //         // console.log(id);
        //         $.post('{{route('paypal.details')}}',
        //             {
        //                 _token: "{{csrf_token()}}",
        //             },
        //             function(response){
        //                 console.log(response);
        //                 if (response.status) {
        //                     $('.total').text({{ Cart::total() }});
        //                     $('.shopping-cart-items').html( '<p class="mt-3 mb--3 text-center">Cart is empty</p>')
        //                     iziToast.success({
        //                         title:'Alert!',
        //                         message:'Order has been placed successfully!',
        //                         position:'topRight'
        //                     });
        //                 }
        //             }
        //         )
        //     @else
        //             window.location = '{{ route('login') }}';
        //     @endif

        // });
    </script>
</body>

</html>
