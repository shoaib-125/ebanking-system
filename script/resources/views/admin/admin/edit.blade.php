@extends('layouts.backend.app')

@push('css')
<link rel="stylesheet" href="{{ asset('Backend/admin/assets/css/select2.min.css') }}">
@endpush

@section('content')
<div class="row">
	<div class="col-lg-9">      
		<div class="card">
			<div class="card-body">
				<h4>{{ __('Edit Admin') }}</h4>
				<form method="post" action="{{ route('admin.admin.update',$user->id) }}" class="basicform">
                    @csrf
                    @method('PUT')
					<div class="pt-20">
						<div class="form-row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label>{{ __('First Name') }}</label>
									<input type="text" class="form-control" placeholder="First Name" required value="{{ $user->first_name }}" name="first_name">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label>{{ __('Middle Name') }}</label>
									<input type="text" class="form-control" placeholder="Middle Name" value="{{ $user->middle_name }}" name="middle_name">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="form-group">
									<label>{{ __('Last Name') }}</label>
									<input type="text" class="form-control" placeholder="Last Name" value="{{ $user->last_name }}" required name="last_name">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="email">{{ __('Email') }}</label>
							<input type="email" value="{{ $user->email }}" required class="form-control" name="email" placeholder="{{ __('Enter email') }}" >
						</div>

						<div class="form-group">
							<label>{{ __('CNIC') }}</label>
							<input type="number" class="form-control" placeholder="CNIC" value="{{ $user->cnic }}"  required name="cnic">
						</div>

						<div class="form-group">
							<label for="email">{{ __('Phone') }}</label>
							<input type="number" value="{{ $user->phone }}" required class="form-control" name="phone" placeholder="{{ __('Enter phone') }}" >
						</div>

						<div class="form-group">
							<label for="password">{{ __('Password') }}</label>
							<input type="password"  class="form-control" name="password" placeholder="{{ __('Enter password') }}" >
						</div>
						<div class="form-group">
							<label for="password">{{ __('Confirm Password') }}</label>
							<input type="password"  class="form-control" name="password_confirmation" placeholder="{{ __('Confirmation password') }}">
						</div>
						
                        <div class="form-group">
                            <label for="roles">{{ __('Assign Roles') }}</label>
                                <select required name="roles[]" id="roles" class="form-control select2" multiple>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                        <label>{{ __('Status') }}</label>
							<select name="status" class="form-control">
								<option value="1" @if($user->status==1) selected @endif>{{ __('Active') }}</option>
								<option value="0"  @if($user->status==0) selected @endif>{{ __('Deactive') }}</option>
							</select>
                        </div>
					</div>
				</div>
			</div>
		</div>
	<div class="col-lg-3">
		<div class="single-area">
			<div class="card">
				<div class="card-body">
					<div class="btn-publish">
						<button type="submit" class="btn btn-primary col-12 basicbtn"><i class="fa fa-save"></i> {{ __('Save') }}</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection

@push('js')
<script src="{{ asset('Backend/admin/assets/js/select2.min.js') }}"></script>
@endpush