@extends('layouts.front')

@section('title', 'Booking for Delivery')

@section('meta')
    <meta name="keywords" content="{{ setting('meta_keywords') }}">
    <meta name="description" content="{{ setting('meta_description') }}">
@endsection

@section('css')
<style>
    #map {
        width: 100%;
        height: 400px;
    }



</style>
@endsection


@section('content')

<section class="bg-half d-table w-100 bg-page"
    style="background-image: url('{{ asset('theme/images/hero-bg.png') }}');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Booking for Delivery</h2>
            </div>
        </div>
    </div>
</section>







<section class="section bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Address" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="postcode">Postcode</label>
                                <input type="text" class="form-control" id="postcode" name="postcode"
                                    placeholder="Postcode" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country" id="country" class="form-control">
                                    <option value="" disabled selected>Nothing Selected</option>
                                    @foreach (countries() as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="text" class="form-control book-date datepicker" id="date" name="date"
                                    placeholder="Date" autocomplete="off" value="{{ now()->format('m/d/Y') }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="text" class="form-control book-time timepicker" id="timepicker" name="time"
                                    placeholder="Time" autocomplete="off" value="{{ now()->format('HH:MM') }}" readonly>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-5">
                            <div class="form-group">
                                <button class="button button-md book-checkout search-shisha" type="button">Search for Shisha</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            {{-- <div class="col-12">
                <div id="map" style="display: none;"></div>
            </div> --}}
            <div class="col-sm-12 col-lg-12 col-md-12 col-12 brand-table d-none">
                <div class="card-body">
                    <h5>Brand List</h5>
                    <table class="table datatables table-bordered text-white">
                        <thead>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
@section('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBiMlDi4wWwmGpVcQqW09U1M68jI2OEfK0" async defer></script>
<script>
    var base_image_url = "{{ asset('/') }}";

        function initMap(lat, lng, markers) {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: Number(lat), lng: Number(lng) },
                zoom: 10,
            });

            var infowindow = new google.maps.InfoWindow();

            $.each(markers, function (indexInArray, valueOfElement) {
                const marker = new google.maps.Marker({map, anchorPoint: new google.maps.Point(0, -29),});
                marker.setPosition({ lat: Number(valueOfElement.lat), lng: Number(valueOfElement.lng) });
                marker.setVisible(true);

                if (valueOfElement.brand_products.length > 0) {
                    var html_infowindow = `
                        <div id='infowindow'>
                            <h4 class="text-dark">${valueOfElement.name}</h4>
                    `;
                    $.each(valueOfElement.brand_products, function (i, e) {
                        html_infowindow += `
                            <div class="d-flex mt-3">
                                <div class="image">
                                    <img src="${base_image_url+e.image}" class="img-fluid">
                                </div>
                                <div class="details ms-2">
                                    <p>${e.name}</p>
                                    <small class="d-block">Price per day: <strong>£${e.price}</strong></small>
                                    <a data-id="${e.id}" class="add-booking">Book Now</a>
                                </div>
                            </div>
                        `;
                    });

                    html_infowindow += `
                        </div>
                    `;
                } else {
                    var html_infowindow = ``;
                }

                marker.addListener('click', function () {
                    infowindow.setContent(html_infowindow);
                    infowindow.open(map, this);
                });
            });
        }

        function getBrands(lat, lng) {
            $.ajax({
                type: "GET",
                url: "{{ route('get.brands') }}",
                data: {
                    lat:lat,
                    lng:lng,
                },
                success: function (response) {
                    console.log(response);
                    if (response.status) {
                        $('#tbody').html(response.html);
                        $('.brand-table').removeClass('d-none');
                        // $("#map").show();
                        // initMap(lat, lng, response);
                    } else {
                        iziToast.error({
                            title: 'Alert!',
                            message: 'Please fill out address to continue',
                            position: 'topRight'
                        });
                        $("#map").hide();
                    }
                }
            });
        }

        $(document).on("click", ".search-shisha", function() {
            if ($("#address").val() == "") {
                iziToast.error({
                    title: 'Alert!',
                    message: 'Please fill out address to continue',
                    position: 'topRight'
                });

                return false;
            }
            if ($("#postcode").val() == "") {
                iziToast.error({
                    title: 'Alert!',
                    message: 'Please fill out postcode to continue',
                    position: 'topRight'
                });

                return false;
            }
            if ($("#country").val() == "") {
                iziToast.error({
                    title: 'Alert!',
                    message: 'Please select country to continue',
                    position: 'topRight'
                });

                return false;
            }
            var lat = 0;
            var lng = 0;
            var postcode = $("#postcode").val();
            var coder = new google.maps.Geocoder();
            coder.geocode({'address': postcode,}, function(results, status) {
                if(status == google.maps.GeocoderStatus.OK) {
                    lat = results[0].geometry.location.lat();
                    lng = results[0].geometry.location.lng();
                    // postal_code = results[0].formatted_address;
                    // zipcode = results[0].address_components[0].long_name;
                    // $(".header-location-name").html(postal_code);
                    // $(".code").html(postal_code);
                    // $("[name='postal_code']").val(zipcode);
                    // $(".postal-code-full").html(postal_code);
                    // $("[name='current_lat']").val(results[0].geometry.location.lat());
                    // $("[name='current_lng']").val(results[0].geometry.location.lng());
                    getBrands(lat, lng);
                } else {
                    iziToast.error({
                        title: 'Alert!',
                        message: 'Please enter a valid UK postcode.',
                        position: 'topRight'
                    });
                    $(".postal-code-full").html("<small class='text-danger'>Please enter a valid US ZIP code.</small>");
                }
            });
            // $('html, body').animate({
            //     scrollTop: $("#map").offset().top
            // }, 2000);
        });






    $(document).ready(function () {

        $('[name="DataTables_Table_0_length"]').addClass('text-white');
    });

</script>
@endsection
