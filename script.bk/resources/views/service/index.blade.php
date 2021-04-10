@extends('layouts.frontend.app')

@section('content')
<!-- breadcrumb area start -->
<section>
    <div class="breadcrump-area text-center">
        <div class="breadcrump-title">
            <h4>{{ __('All Services') }}</h4>
        </div>
        <div class="breadcrump-body">
            <a href="{{ url('/') }}">{{ __('Home') }}</a> <span class="dash">/</span> <span>{{ __('All Services') }}</span>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<!-- services area start -->
<section>
    <div class="services-area pt-100 pb-100">
        <div class="container">
            <div class="owl-carousel" id="service">
                @foreach ($services as $data)
                @php 
                    $meta_data = json_decode($data->serviceMeta->value);
                @endphp
                <div class="col-lg-12">
                <div class="single-service">
                    <div class="service-icon">
                        <img src="{{ asset($meta_data->image) }}" alt="">
                    </div>
                    <div class="service-title">
                        <h3>{{ Str::limit($data->title,12) }}</h3>
                    </div>
                    <div class="service-des">
                        <p>
                            {{ $meta_data->short_description }}
                        </p>
                    </div>
                    <div class="service-action">
                        <a href="{{ route('service.show',$data->slug) }}">{{ __('Learn More') }} <span class="iconify" data-icon="bi:arrow-right" data-inline="false"></span></a>
                    </div>
                </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- services area end -->
@endsection