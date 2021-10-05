@if($content->count() > 0)
    @foreach ($content as $item)
    <li class="cart-item d-flex w-100 mb-3">
        <div class="cart-image">
            @if(getBrandPrdDetails($item->id)->image)
                <div style="height: 100px; width:100px">
                    <img src="{{ asset(getBrandPrdDetails($item->id)->image) }}" style="height: 100%; width:100%; object-fit:cover" class="img-fluid" alt="">
                </div>
            @else
                <div style="height: 100px; width:100px">
                    <img src="{{ asset('empty.jpg') }}" class="img-fluid" alt="">
                </div>
            @endif
        </div>
        <div class="cart-detail ms-2 m-auto">
            <p>{{ $item->name }}</p>
            <small>Qty: <span class="cart-qty">{{ $item->qty }}</span></small>
            <small class="ms-2">Price: £ <span class="cart-price">{{ $item->price }}</span></small>
        </div>
        <div class="cart-handler ms-auto">
            <span data-id="{{ $item->rowId }}" style="cursor: pointer" class="remove-booking"><i class="far fa-times"></i></span>
        </div>
    </li>
    @endforeach
@else
    <p class="mt-3 mb--3 text-center">Cart is empty</p>
@endif
