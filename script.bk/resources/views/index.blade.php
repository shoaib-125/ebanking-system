@extends('layouts.frontend.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
@endpush

@section('content')
<!-- hero area start -->
<section>
    <div class="hero-area"> 
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="slider-left-content">
                        <h2>{{ $titles->hero_title ?? '' }}</h2>
                        <p>{{  $titles->hero_description ?? '' }}</p>
                        <div class="slider-video-link">
                            <a href="{{ $titles->hero_button_url ?? '' }}" class="popup">
                                <span class="iconify" data-icon="ant-design:play-circle-filled" data-inline="false"></span> {{ $titles->hero_btn_title  ?? '' }}
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <div class="payment-calculation">
                        <div id="input" class="input-section position-relative">
                            <div class="money-input-field">
                                <input type="number" placeholder="1,000" value="100" id="amount">
                                <span>{{ __('You Send') }}</span>
                            </div>
                            <div class="money-currency">
                                <a href="#"><span><img src="{{ asset('frontend/assets/img/flag/1.png') }}" alt=""> <span> {{ __('USD') }}</span></span></a>
                            </div>
                        </div>
                        <div class="calculation-menu">
                            <nav>
                                <ul class="calc">
                                    <li>
                                        <span class="icon-area mct-1">
                                            <span class="iconify" data-icon="bx:bx-minus" data-inline="false"></span>
                                        </span>
                                        <span class="calculation-divison">
                                            <div class="charge" id="charge">
                                            </div>  
                                            <span class="calculation-payment-select">
                                                <select id="withdrawMethod">
                                                    @forelse ($withdrawMethods as $method)
                                                    <option 
                                                    data-charge-type ="{{ $method->charge_type }}" 
                                                    data-min="{{ $method->min_amount }}" data-max="{{ $method->max_amount }}" 
                                                    data-fixed-charge="{{ $method->fix_charge }}" 
                                                    data-percent-charge={{ $method->percent_charge }} 
                                                    value="{{ $method->id }}">{{ $method->title }}</option>
                                                    @empty
                                                    <option 
                                                    data-charge-type ="0" 
                                                    data-min="0" data-max="0" 
                                                    data-fixed-charge="0" 
                                                    data-percent-charge=0 
                                                    value="0">--</option>
                                                    @endforelse
                                                  
                                                </select>
                                                <span class="free">{{ __('fee') }}</span>
                                            </span>
                                        </span>
                                    </li>
                                     
                                    <li>
                                        <span class="icon-area">=</span>
                                        <span class="calculation-divison">
                                            <div class="charge" id="include_charge"></div>
                                            <span class="calculation-payment-select">
                                                {{ __("Amount We'll withdraw") }}
                                            </span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="icon-area"><span class="iconify" data-icon="eva:close-outline" data-inline="false"></span></span>
                                        <span class="calculation-divison">
                                            <div class="charge text-rate">
                                                <span id="rate"></span>
                                                <span class="iconify" data-icon="vaadin:trending-up" data-inline="false"></span></div>
                                            <span class="calculation-payment-select">
                                                {{ __('Guaranteed rate') }}
                                            </span>
                                        </span>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="input-section recepiet">
                            <div class="money-input-field">
                                <input type="number" id="final_amount" placeholder="83,876">
                                <span>{{ __('Recipient Gets') }}</span>
                            </div>
                            <div class="money-currency">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false"><span><img id="country_flag" src="" alt=""> <span id="currency_name"> </span>&nbsp <span class="iconify" data-icon="dashicons:arrow-down-alt2" data-inline="false"></span></span></a>
                                <ul class="dropdown-menu dropdown-menu-end currency" id="currencyList">
                                </ul>
                                <input type="hidden" name="currency_name" id="currency_symbol">
                            </div>
                        </div>
                        <div class="calculation-checkout-btn">
                            <form action="{{ route('home.getstarted') }}" method="post" class="getStartedForm">
                                @csrf
                                <input type="hidden" value="" name="charge">
                                <input type="hidden" value="" name="currency">
                                <input type="hidden" value="" name="amount">
                                <input type="hidden" value="" name="withdrawmethod">
                                <button type="submit" id="getStarted">{{ __('Get Started') }}</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero area end -->

<!-- how it works area start -->
<section>
    <div class="how-it-works-area pt-100 pb-100">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-title text-center">
                        <h4>{{ $titles->hwt_title ?? '' }}</h4>
                    </div>
                    <div class="section-des text-center">
                        <p>{{ $titles->hwt_description ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($howitworks as $data)
                @php 
                    $meta_data = json_decode($data->howitworksMeta->value);
                @endphp
                <div class="col-lg-4">
                    <div class="single-how-it-works text-center">
                        <div class="img-section">
                            <img src="{{ asset($meta_data->image) }}" alt="">
                        </div>
                        <div class="title-section">
                            <h3>{{ $data->title }}</h3>
                        </div>
                        <div class="content-section">
                            <p>{{ $meta_data->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- how it works area end -->

<!-- service area start -->
<section>
    <div class="service-area pt-100 pb-100">
        <div class="container">
            <div class="row">
               
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-title text-center">
                        <h4>{{ $titles->bst_title ?? '' }}</h4>
                    </div>
                    <div class="section-des text-center">
                        <p>{{ $titles->bst_description ?? '' }}</p>
                    </div>
                </div>
            </div>
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
<!-- service area end -->

<!-- counter area start -->
<section>
    @php
        $counter = json_decode($counter->value);
    @endphp
    <div class="counter-area mb-100" style="background-image: url('{{ asset('frontend/assets/img/pattern.png') }}');">
        <div class="container">
            <div class="row counter-main-area">
                <div class="col-lg-3">
                    <div class="single-counter text-center">
                        <div class="counter-number">
                            <h2>{{ $counter->happy_customers_no }}</h2>
                            <p>{{ $counter->happy_customers_title }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-counter text-center">
                        <div class="counter-number">
                            <h2>{{ $counter->year_banking_no }}</h2>
                            <p>{{ $counter->year_banking_title }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-counter text-center">
                        <div class="counter-number">
                            <h2>{{ $counter->our_branches_no }}</h2>
                            <p>{{ $counter->our_branches_title }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-counter text-center">
                        <div class="counter-number">
                            <h2>{{ $counter->successfully_work_no }}</h2>
                            <p>{{ $counter->successfully_work_title }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- counter area end -->

<!-- sponser area start -->
<section>
    <div class="sponser-area pb-100">
        <div class="container">
            <div class="row">
               
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-title text-center">
                        <h4>{{ $titles->tit_title ?? '' }}</h4>
                    </div>
                    <div class="section-des text-center">
                        <p>{{ $titles->tit_description ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($investors as $data)
                @php 
                    $meta_data = json_decode($data->investor->value);
                @endphp
                <div class="col-lg-3">
                    <div class="single-sponser text-center">
                        <div class="sponser-img">
                            <img class="img-fluid" src="{{ asset($meta_data->image) }}" alt="">
                        </div>
                        <div class="sponser-name">
                            <h3>{{ $data->title }}</h3>
                        </div>
                        <div class="sponser-position">
                            <p>{{ $meta_data->position }}</p>
                        </div>
                        <div class="sponser-social-links">
                            <nav>
                                <ul>
                                    <li><a href="{{ $meta_data->facebook_link }}"><span class="iconify" data-icon="brandico:facebook" data-inline="false"></span></a></li>
                                    <li><a href="{{ $meta_data->twitter_link }}"><span class="iconify" data-icon="ant-design:twitter-outlined" data-inline="false"></span></a></li>
                                    <li><a href="{{ $meta_data->linkedin_link }}"><span class="iconify" data-icon="ant-design:linkedin-filled" data-inline="false"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- sponser area end -->

<!-- review area start -->
<section>
    <div class="review-area pb-100">
        <div class="container">
            <div class="row">
               
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-title text-center">
                        <h4>{{ $titles->client_title ?? '' }}</h4>
                    </div>
                    <div class="section-des text-center">
                        <p>{{ $titles->client_description ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($feedbacks as $data)
                @php 
                    $meta_data = json_decode($data->feedback->value);
                @endphp
                <div class="col-lg-6">
                    <div class="single-feedback text-center">
                        <div class="feedback-user-img">
                            <img src="{{ asset($meta_data->client_image) }}" alt="">
                        </div>
                        <div class="feedback-des">
                            <p>{{ $meta_data->client_review }}</p>
                        </div>
                        <div class="feedback-user-name">
                            <h5>{{ $data->title }}</h5>
                        </div>
                        <div class="feedback-user-position">
                            <p>{{ $meta_data->client_position }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- review area end -->

<!-- blog area start -->
<section>
    <div class="blog-area pb-100">
        <div class="container">
            <div class="row">
               
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-title text-center">
                        <h4>{{ $titles->lnt_title ?? '' }}</h4>
                    </div>
                    <div class="section-des text-center">
                        <p>{{  $titles->lnt_description ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($latest_news as $data)
                <div class="col-lg-4">
                    <div class="single-news">
                        <div class="news-img">
                            <a href="{{ route('blog.show',$data->slug) }}"><img class="img-fluid" src="{{ asset($data->thum_image->value) }}" alt=""></a>
                        </div>
                        <div class="news-content">
                            <div class="news-title">
                                <a href="{{ route('blog.show',$data->slug) }}"><h3>{{ $data->title }}</h3></a>
                            </div>
                            <div class="news-des">
                                <p>{{ Str::limit(strip_tags($data->description->value), 200) }}</p>
                            </div>
                            <div class="news-action">
                                <a href="{{ route('blog.show',$data->slug) }}">{{ __('Learn More') }} <span class="iconify" data-icon="bi:arrow-right" data-inline="false"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- blog area end -->
<input type="hidden" id="get_currency_url" value="{{ route('home.getCurrencyList') }}">
@endsection

@push('js')
<script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('backend/admin/assets/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/home.js?v=1.0.0') }}"></script>
@endpush