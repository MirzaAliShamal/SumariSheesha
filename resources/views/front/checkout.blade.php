@extends('layouts.front')

@section('title', 'Checkout')

@section('meta')
    <meta name="keywords" content="{{ setting('meta_keywords') }}">
    <meta name="description" content="{{ setting('meta_description') }}">
@endsection

@section('content')
<section class="bg-half d-table w-100 bg-page" style="background-image: url('{{ asset('theme/images/hero-bg.png') }}');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Checkout</h2>
            </div>
        </div>
    </div>
</section>
@php
    $user = auth()->user();
@endphp
<section class="section bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12 mb-5 order-2 order-sm-1">
                <form action="{{ route('paypal.details') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h5>Shipping Information</h5>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="name"> Name</label>
                                <input type="text" class="form-control" value="{{ $user->name }}" required name="name" id="name" readonly  autocomplete="off">
                            </div>
                        </div>
                        <input type="hidden" name="book_date" id="book_date">
                        <input type="hidden" name="book_time" id="book_time">
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address" required value="{{ $user->address ? $user->address->address : ''}}" autocomplete="off">
                                {{-- <input type="text" class="form-control mt-3" name="apt_suite" id="apt_suite" value="{{ auth()->user() }}" placeholder="Apt #, Suite, Floor (Optional)" autocomplete="off"> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-4">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" id="city" required value="{{  $user->address ? $user->address->city : ''}}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-4">
                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" class="form-control" name="state" id="state" required value="{{ $user->address ? $user->address->state : ''}}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-4">
                            <div class="form-group">
                                <label for="zipcode">Post Code</label>
                                <input type="text" class="form-control" name="zipcode" id="zipcode" required value="{{ $user->address ? $user->address->zip_code : ''}}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country" id="country" class="form-control">
                                    <option value="" disabled selected>Nothing Selected</option>
                                    @foreach (countries() as $item)
                                    <option value="{{ $item->name }}"{{ $user->address && $user->address->country == $item->name ? 'selected': '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="save_billing_address" name="save_billing_address">
                                    <label class="form-check-label" for="save_billing_address">Save this as my billing address</label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="additional_note">Additional Note <small>(Optional)</small></label>
                                <textarea name="additional_note" id="additional_note" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <h5 class="mt-5">Contact Information</h5>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" required value="{{ $user->email }}" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="phone">Phone No</label>
                                <input type="text" class="form-control" name="phone" id="phone" required value="{{ $user->phone ? $user->phone : '' }}" autocomplete="off">
                            </div>
                        </div>

                        {{-- <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="create_account" name="create_account">
                                    <label class="form-check-label" for="create_account">Create an account also if not have already</label>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <div class="d-flex mt-5">
                        <a href="{{ route('cart') }}" class="button button-md">Back to Cart</a>
                        <button type="submit" class="button button-md ms-auto">Continue to Payment</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-5 order-1 order-sm-2">
                <h5>Order Summary</h5>
                <div class="cart-card cart-calculation-card">
                    <table class="w-100">
                        <tbody>
                            <tr>
                                <td>Price:</td>
                                <td class="text-end">£ {{ Cart::instance('product')->total() }}</td>
                            </tr>
                            <tr>
                                <td>Discount:</td>
                                @if(session('discount'))
                                    <td class="text-end">£ {{ session('discount') }}</td>
                                @else
                                    <td class="text-end">£ 0.00</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Shipping:</td>
                                <td class="text-end">Free</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="d-flex">
                        <h5><strong>Total</strong></h5>
                        @if(session('total'))
                            <h5 class="ms-auto"><strong>£ {{ session('total') }}</strong></h5>
                        @else
                            <h5 class="ms-auto"><strong>£ {{ Cart::instance('product')->total() }}</strong></h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

