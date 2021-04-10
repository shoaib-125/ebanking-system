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
                                                <td>{{ __('Amount (GHS)') }}</td>
                                                <td>{{ $Info['amount'] }}</td>
                                            </tr>  
                                            <tr>
                                                <td>{{ __('Payment Mode') }}</td>
                                                <td>{{ __('Paystack') }}</td>
                                            </tr>                                      
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <button class="btn btn-primary mt-4 col-12" id="payment_btn">{{ __('Pay Now') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<form method="post" class="status" action="{{ url('/payment/paystack') }}">
    @csrf
    <input type="hidden" name="ref_id" id="ref_id">
</form>
@endsection

@push('js')
<script src="https://js.paystack.co/v1/inline.js"></script> 
<script>
    "use strict";

    $('#payment_btn').on('click',()=>{
        payWithPaystack();
    });
   payWithPaystack();
 
    function payWithPaystack() {
        var amont= {{ $amount * 100 }} ;

        let handler = PaystackPop.setup({
        key: '{{ $public_key }}', // Replace with your public key
        email: '{{ Auth::user()->email }}',
        amount: amont,
        currency: 'GHS',
        ref: 'ps_{{ Str::random(15) }}',
        onClose: function(){
        payWithPaystack();
    },
    callback: function(response){
        $('#ref_id').val(response.reference);
        $('.status').submit();

    }
    });
    handler.openIframe();
  }
</script>
@endpush