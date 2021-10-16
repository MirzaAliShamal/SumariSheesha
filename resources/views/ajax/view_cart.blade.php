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
                    <p class="product-price">£ <span class="product-price">{{ $list->qty * $list->price }}</span></p>
                    <p class="product-price-each">£ <span class="product-price-each">{{ $list->price }}</span> each</p>
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
