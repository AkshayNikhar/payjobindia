@extends('core::layouts.app')
@section('title', __('ResumeCV'))
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
        <h1 class="h3 mb-4 text-gray-800">Applied Jobs</h1>
        <div class="d-lg-flex">
          <form method="get" action="" class="navbar-search mr-4">
              <div class="input-group align-items-center row">
                  <div class="col-md-7">
                  Select Company <select name="companyId" class="form-control companyPicker selectpicker" data-live-search="true" required>
                      @if(empty(request()->get('companyId')))
                      <option value="" class="dropdown-item" selected disabled hidden>Choose One</option>
                      @endif
                      @foreach($companies as $company)
                      <option value="{{$company->id}}" {{ (request()->get('companyId') == $company->id) ? 'selected' : ''}} class="dropdown-item">{{$company->company_name}}</option>
                      @endforeach
                  </select>
                  </div>
                  <div class="col-md-2">
                      Search <button class="btn btn-primary" type="submit">
                          <i class="fas fa-search fa-sm"></i>
                      </button>
                  </div>
                  <div class="col-md-3">
                      Clear Filters <a class="btn btn-primary" href="{{route('settings.appliedjobs')}}">
                          <i class="fas fa-times fa-sm"></i>
                      </a>
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
                                    {{$item->title}} - ({{$item->company_name}})
                                    <br/>
                                    Expires on : {{$item->expiry_date}}
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
                                            <a href="{{ route('settings.view-job-applied').'?job_id='.$item->id }}">
                                              <span class="badge badge-success p-2">@lang('View Applicants')</span>
                                            </a>
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
      <div class="error mx-auto mb-3"><i class="far fa-file-alt"></i></div>
      <p class="lead text-gray-800">No Applied Jobs Yet</p>
      <p class="text-gray-500">All the jobs user has applied will be shown here</p>
    </div>
    @endif
  </div>
</div>
@push('scripts')
<script>
$(document).ready(function () {
  $('.companyPicker').selectpicker();
});
</script>
@endpush
@stop