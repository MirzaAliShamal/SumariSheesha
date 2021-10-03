<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title') - Sumari Sheesha</title>

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


    @yield('css')
</head>

<body>
    @include('front.components.header')

    @yield('content')

    @include('front.components.footer')


    <script src="{{ asset('theme/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@v1.0.2-rc2/mdtimepicker.min.js"></script>
    <script src="{{ asset('theme/js/slick.min.js') }}"></script>
    <script src="{{ asset('theme/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

    @yield('js')

    <script>
        $(document).on('click','.addToCart',function () {
            var id = $(this).data('id');
            $(this).text('Added');
            $(this).removeClass('addToCart');
            // console.log(id);
            $.get('{{route('user.add.cart')}}',
                {
                    _token: "{{csrf_token()}}",
                    id:id,
                },
                function(response){
                    console.log(response);
                    if (response.status) {

                        $('.shopping-cart').addClass('active');
                        $('.total').text(response.total);
                        $('.shopping-cart-items').html(response.html);

                        iziToast.success({
                            title:'Alert!',
                            message:'Added to Cart successully',
                            position:'topRight'
                        });
                    }

                }
            )
        });
        $(document).on('click','.remove-cart',function () {
            var id = $(this).data('id');
            $(this).closest('li').remove();
            // console.log(id);
            $.get('{{route('user.remove.cart')}}',
                {
                    _token: "{{csrf_token()}}",
                    id:id,
                },
                function(response){
                    console.log(response);
                    if (response.status) {
                        $('.total').text(response.total);
                        $('.shopping-cart-items').html(response.html);
                        iziToast.success({
                            title:'Alert!',
                            message:'Item successfully removed from cart!',
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
