<header class="topnav">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ asset('theme/images/logo.png') }}" class="img-fluid" alt="Logo"></a>
            </div>
            <div class="navigation ms-auto">
                <ul class="nav">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('products') }}">Products</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Booking for delivery</a></li>
                </ul>
                <a href="" class="button button-sm">Login</a>
                <span class="cart"><i class="fal fa-shopping-cart"></i></span>
                <div class="shopping-cart">
                    <div class="shopping-cart-header d-flex">
                        <i class="far fa-cart-plus"></i>
                        <div class="shopping-cart-total ms-auto">
                            <small>Total:</small>
                            £ <span class="main-color-text total font-weight-bold cart-price">25.00</span>
                        </div>
                    </div>

                    <ul class="shopping-cart-items w-100">
                        <li class="cart-item d-flex w-100">
                            <div class="cart-image">
                                <img src="{{ asset('theme/images/product-1.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="cart-detail ms-2 m-auto">
                                <p>Khalil Mamon Classic</p>
                                <small>Qty: <span class="cart-qty">1</span></small>
                                <small class="ms-2">Price: £ <span class="cart-price">25.00</span></small>
                            </div>
                            <div class="cart-handler ms-auto">
                                <span class="remove-cart"><i class="far fa-times"></i></span>
                            </div>
                        </li>
                        <li class="cart-item d-flex w-100">
                            <div class="cart-image">
                                <img src="{{ asset('theme/images/product-2.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="cart-detail ms-2 m-auto">
                                <p>Khalil Mamon Classic</p>
                                <small>Qty: <span class="cart-qty">1</span></small>
                                <small class="ms-2">Price: £ <span class="cart-price">25.00</span></small>
                            </div>
                            <div class="cart-handler ms-auto">
                                <span class="remove-cart"><i class="far fa-times"></i></span>
                            </div>
                        </li>
                        <li class="cart-item d-flex w-100">
                            <div class="cart-image">
                                <img src="{{ asset('theme/images/product-1.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="cart-detail ms-2 m-auto">
                                <p>Khalil Mamon Classic</p>
                                <small>Qty: <span class="cart-qty">1</span></small>
                                <small class="ms-2">Price: £ <span class="cart-price">25.00</span></small>
                            </div>
                            <div class="cart-handler ms-auto">
                                <span class="remove-cart"><i class="far fa-times"></i></span>
                            </div>
                        </li>
                    </ul>

                    <div class="shopping-cart-footer">
                        <a href="{{ route('cart') }}" class="button button-md text-center">View Cart</a> <a href="" class="button button-md text-center">Checkout</a>
                    </div>

                </div>
                <button class="toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasmenu" aria-controls="offcanvasmenu"><i class="fal fa-bars"></i></button>
            </div>
        </div>
    </div>
</header>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasmenu" aria-labelledby="offcanvasmenuLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fal fa-times"></i></button>
    </div>
    <div class="offcanvas-body">
        <div class="logo text-center justify-content-center m-auto">
            <a href="{{ route('home') }}"><img src="{{ asset('theme/images/logo.png') }}" width="80px" class="img-fluid" alt="Logo"></a>
        </div>
        <div class="offcanvas-navigation">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('products') }}">Products</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Booking for delivery</a></li>
            </ul>
        </div>
    </div>
</div>
