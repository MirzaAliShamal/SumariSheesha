@extends('layouts.front')

@section('title', 'Products')

@section('meta')
    <meta name="keywords" content="{{ setting('meta_keywords') }}">
    <meta name="description" content="{{ setting('meta_description') }}">
@endsection

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
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="category-widget">
                    <div class="accordion" id="category-accordion">
                        @foreach (getCategories() as $item)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="category-{{ $item->id }}">
                                    <button class="accordion-button {{ !is_null($category) && $category == $item->slug ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#subcategory-{{ $item->id }}" aria-expanded="true" aria-controls="subcategory-{{ $item->id }}">
                                        {{ $item->name }}
                                    </button>
                                </h2>
                                <div id="subcategory-{{ $item->id }}" class="accordion-collapse collapse {{ !is_null($category) && $category == $item->slug ? 'show' : '' }}" aria-labelledby="category-{{ $item->id }}" data-bs-parent="#category-accordion">
                                    <div class="accordion-body">
                                        <ul>
                                            @foreach ($item->subCategories as $sub)
                                                <li class="{{ !is_null($subcategory) && $subcategory == $sub->slug ? 'active' : '' }}">
                                                    <a href="{{ route('products', [$item->slug, $sub->slug]) }}">{{ $sub->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                <div class="row">
                    @if (count($products) > 0)
                        @foreach ($products as $item)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-sm-auto mb-4">
                                <div class="products">
                                    <div class="card-image">
                                        @if(count($item->images)>0)
                                            <img src="{{ asset($item->images->first()->image) }}" class="img-fluid" alt="Product">
                                        @else
                                            <img src="{{ asset('empty.jpg') }}" class="img-fluid" alt="Product">
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('product.detail', $item->slug) }}">
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
                    @else
                        <div class="col-12">
                            <div class="text-center">
                                <h2>Sorry!</h2>
                                <h3>No Results Found!</h3>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
