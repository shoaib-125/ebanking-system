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
                            <h4>{{ __('Bill Request') }}</h4>
                        </div>
                        <div class="card">
                            <div class="card-body">
                               <form id="bill" action="{{ route('user.bill.store') }}" method="post">
                                @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">{{ __('Email') }}</label>
                                                <input type="email" value="{{ old('email') }}" name="email" class="form-control {{ Session::has('error') ? 'is-invalid' : '' }}" placeholder="{{ __('Enter Email Address') }}">
                                            </div>
                                            @if(Session::has('error'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ Session::get('error') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">{{ __('Title') }}</label>
                                                <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="{{ __('Enter Your Title') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">{{ __('Description') }}</label>
                                                <textarea class="form-control" name="description" id="" cols="30" rows="5" placeholder="{{ __('Description') }}">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">{{ __('Amount (USD)') }}</label>
                                                <input type="number" value="{{ old('amount') }}" name="amount" class="form-control" placeholder="{{ __('Amount') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 text-center mt-3">
                                            <div class="button-btn">
                                                <button type="submit" class="basicbtn d-block w-100">{{ __('Submit') }}</button>
                                            </div>
                                        </div>
                                    </div>
                               </form>
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


