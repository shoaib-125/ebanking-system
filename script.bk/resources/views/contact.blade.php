@extends('layouts.frontend.app')

@section('content')
<!-- breadcrumb area start -->
<section>
    <div class="breadcrump-area text-center">
        <div class="breadcrump-title">
            <h4>{{ __('Contact Us') }}</h4>
        </div>
        <div class="breadcrump-body">
            <a href="{{ url('/') }}">{{ __('Home') }}</a> <span class="dash">/</span> <span>{{ __('Contact Us') }}</span>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<!-- breadcrumb area start -->
<section>
    <div class="contact-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-title text-center">
                        <h3>{{ __('Contact Us') }}</h3>
                       
                    </div>
                    <div class="contact-form">
                        <form action="{{ route('contact.send') }}" method="POST" class="basicform">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('Name') }}</label>
                                        <input type="text" placeholder="{{ __('Enter Your Name') }}" class="form-control" name="name" id="name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('Email') }}</label>
                                        <input type="email" placeholder="{{ __('Enter Your Email') }}" class="form-control" name="email" id="email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>{{ __('Subject') }}</label>
                                        <input type="text" placeholder="{{ __('Enter Your Subject') }}" class="form-control" name="subject" id="subject">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>{{ __('Message') }}</label>
                                        <textarea name="message" class="form-control" placeholder="{{ __('Message') }}" name="message" id="message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-btn">
                                        <button type="submit" class="f-right basicbtn">{{ __('Send Message') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->
@endsection

@push('js')
<script src="{{ asset('backend/admin/assets/js/sweetalert2.all.min.js') }}"></script>
<script>
    "use strict";
    function success(res)
    {
        $('#name').val('');
        $('#email').val('');
        $('#subject').val('');
        $('#message').val('');
        console.log(res);
    }
</script>
@endpush