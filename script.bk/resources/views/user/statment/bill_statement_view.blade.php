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
                            <h4>{{ __('Bill Statement View') }}</h4>
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
                                        <tr>
                                            <td>{{ __('Sender Name') }}</td>
                                            <td>{{ $payment->sender->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Receiver Name') }}</td>
                                            <td>{{ $payment->receiver->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Title') }}</td>
                                            <td>{{ $payment->title }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Description') }}</td>
                                            <td>{{ $payment->description }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Amount (USD)') }}</td>
                                            <td>{{ $payment->amount }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Status') }}</td>
                                            <td>{{ $payment->status == 1 ? 'Success' : ($payment->status == 0 ? 'Rejected' : 'Pending' ) }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Transaction Date') }}</td>
                                            <td>{{ date('d-m-Y h:i', strtotime($payment->created_at)) }}</td>
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