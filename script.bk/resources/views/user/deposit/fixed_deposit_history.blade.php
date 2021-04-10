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
                            <h4>{{ __('Fixed Deposit History') }}</h4>
                        </div>
                        @if (Session::has('success'))
                           <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h5>{{ __('Fixed Deposit History') }}</h5>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">{{ __('Package') }}</th>
                                        <th scope="col">{{ __('Amount') }}</th>
                                        <th scope="col">{{ __('Return Percent') }}</th>
                                        <th scope="col">{{ __('Return Total') }}</th>
                                        <th scope="col">{{ __('Start Date') }}</th>
                                        <th scope="col">{{ __('Return Date') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($fdr_history as $row)
                                      <tr>
                                        <td>{{ $row->fdrplan->title }}</td>
                                        <td>{{ $row->amount }}</td>
                                        <td>{{ $row->return_percent }}</td>
                                        <td>{{ $row->return_total }}</td>
                                        <td>{{ $row->created_at->toDateString() }}</td>
                                        <td>{{ Carbon\Carbon::parse($row->return_date)->toDateString() }}</td>
                                        @if($row->status == 2)
                                        <td>
                                            <span class="badge bg-info">{{ __('Waiting') }}</span>
                                        </td>
                                        @endif
                                        @if($row->status == 1)
                                        <td>
                                            <span class="badge bg-success">{{ __('Complete') }}</span>
                                        </td>
                                        @endif
                                        @if($row->status == 0)
                                        <td>
                                            <span class="badge bg-warning">{{ __('Rejected') }}</span>
                                        </td>
                                        @endif
                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    {{ $fdr_history->links('vendor.pagination.bootstrap-4') }}
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