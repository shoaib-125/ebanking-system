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
                            <h4>{{ __('Transaction Details View') }}</h4>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                @if ($transaction->type == 'otherbank_transfer')
                                @php 
                                $otherbank_info = json_decode($transaction->otherbank->info)
                                @endphp
                                <tr>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td>{{ __('From') }}</td>
                                                <td>{{ __('To') }}</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ __('Account Number') }}: {{  $transaction->otherbank->user->account_number }}</td>
                                                <td>{{ __('Account Number') }}:  {{  $otherbank_info->account_number }}</td>
                                                
                                            </tr>
                                            <tr>
                                                <td>{{ __('Account Holder Name') }} : {{  $transaction->otherbank->user->name }}</td>
                                                <td>{{ __('Account Holder Name') }} : {{  $otherbank_info->account_holder_name }}</td>
                                                
                                            </tr>   
                                            <tr>
                                                <td>{{ __('Branch (to)') }} : {{  $otherbank_info->branch }}</td>
                                                <td></td>
                                            </tr> 
                                        </tbody>
                                    </table>
                                </tr>   
                            @endif
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
                                            <td>{{ $transaction->trxid }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('Amount (USD)') }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('Balance (USD)') }}</td>
                                            <td>{{ $transaction->balance }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('Fee') }}</td>
                                            <td>{{ $transaction->fee }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('Status') }}</td>
                                            <td>{{ $transaction->status == 1 ? 'Success' : 'Pending' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('Info') }}</td>
                                            <td>{{ $transaction->info }}</td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('Type') }}</td>
                                            <td>{{ ucwords(str_replace("_", " ", $transaction->type))}}</td>
                                        </tr>
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