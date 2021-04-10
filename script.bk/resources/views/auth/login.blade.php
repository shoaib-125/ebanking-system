@extends('layouts.frontend.app')

@section('content')
<!-- dahboard area start -->
<section>
    <div class="dashboard-area pt-150 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-3">
                    <div class="main-container">
                        <div class="header-section">
                            <h4>{{ __('Login In') }}</h4>
                        </div>
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                        @csrf
                            <div class="login-section">
                                <h6>{{ __('Email & Password') }}</h6>
                                <div class="form-group">
                                    <input type="text" name="email" placeholder="{{ __('Enter Email Address') }}" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="{{ __('Password') }}" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        @if (Route::has('password.request'))
                                        <div class="forgot-password f-right">
                                          <a href="{{ route('password.request') }}" class="text-small">
                                            {{ __('Forgot Password?') }}
                                          </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="login-btn">
                                            <button type="submit">{{ __('Login') }}</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="already-have-account text-center">
                                            <br>
                                            <p>{{ __('Not registered?') }} <a href="{{ route('register') }}">{{ __('Register') }}</a></p>
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