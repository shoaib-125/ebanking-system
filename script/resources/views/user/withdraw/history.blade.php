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
                                    <h4>{{ __('Withdraw') }}</h4>
                                </div>
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::user()->balance > 0)
                            <div class="col-lg-6">
                                <div class="account-number f-right">
                                    <button data-bs-toggle="modal" data-bs-target="#withdrawModal" class="btn btn-primary">{{ __('Withdraw Request') }}</button>
                                </div>
                            </div>
                            @endif
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
                                <h5>{{ __('Withdraw History') }}</h5>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Transaction Id') }}</th>
                                        <th scope="col">{{ __('Amount') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col" class="date">{{ __('Date') }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($transactions as $transaction)
                                      <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $transaction->trxid }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                            <td>
                                                @if ($transaction->status == 1)
                                                    <div class="badge bg-success">
                                                        {{ __('success') }}
                                                    </div>
                                                    @elseif($transaction->status == 2)
                                                    <div class="badge bg-warning">
                                                        {{ __('Pending') }}
                                                    </div>
                                                    @else 
                                                    <div class="badge bg-danger">
                                                        {{ __('Rejected') }}
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="date">{{ $transaction->created_at->toDateString() }}</td>
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
            <div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="withdrawModalLabel">Withdraw Request</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('user.withdraw.check') }}" class="basicform" novalidate="" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ route('user.otp') }}" class="redirectUrl">
                                <div class="form-group">
                                    <label>{{ __('Enter Withdrawal Amount') }}</label>
                                    <input type="number" class="form-control" name="amount" tabindex="1" required autofocus placeholder="{{ __('Amount') }}">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Enter Your Withdrawal Method') }}</label>
                                    <input type="text" class="form-control" name="withdraw_method" tabindex="1" required autofocus placeholder="{{ __('Method') }}">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Enter Your Withdrawal Account Title') }}</label>
                                    <input type="text" class="form-control" name="account_title" tabindex="1" required autofocus placeholder="{{ __('Account Title') }}">
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Enter Your Withdrawal Account Number') }}</label>
                                    <input type="number" class="form-control" name="account_no" tabindex="1" required autofocus placeholder="{{ __('Account Number') }}">
                                </div>
                                    <div class="form-group">
                                    <div class="button-btn">
                                        <button type="submit" class="basicbtn w-100" tabindex="4">
                                            {{ __('Request') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- dahboard area end -->
@endsection

@push('js')
    <script src="{{ asset('frontend/assets/js/transfer/redirect.js') }}"></script>

@endpush
