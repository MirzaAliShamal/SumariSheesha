<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 pb-4">
                <div class="footer-logo">
                    <img src="{{ asset(setting('logo')) }}" class="img-fluid" alt="Footer Logo">
                </div>
                <p class="about">{!! setting('footer_text') !!}</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 pb-4">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-4">
                        <p class="menu-title">Our Products</p>

                        <ul class="menu-vertical">
                            <li><a href="">Tobacco</a></li>
                            <li><a href="">Shisha</a></li>
                            <li><a href="">Hookah</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-4">
                        <p class="menu-title">Our Services</p>

                        <ul class="menu-vertical">
                            <li><a href="">Tobacco</a></li>
                            <li><a href="">Shisha</a></li>
                            <li><a href="">Hookah</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-4">
                        <p class="menu-title">About Us</p>

                        <ul class="menu-vertical">
                            <li><a href="">About</a></li>
                            <li><a href="">Careers</a></li>
                            <li><a href="">Testimonials</a></li>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-12 pb-4">
                <div class="social-icons">
                    @if (!is_null(setting('facebook')) && setting('facebook') !== "")
                        <a href="https://facebook.com/{{ setting('facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if (!is_null(setting('twitter')) && setting('twitter') !== "")
                        <a href="https://twitter.com/{{ setting('twitter') }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if (!is_null(setting('instagram')) && setting('instagram') !== "")
                        <a href="https://instagram.com/{{ setting('instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if (!is_null(setting('linkedin')) && setting('linkedin') !== "")
                        <a href="https://linkedin.com/in/{{ setting('linkedin') }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                    @endif
                    @if (!is_null(setting('whatsapp')) && setting('whatsapp') !== "")
                        <a href="https://api.whatsapp.com/send?phone={{ setting('whatsapp') }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    @endif
                    @if (!is_null(setting('tiktok')) && setting('tiktok') !== "")
                        <a href="https://tiktok.com/@{{ setting('tiktok') }}" target="_blank"><i class="fab fa-tiktok"></i></a>
                    @endif
                    @if (!is_null(setting('snapchat')) && setting('snapchat') !== "")
                        <a href="https://snapchat.com/{{ setting('snapchat') }}" target="_blank"><i class="fab fa-snapchat"></i></a>
                    @endif
                    @if (!is_null(setting('youtube')) && setting('youtube') !== "")
                        <a href="https://youtube.com/{{ setting('youtube') }}" target="_blank"><i class="fab fa-youtube"></i></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12 pb-4 text-xl-end text-lg-end text-md-end text-center">
                <ul class="menu-horizontal">
                    <li><a href="">About</a></li>
                    <li><a href="">Careers</a></li>
                    <li><a href="">Testimonials</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
