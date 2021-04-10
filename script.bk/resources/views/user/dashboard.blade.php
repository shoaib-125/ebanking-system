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
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="header-section">
                                    <h4>{{ __('Dashboard') }}</h4>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="account-number f-right">
                                    <p><strong>{{ __('Account Number') }}:</strong> {{ Auth::User()->account_number }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="section-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="single-card position-relative">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="count">
                                                    <h4 id="balance">
                                                        <span class="loader">
                                                            <img src="{{ asset('frontend/assets/img/loader.gif') }}" alt="" width=100>
                                                        </span>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="icon">
                                                    <span class="iconify" data-icon="gridicons:money" data-inline="false"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="balence-label">
                                                    <p>{{ __('Total Balence') }}</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-card position-relative">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="count">
                                                    <h4 id="deposit">
                                                        <span class="loader">
                                                            <img src="{{ asset('frontend/assets/img/loader.gif') }}" alt="" width=100>
                                                        </span>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="icon">
                                                    <span class="iconify" data-icon="bx:bxs-package" data-inline="false"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="balence-label">
                                                    <p>{{ __('Total Deposit') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-card position-relative">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="count">
                                                    <h4 id="withdraw">
                                                        <span class="loader">
                                                            <img src="{{ asset('frontend/assets/img/loader.gif') }}" alt="" width=100>
                                                        </span>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="icon">
                                                    <span class="iconify" data-icon="uil:money-withdraw" data-inline="false"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="balence-label">
                                                    <p>{{ __('Total Withdraw') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Latest Transaction -->
                            <br>          
                            <div class="card">
                                <div class="card-header">
                                    <h5>{{ __('Latest Transactions') }}</h5>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table">
                                        <div class="table-loader text-center">
                                            <span class="loader">
                                                <img src="{{ asset('frontend/assets/img/loader.gif') }}" alt="" width=100>
                                            </span>
                                        </div>
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('Trx ID') }}</th>
                                            <th scope="col">{{ __('Amount') }}</th>
                                            <th scope="col">{{ __('Balance') }}</th>
                                            <th scope="col">{{ __('Fee') }}</th>
                                            <th scope="col">{{ __('Type') }}</th>
                                            <th scope="col">{{ __('Status') }}</th>
                                            <th scope="col">{{ __('Date / Time') }}</th>
                                            <th scope="col">{{ __('Details') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody class="transactions">
                                        
                                        </tbody>
                                    </table>
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
<input type="hidden" id="user_info" value="{{ route("user.dashboard.user_info") }}">
<input type="hidden" id="transaction_url" value="{{ route("user.transaction.view", '' )}}">
@endsection

@push('js')
<script src="{{ asset('frontend/assets/js/dashboard.js') }}"></script>
@endpush