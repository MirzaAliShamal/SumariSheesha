@extends("layouts.admin")

@section("title", "Brand")

@section("nav-title", "Brand")

@section("content")


<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Brand</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.brand.list') }}">Brand</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
</ul>

<div class="col-12">
    <div class="card mt-5">
        <div class="card-header">
            <h4>EDIT Brand</h4>
        </div>
        <form action="{{ route('admin.brand.save', $list->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label> Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $list->name }}" id="name" required="">
                </div>
                <div class="form-group">
                    <label> Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Brand Email" value="{{ $list->email }}" id="email" required="">
                </div>
                <input type="hidden" name="location_lat" value="{{ $list->location_lat }}" id="location_lat">
                <input type="hidden" name="location_long" value="{{ $list->location_long }}" id="location_long">
                <div class="form-group">
                    <label> Phone</label>
                    <input type="number" class="form-control" name="phone" placeholder="Brand Phone" value="{{ $list->phone }}" id="phone" >
                </div>
                <div class="form-group">
                    <label> Location</label>
                    <input type="text" class="form-control" name="location" value="{{ $list->location }}" id="location" >
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

</div>
@endsection
@section('js')
<script>
     function initMap() {

        const input = document.getElementById("location");
        const options = {
            // componentRestrictions: { country: "us" },
            fields: ["formatted_address", "geometry", "name"],
            strictBounds: false,
            types: ["establishment"],
        };
        const autocomplete = new google.maps.places.Autocomplete(input, options);
        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.

        autocomplete.addListener("place_changed", () => {
            const place = autocomplete.getPlace();
            console.log(place.geometry.location.lat());

            if (!place.geometry || !place.geometry.location) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }
            // If the place has a geometry, then present it on a map.
            document.getElementById('location_lat').value = place.geometry.location.lat();
            document.getElementById('location_long').value = place.geometry.location.lng();
        });
    }
</script>
@endsection
