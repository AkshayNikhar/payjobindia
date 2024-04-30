<div class="item-job">
    <article>
        <div class="item-job-list bottom-hover">
            <div class="item-job-half">
                <div class="item-flex-box">
                    <!--<div class="item-job-img">
                    <a href="{{-- route('company', ['slug' => $job->company->slug]) --}}"><img src="{{ $job->company->getLogoLink() }}" class="img-responsive" alt="{{ $job->company->company_name }}" style="width:85px;border-radius:45px"></a>
                    </div>-->
                    <div class="item-job-pos">
                      <h3 class="jb-title"><a href="{{ !Auth::guest() ? route('job', ['slug' => $job->slug]) : route('login') }}" style="color:#0000ff">{{ $job->title }} ({{$job->functional_area->name }} - {{$job->degree_type->name ?? 'All'}} )</a></h3>
                      <!--<p>
                          <a href="{{ route('jobslist', ['functionalarea' => $job->functional_area->id]) }}">{{ $job->functional_area->name }}</a>
                          <span class="item-job-type">{{ $job->job_type->name }}</span>
                      </p>-->
                        <div class="job-location">
                            <span><i class="pe-7s-map-marker"></i>Location : {{ $job->city->name }}</span>
                            <span class="ml-2"><i class="pe-7s-gender"></i>Gender : {{ $job->gender->name }}</span>
                            <span class="ml-2"><i class="pe-7s-shopbag"></i>Experience : {{ $job->job_experience->name }}</span>
                            <span class="ml-2"></span><i class="pe-7s-rupees"></i>Salary : {{ $job->salary_from }} <span class="suffix">{{$job->salary_currency}}</span> - <span class="price-text">{{ $job->salary_to }} <span class="suffix">{{$job->salary_currency}}</span></span>
                            <span class="ml-2"><i class="pe-7s-date"></i> Post Date : {{ \Carbon\Carbon::parse($job->created_at)->toFormattedDateString() }}</span>
                        </div>
                  </div>
                </div>
            </div>
        </div>
    </article>
</div>