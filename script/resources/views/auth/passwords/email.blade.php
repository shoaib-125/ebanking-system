@extends('layouts.frontend.app')

@section('content')
<div class="dashboard-area pt-150 pb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="main-container">
                    <div class="header-section">
                        <h4>{{ __('Reset Password') }}</h4>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cnic" class="col-md-4 col-form-label text-md-right">{{ __('Cnic') }}</label>
                            <input id="cnic" type="number" class="form-control @error('Cnic') is-invalid @enderror"
                                   name="cnic" value="{{ old('cnic') }}" required autocomplete="cnic" autofocus>
                            @error('cnic')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>
                            <input id="dob" type="text" class="form-control @error('dob') is-invalid @enderror"
                                   name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                            @error('dob')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="security_answer" class="col-md-4 col-form-label text-md-right">{{ __('Security Answer') }}</label>
                            <input id="security_answer" type="text" class="form-control @error('security_answer') is-invalid
                            @enderror" name="security_answer" value="{{ old('security_answer') }}" required autocomplete="security_answer" autofocus>
                            @error('security_answer')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="acc_no" class="col-md-4 col-form-label text-md-right">{{ __('Account Number') }}</label>
                            <input id="acc_no" type="number" class="form-control @error('acc_no') is-invalid @enderror"
                            name="acc_no" value="{{ old('acc_no') }}" required autocomplete="acc_no" autofocus>
                            @error('acc_no')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if (\Session::has('failed'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{!! \Session::get('failed') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="button-btn">
                                <button type="submit" class="w-100">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
