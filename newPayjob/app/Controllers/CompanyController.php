<?php

namespace App\Controllers;
use App\Models\CommonModel;
use CodeIgniter\I18n\Time;

class CompanyController extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        helper('general');
        $this->commonModel = new CommonModel();
        $this->empid = $this->session->get('empid');
        $this->db = \Config\Database::connect();
        
        
    }
    
    public function dashboard()
    {
        // $data['tasklist']=$this->commonModel->allFetch('far_task',array('tuserID'=>$this->cusid),'tid');
        // print_r($data);exit;
        return view('company/dashboard');
        // echo 'dgf';
    }
    
    
    
    public function profile()
    {
        $data['country']=$this->commonModel->allFetch('location_countries',array('id'=>'101')); 
        $data['state']=$this->commonModel->allFetch('location_states',array('country_id'=>'101'));
        
        $data['city']=$this->commonModel->allFetch('location_cities',array());
        
        $data['industry']=$this->commonModel->allFetch('job_attributes_industries',array()); 
        $data['ownership']=$this->commonModel->allFetch('job_attributes_ownership_types',array());
        $currentYear = date('Y');
        $pastYears = range($currentYear - 30, $currentYear );
        $years = array_merge($pastYears);
        $startNumber = 1;
        $endNumber = 10;
        $numbers = range($startNumber, $endNumber);
        $data['numberList'] = $numbers;
        $data['years'] = $years;
        
        
        
        return view('company/profile',$data);
        // echo 'dgf';
    }
    
    public function editProfileSubmit()
    {
        $employerid=$this->request->getVar('empid');
        $company_name=$this->request->getVar('company_name');
        $company_email=$this->request->getVar('company_email');
        $phone=$this->request->getVar('phone');
        $industry_id=$this->request->getVar('industry_id');
        $company_ceo=$this->request->getVar('companyceo');
        $ownership_type_id=$this->request->getVar('ownership_type_id');
        $no_of_employees=$this->request->getVar('no_of_employees');
        $no_of_offices=$this->request->getVar('no_of_offices');
        $established_in=$this->request->getVar('established_in');
        $country_id=$this->request->getVar('country_id');
        $state_id=$this->request->getVar('state_id');
        $city_id=$this->request->getVar('city_id');
        $website=$this->request->getVar('website');
        $fax=$this->request->getVar('fax');
        $description=$this->request->getVar('description');
        $facebook=$this->request->getVar('facebook');
        $twitter=$this->request->getVar('twitter');
        $linkedin=$this->request->getVar('linkedin');
        $pinterest=$this->request->getVar('pinterest');
        $youtube=$this->request->getVar('youtube');
        
        
        $profile = $this->request->getFile('image');
        if ($profile->isValid() && !$profile->hasMoved())
        {
            $newName = $profile->getRandomName();
            $profile->move('./back/assets/images/company_logo/', $newName); // Move the file to the 'uploads' directory
            if(!empty($newName))
            {
                $save['logo']=$newName;
            }
        }
        
        $save['company_name']=$company_name;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($company_name));
        $save['company_email']=$company_email;
        $save['company_ceo']=$company_ceo;
        $save['industry_id']=$industry_id;
        $save['ownership_type_id']=$ownership_type_id;
        $save['description']=$description;
        $save['no_of_offices']=$no_of_offices;
        $save['website']=$website;
        $save['no_of_employees']=$no_of_employees;
        $save['established_in']=$established_in;
        $save['fax']=$fax;
        $save['phone']=$phone;
        $save['country_id']=$country_id;
        $save['state_id']=$state_id;
        $save['city_id']=$city_id;
        // $password=$this->request->getVar('password');
        // $save['emppassword']= password_hash($password, PASSWORD_DEFAULT);
        $save['is_active']=$is_active;
        $save['facebook']=$facebook;
        $save['twitter']=$twitter;
        $save['linkedin']=$linkedin;
        $save['pinterest']=$pinterest;
        $save['youtube']=$youtube;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $update=$this->commonModel->updateData('companies',$save,array('id'=>$employerid));
        // print_r($update);exit;
        $array=array();
        if($update)
        {
            // $array['status']=1;
            // $array['msg']="Profile Updated";
            $this->session->setFlashdata('success', 'Profile Updated.');
            return redirect()->to(base_url('company/profile'));
        }
        else
        {
            // $array['status']=0;
            // $array['msg']="Something went wrong. Try again later.";
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('company/profile'));
        }
        // echo json_encode($array);
    }
    
    public function jobs()
    {
        
        
        $data['jobs']=$this->commonModel->allFetchd('jobs_list',array('company_id'=>$this->empid));
        // print_r($data);exit;

        return view('company/view-jobs',$data);
        
    }
    
    public function addjobs()
    {
        
        
        $data['functionarea']=$this->commonModel->allFetch('job_attributes_functional_areas',array());
        $data['degree']=$this->commonModel->allFetch('job_attributes_degree_levels',array());
        $data['degreelevel']=$this->commonModel->allFetch('job_attributes_degree_types',array());
        $data['careerlevel']=$this->commonModel->allFetch('job_attributes_career_levels',array());
        $data['experience']=$this->commonModel->allFetch('job_attributes_job_experiences',array());
        $data['gender']=$this->commonModel->allFetch('job_attributes_genders',array());
        $data['jtype']=$this->commonModel->allFetch('job_attributes_job_types',array());
        $data['jshift']=$this->commonModel->allFetch('job_attributes_job_shifts',array());
        $data['country']=$this->commonModel->allFetch('location_countries',array('id'=>'101')); 
        $data['state']=$this->commonModel->allFetch('location_states',array('country_id'=>'101'));
        $data['city']=$this->commonModel->allFetch('location_cities',array());
        $data['salaryperiod']=$this->commonModel->allFetch('job_attributes_salary_periods',array());
        // print_r($data);exit;

        return view('company/post-jobs',$data);
        
    }
    
    public function jobsSubmit()
    {
        $companyid=$this->request->getVar('companyid');
        $title=$this->request->getVar('title');
        $functional_area_id=$this->request->getVar('functional_area_id');
        $degree_level_id=$this->request->getVar('degree_level_id');
        $degree_type_id=$this->request->getVar('degree_type_id');
        $career_level_id=$this->request->getVar('career_level_id');
        $job_experience_id=$this->request->getVar('job_experience_id');
        $gender_id=$this->request->getVar('gender_id');
        $job_type_id=$this->request->getVar('job_type_id');
        $job_shift_id=$this->request->getVar('job_shift_id');
        $country_id=$this->request->getVar('country_id');
        $state_id=$this->request->getVar('state_id');
        $city_id=$this->request->getVar('city_id');
        $vacancies=$this->request->getVar('vacancies');
        $salary_from=$this->request->getVar('salary_from');
        $description=$this->request->getVar('description');
        $salary_to=$this->request->getVar('salary_to');
        $salary_currency=$this->request->getVar('salary_currency');
        $work_mode=$this->request->getVar('work_mode');
        $salary_period_id=$this->request->getVar('salary_period_id');
        $expiry_date=$this->request->getVar('expiry_date');
        $address=$this->request->getVar('address');
        $responbilities=$this->request->getVar('responbilities');
        $requirements=$this->request->getVar('requirements');
        
        $save['company_id']=$companyid;
        $save['title']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['functional_area_id']=$functional_area_id;
        $save['degree_level_id']=$degree_level_id;
        $save['degree_type_id']=$degree_type_id;
        $save['career_level_id']=$career_level_id;
        $save['job_experience_id']=$job_experience_id;
        $save['gender_id']=$gender_id;
        $save['job_type_id']=$job_type_id;
        $save['job_shift_id']=$job_shift_id;
        $save['country_id']=$country_id;
        $save['state_id']=$state_id;
        $save['city_id']=$city_id;
        $save['vacancies']=$vacancies;
        $save['salary_from']=$salary_from;
        $save['salary_to']=$salary_to;
        $save['description']=$description;
        $save['salary_currency']=$salary_currency;
        $save['work_mode']=$work_mode;
        $save['salary_period_id']=$salary_period_id;
        $save['expiry_date']=$expiry_date;
        $save['address']=$address;
        $save['responbilities']=$responbilities;
        $save['requirements']=$requirements;
        $save['is_active']=0;
        
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        // $update=$this->commonModel->insertData('jobs_list',$save,array('id'=>$companyid));
        $savedata=$this->commonModel->insertData('jobs_list',$save);
       
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Job Post Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        return redirect()->to(base_url('company/post-jobs'));
        
        }
        
    public function editjobspost($id)
    {
        $data['functionarea']=$this->commonModel->allFetch('job_attributes_functional_areas',array());
        $data['degree']=$this->commonModel->allFetch('job_attributes_degree_levels',array());
        $data['degreelevel']=$this->commonModel->allFetch('job_attributes_degree_types',array());
        $data['careerlevel']=$this->commonModel->allFetch('job_attributes_career_levels',array());
        $data['experience']=$this->commonModel->allFetch('job_attributes_job_experiences',array());
        $data['gender']=$this->commonModel->allFetch('job_attributes_genders',array());
        $data['jtype']=$this->commonModel->allFetch('job_attributes_job_types',array());
        $data['jshift']=$this->commonModel->allFetch('job_attributes_job_shifts',array());
        $data['country']=$this->commonModel->allFetch('location_countries',array('id'=>'101')); 
        $data['state']=$this->commonModel->allFetch('location_states',array('country_id'=>'101'));
        $data['city']=$this->commonModel->allFetch('location_cities',array());
        $data['salaryperiod']=$this->commonModel->allFetch('job_attributes_salary_periods',array());
        // print_r($data);exit;
        
        $data['datajobpost']=$this->commonModel->fs('jobs_list',array('id'=>$id));

        return view('company/edit-post-jobs',$data);
        
    }
    
    public function editjobspost1()
    {
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $functional_area_id=$this->request->getVar('functional_area_id');
        $degree_level_id=$this->request->getVar('degree_level_id');
        $degree_type_id=$this->request->getVar('degree_type_id');
        $career_level_id=$this->request->getVar('career_level_id');
        $job_experience_id=$this->request->getVar('job_experience_id');
        $gender_id=$this->request->getVar('gender_id');
        $job_type_id=$this->request->getVar('job_type_id');
        $job_shift_id=$this->request->getVar('job_shift_id');
        $country_id=$this->request->getVar('country_id');
        $state_id=$this->request->getVar('state_id');
        $city_id=$this->request->getVar('city_id');
        $vacancies=$this->request->getVar('vacancies');
        $salary_from=$this->request->getVar('salary_from');
        $description=$this->request->getVar('description');
        $salary_to=$this->request->getVar('salary_to');
        $salary_currency=$this->request->getVar('salary_currency');
        $work_mode=$this->request->getVar('work_mode');
        $salary_period_id=$this->request->getVar('salary_period_id');
        $expiry_date=$this->request->getVar('expiry_date');
        $address=$this->request->getVar('address');
        $responbilities=$this->request->getVar('responbilities');
        $requirements=$this->request->getVar('requirements');
        
        // $save['company_id']=$companyid;
        $save['title']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['functional_area_id']=$functional_area_id;
        $save['degree_level_id']=$degree_level_id;
        $save['degree_type_id']=$degree_type_id;
        $save['career_level_id']=$career_level_id;
        $save['job_experience_id']=$job_experience_id;
        $save['gender_id']=$gender_id;
        $save['job_type_id']=$job_type_id;
        $save['job_shift_id']=$job_shift_id;
        $save['country_id']=$country_id;
        $save['state_id']=$state_id;
        $save['city_id']=$city_id;
        $save['vacancies']=$vacancies;
        $save['salary_from']=$salary_from;
        $save['salary_to']=$salary_to;
        $save['description']=$description;
        $save['salary_currency']=$salary_currency;
        $save['work_mode']=$work_mode;
        $save['salary_period_id']=$salary_period_id;
        $save['expiry_date']=$expiry_date;
        $save['address']=$address;
        $save['responbilities']=$responbilities;
        $save['requirements']=$requirements;
        $save['is_active']=0;
        
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $update=$this->commonModel->updateData('jobs_list',$save,array('id'=>$id));
        // $savedata=$this->commonModel->insertData('jobs_list',$save);
       
        if($update)
          {
            $this->session->setFlashdata('success', 'Job Post Added.');
             return redirect()->to(base_url('company/view-jobs'));
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('superadmin/edit-post-jobs/',$id));
          }
        
       
        
        }
    
    
    
    
    
    
    
    public function addcrop()
    {
        $data['croplist']=$this->commonModel->allFetchd('far_crop_type',array(),'croptype_id');
        return view('farmer/addcrop',$data);
        // echo 'dgf';
    }
    public function storecrop()
    {
        $save['crop_details_name']=$this->request->getVar('crop_name');
        $save['crop_details_veriety']=$this->request->getVar('crop_variety');
        $save['crop_details_cultivation']=$this->request->getVar('cultivation_date');
        $save['crop_details_land_area']=$this->request->getVar('crop_land_area');
        $save['crop_details_land_type']=$this->request->getVar('crop_land_type');
        $save['crop_details_land_preparation']=$this->request->getVar('land_preparation');
        $save['crop_details_seed_variety']=$this->request->getVar('seed_variety');
        $save['crop_details_seed_qty']=$this->request->getVar('seed_quantity');
        // $save['crop_details_seed_image']=$this->request->getVar('seed_image');
        $save['crop_details_seed_treatment']=$this->request->getVar('seed_treatment');
        $save['crop_details_cultivation_type']=$this->request->getVar('cultivation_type');
        $save['crop_details_seed_nashak']=$this->request->getVar('kharapatvaar_nashak');
        $save['crop_details_cultivation_method']=$this->request->getVar('cultivation_method');
        $save['crop_details_fertilizaion_name']=$this->request->getVar('fertilizer_name');
        // $save['crop_details_fertilization_image']=$this->request->getVar('fertilizer_image');
        $save['crop_details_fertilization_qty']=$this->request->getVar('fertilizer_quantity');
        $save['crop_details_water_supply']=$this->request->getVar('water_supply');
        $save['crop_details_water_resource']=$this->request->getVar('water_resource');
        $save['crop_details_seed_expenses']=$this->request->getVar('seed_expenses');
        $save['crop_details_fertilizers_expenses']=$this->request->getVar('fertilizers_expenses');
        $save['crop_details_land_preparation_expenses']=$this->request->getVar('land_preparation_expenses');
        $save['crop_details_approx_yield']=$this->request->getVar('approx_yield');
        $save['crop_details_approx_expenses']=$this->request->getVar('approx_expenses');
        $save['crop_details_uid']=$this->request->getVar('Uid');
        $save['crop_details_msg']=$this->request->getVar('msg');
        
        $profile = $this->request->getFile('seed_image');
        
        if ($profile->isValid() && !$profile->hasMoved())
        {
            $newName = $profile->getRandomName();
            $profile->move('./back/assets/images/farmer/croptype/', $newName); // Move the file to the 'uploads' directory
            if(!empty($newName))
            {
                $save['crop_details_seed_image']=$newName;
            }
        }
        
        $profile1 = $this->request->getFile('fertilizer_image');
        
        if ($profile1->isValid() && !$profile1->hasMoved())
        {
            $newName1 = $profile1->getRandomName();
            $profile1->move('./back/assets/images/farmer/croptype/', $newName1); // Move the file to the 'uploads' directory
            if(!empty($newName1))
            {
                $save['crop_details_fertilization_image']=$newName1;
            }
        }
        
        $savedata=$this->commonModel->insertData('far_crop_details',$save);
        if($savedata)
          {
              $this->session->setFlashdata('success', 'crop Added.');
              return redirect()->to(base_url('farmer/crop'));
          }
        else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('farmer/crop'));
          }
        
    }
    
    public function editcrops($id)
    {
        
        $data['datacrop']=$this->commonModel->fs('far_crop_details',array('crop_details_id'=>$id));
        $data['croplist']=$this->commonModel->allFetchd('far_crop_type',array(),'croptype_id');
        // print_r($data);exit;
        return view('farmer/edit-crop',$data);
    }
    
    public function editcrop1()
    {
        $id=$this->request->getVar('cropid');
        $save['crop_details_id']=$id;
        $save['crop_details_name']=$this->request->getVar('crop_name');
        $save['crop_details_veriety']=$this->request->getVar('crop_variety');
        $save['crop_details_cultivation']=$this->request->getVar('cultivation_date');
        $save['crop_details_land_area']=$this->request->getVar('crop_land_area');
        $save['crop_details_land_type']=$this->request->getVar('crop_land_type');
        $save['crop_details_land_preparation']=$this->request->getVar('land_preparation');
        $save['crop_details_seed_variety']=$this->request->getVar('seed_variety');
        $save['crop_details_seed_qty']=$this->request->getVar('seed_quantity');
        // $save['crop_details_seed_image']=$this->request->getVar('seed_image');
        $save['crop_details_seed_treatment']=$this->request->getVar('seed_treatment');
        $save['crop_details_cultivation_type']=$this->request->getVar('cultivation_type');
        $save['crop_details_seed_nashak']=$this->request->getVar('kharapatvaar_nashak');
        $save['crop_details_cultivation_method']=$this->request->getVar('cultivation_method');
        $save['crop_details_fertilizaion_name']=$this->request->getVar('fertilizer_name');
        // $save['crop_details_fertilization_image']=$this->request->getVar('fertilizer_image');
        $save['crop_details_fertilization_qty']=$this->request->getVar('fertilizer_quantity');
        $save['crop_details_water_supply']=$this->request->getVar('water_supply');
        $save['crop_details_water_resource']=$this->request->getVar('water_resource');
        $save['crop_details_seed_expenses']=$this->request->getVar('seed_expenses');
        $save['crop_details_fertilizers_expenses']=$this->request->getVar('fertilizers_expenses');
        $save['crop_details_land_preparation_expenses']=$this->request->getVar('land_preparation_expenses');
        $save['crop_details_approx_yield']=$this->request->getVar('approx_yield');
        $save['crop_details_approx_expenses']=$this->request->getVar('approx_expenses');
        $save['crop_details_msg']=$this->request->getVar('msg');
        
        $profile = $this->request->getFile('seed_image');
        
        if ($profile->isValid() && !$profile->hasMoved())
        {
            $newName = $profile->getRandomName();
            $profile->move('./back/assets/images/farmer/croptype/', $newName); // Move the file to the 'uploads' directory
            if(!empty($newName))
            {
                $save['crop_details_seed_image']=$newName;
            }
        }
        
        $profile1 = $this->request->getFile('fertilizer_image');
        
        if ($profile1->isValid() && !$profile1->hasMoved())
        {
            $newName1 = $profile1->getRandomName();
            $profile1->move('./back/assets/images/farmer/croptype/', $newName1); // Move the file to the 'uploads' directory
            if(!empty($newName1))
            {
                $save['crop_details_fertilization_image']=$newName1;
            }
        }
        
        // print_r($save);exit;
        $savedata=$this->commonModel->updateData('far_crop_details',$save,array('crop_details_id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Crop Updated.');
              return redirect()->to(base_url('farmer/crop'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('farmer/edit-crop'));
          }
        
    }
    
    public function deletecrop()
    {
          $deleteId = $this->request->getVar('deleteId');
          
          $save = [
                'deleted' => 1, // Change 'status' field to the desired status value
            ];
            // print_r($save);exit;
          $del=$this->commonModel->updateData('far_crop_details',$save,array('crop_details_id'=>$deleteId));
        //   $del=$this->commonModel->where('crop_details_id', $deleteId)->set($data)->update('far_crop_details');
          if($del)
          {
              $this->session->setFlashdata('success', 'Crop deleted.');
              return redirect()->to(base_url('farmer/crop'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('farmer/crop'));
          }
    }
    
    public function addcrop1()
    {
        // $data['croplist']=$this->commonModel->allFetchd('far_crop_type',array(),'croptype_id');
        // echo 'das';exit;
        return view('farmer/addcrop1');
        // echo 'dgf';
    }
    
    
    public function land()
    {
        return view('farmer/land');
    }
    public function addland()
    {
        // $data['croplist']=$this->commonModel->allFetchd('far_crop_type',array(),'croptype_id');
        // echo 'das';exit;
        return view('farmer/addland');
        // echo 'dgf';
    }
    
    
    public function calenderstore()
    {
        $array=array();
        $title=$this->request->getVar('event-title');
        $sdate=$this->request->getVar('event-sdate');
        $edate=$this->request->getVar('event-edate');
        $date=$this->request->getVar('event-date');
        $msg=$this->request->getVar('event-msg');
        $type=$this->request->getVar('event-category');
       
        $save['title']=$title;
        $save['start_event']=$sdate;
        $save['end_event']=$edate;
        $save['message']=$msg;
        $save['type']=$type;
        $save['date']=$date;
        
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('events',$save);
        
        if($savedata)
        {
            $array['status']=1;
            $array['msg']='Your Enquiry has been submitted. Our team will contact you soon.';
        }
        else
        {
            $array['status']=0;
            $array['msg']='Something went wrong. Try again later!';
        }
        echo json_encode($array);
    }
    
    
    
    

    
    public function getCalenderEvents()
    {
        // $events = $this->commonModel->allFetchd('far_task', []); // Retrieve all events, adjust as needed
        $data['tasklist'] = $this->commonModel->allFetch('far_task', array('tuserID' => $this->cusid), 'tid');
    
        $formattedEvents = [];
        foreach ($data['tasklist'] as $event) { // Use $data['tasklist'] instead of $events
            $formattedEvents[] = [
                'id' => $event->tid,
                'title' => $event->tname,
                'start' => $event->tdate, // Adjust this to your database field
                'message' => $event->tdes, // Adjust this to your database field
                'className' => $event->tstatus, // Adjust this to your database field
            ];
        }
        
        return $this->response->setJSON($formattedEvents);
    }
    // old calender fetch
    /*public function getCalenderEvents()
    {
        $events = $this->commonModel->allFetchd('events', []); // Retrieve all events, adjust as needed
    
        $formattedEvents = [];
        foreach ($events as $event) {
            $formattedEvents[] = [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->date, // Adjust this to your database field
                'sdate' => $event->start_event, // Adjust this to your database field
                'edate' => $event->end_event, // Adjust this to your database field
                'message' => $event->message, // Adjust this to your database field
                'className' => $event->type, // Adjust this to your database field
            ];
        }
        
        return $this->response->setJSON($formattedEvents); // Return events data as JSON
    }*/
     // old calender fetch
     
    public function calendarEdit($eventId)
    {
        // Retrieve the event to edit based on $eventId
        $event = $this->commonModel->fs('events',array('id'=>$eventId));
        print_r($event);exit;
        if (empty($event)) {
            // Handle event not found, e.g., show an error message
            return $this->response->setJSON(['status' => 0, 'msg' => 'Event not found']);
        } else {
            // Update the event with the edited data (adapt this code to your data structure)
            $event->title = $this->request->getPost('event-title');
            $event->start_event = $this->request->getPost('event-sdate');
            $event->end_event = $this->request->getPost('event-edate');
            $event->category = $this->request->getPost('event-category');
            $event->message = $this->request->getPost('event-msg');
    
            // Save the updated event (adapt this code to your data source)
            // $event->save();
            print_r($event);exit;
            $this->commonModel->updateData('events',$event,array('id'=>$event));
    
            // Return a success response
            return $this->response->setJSON(['status' => 200, 'msg' => 'Event updated successfully']);
        }
    }

    public function calenderdelete($deleteId)
    {
        //   $deleteId = $this->request->getVar('deleteId');
        
          $del=$this->commonModel->deleteData('events',array('id'=>$deleteId));
          if($del)
          {
              return $this->response->setJSON(['status' => 1, 'msg' => 'Event Delete successfully']);
          }
          else
          {
              return $this->response->setJSON(['status' => 0, 'msg' => 'NO']);
          }
    }
    
    public function viewChangePassword()
    {
        $data['seotitle']='Change Password | FarmEasy';
        $data['seodescription']='';
        $data['seokeyword']='';
        
        $teacherdetails=$this->commonModel->fs('far_customer_registration',array('cusid'=> $this->cusid));
        $data['oldpass']=$teacherdetails->password;
        return view('farmer/change-password',$data);
    }
    
    public function resetPassword()
    {
         $oldpassword=$this->request->getVar('oldpassword');
         $password=$this->request->getVar('password');
         $cpassword=$this->request->getVar('cpassword');
         
        $rules = [
            'oldpassword' => 'required',
            'password' => 'required',
            'cpassword' => 'required',
        ];
        $rulepass=[
            'cpassword' => 'matches[password]',
            ];
        if(!$this->validate($rules))
        {
            $response['status']=0;
            $response['msg']='Please enter valid details.';
        }
        else if(!$this->validate($rulepass))
        {
            $response['status']=0;
            $response['msg']='The passwords you entered do not match';
        }
        
        else
        {
            
            $teacherdetails=$this->commonModel->fs('far_customer_registration',array('cusid'=> $this->cusid));
            $oldpass=$teacherdetails->cuspassword;
            if(password_verify($oldpassword, $oldpass))
            {
                $save['cuspassword']=password_hash($password, PASSWORD_DEFAULT);
                $update=$this->commonModel->updateData('far_customer_registration',$save,array('cusid'=>$this->cusid));
                if($update)
                {
                    $response['status']=1;
                    $response['msg']='Password Updated.';
                }
                else
                {
                    $response['status']=0;
                    $response['msg']='Something went wrong. Try again later.';
                }
            }
            else
            {
                $response['status']=0;
                $response['msg']='Old passwords do not match';
            }
        }
        echo json_encode($response);
    }
    
    
    public function order()
    {
        return view('farmer/order');
    }
    
    public function booking()
    {
        return view('farmer/booking');
        // echo 'dgf';
    }
    
    public function service()
    {
        return view('farmer/service');
        // echo 'dgf';
    }
    
    public function tracker()
    {
        return view('farmer/service');
        // echo 'dgf';
    }
    
     public function logout()
    {
       session()->destroy();
       return redirect()->to(base_url('/'));
    }
}