<?php

namespace App\Controllers;
use App\Models\CommonModel;
use CodeIgniter\I18n\Time;

class ConsultantController extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        helper('general');
        $this->commonModel = new CommonModel();
        $this->consulid = $this->session->get('venid');
       
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
       
        return view('consultant/index');
        
    } 
    
    public function loginAuth()
    {
        $email=$this->request->getVar('email');
        $password=$this->request->getVar('password');
        
        $checkuser=$this->commonModel->fs('vendor',array('email'=>$email));
        
        if($checkuser)
        {
             $pass=$checkuser->password;
             $authenticatePassword = password_verify($password, $pass);
             if($authenticatePassword)
             {
                $ses_data = [
                    'venid' => $checkuser->id,
                    'venemail' => $checkuser->email,
                    'roleassign' => $checkuser->assign,
                    'isLoggedInvendor' => TRUE
                ];
                $this->session->set($ses_data);
                
                $this->session->setFlashdata('success', 'Login Successfully.');
                return redirect()->to(base_url('consultant/dashboard'));
                
             }
             else
            {
                $this->session->setFlashdata('error', 'Incorrect Password.');
                return redirect()->to(base_url('consultant/'));
            }
        }
        else
        {
            $this->session->setFlashdata('error', 'Email id not registered');
            return redirect()->to(base_url('consultant/'));
        }
        
    }
    
    public function dashboard()
    {
        // echo 'dfg';exit;
        $currentYear = date('Y-m-d');
        
        
        $data['totaljobs']=$this->commonModel->allCount('jobs_list',array('company_id'=>$this->empid));
        $data['totalapplicants']=$this->commonModel->allCount('job_applicants',array('company_id'=>$this->empid));
        $data['todayjobs']=$this->commonModel->allFetch('job_applicants',array('DATE(created_at)' => $currentYear,'company_id'=>$this->empid));
        
        return view('consultant/dashboard',$data);
        
    }
    
    public function profile()
    {
        $data['country']=$this->commonModel->allFetch('location_countries',array()); 
        $data['state']=$this->commonModel->allFetch('location_states',array());
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
        
        return view('consultant/profile',$data);
        // echo 'dgf';consultant
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
            return redirect()->to(base_url('consultant/profile'));
        }
        else
        {
            // $array['status']=0;
            // $array['msg']="Something went wrong. Try again later.";
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('consultant/profile'));
        }
        // echo json_encode($array);
    }
    
    public function jobs()
    {
        $data['jobs']=$this->commonModel->allFetchd('jobs_list',array('vendorID'=>$this->consulid));
        // print_r($data);exit;

        return view('consultant/view-jobs',$data);
        
    }
    
   /* public function addjobs()
    {
         
        $data['functionarea']=$this->commonModel->allFetchd('job_attributes_functional_areas',array('is_active'=>1));
        $data['degree']=$this->commonModel->allFetchd('job_attributes_degree_levels',array('is_active'=>1));
        $data['degreelevel']=$this->commonModel->allFetchd('job_attributes_degree_types',array('is_active'=>1));
        $data['careerlevel']=$this->commonModel->allFetchd('job_attributes_career_levels',array('is_active'=>1));
        $data['experience']=$this->commonModel->allFetchd('job_attributes_job_experiences',array('is_active'=>1));
        $data['gender']=$this->commonModel->allFetchd('job_attributes_genders',array('is_active'=>1));
        $data['jtype']=$this->commonModel->allFetchd('job_attributes_job_types',array('is_active'=>1));
        $data['vtype']=$this->commonModel->allFetchd('vacancy_type',array('is_active'=>1));
        $data['jshift']=$this->commonModel->allFetchd('job_attributes_job_shifts',array('is_active'=>1));
        $data['country']=$this->commonModel->allFetchd('location_countries',array('is_active'=>1)); 
        $data['state']=$this->commonModel->allFetchd('location_states',array('is_active'=>1));
        $data['city']=$this->commonModel->allFetchd('location_cities',array('is_active'=>1));
        $data['salaryperiod']=$this->commonModel->allFetchd('job_attributes_salary_periods',array('is_active'=>1));
        $data['jobcategory']=$this->commonModel->allFetchd('job_category',array('is_active'=>1));
        // print_r($data);exit;

        return view('consultant/post-jobs',$data);
        
    }*/
    
    public function jobsSubmit()
    {
        $companyid=$this->request->getVar('companyid');
        $vid=$this->request->getVar('vid');
        $title=$this->request->getVar('title');
        $job_category_id=$this->request->getVar('job_category_id');
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
        $salary_to=$this->request->getVar('salary_to');
        $salary_currency=$this->request->getVar('salary_currency');
        $work_mode=$this->request->getVar('work_mode');
        $salary_period_id=$this->request->getVar('salary_period_id');
        $expiry_date=$this->request->getVar('expiry_date');
        $address=$this->request->getVar('address');
        $company_des=$this->request->getVar('company_des');
        $company_responbility_home=$this->request->getVar('company_responbility_home');
        $company_requirement_home=$this->request->getVar('company_requirement_home');
        $contact_person_name=$this->request->getVar('contact_person_name');
        $contact_person_number=$this->request->getVar('contact_person_number');
        $contact_person_designation=$this->request->getVar('contact_person_designation');
        
        $save['company_id']=$companyid;
        $save['vendorID']=$vid;
        $save['title']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['jobcategory']=$job_category_id;
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
        $save['salary_currency']=$salary_currency;
        $save['work_mode']=$work_mode;
        $save['salary_period_id']=$salary_period_id;
        $save['expiry_date']=$expiry_date;
        $save['address']=$address;
        $save['company_des']=$company_des;
        $save['company_responbility_home']=$company_responbility_home;
        $save['company_requirement_home']=$company_requirement_home;
        $save['contact_person_name']=$contact_person_name;
        $save['contact_person_number']=$contact_person_number;
        $save['contact_person_designation']=$contact_person_designation;
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
        
        return redirect()->to(base_url('consultant/post-jobs'));
        
        }
        
    public function editjobspost($id)
    {
        $data['functionarea']=$this->commonModel->allFetch('function_area',array('is_active'=>1));
        // $data['functionarea']=$this->commonModel->allFetch('job_attributes_functional_areas',array('is_active'=>1));
        $data['degree']=$this->commonModel->allFetch('job_attributes_degree_levels',array('is_active'=>1));
        $data['degreelevel']=$this->commonModel->allFetch('job_attributes_degree_types',array('is_active'=>1));
        $data['careerlevel']=$this->commonModel->allFetch('job_attributes_career_levels',array('is_active'=>1));
        $data['experience']=$this->commonModel->allFetch('job_attributes_job_experiences',array('is_active'=>1));
        $data['gender']=$this->commonModel->allFetch('job_attributes_genders',array('is_active'=>1));
        $data['jtype']=$this->commonModel->allFetch('job_attributes_job_types',array('is_active'=>1));
        $data['vtype']=$this->commonModel->allFetch('vacancy_type',array('is_active'=>1));
        $data['jshift']=$this->commonModel->allFetch('job_attributes_job_shifts',array('is_active'=>1));
        $data['country']=$this->commonModel->allFetch('location_countries',array('is_active'=>1)); 
        $data['state']=$this->commonModel->allFetch('location_states',array('is_active'=>1));
        $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1));
        $data['salaryperiod']=$this->commonModel->allFetch('job_attributes_salary_periods',array('is_active'=>1));
        $data['jobcategory']=$this->commonModel->allFetch('job_category',array('is_active'=>1));
        // print_r($data);exit;
        
        $data['datajobpost']=$this->commonModel->fs('jobs_list',array('id'=>$id));

        return view('consultant/edit-post-jobs',$data);
        
    }
    
    public function viewpostjobs($id)
    {
        $data['datajobpost']=$this->commonModel->fs('jobs_list',array('id'=>$id));
        // print_r($data);
        return view('consultant/view-post-jobs',$data);
    }
    
    public function viewpostjobs1($id)
    {
        $data['datacandidate']=$this->commonModel->fs('users',array('id'=>$id));
        // print_r($data);
        return view('consultant/view-post-jobs1',$data);
    }
    
    public function editjobspost1()
    {
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $job_category_id=$this->request->getVar('job_category_id');
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
        $salary_to=$this->request->getVar('salary_to');
        $salary_currency=$this->request->getVar('salary_currency');
        $work_mode=$this->request->getVar('work_mode');
        $salary_period_id=$this->request->getVar('salary_period_id');
        $expiry_date=$this->request->getVar('expiry_date');
        $address=$this->request->getVar('address');
        $company_des=$this->request->getVar('company_des');
        $company_responbility_home=$this->request->getVar('company_responbility_home');
        $company_requirement_home=$this->request->getVar('company_requirement_home');
        $contact_person_name=$this->request->getVar('contact_person_name');
        $contact_person_number=$this->request->getVar('contact_person_number');
        $contact_person_designation=$this->request->getVar('contact_person_designation');
        
        // $save['company_id']=$companyid;
        $save['title']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['jobcategory']=$job_category_id;
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
        $save['salary_currency']=$salary_currency;
        $save['work_mode']=$work_mode;
        $save['salary_period_id']=$salary_period_id;
        $save['expiry_date']=$expiry_date;
        $save['address']=$address;
        $save['company_des']=$company_des;
        $save['company_responbility_home']=$company_responbility_home;
        $save['company_requirement_home']=$company_requirement_home;
        $save['contact_person_name']=$contact_person_name;
        $save['contact_person_number']=$contact_person_number;
        $save['contact_person_designation']=$contact_person_designation;
        $save['is_active']=0;
        
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $update=$this->commonModel->updateData('jobs_list',$save,array('id'=>$id));
        // $savedata=$this->commonModel->insertData('jobs_list',$save);
       
        if($update)
          {
            $this->session->setFlashdata('success', 'Job Post Added.');
             return redirect()->to(base_url('consultant/view-jobs'));
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('consultant/edit-post-jobs/',$id));
          }
        
    }
    
    public function companyjobapplicant()
    {
        $data['todayjobs']=$this->commonModel->allFetchd('job_applicants',array('company_id'=>$this->empid)); 
        
        return view('consultant/job-applicant',$data);
    }
    
    public function editcompanyjobaplicantss($id)
    {
        
        $data['datajobapplicant']=$this->commonModel->fs('job_applicants',array('id'=>$id));
        // print_r($data);exit;
        return view('consultant/edit-company-job-applicant',$data);
    }
    
    public function jobspostview($id)
    {
        
        $data['todayjobs']=$this->commonModel->allFetchd('job_applicants',array('job_id'=>$id));
        // print_r($data);exit;
        return view('consultant/jobs-post-view',$data);
    }
    
    public function viewcandidatejobapplicant($id)
    {
        
        $data['todayjobs']=$this->commonModel->fs('job_applicants',array('id'=>$id));
        // print_r($data);exit;
        return view('consultant/view-candidate-job-applicant',$data);
    }
    
    public function editcompanyjobaplicant1()
    {
           $deleteId = $this->request->getVar('deleteId');
          
          $active_status = $this->request->getVar('active_status');
          $description = $this->request->getVar('description');
          
          $save['active_status']=$active_status;
          $save['message']=$description;
          
        //   print_r($save);exit;
          
          $update=$this->commonModel->updateData('job_applicants',$save,array('id'=>$deleteId,));
          if($update)
          {
            $this->session->setFlashdata('success', 'Job Status Added.');
            return redirect()->to(base_url('consultant/job-applicant'));
          }
         else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('consultant/job-applicant'));
          }
    }
    
    
    public function editcompanyjobaplicant10()
    {
        $id=$this->request->getVar('id');
        $active_status=$this->request->getVar('active_status');
        
        $save['active_status']=$active_status;
        
        // print_r($save);exit;
        $update=$this->commonModel->updateData('job_applicants',$save,array('id'=>$id));
        if($update)
          {
            $this->session->setFlashdata('success', 'Job Status Added.');
             return redirect()->to(base_url('consultant/job-applicant'));
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('consultant/edit-company-job-applicant/',$id));
          }
    }
    
    public function changestatusjobss($id,$status)
    {
        $db = db_connect();
        $data = [
            'active_status' => $status,
        ];
        //  print_r($data);exit; 
        $db->table('job_applicants')->where('id', $id)->update($data);
         
        return redirect()->back();
       
    }
    
    public function viewChangePassword()
    {
        $data['seotitle']='Change Password | Pay Job India';
        $data['seodescription']='';
        $data['seokeyword']='';
        
        $teacherdetails=$this->commonModel->fs('companies',array('id'=> $this->empid));
        $data['oldpass']=$teacherdetails->password;
        return view('consultant/change-password',$data);
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
            
            $teacherdetails=$this->commonModel->fs('companies',array('id'=> $this->empid));
            $oldpass=$teacherdetails->emppassword;
            if(password_verify($oldpassword, $oldpass))
            {
                $save['emppassword']=password_hash($password, PASSWORD_DEFAULT);
                
                $update=$this->commonModel->updateData('companies',$save,array('id'=>$this->empid));
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
    
    
    // Company start
    public function companies()
    {
        $data['company']=$this->commonModel->allFetchd('companies',array('vendorID'=>$this->consulid));
        return view('consultant/all-company',$data);
    }
    
    public function addcompanies()
    {
        $currentYear = date('Y');
        
        $pastYears = range($currentYear - 30, $currentYear );
        $years = array_merge($pastYears);
        /*$pastYears = range($currentYear - 30, $currentYear - 1);
        $futureYears = range($currentYear, $currentYear + 10);
        $years = array_merge($pastYears, $futureYears);*/
        
        $startNumber = 1;
        $endNumber = 10;
        $numbers = range($startNumber, $endNumber);
        $data['numberList'] = $numbers;

        $data['years'] = $years;

        // print_r($data);exit;
       $data['industry']=$this->commonModel->allFetch('job_attributes_industries',array('is_active'=>1)); 
       $data['ownership']=$this->commonModel->allFetch('job_attributes_ownership_types',array('is_active'=>1)); 
       $data['country']=$this->commonModel->allFetch('location_countries',array('is_active'=>1)); 
       $data['state']=$this->commonModel->allFetch('location_states',array('is_active'=>1)); 
       $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1)); 
       return view('consultant/add-company',$data);
    }
    
    public function storecompanies()
    {
        /*$rules0 = [
            'company_name' => 'required',
            'company_email' => 'required|valid_email',
            'phone' => 'required|numeric',
            'industry_id' => 'required',
            'companyceo' => 'required',
            'ownership_type_id' => 'required',
            'no_of_employees' => 'required',
            'no_of_offices' => 'required',
            'established_in' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'website' => 'required',
            'fax' => 'required',
            'description' => 'required',
            
            
        ];*/
        $rules1 = [
            'company_name' => 'is_unique[companies.company_name]',
        ];
        $rules2 = [
            'company_email' => 'is_unique[companies.company_email]',
        ];
        $rules3 = [
            'phone' => 'is_unique[companies.phone]',
        ];
        
        
        
        /*if(!$this->validate($rules0))
        {
            $this->session->setFlashdata('error', 'Please enter valid details.');
        }*/
        if(!$this->validate($rules1)){
            $this->session->setFlashdata('error', 'Company Name already Exits.');
        }
        else if(!$this->validate($rules2)){
            $this->session->setFlashdata('error', 'Company Email already Exits.');
        }
        else if(!$this->validate($rules3)){
            $this->session->setFlashdata('error', 'Company Contact No. already Exits.');
        }
        else
        {
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
        $is_active=$this->request->getVar('is_active');
        $is_featured=$this->request->getVar('is_featured');
        $vendorID=$this->request->getVar('vid');
        
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
        $save['is_active']=$is_active; 
        $save['is_featured']=$is_featured;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        $save['vendorID']=$vendorID;
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('companies',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Company Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('consultant/add-company'));
       
    }
    
    public function editcompanies($id)
    {
        $currentYear = date('Y');
        
        $pastYears = range($currentYear - 30, $currentYear );
        $years = array_merge($pastYears);
        $startNumber = 1;
        $endNumber = 10;
        $numbers = range($startNumber, $endNumber);
        $data['numberList'] = $numbers;
        $data['years'] = $years;
        
        $data['industry']=$this->commonModel->allFetch('job_attributes_industries',array('is_active'=>1)); 
        $data['ownership']=$this->commonModel->allFetch('job_attributes_ownership_types',array('is_active'=>1)); 
        $data['country']=$this->commonModel->allFetch('location_countries',array('is_active'=>1)); 
        $data['state']=$this->commonModel->allFetch('location_states',array('is_active'=>1)); 
        $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1)); 
        
        $data['permissions']=$this->commonModel->allFetch('permission_type',array()); 
        $data['companypermissions']=$this->commonModel->fs('companies_Permission',array('companyID'=>$id)); 
        
        $data['datacompany']=$this->commonModel->fs('companies',array('id'=>$id));
        
        // print_r($data['userpermissions']);exit;
        return view('consultant/edit-company',$data);
    }
    
    public function viewcompanies($id)
    {
        $data['datacompany']=$this->commonModel->fs('companies',array('id'=>$id));
        // print_r($data);exit;
        
        return view('consultant/view-company',$data);
    }
    
    public function editcompanies1()
    {
        
        $id=$this->request->getVar('id');
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
        $is_active=$this->request->getVar('is_active');
        
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
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        // $savedata=$this->commonModel->insertData('companies',$save);
        $savedata=$this->commonModel->updateData('companies',$save,array('id'=>$id));
        
        
        $data = [
        'email'            => $this->request->getPost('peremail') === '1' ? 1 : 0,
        'name'             => $this->request->getPost('pername') === '1' ? 1 : 0,
        'view_resume'      => $this->request->getPost('perview_resume') === '1' ? 1 : 0,
        'delete_resume'    => $this->request->getPost('perdelete_resume') === '1' ? 1 : 0,
        'phone'            => $this->request->getPost('perphone') === '1' ? 1 : 0,
        'degree_level'     => $this->request->getPost('perdegree_level') === '1' ? 1 : 0,
        'degree_type'      => $this->request->getPost('perdegree_type') === '1' ? 1 : 0,
        'functional_area'  => $this->request->getPost('perfunctional_area') === '1' ? 1 : 0, 
        'exp'              => $this->request->getPost('perexp') === '1' ? 1 : 0,
        'logo'             => $this->request->getPost('perlogo') === '1' ? 1 : 0,
        'aaplied_job'      => $this->request->getPost('peraaplied_job') === '1' ? 1 : 0,
        'technical_skill'  => $this->request->getPost('pertechnical_skill') === '1' ? 1 : 0,
        // Add other checkbox fields here
        ];
        // print_r($data);exit;
        $datasave = $this->commonModel->updateData('companies_Permission', $data,array('companyID'=>$id));
        // print_r($datasave);exit;
        
        
        if($savedata && $datasave)
          {
            $this->session->setFlashdata('success', 'Company Update.');
            return redirect()->to(base_url('consultant/all-company'));
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('consultant/edit-company/',$id));
          }
        
        return redirect()->to(base_url('consultant/edit-company/',$id));
        
    
        
    }
    
    public function totalcompanyjob($id)
    {
        $data['datajobs']=$this->commonModel->allFetchd('jobs_list',array('company_id'=>$id));
        $data['datasjobs']=$this->commonModel->fs('companies',array('id'=>$id));
        // print_r($data);exit;
        return view('consultant/total-company-jobs',$data);
    }
    
    // Company end
    
    
    // Candidate start
    public function candidate()
    {
        $data['users']=$this->commonModel->allFetchd('users',array('vendorID'=>$this->consulid));
        
        return view('consultant/all-user',$data);
    }
    
    public function addcandidate()
    {
        return view('consultant/add-user');
    }
    
    public function storeCandidate()
    {
        /*$rules = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'mobile' => 'required|numeric',
            'password' => 'required',

        ];*/
        $uniquephone=[
            'mobile' => 'is_unique[users.mobile]',
        ];
        $uniqueemail=[
            'email' => 'is_unique[users.email]',
        ];
        /*$rulepass=[
            'cpassword' => 'matches[password]',
            ];*/
          
        /*if(!$this->validate($rules))
        {
            $this->session->setFlashdata('error', 'Please enter valid details.');
        }*/
        /*else if(!$this->validate($rulepass))
        {
            $this->session->setFlashdata('error', 'The passwords you entered do not match.');
        }*/
        if(!$this->validate($uniquephone))
        {
            $this->session->setFlashdata('error', 'Phone Number already registered.');
        }
        else if(!$this->validate($uniqueemail))
        {
            $this->session->setFlashdata('error', 'Email already registered.');
        }
        else
        {
            $data['name']=$this->request->getVar('name');
            $data['email']=$this->request->getVar('email');
            $data['mobile']=$this->request->getVar('mobile');
            $data['role']='candidate';
            $data['technical_skills']=$this->request->getVar('technical_skills');
            // $password=$this->request->getVar('password');
            // $data['password']= password_hash($password, PASSWORD_DEFAULT);
            $data['created_at']=Time::now()->format('Y-m-d H:i:s');
            $data['vendorID']=$this->request->getVar('vid');
            
            
            // print_r($data);exit;
            $insertdata=$this->commonModel->insertData('users',$data);
            if($insertdata)
            {
                $this->session->setFlashdata('success', ' Registration Completed');
                return redirect()->to(base_url('consultant/all-user'));
            }
            else
            {
                $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
                return redirect()->to(base_url('consultant/add-user'));
            }
        }
        
        return redirect()->to(base_url('consultant/add-user'));
    }
    
    public function editcandidate($id)
    {
        $data['datauser']=$this->commonModel->fs('users',array('id'=>$id));
        // print_r($data);exit;
        return view('consultant/edit-user',$data);
    }
    
    public function viewcandidate($id)
    {
        $data['datacandidate']=$this->commonModel->fs('users',array('id'=>$id));
        // print_r($data);exit;
        
        return view('consultant/view-user',$data);
    }
    
    public function editcandidate1()
    {
        
        $id=$this->request->getVar('id');
        $name=$this->request->getVar('name');
        $email=$this->request->getVar('email');
        $mobile=$this->request->getVar('mobile');
        $technical_skills=$this->request->getVar('technical_skills');
        
        $save['name']=$name;
        $save['email']=$email;
        $save['mobile']=$mobile;
        $save['technical_skills']=$technical_skills;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        // $savedata=$this->commonModel->insertData('companies',$save);
        $savedata=$this->commonModel->updateData('users',$save,array('id'=>$id));
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'User Update.');
            return redirect()->to(base_url('consultant/all-user'));
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('consultant/edit-user/',$id));
          }
        
        return redirect()->to(base_url('consultant/edit-user/',$id));
        
    }
    
    // Candidate end
    
      // job post start
    public function jobslist()
    {
        $data['jobs']=$this->commonModel->allFetchd('jobs_list',array());
        // $data['jobs']=$this->commonModel->allFetchd('jobs_list',array(),'id','desc');
        // $query = $this->commonModel->getLastQuery();

        // Print or log the query
        // echo $query; exit;
        // print_r($data);exit;

        return view('consultant/all-jobs',$data);
    }
    
    public function addjobs()
    {
        $data['functionarea']=$this->commonModel->allFetch('job_attributes_functional_areas',array('is_active'=>1));
        $data['degree']=$this->commonModel->allFetch('job_attributes_degree_levels',array('is_active'=>1));
        $data['degreelevel']=$this->commonModel->allFetch('job_attributes_degree_types',array('is_active'=>1));
        $data['careerlevel']=$this->commonModel->allFetch('job_attributes_career_levels',array('is_active'=>1));
        $data['experience']=$this->commonModel->allFetch('job_attributes_job_experiences',array('is_active'=>1));
        $data['gender']=$this->commonModel->allFetch('job_attributes_genders',array('is_active'=>1));
        $data['jtype']=$this->commonModel->allFetch('job_attributes_job_types',array('is_active'=>1));
        $data['vtype']=$this->commonModel->allFetch('vacancy_type',array('is_active'=>1));
        $data['jshift']=$this->commonModel->allFetch('job_attributes_job_shifts',array('is_active'=>1));
        $data['country']=$this->commonModel->allFetch('location_countries',array('is_active'=>1)); 
        $data['state']=$this->commonModel->allFetch('location_states',array('is_active'=>1));
        $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1));
        $data['salaryperiod']=$this->commonModel->allFetch('job_attributes_salary_periods',array('is_active'=>1));
        $data['companies']=$this->commonModel->allFetch('companies',array('is_active'=>1,'vendorID'=>$this->consulid));
        $data['jobcategory']=$this->commonModel->allFetch('job_category',array('is_active'=>1));
        // print_r($data);exit;

        return view('consultant/post-jobs',$data);
        
    }
    
    public function storejobs()
    {
        $companyid=$this->request->getVar('vid');
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
        $salary_to=$this->request->getVar('salary_to');
        $salary_currency=$this->request->getVar('salary_currency');
        $work_mode=$this->request->getVar('work_mode');
        $salary_period_id=$this->request->getVar('salary_period_id');
        $expiry_date=$this->request->getVar('expiry_date');
        $address=$this->request->getVar('address');
        $description=$this->request->getVar('company_des');
        $responbilities=$this->request->getVar('company_responbility_home');
        $requirements=$this->request->getVar('company_requirement_home');
        $is_active=$this->request->getVar('is_active');
        $is_featured=$this->request->getVar('is_featured');
        $contact_person_name=$this->request->getVar('contact_person_name');
        $contact_person_number=$this->request->getVar('contact_person_number');
        $contact_person_designation=$this->request->getVar('contact_person_designation');
        $jobcategory=$this->request->getVar('job_category_id');
        $vacancytype=$this->request->getVar('vacancy_type');
        
       
        
        $save['vendorID']=$companyid;
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
        $save['salary_currency']=$salary_currency;
        $save['work_mode']=$work_mode;
        $save['salary_period_id']=$salary_period_id;
        $save['expiry_date']=$expiry_date;
        $save['address']=$address;
        $save['company_des']=$description;
        $save['company_responbility_home']=$responbilities;
        $save['company_requirement_home']=$requirements;
        $save['is_active']=$is_active;
        $save['is_featured']=$is_featured;
        $save['contact_person_name']=$contact_person_name;
        $save['contact_person_number']=$contact_person_number;
        $save['contact_person_designation']=$contact_person_designation;
        $save['jobcategory']=$jobcategory;
        $save['vacancy_type']=$vacancytype;
        
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
        
        return redirect()->to(base_url('consultant/all-jobs'));
        
        }
    
    public function editjobs($id)
    {
        $data['functionarea']=$this->commonModel->allFetch('job_attributes_functional_areas',array('is_active'=>1));
        $data['degree']=$this->commonModel->allFetch('job_attributes_degree_levels',array('is_active'=>1));
        $data['degreelevel']=$this->commonModel->allFetch('job_attributes_degree_types',array('is_active'=>1));
        $data['careerlevel']=$this->commonModel->allFetch('job_attributes_career_levels',array('is_active'=>1));
        $data['experience']=$this->commonModel->allFetch('job_attributes_job_experiences',array('is_active'=>1));
        $data['gender']=$this->commonModel->allFetch('job_attributes_genders',array('is_active'=>1));
        $data['jtype']=$this->commonModel->allFetch('job_attributes_job_types',array('is_active'=>1));
        $data['vtype']=$this->commonModel->allFetch('vacancy_type',array('is_active'=>1));
        $data['jshift']=$this->commonModel->allFetch('job_attributes_job_shifts',array('is_active'=>1));
        $data['country']=$this->commonModel->allFetch('location_countries',array('is_active'=>1)); 
        $data['state']=$this->commonModel->allFetch('location_states',array('is_active'=>1));
        $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1));
        $data['salaryperiod']=$this->commonModel->allFetch('job_attributes_salary_periods',array('is_active'=>1));
        $data['companies']=$this->commonModel->allFetch('companies',array('is_active'=>1));
        $data['jobcategory']=$this->commonModel->allFetch('job_category',array('is_active'=>1));
        
        $data['functionareas']=$this->commonModel->allFetch('function_area',array('is_active'=>1));
        // $data['functionareas']=$this->commonModel->allFetch('function_area',array('job_cate_id'=>$data['jobcategory'][0]->id));
        // print_r($data['functionareas']);exit;
        
        $data['datajobpost']=$this->commonModel->fs('jobs_list',array('id'=>$id));
        // print_r($data['datajobpost']);exit;

        return view('consultant/edit-jobs',$data);
        
    }
    
    public function viewjobs($id)
    {
       $data['datajobpost']=$this->commonModel->fs('jobs_list',array('id'=>$id)); 
       return view('consultant/view-jobs',$data);
    }
    
    public function editjobs1()
    {
        $id=$this->request->getVar('id');
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
        $is_active=$this->request->getVar('is_active');
        $is_featured=$this->request->getVar('is_featured');
        $contact_person_name=$this->request->getVar('contact_person_name');
        $contact_person_number=$this->request->getVar('contact_person_number');
        $contact_person_designation=$this->request->getVar('contact_person_designation');
        $jobcategory=$this->request->getVar('job_category_id');
        $vacancytype=$this->request->getVar('vacancy_type');
        $isdisplay_des=$this->request->getVar('isdisplay_des');
        $isdisplay_res=$this->request->getVar('isdisplay_res');
        $isdisplay_req=$this->request->getVar('isdisplay_req');
        
        
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
        $save['salary_currency']=$salary_currency;
        $save['work_mode']=$work_mode;
        $save['salary_period_id']=$salary_period_id;
        $save['expiry_date']=$expiry_date;
        $save['address']=$address;
        $save['company_des']=$description;
        $save['company_responbility_home']=$responbilities;
        $save['company_requirement_home']=$requirements;
        $save['is_active']=$is_active;
        $save['is_featured']=$is_featured;
        $save['contact_person_name']=$contact_person_name;
        $save['contact_person_number']=$contact_person_number;
        $save['contact_person_designation']=$contact_person_designation;
        $save['jobcategory']=$jobcategory;
        $save['vacancy_type']=$vacancytype;
        $save['isdisplay_des']=$isdisplay_des;
        $save['isdisplay_res']=$isdisplay_res;
        $save['isdisplay_req']=$isdisplay_req;
        
        
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $update=$this->commonModel->updateData('jobs_list',$save,array('id'=>$id));
        // $savedata=$this->commonModel->insertData('jobs_list',$save);
       
        if($update)
          {
            $this->session->setFlashdata('success', 'Job Post Added.');
             return redirect()->to(base_url('consultant/all-jobs'));
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('consultant/edit-jobs/',$id));
          }
        
    }
    
    public function appliedjobslist()
    {
        $data['jobsapplicant']=$this->commonModel->allFetchd('job_applicants',array());
        // print_r($data);exit;
        return view('consultant/all-applied-jobs',$data);
    }
    
    public function jobscountlist($companys_id)
    {
        // $data['datajobs']=$this->commonModel->allFetchd('jobs_list',array('company_id'=>$companys_id));
        $data['joblistcount']=$this->commonModel->allFetchd('jobs_list',array('company_id'=>$companys_id));
        // print_r($data);exit;
        return view('consultant/jobs-count-list',$data);
    }
    
    public function appliedjobscount($job_id)
    {
        // $job_id1=base64_decode($job_id);
        // $data['datajobs']=$this->commonModel->allFetchd('jobs_list',array('company_id'=>$companys_id));
        $data['joblistcount']=$this->commonModel->allFetchd('job_applicants',array('job_id'=>$job_id));
        // print_r($data);exit;
        return view('consultant/applied-jobs-count',$data);
    }
    
    public function editcompanyjobapplicantapproved1()
    {
          $deleteId = $this->request->getVar('deleteId');
          
          $appovedid = $this->request->getVar('appovedid');
          
          $save['appoved']=$appovedid;
          
        // print_r($save);exit;
          
          $update=$this->commonModel->updateData('job_applicants',$save,array('id'=>$deleteId,));
        //   $das=$this->commonModel->getLastQuery();print_r($das);exit;
          if($update)
          {
            $this->session->setFlashdata('success', 'Job Status Added.');
            // return redirect()->to(base_url('consultant/jobs-count-list'));
            return redirect()->back();
          }
         else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('consultant/applied-jobs-count/'.$deleteId));
          }
    }
    
    public function changestatusjob($id,$status)
    {
        $db = db_connect();
        $data = [
            'active_status' => $status,
        ];
        $db->table('job_applicants')->where('id', $id)->update($data);
           
        return redirect()->back();
       
    }
    
    public function viewjoblist($id)
    {
        $data['jobslistss']=$this->commonModel->allFetchd('job_applicants',array()); 
        // print_r($data);exit;
        return view('consultant/view-job-list',$data);
    }
    
    // JobEnd
    
     // Pages start
    public function pageslist()
    {
        $data['pages']=$this->commonModel->allFetchd('pages',array());
        // $query = $this->commonModel->getLastQuery();

        // Print or log the query
        // echo $query; exit;
        // print_r($data);exit;

        return view('consultant/all-pages',$data);
    }
    
    public function addpages()
    {
        return view('consultant/add-pages');
    }
    
    public function storepages()
    {
        $name=$this->request->getVar('name');
        $title=$this->request->getVar('title');
        $description=$this->request->getVar('description');
        $keywords=$this->request->getVar('keywords');
        
        $save['name']=$name;
        $save['title']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($name));
        $save['description']=$description;
        $save['keywords']=$keywords;
        
        // print_r($save);exit;
        // $update=$this->commonModel->insertData('jobs_list',$save,array('id'=>$companyid));
        $savedata=$this->commonModel->insertData('pages',$save);
       
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Pages Added .');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        return redirect()->to(base_url('consultant/all-pages'));
        
        }
    
    public function editpages($id)
    {
       $data['datapages']=$this->commonModel->fs('pages',array('id'=>$id));
       return view('consultant/edit-pages',$data);
    }
    
    public function editpages1()
    {
        $id=$this->request->getVar('id');
        $name=$this->request->getVar('name');
        $title=$this->request->getVar('title');
        $description=$this->request->getVar('description');
        $keywords=$this->request->getVar('keywords');
        
        
        $save['name']=$name;
        $save['title']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($name));
        $save['description']=$description;
        $save['keywords']=$keywords;
        
    //   print_r($save);exit;
        
        $update=$this->commonModel->updateData('pages',$save,array('id'=>$id));
        
        if($update)
          {
            $this->session->setFlashdata('success', 'Pages Added.');
             return redirect()->to(base_url('consultant/all-pages'));
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('consultant/edit-pages/',$id));
          }
        
    }


    // Country start
    public function country()
    {
        
        $data['country']=$this->commonModel->allFetchd('location_countries',array());
        
        return view('consultant/all-country',$data);
    }
    
    public function addcountry()
    {
       return view('consultant/add-country');
    }
    
    public function storecountry()
    {
        $rules = [
            'title' => 'is_unique[location_countries.name]',
        ];
        
        $title=$this->request->getVar('title');
        
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'Country already Exists.');
        }
        else
        {
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('location_countries',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Country Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('consultant/add-country'));
       
    }
    
    public function editcountry($id)
    {
        $data['datacountry']=$this->commonModel->fs('location_countries',array('id'=>$id));
        // print_r($data);exit;
        return view('consultant/edit-country',$data);
    }
    
    public function editcountry1()
    {
        
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;		
    	$savedata=$this->commonModel->updateData('location_countries',$save,array('id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Country Updated.');
              return redirect()->to(base_url('consultant/all-country'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('consultant/edit-country/',$id));
          }
    
        
    }
    
    public function deletecountry()
    {
          $deleteId = $this->request->getVar('deleteId');
        //  print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('location_countries',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Country deleted.');
              return redirect()->to(base_url('consultant/all-country'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('consultant/all-country'));
          }
    }
    // Country end
    
    // State start
    public function state()
    {
        
        $data['state']=$this->commonModel->allFetchd('location_states',array());
        
        return view('consultant/all-state',$data);
    }
    
    public function addstate()
    {
       $data['country']=$this->commonModel->allFetchd('location_countries',array('id'=>101)); 
       return view('consultant/add-state',$data);
    }
    
    public function storestate()
    {
        $rules = [
            'title' => 'is_unique[location_states.name]',
        ];
        
        $title=$this->request->getVar('title');
        $country_id=$this->request->getVar('country_id');
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'State already Exists.');
        }
        else
        {
        $save['name']=$title;
        $save['country_id']=$country_id;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('location_states',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'State Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('consultant/add-state'));
       
    }
    
    public function editstate($id)
    {
        $data['country']=$this->commonModel->allFetchd('location_countries',array('id'=>101)); 
        $data['datastate']=$this->commonModel->fs('location_states',array('id'=>$id));
        // print_r($data);exit;
        return view('consultant/edit-state',$data);
    }
    
    public function editstate1()
    {
        
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $country_id=$this->request->getVar('country_id');
        $is_active=$this->request->getVar('is_active');
        
        $save['name']=$title;
        $save['country_id']=$country_id;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;		
    	$savedata=$this->commonModel->updateData('location_states',$save,array('id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'State Updated.');
              return redirect()->to(base_url('consultant/all-state'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('consultant/edit-state/',$id));
          }
    
        
    }
    
    public function deletestate()
    {
          $deleteId = $this->request->getVar('deleteId');
        //  print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('location_states',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'State deleted.');
              return redirect()->to(base_url('consultant/all-state'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('consultant/all-state'));
          }
    }
    // State end
    
    // City start
    public function city()
    {
        
        $data['state']=$this->commonModel->allFetchd('location_cities',array());
        
        return view('consultant/all-city',$data);
    }
    
    public function addcity()
    {
       
       $data['state']=$this->commonModel->allFetchd('location_states',array()); 
       return view('consultant/add-city',$data);
    }
    
    public function storecity()
    {
        $rules = [
            'title' => 'is_unique[location_cities.name]',
        ];
        
        $title=$this->request->getVar('title');
        $state_id=$this->request->getVar('state_id');
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'City already Exists.');
        }
        else
        {
        $save['name']=$title;
        $save['state_id']=$state_id;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('location_cities',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'City Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('consultant/add-city'));
       
    }
    
    public function editcity($id)
    {
        $data['state']=$this->commonModel->allFetchd('location_states',array()); 
        $data['datacity']=$this->commonModel->fs('location_cities',array('id'=>$id));
        // print_r($data);exit;
        return view('consultant/edit-city',$data);
    }
    
    public function editcity1()
    {
        
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $state_id=$this->request->getVar('state_id');
        $is_active=$this->request->getVar('is_active');
        
        $save['name']=$title;
        $save['state_id']=$state_id;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;		
    	$savedata=$this->commonModel->updateData('location_cities',$save,array('id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'City Updated.');
              return redirect()->to(base_url('consultant/all-city'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('consultant/edit-city/',$id));
          }
    
        
    }
    
    public function deletecity()
    {
          $deleteId = $this->request->getVar('deleteId');
        //  print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('location_cities',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'City deleted.');
              return redirect()->to(base_url('consultant/all-city'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('consultant/all-city'));
          }
    }
    // City end
    
    
    


    
    
    
    

    
     public function logout()
    {
       session()->destroy();
       return redirect()->to(base_url('/'));
    }
}