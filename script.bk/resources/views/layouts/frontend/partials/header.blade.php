<!-- header area start -->
<header>
    <div class="header-area {{ Request::is('/') ? null : 'fixed' }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="logo-area">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('uploads/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="header-right-section-area">
                        <div class="header-menu f-right">
                            <div class="mobile-menu">
                                <a class="toggle f-right" href="#" role="button" aria-controls="hc-nav-1"><span class="iconify" data-icon="heroicons-outline:menu" data-inline="false"></span></a>
                            </div>
                            <nav id="main-nav">
                                <ul>
                                    {{ header_menu('header') }}
                                </ul>
                            </nav>
                        </div>
                        <div class="header-language-area f-right">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="iconify" data-icon="tabler:world" data-inline="false"></span>
                                <span>{{ App::getlocale() }}</span>
                                <span class="iconify" data-icon="dashicons:arrow-down-alt2" data-inline="false"></span>
                            </a>
                            @php
                                $langs = App\Models\Language::where('status',1)->get();
                            @endphp
                            <ul class="dropdown-menu dropdown-menu-end">
                                @foreach ($langs as $value)
                                    <li><a href="{{ route('lang',$value->name) }}" class="dropdown-item">{{ $value->data }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="header-login-link f-right">
                            @if (Auth::check())
                                <a href="{{ route('logout') }}">{{ __('Logout') }}</a>
                            @else
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif
                        </div>
                        @if (Auth::check())
                            <div class="user-profile-img f-right">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false"><img src="https://ui-avatars.com/api/?size=45&background=random&name={{ Auth::User()->name }}" alt=""></a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a href="{{ route('login') }}" class="dropdown-item">{{ __('Dashboard') }}</a></li>
                                    <li><a href="{{ route('user.account.setting') }}" class="dropdown-item">{{ __('Settings') }}</a></li>
                                    <li><a href="{{ route('logout') }}" class="dropdown-item">{{ __('Logout') }}</a></li>
                                </ul>
                            </div>
                        @else
                        <div class="header-btn f-right">
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header area end -->