@extends('layouts.frontend.app')

@section('content')
<!-- breadcrumb area start -->
<section>
    <div class="breadcrump-area text-center">
        <div class="breadcrump-title">
            <h4></h4>
        </div>
        <div class="breadcrump-body">
            <a href="{{ url('/') }}">{{ __('Home') }}</a> <span class="dash">/</span> <span>{{ __('Verify') }}</span>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<!-- page area start -->
<section>
    <div class="page-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                      <div class="card-header">{{ __('Verify Your Email Address') }}</div>
                    <div class="page-body">
                         @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page area end -->
@endsection
