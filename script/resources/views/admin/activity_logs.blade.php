@extends('layouts.backend.app')

@section('head')
    @include('layouts.backend.partials.headersection',['title'=>'Activity Logs'])
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped" id="table-2">
                            <thead>
                            <tr>
                                <th>{{ __('Log Name') }}</th>
                                <th>{{ __('Caused By Email') }}</th>
                                <th>{{ __('Caused On Trx') }}</th>
                                <th>{{ __('Amount') }}</th>
                                <th>{{ __('Created At') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($activityLogs as $row)
                                <tr>
                                   
                                    <td>{{ $row->log_name }}</td>
                                    <td>{{ $row->causedBy->email }}</td>
                                    <td>
                                        {{ $row->causedOnTO->trx }}
                                    </td>
                                    <td>{{ $row->causedOnTO->amount }}</td>
                                    <td>{{ $row->created_at }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('backend/admin/assets/js/sweetalert2.all.min.js') }}"></script>
@endpush