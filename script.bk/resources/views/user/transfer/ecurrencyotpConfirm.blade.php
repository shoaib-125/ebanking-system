@extends('layouts.frontend.app')

@section('content')
<!-- dahboard area start -->
<section>
    <div class="dashboard-area pt-150 pb-100">
        <div class="container">
            <div class="row">
                @include('layouts.frontend.partials.sidebar')
                <div class="col-lg-9">
                    <div class="main-container">
                        <div class="header-section">
                            <h4>{{ __('OTP Confirm') }}</h4>
                        </div>
                        <div class="card">
                            <div class="card-body">
                               <form action="{{ route('user.transfer.ecurrency.confirmotp') }}" method="post">
                                @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">{{ __('Enter Your OTP') }}</label>
                                                <input type="text" name="otp" value="{{ old('otp') }}" class="{{ Session::has('otp_err') ? 'is-invalid' : '' }} form-control" placeholder="{{ __('Enter Your OTP') }}">
                                            </div>
                                            @if(Session::has('otp_err'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ Session::get('otp_err') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 text-center mt-3">
                                            <div class="button-btn">
                                                <button class="w-100">{{ __('Submit') }}</button>
                                            </div>
                                        </div>
                                    </div>
                               </form>

                               <form class="basicform" method="post" action="{{ route('user.transfer.ecurrency.transferotpview') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 text-end mt-3">
                                        <input type="submit" value="Re-send OTP" class="basicbtn btn btn-link resend-otp">
                                    </div>
                                </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dahboard area end -->
@endsection