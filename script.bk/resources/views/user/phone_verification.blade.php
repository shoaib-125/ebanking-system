@extends('layouts.frontend.app')

@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-5">
                @if (Session::has('message'))
                <div class="alert alert-danger">{{ Session::get('message') }}</div>
                @endif
                <div class="card-header">{{ __('Verify Your Phone number') }}</div>
                <div class="card-body">
                    <form action="{{ route('phone.verification.check') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <label for="">{{ __('OTP') }}</label>
                                <input type="text" name="otp" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary form-control">
                            </div>
                        </div>  
                    </form>
                    <form method="post" action="{{ route('phone.verification.resend') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 text-end mt-3">
                                <input type="hidden" value=1 name="resend">
                                <input type="submit" value="Re-send OTP" class="basicbtn btn btn-link">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
