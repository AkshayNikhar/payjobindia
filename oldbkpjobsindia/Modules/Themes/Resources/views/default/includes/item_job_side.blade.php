<div class="item-job">
  <article>
      <div class="item-job-list">
          <div class="item-job-half">
              <div class="item-flex-box">
                  <div class="item-job-img">
                      <a href="{{-- route('company', ['slug' => $job->company->slug]) --}}"><img src="{{ preg_match('/(\.jpg|\.png|\.bmp)$/i', $job->company->getLogoLink()) ? $job->company->getLogoLink() : 'https://payjobindia.com/img/favicon.png'  }}" class="img-responsive" alt="{{ $job->company->company_name }}" style="width:80px;"></a>
                  </div>

                    <div class="item-job-pos">
                      <h3 class="jb-title align-items-center m-1"><a href="{{ !Auth::guest() ? route('job', ['slug' => $job->slug]) : route('login')}}" style="color:#1555d6">{{ $job->title }} ({{ $job->functional_area->name }} - {{$job->degree_type->name ?? 'All'}})</a></h3>
                      
                     <div class="job-metas">
                          <!--<div class="job-location job-features-tabs m-1" style="font-size: 14px;">-->
                            <div class="job-location m-1 mr-4" style="font-size: 14px;">
                              <i class="pe-7s-map-marker"></i>
                              <a href="{{ route('jobslist', ['city' => $job->city->id]) }}">Location : {{ $job->city->name }}</a>
                            </div>
                            
                          <!--<div class="category-job job-features-tabs m-1">-->
                            <div class="category-job m-1 mr-4">
                                <div class="job-category with-icon" style="font-size: 14px;">
                                    <i class="pe-7s-timer"></i>
                                    <a href="#" style="">{{ $job->job_type->name }}</a>
                                </div>
                            </div>
                            
                            <!--<div class="category-job job-features-tabs m-1">-->
                            <div class="category-job m-1 mr-4">
                                <div class="job-category with-icon" style="font-size: 14px;">
                                    <i class="pe-7s-gender"></i>
                                  <a href="#" style=""> Gender : {{ $job->gender->name }}</a>
                                </div>
                            </div>
                            
                            <!--<div class="category-job job-features-tabs m-1">-->
                            <div class="category-job m-1 mr-4">
                                <div class="job-category with-icon" style="font-size: 14px;">
                                  <i class="pe-7s-shopbag"></i><a href="#" style=""> Experience : {{ $job->job_experience->name }}</a>
                                </div>
                            </div>
                            
                            
                            <!--<div class="category-job job-features-tabs m-1">-->
                            <div class="category-job m-1 mr-4">
                              <div class="job-category with-icon" style="font-size: 14px;">
                                  <i class="pe-7s-copy-file"></i>
                                  <a href="#" style=""> Work Mode : {{ $job->work_mode }}</a>
                              </div>
                            </div>
                          
                          
                            <!--<div class="category-job job-features-tabs m-1">-->
                            <div class="category-job m-1 mr-4">
                              <div class="job-category with-icon" style="font-size: 14px;">
                                  <i class="pe-7s-id"></i>
                                  <a href="{{ route('jobslist', ['functionalarea' => $job->functional_area->id]) }}" style=""> Education : {{ $job->degree_level->name }}</a>
                              </div>
                            </div>
                            <div class="job-deadline m-1 mr-4" style="font-size: 14px;"><i class="pe-7s-date"></i> Post Date : {{ \Carbon\Carbon::parse($job->created_at)->toFormattedDateString() }}</div>
                              @isset($job->salary_from, $job->salary_to)
                              <div class="job-salary m-1" style="font-size: 14px;"><i class="pe-7s-rupees"></i> <span class="price-text">Salary : {{ $job->salary_from }} <span class="suffix">{{$job->salary_currency}}</span> - <span class="price-text">{{ $job->salary_to }} <span class="suffix">{{$job->salary_currency}}</span></span>
                              </div>
                              @endisset
                      </div>
                  </div>

              </div>
          </div>
         
      </div>
  </article>
</div>

