@extends('core::layouts.app')
@section('title', __('Users'))
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">@lang('Users')</h1>
    <div class="ml-auto d-sm-flex">
    <form method="get" action="" class="navbar-search mr-4">
              <div class="input-group align-items-center">
                  <option value="" selected disabled hidden>Choose here</option>
                   <input type="text" name="search" value="{{ \Request::get('search', '') }}" class="form-control small mr-1" placeholder="@lang('Search User..')" aria-label="Search" aria-describedby="basic-addon2">
                  Role
                  <select name="role" class="form-control ml-1 mr-1">
                      <option value="" selected disabled hidden>Choose here</option>
                      <option value="admin" {{ (request()->get('role') == 'admin') ? 'selected' : ''}}>admin</option>
                      <option value="candidate" {{ (request()->get('role') == 'candidate') ? 'selected' : ''}}>candidate</option>
                      <option value="employer" {{ (request()->get('role') == 'employer') ? 'selected' : ''}}>employer</option>
                  </select>
                  City
                  <select name="city" class="form-control ml-1 mr-1">
                      <option value="" selected disabled hidden>Choose</option>
                      @foreach($cities as $city)
                      <option value="{{$city->id}}" {{ (request()->get('city') == $city->id) ? 'selected' : ''}}>{{$city->name}}</option>
                      @endforeach
                  </select>
                  From Date
                  <input type="date" class="form-control" name="fromDateFilter">
                  To Date
                  <input type="date" class="form-control" name="toDateFilter">
                  <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">
                          <i class="fas fa-search fa-sm"></i>
                      </button>
                  </div>
              </div>
    </form>
    <a href="{{ route('settings.users.create') }}" class="btn btn-sm btn-success shadow-sm mr-2"> @lang('Create')</a>
    <a class="btn btn-primary btn-sm" href="{{route('settings.userExport').'?'.\Request::getQueryString()}}">Export</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if($data->count() > 0)
        <div class="card mb-3">
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead class="thead-dark">
                        <tr>
                            <th>@lang('Name')</th>
                            <th>@lang('E-mail')</th>
                            <th>@lang('Phone')</th>
                            <th>@lang('State')</th>
                            <th>@lang('City')</th>
                            <th>@lang('Role')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>
                                <a href="{{ route('settings.users.edit', $item) }}">{{ $item->name }}</a>
                            </td>
                            <td>
                                {{ $item->email }}
                            </td>
                            <td>
                                {{ $item->mobile }}
                            </td>
                            <td>
                                {{ $item->stateName }}
                            </td>
                            <td>
                                {{ $item->cityName }}
                            </td>
                            <td>
                                {{ $item->role }}
                            </td>
                            <td>
                                     <div class="d-flex">
                                        <div class="p-1 ">
                                             <a href="{{ route('settings.users.edit', $item) }}" class="btn btn-sm btn-primary">@lang('Edit')</a>
                                        </div>
                                        
                                        <!--<div class="p-1 ">-->
                                        <!--      <form method="post" action="{{ route('settings.users.destroy', $item) }}" onsubmit="return confirm('@lang('Confirm delete?')');">-->
                                        <!--        @csrf-->
                                        <!--        @method('DELETE')-->
                                        <!--        <button type="submit" class="btn btn-sm btn-danger">-->
                                        <!--        <i class="fe fe-trash"></i> @lang('Delete')-->
                                        <!--        </button>-->
                                        <!--    </form>-->
                                        <!--</div>-->
                                        
                                        @if($item->role == 'employer')
                                        @if($item->company != null)
                                        <div class="p-1 ">
                                             <a href="{{route('settings.jobs.index')}}?companyId={{$item->company->id}}" class="btn btn-sm btn-secondary">@lang('View Jobs')</a>
                                        </div>
                                        @endif
                                        @endif
                                        
                                        @if($item->blocked)
                                        <div class="p-1 ">
                                             <a href="{{ route('settings.users.unblock') }}?userid={{$item->id}}" class="btn btn-sm btn-success">@lang('Un-block')</a>
                                        </div>
                                        @else
                                        <div class="p-1 ">
                                             <a href="{{ route('settings.users.block') }}?userid={{$item->id}}" class="btn btn-sm btn-danger">@lang('Block')</a>
                                        </div>
                                        @endif
                                    </div>
                                   
                                    
                                </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
        {{ $data->appends( Request::all() )->links() }}
        @if($data->count() == 0)
        <div class="alert alert-primary text-center">
            <i class="fe fe-alert-triangle mr-2"></i> @lang('No users found')
        </div>
        @endif
    </div>
    
</div>
@stop