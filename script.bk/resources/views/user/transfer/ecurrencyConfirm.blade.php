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
                            <h4>{{ __('Confirm Transfer') }}</h4>
                        </div>
                        <div class="section-body">
                            <div class="card">
                                @if(Session::has('err'))
                                <p class="alert alert-danger">
                                    {{ Session::get('err') }}
                                </p>
                                @endif
                                <div class="px-4">
                                    <form action="{{ route('user.transfer.ecurrency.transferotp') }}" class="basicform" method="post">
                                        @csrf
                                        <table class="table">
                                            <tr>
                                                <td>{{ __('Withdraw method') }}</td>
                                                <td>{{ $data->withdraw_method }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Currency Name') }}</td>
                                                <td>{{ $data->currency }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Amount (excluding charge)') }}</td>
                                                <td>{{ $data->amount_usd }} ({{ __('USD') }})</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Total Charge') }} </td>
                                                <td>{{ $data->fee }} ({{ __('USD') }})</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Amount (including charge)') }} </td>
                                                <td>{{ $data->amount_usd - $data->fee }} ({{ __('USD') }})</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Final Amount') }} </td>
                                                <td>{{ $data->amount_withdraw }} ({{ $data->currency }})</td>
                                            </tr>
                                        </table>
                                        <div class="form-group">
                                            <label for="" class="">{{ __('Message') }}</label>
                                            <textarea name="account" class="form-control mb-2" id="" cols="30" rows="5" placeholder="{{ __('Message') }}"></textarea>
                                        </div>
                                        <input type="hidden" value="{{ route('user.transfer.ecurrency.transferotpview') }}" class="redirectUrl">
                                        @if(!Session::has('err'))
                                            <div class="button-btn">
                                                <button type="submit" class="basicbtn my-4 w-100" tabindex="4">
                                                    {{ __('Submit') }}
                                                </button>
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
    </div>
</section>
<!-- dahboard area end -->

@endsection


@push('js')
<script src="{{ asset('frontend/assets/js/transfer/redirect.js') }}"></script>
@endpush
