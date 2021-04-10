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
                            <h4>{{ __('Others Bank Statement View') }}</h4>
                        </div>
                        @if(Session::has('message'))
                        <p class="alert alert-danger">
                            {{ Session::get('message') }}
                        </p>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">{{ __('Title') }}</th>
                                        <th scope="col">{{ __('Details') }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $info = json_decode($transaction->info);
                                        @endphp
                                        <tr>
                                            <td>{{ __('User Name') }}</td>
                                            <td>{{ Auth::user()->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Transaction Type') }}</td>
                                            <td>{{ $transaction->transaction->type }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Currency') }}</td>
                                            <td>{{ $transaction->term->title }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Currency Rate') }}</td>
                                            <td>{{ $transaction->currency_rate }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Status') }}</td>
                                            <td>{{ $transaction->status == 1 ? 'Success' : ($transaction->status == 2 ? 'Pending' : 'Error') }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('Bank Name') }}</td>
                                            <td>{{ $transaction->bank->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Account Holder Name') }}</td>
                                            <td>{{ $info->account_holder_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Account Number') }}</td>
                                            <td>{{ $info->account_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Amount') }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Branch') }}</td>
                                            <td>{{ $info->branch }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Transaction Date') }}</td>
                                            <td>{{ date('d-m-Y h:i', strtotime($transaction->created_at)) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
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