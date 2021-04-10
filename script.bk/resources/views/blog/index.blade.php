@extends('layouts.frontend.app')

@section('content')
<!-- breadcrumb area start -->
<section>
    <div class="breadcrump-area text-center">
        <div class="breadcrump-title">
            <h4>{{ __('News List') }}</h4>
        </div>
        <div class="breadcrump-body">
            <a href="{{ url('/') }}">{{ __('Home') }}</a> <span class="dash">/</span> <span>{{ __('News List') }}</span>
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
                    <div class="row">
                        @if ($news->count() > 0)
                        @foreach ($news as $value)
                        <div class="col-lg-6 mb-30">
                            <div class="single-news">
                                <div class="news-img">
                                    <a href="{{ route('blog.show',$value->slug) }}"><img class="img-fluid" src="{{ asset($value->thum_image->value) }}" alt=""></a>
                                </div>
                                <div class="news-content">
                                    <div class="news-title">
                                        <a href="{{ route('blog.show',$value->slug) }}"><h3>{{ $value->title }}</h3></a>
                                    </div>
                                    <div class="news-des">
                                        <p>{{ $value->excerpt->value }}</p>
                                    </div>
                                    <div class="news-action">
                                        <a href="{{ route('blog.show',$value->slug) }}">{{ __('Learn More') }} <span class="iconify" data-icon="bi:arrow-right" data-inline="false"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else 
                        <div class="no-data-found text-center">
                            <p>{{ __('Opps! No Data Found.') }}</p>
                        </div>
                        @endif
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <div class="pagination-area-center text-center">
                                {{ $news->links('vendor.pagination.simple-tailwind') }}
                            </div>
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