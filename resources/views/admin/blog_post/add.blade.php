@extends("layouts.admin")

@section("title", "Blog Post")

@section("nav-title", "Blog Post")

@section("content")


<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Blog Post</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.blog.post.list') }}">Blog Post</a>
    </li>
    <li class="breadcrumb-item active">Add</li>
</ul>

<div class="col-12">
    <div class="card mt-5">
        <div class="card-header">
            <h4>ADD Product</h4>
        </div>
        <form action="{{ route('admin.blog.post.save') }}" method="POST" class="blogform" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 mb-3" style="margin-left: -12px">
                        <div class="media-body mt-75">
                            <div class="col-12 mt-2">
                                <input type="file" id="account-upload" name="featured_image" class="dropify">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-12">
                        <div class="form-group">
                            <label> Category</label>
                            <select name="blog_category_id" id="category" class="form-control select2">
                                <option selected disabled> Nothing Selected</option>
                                @foreach ($categories as $cat )
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-12">
                        <div class="form-group">
                            <label> Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" >
                        </div>
                    </div>

                    <div class="col-sm-12 col-12">
                        <div class="form-group">
                            <label> Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" >
                        </div>
                    </div>

                    <div class="col-sm-12 col-12">
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" id="editor" class="form-control" style="height: 300px !important;"></textarea>
                            @error('body')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                            <label> Meta Keywords <small>(Seperated by ,)</small></label>
                            <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="Meta Keywords" >
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
                <button type="submit" class="btn btn-primary" name="action" value="publish">Publish</button>
                <button type="submit" class="btn btn-warning" name="action" value="draft">Draft</button>
            </div>
        </form>
    </div>

</div>
@endsection
@section('js')
    <script>
        $(document).on('keyup', '#title', function(e) {
            let val = $(this).val();
            $("#meta_title").val(val);
        });
        function convertToSlug(Text) {
            return Text
                .toLowerCase()
                .replace(/ /g,'-')
                .replace(/[^\w-]+/g,'')
                ;
        }

        $("#title").keyup(function (e) {
            let elm = $(this);
            $("#slug").val(convertToSlug(elm.val()));
        });

        $(document).on('submit', '.blogform', function () {

        if( $('#category').val() == '' ){
            iziToast.error({
                title: 'Alert!',
                message: 'Category Field is required!',
                position: 'topRight'
            });
            return false;
        }
        if( $('#title').val() == null ){
            iziToast.error({
                title: 'Alert!',
                message: 'Title Field a Category!',
                position: 'topRight'
            });
            return false;
        }
        if( $('#slug').val() == null ){
            iziToast.error({
                title: 'Alert!',
                message: 'Slug Field is required',
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
        if( $('#meta_keywords').val() == '' ){
            iziToast.error({
                title: 'Alert!',
                message: 'Meta Keywords is required!',
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
