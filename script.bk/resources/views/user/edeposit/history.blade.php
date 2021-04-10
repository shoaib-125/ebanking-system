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
                            <h4>{{ __('Deposit History') }}</h4>
                        </div>
                        @if(Session::has('message'))
                        <p class="alert alert-success">
                            {{ Session::get('message') }}
                        </p>
                        @endif
                        @if(Session::has('error'))
                        <p class="alert alert-danger">
                            {{ Session::get('error') }}
                        </p>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h5>{{ __('Deposit History') }}</h5>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Transaction Id') }}</th>
                                        <th scope="col">{{ __('Gateway') }}</th>
                                        <th scope="col">{{ __('Amount') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col" class="date">{{ __('Date') }}</th>
                                        <th scope="col">{{ __('View') }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($deposits as $deposit)
                                      <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $deposit->trx }}</td>
                                            <td>{{ $deposit->getway->name }}</td>
                                            <td>{{ $deposit->amount }}</td>
                                            <td>
                                                @if ($deposit->status == 1)
                                                    <div class="badge bg-success">
                                                        {{ __('success') }}
                                                    </div>
                                                    @elseif($deposit->status == 2)
                                                    <div class="badge bg-danger">
                                                        {{ __('success') }}
                                                    </div>
                                                    @else 
                                                    <div class="badge bg-warning">
                                                        {{ __('Rejected') }}
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="date">{{ $deposit->created_at->toDateString() }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('user.edeposit.show',  $deposit->id) }}"><span class="iconify" data-icon="carbon:view-filled" data-inline="false"></span></a>
                                            </td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    {{ $deposits->links('vendor.pagination.bootstrap-4') }}
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