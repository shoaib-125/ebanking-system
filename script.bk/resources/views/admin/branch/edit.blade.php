@extends('layouts.backend.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>{{ __('Branch Edit') }}</h4>
            </div>
            <form method="POST" action="{{ route('admin.branch.update', $branch_edit->id) }}" class="basicform">
              @csrf
              @method('put')
              @php
                  $info = json_decode($branch_edit->meta->value);
              @endphp
              <div class="card-body">
                <div class="form-row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>{{ __('Branch Name') }}</label>
                        <input type="text" class="form-control" placeholder="Branch Name" required name="branch_name" value="{{ $branch_edit->title }}">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>{{ __('Phone Number') }}</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-phone"></i>
                            </div>
                          </div>
                          <input type="nmuber" class="form-control phone-number" placeholder="Phone Number" required name="phone_nmuber" value="{{ $info->phone_number }}">
                        </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>{{ __('Email Address') }}</label>
                  <input type="email" class="form-control" placeholder="Email Address" required name="email_address" value="{{ $info->email_address }}">
                </div>
                <div class="form-group">
                  <label>{{ __('Address') }}</label>
                  <textarea class="form-control" cols="30" rows="4" placeholder="Address" required name="address">
                     {{ $info->address }}
                  </textarea>
                </div>
                <div class="form-group">
                  <label>{{ __('Postal Code') }}</label>
                  <input type="number" class="form-control" placeholder="Postal Code" required name="post_code" value="{{ $info->post_code }}">
                </div>
                <div class="form-group">
                  <label>{{ __('Description(Optional)') }}</label>
                  <textarea class="form-control" cols="30" rows="4" placeholder="Description(Optional)" name="description">
                      {{ $info->description }}
                  </textarea>
                </div>
                <div class="form-row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>{{ __('Status') }}</label>
                        <select name="status" class="form-control">
                          <option disabled selected>-- {{ __('Select Status') }} --</option>
                          <option {{ ($branch_edit->status == 1)? 'selected': '' }} value="1">{{ __('Active') }}</option>
                          <option {{ ($branch_edit->status == 0)? 'selected': '' }} value="0">{{ __('In-Active') }}</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>{{ __('Is Featured') }}</label>
                        <select name="is_featured" class="form-control">
                          <option disabled selected>-- {{ __('Select Featured') }} --</option>
                          <option {{ ($branch_edit->featured == 1)? 'selected': '' }} value="1">{{ __('Yes') }}</option>
                          <option {{ ($branch_edit->featured == 0)? 'selected': '' }} value="0">{{ __('No') }}</option>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary btn-lg float-right w-100 basicbtn">{{ __('Update') }}</button>
                  </div>
                </div>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection


