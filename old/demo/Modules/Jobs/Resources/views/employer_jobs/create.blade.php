@extends('core::layouts.app')

@section('title', __('Create Job'))

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">@lang('Create Job')</h1>
</div>
<div class="row">
    <div class="col-md-12">

        <form role="form" method="post" action="{{ route('company.jobs.store') }}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label required">@lang('Title')</label>
                                <input type="text" name="title" class="form-control border-dark" required>
                            </div>
                        </div>
                        <!--<div class="col-md-6">-->
                        <!--    <div class="form-group">-->
                        <!--        <label class="form-label required">@lang('Education')</label>-->
                        <!--        <select name="degree_level_id" class="form-control border-dark" id="degree" required="">-->
                        <!--            @foreach($degreeLevels as $degreeLevel)-->
                        <!--                <option value="{{ $degreeLevel->id }}">{{ $degreeLevel->name }}</option>-->
                        <!--            @endforeach-->
                        <!--        </select>-->
                        <!--    </div>-->
                        <!--</div>-->
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label required">@lang('Functional Area')</label>
                                <select name="functional_area_id" class="form-control border-dark" required="">
                                    @foreach($functionalAreas as $functionalArea)
                                        <option value="{{ $functionalArea->id }}">{{ $functionalArea->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label required">@lang('Education')</label>
                                <select name="degree_level_id" class="form-control border-dark" id="degree" required="">
                                    @foreach($degreeLevels as $degreeLevel)
                                        <option value="{{ $degreeLevel->id }}">{{ $degreeLevel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label required">@lang('Require degree level')</label>
                                <select class="form-control border-dark" name="degree_type_id" id="degree_type_id" required>
                                   <option value="" selected="" disabled="" hidden="">Choose One</option>
                                   @foreach($degreeTypes as $degreeType)
                                   <option value="{{$degreeType->id}}">{{$degreeType->name}}</option>
                                   @endforeach 
                                </select>
                            </div>
                        </div>
                        
                        <!--<div class="col-md-6">-->
                        <!--    <div class="form-group">-->
                        <!--        <label class="form-label required">@lang('Title')</label>-->
                        <!--        <input type="text" name="title" class="form-control border-dark" required>-->
                        <!--    </div>-->
                        <!--</div>-->
                        
                    </div>
                    <hr>
                    <div class="row">
                        <!--<div class="col-md-6">-->
                        <!--    <div class="form-group">-->
                        <!--        <div class="form-label mb-3">@lang('Active')</div>-->
                        <!--        <label>-->
                        <!--            <input type="checkbox" name="is_active" class="custom-switch-input" value="1">-->
                        <!--            <span class="custom-switch-indicator"></span>-->
                        <!--            <span class="custom-switch-description">@lang('Allow active job')</span>-->
                        <!--        </label>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="col-md-6">-->
                        <!--    <div class="form-group">-->
                        <!--        <div class="form-label mb-3">@lang('Urgent Job')</div>-->
                        <!--        <label>-->
                        <!--            <input type="checkbox" name="is_featured" class="custom-switch-input" value="1">-->
                        <!--            <span class="custom-switch-indicator"></span>-->
                        <!--            <span class="custom-switch-description">@lang('Enable Urgent Job')</span>-->
                        <!--            <br><small class="text-primary">(@lang('With urgent job featured your job will be a prominent badge, show up on website homepage, suggestions for candidates...'))</small>-->
                        <!--        </label>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    <div class="row">
                        
                        <div class="col-md-4">
                            
                            <div class="form-group">
                                <label class="form-label">@lang('Career level')</label>
                                <select name="career_level_id" class="form-control border-dark" required="">
                                    @foreach($careerLevels as $careerLevel)
                                        <option value="{{ $careerLevel->id }}">{{ $careerLevel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Require job experience')</label>
                                <select name="job_experience_id" class="form-control border-dark" required="">
                                    @foreach($jobExperiences as $jobExperience)
                                        <option value="{{ $jobExperience->id }}">{{ $jobExperience->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Gender')</label>
                                <select name="gender_id" class="form-control border-dark" required="">
                                    @foreach($genders as $gender)
                                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Job type')</label>
                                <select name="job_type_id" class="form-control border-dark" required="">
                                    @foreach($jobTypes as $jobType)
                                        <option value="{{ $jobType->id }}">{{ $jobType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Job shift')</label>
                                <select name="job_shift_id" class="form-control border-dark" required="">
                                    @foreach($jobShifts as $jobShift)
                                        <option value="{{ $jobShift->id }}">{{ $jobShift->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Vacancies')</label>
                                <input type="text" name="vacancies" class="form-control border-dark" required="">
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
                                   <option value="{{$country->id}}">{{$country->name}}</option>
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
                                   <option value="{{$state->id}}">{{$state->name}}</option>
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
                                   <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach   
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Salary from')</label>
                                <input type="number" min="0" step="1" name="salary_from" class="form-control border-dark" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Salary to')</label>
                                <input type="number" min="0" step="1" name="salary_to" class="form-control border-dark" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Salary Currency')</label>
                                <select name="salary_currency" class="form-control border-dark" required="">
                                    @foreach(getCurencies() as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Work Mode')</label>
                                <select name="work_mode" class="form-control border-dark" required="">
                                        <option value="onsite">Onsite</option>
                                        <option value="hybrid">Hybrid</option>
                                        <option value="remote">Remote</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Salary period')</label>
                                <select name="salary_period_id" class="form-control border-dark" required="">
                                    @foreach($salaryPeriods as $salaryPeriod)
                                        <option value="{{ $salaryPeriod->id }}">{{ $salaryPeriod->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label required">@lang('Expiry date')</label>
                                <div class="input-group date" id="expiry_date" data-target-input="nearest">
                                    <input type="text" class="form-control border-dark datetimepicker-input" name="expiry_date" value="" data-target="#expiry_date" />
                                    <div class="input-group-append" data-target="#expiry_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                         <div class="form-group">
                                <label class="form-label">@lang('Address')</label>
                                <textarea name="address" id="address" rows="3" class="form-control border-dark"></textarea>
                         </div>
                         </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">@lang('Job Description')</label>
                                <textarea name="description" id="description" rows="3" class="form-control border-dark"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">@lang('Responbilities')</label>
                                <textarea name="responbilities" id="responbilities" rows="3" class="form-control border-dark"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">@lang('Requirements')</label>
                                <textarea name="requirements" id="requirements" rows="3" class="form-control border-dark"></textarea>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <div class="d-flex">
                        <a href="{{ route('settings.jobs.index') }}" class="btn btn-secondary">@lang('Cancel')</a>
                        <button class="btn btn-primary ml-auto">@lang('Save')</button>
                    </div>
                </div>
            </div>
        </form>


    </div>
    
</div>
@stop

@push('scripts')
<script src="{{ Module::asset('jobs:js/employer_jobs.js') }}"></script>
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
                )
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
                )
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
                )
            }
        })
    })
</script>
@endpush