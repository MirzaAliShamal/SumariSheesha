<header class="topnav">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ asset('theme/images/logo.png') }}" class="img-fluid"
                        alt="Logo"></a>
            </div>
            <div class="navigation ms-auto">
                <ul class="nav">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('products') }}">Products</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="{{ route('booking.for.delivery') }}">Booking for delivery</a></li>
                </ul>
                <a href="{{ route('login') }}" class="button button-sm">Login</a>
                <span class="cart"><i class="fal fa-shopping-cart"></i></span>
                <div class="shopping-cart">
                    <div class="shopping-cart-header d-flex">
                        <i class="far fa-cart-plus"></i>
                        <div class="shopping-cart-total ms-auto">
                            <small>Total:</small>
                            £ <span class="main-color-text total font-weight-bold cart-price">{{ Cart::total() }}</span>
                        </div>
                    </div>

                    <ul class="shopping-cart-items w-100">
                        @php
                            $content = Cart::content()
                        @endphp
                        @if($content->count() > 0)
                            @foreach ($content as $item)
                            <li class="cart-item d-flex w-100">
                                <div class="cart-image">
                                    @if($item->options->image)
                                        <img src="{{ asset($item->options->image) }}" class="img-fluid" alt="">
                                    @else
                                        <img src="{{ asset('empty.jpg') }}" class="img-fluid" alt="">
                                    @endif
                                </div>
                                <div class="cart-detail ms-2 m-auto">
                                    <p>{{ $item->name }}</p>
                                    <small>Qty: <span class="cart-qty">{{ $item->qty }}</span></small>
                                    <small class="ms-2">Price: £ <span class="cart-price">{{ $item->price }}</span></small>
                                </div>
                                <div class="cart-handler ms-auto">
                                    <span data-id="{{ $item->rowId }}" style="cursor: pointer" class="remove-cart"><i class="far fa-times"></i></span>
                                </div>
                            </li>
                            @endforeach
                        @else
                            <p class="mt-3 mb--3 text-center">Cart is empty</p>
                        @endif

                    </ul>

                    <div class="shopping-cart-footer">
                        @if(Cart::content()->count() > 0)
                            <a href="{{ route('cart') }}" class="button button-md text-center">View Cart</a>
                            @if(auth()->user())
                                <a href="{{ route('checkout') }}" class="button button-md text-center checkout-cart">Checkout</a>
                            @else
                                <a href="{{ route('login') }}" class="button button-md text-center checkout-cart">Checkout</a>
                            @endif
                        @endif

                    </div>

                </div>
                <button class="toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasmenu"
                    aria-controls="offcanvasmenu"><i class="fal fa-bars"></i></button>
            </div>
        </div>
    </div>
</header>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasmenu" aria-labelledby="offcanvasmenuLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"><i
                class="fal fa-times"></i></button>
    </div>
    <div class="offcanvas-body">
        <div class="logo text-center justify-content-center m-auto">
            <a href="{{ route('home') }}"><img src="{{ asset('theme/images/logo.png') }}" width="80px" class="img-fluid"
                    alt="Logo"></a>
        </div>
        <div class="offcanvas-navigation">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('products') }}">Products</a></li>
                <li><a href="">About</a></li>
                <li><a href="{{ route('booking.for.delivery') }}">Booking for delivery</a></li>
            </ul>
        </div>
    </div>
</div>
