@extends('themes::default.layout')
@section('content')
@include('themes::default.nav')
@if(config('recaptcha.api_site_key') && config('recaptcha.api_secret_key'))
@push('head')
{!! htmlScriptTagJsApi() !!}
@endpush
@endif

<div class="form-bg mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5 col-lg-5 col-sm-6 mb-3">
                <div class="form-container">
                    <h3 class="title text-center mb-3">Employer Registration</h3>
                    
                    <!--<form class="form-horizontal" method="post" action="{{ route('register') }}">-->
                    <form class="form-horizontal" method="post" action="{{url('emp_registration')}}">
                       @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <!--<label>Company Name</label>-->
                                    <input type="text" class="form-control" name="name" placeholder="Company Name" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <!--<label>Company Email</label>-->
                                    <input type="email" class="form-control" name="email" placeholder="Company Email" required>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <!--<label>Company Contact No</label>-->
                                    <input type="text" class="form-control" name="mobile" placeholder="Contact No" required>
                                </div>
                            </div>
                            <input type="hidden" name="role" class="form-control" value="employer">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <!--<label>Password</label>-->
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" onkeyup="checkpassword()" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <!--<label>Confirm Password</label>-->
                                    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" onkeyup="checkpassword()" required>
                                </div>
                            </div>
                            <div class="col-12 mb-2 text-center" id="error"></div>
                        </div>
                        
                        
                        <div class="form-group text-center">
                            <button class="btn btn-block btn-primary mt-2 text-white" type="submit" id="submit">Register</button>
                        </div>
                        <div class="form-group text-center">
                           <a class="forgot-pass" href="{{ route('employerLogin') }}"><i class="fa fa-user-circle pr-1"></i> Already have account login?</a>
                        </div>
                        
                        
                    </form>
                </div>
            </div>
            
            <div class="col-md-5 col-lg-5 col-sm-6 mb-3">
                <img src="../storage/images/employer-registration1.png" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<script>

 function checkpassword()
        {
            var pwd = document.getElementById("password").value;
            var cpwd = document.getElementById("cpassword").value;
            if (pwd !== "" && cpwd !== "") {
            if(pwd==cpwd)
            {
              document.getElementById("error").style.color ='Green';
              document.getElementById("error").innerHTML ="";
            }
            else
            {
              document.getElementById("error").style.color ='#ff192f';
              document.getElementById("error").innerHTML ="<span >The passwords you entered do not match.</span>";
            }
            }
        }
</script> 

@endsection