<?php

namespace Modules\Jobs\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Jobs\Entities\CareerLevel;
use Modules\Jobs\Entities\Company;
use Modules\Jobs\Entities\DegreeLevel;
use Modules\Jobs\Entities\FunctionalArea;
use Modules\Jobs\Entities\Gender;
use Modules\Jobs\Entities\Job;
use Modules\Jobs\Entities\JobExperience;
use Modules\Jobs\Entities\JobShift;
use Modules\Jobs\Entities\JobType;
use Modules\Jobs\Entities\SalaryPeriod;
use Modules\Location\Entities\City;
use Modules\Jobs\Http\Requests\ApplyJobRequest;
use Modules\Jobs\Entities\JobApplicant;

use Modules\User\Entities\User;

class EmployerApplicantsController extends Controller
{
    
    public function index(Request $request)
    {
      $company = $request->user()->company()->firstOrFail();
      
      $jobFilterList = Job::where('company_id',$company->id)->orderBy('created_at', 'DESC')->get();
      
      $jobs = Job::where('company_id',$company->id)->orderBy('created_at', 'DESC');

      if ($request->filled('jobtype'))
      {
          $jobs->where('id', $request->jobtype);
      }
      
      $jobs = $jobs->paginate(10);

      return view('jobs::employer_applicants.index', compact('jobs', 'jobFilterList'));
    }
    
    public function viewAppliedUsers(Request $request){
        
      $company = $request->user()->company()->firstOrFail();
      $data = JobApplicant::where('company_id',$company->id)->where('job_id', $request->job_id);
      
      $jobName = JobApplicant::where('job_applicants.company_id',$company->id)->where('job_applicants.job_id', $request->job_id)->leftJoin('jobs_list', 'jobs_list.id', '=', 'job_applicants.job_id')->value('jobs_list.title');
      
      
      $datas = $data->leftJoin('users', 'job_applicants.user_id', '=', 'users.id')->leftJoin('job_attributes_genders', 'job_attributes_genders.id', '=', 'users.gender_id')
        ->leftJoin('location_countries', 'location_countries.id', '=', 'users.country_id')
        ->leftJoin('location_states', 'location_states.id', '=', 'users.state')
        ->leftJoin('location_cities', 'location_cities.id', '=' ,'users.city')
        ->leftJoin('job_attributes_degree_levels','job_attributes_degree_levels.id', '=','users.education')
        ->leftJoin('job_attributes_degree_types','job_attributes_degree_types.id', '=','users.degree_type_id')
        ->leftJoin('job_attributes_functional_areas','job_attributes_functional_areas.id', '=','users.functional_area_id')
        ->leftJoin('job_attributes_job_experiences', 'job_attributes_job_experiences.id', '=', 'users.experience')
        ->select('users.*', 'location_states.name as state_name', 'location_cities.name as city_name', 'job_attributes_degree_levels.name as degree_name', 'job_attributes_job_experiences.name as experience_name', 'job_attributes_genders.name as gender', 'job_attributes_degree_types.name as degreeType', 'job_attributes_functional_areas.name as functionalArea', 'location_countries.name as country', 'job_applicants.resume_pdf as resume_pdf', 'job_applicants.resume_link as resume_link', 'job_applicants.created_at as appliedDate');
        
     if($request->filled('search')){
          $datas->where('users.name', 'like', '%' . $request->search . '%')
                ->orWhere('users.email', 'like', '%' . $request->search . '%');
      }
        
      $data = $datas->paginate(10);

      return view('jobs::employer_applicants.applied-users', compact('data', 'jobName'));
      
    }

    public function apply(ApplyJobRequest $request)
    {
        $data = $request->validated();

        /*if(!isset($data['resume_link']) && !isset($data['resume_pdf'])) {
            return back()->withInput()->withErrors([
                'resume_link' => 'Your resume is required',
                'resume_pdf'=> 'Your resume is required',
            ]);
        }*/

        $company = Company::findorFail($request->input('company_id'));

        $pdf = $request->file('resume_pdf');

        if ($pdf != '')
        {
            $rel_path = 'storage/resume_cvs_apply';
            
            $path_folder = public_path($rel_path);

            $file_name = "resume_" . strtotime("now") . '.' . $pdf->getClientOriginalExtension();
            $pdf->move($path_folder , $file_name);

            $data['resume_pdf'] = $file_name;
        } 
        else $data['resume_pdf'] = null;

        $jobResume = JobApplicant::create($data);
        return redirect()->route('jobslist')->with('success', __('Apply success'));
    }



    public function destroy(Request $request, $id)
    {
        $company = $request->user()->company()->firstOrFail();

        $item = JobApplicant::findOrFail($id);

        $item->delete();

        return redirect()->route('company.applicants.index')
            ->with('success', __('Deleted successfully'));
    }
}
