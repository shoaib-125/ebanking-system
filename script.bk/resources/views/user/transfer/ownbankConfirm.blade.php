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
                            <div class="card w-50">
                                <div class="px-4">
                                    <table class="table">
                                        <tr>
                                            <td>{{ __('Account Number') }}</td>
                                            <td>{{ $data->account_no }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Amount') }}</td>
                                            <td>{{ $data->amount }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Charge Type') }}</td>
                                            <td>{{ $data->charge_type }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Total Charge') }}</td>
                                            <td>{{ $data->total_charge }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Total Amount') }}</td>
                                            <td>{{ $data->total_amount }}</td>
                                        </tr>
                                    </table>
                                    <form action="{{ route('user.transfer.ownbank.transferotp') }}" class="basicform" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ route('user.transfer.ownbank.transferotpview') }}" class="redirectUrl">
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
</section>
<!-- dahboard area end -->
@endsection

@push('js')
<script src="{{ asset('frontend/assets/js/transfer/redirect.js') }}"></script>
@endpush
