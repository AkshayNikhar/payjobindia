@extends('themes::default.layout') @section('content') @include('themes::default.nav')
<!--HERO-->
<section class="section-hero">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-lg-8">
				<div class="hero-text-box">
					<div class="row align-items-center">
						<div class="col-lg-9">
							<h4>INDIA’S #1 JOB PLATFORM </h4>
							<h1 class="heading-primary mt-2">Discover Your Dream Job with Us : Your Ultimate Destination for Career Opportunities</h1>
						</div>
						<div class="col-lg-3"><a href="" class="btn btn-lg btn-primary btn-round">Hire Now</a> <a href="" class="btn btn-lg btn-primary btn-round">Get a Job</a></div>
					</div>
					<div class="banner-form-area">
						<form>
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Job Title, Keyword">
										<label> <i class="icofont-search-1"></i> </label>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label> <i class="icofont-location-pin"></i> </label>
										<select class="form-select" aria-label="Default select example">
											<option value="" selected hidden>State</option>
											<option value="">Maharashtra</option>
											<option value="">Gujrat</option>
											<option value="">Karnataka</option>
											<option value="">Punjab</option>
											<option value="">Bihar</option>
											<option value="">West Bengal</option>
											<option value="">Assam</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label> <i class="icofont-location-pin"></i> </label>
										<select class="form-select" aria-label="Default select example">
											<option value="" selected hidden>City</option>
											<option value="">Nagpur</option>
											<option value="">Mumbai</option>
											<option value="">Pune</option>
											<option value="">Amritsar</option>
											<option value="">Delhi</option>
											<option value="">Chandigarh</option>
											<option value="">Raipur</option>
										</select>
									</div>
								</div>
							</div>
							<button type="submit" class="btn banner-form-btn">Find Jobs</button>
						</form>
					</div>
					<div class="col-lg-12">
						<section class="deals mt-2">
							<div class="card-block">
								<div class="cat-slider owl-carousel owl-theme">
									<div class="item"> <span class="badge badge-pill badge-primary1">IT Job</span> </div>
									<div class="item"> <a href=""><span class="badge badge-pill badge-primary1">Marketing</span></a> </div>
									<div class="item"> <a href=""><span class="badge badge-pill badge-primary1">Graphic Design</span></a> </div>
									<div class="item"> <a href=""><span class="badge badge-pill badge-primary1">Web Developer</span></a> </div>
									<div class="item"> <a href=""><span class="badge badge-pill badge-primary1">Animation</span></a> </div>
									<div class="item"> <a href=""><span class="badge badge-pill badge-primary1"> Multimedia</span></a> </div>
									<div class="item"> <a href=""><span class="badge badge-pill badge-primary1">Human Resource</span></a> </div>
									<div class="item"> <a href=""><span class="badge badge-pill badge-primary1">Marketing</span></a> </div>
									<div class="item"> <a href=""><span class="badge badge-pill badge-primary1">Graphic Design</span></a> </div>
								</div>
							</div>
						</section>
						<p class="hero-description"> Unlock 50 Lakh+ Career Opportunities Await You </p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-lg-4 d-none d-lg-block"> <img src="https://demo.payjobindia.com/storage/images/job-portal1.png" alt="" class="hero-img" /> </div>
		</div>
	</div>
	</div>
</section>
<!--HERO-->
<!-- Start HOME -->
<!-- END HOME -->
<div class="row p-5">
	<div class="col-md-8">
		<!-- START Latest Jobs -->
		<section class="section pt-2">
			<div class="container">
				<!--<div class="row pb-4 pt-4 mb-2" style="background: url('{{url('/')}}/modules/themes/default/images/pattern-13.jpeg');border-top: 3px solid orange;">-->
				<div class="row" style="">
					<div class="col-lg-12">
						<div class="text-start">
							<h3 class="mb-0 text-primary">@lang('View All Latest Jobs')</h3> </div>
					</div>
				</div>
				<div class="row mb-4">
					<div class="col-md-12">
						<div class="row"> @foreach($lastestJobs as $job)
							<div class="col-md-12"> @include('themes::default.includes.item_job_side', ['job' => $job]) </div> @endforeach </div>
					</div>
				</div>
				<div class="btn-homepage-center"><a href="{{ route('jobslist', ['lastest' => '1']) }}" class="btn btn-warning text-white" style="border-radius: 25px !important;">@lang('View All Latest Jobs')</a></div>
			</div>
		</section>
		<!-- END Latest Jobs -->
	</div>
	<div class="col-md-4">
		<!-- START Featured Jobs -->
		<section class="section pt-2 pb-2">
			<!--<div class="container mb-2 pb-4" style="border: 1px solid #e7e7e7;">-->
			<div class="container mb-1 pb-1" style="">
				<!--<div class="row pb-4 pt-4"  style="background: url('{{url('/')}}/modules/themes/default/images/pattern-13.jpeg');border-top: 3px solid orange;">-->
				<div class="row" style="">
					<div class="col-lg-12">
						<div class="bg-primary text-white" >
							<h4 class="mb-0 text-center">@lang('Featured Job')</h4> </div>
					</div>
				</div>
				<div class="row mb-1">
					<div class="col-md-12">
						<div class="row"> @foreach($featuredJobs as $job)
							<div class="col-md-12"> @include('themes::default.includes.item_job_short', ['job' => $job]) </div> @endforeach </div>
					</div>
				</div>
			</div>
		</section>
		<!-- END Featured Jobs -->
		<!-- START Internship -->
		<section class="section pt-2 pb-2">
			<div class="container mb-1 pb-1" style="">
				<div class="row" style="">
					<div class="col-lg-12">
						<div class="bg-primary text-white">
							<h4 class="mb-0 text-center">@lang('Internship')</h4> </div>
					</div>
				</div>
				<div class="row mb-1">
					<div class="col-md-12">
						<div class="row"> @foreach($featuredJobs as $job)
							<div class="col-md-12"> @include('themes::default.includes.item_job_short', ['job' => $job]) </div> @endforeach </div>
					</div>
				</div>
			</div>
		</section>
		<!-- END Internship -->
		<!-- START WFH -->
		<section class="section pt-2 pb-2">
			<div class="container mb-1 pb-1" style="">
				<div class="row" style="">
					<div class="col-lg-12">
						<div class="bg-primary text-white">
							<h4 class="mb-0 text-center">@lang('Work From Home')</h4> </div>
					</div>
				</div>
				<div class="row mb-1">
					<div class="col-md-12">
						<div class="row"> @foreach($featuredJobs as $job)
							<div class="col-md-12"> @include('themes::default.includes.item_job_short', ['job' => $job]) </div> @endforeach </div>
					</div>
				</div>
			</div>
		</section>
		<!-- END WFH -->
	</div>
</div> @isset($companies)
<!-- START Featured Companies -->
<section class="section sectionlogo bg-light-blue mb-3">
	<div class="container">
		<div class="row mb-4">
			<div class="col-lg-12">
				<div class="text-center">
					<h3 class="mb-0">@lang('Featured Companies')</h3> </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="owl-carousel"> @foreach($companies as $company)
					<div class="item">
						<div class="employer-card text-center align-items-center justify-content-center d-flex"> <a href="{{ route('company', ['slug' => $company->slug]) }}" title="Company name" class="text-center">
                                        <img src="{{ URL::to('/') }}/storage/user_storage/{{ $company->user->id. "/". $company->logo }}" alt="Connect People" title="Connect People" style="border-radius: 50px;padding: 5px;height:100px; width:100px">
                                        <br/>
                                        <!--<h5>{{$company->company_name}}</h5>-->
                                        </a> </div>
					</div> @endforeach </div>
			</div>
		</div>
	</div>
</section>
<!-- END Featured Companies -->@endisset
<section class="mt-5 mb-4">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Hire from 50+ Job Categories</h2>
				<div class="mt-4"> <a href=""><span class="badge badge-pill badge-primary mb-2">Agriculture and Food</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Audiologist</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Law</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Corporate Law</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Advertising</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Public Relations</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Media Management</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Film Making</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Publishing & Printing</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Radio Jockeying</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Electronic Journalism</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Print Journalism</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Media Studies</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">TV Anchoring</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Acting</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Copywriting</span></a> <span class="moretext">
                    <a href=""><span class="badge badge-pill badge-primary mb-2">Creative Writing</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Fashion Journalism</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Internet Journalism</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Journalism</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Sports Journalism</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Hindi Journalism</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">English Journalism</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Urdu Journalism</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Reporter</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Photographer</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Actor</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Journalist</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Script writer</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Dancer</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Choreographer</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Disc Jockey</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Model</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Dramatics</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Cartoonist</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Hair Stylist</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Pedicurist and Manicurist</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Make Up Artist</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Mehendi Artist</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Skin Specialist</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Nail/ Tatoo artist</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Spa Therapist</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Beauty Wellness Advisor/Consultant</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Barber</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Leather Designer</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Footwear Cutter</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Leather goods Stitcher</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Tailoring</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Fashion Designer</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Fabric Cutter</span></a> </span> <a class="moreless-button" href="javascript:void()">Show All</a> </div>
			</div>
		</div>
	</div>
</section>
<!--<section class="section pt-5 bg-light" id="how-it-work">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h2 class="mb-0">@lang('How Create Resume-CV Online')</h2>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-4">
                    <div class="work-box text-center p-3">
                        <div class="arrow">
                            <img src="{{ Module::asset('themes:default/images/arrow-1.png') }}" alt="">
                        </div>
                        <div class="work-count">
                            <p class="mb-0">1</p>
                        </div>
                        <div class="work-icon">
                            <i class="pe-7s-file"></i>
                        </div>
                        <h5 class="mt-4">@lang('Select a template')</h5>
                        <p class="text-muted mt-3">
                           @lang('Choose from a selection of recruiter-approved layout designs for different job types')
                        </p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="work-box text-center p-3">
                        <div class="arrow">
                            <img src="{{ Module::asset('themes:default/images/arrow-2.png') }}" alt="">
                        </div>
                        <div class="work-count">
                            <p class="mb-0">2</p>
                        </div>
                        <div class="work-icon">
                            <i class="pe-7s-pen"></i>
                        </div>
                        <h5 class="mt-4">@lang('Optimize Your Content')</h5>
                        <p class="text-muted mt-3">
                            @lang('And adding or removing a specific section based on your needs is no problem and you get layout and content suggestions so that your resume looks perfect')
                        </p>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="work-box text-center p-3">
                        <div class="work-count">
                            <p class="mb-0">3</p>
                        </div>
                        <div class="work-icon">
                            <i class="pe-7s-user"></i>
                        </div>
                        <h5 class="mt-4">@lang('Publish or Download PDF')</h5>
                        <p class="text-muted mt-3">
                            @lang('Once your content is finished, you can publish link or dowwnload PDF. Your latest version is saved and you can always go back to make edits.')
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>-->
<!-- START COUNTER -->
<section class="section pt-5">
	<div class="container">
		<div class="row" id="counter">
			<div class="col-lg-6">
				<div class="counter-info mt-4">
					<h2>@lang('Trusted by 10,000+ employer')</h2>
					<p class="text-muted mt-4">@lang('Discover why more than 10,000 employer choose') {{ __(config('app.name')) }}.</p>
					<p>Join the ranks of satisfied employers who have chosen Pay Job India as their workforce partner. Discover the difference that a reliable and forward-thinking workforce solution can make for your business.</p>
					<div class="mt-4 mb-4"> <a href="{{ route('login') }}" class="btn btn-primary">@lang('Login Now')  <i class="mdi mdi-arrow-right"></i></a> </div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row">
					<div class="col-lg-6">
						<div class="ccounter blue">
							<div class="ccounter-icon"><i class="mdi mdi-emoticon-outline"></i></div>
							<div class="ccounter-content"> <span class="ccounter-value">10000 </span>+
								<h3>Employer</h3> </div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="ccounter blue1">
							<div class="ccounter-icon"><i class="mdi mdi-flag"></i></div>
							<div class="ccounter-content"> <span class="ccounter-value">24</span>
								<h3>Languages</h3> </div>
						</div>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-lg-6">
						<div class="ccounter blue1">
							<div class="ccounter-icon"><i class="pe-7s-note2"></i></div>
							<div class="ccounter-content"> <span class="ccounter-value">20000</span>
								<h3>Jobs</h3> </div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="ccounter blue">
							<div class="ccounter-icon"><i class="mdi mdi-timer"></i></div>
							<div class="ccounter-content"> <span class="ccounter-value">5</span>
								<h3>Years of exp</h3> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END COUNTER -->
<!--HIRE FROM CITIES-->
<section class="mt-3 mb-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Hire from 750+ Cities</h2>
				<div class="mt-4"> <a href=""><span class="badge badge-pill badge-primary mb-2">Mumbai</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Delhi</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Bangalore</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Hyderabad</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Ahmedabad</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Chennai</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Kolkata</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Surat</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Pune</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Jaipur</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Lucknow</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Kanpur</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Nagpur</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Indore</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Thane</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Bhopal</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Visakhapatnam</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Pimpri-Chinchwad</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Patna</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Vadodara</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Ghaziabad</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Ludhiana</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Agra</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Nashik</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Faridabad</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Meerut</span></a> <span class="moretext1">
                    <a href=""><span class="badge badge-pill badge-primary mb-2">Rajkot</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Kalyan-Dombivali</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Vasai-Virar</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Varanasi</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Srinagar</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Aurangabad</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Dhanbad</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Amritsar</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Navi Mumbai</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Allahabad</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Howrah</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Ranchi</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Jabalpur</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Indore</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Thane</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Bhopal</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Visakhapatnam</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Pimpri-Chinchwad</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Patna</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Vadodara</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Ghaziabad</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Ludhiana</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Agra</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Nashik</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Faridabad</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Gwalior</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Coimbatore</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Vijayawada</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Jodhpur</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Madurai</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Raipur</span></a> <a href=""><span class="badge badge-pill badge-primary mb-2">Kota</span></a> </span> <a class="moreless-button1" href="javascript:void()">Show All</a> </div>
			</div>
		</div>
	</div>
</section>
<!--HIRE FROM CITIES-->
<!-- START WHY -->
<section class="section50 bg-light-blue" id="services">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title-box text-center">
					<h2 class="mb-0">@lang('Why Should Use') {{ config('app.name')}}?</h2>
					<p class="mt-2"><b>At Pay Job India, we understand the significance of finding the right job that aligns with your skills and aspirations. Here's why you should make us your go-to platform for all your job search needs:</b></p>
				</div>
			</div>
		</div>
		<div class="row mt-5 mb-5">
			<div class="col-md-4 col-sm-6 mb-3">
				<div class="serviceBox">
					<div class="service-content"> <i class="service-icon pe-7s-search"></i>
						<h3 class="title">Effortless Job Search</h3>
						<p class="description"> Explore diverse job opportunities tailored to your skills and ambitions. </p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 mb-3">
				<div class="serviceBox">
					<div class="service-content"> <i class="service-icon pe-7s-news-paper"></i>
						<h3 class="title">Seamless Application Process</h3>
						<p class="description"> Apply to multiple jobs with just a few clicks, saving you time and energy. </p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 mb-3">
				<div class="serviceBox">
					<div class="service-content"> <i class="service-icon pe-7s-check"></i>
						<h3 class="title">Job Security Priority</h3>
						<p class="description"> Connect with reputable employers for a secure job-seeking experience. </p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 mb-3">
				<div class="serviceBox">
					<div class="service-content"> <i class="service-icon pe-7s-note2"></i>
						<h3 class="title">Professional CV Creation</h3>
						<p class="description"> Craft an impressive CV effortlessly with our user-friendly tools. </p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 mb-3">
				<div class="serviceBox">
					<div class="service-content"> <i class="service-icon pe-7s-paper-plane"></i>
						<h3 class="title">Easy CV Publication</h3>
						<p class="description"> Showcase your skills to potential employers by easily publishing your CV on our platform. </p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 mb-3">
				<div class="serviceBox">
					<div class="service-content"> <i class="service-icon pe-7s-call"></i>
						<h3 class="title">Dedicated Online Support</h3>
						<p class="description"> Receive assistance and guidance throughout your job search journey. </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END WHY -->
<!--START TESTIMONIAL-->
<!--END TESTIMONIAL-->@stop @push('scripts')
<script type="text/javascript">
var url_search_home_page = "{{ route('jobslist', ['q' => ':q']) }}";
</script>
<script>
$(document).ready(function() {
	$('.ccounter-value').each(function() {
		$(this).prop('Counter', 0).animate({
			Counter: $(this).text()
		}, {
			duration: 7000,
			easing: 'swing',
			step: function(now) {
				$(this).text(Math.ceil(now));
			}
		});
	});
});
</script>
<script>
$('.cat-slider').owlCarousel({
	loop: true,
	margin: 10,
	nav: true,
	dots: false,
	responsive: {
		0: {
			items: 2
		},
		600: {
			items: 3
		},
		1000: {
			items: 5
		}
	}
})
</script>
<script>
$('.moreless-button').click(function() {
	$('.moretext').slideToggle();
	if($('.moreless-button').text() == "Show All") {
		$(this).text("Show Less")
	} else {
		$(this).text("Show All")
	}
});
</script>
<script>
$('.moreless-button1').click(function() {
	$('.moretext1').slideToggle();
	if($('.moreless-button').text() == "Show All") {
		$(this).text("Show Less")
	} else {
		$(this).text("Show All")
	}
});
</script>
<script>
$(document).ready(function() {
	$('.functionalAreaPicker').selectpicker();
	$('.cityPicker').selectpicker();
});
</script> @endpush