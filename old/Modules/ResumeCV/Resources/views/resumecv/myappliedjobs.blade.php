@extends('core::layouts.app')
@section('title', __('ResumeCV'))
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <div>
        <h1 class="h3 mb-4 text-gray-800">My Applied Jobs</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if($data->count() > 0)
            <div class="card">
                <div class="table-responsive">
                     <table class="table card-table table-vcenter text-nowrap">
                        <thead class="thead-dark">
                            <tr>
                                <th>Company Name</th>
                                <th>Job Title</th>
                                <th>Resume</th>
                                <th>Status</th>
                                <th>@lang('Date Info')</th>
                            </tr>
                        </thead>
                        <tbody>            
                            @foreach($data as $item)
                            <tr>
                                <td>
                                    <span><a href="{{url('company'). '/'.$item->c_slug}}">{{ $item->company_name }}</a></span>
                                </td>
                                 <td>
                                    <span><a href="{{url('job'). '/'.$item->slug}}">{{ $item->title ?? '' }}</a></span>
                                </td>
                                <td>
                                    @if(!empty($item->resume_link) || !empty($item->resume_pdf))
                                    <div class="public-link"><small><a href="{{ $item->resume_link ?? URL::to('/') .'/storage/resume_cvs_apply/' .$item->resume_pdf }}" target="_blank" class="text-dark">View Resume</a></small>
                                    </div>
                                    @else
                                    <div class="public-link"><small><a href="#" target="_blank" class="text-danger">No Resume Uploaded</a></small>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <h6 class="text-success">
                                        Successfully Applied
                                    </h6>
                                </td>
                                <td>
                                <div class="small text-muted">
                                        Applied On : {{$item->created_at->format('M j, Y')}}
                                </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        <div class="mt-4">
            {{ $data->appends( Request::all() )->links() }}
        </div>
    </div>
    
</div>

<div class="row">
  <div class="col-lg-12">
    @if($data->count() == 0)
    <div class="text-center">
      <div class="error mx-auto mb-3"><i class="far fa-file-alt"></i></div>
      <p class="lead text-gray-800">You have not applied for job yet</p>
      <p class="text-gray-500">All the jobs you have applied will be shown here</p>
      <a href="{{ url('jobs')}}" class="btn btn-primary">
        <span class="text">Find Jobs</span>
      </a>
    </div>
    @endif
  </div>
</div>

@stop