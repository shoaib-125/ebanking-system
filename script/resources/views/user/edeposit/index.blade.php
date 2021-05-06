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
                            <h4>{{ __('E-Deposit') }}</h4>
                        </div>
                        <div class="section-body">
                           <div class="edeposit-area">
                               <div class="row">
                                   @foreach ($gateways as $gateway)
                                   <div class="col-lg-4">
                                       <div class="single-deposit text-center mb-4">
                                           <div class="deposit-img">
                                               <img class="img-fluid" src="{{ asset($gateway->logo) }}" alt="">
                                           </div>
                                           <div class="deposit-name">
                                               <h3>{{ ucwords($gateway->name) }}</h3>
                                           </div>

                                           <div class="requirments-menu">
                                                <nav>
                                                    <ul>
                                                        <li>{{ __('Limit') }}: {{ $gateway->deposit_min }}-{{ $gateway->deposit_max }}</li>
                                                {{--        <li>{{ __('Charge') }}: {{ $gateway->charge_type }}</li>--}}
                                                        @foreach( json_decode($gateway->data) as $key=>$info)
                                                        <li>{{ __(ucwords(str_replace("_"," ",$key))) }}: {{ $info }}</li>
                                                        @endforeach
                                                    </ul>
                                                </nav>
                                           </div>
                                           <div class="desposit-action">
                                               <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $gateway->id }}">{{ __('Deposit Now') }}</a>
                                           </div>
                                       </div>
                                   </div>
                                   <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $gateway->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $gateway->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel{{ $gateway->id }}">{{ ucwords($gateway->name) }} </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('user.edeposit.check', $gateway->id) }}" class="basicform" novalidate="" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{ route('user.otp') }}" class="redirectUrl">
                                                @if ($gateway->type == 0)
                                                    <label for="currency">{{ __('Currency') }}</label>
                                                    <select name="currency" id="" class="form-control">
                                                        @foreach ($gateway->term as $currency)
                                                            <option value="{{ $currency->id }}">{{ $currency->title }}</option>
                                                        @endforeach
                                                    </select> 
                                                @endif
                                                {{--<div class="form-group">
                                                    <label>{{ __('Transferred To Account Number') }}</label>
                                                    <input type="text" class="form-control" name="acc_number" tabindex="1" value="{{json_decode($gateway)}}" required autofocus placeholder="{{ __('To Account number') }}">
                                                </div>--}}
                                                <div class="form-group">
                                                    <label>{{ __('Enter Account Number') }}</label>
                                                    <input type="text" class="form-control" name="acc_number" tabindex="1" required autofocus placeholder="{{ __('Account number') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Enter Account Title') }}</label>
                                                    <input type="text" class="form-control" name="acc_title" tabindex="1" required autofocus placeholder="{{ __('Account Title') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Enter Transaction ID') }}</label>
                                                    <input type="text" class="form-control" name="trans_id" tabindex="1" required autofocus placeholder="{{ __('Transaction ID') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Enter Amount') }}</label>
                                                    <input type="text" class="form-control" name="amount" tabindex="1" required autofocus placeholder="{{ __('Amount') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ __('Attach Image of Transaction Receipt') }}</label>
                                                    <div class="upload-imgs adjust" style="position: relative; display: block">
                                                        <fieldset>
                                                            <div>
                                                                <label class="custom-upload" for="proof-image-{{ $gateway->id }}"><span>Choose image to upload</span></label>
                                                                <input type="file" id="proof-image-{{ $gateway->id }}" style="display:none;"
                                                                       name="proof_image"
                                                                       onchange="showImage(this, '#proof-image-{{ $gateway->id }}')"/>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div id="proof-image-{{ $gateway->id }}-viewer"></div>
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

