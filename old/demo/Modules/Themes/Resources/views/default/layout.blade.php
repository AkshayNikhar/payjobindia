<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @includeWhen(config('app.GOOGLE_ANALYTICS'), 'core::partials.google-analytics')
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ __(config('app.name')) }} &mdash; {{ config('app.SITE_SLOGAN') }}</title>
        <meta name="description" content="{{ config('app.SITE_DESCRIPTION') }}">
        <meta name="keywords" content="{{ config('app.SITE_KEYWORDS') }}">
        <link rel="shortcut icon" href="{{ asset(config('app.logo_favicon')) }}">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700&display=swap">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{ Module::asset('themes:default/css/bootstrap.min.css') }}"  />
        <link rel="stylesheet" type="text/css" href="{{ Module::asset('themes:default/css/materialdesignicons.min.css') }}"  />
        <link rel="stylesheet" type="text/css" href="{{ Module::asset('themes:default/css/pe-icon-7-stroke.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ Module::asset('themes:default/fonts/icomoon/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ Module::asset('themes:default/owlcarousel2/assets/owl.carousel.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ Module::asset('themes:default/owlcarousel2/assets/owl.theme.default.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ Module::asset('themes:default/css/style.css') }}"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
       
        @stack('head')
    </head>
    <body data-spy="scroll" data-target="#navbarCollapse">
        @if (session('success'))
        <div class="alert alert-success border-radius-none">
            <i class="fas fa-check-circle text-success mr-2"></i> {!! session('success') !!}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger border-radius-none">
            <i class="fas fa-times text-danger mr-2"></i> {!! session('error') !!}
        </div>
        @endif
        @yield('content')
        @if(config('app.ads_footer_layout_themes'))
         <section class="mb-4">
             <div class="container">
                 <div class="row">
                     <div class="ads-home-page">
                        {{ config('app.ads_footer_layout_themes') }}
                     </div>
                 </div>
             </div>
         </section>
         @endif
        <!--Footer Main-->
        <footer class="main-footer p-5">
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="col-md-4 d-none">
                    <h3>About Us</h3>
                    <p>
                        {{ config('app.SITE_DESCRIPTION') }}
                    </p>
                    <p><i class="mdi mdi-clock"></i> Monday -Sturday at 09am-6pm</p>
                    <p><i class="mdi mdi-home"></i> {{ config('app.CONTACT_ADDRESS') }}</p>
                </div>
                <div class="col-md-3">
                    <h3>Quick Links</h3>
                    <ul class="p-0 footerlist">
                        <li><a href="{{ url('/') }}" class="quicklinks">Home</a></li>
                        <li><a href="{{ url('/page/about') }}" class="quicklinks">About Us</a></li>
                        <li><a href="{{ url('/jobs') }}" class="quicklinks">Jobs</a></li>
                        <li><a href="{{ url('/') }}" class="quicklinks">Blog</a></li>
                        <li><a href="{{ url('/contact') }}" class="quicklinks">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>Browse Categories</h3>
                    <ul class="p-0 footerlist">
                        <li><a href="{{ url('/') }}" class="quicklinks">By City</a></li>
                        <li><a href="{{ url('/') }}" class="quicklinks">By Department</a></li>
                        <li><a href="{{ url('/') }}" class="quicklinks">Post Your Resume</a></li>
                        <li><a href="{{ url('/') }}" class="quicklinks">Post Your Job</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>Policies</h3>
                    <ul class="p-0 footerlist">
                        <li><a href="{{ url('/') }}" class="quicklinks">Privacy policy</a></li>
                        <li><a href="{{ url('/') }}" class="quicklinks">Terms & Conditions</a></li>
                        <li><a href="{{ url('/') }}" class="quicklinks">Refund Policy</a></li>
                        <li><a href="{{ url('/') }}" class="quicklinks">Sitemap</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>Get In Touch</h3>
                    <p><i class="fa fa-envelope"></i> support@payjobindia.com</p>
                    <h3>Newsletters</h3>
                    <p>Sign up for our mailing list to get latest updates and offers.</p>
                    <form class="form-inline">
                            <input type="text" placeholder="Your email" class="form-control">
                            <button class="btn btn-warning"><i class="mdi mdi-send"></i></button>
                    </form>
                    <h5 class="text-white mt-2">Follow us on: </h5>
                    <div class="row mt-2 social-icon-one">
                        <a href="{{ config('app.FACEBOOK_URL') }}"><i class="mdi mdi-facebook"></i></a>
                        <a href="{{ config('app.TWITTER_URL') }}"><i class="mdi mdi-twitter"></i></a>
                        <a href="{{ config('app.INSTAGRAM_URL') }}"><i class="mdi mdi-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>    
        </footer>
        <!-- START FOOTER -->
        <section class="py-4 footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-5 col-sm-6">
                        <p class="mb-0 f_400 text-white">@lang('Copyright') © {{ now()->year }} @lang('Design by') <a href="{{ url('/') }}" style="color:white">{{ __(config('app.name')) }}</a></p>
                    </div>
                    
                    <div class="col-lg-6 col-md-4 col-sm-12">
                        <ul class="list-unstyled f_menu text-right">
                            {{-- menuBottomSkins(['pagewebsites' => $pagewebsites]) --}}
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/page/about') }}">About Us</a></li>
                            <li><a href="{{ url('/jobs?jobtype=5') }}">Intership</a></li>
                            <li><a href="{{ url('/jobs') }}">Jobs</a></li>
                            <!--<li><a href="{{ url('/contact') }}">Contact</a></li>-->
                            <li><a href="{{ url('/page/privacy-policy') }}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- END FOOTER -->
        <script src="{{ Module::asset('themes:default/js/jquery.min.js') }}"></script>
        <script src="{{ Module::asset('themes:default/js/bootstrap.bundle.min.js') }}"></script>
         <script src="{{ Module::asset('themes:default/owlcarousel2/owl.carousel.min.js') }}"></script>
        <script src="{{ Module::asset('themes:default/js/jquery.easing.min.js') }}"></script>
        <script src="{{ Module::asset('themes:default/js/jquery.mb.YTPlayer.js') }}"></script>
        <script src="{{ Module::asset('themes:default/js/contact.init.js') }}"></script>
        <script src="{{ Module::asset('themes:default/js/counter.init.js') }}"></script>
        @stack('scripts')
        <script src="{{ Module::asset('themes:default/js/app.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function(){
              window.addEventListener('scroll', function() {
                  if (window.scrollY > 50) {
                    document.getElementById('navbar_top_blue').classList.add('fixed-top');
                    // add padding top to show content behind navbar
                    navbar_height = document.querySelector('.navbar').offsetHeight;
                    document.body.style.paddingTop = navbar_height + 'px';
                  } else {
                    document.getElementById('navbar_top_blue').classList.remove('fixed-top');
                     // remove padding top from body
                    document.body.style.paddingTop = '0';
                    
                  } 
              });
            }); 
        </script>
    </body>
</html>