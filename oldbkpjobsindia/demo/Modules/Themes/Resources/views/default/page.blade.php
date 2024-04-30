@extends('themes::default.layout')
@section('content')
@include('themes::default.nav')

<!-- START PRICING -->
    <section class="section-sm p-5" style="background:url({{url('/modules/themes/default/images/banner-small.jpeg')}});">
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-box text-center">
                        <h3 class="title-heading mt-4 text-white">{{$page->title}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container mb-5">
            <div class="row mt-5 pt-4 text-justify ">
                <!--{!!$page->description!!}-->
                <p>Pay Job India is a Job placement company that helps to connect job seekers with employers looking to fill open positions. We recruit, screen, and place candidates in various industries. They work with businesses of all sizes, offering temporary, contract, part-time, or full-time positions.</p>
<p>Our company offers several benefits to both job seekers and employers. These firms provide job seekers access to a broader range of job opportunities, guidance on resumes and interviews, and sometimes career counselling or training. Pay Job India has relationships with multiple companies and can match candidates with positions that align with their skills and preferences.</p>
<p>Employers benefit from job placement companies by saving time and resources in the hiring process. These firms handle the initial steps of recruitment, including sourcing candidates, conducting initial interviews, and assessing their qualifications. This can streamline the hiring process for employers, allowing them to focus on final interviews and selecting the best-fit candidates.</p>
<p>Our company acts as an intermediary, facilitating connections between job seekers and employers to find the right fit.</p>
            </div>
    </div>
    <!-- START WHY -->
<section class="section50 bg-light-blue" id="services">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title-box text-center">
					<h2 class="mb-0">@lang('Why Should Choose') {{ config('app.name')}}?</h2>
					<p class="mt-2"><b>Pay job India gives employer (companies) a direct option to choose the right candidate according to their qualification and company need. Our company provides the best platform to select the candidate of the company’s interest. The company can get all the information about the candidate and on behalf of this, it chooses the right candidate for the company’s requirement.</b></p>
				</div>
			</div>
		</div>
		
		<div class="row mt-5 mb-5">
        <div class="col-md-4 col-sm-6 mb-3">
            <div class="serviceBox">
                <div class="service-content">
                    <i class="service-icon pe-7s-search"></i>
                    <h3 class="title">Effortless Job Search</h3>
                    <p class="description">
                        Explore diverse job opportunities tailored to your skills and ambitions.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
            <div class="serviceBox">
                <div class="service-content">
                    <i class="service-icon pe-7s-news-paper"></i>
                    <h3 class="title">Seamless Application Process</h3>
                    <p class="description">
                        Apply to multiple jobs with just a few clicks, saving you time and energy.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
            <div class="serviceBox">
                <div class="service-content">
                    <i class="service-icon pe-7s-check"></i>
                    <h3 class="title">Job Security Priority</h3>
                    <p class="description">
                        Connect with reputable employers for a secure job-seeking experience.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
            <div class="serviceBox">
                <div class="service-content">
                    <i class="service-icon pe-7s-note2"></i>
                    <h3 class="title">Professional CV Creation</h3>
                    <p class="description">
                        Craft an impressive CV effortlessly with our user-friendly tools.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
            <div class="serviceBox">
                <div class="service-content">
                    <i class="service-icon pe-7s-paper-plane"></i>
                    <h3 class="title">Easy CV Publication</h3>
                    <p class="description">
                        Showcase your skills to potential employers by easily publishing your CV on our platform.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
            <div class="serviceBox">
                <div class="service-content">
                    <i class="service-icon pe-7s-call"></i>
                    <h3 class="title">Dedicated Online Support</h3>
                    <p class="description">
                       Receive assistance and guidance throughout your job search journey.
                    </p>
                </div>
            </div>
        </div>
    </div> 
		
	</div>
</section>
<!-- END WHY -->

@stop