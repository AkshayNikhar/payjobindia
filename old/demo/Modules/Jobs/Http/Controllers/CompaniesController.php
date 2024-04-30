<?php

namespace Modules\Jobs\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controller;
use Modules\Jobs\Entities\Company;
use Modules\Jobs\Entities\Industry;
use Modules\Jobs\Entities\OwnershipType;

use Modules\Jobs\Http\Requests\CompanyStoreRequest;
use Modules\User\Entities\User;
use Illuminate\Support\Str;


use Modules\Location\Entities\Country;
use Modules\Location\Entities\State;
use Modules\Location\Entities\City;

class CompaniesController extends Controller
{
    public function index(Request $request)
    {
        $data = Company::orderBy('created_at', 'DESC');
        
        if ($request->filled('search'))
        {
            $data->where('company_name', 'like', '%' . $request->search . '%');
        }
        $data = $data->paginate(10);

        return view('jobs::companies.index', compact('data'));
    }

    public function create(Request $request)
    {
        $employers = User::where('role', 'employer')->get();
        $industries = Industry::active()->get();
        $ownershipType = OwnershipType::active()->get();
        

        $no_of_offices = Industry::active()->get();
        $no_of_employees = OwnershipType::active()->get();
        $established_in = City::active()->get();
        
        $countries = Country::get();
        $states = State::get();
        $cities = City::active()->get();

        return view('jobs::companies.create', compact(
            'industries','ownershipType','employers', 'countries', 'states', 'cities'
        ));
        
    }
    public function store(Request $request)
    {
       
        $request->validate([
                'user_id' => 'required',
                'logo' => 'required|max:155', 
                'company_name' => 'required|max:155', 
                'company_email' => 'required',
                'industry_id' => 'required',
                'city_id'   => 'required',
                "contact_person_name"=> 'max:100',
                "contact_person_email"=> 'max:100',
                "contact_person_mobile"=> 'max:100',
            ]
        );
        $inputData = $request->all();

        $user = User::findorFail($inputData['user_id']);

        $image = $request->file('logo');

        !$request->filled('is_active') ?  $inputData['is_active'] = false : $inputData['is_active'] = true;

        !$request->filled('is_featured') ?  $inputData['is_featured'] = false : $inputData['is_featured'] = true;
        
        if ($image != '')
        {
            $request->validate([
                'logo' => 'sometimes|required|mimes:jpg,jpeg,png,svg|max:20000', ], 
                ['logo.mimes' => __('The :attribute must be an jpg,jpeg,png,svg') , ]
            );
            $path_folder = public_path('storage/user_storage/'.$user->id);

            $image_name = "company_logo_" . rand() . '.' . $image->getClientOriginalExtension();
            $image->move($path_folder , $image_name);

            $inputData['logo'] = $image_name;
        }

        $item = Company::create($inputData);
        
        $item->slug = Str::slug($item->company_name, '-') . '-' . $item->id;
        $item->update();

        return redirect()
            ->route('settings.companies.index')
            ->with('success', __('Created successfully'));
    }

    public function edit($id,Request $request)
    {
        $company = Company::findOrFail($id);
        
        $employers = User::where('role', 'employer')->get();
        $industries = Industry::active()->get();
        $ownershipType = OwnershipType::active()->get();
        
        $countries = Country::get();
        $states = State::get();
        $cities = City::active()->get();

        $no_of_offices = Industry::active()->get();
        $no_of_employees = OwnershipType::active()->get();
        $established_in = City::active()->get();

        return view('jobs::companies.edit', compact(
            'employers','company','industries','ownershipType','countries', 'states', 'cities'
        ));
        
    }
    
    public function viewJob($id,Request $request)
    {
        $company = Company::findOrFail($id);
        
        $employers = User::where('role', 'employer')->get();
        $industries = Industry::active()->get();
        $ownershipType = OwnershipType::active()->get();
        
        $countries = Country::get();
        $states = State::get();
        $cities = City::active()->get();

        $no_of_offices = Industry::active()->get();
        $no_of_employees = OwnershipType::active()->get();
        $established_in = City::active()->get();

        return view('jobs::companies.view_jobs', compact(
            'employers','company','industries','ownershipType','countries', 'states', 'cities'
        ));
        
    }

    public function update($id,Request $request)
    {
        $request->validate([
                'user_id' => 'required',
                'company_name' => 'required|max:155', 
                'company_email' => 'required',
                'industry_id' => 'required',
                'city_id'   => 'required',
                "contact_person_name"=> 'max:100',
                "contact_person_email"=> 'max:100',
                "contact_person_mobile"=> 'max:100',
            ]
        );
        $item = Company::findorFail($id);

        $inputData = $request->all();

        $user = User::findorFail($inputData['user_id']);

        
        $inputData['slug'] = Str::slug($inputData['company_name'], '-') . '-' . $item->id;
        
        !$request->filled('is_active') ?  $inputData['is_active'] = false : $inputData['is_active'] = true;

        !$request->filled('is_featured') ?  $inputData['is_featured'] = false : $inputData['is_featured'] = true;

        $image = $request->file('logo');

        if ($image != '')
        {
            $request->validate([
                'logo' => 'sometimes|required|mimes:jpg,jpeg,png,svg|max:20000', ], 
                ['logo.mimes' => __('The :attribute must be an jpg,jpeg,png,svg') , ]
            );
            $path_folder = public_path('storage/user_storage/'.$user->id);

            $path = $path_folder."/".$item->logo;
            deleteImageWithPath($path);
            
            $image_name = "company_logo_" . rand() . '.' . $image->getClientOriginalExtension();
            $image->move($path_folder , $image_name);

            $inputData['logo'] = $image_name;
        }
        //else $inputData['logo'] = $item->logo;

        $item->update($inputData);

        return redirect()
            ->back()
            ->with('success', __('Updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $item = Company::findOrFail($id);

        if ($item->jobs()->count() > 0) {
            return redirect()->route('settings.companies.index')->with('error',"Can't delete because it has jobs in it");
        }

        // delete image
        $path = public_path('storage/thumb_templates') . "/" . $item->thumb;
        $path_folder = public_path('storage/user_storage/'.$item->user->id);
        $path = $path_folder."/".$item->logo;
        deleteImageWithPath($path);

        $item->delete();

        return redirect()->route('settings.companies.index')
            ->with('success', __('Deleted successfully'));
    }
    
    
    //export companies 
    
        public function companiesExport(Request $request){
        
        $data = Company::orderBy('created_at', 'DESC');
        
        if ($request->filled('search'))
        {
            $data->where('company_name', 'like', '%' . $request->search . '%');
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

        $filename =  public_path("files/companies-download.csv");
        $handle = fopen($filename, 'w');

        //adding the first row
        fputcsv($handle, [
            "user_id",
            "company_name",
            "company_email",
            "company_ceo",
            "industry_id",
            "ownership_type_id",
            "description",
            "location",
            "no_of_offices",
            "website",
            "no_of_employees",
            "established_in",
            "fax",
            "phone",
            "logo",
            "country_id",
            "state_id",
            "city_id",
            "facebook",
            "twitter",
            "linkedin",
            "pinterest",
            "youtube",
            "is_active",
            "is_featured",
            "created_at",
            
        ]);
        
        
        $datas = $data->get();

        //adding the data from the array
        foreach ($datas as $d) {
            fputcsv($handle, [
                $d->user_id,
                $d->company_name,
                $d->company_email,
                $d->company_ceo,
                $d->industry->name ?? 'not available',
                $d->ownership->name ?? 'not available',
                $d->description,
                $d->location,
                $d->no_of_offices,
                $d->website,
                $d->no_of_employees,
                $d->established_in,
                $d->fax,
                $d->phone,
                $d->logo,
                $d->country->name ?? 'not available',
                $d->state->name ?? 'not available',
                $d->city->name ?? 'not available',
                $d->facebook,
                $d->twitter,
                $d->linkedin,
                $d->pinterest,
                $d->youtube,
                $d->is_active,
                $d->is_featured,
                $d->created_at,
            ]);

        }
        fclose($handle);

        //download command
        return FacadeResponse::download($filename, "companies-download.csv", $headers);
        
    }
    

}
