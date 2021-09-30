@extends('layouts.front')

@section('title', 'Checkout')

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

<section class="section bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12 mb-5 order-2 order-sm-1">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h5>Shipping Information</h5>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" name="fname" id="fname" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" name="lname" id="lname" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address" value="" autocomplete="off">
                                <input type="text" class="form-control mt-3" name="apt_suite" id="apt_suite" value="" placeholder="Apt #, Suite, Floor (Optional)" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-4">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" id="city" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-4">
                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" class="form-control" name="state" id="state" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-4">
                            <div class="form-group">
                                <label for="zipcode">Zip Code</label>
                                <input type="text" class="form-control" name="zipcode" id="zipcode" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="save_billing_address" name="save_billing_address">
                                    <label class="form-check-label" for="save_billing_address">Save this as my billing address</label>
                                </div>
                            </div>
                        </div>
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
                                <input type="email" class="form-control" name="email" id="email" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="phone">Phone No</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="create_account" name="create_account">
                                    <label class="form-check-label" for="create_account">Create an account also if not have already</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex mt-5">
                        <a href="" class="button button-md">Back to Cart</a>
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
                                <td class="text-end">£ 1500</td>
                            </tr>
                            <tr>
                                <td>Discount:</td>
                                <td class="text-end">£ 20</td>
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
                        <h5 class="ms-auto"><strong>£ 1500</strong></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
