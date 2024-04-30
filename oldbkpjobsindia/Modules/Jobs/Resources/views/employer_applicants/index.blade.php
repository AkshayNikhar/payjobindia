@extends('core::layouts.app')
@section('title', __('All Applicants'))
@section('content')
<style>
.blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
</style>
<div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-4 text-gray-800">@lang('All Jobs Applicants')</h1>
        <div class="ml-auto d-sm-flex">
            <form method="get" action="" class="navbar-search mr-4">
              <div class="input-group">
                  <select name="jobtype">
                      @foreach($jobFilterList as $job)
                      <option value="{{$job->id}}">{{$job->title}}</option>
                      @endforeach
                  </select>
                  <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">
                          <i class="fas fa-filter fa-sm"></i>
                      </button>
                  </div>
              </div>
          </form>
        </div>        
</div>
<div class="row">
    <div class="col-md-12">
        @if($jobs->count() > 0)
            <div class="card">
                <div class="table-responsive">
                     <table class="table card-table table-vcenter">
                        <thead class="thead-dark">
                            <tr>
                                <th>@lang('Job Info')</th>
                                <th>@lang('Applicants Count')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>            
                            @foreach($jobs as $item)
                            <tr>
                                
                                <td>
                                    @if(isset($item->title))
                                    {{$item->title}}
                                    @endif
                                </td>
                              
                               <td>
                                    @if(isset($item->id))
                                    @if(\Carbon\Carbon::parse($item->expiry_date) >= (\Carbon\Carbon::now()))
                                    <div class="p-2 bg-danger text-white text-center" style="height:40px;width:45px;margin-left: -10px;"><h6 class="blink_me">{{\Modules\Jobs\Entities\JobApplicant::where('job_id', $item->id)->count()}}</h6></div>
                                    @else
                                    <div class="row">
                                        <div class="p-2 bg-dark text-white text-center" style="height:40px;width:45px"><h6 class="blink_me">{{\Modules\Jobs\Entities\JobApplicant::where('job_id', $item->id)->count()}}</h6></div>
                                        <div class="ml-2">
                                        Expired on : 
                                        @if(isset($item->expiry_date))
                                        {{$item->expiry_date->format('d/m/y')}}
                                        @endif
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                </td>
                              
                                <td>
                                  <div class="d-flex">
                                        <div class="p-1">
                                            @can('View Applied Jobs')
                                            <a href="{{ route('company.view-job-applied-user').'?job_id='.$item->id }}">
                                              <span class="badge badge-success p-2">@lang('View Applicants')</span>
                                            </a>
                                            @else
                                            <a href="#">
                                              <span class="badge badge-danger p-2">@lang('Inactive')</span>
                                            </a>
                                            @endcan
                                        </div>
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
            {{ $jobs->appends( Request::all() )->links() }}
        </div>
    </div>
    
</div>

<div class="row">
  <div class="col-lg-12">
    @if($jobs->count() == 0)
    <div class="text-center">
      <div class="error mx-auto mb-3"><i class="fas fa-bullhorn"></i></div>
      <p class="lead text-gray-800">@lang('No Applicants Found')</p>
      <p class="text-gray-500">@lang("You don't have any applicants. Please share your jobs for candidates").</p>
    </div>
    @endif
  </div>
</div>

@stop