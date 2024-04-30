<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
  <head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="{{ app()->getLocale() }}" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="{{ asset(config('app.logo_favicon'))}}" type="image/png">
    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="{{ config('app.SITE_DESCRIPTION') }}">
    <meta name="keywords" content="{{ config('app.SITE_KEYWORDS')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ Module::asset('core:core/core.css') }}">
    <link rel="stylesheet" href="{{ Module::asset('core:app/css/customize.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    @includeWhen(config('app.GOOGLE_ANALYTICS'), 'core::partials.google-analytics')
    
    @stack('head')
    <script type="text/javascript">
      var BASE_URL = '{{ url('/') }}';
    </script>
  </head>
  <body id="page-top" class="sidebar-toggled">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      @include('core::partials.sidebar')
      <!-- End of Sidebar -->
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          @include('core::partials.header-top')
          <!-- End of Topbar -->
          <!-- Begin Page Content -->
          <div class="container-fluid">
            @if($errors->any())
            <div class="alert alert-danger">
              <ul class="list-unstyled mb-0">
                @foreach ($errors->all() as $error)
                <li> <i class="fas fa-times text-danger mr-2"></i> {{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            @if (session('success'))
                  <div class="alert alert-success">
                      <i class="fas fa-check-circle text-success mr-2"></i> {!! session('success') !!}
                  </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-times text-danger mr-2"></i> {!! session('error') !!}
                </div>
            @endif
            <!-- Page Heading -->
            @yield('content')
            
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
 
        <!-- Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>@lang('Copyright') © {{ now()->year }} @lang('Design by') <a href="{{ url('/') }}">{{ config('app.name') }}</a></span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

   
    <script src="{{ Module::asset('core:core/core.js') }}" ></script>
    <script src="{{ Module::asset('core:vendor/tinymce/js/tinymce/tinymce.min.js') }}" ></script>
    <script src="{{ Module::asset('core:app/js/app.js') }}" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js" integrity="sha512-wUa0ktp10dgVVhWdRVfcUO4vHS0ryT42WOEcXjVVF2+2rcYBKTY7Yx7JCEzjWgPV+rj2EDUr8TwsoWF6IoIOPg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script>
        function generateImage(job, company, area, location, edu, exp, salary_from, salary_to, gender, currency, functional_area, job_type, vacancies, expiry_date, work_mode){
            const body = document.getElementsByTagName('body')[0];
            var table = document.createElement('div');
            table.setAttribute("id", "imgTable");
            table.setAttribute("class", "col-md-3");
            table.setAttribute("style", "background:white");
            
            table.innerHTML = `<center style='background:white'>
                            	<br/>
                            	<table border='1' cellpadding='10' style='margin-right:10px'>
                            		<tr>
                            			<td colspan='2' style='background-color:blue;color:white;'> <center>${job}</center> </td>
                            		</tr>
                            		<tr>
                            			<td>Vacancies</td>
                            			<td> ${vacancies} </td>
                            		</tr>
                            		<tr>
                            			<td>Company</td>
                            			<td> ${company} </td>
                            		</tr>
                            		<tr>
                            			<td>Education</td>
                            			<td> ${edu} </td>
                            		</tr>
                            		<tr>
                            			<td>Work mode</td>
                            			<td> ${work_mode} </td>
                            		</tr>
                            		<tr>
                            			<td>Functional Area</td>
                            			<td> ${functional_area} </td>
                            		</tr>
                            		<tr>
                            			<td>Experience</td>
                            			<td> ${exp} </td>
                            		</tr>
                            		<tr>
                            			<td>Job Type</td>
                            			<td> ${job_type} </td>
                            		</tr>
                            		<tr>
                            			<td>Gender</td>
                            			<td>${gender}</td>
                            		</tr>
                            		<tr>
                            			<td>Location</td>
                            			<td> ${location} </td>
                            		</tr>
                            		<tr>
                            			<td>Salary</td>
                            			<td> ${salary_from} - ${salary_to} ${currency} </td>
                            		</tr>
                            		<tr>
                            			<td>Last Date</td>
                            			<td> ${expiry_date.split(' ')[0]} </td>
                            		</tr>
                            	</table>
                            	<br/>
                            	<br/>
                            </center>`;
            
            body.appendChild(table);
            
            domtoimage.toJpeg(table, { quality: 0.95 })
            .then(function (dataUrl) {
                var link = document.createElement('a');
                link.download = 'job-details.jpeg';
                link.href = dataUrl;
                link.click();
            });
            
            function rem(){
                table.remove();
            }
            setTimeout(rem, 5000);
            
        }
    </script>
    
    @stack('scripts')
  </body>
</html>