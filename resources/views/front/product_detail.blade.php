@extends('layouts.front')

@section('title', $product->name)

@section('meta')
    <meta name="keywords" content="{{ $product->meta_keywords }}">
    <meta name="description" content="{{ $product->meta_description }}">
@endsection

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
            <div class="col-lg-4 col-md-4 col-12 mb-2">
                <div class="product-image">
                    @if(count($product->images) > 0)
                    <div class="row justify-content-center">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-2 text-end m-auto">
                            <span class="video-carousel-control" data-bs-target="#video-carousel" data-bs-slide="prev">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-8 m-auto">
                            <div id="video-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($product->images as $image)
                                        <div class="carousel-item {{ $loop->iteration ==1 ? 'active': '' }}" data-bs-interval="2000">
                                            <img src="{{ asset($image->image) }}" class="img-fluid" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-2 m-auto">
                            <span class="video-carousel-control" data-bs-target="#video-carousel" data-bs-slide="next">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        </div>
                    </div>
                        {{-- <img src="{{ asset($product->image) }}" class="img-fluid" alt=""> --}}
                    @else
                        <img src="{{ asset('empty.jpg') }}" class="img-fluid" alt="">
                    @endif
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-12 mb-2">
                <h4>{{ $product->name }}</h4>
                <div class="product-details">
                    <p class="mb-0"><strong>SKU:</strong> #{{ $product->uuid }}</p>
                    <p class="mb-0"><strong>Category:</strong> {{ $product->category->name }}</p>
                    @if (!is_null($product->flavour_id))
                        <p class="mb-0"><strong>Flavour:</strong> {{ $product->flavour->name }}</p>
                    @endif
                    @if (!is_null($product->color_id))
                        <p class="mb-0"><strong>Color:</strong> {{ $product->color->name }}</p>
                    @endif
                    <p><strong>Price:</strong> £ {{ number_format($product->price) }}</p>
                    <p class="mb-0"><strong>Description:</strong></p>
                    <p>{{ $product->description }}</p>
                    <p class="mb-0"><strong>Quantity:</strong></p>
                    <div class="input-group quantity-field mb-3">
                        <span class="input-group-text" onclick="quantityField('minus')">-</span>
                        <input type="text" class="form-control qty-pro" value="1" name="qty" id="qty" readonly>
                        <span class="input-group-text" onclick="quantityField('plus')">+</span>
                    </div>

                    <button type="button" data-id="{{ $product->id }}" data-url="2" class="button button-md mt-4 addToCart">Add To Cart</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script>
        function quantityField(handler) {
            let qty = parseInt($("#qty").val());
            if (handler == "minus") {
                if (qty > 1) {
                    qty = qty-1;
                    $("#qty").val(qty);
                }
            }
            if (handler == "plus") {
                if (qty >= 1) {
                    qty = qty+1;
                    $("#qty").val(qty);
                }
            }
        }
    </script>
@endsection
