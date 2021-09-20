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
                </div>
            </div>
        </div>
    </header>

    <section class="bg-half-260 d-table w-100 bg-home" style="background-image: url('{{ asset('theme/images/hero-bg.png') }}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h1>Samurai Shisha</h1>
                </div>
                <div class="col-sm-6 text-center">
                    <p>is simply dummy text of the printing and typesetting industry</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-dark section bg-gallery" style="background-image: url('{{ asset('theme/images/gallery-bg.png') }}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2>Gallery</h2>
                </div>
                <div class="col-md-10 text-center mt-4">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At commodi ex, quos natus facilis dicta impedit, accusantium iusto a et ea debitis incidunt? Fugit consectetur veniam quae quo dolore incidunt?</p>
                </div>

                {{-- <div class="col-md-8 text-center mt-3">
                    <div class="gallery-slider text-center">
                        <div class="item">
                            <video width="100%" height="400px" controls>
                                <source src="{{ asset('theme/videos/gallery-1.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                        <div class="item">
                            <video width="100%" height="400px" controls>
                                <source src="{{ asset('theme/videos/gallery-1.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                        <div class="item">
                            <video width="100%" height="400px" controls>
                                <source src="{{ asset('theme/videos/gallery-1.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <section class="section bg-deals" style="background-image: url('{{ asset('theme/images/deals-bg.png') }}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2>Deals</h2>
                </div>
                <div class="col-md-10 text-center mt-4">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At commodi ex, quos natus facilis dicta impedit, accusantium iusto a et ea debitis incidunt? Fugit consectetur veniam quae quo dolore incidunt?</p>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-2 text-center">
                    <div class="deals-card">
                        <div class="card-image">
                            <img src="{{ asset('theme/images/deals-1.png') }}" class="img-fluid" alt="Deals">
                        </div>
                        <div class="card-body">
                            <p class="card-title">Shisha</p>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                        </div>
                    </div>
                    <a href="" class="button button-md mt-4">Shop Now</a>
                </div>
                <div class="col-lg-2 text-center">
                    <div class="deals-card">
                        <div class="card-image">
                            <img src="{{ asset('theme/images/deals-2.png') }}" class="img-fluid" alt="Deals">
                        </div>
                        <div class="card-body">
                            <p class="card-title">Tobacco</p>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                        </div>
                    </div>
                    <a href="" class="button button-md mt-4">Shop Now</a>
                </div>
                <div class="col-lg-2 text-center">
                    <div class="deals-card">
                        <div class="card-image">
                            <img src="{{ asset('theme/images/deals-3.png') }}" class="img-fluid" alt="Deals">
                        </div>
                        <div class="card-body">
                            <p class="card-title">Bowl</p>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                        </div>
                    </div>
                    <a href="" class="button button-md mt-4">Shop Now</a>
                </div>
                <div class="col-lg-2 text-center">
                    <div class="deals-card">
                        <div class="card-image">
                            <img src="{{ asset('theme/images/deals-4.png') }}" class="img-fluid" alt="Deals">
                        </div>
                        <div class="card-body">
                            <p class="card-title">Coals</p>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                        </div>
                    </div>
                    <a href="" class="button button-md mt-4">Shop Now</a>
                </div>
                <div class="col-lg-2 text-center">
                    <div class="deals-card">
                        <div class="card-image">
                            <img src="{{ asset('theme/images/deals-5.png') }}" class="img-fluid" alt="Deals">
                        </div>
                        <div class="card-body">
                            <p class="card-title">Accessories</p>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                        </div>
                    </div>
                    <a href="" class="button button-md mt-4">Shop Now</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-products" style="background-image: url('{{ asset('theme/images/products-bg.png') }}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2>Products</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-about" style="background-image: url('{{ asset('theme/images/about-bg.png') }}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2>About Us</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 text-center mt-5">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. At commodi ex, quos natus facilis dicta impedit, accusantium iusto a et ea debitis incidunt? Fugit consectetur veniam quae quo dolore incidunt?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. At commodi ex, quos natus facilis dicta impedit, accusantium iusto a et ea debitis incidunt? Fugit consectetur veniam quae quo dolore incidunt?
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. At commodi ex, quos natus facilis dicta impedit, accusantium iusto a et ea debitis incidunt? Fugit consectetur veniam quae quo dolore incidunt?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. At commodi ex, quos natus facilis dicta impedit, accusantium iusto a et ea debitis incidunt? Fugit consectetur veniam quae quo dolore incidunt?
                    </p>

                    <a href="" class="button button-md mt-4">More</a>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-logo">
                        <img src="{{ asset('theme/images/logo.png') }}" class="img-fluid" alt="Footer Logo">
                    </div>
                    <p class="about">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum et consectetur officia beatae, quod harum fuga nisi maxime. Rem, molestias voluptates! Quisquam recusandae consectetur laboriosam quos voluptate inventore dignissimos sunt.</p>
                    <a href=""><strong>Read More <i class="far fa-angle-right"></i></strong></a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <p class="menu-title">Our Products</p>

                            <ul class="menu-vertical">
                                <li><a href="">Tobacco</a></li>
                                <li><a href="">Shisha</a></li>
                                <li><a href="">Hookah</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <p class="menu-title">Our Services</p>

                            <ul class="menu-vertical">
                                <li><a href="">Tobacco</a></li>
                                <li><a href="">Shisha</a></li>
                                <li><a href="">Hookah</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <p class="menu-title">About Us</p>

                            <ul class="menu-vertical">
                                <li><a href="">About</a></li>
                                <li><a href="">Careers</a></li>
                                <li><a href="">Testimonials</a></li>
                                <li><a href="">Blog</a></li>
                                <li><a href="">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="social-icons">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-vimeo-v"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 text-end">
                    <ul class="menu-horizontal">
                        <li><a href="">About</a></li>
                        <li><a href="">Careers</a></li>
                        <li><a href="">Testimonials</a></li>
                        <li><a href="">Blog</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>



    <script src="{{ asset('theme/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/js/slick.min.js') }}"></script>
    <script src="{{ asset('theme/js/main.js') }}"></script>

    @yield('js')
</body>
</html>
