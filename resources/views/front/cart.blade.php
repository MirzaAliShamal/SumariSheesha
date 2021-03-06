@if(Cart::instance('product')->content()->count() > 0)
@extends('layouts.front')

@section('title', 'Shopping Cart')

@section('meta')
    <meta name="keywords" content="{{ setting('meta_keywords') }}">
    <meta name="description" content="{{ setting('meta_description') }}">
@endsection

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
                <div class="table-scrollable cart-table cart-empty-show">
                    @if(Cart::instance('product')->content()->count() > 0)
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
                                @foreach (Cart::instance('product')->content() as $list)
                                    <tr>
                                        <td width="50%">
                                            <div class="d-flex">
                                                @if($list->options->image)
                                                    <img src="{{ asset($list->options->image) }}" width="80px" class="img-fluid" alt="">
                                                @else
                                                    <img src="{{ asset('empty.jpg') }}" width="80px" class="img-fluid" alt="">
                                                @endif
                                                <div class="ms-2">
                                                    <p class="title">{{ $list->name }}</p>
                                                    <p class="detail">SSP{{ getProductDetails($list->id)->uuid }}</p>
                                                    <p class="detail">Category: {{ getProductDetails($list->id)->category->name }}</p>
                                                    @if(getProductDetails($list->id)->color)
                                                        <p class="detail">Color: {{ getProductDetails($list->id)->color->name }}</p>
                                                    @endif
                                                    @if(getProductDetails($list->id)->flavour)
                                                        <p class="detail">Flavour: {{ getProductDetails($list->id)->flavour->name }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td width="20%">
                                            <div class="input-group quantity mb-3">
                                                <span class="input-group-text change update-cart" data-id="{{ $list->rowId }}" onclick="quantityField(this,'minus')">-</span>
                                                <input type="text" class="form-control" value="{{ $list->qty }}" name="qty" id="qty" readonly>
                                                <span class="input-group-text change addToCart" data-qty="{{ getProductDetails($list->id)->quantity }}" data-id="{{ $list->id }}" data-url="1" data-check="1" onclick="quantityField(this,'plus')">+</span>
                                            </div>
                                        </td>
                                        <td width="15%">
                                            <p class="product-price">?? <span class="product-price">{{ $list->qty * $list->price }}</span></p>
                                            <p class="product-price-each">?? <span class="product-price-each">{{ $list->price }}</span> each</p>
                                        </td>
                                        <td width="15%">
                                            <button data-id="{{ $list->rowId }}" class="button button-sm remove-cart">Remove</button>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    @else
                        <div class="card bg-transparent" style="height: 340px" >
                            <div class="card-body">
                                <h2 class="text-center" style="margin-top: 120px">Nothing to show</h2>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-12 mb-4">
                <div class="cart-card cart-coupon-card">
                    <form action="" class="coupon-form">
                        <p class="mb-0">Have coupon?</p>
                        <div class="input-group">
                            <input type="text" class="form-control coupon-field" @if(session('discount'))  disabled @endif id="coupon_code" name="coupon_code" placeholder="Coupon code">
                            <button class="btn btn-outline-secondary coupon-btn @if(session('discount'))  disabled @endif" id="coupon-btn" type="button">Apply</button>
                        </div>
                    </form>

                </div>
                <div class="cart-card cart-calculation-card">
                    <table class="w-100">
                        <tbody>
                            <tr>
                                <td>Price:</td>
                                <td class="text-end price">?? <b id="price-total">{{ Cart::instance('product')->total() }}</b></td>
                            </tr>
                            <tr>
                                <td>Discount:</td>
                                @if(session('discount'))
                                    <td class="text-end ">?? <span class="discount">{{ session('discount') }}</span></td>
                                @else
                                    <td class="text-end ">?? <span class="discount">0.00</span> </td>
                                @endif
                            </tr>
                            <tr>
                                <td>Total:</td>
                                <th class="text-end">?? <b id="grand-total">@if(session('total')){{ session('total') }} @else{{ Cart::instance('product')->total() }} @endif</b></th>
                            </tr>
                        </tbody>
                    </table>
                    <hr>

                    <div class="text-center">
                        @if(Cart::content()->count() > 0)
                            {{-- @if(auth()->user()) --}}
                                <a href="{{ route('checkout') }}" class="button button-block">Checkout</a>
                            {{-- @else
                                <a href="{{ route('login') }}" class="button button-block">Checkout</a>
                            @endif --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script>
        function quantityField(elem, handler) {
            var elem = $(elem);
            let qty = parseInt(elem.closest('td').find("input").val());
            // console.log(qty);
            if (handler == "minus") {
                if (qty > 1) {
                    qty = qty-1;
                    elem.closest('td').find('input').val(qty);
                }
            }
            if (handler == "plus") {
                // qty_limit = elem.data('qty');
                if (qty >= 1 ) {
                    qty = qty+1;
                    elem.closest('td').find('input').val(qty);
                }
            }
        }
        $(document).on('click','.change', function () {
            var qty = $(this).closest('td').find('input').val();
            var each_price = $(this).closest('tr').find('span[class="product-price-each"]').text();
            each_price = parseInt(each_price);
            var price = $(this).closest('tr').find('span[class="product-price"]').text();
             price =  parseInt(price);
            var result = qty*each_price;
            $(this).closest('tr').find('span[class="product-price"]').text(result);
            // alert(result)
        });
        $('.coupon-btn').click(function (e) {
            e.preventDefault();
            var code = $('#coupon_code').val();
            if(code != ''){
                $.post('{{route('user.coupon')}}',
                {
                    _token: "{{csrf_token()}}",
                    code:code,
                },
                function(response){
                    console.log(response);
                    if (response.status) {
                        var value = response.value;
                        var price = $('#price-total').text();
                        price = price.replace(',','');
                        price = Number(price);
                        var percent = value*price/100;
                        //  alert(price)
                        $('.discount').text(percent)
                        var total = $('#grand-total').text();
                        total = total = total.replace(',','');
                        //  alert(total);
                        total = Number(total);
                        $('#coupon-btn').addClass('disabled')
                        $('#coupon-btn').removeClass('coupon-btn')

                         var result = total - percent
                         $('#grand-total').text(result);
                        iziToast.success({
                            title:'Alert!',
                            message:'Coupon applied successfully!',
                            position:'topRight'
                        });
                        $.post('{{route('user.discount')}}',
                        {
                            _token: "{{csrf_token()}}",
                            discount:percent,
                            total:result,
                        },
                        function(response){

                        })
                    }else{
                        iziToast.error({
                            title:'Alert!',
                            message:'applied Coupon doesnot exists!',
                            position:'topRight'
                        });
                    }
                }
            )
            }

        });
        // $(document).ready(function () {

        // @if (Cart::instance('product')->content()->count() <= 0)
        //     $('.discount').text('?? 0.00');
        //     $('#grand-total').text('0.00');
        //     $('#price-total').text('0.00');
        // @endif
        // });
    </script>
@endsection
@else
    <script>
        window.location = '{{ route('home') }}'
    </script>
@endif
