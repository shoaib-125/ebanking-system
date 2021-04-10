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
                            <h4>{{ __('Bill Request') }}</h4>
                        </div>
                        @if(Session::has('message'))
                        <p class="alert alert-danger">
                            {{ Session::get('message') }}
                        </p>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h5>{{ __('Bill Request') }}</h5>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Sender') }}</th>
                                        <th scope="col">{{ __('Receiver') }}</th>
                                        <th scope="col">{{ __('Title') }}</th>
                                        <th scope="col">{{ __('Amount') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Details') }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($payments as $payment)
                                      <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $payment->sender->name }}</td>
                                            <td>{{ $payment->receiver->name }}</td>
                                            <td>{{ $payment->title }}</td>
                                            <td>{{ $payment->amount }}</td>
                                            <td>{{ $payment->status == 1 ? 'Success' : ($payment->status == 2 ? 'Pending' : 'Rejected') }}</td>
                                            <td>
                                                @if ($payment->receiver_id == Auth::id() && $payment->status == 2)
                                                    <a href="{{ route('user.bill.show', $payment->id) }}" class="btn btn-primary">{{ __('Show') }}</a>
                                                @endif
                                            </td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    {{ $payments->links('vendor.pagination.bootstrap-4') }}
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