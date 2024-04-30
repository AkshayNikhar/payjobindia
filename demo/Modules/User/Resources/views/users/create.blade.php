@extends('core::layouts.app')

@section('title', __('Create new user'))

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">@lang('Create')</h1>
</div>
<div class="row">
    <div class="col-md-12">

        <form role="form" method="post" action="{{ route('settings.users.store') }}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Name')</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="@lang('Name')">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('E-mail')</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="@lang('E-mail')">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Mobile Number</label>
                                <input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control" placeholder="Mobile Number">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Password')</label>
                                <input type="password" name="password" value="" class="form-control" placeholder="@lang('Password')">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Confirm password')</label>
                                <input type="password" name="password_confirmation" value="" class="form-control" placeholder="@lang('Password')">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Role User')</label>
                                <select name="role" class="form-control" id="user_role_select">
                                    <option value="candidate">@lang('Candidate')</option>
                                    <option value="employer">@lang('Employer')</option>
                                    <option value="admin">@lang('Admin')</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="technical_skills">Technical Skills</label>
                              <input type="text" class="form-control" name="technical_skills" id="technical_skills"> 
                           </div>
                        </div>
                    </div>
                    @can('Give Permissions')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Permissions</label>
                                    <div class="row p-4">
                                    @foreach($permissions as $permission)
                                     <div class="col-md-2 p-2">
                                     <input type="checkbox" name="permissions[]" class="form-check-input" value="{{$permission->permission_name}}">
                                     {{$permission->permission_name}} 
                                     </div>
                                    @endforeach
                                    </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                    <!--<div class="row d-none" id="row_package_user">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Package')</label>
                                <select name="package_id" class="form-control">
                                    <option value=""></option>
                                    @foreach($packages as $package)
                                    <option value="{{ $package->id }}" {{ $package->id == old('package_id') ? 'selected' : '' }}>{{ $package->title }}</option>
                                    @endforeach
                                </select>
                                <small class="text-info">@lang('Select a package for employer')</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Package ends at')</label>
                                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="package_ends_at" value="{{ old('package_ends_at') }}" placeholder="@lang('Package ends at')" data-target="#datetimepicker1"/>
                                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                <small class="text-info">@lang('Select a package ends date for employer')</small>

                            </div>
                        </div>
                    </div>-->
                    

                </div>
                <div class="card-footer">
                    <div class="d-flex">
                        <a href="{{ route('settings.users.index') }}" class="btn btn-secondary">@lang('Cancel')</a>
                        <button class="btn btn-success ml-auto">@lang('Add user')</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    
</div>

@push('scripts')
      <script src="{{ Module::asset('user:js/user.js') }}" ></script>
@endpush
@stop