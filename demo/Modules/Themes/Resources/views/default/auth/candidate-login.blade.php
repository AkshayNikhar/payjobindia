@extends('themes::default.layout')
@section('content')
@include('themes::default.nav')

<div class="form-bg mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5 col-lg-5 col-sm-6 mb-3">
                <div class="form-container">
                    <h3 class="title text-center mb-3">Candidate Login</h3>
                    
                    <form class="form-horizontal" method="post" action="{{ route('login') }}">
                    <!--<form class="form-horizontal" method="post" action="{{url('candidate_login')}}">-->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="csfrToken">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group text-center">
                           <a class="forgot-pass" href="{{ route('candidateReset') }}"><i class="fa fa-key pr-1"></i> I Forgot Password</a>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-block btn-primary mt-2 text-white" name="submit" id="submit">Login</button>
                        </div>
                        <div class="form-group text-center">
                             <a href="{{ route('candidateRegistration') }}" class="btn btn-block btn-warning mt-2 text-white">Create Account</a>
                        </div>
                        
                    </form>
                </div>
            </div>
            
            <div class="col-md-5 col-lg-5 col-sm-6 mb-3">
                <img src="../storage/images/candidate-login1.png" class="img-fluid">
            </div>
        </div>
    </div>
</div>
    

@endsection