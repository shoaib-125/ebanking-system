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
                            <h4>{{ __('Deposit Details View') }}</h4>
                        </div>
                        <div class="card">
                            <div class="card-body"> 
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Title') }}</th>
                                            <th>{{ __('Details') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ __('Trx ID') }}</td>
                                            <td>{{ $edeposit->trx }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Amount (USD)') }}</td>
                                            <td>{{ $edeposit->amount }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Fee') }}</td>
                                            <td>{{ $edeposit->charge }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Status') }}</td>
                                            <td>{{ $edeposit->status == 1 ? 'Success' : ($edeposit->status == 2 ? 'Pending' : 'Rejected') }}
                                            </td>
                                        </tr>
                                        @if ($edeposit->meta)
                                            @php  
                                              $deposit_info = json_decode($edeposit->meta->value)
                                            @endphp

                                            <tr>
                                                <td>{{ __('Currency') }}</td>
                                                <td>{{ $deposit_info->currency }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Rate') }}</td>
                                                <td>{{ $deposit_info->rate }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('Screenshots') }}**</td>
                                                <td>
                                                    <img width="100" src="{{ asset($deposit_info->image) }}" alt="">
                                                </td>
                                            </tr>
                                           
                                            <tr>
                                                <td>{{ __('Comments') }}**</td>
                                                <td>{{ $deposit_info->comment }}</td>
                                            </tr>
                                        @endif  
                                    </tbody>
                                </table>
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