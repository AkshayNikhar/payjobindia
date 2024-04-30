@extends('core::layouts.app') @section('title', __('Account Settings')) @section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">@lang('Setting Account')</h1>
</div>
<div class="row">
   <div class="col-md-12">
      <form role="form" method="post" action="{{ route('accountsettings.update') }}" autocomplete="off">
         @csrf @method('PUT')
         <div class="card">
            <div class="card-header">
               <ul class="nav nav-tabs">
                  <li class="nav-item"> <a class="nav-link active" href="#tab_profile" data-toggle="tab">
                     @lang('Profile')
                     </a> 
                  </li>
                  @php $views_render = accountSettingPayments(['user' => $user]); @endphp @if(!empty($views_render))
                  <li class="nav-item"> <a class="nav-link" href="#tab_payment_setting" data-toggle="tab">
                     @lang('Payment Settings')
                     </a> 
                  </li>
                  @endif 
               </ul>
            </div>
            <div class="card-body">
               <div class="tab-content">
                  <div class="tab-pane active" id="tab_profile">
                      <?php 
                     if($user->role == 'employer'){
                     ?>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="form-label">@lang('Name')</label>
                              <input type="text" name="name" value="{{ $user->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="@lang('Full name')"> 
                           </div>
                           <div class="form-group">
                              <label class="form-label">E-mail</label>
                              <input type="email" value="{{ $user->email }}" class="form-control disabled" placeholder="E-mail" disabled> <small class="help-block">@lang("E-mail can't be changed")</small> 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="form-label">Mobile Number</label>
                              <input type="text" name="mobile" value="{{ $user->mobile }}" class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" placeholder="Mobile Number"> 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="form-label">@lang('Password')</label>
                              <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" placeholder="@lang('Password')"> 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="form-label">@lang('Confirm password')</label>
                              <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password_confirmation" placeholder="@lang('Confirm password')"> 
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="alert alert-info"> @lang('Type new password if you would like to change current password.') </div>
                        </div>
                     </div>
                     <?php }
                     else { ?>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="form-label">@lang('Name')</label>
                              <input type="text" name="name" value="{{ $user->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="@lang('Full name')"> 
                           </div>
                           <div class="form-group">
                              <label class="form-label">E-mail</label>
                              <input type="email" value="{{ $user->email }}" class="form-control disabled" placeholder="E-mail" disabled> <small class="help-block">@lang("E-mail can't be changed")</small> 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="form-label">Mobile Number</label>
                              <input type="text" name="mobile" value="{{ $user->mobile }}" class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" placeholder="Mobile Number"> 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="form-label">@lang('Password')</label>
                              <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" placeholder="@lang('Password')"> 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="form-label">@lang('Confirm password')</label>
                              <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password_confirmation" placeholder="@lang('Confirm password')"> 
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="alert alert-info"> @lang('Type new password if you would like to change current password.') </div>
                        </div>
                     </div>
                     <br/>
                     <h6>Location</h6>
                     <hr/>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="state">Country</label>
                              <select class="form-control selectpicker countryPicker" name="country_id" id="country" aria-hidden="true" data-live-search="true" data-style="btn-white" required>
                                 <option value="" selected="" disabled="" hidden="">Choose One</option>
                                 @foreach($countries as $country)
                                 <option value="{{$country->id}}" {{(Auth::user()->getCountry->id ?? '') == $country->id ? 'selected' : ''}}>{{$country->name}}</option> @endforeach 
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="state">State</label>
                              <select class="form-control selectpicker statePicker" name="state" id="state" aria-hidden="true" data-live-search="true" data-style="btn-white" required>
                                 <option value="" selected="" disabled="" hidden="">Choose One</option>
                                 @foreach($states as $state)
                                 <option value="{{$state->id}}" {{(Auth::user()->getState->id ?? '') == $state->id ? 'selected' : ''}}>{{$state->name}}</option> @endforeach 
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="state">City</label>
                              <select class="form-control selectpicker cityPicker" name="city" id="city" aria-hidden="true" data-live-search="true" data-style="btn-white" required>
                                 <option value="" selected="" disabled="" hidden="">Choose One</option>
                                 @foreach($cities as $city)
                                 <option value="{{$city->id}}" {{(Auth::user()->getCity->id ?? '') == $city->id ? 'selected' : ''}}>{{$city->name}}</option> @endforeach 
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="state">Address</label>
                              <input type="text" class="form-control" name="address" id="address" value="{{(Auth::user()->address ?? '')}}" required> 
                           </div>
                        </div>
                     </div>
                     <br/>
                     <h6>Education</h6>
                     <hr/>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="state">Degree Level</label>
                              <select class="form-control selectpicker degreeLevelPicker" name="education" id="degree" aria-hidden="true" data-live-search="true" data-style="btn-white" required>
                                 <option value="" selected="" disabled="" hidden="">Choose One</option>
                                 @foreach($degrees as $degree)
                                 <option value="{{$degree->id}}" {{(Auth::user()->getEducation->id ?? '') == $degree->id ? 'selected' : ''}}>{{$degree->name}}</option> @endforeach 
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="state">Degree Type</label>
                              <select class="form-control selectpicker degreeTypePicker" name="degree_type_id" id="degree_type_id" aria-hidden="true" data-live-search="true" data-style="btn-white" required>
                                 <option value="" selected="" disabled="" hidden="">Choose One</option>
                                 @foreach($degreeTypes as $degreeType)
                                 <option value="{{$degreeType->id}}" {{(Auth::user()->getDegreeType->id ?? '') == $degreeType->id ? 'selected' : ''}}>{{$degreeType->name}}</option> @endforeach 
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="technical_skills">Technical Skills</label>
                              <input type="text" class="form-control" name="technical_skills" id="technical_skills" value="{{(Auth::user()->technical_skills ?? '')}}"> 
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
                  <div class="tab-pane" id="tab_payment_setting"> @if(!empty($views_render)) {!! $views_render !!} @endif </div>
               </div>
            </div>
            <div class="card-footer text-right">
               <button type="submit" class="btn btn-primary btn-block"> <i class="fe fe-save mr-2"></i> @lang('Save settings') </button>
            </div>
         </div>
      </form>
   </div>
</div>
@push('scripts')
<script>
   $('#country').on('change', function() {
   	$('#state').empty()
   	$.ajax({
   		url: `{{route('getStatesAjax')}}?countryId=${this.value}`,
   		success: data => {
   			var d = JSON.parse(data);
   			console.log(data);
   			d.forEach(state => $('#state').append(`<option value="${state.id}">${state.name}</option>`));
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
   			d.forEach(city => $('#city').append(`<option value="${city.id}">${city.name}</option>`));
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
   			d.forEach(degreeType => $('#degree_type_id').append(`<option value="${degreeType.id}">${degreeType.name}</option>`));
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
@endpush @stop