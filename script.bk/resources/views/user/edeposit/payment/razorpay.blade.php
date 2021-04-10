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
                            <div class="card w-50 mx-auto">
                                <div class="card-body">
                                  <img src="{{ asset($gateway->logo) }}" alt="" width="100%">
                                    <div class="px-4">
                                        <table class="table">
                                            <tr>
                                                <td>{{ __('Amount') }}</td>
                                                <td>{{ $Info['main_amount'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Charge') }}</td>
                                                <td>{{ $Info['charge'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Total') }}</td>
                                                <td>{{ $Info['main_amount']+$Info['charge'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Amount (USD)') }}</td>
                                                <td>{{ $Info['amount'] }}</td>
                                            </tr>  
                                            <tr>
                                                <td>{{ __('Payment Mode') }}</td>
                                                <td>{{ __('RazorPay') }}</td>
                                            </tr>                                      
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <button class="btn btn-primary mt-4 col-12" id="rzp-button1">Pay Now</button>
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

<form action="{{ url('/user/razorpay/status')}}" method="POST" hidden>	
    <input type="hidden" value="{{csrf_token()}}" name="_token" /> 
    <input type="text" class="form-control" id="rzp_paymentid"  name="rzp_paymentid">
    <input type="text" class="form-control" id="rzp_orderid" name="rzp_orderid">
    <input type="text" class="form-control" id="rzp_signature" name="rzp_signature">
    <button type="submit" id="rzp-paymentresponse" hidden class="btn btn-primary"></button>
</form>
<input type="hidden" value="{{ $response['razorpayId'] }}" id="razorpayId">
<input type="hidden" value="{{ $response['amount'] }}" id="amount">
<input type="hidden" value="{{ $response['currency'] }}" id="currency">
<input type="hidden" value="{{ $response['name'] }}" id="name">
<input type="hidden" value="{{ $response['description'] }}" id="description">
<input type="hidden" value="{{ $response['orderId'] }}" id="orderId">
<input type="hidden" value="{{ $response['name'] }}" id="name">
<input type="hidden" value="{{ $response['email'] }}" id="email">
<input type="hidden" value="{{ $response['contactNumber'] }}" id="contactNumber">
<input type="hidden" value="{{ $response['address'] }}" id="address">
@endsection
@push('js')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="{{ asset('backend/admin/assets/js/razorpay.js')}}"></script>
@endpush