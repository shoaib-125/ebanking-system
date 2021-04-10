@extends('layouts.frontend.app')

@section('content')
<!-- breadcrumb area start -->
<section>
    <div class="breadcrump-area text-center">
        <div class="breadcrump-title">
            <h4>{{ $service->title }}</h4>
        </div>
        <div class="breadcrump-body">
            <a href="{{ url('/') }}">{{ __('Home') }}</a> <span class="dash">/</span> <span>{{ $service->title }}</span>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<!-- service area start -->
<section>
    <div class="service-area pt-100 pb-100 text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @php
                        $info = json_decode($service->serviceMeta->value);
                    @endphp
                    <div class="service-img">
                        <img src="{{ asset($info->image) }}" alt="">
                    </div>
                    <div class="service-title">
                        <h3>{{ $service->title }}</h3>
                    </div>
                    <div class="service-body">
                        <p>{{ $info->short_description }}</p>
                        <p>{!! $info->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service area end -->
@endsection