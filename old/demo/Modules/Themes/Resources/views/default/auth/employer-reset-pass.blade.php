@extends('themes::default.layout')
@section('content')
@include('themes::default.nav')

<div class="form-bg mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5 col-lg-5 col-sm-6 mb-3">
                <div class="form-container">
                    <h3 class="title text-center mb-3">Reset Password</h3>
                    
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label>Enter your email address and your password will be reset and email to you.</label>
                            <input type="email" class="form-control" >
                        </div>
                        
                        <div class="form-group text-center">
                            <button class="btn btn-block btn-primary mt-2 text-white">Send me password reset link</button>
                        </div>
                        <div class="form-group text-center">
                             <a href="{{ route('employerRegistration') }}" class="btn btn-block btn-warning mt-2 text-white">Create Account</a>
                        </div>
                        
                    </form>
                </div>
            </div>
            
            <div class="col-md-5 col-lg-5 col-sm-6 mb-3">
                <img src="../storage/images/employer-login.png" class="img-fluid">
            </div>
        </div>
    </div>
</div>
    

@endsection