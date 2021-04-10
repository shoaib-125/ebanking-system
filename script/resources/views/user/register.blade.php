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
                            <h4>{{ __('Register') }}</h4>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                            <form method="POST" action="{{ route('register') }}" class="needs-validation">
                            @csrf
                            <div class="login-section">
                                <h6>{{ __('First Name') }}</h6>
                                <div class="form-group">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="Enter First Name" value="{{ old('first_name') }}" required autocomplete="name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <h6>{{ __('Last Name') }}</h6>
                                <div class="form-group">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Enter Name" value="{{ old('last_name') }}" required autocomplete="name" autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <h6>{{ __('Email') }}</h6>
                                <div class="form-group">
                                    <input type="email" placeholder="Enter Email Address" class="form-control @error('name') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <h6>{{ __('Date Of Birth') }}</h6>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Date Of Birth" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required>

                                    @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <h6>{{ __('CNIC') }}</h6>
                                <div class="form-group">
                                    <input type="number" placeholder="Enter Your Cnic" class="form-control @error('cnic') is-invalid @enderror" name="cnic" value="{{ old('cnic') }}" required>

                                    @error('cnic')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <h6>{{ __('Mother Name') }}</h6>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Mother Name" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ old('mother_name') }}" required>

                                    @error('mother_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <h6>{{ __('Address') }}</h6>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required>

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <h6>{{ __('Security Question') }}</h6>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Security Question" class="form-control @error('security_question') is-invalid @enderror" name="security_question" value="{{ old('security_question') }}" required>

                                    @error('security_question')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <h6>{{ __('Answer') }}</h6>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Security Answer" class="form-control @error('answer') is-invalid @enderror" name="answer" value="{{ old('answer') }}" required>

                                    @error('answer')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{--<h6>{{ __('Invitation Code') }}</h6>
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Invitation Code" class="form-control @error('invite_code') is-invalid @enderror" name="invite_code" value="{{ old('invite_code') }}" required>

                                    @error('invite_code')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>--}}
                                <h6>{{ __('Phone Number') }}</h6>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <select name="phone_security_questioncode" class="form-control">
                                                @foreach ($codes as $item)
                                                <option value="{{ $item->dial_code }}">{{ $item->code,10 }} {{ $item->dial_code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input id="phone" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Enter Phone number" value="{{ old('phone_number') }}" required autofocus>
                                    </div>
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <h6>{{ __('Password') }}</h6>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password" >

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <h6>{{ __('Re-enter Password') }}</h6>
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Re-Enter Password" >
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input class="form-check-input" type="checkbox" name="term_condition" id="term_condition" required>
                                        <label class="form-check-label" for="term_condition">
                                            {{ __('I agree To') }} <a href="{{ url('/page/terms-and-conditions') }}">{{ __('Terms & Conditions') }}</a>
                                        </label>
                                        @error('term_condition')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="login-btn">
                                            <button type="submit">{{__('Register')}}</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="already-have-account text-center">
                                            <br>
                                            <p>{{ __('OR') }}</p>
                                            <p>{{ __('Already Have An Account?') }} <a href="{{ route('login') }}">{{ __('Login') }}</a></p>
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
