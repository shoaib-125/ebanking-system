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
                            <h4>{{ __('Loan History') }}</h4>
                        </div>
                        @if (Session::has('success'))
                           <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h5>{{ __('Loan Information') }}</h5>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th scope="col">{{ __('Package') }}</th>
                                        <th scope="col">{{ __('Days') }}</th>
                                        <th scope="col">{{ __('Charge') }}</th>
                                        <th scope="col">{{ __('Amount') }}</th>
                                        <th scope="col">{{ __('Total') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Return') }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($loan_history as $key => $row)
                                    @php
                                        $total = $row->amount + $row->charge;
                                    @endphp
                                      <tr>
                                        <td>{{ $row->user->name }}</td>
                                        <td>{{ $row->loanplan->name }}</td>
                                        <td>{{ $row->days }}</td>
                                        <td>{{ $row->charge }}</td>
                                        <td>{{ $row->amount }}</td>
                                        <td>{{ $total }}</td>
                                        @if($row->status == 1)
                                        <td>
                                            <span class="badge bg-info">{{ __('Approved') }}</span>
                                        </td>
                                        @endif
                                        @if($row->status == 2)
                                        <td>
                                            <span class="badge bg-danger">{{ __('Pending') }}</span>
                                        </td>
                                        @endif
                                        @if($row->status == 0)
                                        <td>
                                            <span class="badge bg-danger">{{ __('Rejected') }}</span>
                                        </td>
                                        @endif
                                        @if($row->status == 3)
                                        <td>
                                            <span class="badge bg-primary">{{ __('Loan Returned') }}</span>
                                        </td>
                                        @endif
                                        <td>
                                         <a class="btn btn-primary btn-sm delete-confirm {{ $row->status == 1 ? "" : "disabled"  }}" href="javascript:void(0)" data-id={{ $row->id }}>{{ __('Loan Return') }}</a>
                                        </td>
                                        <!-- Delete Form -->
                                        <form class="d-none" id="delete_form_{{ $row->id }}" action="{{ route('user.return.loan', $row->id) }}" method="GET">
                                        </form>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    {{ $loan_history->links('vendor.pagination.bootstrap-4') }}
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
<script src="{{ asset('backend/admin/assets/js/sweetalert2.all.min.js') }}"></script>
@endpush