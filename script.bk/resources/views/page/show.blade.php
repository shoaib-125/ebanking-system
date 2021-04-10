@extends('layouts.frontend.app')

@section('content')
<!-- breadcrumb area start -->
<section>
    <div class="breadcrump-area text-center">
        <div class="breadcrump-title">
            <h4>{{ $page->title }}</h4>
        </div>
        <div class="breadcrump-body">
            <a href="{{ url('/') }}">{{ __('Home') }}</a> <span class="dash">/</span> <span>{{ $page->title }}</span>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<!-- page area start -->
<section>
    <div class="page-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-body">
                        @php
                            $info = json_decode($page->page->value);
                        @endphp
                        <p>{{ $info->page_excerpt }}</p>
                        <p>{!! $info->page_content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page area end -->
@endsection