@extends('layouts.backend.app')

@push('css')
<link rel="stylesheet" href="{{ asset('Backend/admin/assets/css/select2.min.css') }}">
@endpush

@section('content')
<div class="row">
	<div class="col-lg-9">      
		<div class="card">
			<div class="card-body">
				<h4>{{ __('Add Admin') }}</h4>
				<form method="post" action="{{ route('admin.admin.store') }}" class="basicform_with_reset">
					@csrf
					<div class="pt-20">

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


						<div class="form-group">
							<label>{{ __('Email') }}</label>
							<input type="email" class="form-control" placeholder="Email Address" required name="email">
						</div>


						<div class="form-group">
							<label>{{ __('CNIC') }}</label>
							<input type="number" class="form-control" placeholder="CNIC" required name="cnic">
						</div>

						
						<div class="form-group">
							<label for="email">{{ __('Phone') }}</label>
							<input type="number" required class="form-control" name="phone" placeholder="Enter phone" >
						</div>

						<div class="form-group">
							<label for="password">{{ __('Password') }}</label>
							<input type="password" required class="form-control" name="password" placeholder="Enter password" >
						</div>
						<div class="form-group">
							<label for="password">{{ __('Confirm Password') }}</label>
							<input type="password" required class="form-control" name="password_confirmation" placeholder="Enter password" >
						</div>

					     <div class="form-group">
                            <label >{{ __('Assign Roles') }}</label>
                            <select required name="roles[]" id="roles" class="form-control select2" multiple>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
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