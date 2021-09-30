@extends('layouts.front')

@section('title', 'Shopping Cart')

@section('content')
<section class="bg-half d-table w-100 bg-page" style="background-image: url('{{ asset('theme/images/hero-bg.png') }}');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Shopping Cart</h2>
            </div>
        </div>
    </div>
</section>

<section class="section bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-9 col-sm-9 col-12 mb-4">
                <div class="table-scrollable cart-table">
                    <table class="m-auto table table-responsive">
                        <thead>
                            <tr>
                                <th width="50%">Products</th>
                                <th width="20%">Quantity</th>
                                <th width="15%">Price</th>
                                <th width="15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="50%">
                                    <div class="d-flex">
                                        <img src="{{ asset('theme/images/product-1.png') }}" width="80px" class="img-fluid" alt="">
                                        <div class="ms-2">
                                            <p class="title">Khalil Mamoon Mini Classic (1 hose) Hookah</p>
                                            <p class="detail">SKU: #1000001</p>
                                            <p class="detail">Category: Shisha</p>
                                            <p class="detail">Color: Black</p>
                                        </div>
                                    </div>
                                </td>
                                <td width="20%">
                                    <div class="input-group quantity mb-3">
                                        <span class="input-group-text" onclick="quantityField('minus')">-</span>
                                        <input type="text" class="form-control" value="1" name="qty" id="qty" readonly>
                                        <span class="input-group-text" onclick="quantityField('plus')">+</span>
                                    </div>
                                </td>
                                <td width="15%">
                                    <p class="product-price">£ 1500</p>
                                    <p class="product-price-each">£ 100 each</p>
                                </td>
                                <td width="15%">
                                    <button class="button button-sm">Remove</button>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <div class="d-flex">
                                        <img src="{{ asset('theme/images/product-2.png') }}" width="80px" class="img-fluid" alt="">
                                        <div class="ms-2">
                                            <p class="title">Khalil Mamoon Mini Classic (1 hose) Hookah</p>
                                            <p class="detail">SKU: #1000001</p>
                                            <p class="detail">Category: Shisha</p>
                                            <p class="detail">Color: Black</p>
                                        </div>
                                    </div>
                                </td>
                                <td width="20%">
                                    <div class="input-group quantity mb-3">
                                        <span class="input-group-text" onclick="quantityField('minus')">-</span>
                                        <input type="text" class="form-control" value="1" name="qty" id="qty" readonly>
                                        <span class="input-group-text" onclick="quantityField('plus')">+</span>
                                    </div>
                                </td>
                                <td width="15%">
                                    <p class="product-price">£ 1500</p>
                                    <p class="product-price-each">£ 100 each</p>
                                </td>
                                <td width="15%">
                                    <button class="button button-sm">Remove</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-12 mb-4">
                <div class="cart-card cart-coupon-card">
                    <p class="mb-0">Have coupon?</p>
                    <div class="input-group">
                        <input type="text" class="form-control" name="coupon_code" placeholder="Coupon code">
                        <button class="btn btn-outline-secondary" type="button">Apply</button>
                    </div>
                </div>
                <div class="cart-card cart-calculation-card">
                    <table class="w-100">
                        <tbody>
                            <tr>
                                <td>Price:</td>
                                <td class="text-end price">£ 1500</td>
                            </tr>
                            <tr>
                                <td>Discount:</td>
                                <td class="text-end discount">£ 20</td>
                            </tr>
                            <tr>
                                <td>Total:</td>
                                <th class="text-end total">£ 1500</th>
                            </tr>
                        </tbody>
                    </table>
                    <hr>

                    <div class="text-center">
                        <a href="{{ route('checkout') }}" class="button button-block">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
