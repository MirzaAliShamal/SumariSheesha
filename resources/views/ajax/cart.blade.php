@if($content->count() > 0)
    @foreach ($content as $item)
    <li class="cart-item d-flex w-100">
        <div class="cart-image">
            <img src="{{ asset($item->options->image) }}" class="img-fluid" alt="">
        </div>
        <div class="cart-detail ms-2 m-auto">
            <p>{{ $item->name }}</p>
            <small>Qty: <span class="cart-qty">{{ $item->qty }}</span></small>
            <small class="ms-2">Price: £ <span class="cart-price">{{ $item->price }}</span></small>
        </div>
        <div class="cart-handler ms-auto">
            <span data-id="{{ $item->rowId }}" style="cursor: pointer" class="remove-cart"><i class="far fa-times"></i></span>
        </div>
    </li>
    @endforeach
@else
    <p class="mt-3 mb--3 text-center">Cart is empty</p>
@endif
<div class="shopping-cart-footer">
    @if(Cart::content()->count() > 0)
        <a href="{{ route('cart') }}" class="button button-md text-center">View Cart</a>
        @if(auth()->user())
            <a href="{{ route('paypal.details') }}" class="button button-md text-center checkout-cart">Checkout</a>
        @else
            <a href="{{ route('login') }}" class="button button-md text-center checkout-cart">Checkout</a>
        @endif
    @endif
</div>
