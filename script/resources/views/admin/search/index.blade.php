@extends('layouts.backend.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>{{ __('Search') }}</h4>
            </div>
            @if ($errors->any())
              <div class="alert alert-danger">
                  <strong>{{ __('Whoops!') }}</strong> {{ __('There were some problems with your input.') }}<br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif


            <div class="card-body">
                <div class="form-row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <form method="POST" action="{{ route('admin.search') }}" class="">
                            @csrf
                            <div class="form-row">
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="form-group">
                                        <label>{{ __('Transaction ID') }}</label>
                                        <input type="text" class="form-control" placeholder="{{ __('Transaction ID') }}" required name="filter" @if(isset($transaction))value="{{ $transaction->trxid }}"@endif>
                                        <input type="hidden" name="form_type" value="trans_id">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg mt-md-4 mt-lg-4 float-right w-100 basicbtn">{{ __('Search') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="POST" action="{{ route('admin.search') }}" class="">
                            @csrf
                            <div class="form-row">
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="form-group">
                                        <label>{{ __('Account number') }}</label>
                                        <input type="text" class="form-control" placeholder="{{ __('Account number') }}" required name="filter" @if(isset($transaction))value="{{ $transaction->user->account_number }}"@endif>
                                        <input type="hidden" name="form_type" value="acc_no">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg mt-md-4 mt-lg-4 float-right w-100 basicbtn">{{ __('Search') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="POST" action="{{ route('admin.search') }}" class="">
                            @csrf
                            <div class="form-row">
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="form-group">
                                        <label>{{ __('Email') }}</label>
                                        <input type="text" class="form-control" placeholder="{{ __('Email') }}" required name="filter" @if(isset($transaction))value="{{ $transaction->user->email }}"@endif>
                                        <input type="hidden" name="form_type" value="email">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg mt-md-4 mt-lg-4 float-right w-100 basicbtn">{{ __('Search') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <form method="POST" action="{{ route('admin.search') }}" class="">
                            @csrf
                            <div class="form-row">
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="form-group">
                                        <label>{{ __('CNIC') }}</label>
                                        <input type="text" class="form-control" placeholder="{{ __('CNIC') }}" required name="filter" @if(isset($transaction))value="{{ $transaction->user->cnic }}"@endif>
                                        <input type="hidden" name="form_type" value="cnic">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg mt-md-4 mt-lg-4 float-right w-100 basicbtn">{{ __('Search') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="POST" action="{{ route('admin.search') }}" class="">
                            @csrf
                            <div class="form-row">
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="form-group">
                                        <label>{{ __('Mobile number') }}</label>
                                        <input type="text" class="form-control" placeholder="{{ __('Mobile number') }}" required name="filter" @if(isset($transaction))value="{{ $transaction->user->phone }}"@endif>
                                        <input type="hidden" name="form_type" value="phone_no">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg mt-md-4 mt-lg-4 float-right w-100 basicbtn">{{ __('Search') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @if(isset($transaction))
                        <div class="form-row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <a class="btn btn-primary btn-lg mt-md-4 mt-lg-4 float-right w-100 basicbtn" style="margin-left: 5px; margin-right: 5px;" href="{{ route('admin.user.login', $transaction->user_id) }}">{{ __('Login as User') }}</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>


            <div class="card-body">
                <div class="form-row">
                    <div class="col-lg-2 col-md-2 col-sm-12">
                        <div class="form-group">
                            <label>{{ __('Transaction Type') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('Transaction Type') }}" readonly @if(isset($transaction))value="{{ $transaction->type }}"@endif>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12">
                        <div class="form-group">
                            <label>{{ __('Date') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('Date') }}" readonly @if(isset($transaction))value="{{ \Illuminate\Support\Facades\Date::createFromFormat('Y-m-d H:i:s', $transaction->created_at)->format('d M Y')}}"@endif>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12">
                        <div class="form-group">
                            <label>{{ __('Time') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('Time') }}" readonly @if(isset($transaction))value="{{ \Illuminate\Support\Facades\Date::createFromFormat('Y-m-d H:i:s', $transaction->created_at)->format('h:i:s') }}"@endif>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>{{ __('Status') }}</label>
                                    <input type="text" class="form-control" placeholder="{{ __('Status') }}" readonly @if(isset($transaction))value="@if($transaction->status == 0) Rejected @elseif($transaction->status == 1) Approved @elseif($transaction->status == 2) Pending @endif"@endif>
                                </div>
                            </div>
                            @if(isset($transaction) && $transaction->status == 2)
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="form-group">
                                    <a class="btn btn-success btn-lg mt-md-4 mt-lg-4 float-right w-100 basicbtn approve-confirm" href="javascript:void(0)" data-id={{ $transaction->id }}>{{ __('Approve') }}</a>
                                    <form class="d-none" id="approve_form_{{ $transaction->id }}" action="{{ route('admin.bank.transaction.update', $transaction->id) }}" method="POST">
                                        <input type="hidden" name="update_approve" value="true"/>
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="form-group">
                                    <a class="btn btn-danger btn-lg mt-md-4 mt-lg-4 float-right w-100 basicbtn delete-confirm" href="javascript:void(0)" data-id={{ $transaction->id }}>{{ __('Reject') }}</a>
                                    <!-- Delete Form -->
                                    <form class="d-none" id="delete_form_{{ $transaction->id }}" action="{{ route('admin.bank.transaction.update', $transaction->id) }}" method="POST">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>{{ __('Amount') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('Amount') }}" readonly @if(isset($transaction))value="{{ $transaction->amount }}"@endif>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>{{ __('Fees') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('Fees') }}" readonly @if(isset($transaction))value="{{ $transaction->fee }}"@endif>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>{{ __('From Account') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('From Account') }}" readonly>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>{{ __('To Account') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('To Account') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>{{ __('Transaction Summary') }}</label>
                            <textarea class="form-control" placeholder="{{ __('Transaction Summary') }}" readonly>@if(isset($transaction)){{ $transaction->info }}@endif</textarea>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
@endsection

