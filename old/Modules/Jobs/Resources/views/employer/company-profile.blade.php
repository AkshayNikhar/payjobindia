@extends('core::layouts.app')

@section('title', __('Company Profile'))

@section('content')
@if(empty($c->company_name) && empty($c->company_email) && empty($c->company_ceo) && empty($c->industry_id) && empty($c->ownership_type_id) && empty($c->description) && empty($c->location) && empty($c->phone) && empty($c->country_id) && empty($c->state_id) && empty($c->city_id))
<div class="alert alert-danger">Please Complete Company Profile To Post Jobs</div>
@endif
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">@lang('Edit Company Profile')</h1>
    <a href="{{route('company',$company->slug)}}" class="btn btn-primary ml-auto"><i class="far fa-eye"></i> @lang('Public Profile')</a>
</div>
<div class="row">
    <div class="col-md-12">

        <form role="form" method="post" enctype="multipart/form-data" action="{{route('company.update-profile')}}">
            @csrf
            @method('POST')
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <input type="text" hidden="" name="company_id" value="{{$company->id}}">
                        @can('Display logo')
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-label mb-2">@lang('Company Logo')</div>
                                <div class="custom-file">
                                    <input type="file" class="" name="logo" accept="image/*">
                                </div>
                                <small class="help-block">@lang('Recommended size: :size', ['size' => '100x100'])</small>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <img src="{{ URL::to('/') }}/storage/user_storage/{{ $company->user->id. "/". $company->logo }}" height="80" alt="">
                        </div>
                        @endcan
                        <div class="col-md-6 d-none">
                            <div class="form-group">
                                <div class="form-label mb-2">@lang('Company featured')</div>
                                <label class="custom-switch">
                                    @if ($company->is_featured)
                                        <input type="checkbox" name="is_featured"  value="1" class="custom-switch-input" checked>
                                    @else 
                                        <input type="checkbox" name="is_featured" class="custom-switch-input" >
                                    @endif
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">@lang('Enable featured')</span>
                                    <br><small class="text-primary">(@lang('With featured your company will be a prominent badge, show up on website homepage, suggestions for candidates...'))</small>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Company Name')</label>
                                <input type="text" name="company_name" value="{{$company->company_name}}" class="form-control border-dark" placeholder="" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Industry')</label>
                                <select name="industry_id" class="form-control border-dark" required="">
                                    @foreach($industries as $item)
                                        <option value="{{ $item->id }}" {{ $company->industry_id ==  $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Company CEO')</label>
                                <input type="text" name="company_ceo" value="{{$company->company_ceo}}" class="form-control border-dark" placeholder="">
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Ownership')</label>
                                <select name="ownership_type_id" class="form-control border-dark" required="">
                                    @foreach($ownershipType as $item)
                                        <option value="{{ $item->id }}" {{ $company->ownership_type_id ==  $item->id  ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('No of Employees')</label>
                                <select name="no_of_employees" class="form-control border-dark" required="">
                                    @foreach(getNumEmployees() as $item)
                                        <option value="{{ $item }}" {{ $company->no_of_employees ==  $item ? 'selected' : '' }}>{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('No of Office')</label>
                                <select name="no_of_offices" class="form-control border-dark" required="">
                                    @foreach(getNumOffices() as $item)
                                        <option value="{{ $item }}" {{ $company->no_of_offices ==  $item ? 'selected' : '' }}>{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Established')</label>
                                <select name="established_in" class="form-control border-dark" required="">
                                    @foreach(getEstablishedIn() as $item)
                                        <option value="{{ $item }}" {{ $company->established_in ==  $item ? 'selected' : '' }}>{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Country')</label>
                                <select class="form-control border-dark" name="country_id" id="country" required>
                                   <option value="" selected="" disabled="" hidden="">Choose One</option>
                                   @foreach($countries as $country)
                                   <option value="{{$country->id}}" {{($company->country_id ?? '') == $country->id ? 'selected' : ''}}>{{$country->name}}</option>
                                    @endforeach   
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('State')</label>
                                <select class="form-control border-dark" name="state_id" id="state" required>
                                    <option value="" selected="" disabled="" hidden="">Choose One</option>
                                    @foreach($states as $state)
                                       <option value="{{$state->id}}" {{($company->state_id ?? '') == $state->id ? 'selected' : ''}}>{{$state->name}}</option>
                                    @endforeach   
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('City')</label>
                                <select class="form-control border-dark" name="city_id" id="city" required>
                                   <option value="" selected="" disabled="" hidden="">Choose One</option>
                                   @foreach($cities as $city)
                                   <option value="{{$city->id}}" {{($company->city_id ?? '') == $city->id ? 'selected' : ''}}>{{$city->name}}</option>
                                    @endforeach   
                                </select>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label required">@lang('Address')</label>
                                <input type="text" name="location" value="{{$company->location}}" class="form-control border-dark" placeholder="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Company Email')</label>
                                <input type="email" name="company_email" value="{{$company->company_email}}" class="form-control border-dark" placeholder="" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Phone')</label>
                                <input type="text" name="phone" value="{{$company->phone}}" class="form-control border-dark" placeholder="">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Website URL')</label>
                                <input type="url" name="website" value="{{$company->website}}" class="form-control border-dark" placeholder="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Fax')</label>
                                <input type="text" name="fax" value="{{$company->fax}}" class="form-control border-dark" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">@lang('Description')</label>
                                 <textarea name="description" id="company_description" rows="3" class="form-control border-dark">{{$company->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Facebook Link')</label>
                                <input type="url" name="facebook" value="{{$company->facebook}}" class="form-control border-dark" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Twitter link')</label>
                                <input type="url" name="twitter" value="{{$company->twitter}}" class="form-control border-dark" placeholder="" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Linkedin link')</label>
                                <input type="url" name="linkedin" value="{{$company->linkedin}}" class="form-control border-dark" placeholder="" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Youtube link')</label>
                                <input type="url" name="youtube" value="{{$company->youtube}}" class="form-control border-dark" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Pinterest link')</label>
                                <input type="url" name="pinterest" value="{{$company->pinterest}}" class="form-control border-dark" placeholder="" >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="d-flex">
                        <button class="btn btn-primary ml-auto">@lang('Save')</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    
</div>
@stop

@push('scripts')
<script src="{{ Module::asset('jobs:js/employer.js') }}"></script>
@endpush