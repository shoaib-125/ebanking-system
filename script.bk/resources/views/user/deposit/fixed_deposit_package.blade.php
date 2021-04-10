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
                            <h4>{{ __('Fixed Deposit Package') }}</h4>
                        </div>
                        @if (Session::has('success'))
                           <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                        <div class="section-body">
                           <div class="edeposit-area">
                               <div class="row">
                                   @foreach ($fdr_plans as $row)
                                  
                                   <div class="col-lg-4">
                                       <div class="single-deposit text-center mb-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="deposit-name">
                                                        <h3>{{ ucwords($row->title) }}</h3>
                                                    </div>
                                                    <div class="requirments-menu">
                                                         <nav>
                                                             <ul>
                                                                 <li>{{ __('Limit') }}: ${{ $row->min_amount }} - ${{ $row->max_amount }}</li>
                                                                 <li>{{ __('Duration') }}: {{ $row->duration }} {{ __('Days') }}</li>
                                                                 <li>{{ __('Return') }}: {{ $row->percent_return }}%</li>
                                                             </ul>
                                                         </nav>
                                                    </div>
                                                    <div class="desposit-action">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $row->id }}">{{ __('Deposit Now') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                       </div>
                                   </div>
                                <!-- Modal -->
                                <div class="modal fade model_hide" id="exampleModal{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Deposit Package') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('user.fixed.deposit.request', $row->id) }}" novalidate="" class="basicform">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email">{{ __('Enter Amount') }}</label>
                                                <input type="number" class="form-control" name="amount" tabindex="1" required autofocus placeholder="{{ __('Amount') }}">
                                            </div>
                                            <div class="form-group">
                                                <div class="button-btn">
                                                    <button type="submit" class="w-100 basicbtn" tabindex="4">
                                                        {{ __('Submit') }}
                                                    </button>
                                                </div>
                                                </div>
                                            </form>
                                        </div>
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
    </div>
</section>
<!-- dahboard area end -->
@endsection

@push('js')
    <script>
        "use strict";
        function success(data) {
            $(".model_hide").modal('hide');
        }
    </script>
@endpush