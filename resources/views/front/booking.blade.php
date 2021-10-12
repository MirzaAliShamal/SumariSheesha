@extends('layouts.front')

@section('title', 'Booking for Delivery')

@section('meta')
    <meta name="keywords" content="{{ setting('meta_keywords') }}">
    <meta name="description" content="{{ setting('meta_description') }}">
@endsection

@section('css')
<style>
    #map {
        width: 100%;
        height: 400px;
    }

    $speed: 250ms;

    body {
        background: #F3F3F3;
        padding: 0;
        margin: 0;
        overflow-x: hidden;
        line-height: 20px;
    }

    body.open {
        overflow-y: hidden;
    }

    .shop {
        position: relative;
        z-index: 100;
    }

    .shop__header {
        box-sizing: border-box;
        position: fixed;
        bottom: 0px;
        background: rgba(255, 255, 255, 0.9);
        width: 100%;
        padding: 15px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .shop__text {
        display: block;
        padding: 0;
        margin: 0;
        float: right;

        .button {
            padding: 10px 15px;
        }
    }

    .button {
        padding: 5px 10px;
        border-radius: 3px;

        font-weight: bold;
        font-size: 14px;
        text-decoration: none;
        color: #FFF;
    }

    .button--light {
        background: #FFF;
        color: #F00;
    }

    .carts {
        position: fixed;
        background: #ebe4e4;
        width: 400px;
        max-width: 90%;
        height: 100%;
        top: 0;
        right: 0;
        box-shadow: -2px 0 4px rgba(119, 80, 80, 0.2);
        overflow: hidden;
        transform: translate(500px, 0);
        transition: transform $speed ease-in-out;
        z-index: 5000;
    }

    body.open .carts {
        transform: translate(0, 0);
    }

    .carts__header {
        box-sizing: border-box;
        position: relative;
        background: rgba(10, 10, 10, 0.9);
        width: 100%;
        padding: 15px 15px;
        margin-bottom: -100px;
        overflow: hidden;
        z-index: 2;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);

        .carts__text {
            float: right;
        }
    }

    .carts__title {
        font-size: 20px;
        line-height: 40px;
        margin: 0;
        float: left;
    }

    .carts__products {
        box-sizing: border-box;
        position: relative;
        top: 45px;
        width: 100%;
        height: 100%;
        padding: 70px 0;
        margin-bottom: 100px;
        overflow-x: hidden;
        overflow-y: scroll;
        -webkit-overflow-scrolling: touch;
        z-index: 1;

        article {
            padding: 15px;
            border-bottom: 1px dotted #CCC;

            h1 {
                font-size: 16px;
                line-height: 20px;
                margin: 0;
            }

            p {
                font-size: 14px;
                margin: 0;

                a {
                    color: #F00
                }
            }
        }
    }

    /* .carts__product {
        display: none;
    } */

    .carts__empty {
        padding: 30px 15px;
        margin: 0;
        font-style: italic;
        text-align: center;

        &.hide {
            display: none;
        }
    }

    .carts__footer {
        box-sizing: border-box;
        position: absolute;
        background: rgba(10, 10, 10, 0.9);
        width: 100%;
        padding: 15px;
        top: 45;
        left: 0;
        bottom: 0;
        z-index: 2;
        box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.2);
        text-align: right;
    }

    .carts__text {
        margin: 0;

        .button {
            padding: 10px 15px;
        }
    }

    .lightbox {
        position: fixed;
        background: #000;
        width: 0;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 10;
        opacity: 0;
        transition: opacity $speed ease-in-out, width 0ms ease-in-out $speed;
    }

    body.open .lightbox {
        width: 100%;
        opacity: 0.8;
        transition: opacity $speed ease-in-out, width 0ms ease-in-out;
    }
</style>
@endsection


@section('content')

<section class="bg-half d-table w-100 bg-page"
    style="background-image: url('{{ asset('theme/images/hero-bg.png') }}');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Booking for Delivery</h2>
            </div>
        </div>
    </div>
</section>

<aside class="carts js-cart">
    <div class="carts__header">
        <h1 class="carts__title">Booking cart</h1>
        <p class="carts__text" style="margin-left: 275px">
            <a class="button  js-toggle" href="#" title="Close cart">
                Close cart
            </a>
        </p>
        <div style="margin-left: 260px; margin-top: 15px">
            <small>Total:</small>
            £ <span class="main-color-text  font-weight-bold booking-total">{{ Cart::instance('booking')->total() }}</span>
        </div>
    </div>
    <div class="carts__products js-cart-products">
        <div class="carts__product js-cart-product-template">
            <article class="js-cart-product text-dark">
                <ul class="carts__product booking-list js-cart-product-template">
                    @if(Cart::instance('booking')->content()->count() > 0)
                        @foreach (Cart::instance('booking')->content() as $item)
                        <li class="cart-item d-flex w-100 mb-3">
                            <div class="cart-image">
                                @if(getBrandPrdDetails($item->id)->image)
                                    <div style="height: 100px; width:100px">
                                        <img src="{{ asset(getBrandPrdDetails($item->id)->image) }}" style="height: 100%; width:100%; object-fit:cover" class="img-fluid" alt="">
                                    </div>
                                @else
                                    <div style="height: 100px; width:100px">
                                        <img src="{{ asset('empty.jpg') }}" class="img-fluid" alt="">
                                    </div>
                                @endif
                            </div>
                            <div class="cart-detail ms-2 m-auto">
                                <p>{{ $item->name }}</p>
                                <small>Qty: <span class="cart-qty">{{ $item->qty }}</span></small>
                                <small class="ms-2">Price: £ <span class="cart-price">{{ $item->price }}</span></small>
                            </div>
                            <div class="cart-handler ms-auto">
                                <span data-id="{{ $item->rowId }}" style="cursor: pointer" class="remove-booking"><i class="far fa-times"></i></span>
                            </div>
                        </li>
                        @endforeach
                    @else
                         <p class="mt-3 mb--3 text-center">Cart is empty</p>
                    @endif

                </ul>
            </article>
        </div>
    </div>
    <div class="carts__footer">
        <p class="carts__text booking-cart-footer">
            @if(Cart::instance('booking')->content()->count() > 0)
                {{-- @if(auth()->user()) --}}
                    <a class="button" href="{{ route('user.booking.checkout') }}" title="Checkout ">
                        Checkout
                    </a>
                {{-- @else
                    <a class="button" href="{{ route('login') }}" title="Checkout">
                        Checkout
                    </a>
                @endif --}}
            @else
                <a class="button book-checkout" href="" title="Checkout">
                    Checkout
                </a>
            @endif

        </p>
    </div>
</aside>

<div class="lightbox js-lightbox js-toggle-cart"></div>




<section class="shop">
    <div class="shop__header bg-transparent">
        <p class="shop__text">
            <a class="button js-toggle" href="#" title="View Bookings">
                Bookings
            </a>
        </p>
    </div>
</section>
<section class="section bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Address" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="postcode">Postcode</label>
                                <input type="text" class="form-control" id="postcode" name="postcode"
                                    placeholder="Postcode" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country" id="country" class="form-control">
                                    <option value="" disabled selected>Nothing Selected</option>
                                    @foreach (countries() as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="text" class="form-control book-date datepicker" id="date" name="date"
                                    placeholder="Date" autocomplete="off" value="{{ now()->format('m/d/Y') }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="text" class="form-control book-time timepicker" id="timepicker" name="time"
                                    placeholder="Time" autocomplete="off" value="{{ now()->format('HH:MM') }}" readonly>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-5">
                            <div class="form-group">
                                <button class="button button-md book-checkout search-shisha" type="button">Search for Shisha</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <div class="col-12">
                <div id="map" style="display: none;"></div>
            </div>

        </div>
    </div>
</section>
@endsection
@section('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBiMlDi4wWwmGpVcQqW09U1M68jI2OEfK0" async defer></script>
<script>
    var base_image_url = "{{ asset('/') }}";

        function initMap(lat, lng, markers) {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: Number(lat), lng: Number(lng) },
                zoom: 10,
            });

            var infowindow = new google.maps.InfoWindow();

            $.each(markers, function (indexInArray, valueOfElement) {
                const marker = new google.maps.Marker({map, anchorPoint: new google.maps.Point(0, -29),});
                marker.setPosition({ lat: Number(valueOfElement.lat), lng: Number(valueOfElement.lng) });
                marker.setVisible(true);

                if (valueOfElement.brand_products.length > 0) {
                    var html_infowindow = `
                        <div id='infowindow'>
                            <h4 class="text-dark">${valueOfElement.name}</h4>
                    `;
                    $.each(valueOfElement.brand_products, function (i, e) {
                        html_infowindow += `
                            <div class="d-flex mt-3">
                                <div class="image">
                                    <img src="${base_image_url+e.image}" class="img-fluid">
                                </div>
                                <div class="details ms-2">
                                    <p>${e.name}</p>
                                    <small class="d-block">Price per day: <strong>£${e.price}</strong></small>
                                    <a data-id="${e.id}" class="add-booking">Book Now</a>
                                </div>
                            </div>
                        `;
                    });

                    html_infowindow += `
                        </div>
                    `;
                } else {
                    var html_infowindow = ``;
                }

                marker.addListener('click', function () {
                    infowindow.setContent(html_infowindow);
                    infowindow.open(map, this);
                });
            });
        }

        function getBrands(lat, lng) {
            $.ajax({
                type: "GET",
                url: "{{ route('get.brands') }}",
                data: {
                    lat:lat,
                    lng:lng,
                },
                success: function (response) {
                    console.log(response);
                    if (response.length > 0) {
                        $("#map").show();
                        initMap(lat, lng, response);
                    } else {
                        iziToast.error({
                            title: 'Alert!',
                            message: 'Please fill out address to continue',
                            position: 'topRight'
                        });
                        $("#map").hide();
                    }
                }
            });
        }

        $(document).on("click", ".search-shisha", function() {
            if ($("#address").val() == "") {
                iziToast.error({
                    title: 'Alert!',
                    message: 'Please fill out address to continue',
                    position: 'topRight'
                });
                
                return false;
            }
            if ($("#postcode").val() == "") {
                iziToast.error({
                    title: 'Alert!',
                    message: 'Please fill out postcode to continue',
                    position: 'topRight'
                });
                
                return false;
            }
            if ($("#country").val() == "") {
                iziToast.error({
                    title: 'Alert!',
                    message: 'Please select country to continue',
                    position: 'topRight'
                });
                
                return false;
            }
            var lat = 0;
            var lng = 0;
            var postcode = $("#postcode").val();
            var coder = new google.maps.Geocoder();
            coder.geocode({'address': postcode,}, function(results, status) {
                if(status == google.maps.GeocoderStatus.OK) {
                    lat = results[0].geometry.location.lat();
                    lng = results[0].geometry.location.lng();
                    // postal_code = results[0].formatted_address;
                    // zipcode = results[0].address_components[0].long_name;
                    // $(".header-location-name").html(postal_code);
                    // $(".code").html(postal_code);
                    // $("[name='postal_code']").val(zipcode);
                    // $(".postal-code-full").html(postal_code);
                    // $("[name='current_lat']").val(results[0].geometry.location.lat());
                    // $("[name='current_lng']").val(results[0].geometry.location.lng());
                    getBrands(lat, lng);
                } else {
                    iziToast.error({
                        title: 'Alert!',
                        message: 'Please enter a valid UK postcode.',
                        position: 'topRight'
                    });
                    $(".postal-code-full").html("<small class='text-danger'>Please enter a valid US ZIP code.</small>");
                }
            });
            // $('html, body').animate({
            //     scrollTop: $("#map").offset().top
            // }, 2000);
        });

        $(document).on('click','.add-booking',function () {
            var id = $(this).data('id');
            var date = $('.book-date').val();
            var time = $('.book-time').val();
            $(this).text('Booked');
            // console.log(id);
            $.get('{{route('user.booking.add')}}',
                {
                    _token: "{{csrf_token()}}",
                    id:id,
                    date:date,
                    time:time
                },
                function(response){
                    console.log(response);
                    if (response.status) {
                        console.log(response.html)
                        openCart()
                        $('.booking-total').text(response.total);
                        $('.booking-list').html(response.html);
                        $('.booking-cart-footer').html(response.footer);

                        iziToast.success({
                            title:'Alert!',
                            message:'This Item booked successully',
                            position:'topRight'
                        });
                    }

                }
            )
        });


        var cartOpen = false;
        var numberOfProducts = 0;

        $('body').on('click', '.js-toggle', toggleCart);
        function toggleCart(e) {
        e.preventDefault();
        if(cartOpen) {
            closeCart();
            return;
        }
        openCart();
        }

        function openCart() {
        cartOpen = true;
        $('body').addClass('open');
        }

        function closeCart() {
        cartOpen = false;
        $('body').removeClass('open');
        }

        $(document).on('click', '.remove-booking', function () {
            var e = $(this);
            var id = e.data('id');
            console.log(id)
            e.closest('li').remove();
            $.get('{{route('user.booking.remove')}}',
                {
                    _token: "{{csrf_token()}}",
                    id:id,
                },
                function(response){
                    console.log(response);
                    if (response.status) {
                        $('.booking-total').text(response.total);
                        $('.booking-list').html(response.html);
                        $('.booking-cart-footer').html(response.footer);
                        iziToast.success({
                            title:'Alert!',
                            message:'Item successfully removed from cart!',
                            position:'topRight'
                        });
                    }
                }
            )
        });

</script>
@endsection
