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
                            <h4>{{ __('Payment') }}</h4>
                        </div>
                        <div class="section-body">
                            <div class="card mx-auto">
                                <div class="card-body">
                                  <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>{{ __('Amount') }}</td>
                                            <td>{{ $data->amount }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Charge') }}</td>
                                            <td>{{ $data->charge }}</td>
                                        </tr>

                                        @if ($gateway->type == 1)
                                        <tr>
                                            <td>{{ __('Total') }}</td>
                                            <td>{{ $data->payable }}
                                            @switch($gateway->id)
                                                @case(4) ({{ __('INR') }})   @break
                                                @case(5) ({{ __('RM') }})    @break
                                                @case(7) ({{ __('NGN') }})  @break
                                                @default 
                                                ({{ __('USD') }})
                                            @endswitch
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td>{{ __('Amount (USD)') }}</td>
                                            <td>{{ $data->usd_amount }}</td>
                                        </tr>
                                        @if ($data->final_amount)
                                        <tr>
                                            <td>{{ __('Amount') }} ({{ $data->currency->title }})</td>
                                            <td>{{ $data->final_amount }}</td>
                                        </tr>
                                        @endif
                                    </table>
                                    @isset($gateway->data)
                                        
                                    @if(!empty($gateway->data) && $gateway->type == 0)
                                    <div class="row">
                                        <div class="col-sm-12 bg-white">
                                            <p><b>{{ __('Payment Info') }}</b></p>
                                            {{ $gateway->data }}
                                        </div>
                                    </div>
                                    @endif
                                    @endisset
                                </div>
                                    <form action="{{ route('user.edeposit.deposit') }}" method="post" id="payment-form" class="" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <input type="hidden" name="type" value="{{ $gateway->type }}">
                                            <input type="hidden" name="id" value="{{ $gateway->id }}">
                                           
                                            <input type="hidden" name="currency" value="{{ $data->currency->id ?? 0 }}">
                                            @if($gateway->type == 1) 
                                            
                                            @if($gateway->id == 2)
                                            @php
                                            $stripe=true;
                                            @endphp
                                            <input type="hidden" id="publishable_key" value="{{ $data->publishable_key ?? '' }}">
                                                <label for="card-element">
                                                    {{ __('Credit or debit card') }}
                                                </label>
                                                <div id="card-element">
                                                <!-- A Stripe Element will be inserted here. -->
                                                </div>
                                                <!-- Used to display form errors. -->
                                                <div id="card-errors" role="alert"></div>
                                                @else
                                            @php
                                            $stripe=false;
                                            @endphp    


                                            @endif
                                            @else
                                            @php
                                            $stripe=false;
                                            @endphp
                                                <label for="" class="col-md-12 mb-2">{{ __('Comment') }}</label>
                                                <textarea name="comment" id="" cols="30" rows="5" class="form-control @error('comment') is-invalid @enderror"></textarea>
                                                @error('comment')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <label for="" class="col-md-12 mb-2">{{ __('Image') }} <small>(*{{ __('Screenshot') }})</small></label>
                                                <input type="file" class="@error('image') is-invalid @enderror"  name="image">
                                                @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            @endif
                                            
                                        </div>
                                        <div class="button-btn">
                                            <button class="mt-4 w-100" id="submit_btn">{{ __('Submit Payment') }}</button>
                                        </div>
                                        
                                    </form>
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
@if($stripe == true)
@push('js')
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('frontend/assets/js/stripe.js') }}"></script>
@endpush
@endif