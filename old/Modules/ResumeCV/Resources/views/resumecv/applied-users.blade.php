@extends('core::layouts.app')
@section('title', __('All Applicants'))
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-4 text-gray-800">@lang('All Applicants') - {{$jobName ?? 'No Applicants'}}</h1>
        <div class="ml-auto d-sm-flex">
          <form method="get" action="" class="navbar-search mr-4">
              <div class="input-group align-items-center row">
                  <div class="col-md-3">
                  From Date <input type="date" class="form-control form-input" name="from_date">
                  </div>
                  
                  <div class="col-md-3">
                  To Date <input type="date" class="form-control form-input" name="to_date">
                  </div>
                  @if(\Request::get('job_id') != null)
                  <input type="hidden" name="job_id" value="{{\Request::get('job_id', '')}}">
                  @endif
                  <div class="col-md-3">
                      Search
                  <input type="text" name="search" value="{{ \Request::get('search', '') }}" class="form-control small" placeholder="@lang('Search full name..')" aria-label="Search" aria-describedby="basic-addon2">
                  </div>
                  <div class="col-md-3 pt-4">
                       <button class="btn btn-primary" type="submit">
                          <i class="fas fa-search fa-sm"></i>
                      </button>
                      
                       <a class="btn btn-primary" href="{{route('settings.appliedJobsExport')}}?job_id={{\Request::get('job_id')}}"}>
                          <i class="fas fa-save fa-sm"></i>
                      </a>
                  </div>
              </div>
          </form>
        </div>        
</div>
<div class="row">
    <div class="col-md-12">
        @if($data->count() > 0)
            <div class="card">
                <div class="table-responsive">
                     <table class="table card-table table-vcenter">
                        <thead class="thead-dark">
                            <tr>
                                <th>@lang('Applied Date')</th>
                                @can('View Name')
                                <th>@lang('Name')</th>
                                @endcan
                                @can('View Gender')
                                <th>@lang('Gender')</th>
                                @endcan
                                @can('View Email')
                                <th>@lang('Email')</th>
                                @endcan
                                @can('View Mobile Number')
                                <th>@lang('Mobile')</th>
                                @endcan
                                @can('View Country')
                                <th>@lang('Country')</th>
                                @endcan
                                @can('View State')
                                <th>@lang('State')</th>
                                @endcan
                                @can('View City')
                                <th>@lang('City')</th>
                                @endcan
                                @can('View City')
                                <th>@lang('Address')</th>
                                @endcan
                                @can('View Degree Level')
                                <th>@lang('Degree Level')</th>
                                @endcan
                                @can('View Degree Type')
                                <th>@lang('Degree Type')</th>
                                @endcan
                                @can('View Functional Area')
                                <th>@lang('Functional Area')</th>
                                @endcan
                                @can('View Experience')
                                <th>@lang('Experience')</th>
                                @endcan
                                @can('View Resume')
                                <th>@lang('Resume')</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>            
                            @foreach($data as $item)
                            <tr>    
                                <td>
                                    @if(isset($item->appliedDate))
                                    {{$item->appliedDate}}
                                    @else
                                    Not Provided
                                    @endif
                                    
                                </td>
                                
                                @can('View Name')
                                <td>
                                    @if(isset($item->name))
                                    {{$item->name}}
                                    @else
                                    Not Provided
                                    @endif
                                </td>
                                @endcan
                                @can('View Gender')
                                <td>
                                    @if(isset($item->gender))
                                    {{{$item->gender}}}
                                    @else
                                    Not Provided
                                    @endif
                                </td>
                                @endcan
                                @can('View Email')
                                 <td>
                                    @if(isset($item->email))
                                    {{$item->email}}
                                    @else
                                    Not Provided
                                    @endif
                                </td>
                                @endcan
                                @can('View Mobile Number')
                                <td>
                                    @if(isset($item->mobile))
                                    {{{$item->mobile}}}
                                    @else
                                    Not Provided
                                    @endif
                                </td>
                                @endcan
                                @can('View Country')
                                <td>
                                    @if(isset($item->country))
                                    {{$item->country}}
                                    @else
                                    Not Provided
                                    @endif
                                </td>
                                @endcan
                                @can('View State')
                                <td>
                                    @if(isset($item->state_name))
                                    {{$item->state_name}}
                                    @else
                                    Not Provided
                                    @endif
                                </td>
                                @endcan
                                @can('View City')
                                <td>
                                    @if(isset($item->city_name))
                                    {{$item->city_name}}
                                    @else
                                    Not Provided
                                    @endif
                                </td>
                                @endcan
                                @can('View City')
                                <td>
                                    @if(isset($item->address))
                                    {{$item->address}}
                                    @else
                                    Not Provided
                                    @endif
                                </td>
                                @endcan
                                @can('View Degree Level')
                                <td>
                                    @if(isset($item->degree_name))
                                    {{$item->degree_name}}
                                    @else
                                    Not Provided
                                    @endif
                                </td>
                                @endcan
                                @can('View Degree Type')
                                <td>
                                    @if(isset($item->degreeType))
                                    {{$item->degreeType}} 
                                    @else
                                    Not Provided 
                                    @endif
                                </td>
                                @endcan
                                @can('View Functional Area')
                                <td>
                                    @if(isset($item->functionalArea))
                                    {{$item->functionalArea}}
                                    @else
                                    Not Provided
                                    @endif
                                </td>
                                @endcan
                                @can('View Experience')
                                 <td>
                                    @if(isset($item->experience_name))
                                    {{$item->experience_name}}
                                    @else
                                    Not Provided
                                    @endif
                                </td>
                                @endcan
                                @can('View Resume')
                                <td>
                                    @if(isset($item->resume_link))
                                    <a href="{{$item->resume_link}}" class="badge badge-success p-2">View Resume</a> <br/>
                                    @elseif(isset($item->resume_pdf))
                                    <a href="{{$item->resume_pdf}}" class="badge badge-success p-2">View Resume</a>
                                    @else
                                    <a href="#" class="badge badge-danger p-2">Not Provided</a>
                                    @endif
                                </td>
                                @endcan
                                
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
      <div class="error mx-auto mb-3"><i class="fas fa-bullhorn"></i></div>
      <p class="lead text-gray-800">@lang('No Applicants Found')</p>
      <p class="text-gray-500">@lang("You don't have any applicants. Please share your jobs for candidates").</p>
    </div>
    @endif
  </div>
</div>

@stop