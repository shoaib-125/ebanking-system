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
                            <h4>{{ __('Support') }}</h4>
                        </div>
                        <div class="card">
                            <div class="card-body">
                               <form action="{{ route('user.support.store') }}" method="post" class="basicform_with_reset" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">{{ __('Title') }}</label>
                                                <input type="text" name="title" value="{{ old('title') }}" class="@error('title') is-invalid @enderror form-control" placeholder="{{ __('Enter Your Title') }}"> 
                                            </div>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="">{{ __('Comment') }}</label>
                                                <textarea name="comment" cols="30" rows="5" class="@error('description') is-invalid @enderror form-control" placeholder="{{ __('Message') }}"></textarea>
                                            </div>
                                           @error('description')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                         @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 text-center mt-3">
                                            <div class="button-btn">
                                                <button type="submit" class="basicbtn w-100">{{ __('Submit') }}</button>
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

