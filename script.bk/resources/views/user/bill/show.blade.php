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
                        <div class="card w-50">
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td>{{ __('Request Sender') }}</td>
                                        <td>{{ $payment->sender->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Title') }}</td>
                                        <td>{{ $payment->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Description') }}</td>
                                        <td>{{ $payment->description }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Amount') }}</td>
                                        <td>{{ $payment->amount }} (USD)</td>
                                    </tr>
                                </table>
                               <form class="bill" action="{{ route('user.bill.confirm', $payment->id) }}" method="post">
                                @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="">{{ __('Confirm?') }}</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="1">{{ __('Accept') }}</option>
                                                <option value="0">{{ __('Reject') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 text-center mt-3">
                                            <button type="submit" class="d-block w-100 btn btn-primary">{{ __('Submit') }}</button>
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
