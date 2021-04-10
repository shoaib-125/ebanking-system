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
                        <div class="row">
                            <div class="col-9">
                                <h4>{{ __('Other Bank Statments') }}</h4>
                            </div>
                            <div class="col-3 text-end">
                                <a class="btn btn-primary" href="{{ route('user.statement.otherbankpdf') }}">{{ __('PDF download') }}</a>
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
                                        <th scope="col">{{ __('Bank Name') }}</th>
                                        <th scope="col">{{ __('Transaction Type') }}</th>
                                        <th scope="col">{{ __('Amount') }}</th>
                                        <th scope="col">{{ __('Currency Rate') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Action') }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($transactions as $key => $transaction)
                                      <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $transaction->bank->name }}</td>
                                            <td>{{ $transaction->transaction->type }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                            <td>{{ $transaction->currency_rate }}</td>
                                            <td>{{ $transaction->status == 1 ? 'Success' : ($transaction->status == 2 ? 'Pending' : 'Error') }}</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="{{ route('user.others.bank.statement.view', $transaction->id) }}">
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