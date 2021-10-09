@extends("layouts.admin")

@section("title", "Product")

@section("nav-title", "Product")

@section("content")


<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Product</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.product.list') }}">Product</a>
    </li>
    <li class="breadcrumb-item active">Add</li>
</ul>

<div class="col-12">
    <div class="card mt-5">
        <div class="card-header">
            <h4>ADD Product</h4>
        </div>
        <form action="{{ route('admin.product.save') }}" method="POST" class="productform" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 mb-3" style="margin-left: -12px">
                        <div class="media-body mt-75">
                            <div class="col-12 mt-2">
                                <input type="file" id="account-upload" name="file" class="dropify">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-12">
                        <div class="form-group">
                            <label> Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Product name" >
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="form-group">
                            <label> Category</label>
                            <select name="category" id="category" class="form-control select2">
                                <option selected disabled> Nothing Selected</option>
                                @foreach ($category as $cat )
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 subs d-none">
                        <div class="form-group">
                            <label>Sub Category</label>
                            <select name="sub_category" id="sub_category" class="form-control">

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="form-group">
                            <label> Price (GBP)</label>
                            <input type="number" class="form-control" placeholder="Product price" name="price" id="price" >
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="form-group">
                            <label> Quantity</label>
                            <input type="number" class="form-control" name="quantity" placeholder="Product quantity" id="quantity">
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="form-group">
                            <div class="custom-control custom-radio mt-4">
                                <input type="radio" id="customRadio3" name="proSelect" checked value="1" class="custom-control-input radflav">
                                <label class="custom-control-label" for="customRadio3">Flavour</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="proSelect" value="1" class="custom-control-input radcol">
                                <label class="custom-control-label" for="customRadio2">Color</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 col-flav" id="flavourDiv" >
                        <div class="form-group">
                            <label for="flavour"> Flavour</label>
                            <select name="flavour" id="flavour" class="form-control">
                                <option selected disabled> Nothing Selected</option>
                                @foreach ($flavour as $flav )
                                    <option value="{{ $flav->id }}">{{ $flav->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 col-flav" id="colorDiv" style="display: none">
                        <div class="form-group">
                            <label for="color"> Color</label>
                            <select name="color" id="color" class="form-control " >
                                <option selected disabled> Nothing Selected</option>
                                @foreach ($color as $colr )
                                    <option value="{{ $colr->id }}">{{ $colr->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="description"> Description</label><br>
                            <textarea name="description" id="description" class="form-control" style="height: 300px !important;"></textarea>
                        </div>
                    </div>

                    <div class="card-header">
                        <h4>SEO</h4>
                    </div>

                    <div class="col-sm-12 col-12">
                        <div class="form-group">
                            <label> Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title" >
                        </div>
                    </div>
                    <div class="col-sm-12 col-12">
                        <div class="form-group">
                            <label> Meta Description</label>
                            <textarea name="meta_description" id="meta_description" class="form-control" placeholder="Meta Description"></textarea>
                        </div>
                    </div>
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
        $(document).on('change','.radcol',function () {
            $('#colorDiv').show();
            $('#flavourDiv').hide();
            $('#flavour').val('Nothing Selected');
        });
        $(document).on('change','.radflav',function () {
            $('#flavourDiv').show();
            $('#colorDiv').hide();
            $('#color').val('Nothing Selected');
        });

        $(document).on('keyup', '#name', function(e) {
            let val = $(this).val();
            $("#meta_title").val(val);
        });
        $(document).on('change','#category', function () {
            var id = $(this).val();
            console.log(id);
            $.post('{{ route('admin.product.sub') }}',
                {
                    _token: "{{csrf_token()}}",
                    id:id,
                },
                function(response){
                    console.log(response);
                    if (response.status) {
                        $('#sub_category').html(response.html);
                        $('.subs').removeClass('d-none');
                        $('.col-flav').removeClass('col-sm-6').addClass('col-sm-12');
                    }

                }
            )
        });
        $(document).on('submit', '.productform', function () {

            if( $('#name').val() == '' ){
                iziToast.error({
                    title: 'Alert!',
                    message: 'Name field is required!',
                    position: 'topRight'
                });
                return false;
            }
            if( $('#category').val() == null ){
                iziToast.error({
                    title: 'Alert!',
                    message: 'Please select a Category!',
                    position: 'topRight'
                });
                return false;
            }
            if( $('#sub_category').val() == null ){
                iziToast.error({
                    title: 'Alert!',
                    message: 'Please select a Sub Category!',
                    position: 'topRight'
                });
                return false;
            }

            if( !$('#customRadio3').is(':checked')  && !$('#customRadio2').is(':checked') ){
                iziToast.error({
                    title: 'Alert!',
                    message: 'Please select one Flavour or Color!',
                    position: 'topRight'
                });
                return false;
            }
            if( $('#customRadio2').is(':checked') && $('#color').val() == null ){
                iziToast.error({
                    title: 'Alert!',
                    message: 'Please select a Color!',
                    position: 'topRight'
                });
                return false;
            }
            if( $('#customRadio3').is(':checked') && $('#flavour').val() == null ){
                iziToast.error({
                    title: 'Alert!',
                    message: 'Please select a Flavour!',
                    position: 'topRight'
                });
                return false;
            }
            if( $('#price').val() == '' ){
                iziToast.error({
                    title: 'Alert!',
                    message: 'Price field is required!',
                    position: 'topRight'
                });
                return false;
            }
            if( $('#quantity').val() == '' ){
                iziToast.error({
                    title: 'Alert!',
                    message: 'Quantity field is required!',
                    position: 'topRight'
                });
                return false;
            }
            if( $('#meta_title').val() == '' ){
                iziToast.error({
                    title: 'Alert!',
                    message: 'Meta Title is required!',
                    position: 'topRight'
                });
                return false;
            }
            if( $('#meta_description').val() == '' ){
                iziToast.error({
                    title: 'Alert!',
                    message: 'Meta Description is required!',
                    position: 'topRight'
                });
                return false;
            }

            if( $('#meta_description').val().length > 160 ){
                iziToast.error({
                    title: 'Alert!',
                    message: 'Meta Description must be of maximum 160 chracters',
                    position: 'topRight'
                });
                return false;
            }

        });

    </script>
@endsection
