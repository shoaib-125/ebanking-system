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
                        <div class="card w-50">
                            <div class="card-body">
                                @if(Session::has('message'))
                                <p class="alert alert-danger">
                                    {{ Session::get('message') }}
                                </p>
                                @endif
                               <form action="{{ route('user.bill.payment', $id) }}" method="post">
                                @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="">{{ __('OTP') }}</label>
                                            <input type="text" name="otp" value="{{ old('otp') }}" class="{{ Session::has('otp_err') ? 'is-invalid' : '' }} form-control">
                                            @if(Session::has('otp_err'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ Session::get('otp_err') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 text-center mt-3">
                                            <input type="submit" name="Submit" class="d-block w-100 btn btn-primary">
                                        </div>
                                    </div>
                               </form>
                               <form class="bill" method="post" action="{{ route('user.bill.confirm', $id) }}">
                                @csrf
                                <input type="hidden" name="resend">
                                <div class="row">
                                    <div class="col-lg-12 text-end mt-3">
                                        <button type="submit" class="btn btn-link">{{ __('Re-send') }}</button>
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
