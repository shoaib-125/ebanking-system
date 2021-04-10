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
                            <h4>{{ __('OTP Send In Your Mail') }}</h4>
                        </div>
                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                        <form method="POST" action="{{ route('user.account.password.otp.confirmation') }}" class="needs-validation" novalidate="">
                        @csrf
                        <div class="login-section">
                            <h6>{{ __('OTP') }}</h6>
                            <div class="form-group">
                                <input type="text" placeholder="Enter OTP" class="form-control" name="otp">
                            </div>  
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-btn">
                                        <button type="submit">{{ __('Submit') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        </form>
                        <!-- Resend OTP Again -->
                        <form method="POST" action="{{ route('user.account.otp.reset') }}" class="needs-validation" novalidate="">
                            @csrf
                            <button class="btn btn-primary" type="submit">{{ __('Resend OTP') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dahboard area end -->
@endsection