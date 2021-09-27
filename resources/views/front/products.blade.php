@extends('layouts.front')

@section('title', 'Products')

@section('content')
<section class="bg-half d-table w-100 bg-page" style="background-image: url('{{ asset('theme/images/hero-bg.png') }}');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Products</h2>
            </div>
        </div>
    </div>
</section>

<section class="section bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-sm-auto mb-4">
                <div class="products">
                    <div class="card-image">
                        <img src="{{ asset('theme/images/product-1.png') }}" class="img-fluid" alt="Product">
                    </div>
                    <div class="card-body">
                        <a href=""><h4>Shisha</h4></a>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                </div>
                <div class="text-center">
                    <a href="" class="button button-md mt-4">Add To Cart</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
