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
                            <div class="row">
                                <div class="col-md-6"><h4>{{ __('Supports') }}</h4></div>
                                <div class="col-md-6">
                                    <div class="button-btn">
                                        <a class="float-end" href="{{ route('user.support.create') }}">{{ __('Add New Support') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(Session::has('message'))
                        <p class="alert alert-danger">
                            {{ Session::get('message') }}
                        </p>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Ticket No') }}</th>
                                        <th scope="col">{{ __('Title') }}</th>
                                        <th scope="col">{{ __('Comment') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Date / Time') }}</th>
                                        <th scope="col">{{ __('Details') }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($supports as $key => $support)
                                      <tr>
                                           <td>{{ $i++ }}</td>
                                           <td>{{ $support->ticket_no }}</td>
                                           <td>{{ Str::limit($support->title,15) }}</td>
                                           <td>{{ Str::limit($support->meta[0]->comment,15) ?? '' }}</td>
                                           <td>{{ $support->status == 1 ? 'Active' : ($support->status == 2 ? 'Pending' : 'Inactive') }}</td>
                                           <td>{{  $support->created_at->isoFormat('LL') }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('user.support.show', $support->id) }}">{{ __('View') }}</a>
                                            </td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    {{ $supports->links('vendor.pagination.bootstrap-4') }}
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