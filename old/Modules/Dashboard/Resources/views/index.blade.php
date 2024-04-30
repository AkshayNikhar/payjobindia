@extends('core::layouts.app')
@section('title', __('Dashboard'))
@section('content')
{{-- Example Dashboard --}}
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">@lang('Dashboard')</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <a href="{{route('resumecv.index')}}" class="text-decoration-none">
            <div class="card shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-gray-600 text-uppercase mb-1">
                                @lang('Total ResumeCV')
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-600">{{$total_resume}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6">
        <a href="{{route('resumecv.index')}}" class="text-decoration-none">
            <div class="card shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-gray-600 text-uppercase mb-1">@lang('Total Views ResumeCV')
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-600">{{$total_views}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-eye fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
</div>

<div class="row">
    <div class="col-md-12">
        <div class="mt-4 mb-4">
                <h1 class="h3 mb-0 text-gray-800">@lang('Update Profile')</h1>
            </div>
        <div class="card p-4">
           <form action="{{route('saveProfileData')}}" method="post">
               @csrf
               <h6 class="text-primary font-weight-bold">Information</h6>
               <br/>
                <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="state" class="required">Name</label>
                        <input type="text" class="form-control border border-dark" value="{{Auth::user()->name}}" name="name" required>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="email" class="required">Email</label>
                        <input type="text" class="form-control border border-dark" value="{{Auth::user()->email}}" name="email" required disabled>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="mobile" class="required">Mobile</label>
                        <input type="text" class="form-control border border-dark" value="{{Auth::user()->mobile}}" name="phone" required>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="state" class="required">Gender</label>
                        <select class="form-control border border-dark" name="gender_id" required>
                           <option value="" selected="" disabled="" hidden="">Choose One</option>
                           @foreach($genders as $gender)
                           <option value="{{$gender->id}}" {{(Auth::user()->getGender->id ?? '') == $gender->id ? 'selected' : ''}}>{{$gender->name}}</option>
                           @endforeach 
                        </select>
                     </div>
                  </div>
               </div>
               <br/>
               <h6 class="text-primary font-weight-bold">Degree Type</h6>
               <br/>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="state" class="required">Education</label>
                        <select class="form-control border border-dark degreeLevelPicker selectpicker" name="degree_id" id="degree" aria-hidden="true" data-live-search="true" data-style="btn-white" required>
                           <option value="" selected="" disabled="" hidden="">Choose One</option>
                           @foreach($degrees as $degree)
                           <option value="{{$degree->id}}" {{(Auth::user()->getEducation->id ?? '') == $degree->id ? 'selected' : ''}}>{{$degree->name}}</option>
                            @endforeach 
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="state" class="required">Degree Level</label>
                        <select class="form-control border border-dark degreeTypePicker selectpicker" name="degree_type_id" id="degree_type_id" aria-hidden="true" data-live-search="true" data-style="btn-white" required>
                           <option value="" selected="" disabled="" hidden="">Choose One</option>
                           @foreach($degreeTypes as $degreeType)
                           <option value="{{$degreeType->id}}" {{(Auth::user()->getDegreeType->id ?? '') == $degreeType->id ? 'selected' : ''}}>{{$degreeType->name}}</option>
                           @endforeach 
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="state">Functional Area</label>
                        <select class="form-control border border-dark" name="functional_area_id">
                           <option value="" selected="" disabled="" hidden="">Choose One</option>
                           @foreach($functionalAreas as $functionalArea)
                           <option value="{{$functionalArea->id}}" {{(Auth::user()->getFunctionalArea->id ?? '') == $functionalArea->id ? 'selected' : ''}}>{{$functionalArea->name}}</option>
                            @endforeach 
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="state" class="required">Experience</label>
                        <select class="form-control border border-dark" name="experience_id" required>
                           <option value="" selected="" disabled="" hidden="">Choose One</option>
                           @foreach($experiences as $experience)
                           <option value="{{$experience->id}}" {{(Auth::user()->getExperience->id ?? '') == $experience->id ? 'selected' : ''}}>{{$experience->name}}</option>
                           @endforeach 
                        </select>
                     </div>
                  </div>
               </div>
                <div class="row">
                    <div class="col-md-12">
                       <div class="form-group">
                          <label for="technical_skills">Technical Skills</label>
                          <input type="text" class="form-control border border-dark" name="technical_skills" id="technical_skills" value="{{(Auth::user()->technical_skills ?? '')}}"> 
                       </div>
                    </div>
                    
                </div>
               <br/>
               <h6 class="text-primary font-weight-bold">Location</h6>
               <br/>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="state" class="required">Country</label>
                        <select class="form-control border border-dark countryPicker selectpicker" name="country_id" id="country" aria-hidden="true" data-live-search="true" data-style="btn-white" required>
                        <option value="" selected="" disabled="" hidden="">Choose One</option>
                           @foreach($countries as $country)
                           <option value="{{$country->id}}" {{(Auth::user()->getCountry->id ?? '') == $country->id ? 'selected' : ''}}>{{$country->name}}</option>
                            @endforeach   
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="state" class="required">State</label>
                        <select class="form-control border border-dark statePicker selectpicker" name="state_id" id="state" aria-hidden="true" data-live-search="true" data-style="btn-white" required>
                        <option value="" selected="" disabled="" hidden="">Choose One</option>
                        @foreach($states as $state)
                           <option value="{{$state->id}}" {{(Auth::user()->getState->id ?? '') == $state->id ? 'selected' : ''}}>{{$state->name}}</option>
                        @endforeach   
                        </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="state" class="required">City</label>
                        <select class="form-control border border-dark cityPicker" name="city_id" id="city" aria-hidden="true" data-live-search="true" data-style="btn-white" required>
                        <option value="" selected="" disabled="" hidden="">Choose One</option>
                           @foreach($cities as $city)
                           <option value="{{$city->id}}" {{(Auth::user()->getCity->id ?? '') == $city->id ? 'selected' : ''}}>{{$city->name}}</option>
                            @endforeach   
                        </select>
                     </div>
                  </div>
                  
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="state" class="required">Address</label>
                        <input type="text" class="form-control border border-dark" name="address" id="address" value="{{(Auth::user()->address ?? '')}}" required>
                     </div>
                  </div>
               </div>
               <br/>
               <h6 class="text-primary font-weight-bold">Description</h6>
               <br/>
               <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                        <textarea type="text" class="form-control border border-dark" name="description" id="description">{{(Auth::user()->description ?? '')}}</textarea>
                     </div>
                  </div>
               </div>
               <button class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if($data_10_first->count() > 0)
            <div class="mt-4 mb-4">
                <h1 class="h3 mb-0 text-gray-800">@lang('My ResumeCV')</h1>
            </div>
            <div class="card">
                <div class="table-responsive">
                     <table class="table card-table table-vcenter text-nowrap">
                        <thead class="">
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Public link')</th>
                                <th>@lang('Views')</th>
                                <th>@lang('Date Info')</th>
                            </tr>
                        </thead>
                        <tbody>            
                            @foreach($data_10_first as $item)
                            <tr>
                                <td>
                                    <span><a href="{{ route('resumecv.builder', $item->code) }}">{{ $item->name }}</a></span>
                                </td>
                                <td>
                                    <div class="public-link"><small><a href="{{ URL::to('publish',$item->slug) }}" target="_blank" class="text-dark">{{ URL::to('publish') }}/{{$item->slug}}</a></small>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-info badge-pill">{{$item->view_count}} @lang('views')</span>
                                </td>
                                <td>
                                <div class="small text-muted">
                                        @lang('Created'): {{$item->created_at->format('M j, Y')}}<br>
                                        @lang('Modified'): {{$item->updated_at->format('M j, Y')}}
                                </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    
    </div>
    
</div>
{{-- End Example Dashboard --}}

@push('scripts')
<script>
    $('#country').on('change', function() {
        $('#state').empty()
        $.ajax({
            url: `{{route('getStatesAjax')}}?countryId=${this.value}`,
            success: data => {
                var d = JSON.parse(data);
                console.log(data);
                d.forEach(state =>
                    $('#state').append(`<option value="${state.id}">${state.name}</option>`)
                );
                $('.statePicker').selectpicker('refresh');
            }
        })
    })
</script>
<script>
    $('#state').on('change', function() {
        $('#city').empty()
        $.ajax({
            url: `{{route('getCitiesAjax')}}?stateId=${this.value}`,
            success: data => {
                var d = JSON.parse(data);
                console.log(data);
                d.forEach(city =>
                    $('#city').append(`<option value="${city.id}">${city.name}</option>`)
                );
                $('.cityPicker').selectpicker('refresh');
            }
        })
    })
</script>
<script>
    $('#degree').on('change', function() {
        $('#degree_type_id').empty()
        $.ajax({
            url: `{{route('getDegreeTypeAjax')}}?degree_level_id=${this.value}`,
            success: data => {
                var d = JSON.parse(data);
                console.log(data);
                d.forEach(degreeType =>
                    $('#degree_type_id').append(`<option value="${degreeType.id}">${degreeType.name}</option>`)
                );
                $('.degreeTypePicker').selectpicker('refresh');
            }
        })
    })
</script>

<script>
$(document).ready(function () {
   $('.countryPicker').selectpicker();
   $('.statePicker').selectpicker();
   $('.cityPicker').selectpicker();
   $('.degreeLevelPicker').selectpicker();
   $('.degreeTypePicker').selectpicker();
});
</script>
@endpush

@stop