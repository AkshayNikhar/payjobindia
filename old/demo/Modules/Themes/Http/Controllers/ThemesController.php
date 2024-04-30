<?php

namespace Modules\Themes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\User\Entities\User;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

use JoeDixon\Translation\Drivers\Translation;
use Module;
use Modules\ResumeCV\Entities\Resumecvtemplate;
use Modules\ResumeCV\Entities\Resumecvcategory;

use Modules\Jobs\Entities\Company;
use Modules\Jobs\Entities\FunctionalArea;
use Modules\Jobs\Entities\Industry;
use Modules\Jobs\Entities\Job;
use Modules\Jobs\Entities\JobType;
use Modules\Location\Entities\City;





class ThemesController extends Controller
{
    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
    }
    
    public function getLandingPage(Request $request)
    {
        $skin            = config('app.SITE_LANDING');
        $currency_symbol = config('app.CURRENCY_SYMBOL');
        $currency_code   = config('app.CURRENCY_CODE');
        $user            = $request->user();
        $companies = Company::active()->featured()->limit(12)->get();
        $featuredJobs = Job::active()->featured()->limit(12)->get();
        $lastestJobs = Job::active()->whereDate('expiry_date', '>=' , \Carbon\Carbon::now())->orderBy('created_at', 'desc')->limit(12)->get();   
        $cities = City::active()->orderBy('is_default', 'desc')->get();   
        $functional_areas = FunctionalArea::active()->orderBy('is_default', 'desc')->get();
        return view('themes::' . $skin . '.home', compact(
            'user','currency_symbol','currency_code', 'companies', 'cities', 'functional_areas', 'featuredJobs', 'lastestJobs'
        ));

    }

    public function getAllTemplate($id = "",Request $request)
    {
        $data = Resumecvtemplate::with('category')->active();
        
        if ($id)
            $data = Resumecvtemplate::where('category_id', $id);

        $data->orderBy('created_at', 'DESC');
        $data = $data->paginate(10);

        $categories = Resumecvcategory::all();
        $skin            = config('app.SITE_LANDING');
        $currency_symbol         = config('app.CURRENCY_SYMBOL');
        $currency_code   = config('app.CURRENCY_CODE');
        $user            = $request->user();

        return view('themes::' . $skin . '.templates', compact(
            'data','categories','currency_code','currency_symbol','user'
        ));

    }

    public function getJobsList(Request $request, $q = '')
    {
        $skin            = config('app.SITE_LANDING');
        $currency_symbol         = config('app.CURRENCY_SYMBOL');
        $currency_code   = config('app.CURRENCY_CODE');
        $user            = $request->user();

        $cities = City::active()->orderBy('is_default', 'desc')->get();
        $functional_areas = FunctionalArea::active()->orderBy('is_default', 'desc')->get();
        $job_types = JobType::active()->orderBy('is_default', 'desc')->get();

        $filter_city_id = $request->input('city');
        $filter_functional_area_id = $request->input('functionalarea');
        $filter_job_type_id = $request->input('jobtype');
        $filter_salary_from = $request->input('salaryfrom');
        $filter_salary_to = $request->input('salaryto');
        $filter_featured = $request->input('featured');
        $filter_lastest = $request->input('lastest');

        $queryJobs = Job::query()->active()->where('title', 'like', '%' . $q . '%');
        if(isset($filter_city_id)) {
            $queryJobs->where('city_id', '=', $filter_city_id);
        }
        if(isset($filter_functional_area_id)) {
            $queryJobs->where('functional_area_id', '=', $filter_functional_area_id);
        }
        if(isset($filter_job_type_id)) {
            $queryJobs->where('job_type_id', '=', $filter_job_type_id);
        }
        if(isset($filter_salary_from)) {
            $queryJobs->where('salary_to', '>=', $filter_salary_from);
        }
        if(isset($filter_salary_to)) {
            $queryJobs->where('salary_from', '<=', $filter_salary_to);
        }

        if(isset($filter_featured) && $filter_featured == '1') {
           $queryJobs->orderBy('is_featured', 'desc');
        }
        /*if(isset($filter_lastest) && $filter_lastest == '1') {
            
        }*/
        
        $queryJobs->whereDate('expiry_date', '>=' , \Carbon\Carbon::now())->orderBy('created_at', 'desc');
        

        $data = $queryJobs->paginate(10);


        return view('themes::' . $skin . '.jobs_list', compact(
            'currency_code','currency_symbol','user', 'q', 'filter_city_id', 'filter_functional_area_id', 'filter_job_type_id', 'filter_salary_from', 'filter_salary_to', 'data', 'cities', 'functional_areas', 'job_types'
        ));

    }

    public function getJobDetail(Request $request, $slug)
    {
        $skin            = config('app.SITE_LANDING');
        $currency_symbol = config('app.CURRENCY_SYMBOL');
        $currency_code   = config('app.CURRENCY_CODE');
        $user            = $request->user();

        $job = Job::where('slug', $slug)->active()->firstOrFail();

        $siblings = Job::active()->where('id', '!=', $job->id)
                                ->where('functional_area_id', '=', $job->functional_area_id)
                                ->orderBy('is_featured', 'desc')->limit(8)->get();

        return view('themes::' . $skin . '.job_details', compact(
            'currency_code','currency_symbol','user', 'job', 'siblings'
        ));

    }

    public function getCompanies(Request $request, $q = '')
    {
        $skin            = config('app.SITE_LANDING');
        $currency_symbol         = config('app.CURRENCY_SYMBOL');
        $currency_code   = config('app.CURRENCY_CODE');
        $user            = $request->user();

        $cities = City::active()->orderBy('is_default', 'desc')->get();
        $industries = Industry::active()->orderBy('is_default', 'desc')->get();

        $filter_city_id = $request->input('city');
        $filter_industry_id = $request->input('industry');

        $queryCompanies = Company::query()->active()->where('company_name', 'like', '%' . $q . '%');
        if(isset($filter_city_id)) {
            $queryCompanies->where('city_id', '=', $filter_city_id);
        }
        if(isset($filter_industry_id)) {
            $queryCompanies->where('industry_id', '=', $filter_industry_id);
        }

        $data = $queryCompanies->paginate(10);

        return view('themes::' . $skin . '.companies_list', compact(
            'currency_code','currency_symbol','user', 'cities', 'industries', 'data', 'filter_city_id', 'filter_industry_id'
        ));

    }

    public function getCompanyDetail($slug='',Request $request)
    {
        $company = Company::where('slug',$slug)->firstOrFail();

        $skin            = config('app.SITE_LANDING');
        $currency_symbol         = config('app.CURRENCY_SYMBOL');
        $currency_code   = config('app.CURRENCY_CODE');
        $user            = $request->user();

        return view('themes::' . $skin . '.company_detail', compact(
            'currency_code','currency_symbol','user','company'
        ));

    }
    
    //contact
    public function contact(Request $request)
    {
    
        $skin            = config('app.SITE_LANDING');
        $user            = $request->user();

        return view('themes::' . $skin . '.contact', compact('user'
        ));
    }
    
    //contact save 
    public function saveContact(Request $request){
        $msg = "Name : $request->fullname \n Phone number : $request->phone \n Email : $request->email";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);
        
        // send email
        mail("magichimanshu12@gmail.com",$request->subject, $msg);
        
        return \Redirect::back()->withSuccess( 'Message sent successfully' );
    }
    
    public function localize($locale)
    {
        
        $languages = $this->translation->allLanguages();
        $locale = $languages->has($locale) ? $locale : config('app.fallback_locale');

        App::setLocale($locale);

        session()->put('locale', $locale);

        return redirect()->back();
    }
    
    
    public function employerLogin(Request $request)
    {
    
        $skin            = config('app.SITE_LANDING');
        $user            = $request->user();

        return view('themes::' . $skin . '.auth.employer-login', compact('user'
        ));
    }
    
    public function employerLoginsave(Request $request)
    {
        
        
        $request->validate([
           
            'password' => 'required'
            
        ]);
// echo 'sdas';exit;
        
            // if (Auth::guard('web')->attempt(['company_email' => $request->company_email, 'password' => $request->password])) {
            // if (Auth::user()->role) {
                
                $userDetails = DB::table('employer_reg')->where('company_email', '=', $request->company_email)->get();
                
                // print_r($userDetails);exit;
                
                foreach($userDetails as $details){
                    $userId = $details->id;
                }
                $request->session()->put('userId', $userId);
               
               $request->session()->flash('success', 'Login Success');
              return redirect('company/dashboard'); 
           /*}
            
            else {
                $request->session()->flash('error', '"Oopss!! Please Check Again.');
            }*/
    
    }
    
    public function candidateLogin(Request $request)
    {
    
        $skin            = config('app.SITE_LANDING');
        $user            = $request->user();

        return view('themes::' . $skin . '.auth.candidate-login', compact('user'
        ));
    }
    
    public function candidateLoginsave(Request $request)
    {
        
        
        $request->validate([
           
            'password' => 'required'
            
        ]);

        // echo 'sdas';exit;
        
            // if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // if (Auth::user('')->role) {
                
                $userDetails = DB::table('users')->where('email', '=', $request->email)->get();
                
                // print_r($userDetails);exit;
                
                foreach($userDetails as $details){
                    $userId = $details->id;
                }
                $request->session()->put('userId', $userId);
               
               $request->session()->flash('success', 'Login Success');
            //   return redirect('company/dashboard'); 
               return redirect('dashboard'); 
           /*}
            
            else {
                $request->session()->flash('error', '"Oopss!! Please Check Again.');
            }*/
    
    }
    
    public function employerRegistration(Request $request)
    {
    
        $skin            = config('app.SITE_LANDING');
        $user            = $request->user();

        return view('themes::' . $skin . '.auth.employer-registration', compact('user'
        ));
    }
    
    
    public function employerRegistrationSave(Request $request)
{
    // Validate request
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'mobile' => 'required|unique:users,mobile',
        'role' => 'required', // Assuming 'role' is part of your registration form
    ]);

    // Check if email is already registered
    $chkUsermail = DB::table('users')->where('email', strtolower($request->input('email')))->exists();
    $chkMail = $chkUsermail;

    // Check if phone number is already registered
    $chkUserNo = DB::table('users')->where('mobile', trim($request->input('mobile')))->exists();
    $chkNo = $chkUserNo;

    if ($chkMail) {
        $request->session()->flash('error', 'Email Id was already registered');
    } elseif ($chkNo) {
        $request->session()->flash('error', 'User Mobile No was already registered');
    } else {
        // If validation passes, proceed with registration
        $userRegister = [
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'mobile' => trim($request->input('mobile')),
            'role' => trim($request->input('role')),
            'created_at' => now(), // Assuming you want to use the current timestamp
        ];

        // Insert the record
        $userId = DB::table('users')->insertGetId($userRegister);

        // Insert into the 'companies' table
        DB::table('companies')->insert([
            'user_id' => $userId,
            // Add other fields as needed
        ]);

        $request->session()->flash('success', 'Registration successfully completed');
    }

    return redirect()->back();
}


    
    public function candidateRegistration(Request $request)
    {
    
        $skin            = config('app.SITE_LANDING');
        $user            = $request->user();

        return view('themes::' . $skin . '.auth.candidate-registration', compact('user'
        ));
    }
    
    public function candidateRegistrationsave(Request $request)
    {
        
        // Validate request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'mobile' => 'required|unique:users,mobile',
            
        ]);
        
        // Check if email is already registered
        $chkUsermail = DB::table('users')->where('email', strtolower($request->input('email')))->get();
        $chkMail = count($chkUsermail) > 0;
    
        // Check if phone number is already registered
        $chkUserNo = DB::table('users')->where('mobile', trim($request->input('mobile')))->get();
        $chkNo = count($chkUserNo) > 0;
    
        if ($chkMail) {
            $request->session()->flash('error', 'Email Id was already registered');
        } elseif ($chkNo) {
            $request->session()->flash('error', 'User Mobile No was already registered');
        } else {
        // If validation passes, proceed with registration
        $userRegister = [
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'mobile' => trim($request->input('mobile')),
            'role' => trim($request->input('role')),
            'created_at' => now(),
           
        ];
        
    // print_r($userRegister);exit; 
        // Insert the record
       DB::table('users')->insert($userRegister);
       $request->session()->flash('success', 'Registration successfully completed');
    
        }
        
        return redirect()->back(); 
        
    }
    
    public function employerResetPassword(Request $request)
    {
    
        $skin            = config('app.SITE_LANDING');
        $user            = $request->user();

        return view('themes::' . $skin . '.auth.employer-reset-pass', compact('user'
        ));
    }
    
    public function candidateResetPassword(Request $request)
    {
    
        $skin            = config('app.SITE_LANDING');
        $user            = $request->user();

        return view('themes::' . $skin . '.auth.candidate-reset-pass', compact('user'
        ));
    }
    
    
}
