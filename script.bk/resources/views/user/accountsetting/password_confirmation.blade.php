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
                            <h4>{{ __('Enter Your Password Befor Account Settings') }}</h4>
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
                                <div class="card-body">
                                <form method="POST" action="{{ route('user.account.setting.confirmation') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>{{ __('Enter Your Current Password') }}</label>
                                                <input type="password" placeholder="{{ __('Enter Your Current Password') }}" class="form-control" name="password">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="button-btn">
                                                <button type="submit" class="basicbtn w-100">{{ __('Submit') }}</button>
                                            </div>
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
    </div>
</section>
<!-- dahboard area end -->
@endsection