<?php

namespace Modules\Jobs\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Jobs\Entities\CareerLevel;
use Modules\Jobs\Entities\Company;

use Modules\Jobs\Entities\DegreeLevel;
use Modules\Jobs\Entities\DegreeType;

use Modules\Jobs\Entities\FunctionalArea;
use Modules\Jobs\Entities\Gender;
use Modules\Jobs\Entities\Job;
use Modules\Jobs\Entities\JobExperience;
use Modules\Jobs\Entities\JobShift;
use Modules\Jobs\Entities\JobType;
use Modules\Jobs\Entities\SalaryPeriod;
use Modules\Jobs\Http\Requests\ApplyJobRequest;

use Modules\Location\Entities\Country;
use Modules\Location\Entities\State;
use Modules\Location\Entities\City;

class JobsController extends Controller
{
    public function index(Request $request)
    {
        $data = Job::orderBy('created_at', 'DESC');
        
        if ($request->filled('search'))
        {
            $data->where('title', 'like', '%' . $request->search . '%');
        }
        if($request->filled('companyId')){
            $data->where('company_id', $request->companyId);
        }
        if ($request->filled('from_date') && $request->filled('to_date'))
        {
            $data->whereBetween('created_at',[$request->from_date, $request->to_date]);
        }
        $data = $data->paginate(10);
        
        return view('jobs::jobs.index', compact('data'));
    }

    public function create(Request $request)
    {
        $companies = Company::active()->get();
        $cities = City::active()->get();
        $careerLevels = CareerLevel::active()->get();
        $salaryPeriods = SalaryPeriod::active()->get();
        $functionalAreas = FunctionalArea::active()->get();
        $genders = Gender::active()->get();
        $jobTypes = JobType::active()->get();
        $jobShifts = JobShift::active()->get();
        $degreeLevels = DegreeLevel::active()->get();
        $jobExperiences = JobExperience::active()->get();
        
        $countries = Country::get();
        $states = State::get();
        $cities = City::active()->get();
        $degreeTypes = DegreeType::get();
        
        return view('jobs::jobs.create', compact('companies', 'countries', 'states', 'cities', 'degreeTypes', 'careerLevels', 'salaryPeriods', 'functionalAreas', 'genders', 'jobTypes', 'jobShifts', 'degreeLevels', 'jobExperiences'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'title' => 'required', 
            'city_id' => 'required', 
            'vacancies' => 'required'
        ]);
        $inputData = $request->all();   

        !$request->filled('is_active') ?  $inputData['is_active'] = false : $inputData['is_active'] = true;
        !$request->filled('is_featured') ?  $inputData['is_featured'] = false : $inputData['is_featured'] = true;
        !$request->filled('is_freelance') ?  $inputData['is_freelance'] = false : $inputData['is_freelance'] = true;
        !$request->filled('hide_salary') ?  $inputData['hide_salary'] = false : $inputData['hide_salary'] = true;
        
        $item = Job::create($inputData);
        
        $item->slug = Str::slug($item->title, '-') . '-' . $item->id;
        $item->update();

        return redirect()
            ->route('settings.jobs.index')
            ->with('success', __('Created successfully'));
    }

    public function edit(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        $companies = Company::active()->get();
        $careerLevels = CareerLevel::active()->get();
        $salaryPeriods = SalaryPeriod::active()->get();
        $functionalAreas = FunctionalArea::active()->get();
        $genders = Gender::active()->get();
        $jobTypes = JobType::active()->get();
        $jobShifts = JobShift::active()->get();
        $degreeLevels = DegreeLevel::active()->get();
        $jobExperiences = JobExperience::active()->get();
        
        $countries = Country::get();
        $states = State::get();
        $cities = City::active()->get();
        $degreeTypes = DegreeType::get();

        return view('jobs::jobs.edit', compact('job', 'companies', 'countries', 'states', 'cities', 'degreeTypes', 'careerLevels', 'salaryPeriods', 'functionalAreas', 'genders', 'jobTypes', 'jobShifts', 'degreeLevels', 'jobExperiences'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_id' => 'required',
            'title' => 'required', 
            'city_id' => 'required', 
            'vacancies' =>'required'
        ]);
        $inputData = $request->all();
        $item = Job::findorFail($id);
        $inputData['slug'] = Str::slug($inputData['title'], '-') . '-' . $item->id;

        !$request->filled('is_active') ?  $inputData['is_active'] = false : $inputData['is_active'] = true;
        !$request->filled('is_featured') ?  $inputData['is_featured'] = false : $inputData['is_featured'] = true;
        !$request->filled('is_freelance') ?  $inputData['is_freelance'] = false : $inputData['is_freelance'] = true;
        !$request->filled('hide_salary') ?  $inputData['hide_salary'] = false : $inputData['hide_salary'] = true;

        $item->update($inputData);

        return redirect()
            ->back()
            ->with('success', __('Updated successfully'));
    }

    public function destroy(Request $request, $id)
    {
        $item = Job::findOrFail($id);

        $item->delete();

        return redirect()->route('settings.companies.index')
            ->with('success', __('Deleted successfully'));
    }
    
    public function exportToCsv(Request $request)
    {
        
        $data = Job::orderBy('created_at', 'DESC')->get();
        
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

        $filename =  public_path("files/jobs-download.csv");
        $handle = fopen($filename, 'w');

        //adding the first row
        fputcsv($handle, [
            'Company', 'Title', 'City', 'Vacancies', 'Description', 'Responsibilities', 'Requirements', 'Salary From', 'Salary To', 'Career Level', 'Functional Area', 'Gender', 'Job Type', 'Expiry Date', 'Required Degree', 'Experience', 'Created At'
        ]);

        //adding the data from the array
        foreach ($data as $task) {
            fputcsv($handle, [
                $task->company->company_name, $task->title, $task->city->name, $task->vacancies, strip_tags($task->description), strip_tags($task->responbilities), strip_tags($task->requirements), $task->salary_from, $task->salary_to, $task->career_level->name, $task->functional_area->name, $task->gender->name, $task->job_type->name, $task->expiry_date, $task->degree_level->name, $task->job_experience->name, $task->created_at
            ]);

        }
        fclose($handle);

        //download command
        return FacadeResponse::download($filename, "jobs-download.csv", $headers);
        
    }

}
