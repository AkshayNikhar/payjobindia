<!--top header-->
<?php
    $mail = config('app.CONTACT_MAIL'); 
    $contact = config('app.CONTACT_NUMBER');
?>
<div class="top-header">
    <div class="container">
        <div class="d-flex">
          <div class="mr-auto p-2 text-white">Welcome To {{ config('app.name')}}</div>
          <div class="p-2" style="color: #f5a434;">
               @if(!empty($mail))
                <i class="mdi mdi-email-outline micons"></i>
              @endif
              {{ config('app.CONTACT_MAIL') }}
            </div>
            <div class="p-2" style="color: #f5a434;font-size: 14px;">
              @if(!empty($contact))
              <i class="mdi mdi-phone micons"></i> 
              @endif
              {{ config('app.CONTACT_NUMBER') }}
            </div>
          <div class="p-2"><a href="{{ config('app.TWITTER_URL') }}"><i class="mdi mdi-twitter text-white"></i></a></div>
          <div class="p-2"><a href="{{ config('app.FACEBOOK_URL') }}"><i class="mdi mdi-facebook text-white"></i></a></div>
          <div class="p-2"><a href="{{ config('app.INSTAGRAM_URL') }}"><i class="mdi mdi-instagram text-white"></i></a></div>
        </div>
    </div>
</div>
<!--top header ends-->
<!--mid header-->
<div class="mid-header">
    <!--<div class="container">-->
        <!--<div class="row">-->
            <!--<div class="col-md-6">-->
            <!--    <a class="navbar-brand logo text-uppercase" href="{{ url('/') }}">-->
            <!--    <img src="{{ asset(config('app.logo_frontend'))}}" alt="" height="50">-->
            <!--    </a>-->
            <!--</div>-->
            <?php
                // $mail = config('app.CONTACT_MAIL'); 
                // $contact = config('app.CONTACT_MAIL');
            ?>
            <!--<div class="col-md-3">-->
            <!--    <div class="row align-items-center">-->
            <!--        <div class="d-flex align-items-center">-->
            <!--            @if(!empty($mail))-->
            <!--            <i class="mdi mdi-email-outline micons"></i>-->
            <!--            @endif-->
            <!--        </div> -->
            <!--      <div>-->
            <!--          <h6>{{ config('app.CONTACT_MAIL') }}</h6>-->
            <!--      </div> -->
            <!--  </div>-->
            <!--</div>-->
            <!--<div class="col-md-3">-->
            <!--    <div class="row align-items-center">-->
            <!--      <div class="d-flex align-items-center">-->
            <!--           @if(!empty($contact))-->
            <!--            <i class="mdi mdi-phone micons"></i>-->
            <!--           @endif-->
            <!--      </div> -->
            <!--      <div>-->
            <!--          <h6>{{ config('app.CONTACT_NUMBER') }}</h6>-->
            <!--      </div> -->
            <!--  </div>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
<!--mid header ends-->
<!-- Static navbar -->
<nav class="navbar navbar-expand-lg navbar-custom sticky sticky-dark" id="navbar_top_blue">
    <div class="container">
        <a class="navbar-brand logo text-uppercase" href="{{ url('/') }}">
            <img src="{{ asset(config('app.logo_frontend'))}}" alt="" height="50">
        </a>
                
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="mdi mdi-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav navbar-center">
                {{-- menuHeaderSkins() --}}
                 <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <strong>Home</strong>
                        </a>
                </li>
                 <li class="nav-item">
                        <a class="nav-link" href="{{ url('/page/about') }}">
                            <strong>About Us</strong>
                        </a>
                </li>
                 <li class="nav-item">
                        <a class="nav-link" href="{{ url('/jobs?jobtype=3') }}">
                            <strong>Internships</strong>
                        </a>
                </li>
                 <!--<li class="nav-item">
                        <a class="nav-link" href="{{ url('/jobs') }}">
                            <strong>Jobs</strong>
                        </a>
                </li>-->
                 <li class="nav-item" style>
                        <a class="nav-link" href="{{ url('/login') }}">
                            <strong class="text-warning">Post Jobs</strong>
                        </a>
                </li>
                 <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">
                            <strong>Contact Us</strong>
                        </a>
                </li>
            @auth
                @can('admin')
                    <li class="nav-item">
                        <a class="nav-link text-lowercase" href="{{ route('settings.dashboard') }}">
                            <strong>{{ $user->name }}</strong>
                        </a>
                    </li>
                @endcan
                @can('candidate')
                    <li class="nav-item">
                        <a class="nav-link text-lowercase" href="{{ route('dashboard') }}">
                            <strong>{{ $user->name }}</strong>
                        </a>
                    </li>
                @endcan
                @can('employer')
                    <li class="nav-item">
                        <a class="nav-link text-lowercase" href="{{ route('company.dashboard') }}">
                            <strong>{{ $user->name }}</strong>
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                        <a class="nav-link text-lowercase" href="{{ route('logout') }}">
                            <strong>Logout</strong>
                        </a>
                </li>
            </ul>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    @lang('Login')
                </a>
            </li>
            <li class="nav-item d-inline-block d-lg-none">
                <a href="{{ route('register') }}" class="nav-link">@lang('Sign up')</a>
            </li>
            
        </ul>
        <div class="navbar-button d-none d-lg-inline-block">
            <a href="{{ route('register') }}" class="btn btn-sm btn-primary btn-round">@lang('Sign up')</a>
        </div>
        @endauth
        
    </div>
</div>
</nav>
<!-- Navbar End -->