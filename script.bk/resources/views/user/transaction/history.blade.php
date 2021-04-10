@extends('layouts.frontend.app')

@section('content')
<section>
    <div class="dashboard-area pt-150 pb-100">
        <div class="container">
            <div class="row">
                @include('layouts.frontend.partials.sidebar')
                <div class="col-lg-9">
                    <div class="main-container">
                        <div class="header-section">
                            <h4>{{ __('Transaction History') }}</h4>
                        </div>
                        @if(Session::has('message'))
                        <p class="alert alert-danger">
                            {{ Session::get('message') }}
                        </p>
                        @endif
                        <form action="{{ route('user.transaction.search') }}">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>{{ __('Start Date') }}</label>
                                        <input type="date" class="form-control" name="start_date">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>{{ __('End Date') }}</label>
                                        <input type="date" class="form-control" name="end_date">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="button-btn custom">
                                        <button type="submit">{{ __('Search') }}</button>
                                    </div>
                                </div>  
                                <div class="col-lg-3 text-end">
                                    <div class="btn btn-primary custom">
                                        <a class="btn btn-primary" href="{{ route('user.transaction.pdf') }}">{{ __('PDF download') }}</a>
                                    </div>
                                </div>  
                                <div class="col-3 text-end">
                                    
                                </div>                                  
                            </div>
                        </form>
                        <div class="card">
                            <div class="card-body table-responsive">
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
                                    @foreach ($transactions as $key => $transaction)
                                      <tr>
                                            <td>{{ $key++ }}</td>
                                            <td>{{ $transaction->trxid }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                            <td>{{ $transaction->balance }}</td>
                                            <td>{{ $transaction->fee }}</td>
                                            <td>{{ $transaction->status == 1 ? 'Success' :  '' }} {{ $transaction->status == 2 ? 'Pending' : '' }}</td>
                                            <td>{{ $transaction->created_at->isoFormat('LL') }}
                                            </td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('user.transaction.view', $transaction->id) }}"><span class="iconify" data-icon="carbon:view-filled" data-inline="false"></span></a>
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