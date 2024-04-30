<?php

namespace Modules\ResumeCV\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Illuminate\Routing\Controller;
use Modules\ResumeCV\Entities\Resumecv;
use Modules\ResumeCV\Entities\Resumecvtemplate;
use Modules\Jobs\Entities\JobApplicant;
use Modules\Jobs\Entities\Company;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use URL;
use Illuminate\Support\Facades\Cookie;
use Module;
use Auth;
use Carbon\Carbon;
use Modules\Jobs\Entities\Job;

class ResumeCVController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index(Request $request)
    {
        
        $data = Resumecv::where('user_id', $request->user()->id);

        if($request->user()->can('admin')){
            $data = Resumecv::withCount(['user']);
        }
       
        if ($request->filled('search')) {
            $data->where('name', 'like', '%' . $request->search . '%');
        }

        $data->orderBy('created_at', 'DESC');

        $data = $data->paginate(5);

        return view('resumecv::resumecv.index', compact(
            'data'
        ));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function save(Request $request)
    {
        $request->validate(['name' => 'required|max:255', 'template_id' => 'required']);

        $template_id = $request->input('template_id');
        // Get template ID content and style => load builder
        $template = Resumecvtemplate::findorFail($template_id);

        $template = replaceVarContentStyle($template);
        $item = Resumecv::create([
            'user_id'  => $request->user()->id,
            'name' => $request->input('name'),
            'content' => $template->content,
            'style' => $template->style,
        ]);
        
        return redirect()->route('resumecv.builder', ['code'=>$item->code]);
    }

    public function builder($code, Request $request)
    {
        $data = Resumecv::where('user_id', $request->user()->id);
        $data = $data->where('code', $code)->first();
        if (!$data) {
            abort(404);
        }
        $data = replaceVarContentStyle($data);
        $all_templates = Resumecvtemplate::with('category');
        $all_templates = $all_templates->orderBy('created_at', 'DESC')->get();
        
        $images_url = getAllImagesUser($request->user()->id);
        $all_icons = config('app.all_icons');
        $all_fonts = config('app.all_fonts');
        
        return view('resumecv::resumecv.builder', compact('data','all_icons','all_fonts','images_url','all_templates'));

    }
    public function updateBuilder($id, Request $request)
    {
        $item = Resumecv::find($id);

        if ($item) {

            $item->content = $request->input('gjs-html');
            $item->style = $request->input('gjs-css');

            if($item->save()){
              return response()->json(['success'=>__("Updated successfully")]);
            }
            
        }
        return response()->json(['error'=>__("Updated failed")]);
    }
   
    public function loadBuilder($id, Request $request)
    {
        $item = Resumecv::find($id);
        $item = replaceVarContentStyle($item);
        if ($item) {

            return response()->json([
                    'gjs-html'=>$item->content, 
                    'gjs-css' => $item->style
            ]);
        }
        return response()->json(['error'=>__("Not Found template")]);
    }

    public function clone ($id, Request $request)
    {
        $template = Resumecv::findorFail($id);
        $item = $template->replicate();
        $item->name = "Copy " . $template->name;
        $item->save();

        return redirect()
            ->route('resumecv.index')
            ->with('success', __('You copy the template :name successfully', ['name' => $template->name]));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($id)
    {
        $item = Resumecv::findorFail($id);
        $item->delete();

        return redirect()->route('resumecv.index')
            ->with('success', __('Deleted successfully'));
    }

    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'files' => 'required|mimes:jpg,jpeg,png,svg|max:20000',
        ]);
        if ($validator->fails()) {    
            return response()->json(['error' => __('The file must be an jpg,jpeg,png,svg')]);
        }
        $images=array();
        $imagesURL=array(); 

        if($request->hasfile('files'))
        {
            $file = $request->file('files');

            $name=$file->getClientOriginalName();
            $new_name = $name;
            $file->move(public_path('storage/user_storage/'.$request->user()->id), $new_name);
            $imagesURL[] = URL::to('/storage/user_storage/'.$request->user()->id."/".$new_name);
            $images[]=$new_name;

        }
        return response()->json($imagesURL);
    }

    public function deleteImage(Request $request)
    {
        $input=$request->all();
        $link_array = explode('/',$input['image_src']);
        $image_name = end($link_array);
        $path = public_path('storage/user_storage/'.$request->user()->id."/".$image_name);

        if(File::exists($path)) {
            File::delete($path);
        }
        return response()->json($image_name);
    }
    public function setting($code,Request $request)
    {
        if ($code) {
            
            $data = Resumecv::where('user_id', $request->user()->id);
            
            $item = $data->where('code', $code)->first();

            if ($item) {
                return view('resumecv::resumecv.setting', compact('item'));
            }
        }
        abort(404);
    }
    public function settingUpdate($id,Request $request)
    {
        // add validate intergration
        $validate = [
            'name'    => 'required|max:255',
            'slug'           => 'required|alpha_dash|max:50|unique:resumecv,slug,' . $id,
        ];

        $request->validate($validate);
        $item  = Resumecv::findOrFail($id);
        $dataRequest = $request->all();
        
        $item->update($dataRequest);

        return back()->with('success', __('Updated successfully'));
    }

    public function publish($slug,Request $request)
    {
        if ($slug) {
            
            $item = Resumecv::where('slug', $slug)->first();

            if ($item) {
                $check_remove_brand = 1;

                $user   = $request->user();
                if ($user) {
                    
                    if (Module::find('Saas')) {
                        $check_remove_brand = $request->user()->checkRemoveBrand();
                    }
                }
                // count view resume
                if ($this->add_count($item->id) == true) {
                    $item->view_count += 1;
                    $item->save();
                }
                return view('resumecv::resumecv.publish', compact('item','check_remove_brand'));
            }
        }

        abort(404);
    }

    public function download($code,Request $request)
    {
        if ($code) {
            
            $item = Resumecv::where('code', $code)->first();

            if ($item) {
                $check_remove_brand = 1;

                $user   = $request->user();
                if ($user) {
                    
                    if (Module::find('Saas')) {
                        $check_remove_brand = $request->user()->checkRemoveBrand();
                    }
                }
                return view('resumecv::resumecv.download', compact('item','check_remove_brand'));
            }
        }

        abort(404);
    }

    public function getPageJson($code,Request $request)
    {
        $page = $request->page;
        $item = Resumecv::where('code', $code)->first();

        if ($item) {
            return response()->json([
                'css' => $item->style,
                'html'=>$item->content, 
            ]);
        }

    }
    function add_count($id)
    {
        $cookie_name = 'resumecv_view_'.$id;
        
        $check_visitor = Cookie::get($cookie_name);
        
        $minutes = 7200; // 5 days
        
        if (!$check_visitor) {
            Cookie::queue($cookie_name, 'viewed', $minutes);
            return true;
        }
        // exits Cookie
        return false;
    }
    
    public function myappliedjobs(){
        $id = Auth::user();
        $data = JobApplicant::leftJoin('companies', 'companies.id', '=', 'job_applicants.company_id')->leftJoin('jobs_list', 'jobs_list.id', '=', 'job_applicants.job_id')->where('job_applicants.user_id', $id->id)->select('company_name', 'jobs_list.title', 'resume_link', 'resume_pdf', 'job_applicants.created_at', 'job_applicants.updated_at', 'jobs_list.slug', 'companies.slug as c_slug')->orderBy('job_applicants.id', 'desc')->paginate(10);
        
        return view('resumecv::resumecv.myappliedjobs', compact('data'));
    }
    
    
    //temp ends
    public function appliedjobs(Request $request)
    {
      
      $jobFilterList = Job::orderBy('created_at', 'DESC')->get();
      
      $jobs = Job::orderBy('created_at', 'DESC')->leftJoin('companies', 'companies.id', '=', 'jobs_list.company_id');
      
      $companies = Company::get();

      if ($request->filled('companyId'))
      {
          $jobs->where('company_id', $request->companyId);
      }
      
      $jobs = $jobs->select('jobs_list.*', 'companies.company_name')->paginate(10);

      return view('resumecv::resumecv.appliedjobs', compact('jobs', 'jobFilterList', 'companies'));
    }
    
    public function viewAppliedUsers(Request $request){
        
      $data = JobApplicant::where('job_id', $request->job_id);
      
      $jobName = JobApplicant::where('job_applicants.job_id', $request->job_id)->leftJoin('jobs_list', 'jobs_list.id', '=', 'job_applicants.job_id')->value('jobs_list.title');
      
      
      $datas = $data->leftJoin('users', 'job_applicants.user_id', '=', 'users.id')->leftJoin('job_attributes_genders', 'job_attributes_genders.id', '=', 'users.gender_id')
        ->leftJoin('location_countries', 'location_countries.id', '=', 'users.country_id')
        ->leftJoin('location_states', 'location_states.id', '=', 'users.state')
        ->leftJoin('location_cities', 'location_cities.id', '=' ,'users.city')
        ->leftJoin('job_attributes_degree_levels','job_attributes_degree_levels.id', '=','users.education')
        ->leftJoin('job_attributes_degree_types','job_attributes_degree_types.id', '=','users.degree_type_id')
        ->leftJoin('job_attributes_functional_areas','job_attributes_functional_areas.id', '=','users.functional_area_id')
        ->leftJoin('job_attributes_job_experiences', 'job_attributes_job_experiences.id', '=', 'users.experience')
        ->select('users.*', 'location_states.name as state_name', 'location_cities.name as city_name', 'job_attributes_degree_levels.name as degree_name', 'job_attributes_job_experiences.name as experience_name', 'job_attributes_genders.name as gender', 'job_attributes_degree_types.name as degreeType', 'job_attributes_functional_areas.name as functionalArea', 'location_countries.name as country', 'job_applicants.resume_pdf as resume_pdf', 'job_applicants.resume_link as resume_link', 'job_applicants.created_at as appliedDate');
    
    if ($request->filled('filterDate'))
      {
          $datas->whereDate('job_applicants.created_at', $request->filterDate);
      }
        
     if($request->filled('search')){
          $datas->where('users.name', 'like', '%' . $request->search . '%')
                ->orWhere('users.email', 'like', '%' . $request->search . '%')->orderBy('job_applicants.id', 'desc');
      }

      if($request->filled('from_date') && $request->filled('to_date')){
        $datas->whereBetween('job_applicants.created_at',[$request->from_date, $request->to_date])->orderBy('job_applicants.id', 'desc');
      }

      if($request->filled('from_date') && $request->filled('to_date') && $request->filled('search')){
        $datas->where('users.name', 'like', '%' . $request->search . '%')
        ->orWhere('users.email', 'like', '%' . $request->search . '%')->whereBetween('job_applicants.created_at',[$request->from_date, $request->to_date])->orderBy('job_applicants.id', 'desc');
      }
        
      $data = $datas->paginate(10);

      return view('resumecv::resumecv.applied-users', compact('data', 'jobName'));
    }
    
    //temp ends

    
    
    public function appliedJobsExport(Request $request){
        
      $data = JobApplicant::where('job_id', $request->job_id);
      
      
      $datas = $data->leftJoin('users', 'job_applicants.user_id', '=', 'users.id')
        ->leftJoin('companies', 'job_applicants.company_id', '=','companies.id')
        ->leftJoin('jobs_list', 'job_applicants.job_id', '=','jobs_list.id')
        ->leftJoin('job_attributes_genders', 'job_attributes_genders.id', '=', 'users.gender_id')
        ->leftJoin('location_countries', 'location_countries.id', '=', 'users.country_id')
        ->leftJoin('location_states', 'location_states.id', '=', 'users.state')
        ->leftJoin('location_cities', 'location_cities.id', '=' ,'users.city')
        ->leftJoin('job_attributes_degree_levels','job_attributes_degree_levels.id', '=','users.education')
        ->leftJoin('job_attributes_degree_types','job_attributes_degree_types.id', '=','users.degree_type_id')
        ->leftJoin('job_attributes_functional_areas','job_attributes_functional_areas.id', '=','users.functional_area_id')
        ->leftJoin('job_attributes_job_experiences', 'job_attributes_job_experiences.id', '=', 'users.experience')
        ->select('users.*', 'location_states.name as state_name', 'location_cities.name as city_name', 'job_attributes_degree_levels.name as degree_name', 'job_attributes_job_experiences.name as experience_name', 'job_attributes_genders.name as gender', 'job_attributes_degree_types.name as degreeType', 'job_attributes_functional_areas.name as functionalArea', 'location_countries.name as country', 'job_applicants.resume_pdf as resume_pdf', 'job_applicants.resume_link as resume_link', 'job_applicants.created_at as appliedDate', 'companies.company_name as companyName', 'jobs_list.title as jobName', 'jobs_list.vacancies as jobVacancies');
        
     if($request->filled('search')){
          $datas->where('users.name', 'like', '%' . $request->search . '%')
                ->orWhere('users.email', 'like', '%' . $request->search . '%')->orderBy('job_applicants.id', 'desc');
      }

      if($request->filled('from_date') && $request->filled('to_date')){
        $datas->whereBetween('job_applicants.created_at',[$request->from_date, $request->to_date])->orderBy('job_applicants.id', 'desc');
      }
        
      $data = $datas->get();
        
        $headers = array(
            'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Disposition' => 'attachment; filename=download.csv',
            'Expires' => '0',
            'Pragma' => 'public',
        );

        if (!File::exists(public_path()."/files")) {
            File::makeDirectory(public_path() . "/files");
        }

        $filename =  public_path("files/applied-jobs-download.csv");
        $handle = fopen($filename, 'w');

        //adding the first row
        fputcsv($handle, [
            'Company Name', 'Job Name', 'Vacancies', 'Name', 'Email', 'Phone', 'Gender', 'Education', 'Course', 'Functional Area','Experience', 'Country','State', 'City', 'Address', 'Role', 'Created At'
        ]);

        //adding the data from the array
        foreach ($data as $task) {
            fputcsv($handle, [
                $task->companyName, $task->jobName, $task->jobVacancies, $task->name, $task->email, $task->mobile, $task->gender, $task->degree_name, $task->degreeType, $task->functionalArea,$task->experience_name, $task->country,$task->state_name, $task->city_name, $task->address, $task->role, $task->created_at
            ]);

        }
        fclose($handle);

        //download command
        return FacadeResponse::download($filename, "applied-jobs-download.csv", $headers);
        
    }
    
    
}
