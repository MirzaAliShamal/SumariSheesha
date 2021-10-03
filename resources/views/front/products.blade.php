@extends('layouts.front')

@section('title', 'Products')

@section('content')
<section class="bg-half d-table w-100 bg-page"
    style="background-image: url('{{ asset('theme/images/hero-bg.png') }}');">
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
            @foreach ($products as $item)
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-sm-auto mb-4">
                <div class="products">
                    <div class="card-image">
                        @if($item->image)
                            <img src="{{ asset($item->image) }}" class="img-fluid" alt="Product">
                        @else
                            <img src="{{ asset('empty.jpg') }}" class="img-fluid" alt="Product">
                        @endif
                    </div>
                    <div class="card-body">
                        <a href="{{ route('products', $item->slug) }}">
                            <h4>{{ Str::limit($item->name, 11, '...') }}</h4>
                        </a>
                        <p>{{ Str::limit($item->meta_description, 45, '...') }}</p>
                    </div>
                </div>
                <div class="text-center">
                    <button type="button" data-id="{{ $item->id }}" data-url="1" class="button button-md mt-4 addToCart">Add To
                        Cart</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
