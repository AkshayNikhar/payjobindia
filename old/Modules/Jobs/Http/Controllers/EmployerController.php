<?php

namespace Modules\Jobs\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use URL;
use Module;
use Modules\Jobs\Entities\Company;
use Modules\Jobs\Entities\Industry;
use Modules\Jobs\Entities\OwnershipType;
use Modules\Jobs\Entities\Job;
use Modules\Saas\Entities\Package;
use Modules\Jobs\Entities\JobApplicant;

use Modules\Location\Entities\Country;
use Modules\Location\Entities\State;
use Modules\Location\Entities\City;

use Illuminate\Support\Str;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function dashboard(Request $request)
    {   
        $user       = $request->user();
        $total_jobs = 0;
        $total_jobs_featured = 0;
        

        $company = Company::where('user_id',$user->id)->first();  
        $applicants = 0;
        $companytot = Company::where('user_id',$user->id)->get(); 
        
        if(count($companytot) > 0) { 
           $applicants = JobApplicant::where('company_id', $company->id)->count();
           $total_jobs = Job::where('company_id', $company->id)->count();
           $total_jobs_featured = Job::where('company_id', $company->id)->featured()->count(); 
        }
        
        // if(!$company){
        if(count($companytot) == 0) {  
            // Auto create first data company
            $company = Company::create([
                'user_id'  => $user->id,
                'company_name'  => $user->name,
                'company_email'  => $user->email,
                'slug'  => "company_". $user->id . rand(),
                // 'slug'  => "company_". $user_id . rand(),
            ]);
        } 
        $packages = [];

        if(Module::find('Saas')){
            $packages = Package::active()->get();
        }
        $subscribed              = $user->subscribed();
        $currency_symbol         = config('app.CURRENCY_SYMBOL');
        $currency_code   = config('app.CURRENCY_CODE');
        $subscription_title      = null;
        $subscription_expires_in = 0;

        if ($subscribed) {
            $subscription_title      = $user->package->title;
            $subscription_expires_in = $user->package_ends_at->diffInDays();
        }
        
        //applicants according to month
        $applicantsJan = JobApplicant::where('company_id', $company->id)->whereMonth('created_at', '=', 1)->count();
        $applicantsFeb = JobApplicant::where('company_id', $company->id)->whereMonth('created_at', '=', 2)->count();
        $applicantsMarch = JobApplicant::where('company_id', $company->id)->whereMonth('created_at', '=', 3)->count();
        $applicantsApril = JobApplicant::where('company_id', $company->id)->whereMonth('created_at', '=', 4)->count();
        $applicantsMay = JobApplicant::where('company_id', $company->id)->whereMonth('created_at', '=', 5)->count();
        $applicantsJune = JobApplicant::where('company_id', $company->id)->whereMonth('created_at', '=', 6)->count();
        $applicantsJuly = JobApplicant::where('company_id', $company->id)->whereMonth('created_at', '=', 7)->count();
        $applicantsAugust = JobApplicant::where('company_id', $company->id)->whereMonth('created_at', '=', 8)->count();
        $applicantsSeptember = JobApplicant::where('company_id', $company->id)->whereMonth('created_at', '=', 9)->count();
        $applicantsOctober = JobApplicant::where('company_id', $company->id)->whereMonth('created_at', '=', 10)->count();
        $applicantsNovember = JobApplicant::where('company_id', $company->id)->whereMonth('created_at', '=', 11)->count();
        $applicantsDecember = JobApplicant::where('company_id', $company->id)->whereMonth('created_at', '=', 12)->count();

        return view('jobs::employer.dashboard', 
            compact('total_jobs', 'total_jobs_featured',
            'packages',
            'subscribed',
            'currency_code',
            'currency_symbol',
            'subscription_title',
            'subscription_expires_in', 'applicants', 'applicantsJan', 'applicantsFeb', 'applicantsMarch', 'applicantsApril', 'applicantsMay', 'applicantsJune', 'applicantsJuly', 'applicantsAugust', 'applicantsSeptember', 'applicantsOctober', 'applicantsNovember', 'applicantsDecember')
        );

    }
    public function companyProfile(Request $request)
    {
        $company = Company::where('user_id',$request->user()->id)->first();
        $user_id = $request->user()->id;
        
        $industries = Industry::active()->get();
        $ownershipType = OwnershipType::active()->get();
        
        $countries = Country::get();
        $states = State::get();
        $cities = City::active()->get();

        $no_of_offices = Industry::active()->get();
        $no_of_employees = OwnershipType::active()->get();
        $established_in = City::active()->get();

        return view('jobs::employer.company-profile', compact(
            'company','industries','ownershipType','cities', 'countries', 'states'
        ));
    }

    public function updateCompanyProfile(Request $request)
    {
       
        $request->validate([
                'company_id' => 'required',
                'company_name' => 'required|max:155', 
                'company_email' => 'required',
                'industry_id' => 'required',
            ]
        );
        $item = Company::findorFail($request->input('company_id'));

        $image = $request->file('logo');
        
        $inputData = $request->all();
        
        $inputData['slug'] = Str::slug($inputData['company_name'], '-') . '-' . $item->id;;
        
        if ($image != '')
        {
            $request->validate([
                'logo' => 'sometimes|required|mimes:jpg,jpeg,png,svg|max:20000', ], 
                ['logo.mimes' => __('The :attribute must be an jpg,jpeg,png,svg') , ]
            );
            $path_folder = public_path('storage/user_storage/'.$request->user()->id);

            $path = $path_folder."/".$item->logo;
            deleteImageWithPath($path);
            
            $image_name = "company_logo_" . rand() . '.' . $image->getClientOriginalExtension();
            $image->move($path_folder , $image_name);

            $inputData['logo'] = $image_name;
        }
        
        !$request->filled('is_active') ?  $inputData['is_active'] = false : $inputData['is_active'] = true;

        !$request->filled('is_featured') ?  $inputData['is_featured'] = false : $inputData['is_featured'] = true;

        $item->update($inputData);

        return back()->with('success', __('Updated successfully'));
        
    }

    

    
}
