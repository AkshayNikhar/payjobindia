<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;
use Modules\Saas\Entities\Package;
use Modules\User\Entities\User;
use Nwidart\Modules\Facades\Module;
use Modules\User\Entities\PermissionType;
use Modules\User\Entities\PermissionsUser;

use Modules\Jobs\Entities\DegreeLevel;
use Modules\Jobs\Entities\DegreeType;

use Modules\Jobs\Entities\JobExperience;

use Modules\Location\Entities\State;
use Modules\Location\Entities\City;

use Modules\Jobs\Entities\Gender;
use Modules\Jobs\Entities\FunctionalArea;

use Modules\Location\Entities\Country;

use Modules\Jobs\Entities\Company;


class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::query();
        
        $cities = City::get();

        if($request->filled('role') && empty($request->search)){
            $data->where('role', $request->role)->orderBy('created_at', 'DESC');
        }
        elseif($request->filled('role') && $request->filled('search')){
            $data->where('role', $request->role)->where('users.name', 'like', '%' . $request->search . '%')->orderBy('created_at', 'DESC');
        }
        elseif ($request->filled('search')) {
            $data->where('users.name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')->orderBy('created_at', 'DESC');
        }
        else{
            $data->orderBy('created_at', 'DESC');
        }
        if($request->filled('city')){
            $data->where('city', $request->city)->orderBy('users.created_at', 'DESC');
        }
        
        if($request->filled('fromDateFilter') && $request->filled('toDateFilter')){
            $from = $request->fromDateFilter;
            $to = $request->toDateFilter; 
            
            $data->whereBetween('users.created_at', [$from, $to]);
        }

        $data = $data->leftJoin('location_countries', 'location_countries.id', '=', 'users.country_id')
        ->leftJoin('location_states', 'location_states.id', '=', 'users.state')
        ->leftJoin('location_cities', 'location_cities.id', '=' ,'users.city')->select('users.*', 'location_states.name as stateName', 'location_cities.name as cityName', 'location_countries.name as countryName')->paginate(10);

        return view('user::users.index', compact(
            'data',
            'cities'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = [];
        $permissions = PermissionType::get();
        
        if (Module::find('Saas')) {
            $packages = Package::all();
        }

        return view('user::users.create', compact(
            'packages',
            'permissions'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'mobile'            => 'required|string|max:10',
            'role'            => 'required|string|max:255',
            'email'           => 'required|email|max:255|unique:users',
            'password'        => 'required|string|min:6|same:password_confirmation',
            'package_ends_at' => 'nullable|date',
        ]);

        $request->request->add([
            'password' => Hash::make($request->password),
        ]);

        
         
        $user = User::create($request->except('permissions'));
        
        if($user['role'] == "employer"){
            $d = Company::create(['user_id' => $user->id]);
        }
         
         if(!empty($request->permissions)){foreach($request->permissions as $permission){
             $user->givePermissionsTo($permission);
         }}
        return redirect()->route('settings.users.index')->with('success', __('Created successfully'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $packages = [];
        $permissions = PermissionType::get();
        
        $userPermissions = PermissionsUser::where('user_id', $user->id)->pluck('permission_type_id');
        
        if (Module::find('Saas')) {
            $packages = Package::all();
        }
        return view('user::users.edit', compact(
            'user',
            'packages',
            'permissions',
            'userPermissions'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'mobile'            => 'required|string|max:10',
            'role'            => 'required|string|max:255',
            'email'           => 'required|email|unique:users,email,' . $user->id,
            'password'        => 'nullable|string|min:6|same:password_confirmation',
            'package_ends_at' => 'nullable|date',

        ]);

        if ($request->filled('password')) {
            $request->request->add([
                'password' => Hash::make($request->password),
            ]);
        } else {
            $request->request->remove('password');
        }


        
        $user->update($request->except('permissions'));
        $userPermissions = $user->permissions->pluck('permission_name'); // array from db 
        
        $requestPermission = $request->permissions; // array from ui
        
        
        
        $arr1 = $userPermissions->toArray();
        $arr2 = $requestPermission;
        
        if($arr2 == null){
            $arr2 = [];
        }
        
        
        $tmp1 = array_diff($arr1,$arr2);
        $tmp2 = array_diff($arr2,$arr1);
        
        foreach($tmp1 as $permission){
            $user->withdrawPermissionsTo($permission);
        }
        foreach($tmp2 as $permission){
             $user->givePermissionsTo($permission);
        }
        return redirect()->route('settings.users.edit', $user)
            ->with('success', __('Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        if ($request->user()->id == $user->id) {
            return redirect()->route('settings.users.index')
                ->with('error', __("You can't remove yourself."));
        }

        $user->delete();

        return redirect()->route('settings.users.index')
            ->with('success', __('Deleted successfully'));
    }

    public function accountSettings(Request $request)
    {
        
        $degrees = DegreeLevel::get();
        $degreeTypes = DegreeType::get();
        $experiences = JobExperience::get();
        $states = State::get();
        $countries = Country::get();
        $cities = City::get();
        $genders = Gender::get();
        $functionalAreas = FunctionalArea::get();

        $user = $request->user();
        return view('user::auth.profile', compact(
            'user', 'degrees', 'experiences', 'states', 'cities', 'genders', 'functionalAreas', 'countries', 'degreeTypes'));
    }

    public function accountSettingsUpdate(Request $request)
    {

        $request->validate([
            'name'     => 'required|max:255',
            'mobile'     => 'required|max:10',
            'password' => 'same:password_confirmation',
        ]);

        if ($request->filled('password')) {
            $request->request->add([
                'password' => Hash::make($request->password),
            ]);
        } else {
            $request->request->remove('password');
        }

        $request->user()->update($request->all());

        return redirect()->route('accountsettings.index')
            ->with('success', __('Updated successfully'));
    }
    
    public function exportToCsv(Request $request)
    {
        $data = User::query();

        if($request->filled('role') && empty($request->search)){
            $data->where('role', $request->role);
        }
        elseif($request->filled('role') && $request->filled('search')){
            $data->where('role', $request->role)->where('name', 'like', '%' . $request->search . '%');
        }
        elseif ($request->filled('search')) {
            $data->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }
        else{
            $data->orderBy('created_at', 'DESC');
        }
        
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

        $filename =  public_path("files/users-download.csv");
        $handle = fopen($filename, 'w');

        //adding the first row
        fputcsv($handle, [
            'Name', 'Email', 'Phone', 'Gender', 'Education', 'Course', 'Functional Area','Experience', 'Country','State', 'City', 'Address', 'Role', 'Created At'
        ]);

        $datas = $data->leftJoin('job_attributes_genders', 'job_attributes_genders.id', '=', 'users.gender_id')
        ->leftJoin('location_countries', 'location_countries.id', '=', 'users.country_id')
        ->leftJoin('location_states', 'location_states.id', '=', 'users.state')
        ->leftJoin('location_cities', 'location_cities.id', '=' ,'users.city')
        ->leftJoin('job_attributes_degree_levels','job_attributes_degree_levels.id', '=','users.education')
        ->leftJoin('job_attributes_degree_types','job_attributes_degree_types.id', '=','users.degree_type_id')
        ->leftJoin('job_attributes_functional_areas','job_attributes_functional_areas.id', '=','users.functional_area_id')
        ->leftJoin('job_attributes_job_experiences', 'job_attributes_job_experiences.id', '=', 'users.experience')
        ->select('users.*', 'location_states.name as state_name', 'location_cities.name as city_name', 'job_attributes_degree_levels.name as degree_name', 'job_attributes_job_experiences.name as experience_name', 'job_attributes_genders.name as gender', 'job_attributes_degree_types.name as degreeType', 'job_attributes_functional_areas.name as functionalArea', 'location_countries.name as country')
        ->get();
        //adding the data from the array
        foreach ($datas as $task) {
            fputcsv($handle, [
                $task->name, $task->email, $task->mobile, $task->gender, $task->degree_name, $task->degreeType, $task->functionalArea,$task->experience_name, $task->country,$task->state_name, $task->city_name, $task->address, $task->role, $task->created_at
            ]);

        }
        fclose($handle);

        //download command
        return FacadeResponse::download($filename, "users-download.csv", $headers);
        
    }
    
    //block 
    public function unblock(Request $request)
    {
        $user = User::find($request->userid);
        $user->blocked = 0;
        $user->save();
        
        return redirect()->route('settings.users.index')->with('success', __('User unblocked'));
    }
        
    public function block(Request $request)
    {

        $user = User::find($request->userid);
        $user->blocked = 1;
        $user->save();
        
        return redirect()->route('settings.users.index')->with('success', __('User blocked'));
    }
}
