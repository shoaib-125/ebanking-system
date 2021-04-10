@extends('layouts.backend.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>{{ __('Add New Investor') }}</h4>
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
            <form method="POST" action="{{ route('admin.users.store') }}" class="basicform_with_reset">
              @csrf
              <div class="card-body">
                <div class="form-row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label>{{ __('First Name') }}</label>
                        <input type="text" class="form-control" placeholder="First Name" required name="first_name">
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>{{ __('Last Name') }}</label>
                            <input type="text" class="form-control" placeholder="Last Name" required name="last_name">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>{{ __('Email') }}</label>
                            <input type="email" class="form-control" placeholder="Email Address" required name="email">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>{{ __('Date Of Birth') }}</label>
                            <input type="text" class="form-control" placeholder="Date Of Birth" required name="dob">
                        </div>
                    </div>

                </div>
                  <div class="form-row">
                      <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                              <label>{{ __('CNIC') }}</label>
                              <input type="number" class="form-control" placeholder="CNIC" required name="cnic">
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                              <label>{{ __('Mother Name') }}</label>
                              <input type="text" class="form-control" placeholder="Mother Name" required name="mother_name">
                          </div>
                      </div>

                  </div>
                  <div class="form-row">
                      <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                              <label>{{ __('Address') }}</label>
                              <input type="text" class="form-control" placeholder="Address" required name="address">
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                              <label>{{ __('Security Question') }}</label>
                              <input type="text" class="form-control" placeholder="Security Question" required name="security_question">
                          </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label>{{ __('Security Answer') }}</label>
                              <input type="text" class="form-control" placeholder="Security Answer" required name="answer">
                          </div>
                      </div>

                  </div>

                <div class="form-row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                          <label>{{ __('Phone') }}</label>
                          <input type="text" class="form-control" placeholder="Phone" required name="phone_number">
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label>{{ __('Password') }}</label>
                        <input type="password" class="form-control" placeholder="Password" required name="password">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  <div class="custom-file mb-3">
                    <label>{{ __('Status') }}</label>
                    <select required name="status" class="form-control">
                      <option>-- {{ __('Select Status') }} --</option>
                      <option value="1">{{ __('Active') }}</option>
                      <option value="0">{{ __('Inactive') }}</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <div class="control-label">{{ __('Email verify status') }}</div>
                      <label class="custom-switch mt-2">
                        <input type="checkbox" name="email_verified_at" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">{{ __('verify') }}</span>
                      </label>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                      <div class="control-label">{{ __('Phone verify status') }}</div>
                      <label class="custom-switch mt-2">
                        <input type="checkbox" name="phone_verified_at" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">{{ __('verify') }}</span>
                      </label>
                    </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary btn-lg float-right w-100 basicbtn">{{ __('Submit') }}</button>
                  </div>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection

