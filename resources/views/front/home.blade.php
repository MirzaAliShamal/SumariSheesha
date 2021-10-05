@extends('layouts.front')

@section('title', 'Home')

@section('content')
<section class="bg-half-260 d-table w-100 bg-home" style="background-image: url('{{ asset('theme/images/hero-bg.png') }}');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1>Samurai Shisha</h1>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12 text-center">
                <p>is simply dummy text of the printing and typesetting industry</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-dark section bg-gallery" style="background-image: url('{{ asset('theme/images/gallery-bg.png') }}');">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-12 text-center">
                <h2>Gallery</h2>
            </div>
            <div class="col-md-10 text-center mt-4">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At commodi ex, quos natus facilis dicta impedit, accusantium iusto a et ea debitis incidunt? Fugit consectetur veniam quae quo dolore incidunt?</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-2 col-sm-2 col-2 text-end m-auto">
                <span class="video-carousel-control" data-bs-target="#video-carousel" data-bs-slide="prev">
                    <i class="fas fa-chevron-left"></i>
                </span>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-8 m-auto">
                <div id="video-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="2000">
                            <video class="img-fluid" autoplay loop muted>
                                <source src="{{ asset('theme/videos/gallery-1.mp4') }}" type="video/mp4" />
                            </video>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <video class="img-fluid" autoplay loop muted>
                                <source src="{{ asset('theme/videos/gallery-1.mp4') }}" type="video/mp4" />
                            </video>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <video class="img-fluid" autoplay loop muted>
                                <source src="{{ asset('theme/videos/gallery-1.mp4') }}" type="video/mp4" />
                            </video>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-2 m-auto">
                <span class="video-carousel-control" data-bs-target="#video-carousel" data-bs-slide="next">
                    <i class="fas fa-chevron-right"></i>
                </span>
            </div>
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
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 text-center pb-5">
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
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 text-center pb-5">
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
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 text-center pb-5">
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
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 text-center pb-5">
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
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 text-center pb-5">
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
        <div class="row justify-content-center mb-5">
            <div class="col-12 text-center">
                <h2>Products</h2>
            </div>
        </div>

        <div class="row justify-content-center pb-5">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-sm-auto mb-4">
                <div class="product-card">
                    <div class="card-image">
                        <img src="{{ asset('theme/images/product-1.png') }}" class="img-fluid" alt="Product">
                    </div>
                    <div class="card-body text-end">
                        <h4>Shisha</h4>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12  mt-auto mb-auto">
                <h3>Shisha</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias quaerat numquam, dolorum eaque</p>
                <a href="" class="button button-md mt-4">Read More</a>
            </div>
        </div>

        <div class="row justify-content-center pb-5">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-sm-auto mt-auto mb-auto order-sm-1 order-2">
                <h3>Hookah</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias quaerat numquam, dolorum eaque</p>
                <a href="" class="button button-md mt-4">Read More</a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-sm-auto mb-4 order-sm-2 order-1">
                <div class="product-card">
                    <div class="card-image">
                        <img src="{{ asset('theme/images/product-2.png') }}" class="img-fluid" alt="Product">
                    </div>
                    <div class="card-body text-sm-start text-end">
                        <h4>Hookah</h4>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                </div>
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
@endsection
