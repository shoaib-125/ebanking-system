@extends('layouts.frontend.app')

@section('content')
<section>
    <div class="dashboard-area pt-150 pb-100">
        <div class="container">
            <div class="row">
                @include('layouts.frontend.partials.sidebar')
                <div class="col-lg-9">
                    <div class="main-container">
                        <div class="row">
                            <div class="col-9">
                                <h4>{{ __('Bill Statment') }}</h4>
                            </div>
                            <div class="col-3 text-end">
                                <a class="btn btn-primary" href="{{ route('user.statement.billpdf') }}">{{ __('PDF download') }}</a>
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
                                            <td>
                                                @if ($payment->status == 1)
                                                    {{ __('Success') }}
                                                @elseif($payment->status == 2)
                                                    {{ __('Pending') }}
                                                @else 
                                                    {{ __('Rejected') }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('user.bill.statement.view', $payment->id) }}" class="btn btn-primary">{{ __('Show') }}</a>
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
@endsection