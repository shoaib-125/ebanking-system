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
                            <h4>{{ __('Transfer') }}</h4>
                        </div>
                        <div class="card">
                            <div class="card-body">
                               <form action="{{ route('user.transfer.ownbank.confirm') }}" method="post">
                                @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">{{ __('Account') }}</label>
                                                <input type="text" name="account_no" value="{{ old('account_no') }}" class="{{ Session::has('account_err') ? 'is-invalid' : '' }} form-control" placeholder="{{ __('Account Number') }}">
                                            </div>
                                            
                                            @if(Session::has('account_err'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ Session::get('account_err') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">{{ __('Amount') }}</label>
                                                <input type="number" name="amount" class="{{ Session::has('error') ? 'is-invalid' : '' }} form-control" value="{{ old('amount') }}" placeholder="{{ __('Amount') }}">
                                            </div>
                                            @if(Session::has('error'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ Session::get('error') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 text-center mt-3">
                                            <div class="button-btn">
                                                <button type="submit" class="d-block w-100">{{ __('Submit') }}</button>
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
</section>
<!-- dahboard area end -->
@endsection

