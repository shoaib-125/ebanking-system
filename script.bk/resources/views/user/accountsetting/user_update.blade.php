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
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4>{{ __('Account Settings') }}</h4>
                                </div>
                                <div class="col-lg-6">
                                    <div class="button-btn">
                                        <a class="f-right" href="{{ route('user.account.password.change') }}">{{ __('Password Change') }}</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>{{ __('woops!') }}</strong> {{ __('There were some problems with your input.') }}<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (Session::has('success'))
                           <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                        <div class="section-body">
                            <div class="card">
                                <div class="card-header">
                                    <h5>{{ __('Account Info Update') }}</h5>
                                </div>
                                <div class="card-body">
                                <form method="POST" action="{{ route('user.account.update') }}" class="basicform">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>{{ __('Name') }}</label>
                                                <input type="text" placeholder="{{ __('Enter Your Name') }}" class="form-control" value="{{ Auth::user()->name }}" name="name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>{{ __('Email') }}</label>
                                                <input type="email" placeholder="{{ __('Enter Your Email') }}" class="form-control" value="{{ Auth::user()->email }}" name="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">

                                            <div class="form-group">
                                                <label>{{ __('Phone Number') }}</label>
                                                <input type="number" placeholder="{{ __('Phone Number') }}" class="form-control" value="{{ str_replace('+','',Auth::user()->phone) }}" name="phone_number">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>{{ __('2 Step Verification') }}</label>
                                                <select class="form-select" name="step_validation">
                                                    <option>-- {{ __('Select') }} --</option>
                                                    <option {{ (Auth::user()->two_step_auth == 1) ? 'selected' : '' }} value="1">{{ __('Enable') }}</option>
                                                    <option {{ (Auth::user()->two_step_auth == 0) ? 'selected' : '' }} value="0">{{ __('Disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="button-btn">
                                                <button type="submit" class="basicbtn w-100">{{ __('Update') }}</button>
                                            </div>
                                        </div>                                    
                                    </div>
                                </form>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dahboard area end -->
@endsection