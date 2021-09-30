@extends('layouts.front')

@section('title', $product->name)

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
                    <img src="{{ asset($product->image) }}" class="img-fluid" alt="">
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
                        <input type="text" class="form-control" value="1" name="qty" id="qty" readonly>
                        <span class="input-group-text" onclick="quantityField('plus')">+</span>
                    </div>

                    <button type="button" class="button button-md mt-4">Add To Cart</button>
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
