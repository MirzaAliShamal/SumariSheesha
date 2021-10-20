
@extends('layouts.front')

@section('title', 'Brand Products')

@section('meta')
<meta name="keywords" content="{{ setting('meta_keywords') }}">
<meta name="description" content="{{ setting('meta_description') }}">
@endsection
@section('css')
    <style>
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
            box-shadow: 0 2px 4px rgb(0 0 0 / 20%);
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
                <h2>Brand Products</h2>
            </div>
        </div>
    </div>
    <section class="shop">
        <div class="shop__header bg-transparent">
            <p class="shop__text">
                <a class="button js-toggle" href="#" title="View Bookings">
                    Bookings
                </a>
            </p>
        </div>
    </section>
</section>
@php
$user = auth()->user();
@endphp
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

<section class="section bg-dark">
    <div class="container-fluid">
        <div class="row">
            <section class="section bg-dark">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                            <div class="category-widget">
                                <div class="accordion" id="category-accordion">
                                    @foreach (session('brands') as $item)
                                        <div class="accordion-item">
                                            <a href="{{ route('brand.products',$item->id) }}" style="font-family: 'Reggae One', cursive; font-weight: 400; display: inline-block; text-transform: uppercase; margin-top:18px; cursor: pointer" data-id="{{ $item->id }}">

                                                {{ $item->name }}
                                                {{-- <button class="accordion-button {{ !is_null($category) && $category == $item->slug ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#subcategory-{{ $item->id }}" aria-expanded="true" aria-controls="subcategory-{{ $item->id }}">
                                                    {{ $item->name }}
                                                </button> --}}
                                            </a>
                                            {{-- <div id="subcategory-{{ $item->id }}" class="accordion-collapse collapse {{ !is_null($category) && $category == $item->slug ? 'show' : '' }}" aria-labelledby="category-{{ $item->id }}" data-bs-parent="#category-accordion">
                                                <div class="accordion-body">
                                                    <ul>
                                                        @foreach ($item->subCategories as $sub)
                                                            <li class="{{ !is_null($subcategory) && $subcategory == $sub->slug ? 'active' : '' }}">
                                                                <a href="{{ route('products', [$item->slug, $sub->slug]) }}">{{ $sub->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div> --}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @php
                        if (session('brand_products_list')) {

                            $products = session('brand_products_list');
                        }
                        @endphp
                        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                            <div class="row">
                                    @foreach ($products as $item)
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5" >
                                            <div class="products">
                                                <div class="card-image">
                                                    @if($item->image)
                                                        <img src="{{ asset($item->image) }}" class="img-fluid" alt="Product">
                                                    @else
                                                        <img src="{{ asset('empty.jpg') }}" class="img-fluid" alt="Product">
                                                    @endif
                                                </div>
                                                <div class="card-body">
                                                    {{-- <a href="http://127.0.0.1:8000/product/mayo-pro-bowl"> --}}
                                                        <p>{{ Str::limit($item->brand->name, 15, '...') }}</p>
                                                        <h4>{{ Str::limit($item->name, 15, '...') }}</h4>
                                                    {{-- </a> --}}
                                                    <p>{{ Str::limit($item->description, 45, '...') }}</p>
                                                    <p>CAEGORY: &nbsp;<b>{{ $item->category->name }}</b></p>
                                                    <p>PRICE: &nbsp;£<b>{{ $item->price }}</b></p>
                                                    @if($item->color_id)
                                                        <p>COLOR: &nbsp;£<b>{{ $item->color->name }}</b></p>
                                                    @else
                                                        <p>FLAVOUR: &nbsp;<b>{{ $item->flavour->name }}</b></p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="button" data-id="{{ $item->id }}" class="button button-md mt-4 add-booking">Book Now</button>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script>
        $(document).on('click','.add-booking',function () {
            var id = $(this).data('id');
            $(this).removeClass('add-booking');
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
                    // console.log(response);
                    if (response.status) {
                        // console.log(response.html)
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
        // $(document).on('click','.bdp', function () {
        //     var id = $(this).data('id');
        //     $.post('{{route('brand.products')}}',
        //         {
        //             _token: "{{csrf_token()}}",
        //             id:id,
        //         },
        //         function(response){
        //             console.log(response);
        //             if (response.status) {
        //                 $('.booking-total').text(response.total);
        //                 $('.booking-list').html(response.html);
        //                 $('.booking-cart-footer').html(response.footer);
        //                 iziToast.success({
        //                     title:'Alert!',
        //                     message:'Item successfully removed from cart!',
        //                     position:'topRight'
        //                 });
        //             }
        //         }
        //     )
        // });
    </script>
@endsection

