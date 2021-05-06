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
                            @include('layouts.frontend.partials.alert')
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
                                               <label for="">{{ __('Account Title') }}</label>
                                               <input type="text" name="account_title" value="{{ old('account_title') }}" class="{{ Session::has('account_err') ? 'is-invalid' : '' }} form-control" placeholder="{{ __('Account Title') }}">
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
                                                {{dump( $errors->first)}}
                                                 <div class="error">{{ $errors->first('error') }}</div>
                                                <strong>{{   $errors}}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                   <div class="row">
                                       <div class="col-lg-12">
                                           <div class="form-group">
                                               <label for="">{{ __('Enter Your Transaction Pin') }}</label>
                                               <input type="number" name="transaction_pin" class="{{ Session::has('error') ? 'is-invalid' : '' }} form-control" value="{{ old('transaction_pin') }}" placeholder="{{ __('Transaction Pin') }}">
                                           </div>
                                           @if(Session::has('error'))
                                               <span class="invalid-feedback" role="alert">
                                                <strong>{{ Session::get('error') }}</strong>
                                            </span>
                                           @endif
                                       </div>
                                   </div>
                                   @if(!\Auth::user()->transaction_pin)
                                       <div class="col-lg-12 text-center mt-3">
                                           <div class="button-btn">

                                               <a href="{{ url('user/transfer/pin')}}" class="button d-block w-100">{{ __('Generate Your Transaction Pin') }}</a>
                                           </div>
                                       </div>
                                   @else
                                    <div class="row">
                                        <div class="col-lg-12 text-center mt-3">
                                            <div class="button-btn">
                                                <button type="submit" class="d-block w-100">{{ __('Submit') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                   @endif
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

