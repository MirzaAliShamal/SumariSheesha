@if(Cart::instance('booking')->content()->count() > 0)
    {{-- @if(auth()->user()) --}}
        <a class="button" href="{{ route('user.booking.checkout') }}" title="Checkout ">
            Checkout
        </a>
    {{-- @else
        <a class="button" href="{{ route('login') }}" title="Checkout">
            Checkout
        </a>
    @endif --}}
@else
    <a class="button" href="" title="Checkout">
        Checkout
    </a>
@endif
