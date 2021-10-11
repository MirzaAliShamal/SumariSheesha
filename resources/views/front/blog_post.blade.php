@extends('layouts.front')

@section('title', 'Blogs')

@section('meta')
    <meta name="keywords" content="{{ setting('meta_keywords') }}">
    <meta name="description" content="{{ setting('meta_description') }}">
@endsection

@section('content')
<section class="bg-half d-table w-100 bg-page"
    style="background-image: url('{{ asset('theme/images/hero-bg.png') }}');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Blogs</h2>
            </div>
        </div>
    </div>
</section>

<section class="section bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                <div class="row">
                    @if (count($blogs) > 0)
                        @foreach ($blogs as $item)
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-sm-auto mb-4">
                                <div class="products">
                                    <div class="card-image">
                                        @if($item->featured_image)
                                            <img src="{{ asset($item->featured_image) }}" class="img-fluid" alt="Blog">
                                        @else
                                            <img src="{{ asset('empty.jpg') }}" class="img-fluid" alt="Blog">
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('blog', $item->slug) }}">
                                            <h4>{{ Str::limit($item->title, 20, '...') }}</h4>
                                        </a>
                                        <p>{{ Str::limit($item->meta_description, 45, '...') }}</p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('blog', $item->slug) }}" class="button button-md mt-4">Read More</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="text-center">
                                <h2>Sorry!</h2>
                                <h3>No Results Found!</h3>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="blog-category-widget">
                    <h5>Categories</h5>
                    <ul class="mt-4">
                        @foreach (getBlogCategories() as $item)
                            <li>
                                <a href="{{ route('blog.category', $item->slug) }}" class="d-flex">
                                    <span>{{ $item->name }}</span>
                                    <span class="ms-auto">({{ $item->blog_posts_count }})</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
