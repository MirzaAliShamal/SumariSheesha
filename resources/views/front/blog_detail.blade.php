@extends('layouts.front')

@section('title', $blog->title)

@section('meta')
    <meta name="keywords" content="{{ $blog->meta_keywords }}">
    <meta name="description" content="{{ $blog->meta_description }}">
@endsection

@section('content')
<section class="bg-half d-table w-100 bg-page"
    style="background-image: url('{{ asset('theme/images/hero-bg.png') }}');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Blog</h2>
            </div>
        </div>
    </div>
</section>

<section class="section bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                <h3>{{ $blog->title }}</h3>
                <div class="blog-meta">
                    <span><i class="far fa-tags"></i> {{ $blog->blogCategory->name }}</span>
                    <span class="ms-4"><i class="far fa-user"></i> {{ $blog->user->name }}</span>
                    <span class="ms-auto"><i class="far fa-calendar"></i> {{ $blog->created_at->format('d M, Y') }}</span>
                </div>
                <img src="{{ asset($blog->featured_image) }}" class="img-fluid" alt="Blog">
                <div class="blog-body">
                    {!! $blog->body !!}
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
