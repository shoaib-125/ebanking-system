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
                            <div class="row">
                                <div class="col-9">
                                    <h4>{{ __('Own Bank Statments') }}</h4>
                                </div>
                                <div class="col-3 text-end">
                                    <a class="btn btn-primary" href="{{ route('user.statement.ownbankpdf') }}">{{ __('PDF download') }}</a>
                                </div>
                            </div>
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
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Trx ID') }}</th>
                                        <th scope="col">{{ __('Amount') }}</th>
                                        <th scope="col">{{ __('Account NO.') }}</th>
                                        <th scope="col">{{ __('Balance') }}</th>
                                        <th scope="col">{{ __('Fee') }}</th>
                                        <th scope="col">{{ __('Date / Time') }}</th>
                                        <th scope="col">{{ __('Details') }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($transactions as $key => $transaction)
                                      <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $transaction->trxid }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                            <td>{{ Auth::user()->account_number }}</td>
                                            <td>{{ $transaction->balance }}</td>
                                            <td>{{ $transaction->fee }}</td>
                                            <td>{{ date('d-m-Y h:i', strtotime($transaction->created_at)) }}</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="{{ route('user.own.bank.statement.view', $transaction->id) }}">
                                                    {{ __('View') }}
                                                </a>
                                            </td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    {{ $transactions->links('vendor.pagination.bootstrap-4') }}
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