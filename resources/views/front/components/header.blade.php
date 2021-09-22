<header class="topnav">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ asset('theme/images/logo.png') }}" class="img-fluid" alt="Logo"></a>
            </div>
            <div class="navigation ms-auto">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="">Products</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Booking for delivery</a></li>
                </ul>
                <a href="" class="button button-sm">Login</a>
                <a href="" class="cart"><i class="fal fa-shopping-cart"></i></a>
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
                <li><a href="">Products</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Booking for delivery</a></li>
            </ul>
        </div>
    </div>
</div>
