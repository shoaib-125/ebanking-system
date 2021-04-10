@extends('layouts.backend.app')

@section('head')
@include('layouts.backend.partials.headersection',['title'=>'Bank Transaction Requests'])
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
            <div class="row mb-4">
              <div class="col-lg-4">
                <form method="get" action="{{ route('admin.bank_transaction_request.search') }}">
                  <div class="input-group mb-2 col-12">
                     <input type="text" class="form-control" placeholder="Search..." name="q" autocomplete="off" value="">
                     <select class="form-control" name="type">
                        <option value="account_number">{{ __('Search By Account Number') }}</option>
                        <option value="trx">{{ __('Search By Trx') }}</option>
                     </select>
                     <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i>
                        </button>
                     </div>
                  </div>
                </form>
              </div>
              <div class="col-lg-8">
                <form method="get" action="{{ route('admin.bank_transaction_request.search') }}">
                <input type="hidden" name="type" value="duration">
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group row">
                        <div class="col-lg-3 d-flex align-items-center">
                          {{ __('Start Date') }}
                       </div>
                       <div class="col-lg-9">
                          <input type="date" class="form-control" name="start_date">
                       </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group row">
                        <div class="col-lg-3 d-flex align-items-center">
                          {{ __('End Date ') }}
                       </div>
                       <div class="col-lg-9 input-group">
                          <input type="date" class="form-control" name="end_date">
                          <div class="input-group-append">                                            
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                         </div>
                       </div>
                      </div>
                    </div>
                </div>
              </form>
            </div>
              <div class="col-md-12">
                @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
              </div>
            <div class="table-responsive">
                <table class="table table-striped" id="table-2">
                  <thead>
                    <tr>
                      <th>{{ __('User') }}</th>
                      <th>{{ __('Account') }}</th>
                      <th>{{ __('Trx') }}</th>
                      <th>{{ __('Bank') }}</th>
                      <th>{{ __('Amount (USD)') }}</th>
                      <th>{{ __('Date') }}</th>
                      <th>{{ __('Status') }}</th>
                      <th>{{ __('Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($transaction_request as $row)
                    <tr>
                      <td>{{ $row->user->name }}</td>
                      <td>{{ $row->user->account_number }}</td>
                      <td>{{ $row->transaction->trxid }}</td>
                      <td>{{ $row->bank->name }}</td>
                      <td>{{ $row->amount/$row->currency_rate }}</td>
                      <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                      <td>
                        @if($row->status == 2)
                        <span class="badge badge-danger">{{ __('Pending') }}</span>
                        @endif
                      </td>
                      <td>
                        <div class="dropdown d-inline">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{ __('Action') }}
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item has-icon" href="{{ route('admin.bank.transaction.approved',$row->id) }}"><i class="fa fa-eye"></i>{{ __('Approved') }}</a>
                            <a class="dropdown-item has-icon" href="{{ route('admin.bank_transaction_view', $row->id) }}"><i class="fa fa-eye"></i>{{ __('View') }}</a>
                            <a class="dropdown-item has-icon delete-confirm" href="javascript:void(0)" data-id={{ $row->id }}><i class="fa fa-trash"></i>{{ __('Rejected') }}</a>
                            <!-- Delete Form -->
                            <form class="d-none" id="delete_form_{{ $row->id }}" action="{{ route('admin.bank.transaction.rejected', $row->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $transaction_request->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script src="{{ asset('backend/admin/assets/js/sweetalert2.all.min.js') }}"></script>
@endpush