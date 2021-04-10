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
                            <h4>{{ __('Transaction') }}</h4>
                        </div>
                        @if(Session::has('message'))
                        <p class="alert alert-danger">
                            {{ Session::get('message') }}
                        </p>
                        @endif
                        <form action="{{ route('user.transaction.search') }}">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>{{ __('Start Date') }}</label>
                                        <input type="date" class="form-control" name="start_date" value="{{ date('m-d-y', strtotime($start_date)) }}">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>{{ __('End Date') }}</label>
                                        <input type="date" class="form-control" name="end_date" value="{{ date('m-d-y', strtotime($end_date)) }}">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="button-btn custom">
                                        <button type="submit">{{ __('Search') }}</button>
                                    </div>
                                </div>                                    
                            </div>
                        </form>
                        <div class="card">
                            <div class="card-header">
                                <h5>{{ __('Statements Date') }} {{ date('d-m-Y', strtotime($start_date)) }} To {{ date('d-m-Y', strtotime($end_date)) }}</h5>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Trx ID') }}</th>
                                        <th scope="col">{{ __('Amount') }}</th>
                                        <th scope="col">{{ __('Balance') }}</th>
                                        <th scope="col">{{ __('Fee') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Date / Time') }}</th>
                                        <th scope="col">{{ __('Details') }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($search_statement as $key => $transaction)
                                      <tr>
                                            <td>{{ $key++ }}</td>
                                            <td>{{ $transaction->trxid }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                            <td>{{ $transaction->balance }}</td>
                                            <td>{{ $transaction->fee }}</td>
                                            <td>{{ $transaction->status == 1 ? 'Success' : 'Error' }}</td>
                                            <td>{{ date('d-m-Y h:i', strtotime($transaction->created_at)) }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('user.transaction.view', $transaction->id) }}">{{ __('View') }}</a>
                                            </td>
                                      </tr>
                                      @endforeach
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