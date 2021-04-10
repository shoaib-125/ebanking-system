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
                            <h4>{{ __('Own Bank Statement View') }}</h4>
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
                                            <td>{{ __('User Name') }}</td>
                                            <td>{{ Auth::user()->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Trx Id') }}</td>
                                            <td>{{ $transaction->trxid }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Amount') }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Balance') }}</td>
                                            <td>{{ $transaction->balance }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Fee') }}</td>
                                            <td>{{ $transaction->fee }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Status') }}</td>
                                            <td>{{ $transaction->status == 1 ? 'Success' : 'Error' }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('Info') }}</td>
                                            <td>{{ $transaction->info }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Type') }}</td>
                                            <td>{{ $transaction->type }}</td>
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