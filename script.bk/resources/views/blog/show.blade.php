@extends('layouts.frontend.app')

@section('content')
<!-- breadcrumb area start -->
<section>
    <div class="breadcrump-area text-center">
        <div class="breadcrump-title">
            <h4>{{ Str::limit($blog->title,30) }}</h4>
        </div>
        <div class="breadcrump-body">
            <a href="{{ url('/') }}">{{ __('Home') }}</a> <span class="dash">/</span> <span>{{ Str::limit($blog->title,15) }}</span>
        </div>
    </div>
</section>
<!-- breadcrumb area end -->

<!-- blog details area start -->
<section>
    <div class="blog-details pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-area">
                        <div class="blog-img">
                            <img class="img-fluid" src="{{ asset($blog->thum_image->value) }}" alt="">
                        </div>
                        <div class="blog-title">
                            <h3>{{ $blog->title }}</h3>
                        </div>
                        <div class="blog-another-info">
                            <span class="iconify" data-icon="ant-design:user-outlined" data-inline="false"></span> {{ __('By') }} {{ App\Models\User::where('role_id',1)->first()->name }} &nbsp;
                            <span class="iconify" data-icon="uil:calender" data-inline="false"></span> {{ $blog->created_at->isoFormat('LL') }}
                        </div>
                        <div class="blog-body">
                            <p>{{ $blog->excerpt->value }}</p>
                            <p>{!! $blog->description->value !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-card">
                        <div class="blog-card-header">
                            <h3>{{ __('Search') }}</h3>
                        </div>
                        <div class="blog-card-body">
                            <form action="{{ route('blog.search') }}">
                                <input type="text" placeholder="{{ __('Search') }}" name="search" value="{{ isset($query) != null ? $query : '' }}">
                                <button type="submit">{{ __('Search') }}</button>
                            </form>
                        </div>
                    </div>
                    <div class="blog-card">
                        <div class="blog-card-header">
                            <h3>{{ __('Latest News') }}</h3>
                        </div>
                        <div class="blog-card-body">
                            <div class="container">
                                @foreach ($latest_blogs as $blog)
                                <div class="row mb-4 align-items-center">
                                    <div class="col-lg-4 p-0">
                                        <div class="blog-small-img">
                                            <a href="{{ route('blog.show',$blog->slug) }}"><img class="img-fluid" src="{{ asset($blog->thum_image->value) }}" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="blog-small-title">
                                            <a href="{{ route('blog.show',$blog->slug) }}"><h5>{{ $blog->title }}</h5></a>
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
</section>
<!-- blog details area end -->
@endsection