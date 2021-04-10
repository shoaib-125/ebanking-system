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
                            <h4>{{ __('Account Statements List') }}</h4>
                        </div>
                        @if(Session::has('message'))
                        <p class="alert alert-danger">
                            {{ Session::get('message') }}
                        </p>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h5>{{ __('Statement') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="btn-statement">
                                            <a class="btn btn-primary w-100" href="{{ route('user.own.bank.statement') }}">{{ __('Own Bank') }}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="btn-statement">
                                            <a class="btn btn-success w-100" href="{{ route('user.others.bank.statement') }}">{{ __('Others Bank') }}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="btn-statement">
                                            <a class="btn btn-warning w-100" href="{{ route('user.edeposit.statement') }}">{{ __('E-currency') }}</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="btn-statement">
                                            <a class="btn btn-dark w-100" href="{{ route('user.bill.statement') }}">{{ __('Bill') }}</a>
                                        </div>
                                    </div>
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