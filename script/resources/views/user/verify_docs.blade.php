@extends('layouts.frontend.app')

@section('content')
<!-- dahboard area start -->
<section>
    <div class="dashboard-area pt-150 pb-100">
        <div class="container">
            <div class="row">
                @include('layouts.frontend.partials.alert')

                <div class="col-lg-12">
                    <div class="main-container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="header-section">
                                    <h4>{{ __('Dashboard') }}</h4>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="account-number f-right">
                                    <p><strong>{{ __('Account Number') }}:</strong> {{ Auth::User()->account_number }}</p>
                                </div>
                            </div>
                        </div>

                        @if($is_requested)
                            <div class="match-title-name">
                                <h4>Your request is under consideration. An email will be forwarded on any action.</h4>
                            </div>
                        @else
                        <div class="section-body">
                            <div class="cus-row" >
                                <div class="event-columnss">
                                    <div class="match-title-name">
                                        <h4>Account verification</h4>
                                    </div>

                                    <form enctype="multipart/form-data" method="post" action="{{ route('user.verifyDocs') }}" >
                                        {{csrf_field()}}
                                        <div class="full-column-team">
                                            <h5>1. ID card (front)</h5>
                                            <div class="upload-imgs adjust" style="position: relative; display: block">
                                                <fieldset>
                                                    <div>
                                                        <label class="custom-upload" for="idf-image"><span>Choose file to upload</span></label>
                                                        <input type="file" id="idf-image" style="display:none;"
                                                               name="idf_image"
                                                               onchange="showImage(this, '#idf-image')"/>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div id="idf-image-viewer"></div>
                                        </div>

                                        <div class="full-column-team">
                                            <h5>2. ID card (back)</h5>
                                            <div class="upload-imgs adjust" style="position: relative; display: block">
                                                <fieldset>
                                                    <div>
                                                        <label class="custom-upload" for="idb-image"><span>Choose file to upload</span></label>
                                                        <input type="file" id="idb-image" style="display:none;"
                                                               name="idb_image"
                                                               onchange="showImage(this, '#idb-image')"/>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div id="idb-image-viewer"></div>
                                        </div>

                                        <div class="full-column-team">
                                            <h5>3. Selfie</h5>
                                            <div class="upload-imgs adjust" style="position: relative; display: block">
                                                <fieldset>
                                                    <div>
                                                        <label class="custom-upload" for="selfie-image"><span>Choose file to upload</span></label>
                                                        <input type="file" id="selfie-image" style="display:none;"
                                                               name="selfie_image"
                                                               onchange="showImage(this, '#selfie-image')"/>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div id="selfie-image-viewer"></div>
                                        </div>

                                        <div class="full-column-team">
                                            <h5>4. Utility bill</h5>
                                            <div class="upload-imgs adjust" style="position: relative; display: block">
                                                <fieldset>
                                                    <div>
                                                        <label class="custom-upload" for="bill-image"><span>Choose file to upload</span></label>
                                                        <input type="file" id="bill-image" style="display:none;"
                                                               name="bill_image"
                                                               onchange="showImage(this, '#bill-image')"/>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div id="bill-image-viewer"></div>
                                        </div>

                                        <input class="btn btn-primary" type="submit" value="Request Verification" />
                                    </form>

                                </div>
                            </div>
                            <br>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- dahboard area end -->
<input type="hidden" id="user_info" value="{{ route("user.dashboard.user_info") }}">
<input type="hidden" id="transaction_url" value="{{ route("user.transaction.view", '' )}}">
@endsection

@push('js')
<script src="{{ asset('frontend/assets/js/dashboard.js') }}"></script>
@endpush