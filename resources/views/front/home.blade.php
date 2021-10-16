@extends('layouts.front')

@section('title', 'Home')

@section('meta')
    <meta name="keywords" content="{{ setting('meta_keywords') }}">
    <meta name="description" content="{{ setting('meta_description') }}">
@endsection

@section('content')
<section class="bg-half-260 d-table w-100 bg-home" style="background-image: url('{{ asset(setting('main_bg_image')) }}');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1>{{ setting('main_heading') }}</h1>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12 text-center">
                <p>{!! setting('main_text') !!}</p>
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
                <p>{!! setting('gallery_text') !!}</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-1 col-md-1 col-sm-1 col-1 text-end m-auto">
                <span class="video-carousel-control" data-bs-target="#video-carousel" data-bs-slide="prev">
                    <i class="fas fa-chevron-left"></i>
                </span>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-10 m-auto">
                <div id="video-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="7000">
                            <video class="img-fluid" autoplay loop muted>
                                <source src="{{ asset(setting('gallery_video')) }}" type="video/mp4" />
                            </video>
                        </div>

                        <div class="carousel-item" data-bs-interval="7000">
                            <video class="img-fluid" autoplay loop muted>
                                <source src="{{ asset(setting('gallery_video')) }}" type="video/mp4" />
                            </video>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-1 m-auto">
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
                {!! setting('deals_text') !!}
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

        @foreach ($products as $item)
            @if($loop->iteration % 2 == 0)
                <div class="row justify-content-center pb-5">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-sm-auto mt-auto mb-auto order-sm-1 order-2">
                        <h3>{{ $item->category->name }}</h3>
                        <p>{{ Str::limit($item->description, 70, '...') }}</p>
                        <a href="{{ route('products') }}" class="button button-md mt-4">See more</a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-sm-auto mb-4 order-sm-2 order-1">
                        <div class="product-card">
                            <div class="card-image">
                                @if(count($item->images)>0)
                                    <img src="{{ asset($item->images->first()->image) }}" class="img-fluid" alt="Product">
                                @else
                                    <img src="{{ asset('empty.jpg') }}" class="img-fluid" alt="Product">
                                @endif
                            </div>
                            <div class="card-body text-sm-start text-end">
                                <h4>{{ $item->name }}</h4>
                                <p>{{ Str::limit($item->description, 50, '...') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row justify-content-center pb-5">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-sm-auto mb-4">
                        <div class="product-card">
                            <div class="card-image">
                                @if(count($item->images)>0)
                                    <img src="{{ asset($item->images->first()->image) }}" class="img-fluid" alt="Product">
                                @else
                                    <img src="{{ asset('empty.jpg') }}" class="img-fluid" alt="Product">
                                @endif
                            </div>
                            <div class="card-body text-end">
                                <h4>{{ $item->name }}</h4>
                                <p>{{ Str::limit($item->description, 50, '...') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12  mt-auto mb-auto">
                        <h3>{{ $item->category->name }}</h3>
                        <p>{{ Str::limit($item->description, 70, '...') }}</p>
                        <a href="{{ route('products') }}" class="button button-md mt-4">See more</a>
                    </div>
                </div>
            @endif

        @endforeach

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
                {!! setting('about') !!}
            </div>
        </div>
    </div>
</section>
@endsection
