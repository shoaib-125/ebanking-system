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
                            <div class="container">
                                <div class="row">
                                        <div class="col-lg-8 offset-lg-2">
                                            <div class="card">
                                                <div class="card-body">
                                            <div class="form-group row mb-4">
                                                <div class="px-4">
                                                    <table class="table">
                                                        <tr>
                                                            <td>{{ __('Bank Name') }}</td>
                                                            <td>{{ $data->bank_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('Branch') }}</td>
                                                            <td>{{ $data->branch }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('Account Holder Name') }}</td>
                                                            <td>{{ $data->account_holder_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('Account Number') }}</td>
                                                            <td>{{ $data->account_no }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('Currency Name') }}</td>
                                                            <td>{{ $data->currency_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('Currency Rate') }}</td>
                                                            <td>{{ $data->currency_rate }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('Amount (excluding charge)') }}</td>
                                                            <td>{{ $data->usd }} ({{ __('USD') }})</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('Total Charge') }} </td>
                                                            <td>{{ $data->total_charge }} ({{ __('USD') }})</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('Amount (including charge)') }} </td>
                                                            <td>{{ $data->amount-$data->total_charge }} ({{ __('USD') }})</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('Final Amount') }} </td>
                                                            <td>{{ $data->final_amount }} ({{ $data->currency_name }})</td>
                                                        </tr>
                                                    </table>
                                                    <form action="{{ route('user.transfer.otherbank.transferotp') }}" class="basicform" method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{ route('user.transfer.otherbank.transferotpview') }}" class="redirectUrl">
                                                        <button type="submit" class="basicbtn btn btn-primary my-4 w-100" tabindex="4">
                                                            {{ __('Submit') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>  
                                           </div>
                                       </div>
                                   </div>
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
