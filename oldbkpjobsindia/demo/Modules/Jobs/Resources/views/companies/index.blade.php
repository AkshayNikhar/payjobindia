@extends('core::layouts.app')
@section('title', __('All Companies'))
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-4 text-gray-800">@lang('All Companies')</h1>
        <div class="row">
        <a href="{{ route('settings.companies.create') }}" class="btn btn-success mr-2">
            <i class="fas fa-plus"></i> @lang('Create company')
        </a>
        <a href="{{ route('settings.companiesExport') }}" class="btn btn-success">
            <i class="fas fa-save"></i> @lang('Export companies')
        </a>
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
                                <th>@lang('Logo')</th>
                                <th>@lang('Company Name')</th>
                                <th>@lang('Company Email')</th>
                                <th>@lang('Employer Name')</th>
                                <th>@lang('Employer Email')</th>
                                <th>@lang('Info')</th>
                                <th>@lang('Date')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>            
                            @foreach($data as $item)
                            @php 
                              $employer = $item->user; 
                            @endphp
                            <tr>
                               <td>
                                   <?php
                                   if(empty($item->logo)){
                                   ?>
                                   <img src="https://placehold.jp/50x50.png" width="50" height="50">
                                   <?php } else { ?>
                                   <img src="{{ URL::to('/') }}/storage/user_storage/{{ $employer->id. "/". $item->logo }}" width="50" height="50">
                                   <?php } ?>
                               </td>
                               <td>
                                   <small> {{$item->company_name}}</small>
                               </td>
                               <td>
                                  <small> {{$item->company_email}}</small>
                               </td>
                               <td>
                                   <small> {{$employer->name}}</small><br>
                               </td>
                               <td>
                                   <small> {{$employer->email}}</small>
                               </td>
                              
                               <td>
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
                                <td>
                                   <small> {{$employer->created_at->format('d-M-Y')}}</small>
                                </td>
                                <td>
                                <div class="btn-group">
                                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-h"></i>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-top">
                                    <!--<a href="{{ route('settings.companies.edit', $item) }}" class="dropdown-item">@lang('View Job')</a>-->
                                    <a href="{{ route('settings.companies.edit', $item) }}" class="dropdown-item">@lang('Edit')</a>
                                    <a href="{{route('company',$item->slug)}}" class="dropdown-item">@lang('Public Profile')</a>
                                    <form method="post" action="{{ route('settings.companies.destroy', $item->id) }}" onsubmit="return confirm('@lang('Confirm delete?')');">
                                      @csrf
                                      @method('DELETE')
                                        <button type="submit" class="dropdown-item">@lang('Delete')</button>
                                    </form>
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
      <div class="error mx-auto mb-3"><i class="fas fa-building"></i></div>
      <p class="lead text-gray-800">@lang('No Companies Found')</p>
      <p class="text-gray-500">@lang("You don't have any companies").</p>
      <a href="{{ route('settings.companies.create')}}" class="btn btn-primary">
        <span class="text">@lang('New Company')</span>
      </a>
    </div>
    @endif
  </div>
</div>

@stop