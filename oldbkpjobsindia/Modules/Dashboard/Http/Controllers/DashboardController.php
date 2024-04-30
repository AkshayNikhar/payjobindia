<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\User\Entities\User;
use Modules\ResumeCV\Entities\Resumecv;
use Modules\ResumeCV\Entities\Resumecvtemplate;

use Modules\Jobs\Entities\DegreeLevel;
use Modules\Jobs\Entities\DegreeType;

use Modules\Jobs\Entities\JobExperience;

use Modules\Location\Entities\Country;
use Modules\Location\Entities\State;
use Modules\Location\Entities\City;

use Modules\Jobs\Entities\Gender;
use Modules\Jobs\Entities\FunctionalArea;



use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
   
    public function index(Request $request)
    {
        
        $user_id = $request->user()->id;

        $data_10_first = Resumecv::where('user_id', $request->user()->id);

        if($request->user()->can('admin')){
            $data_10_first = Resumecv::withCount(['user']);
        }
       

        $data_10_first->orderBy('created_at', 'DESC');
        $data_10_first = $data_10_first->paginate(10);

        $total_resume = Resumecv::where('user_id', $user_id)->count();
        $total_views = Resumecv::where('user_id', $user_id)->sum('view_count');
        
        $degrees = DegreeLevel::get();
        $degreeTypes = DegreeType::get();
        $experiences = JobExperience::get();
        $states = State::get();
        $countries = Country::get();
        $cities = City::get();
        $genders = Gender::get();
        $functionalAreas = FunctionalArea::get();

        return view('dashboard::index', 
            compact('total_resume', 'total_views','data_10_first', 'degrees', 'experiences', 'states', 'cities', 'genders', 'functionalAreas', 'countries', 'degreeTypes')
        );
    }
    
    
    public function saveProfileData(Request $request){
        $userId = $request->user()->id;
        
        $state_id = $request->state_id;
        $city_id = $request->city_id;
        $experience_id = $request->experience_id;
        $degree_id = $request->degree_id;
        $degree_type_id = $request->degree_type_id;
        
        $functional_area_id = $request->functional_area_id;
        $gender_id = $request->gender_id;
        
        $countryId = $request->country_id;
        $address = $request->address;
        
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        
        $description = $request->description;
        
        $technical_skills = $request->technical_skills;
        
        
        User::where('id', $userId)->update(['state' => $state_id, 'city' => $city_id, 'experience' => $experience_id, 'education' => $degree_id, 'gender_id' =>$gender_id, 'functional_area_id'=> $functional_area_id, 'country_id' => $countryId, 'address' => $address, 'name' => $name, 'mobile' => $phone, 'degree_type_id' => $degree_type_id, 'description' => $description, 'technical_skills' => $technical_skills]);
        
        return redirect()->route('jobslist')->with('success', 'Updated Successfully');;
    }
    
    public function getStatesAjax(Request $request){
        $states = State::where('country_id', $request->countryId)->get();
        echo(json_encode($states));
    }
    
    public function getCitiesAjax(Request $request){
        $cities = City::where('state_id', $request->stateId)->get();
        echo(json_encode($cities));
    }
    
    public function getDegreeTypeAjax(Request $request){
        $DegreeTypes = DegreeType::where('degree_level_id', $request->degree_level_id)->get();
        echo(json_encode($DegreeTypes));
    }
    

}
