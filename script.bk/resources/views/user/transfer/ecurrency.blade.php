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
                            <h4>{{ __('Withdraw Methods') }}</h4>
                        </div>
                        <div class="section-body">
                           <div>
                               <div class="row">
                                   @foreach ($withdraw_methods as $withdraw_method)
                                   <div class="col-lg-4">
                                       <div class="card">
                                           <div class="card-body">
                                                <div class="text-center mb-4">
                                                    <div class="ecurrency-name">
                                                        <h3>{{ ucwords($withdraw_method->title) }}</h3>
                                                    </div>
                                                    <div class="requirments-menu">
                                                        <nav>
                                                            <ul>
                                                                <li>{{ __('Limit') }}: {{ $withdraw_method->min_amount }}-{{ $withdraw_method->max_amount }}</li>
                                                                <li>{{ __('Charge') }}: {{ $withdraw_method->charge_type }}</li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                    <div class="desposit-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $withdraw_method->id }}">{{ __('Transfer') }}</a>
                                                    </div>
                                                </div>
                                           </div>
                                       </div>
                                   </div>
                                   <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $withdraw_method->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ ucwords($withdraw_method->title) }} </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('user.transfer.ecurrency.check', $withdraw_method->id) }}" class="basicform" novalidate="">
                                                @csrf
                                                <input type="hidden" value="{{ route('user.transfer.ecurrency.confirm') }}" class="redirectUrl">
                                                <div class="form-group">
                                                    <label for="currency">{{ __('Currency') }}</label>
                                                    <select name="currency" class="form-select">
                                                        <option value="">{{ __('Select Currency') }}</option>
                                                        @foreach ($withdraw_method->term as $currency)
                                                            <option value="{{ $currency->id }}">{{ $currency->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="amount">{{ __('Enter Amount') }}</label>
                                                    <input type="number" class="form-control" name="amount" tabindex="1" required autofocus placeholder="{{ __('Amount') }}">
                                                </div>
                                                <div class="form-group">
                                                        <div class="button-btn">
                                                            <button type="submit" class="basicbtn w-100" tabindex="4">
                                                                {{ __('Submit') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                   @endforeach
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

@push('js')
<script src="{{ asset('frontend/assets/js/transfer/redirect.js') }}"></script>
@endpush

