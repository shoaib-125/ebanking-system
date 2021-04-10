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
                                <h4>{{ __('E-deposit Statements') }}</h4>
                            </div>
                            <div class="col-3 text-end">
                                <a class="btn btn-primary" href="{{ route('user.statement.edepositPDF') }}">{{ __('PDF download') }}</a>
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
                                        <th scope="col">{{ __('Balance') }}</th>
                                        <th scope="col">{{ __('Fee') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Info') }}</th>
                                        <th scope="col">{{ __('Type') }}</th>
                                        <th scope="col">{{ __('Date / Time') }}</th>
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
                                            <td>{{ $transaction->status == 1 ? 'Success' : ($transaction->status == 2 ? 'Pending' : 'Failed') }}</td>
                                            <td>{{ $transaction->info }}</td>
                                            <td>{{ $transaction->type }}</td>
                                            <td>{{$transaction->created_at->isoFormat('LLL')  }}</td>
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