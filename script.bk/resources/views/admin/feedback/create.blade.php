@extends('layouts.backend.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>{{ __('Add New Freedback') }}</h4>
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
            <form method="POST" action="{{ route('admin.feedbacks.store') }}" enctype="multipart/form-data" class="basicform_with_reset">
              @csrf
              <div class="card-body">
                <div class="form-group">
                    <label>{{ __('Client Name') }}</label>
                    <input type="text" class="form-control" placeholder="Name" required name="name">
                </div>
                <div class="form-group">
                    <div class="custom-file mb-3">
                      <input type="file" class="custom-file-input" id="customFile" name="client_image">
                      <label class="custom-file-label" for="customFile"> {{ __('Client Profile Image ( Choose file )') }} </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>{{ __('Review') }}</label>
                    <textarea required name="client_review" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                          <label>{{ __('Client Position') }}</label>
                          <input type="text" class="form-control" placeholder="Client Position" name="client_position">
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label>{{ __('Status') }}</label>
                        <select required name="status" class="form-control">
                            <option>-- {{ __('Select Status') }} --</option>
                            <option value="1">{{ __('Active') }}</option>
                            <option value="0">{{ __('Inactive') }}</option>
                        </select>
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
