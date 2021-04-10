<!-- footer area start -->
<footer>
    <div class="footer-area footer-demo-1">
        <div class="container">
            @php
                $theme_settings = App\Models\Option::where('key','theme_settings')->first();
                $info = json_decode($theme_settings->value);
            @endphp
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-left-area">
                        <div class="footer-logo">
                            <img src="{{ asset('uploads/logo.png') }}" alt="">
                            <div class="footer-content">
                                <p>{{ $info->footer_description }}</p>
                            </div>
                            <div class="agent-social-links">
                                <nav>
                                    <ul>
                                        @foreach ($info->social as $value)
                                        <li><a href="{{ $value->link }}"><span class="iconify" data-icon="{{ $value->icon }}" data-inline="false"></span></a></li>  
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-menu">
                        {{ footer_menu('footer_left') }}
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-menu">
                         {{ footer_menu('footer_right') }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-newsletter">
                        <div class="footer-menu-title">
                            <h4>{{ __('Newsletter') }}</h4>
                        </div>
                        <div class="footer-content">
                            <p>{{ $info->newsletter_address }}</p>
                        </div>
                        <div class="footer-newsletter-input">
                            <form action="{{ route('newsletter') }}" id="newsletter" method="post">
                                @csrf
                                <input type="email" name="email" placeholder="Enter Your Email Address" id="subscribe_email">
                                <button type="submit" class="basicbtn">{{ __('Subscribe') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area footer-demo-1">
        <div class="footer-bottom-content text-center">
            <span>{{ __('Copyright © Website') }} - {{ date('Y') }}. {{ __('Develop By') }} <a href="{{ url('/') }}">{{ env('APP_NAME') }}</a></span>
        </div>
    </div>
</footer>
<!-- footer area end -->

   