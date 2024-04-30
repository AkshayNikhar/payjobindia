@extends('core::layouts.app')
@section('title', __('All Jobs'))
@section('content')
<style>
.jobs_table {
  border-collapse: collapse;
  width: 100%;
}

.jobs_table > td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

.jobs_table > tr:nth-child(even) {
  background-color: #dddddd;
}
.blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes  blinker {
  50% {
    opacity: 0;
  }
}

</style>
<div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-4 text-gray-800">@lang('All Jobs')</h1>
        <div class="ml-auto d-sm-flex">
          <form method="get" action="" class="navbar-search mr-4">
              <div class="row">
                  @if(\Request::get('companyId') != null)
                  <input name="companyId" value="{{\Request::get('companyId', '')}}" type="hidden">
                  @endif
                  <div class="input-group col-md-4 align-items-center ">
                  From Date <input type="date" class="form-control form-input" name="from_date">
                  </div>
                  <div class="input-group col-md-4 align-items-center ">
                  To Date <input type="date" class="form-control form-input" name="to_date">
                  </div>
                  <div class="row">
                  <div class="input-group ml-2">
                  <input type="text" name="search" value="{{ \Request::get('search', '') }}" class="form-control small" placeholder="@lang('Search Job title..')" aria-label="Search" aria-describedby="basic-addon2">
                      <button class="btn btn-primary" type="submit">
                          <i class="fas fa-search fa-sm"></i>
                      </button>
                  </div>
                  </div>
              </div>
          </form>
          <a href="{{ route('settings.jobs.create') }}" class="btn btn-success mr-2">
            <i class="fas fa-plus"></i> @lang('Create job')
          </a>
          <a href="{{url('settings/admin-exports/jobs/export')}}" class="btn btn-primary"><i class="fas fa-download"></i> Export</a>
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
                                <th>@lang('Company Info')</th>
                                <th>@lang('Job Info')</th>
                                <th>@lang('City')</th>
                                <th>@lang('Info')</th>
                                <th>@lang('Posted On')</th>
                                <th>@lang('Applicants')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>            
                            @foreach($data as $item)
                            <tr>
                               <td class="align-middle">
                                   <h6>@lang('Company Name'): {{$item->company->company_name}}</h6>
                                   <h6>@lang('Email'): {{$item->company->company_email}}</h6>
                               </td>
                               <td class="align-middle">
                                <h6>@lang('Job Tile'): {{$item->title}}</h6>
                                <h6>{{$item->functional_area->name}}</h6>
                               </td>
                               <td class="align-middle">
                                <h6>{{$item->city->name}}</h6>
                               </td>
                               <td class="align-middle">
                                    @if($item->is_active)
                                        <span class="small text-success"><i class="fas fa-check-circle"></i> @lang('Active')</span>
                                    @else
                                        <span class="small text-danger"><i class="fas fa-times-circle"></i> @lang('No Active')</span>
                                    @endif
                                    <br>
                                    @if($item->is_featured)
                                        <span class="small text-primary"><i class="fas fa-check-circle"></i> @lang('Featured')</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    {{$item->created_at}}
                                </td>
                                <td>
                                    <div class="row align-items-center">
                                    <div class="col-md-5 d-none">
                                        <small>Today :</small>
                                    </div>
                                     <div class="col-md-2">
                                         <a href="{{ route('settings.view-job-applied').'?job_id='.$item->id.'&filterDate='.\Carbon\Carbon::today() }}"><div class="p-2 bg-success text-white text-center" style="height:35px;width:35px">
                                        <small class="blink_me">{{Modules\Jobs\Entities\JobApplicant::where('job_id', $item->id)->whereDate('job_applicants.created_at', '=', \Carbon\Carbon::today())->count()}}</small>
                                    </div></a>
                                     </div>
                                    </div>
                                    <!--<br/>-->
                                    <!--<div class="row align-items-center">-->
                                    <!--<div class="col-md-5 d-none">-->
                                    <!--    <small>Yesterday :</small>-->
                                    <!--</div>-->
                                    <!-- <div class="col-md-2">-->
                                    <!--     <a href="{{ route('settings.view-job-applied').'?job_id='.$item->id.'&filterDate='.\Carbon\Carbon::yesterday() }}"><div class="p-2 bg-primary text-white text-center" style="height:35px;width:35px">-->
                                    <!--    <small class="blink_me">{{Modules\Jobs\Entities\JobApplicant::where('job_id', $item->id)->whereDate('job_applicants.created_at', '=', \Carbon\Carbon::yesterday())->count()}}</small>-->
                                    <!--</div></a>-->
                                    <!-- </div>-->
                                    <!--</div>-->
                                    <!--<br/>-->
                                    <!--<div class="row align-items-center">-->
                                    <!--<div class="col-md-5 d-none">-->
                                    <!--    <small>Regular :</small>-->
                                    <!--</div>-->
                                    <!-- <div class="col-md-2">-->
                                    <!--     <a href="{{ route('settings.view-job-applied').'?job_id='.$item->id}}"><div class="p-2 bg-danger text-white text-center" style="height:35px;width:35px">-->
                                    <!--    <small class="blink_me">{{Modules\Jobs\Entities\JobApplicant::where('job_id', $item->id)->count()}}</small>-->
                                    <!--</div></a>-->
                                    <!-- </div>-->
                                    <!--</div>-->
                                </td>
                                <td>
                                <div class="btn-group">
                                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-h"></i>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-top">
                                    <a href="{{ route('settings.jobs.edit', $item) }}" class="dropdown-item">@lang('Edit')</a>
                                    <form method="post" action="{{ route('settings.jobs.destroy', $item->id) }}" onsubmit="return confirm('@lang('Confirm delete?')');">
                                      @csrf
                                      @method('DELETE')
                                        <button type="submit" class="dropdown-item">@lang('Delete')</button>
                                    </form>
                                    <button onclick="generateImage('{{$item->title}}', '{{$item->company->company_name}}', '{{$item->career_level->name ?? ''}}', '{{$item->city->name}}', '{{$item->degree_level->name}}', '{{$item->job_experience->name}}', '{{$item->salary_from}}','{{$item->salary_to}}', '{{$item->gender->name}}', '{{$item->salary_currency}}', '{{$item->functional_area->name}}', '{{$item->job_type->name}}', '{{$item->vacancies}}', '{{$item->expiry_date}}', '{{$item->work_mode ?? ''}}')" class="dropdown-item">Image</button>
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
            {{ $data->appends( Request::all() )->links() }}
        </div>
    </div>
    
</div>

<div class="row">
  <div class="col-lg-12">
    @if($data->count() == 0)
    <div class="text-center">
      <div class="error mx-auto mb-3"><i class="fas fa-briefcase"></i></div>
      <p class="lead text-gray-800">@lang('No Jobs Found')</p>
      <p class="text-gray-500">@lang("You don't have any job").</p>
      <a href="{{ route('settings.jobs.create')}}" class="btn btn-primary">
        <span class="text">@lang('New Job')</span>
      </a>
    </div>
    @endif
  </div>
</div>

@stop