@extends('themes::default.layout')


@section('content')

@include('themes::default.nav')

<style>
    /*.dropdown {*/
    /*    border: 1.5px solid darkgray !important;*/
    /*}*/
</style>

<!-- slider-->
<!--<div id="hero-slider" class="hero-slider owl-carousel owl-theme">
    <div class="single-hs-item" style="background-image: url(http://jobcap.in/public/newassets/images/image-1.jpg);">
        <div class="d-table">
            <div class="d-tablecell">
                <div class="hero-text">
                    <h1>Welcome To JobCap</h1>
                    <h4 class="text-white">Better Solutions At Your Fingertips.</h4>
                    <div class="slider-btn">
                    <a href="#" class="custom-btn1">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!--slider ends-->
 <!-- Start HOME -->
    <section class="bg-home pt-4 p-2" id="home" style="background-image: url({{ asset(config('app.logo_light')) }});">
        <div class="home-center">
            <div class="home-desc-center">
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h3><strong class="text-white">@lang('Discover now all best jobs') {{-- config('app.name')--}}</strong></h3>
                                </div>
                            </div>
                            <form id="form_search_home_page" action="javascript:void(0);">
                                <div class="row">
                                    
                                        <div class="form-group col-md-5">
                                            <input class="form-control" value="" placeholder="@lang('Job title, position you want to apply for')" id="keyword" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select class="form-control selectpicker cityPicker" id="city"  tabindex="-1" aria-hidden="true" data-live-search="true" data-style="btn-white">
                                                <option value="" class="dropdown-item">@lang('All location')</option>
                                                @foreach($cities as $city)
                                                <option value="{{ $city->id }}" class="dropdown-item">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--<div class="form-group col-md-3">-->
                                        <!--    <select class="form-control selectpicker functionalAreaPicker" id="category"  tabindex="-1" aria-hidden="true" data-live-search="true" data-style="btn-white">-->
                                        <!--        <option value="" class="dropdown-item">@lang('All Functional Area')</option>-->
                                        <!--        @foreach($functional_areas as $functional_area)-->
                                        <!--        <option value="{{ $functional_area->id }}" class="dropdown-item">{{ $functional_area->name }}</option>-->
                                        <!--        @endforeach-->
                                        <!--    </select>-->
                                        <!--</div>-->
                                        <div class="col-md-2 form-group col-button">
                                            <button class="btn btn-primary"><i class="pe-7s-search"></i> @lang('Find job')</button>
                                        </div>
                                    
                                    </div>
                                </div>
                            </form>
                        
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </section>
    @if(config('app.ads_home_page_below_jobs_search'))
     <section class="mb-4">
         <div class="container">
             <div class="row">
                 <div class="ads-home-page">
                    {{ config('app.ads_home_page_below_jobs_search') }}
                 </div>
             </div>
         </div>
     </section>
     @endif
   
    <!-- END HOME -->
    
    <div class="row p-5" style="margin-top: -5%;">
    <div class="col-md-8">
    <!-- START Latest Jobs -->
     <section class="section pt-5">
         <div class="container">
            <!--<div class="row pb-4 pt-4 mb-2" style="background: url('{{url('/')}}/modules/themes/default/images/pattern-13.jpeg');border-top: 3px solid orange;">-->
            <div class="row" style="">
                <div class="col-lg-12">
                     <div class="text-start">
                         <h4 class="mb-0 text-danger">@lang('Latest Jobs')</h4>
                     </div>
                </div>
                <!--<div class="col-lg-12">-->
                <!--    <div class="col-md-12">-->
                <!--        <h4><strong style="color:#1555d6">@lang('Find Your Category Job')</strong></h4>-->
                <!--    </div>-->
                <!--    <div style="" class="pt-4 pl-4">-->
                <!--        <form id="form_search_home_page" action="javascript:void(0);">-->
                <!--            <div class="row">-->
                <!--                <div class="form-group col-md-5">-->
                <!--                    <input class="form-control" value="" placeholder="@lang('Job title, position you want to apply for')" id="keyword" autocomplete="off" style="border: 1.5px solid darkgray !important;">-->
                <!--                </div>-->
                <!--                <div class="form-group col-md-4">-->
                <!--                    <select class="form-control selectpicker cityPicker" id="city"  tabindex="-1" aria-hidden="true" data-live-search="true" data-style="btn-white">-->
                <!--                        <option value="" class="dropdown-item">@lang('All location')</option>-->
                <!--                        @foreach($cities as $city)-->
                <!--                        <option value="{{ $city->id }}" class="dropdown-item">{{ $city->name }}</option>-->
                <!--                        @endforeach-->
                <!--                    </select>-->
                <!--                </div>-->
                <!--                <div class="form-group col-md-3">-->
                <!--                    <select class="form-control selectpicker functionalAreaPicker" id="category"  tabindex="-1" aria-hidden="true" data-live-search="true" data-style="btn-white">-->
                <!--                        <option value="" class="dropdown-item">@lang('All Functional Area')</option>-->
                <!--                        @foreach($functional_areas as $functional_area)-->
                <!--                        <option value="{{ $functional_area->id }}" class="dropdown-item">{{ $functional_area->name }}</option>-->
                <!--                        @endforeach-->
                <!--                    </select>-->
                <!--                </div>-->
                <!--                <div class="col-md-3 form-group col-button">-->
                <!--                    <button class="btn btn-primary" style="background-color: #4353ff !important"><i class="pe-7s-search"></i> @lang('Find jobs')</button>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </form>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
             <div class="row mb-4">
                 <div class="col-md-12">
                     <div class="row">
                        @foreach($lastestJobs as $job)
                         <div class="col-md-12">
                            @include('themes::default.includes.item_job_side', ['job' => $job])
                         </div>
                        @endforeach
                     </div>
                 </div>
             </div>
             <div class="btn-homepage-center"><a href="{{ route('jobslist', ['lastest' => '1']) }}" class="btn btn-warning text-white" style="border-radius: 25px !important;">@lang('View All Latest Jobs')</a></div>
         </div>
     </section>
    <!-- END Latest Jobs -->
    </div>
    <div class="col-md-4">
    <!-- START Featured Jobs -->
     <section class="section pt-5">
        <!--<div class="container mb-2 pb-4" style="border: 1px solid #e7e7e7;">-->
        <div class="container mb-2 pb-4" style="">
            <!--<div class="row pb-4 pt-4"  style="background: url('{{url('/')}}/modules/themes/default/images/pattern-13.jpeg');border-top: 3px solid orange;">-->
            <div class="row"  style="">
                 <div class="col-lg-12">
                    <div class="">
                         <h4 class="mb-0 text-danger blink_me">@lang('Urgent Requirements')</h4>
                    </div>
                 </div>
             </div>
             <div class="row mb-4">
                 <div class="col-md-12">
                     <div class="row">
                         
                            @foreach($featuredJobs as $job)
                                <div class="col-md-12">
                                    @include('themes::default.includes.item_job_short', ['job' => $job])
                                 </div>
                            @endforeach
                        

                     </div>
                 </div>
             </div>
            
             <div class="btn-homepage-center"><a href="{{ route('jobslist', ['featured' => '1']) }}" class="btn btn-warning text-white" style="border-radius: 25px !important;">@lang('View All Urgent Requirements')</a></div>
         </div>
     </section>
    <!-- END Featured Jobs -->
    </div>
    </div>
    @isset($companies)
    <!-- START Featured Companies -->
    <section class="section bg-light mb-3">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h4 class="mb-0">@lang('Featured Companies')</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel">
                        @foreach($companies as $company)
                            <div class="item">
                                <div class="employer-card text-center align-items-center justify-content-center d-flex">
                                    <a href="{{ route('company', ['slug' => $company->slug]) }}" title="Company name" class="text-center">
                                        <img src="{{ URL::to('/') }}/storage/user_storage/{{ $company->user->id. "/". $company->logo }}" alt="Connect People" title="Connect People" style="border-radius: 50px;padding: 5px;height:100px; width:100px">
                                        <br/>
                                        <h5>{{$company->company_name}}</h5></a>         
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END Featured Companies -->
    @endisset
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
                <div class="col-lg-5">
                    <div class="counter-info mt-4">
                        <h3>@lang('Trusted by 10,000+ employer')</h3>
                        <p class="text-muted mt-4">@lang('Discover why more than 10,000 employer choose') {{ __(config('app.name')) }}.</p>
                        <div class="mt-4">
                            <a href="{{ route('login') }}" class="btn btn-primary">@lang('Login Now')  <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="counter-box mt-4">
                                <div class="media box-shadow bg-white p-4 rounded">
                                    <div class="counter-icon mr-3">
                                        <i class="mdi mdi-emoticon-outline text-primary h2"></i>
                                    </div>
                                    <div class="media-body pl-2">
                                        <h3 class="counter-count"> <span class="counter-value" data-count="10000">0</span>
                                            +</h3>
                                        <h5 class="mt-2 mb-0 f-17">@lang('Employer')</h5>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="counter-box mt-4">
                                <div class="media box-shadow bg-white p-4 rounded">
                                    <div class="counter-icon mr-3">
                                        <i class="mdi mdi-flag text-primary h2"></i>
                                    </div>
                                    <div class="media-body pl-2">
                                        <h3 class="counter-count"> <span class="counter-value" data-count="24">0</span>
                                        </h3>
                                        <h5 class="mt-2 mb-0 f-17">@lang('Languages')</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-lg-6">
                            <div class="counter-box mt-4">
                                <div class="media box-shadow bg-white p-4 rounded">
                                    <div class="counter-icon mr-3">
                                        <i class="pe-7s-note2 text-primary h2"></i>
                                    </div>
                                    <div class="media-body pl-2">
                                        <h3 class="counter-count"> <span class="counter-value"
                                                data-count="20000">0</span> +
                                        </h3>
                                        <h5 class="mt-2 mb-0 f-17">@lang('Jobs')</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="counter-box mt-4">
                                <div class="media box-shadow bg-white p-4 rounded">
                                    <div class="counter-icon mr-3">
                                        <i class="mdi mdi-timer text-primary h2"></i>
                                    </div>
                                    <div class="media-body pl-2">
                                        <h3 class="counter-count"> <span class="counter-value" data-count="5">0</span> +
                                        </h3>
                                        <h5 class="mt-2 mb-0 f-17">@lang('Years of expe'). </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END COUNTER -->
    <!-- START WHY -->
    <section class="section bg-light" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-box text-center">
                        <h2 class="mb-0">@lang('Why Should Use') {{ config('app.name')}}?</h2>
                    </div>
                </div>
            </div>


            <div class="row align-items-center mt-5">

                <div class="col-lg-6">
                    <div class="nav flex-column nav-pills mt-4">
                         <a class="nav-link">
                            <div class="p-3">
                                <div class="media">
                                    <div class="services-title">
                                        <i class="pe-7s-search"></i>
                                    </div>
                                    <div class="media-body pl-4">
                                        <h5 class="mb-2 services-title mt-2">@lang('Search Job')</h5>
                                        <p class="mb-0">@lang('Aenean sollicitudin, lorem quis bibendum auctor')</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="nav-link">
                            <div class="p-3">
                                <div class="media">
                                    <div class="services-title">
                                        <i class="pe-7s-note2"></i>
                                    </div>
                                    <div class="media-body pl-4">
                                        <h5 class="mb-2 services-title mt-2">
                                           @lang('Apply a Job')</h5>
                                        <p class="mb-0">@lang('Aenean sollicitudin, lorem quis bibendum auctor.')</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="nav-link">
                            <div class="p-3">
                                <div class="media">
                                    <div class="services-title">
                                        <i class="pe-7s-check"></i>
                                    </div>
                                    <div class="media-body pl-4">
                                        <h5 class="mb-2 services-title mt-2">@lang('Job Security')</h5>
                                        <p class="mb-0">@lang('Aenean sollicitudin, lorem quis bibendum auctor')</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                       
                        
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="nav flex-column nav-pills mt-4">
                        <a class="nav-link">
                            <div class="p-3">
                                <div class="media">
                                    <div class="services-title">
                                        <i class="pe-7s-note2"></i>
                                    </div>
                                    <div class="media-body pl-4">
                                        <h5 class="mb-2 f-18 services-title mt-2">@lang('Create Resume or CV')</h5>
                                        <p class="mb-0">@lang('Aenean sollicitudin, lorem quis bibendum auctor')</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="nav-link">
                            <div class="p-3">
                                <div class="media">
                                    <div class="services-title">
                                        <i class="pe-7s-paper-plane"></i>
                                    </div>
                                    <div class="media-body pl-4">
                                        <h5 class="mb-2 f-18 services-title mt-2">@lang('Easy Publish Resume or CV')</h5>
                                        <p class="mb-0">@lang('Aenean sollicitudin, lorem quis bibendum auctor')</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="nav-link">
                            <div class="p-3">
                                <div class="media">
                                    <div class="services-title">
                                        <i class="pe-7s-call"></i>
                                    </div>
                                    <div class="media-body pl-4">
                                        <h5 class="mb-2 services-title mt-2">@lang('Happy Support')</h5>
                                        <p class="mb-0">@lang('Aenean sollicitudin, lorem quis bibendum auctor')</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- END WHY -->
    
@stop

@push('scripts')
<script type="text/javascript">
    var url_search_home_page = "{{ route('jobslist', ['q' => ':q']) }}";
</script>
<script>
$(document).ready(function () {
  $('.functionalAreaPicker').selectpicker();
   $('.cityPicker').selectpicker();
});
</script>
@endpush