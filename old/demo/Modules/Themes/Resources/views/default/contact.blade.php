@extends('themes::default.layout')
@section('content')
@include('themes::default.nav')
<section class="p-5 mb-5" style="background:url({{url('/modules/themes/default/images/banner-small.jpeg')}});">
        <div class="home-center p-5">
            <div class="home-desc-center">
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="row mb-2 text-center">
                                <div class="col-md-12">
                                    <h3><strong class="text-white">Get in touch</strong></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container mb-5 card p-5">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
               <div class="inner-column text-center">
						<div class="sec-title mb-5">
							<h2>For Any Kind of Help  And Informations</h2>
							<div class="text">We’re glad to discuss your organisation’s situation.  So please contact us via the details below, or enter your request.</div>
						</div>
							<div class="row d-none">
								<div class="col-md-3 d-flex justify-content-center align-items-center">
								    <i class="mdi mdi-map" style="font-size: 3em;color: #f2b252;"></i>
								</div>
								<div class="col-md-9">
								    <h4>Office Address:</h4>
								<p>{{ config('app.CONTACT_ADDRESS') }}</p>
								</div>
							    </div>
								
								<div class="row d-none">
								<div class="col-md-3 d-flex justify-content-center align-items-center">
								    <i class="mdi mdi-phone" style="font-size: 3em;color: #212f7e;"></i>
								</div>
								<div class="col-md-9">
								  <h4>Call for help:</h4>
								  <p>{{ config('app.CONTACT_NUMBER') }}</p>
								</div>
							    </div>
							    
							    <div class="row d-none">
								<div class="col-md-3 d-flex justify-content-center align-items-center">
								    <i class="mdi mdi-email" style="font-size: 3em;color: #f2b252;"></i>
								</div>
								<div class="col-md-9">
								<h4>Mail us for information</h4>
								<p>{{ config('app.CONTACT_MAIL') }}</p>
								</div>
							    </div>
					</div>
            </div>
            <div class="col-md-6">
                <img src="../storage/images/contact-us.png" class="img-fluid">
            </div>
            <div class="col-md-6">
                <form method="post" action="{{url('contact/save')}}" class="contact-form" style="
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
    padding: 20px;
">
                    {{ csrf_field() }}                   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label label-required">Fullname</label>
                                <input type="text" name="fullname" class="form-control" value="" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label label-required">Phone number</label>
                                <input type="text" name="phone" class="form-control" value="" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label label-required">Email address</label>
                                <input type="email" name="email" class="form-control" value="" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label label-required">Subject</label>
                                <input type="text" name="subject" class="form-control" value="" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label label-required">Content</label>
                                <textarea name="content" class="form-control" rows="4" required=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>      
    </div>
@stop
