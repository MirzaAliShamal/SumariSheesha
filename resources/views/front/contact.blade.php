@extends('layouts.front')

@section('title', 'Contact Us')

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
                <h2>Contact Us</h2>
            </div>
        </div>
    </div>
</section>

<section class="section bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <h4>Get in touch</h4>

                <form action="{{ route('contact.save') }}" method="POST" class="mt-5">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" autocomplete="off">
                                @error('name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" autocomplete="off">
                                @error('email')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Phone" autocomplete="off">
                                @error('phone')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" placeholder="Subject" autocomplete="off">
                                @error('subject')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" style="height: 150px;" placeholder="Message"></textarea>
                                @error('message')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="button button-md">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="contact-block">
                    <h5>Address</h5>
                    <p>{{ setting('address') }}</p>
                </div>
                <div class="contact-block">
                    <h5>Phone</h5>
                    <p>{{ setting('phone') }}</p>
                </div>
                <div class="contact-block">
                    <h5>Email</h5>
                    <p>{{ setting('email') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
