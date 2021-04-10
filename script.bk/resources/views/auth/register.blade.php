@extends('layouts.frontend.app')

@section('content')
<!-- dahboard area start -->
<section>
    <div class="dashboard-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-3">
                    <div class="main-container">
                        <div class="header-section">
                            <h4>{{ __('Login In') }}</h4>
                        </div>
                        <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
                        @csrf
                        <div class="login-section">
                            <h6>{{ __('Email & Password') }}</h6>
                            <div class="form-group">
                                <input type="text" name="email" placeholder="Enter Email Address" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div class="col-lg-6">
                                    <div class="forgot-password f-right">
                                        <a href="#">{{ __('Forgot Your Password?') }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-btn">
                                        <button type="submit">{{ __('Login') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dahboard area end -->
@endsection