@extends('layouts.frontend.app')

@push('css')
  <link rel="stylesheet" href="{{ asset('backend/admin/assets/css/select2.min.css') }}">
@endpush
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
                            <h4>{{ __('Other Bank Transfer') }}</h4>
                        </div>
                        <div class="card">
                            <div class="card-body">
                               <form action="{{ route('user.transfer.otherbank.confirm') }}" method="post">
                                @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">{{ __('Country') }}</label>
                                                <select name="country" id="country" class="select2country form-control">
                                                    <option value="">-- {{ __('Select Country') }} --</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">{{ __('Bank') }}</label>
                                                <select name="bank" id="banks" class="form-control select2bank"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">{{ __('Currency') }}</label>
                                                <select name="currency" class="form-control">
                                                    <option value="">-- {{ __('Select Currency') }} --</option>
                                                    @foreach ($currencies as $currency)
                                                    <option value="{{ $currency->id }}">{{ $currency->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">{{ __('Branch') }}</label>
                                                <input name="branch" class="form-control" type="text" placeholder="{{ __('Enter Branch Name') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">{{ __('Account Holder Name') }}</label>
                                                <input type="text" name="account_holder_name" class="form-control" placeholder="{{ __('Account Holder Name') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">{{ __('Account Number') }}</label>
                                                <input type="text" class="form-control" name="account_no" placeholder="{{ __('Enter Account Number') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">{{ __('Amount (USD)') }}</label>
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
<input type="hidden" id="otherbank_country" value="{{ route("user.transfer.otherbank.country") }}">
@endsection

@push('js')
<script src="{{ asset('backend/admin/assets/js/select2.min.js') }}"></script>    
<script src="{{ asset('frontend/assets/js/transfer/otherbank.js') }}"></script>
@endpush