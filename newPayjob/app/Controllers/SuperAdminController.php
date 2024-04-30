<?php 
namespace App\Controllers;
use App\Models\SuperAdminModel;
use App\Models\CommonModel;
use CodeIgniter\Files\File;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;

class SuperAdminController extends BaseController
{
    public function __construct()
    {
        // Load session service
        $this->session = \Config\Services::session();
        
        // Create an instance of the CommonModel
        $this->commonModel = new CommonModel();
        
    }
    
    public function index()
    {
        helper(['form']);
        // echo password_hash("123", PASSWORD_BCRYPT);
        return view('superadmin/index');
        
    }  
    
    public function dashboard()
    {
        $data['company']=$this->commonModel->allFetchd('companies',array(),'id','desc',5);
        $data['jobs']=$this->commonModel->allFetchd('jobs_list',array(),'id','desc',5);
        // print_r($data['jobs']);exit;
        return view('superadmin/dashboard',$data);
    }
     
    public function citywiseshow($id)
    {
        $data['datajobs']=$this->commonModel->allFetchd('jobs_list',array('city_id'=>$id));
        $data['datascity']=$this->commonModel->fs('location_cities',array('id'=>$id));
        // print_r($data['datajobs']);exit;
        return view('superadmin/city-wise-job',$data);
    }
    
    public function loginAuth()
    {
        $session = session();
        $userModel = new SuperAdminModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('email', $email)->first();
        
        // print_r($data);exit;
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'email' => $data['email'],
                    'isLoggedInSuper' => TRUE
                ];
                $session->set($ses_data);
                // echo '<pre>';
                // print_r($ses_data);
                // exit;
                return redirect()->to(base_url('superadmin/dashboard'));
            
            }else{
                $session->setFlashdata('error', 'Password is incorrect.');
                return redirect()->to(base_url('superadmin/'));
                // echo password_hash("123", PASSWORD_DEFAULT);
            }
        }else{
            $session->setFlashdata('error', 'Email does not exist.');
            return redirect()->to(base_url('superadmin/'));
        }
    }
    
    // customer 
    public function allcustomer()
    {
        // $data['states']=$this->commonModel->allFetch('far_states',array('country_id'=>'101'));
        // $data['cities']=$this->commonModel->allFetch('far_cities',array('state_id'=>$this->stateid));
        
        $data['customer']=$this->commonModel->allFetchd('far_customer_registration',array(),'cusid');
        // print_r($data);exit;
        return view('superadmin/all-customer',$data);
    }
    
    public function changestatuscustomer($id,$status)
    {
        $db = db_connect();
        $data = [
            'active_status' => $status,
        ];
        $db->table('far_customer_registration')
           ->where('cusid', $id)
           ->update($data);
           
        return redirect()->back();
       
    }
    //contact
    
    public function allContact()
    {
        $data['contact']=$this->commonModel->allFetchd('far_contact',array(),'contact_id');
        // print_r($data);exit;
        return view('superadmin/all-contact',$data);
    }
    
    // career level start
    public function careerlevel()
    {
        
        $data['careerlevel']=$this->commonModel->allFetchd('job_attributes_career_levels',array());
        // print_r($data);exit;
        return view('superadmin/all-career-level',$data);
    }
    
    public function addcareerlevel()
    {
       return view('superadmin/add-career-level');
    }
    
    public function storecareerlevel()
    {
        $rules = [
            'title' => 'is_unique[job_attributes_career_levels.name]',
        ];
        
        
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'Carrer Level already Exists.');
        }
        else
        {
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($this);exit;
        $savedata=$this->commonModel->insertData('job_attributes_career_levels',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Career Level Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('superadmin/add-career-level'));
       
    }
    
    public function editcareerlevel($id)
    {
        $data['datacareer']=$this->commonModel->fs('job_attributes_career_levels',array('id'=>$id));
        return view('superadmin/edit-career-level',$data);
    }
    
    public function editcareerlevel1()
    {
        
        
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;		
    	$savedata=$this->commonModel->updateData('job_attributes_career_levels',$save,array('id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Carrer Level Updated.');
              return redirect()->to(base_url('superadmin/all-career-level'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-career-level/',$id));
          }
        
        
    }
    
    public function deletecareerlevel()
    {
          $deleteId = $this->request->getVar('deleteId');
        //   print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('job_attributes_career_levels',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Carrer Level deleted.');
              return redirect()->to(base_url('superadmin/all-career-level'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-career-level'));
          }
    }
    // career level end
    
    // Jobs role start
    public function jobsrole()
    {
        $data['jobsrole']=$this->commonModel->allFetchd('job_attributes_functional_areas',array());
        return view('superadmin/all-jobs-role',$data);
    }
    
    public function addjobsrole()
    {
       return view('superadmin/add-jobs-role');
    }
    
    public function storejobsrole()
    {
        $rules = [
            'title' => 'is_unique[job_attributes_functional_areas.name]',
        ];
        
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'Jobs Role already Exists.');
        }
        else
        {
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');;
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('job_attributes_functional_areas',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Jobs Role Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('superadmin/add-jobs-role'));
       
    }
    
    public function editjobsrole($id)
    {
        $data['datarole']=$this->commonModel->fs('job_attributes_functional_areas',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-jobs-role',$data);
    }
    
    public function editjobsrole1()
    {
        
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;		
    	$savedata=$this->commonModel->updateData('job_attributes_functional_areas',$save,array('id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Job Role Updated.');
              return redirect()->to(base_url('superadmin/all-jobs-role'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-jobs-role/',$id));
          }
        
        
    }
    
    public function deletejobsrole()
    {
          $deleteId = $this->request->getVar('deleteId');
        //   print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('job_attributes_functional_areas',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Jobs Role deleted.');
              return redirect()->to(base_url('superadmin/all-jobs-role'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-jobs-role'));
          }
    }
    // Jobs role end
    
    // gender start
    public function gender()
    {
        $data['gender']=$this->commonModel->allFetchd('job_attributes_genders',array());
        return view('superadmin/all-gender',$data);
    }
    
    public function addgender()
    {
       return view('superadmin/add-gender');
    }
    
    public function storegender()
    {
        $rules = [
            'title' => 'is_unique[job_attributes_genders.name]',
        ];
        
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'Gender already Exists.');
        }
        else
        {
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');;
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('job_attributes_genders',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Gender Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('superadmin/add-gender'));
       
    }
    
    public function editgender($id)
    {
        $data['datagender']=$this->commonModel->fs('job_attributes_genders',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-gender',$data);
    }
    
    public function editgender1()
    {
        
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        
        // print_r($save);exit;		
    	$savedata=$this->commonModel->updateData('job_attributes_genders',$save,array('id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Gender Updated.');
              return redirect()->to(base_url('superadmin/all-gender'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-gender/',$id));
          }
        
        
    }
    
    public function deletegender()
    {
          $deleteId = $this->request->getVar('deleteId');
        //   print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('job_attributes_genders',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Jobs Role deleted.');
              return redirect()->to(base_url('superadmin/all-gender'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-gender'));
          }
    }
    // gender end
    
    // industry start
    public function industry()
    {
        $data['industry']=$this->commonModel->allFetchd('job_attributes_industries',array());
        return view('superadmin/all-industry',$data);
    }
    
    public function addindustry()
    {
       return view('superadmin/add-industry');
    }
    
    public function storeindustry()
    {
        $rules = [
            'title' => 'is_unique[job_attributes_industries.name]',
        ];
        
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'Industry already Exists.');
        }
        else
        {
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('job_attributes_industries',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Industry Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('superadmin/add-industry'));
       
    }
    
    public function editindustry($id)
    {
        $data['dataindustry']=$this->commonModel->fs('job_attributes_industries',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-industry',$data);
    }
    
    public function editindustry1()
    {
        
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;		
    	$savedata=$this->commonModel->updateData('job_attributes_industries',$save,array('id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Industry Updated.');
              return redirect()->to(base_url('superadmin/all-industry'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-industry/',$id));
          }
        
        
    }
    
    public function deleteindustry()
    {
          $deleteId = $this->request->getVar('deleteId');
        //   print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('job_attributes_industries',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Industry deleted.');
              return redirect()->to(base_url('superadmin/all-industry'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-industry'));
          }
    }
    // industry end
    
    // Job experience start
    public function jobExp()
    {
        $data['jobexp']=$this->commonModel->allFetchd('job_attributes_job_experiences',array());
        return view('superadmin/all-job-experience',$data);
    }
    
    public function addjobExp()
    {
       return view('superadmin/add-job-experience');
    }
    
    public function storejobExp()
    {
        $rules = [
            'title' => 'is_unique[job_attributes_job_experiences.name]',
        ];
        
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'Job Experience already Exists.');
        }
        else
        {
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('job_attributes_job_experiences',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Job Experience Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('superadmin/add-job-experience'));
       
    }
    
    public function editjobExp($id)
    {
        $data['datajobexp']=$this->commonModel->fs('job_attributes_job_experiences',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-job-experience',$data);
    }
    
    public function editjobExp1()
    {
        
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;		
    	$savedata=$this->commonModel->updateData('job_attributes_job_experiences',$save,array('id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Job Experience Updated.');
              return redirect()->to(base_url('superadmin/all-job-experience'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-job-experience/',$id));
          }
    
        
    }
    
    public function deletejobExp()
    {
          $deleteId = $this->request->getVar('deleteId');
        //   print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('job_attributes_job_experiences',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Job Experience deleted.');
              return redirect()->to(base_url('superadmin/all-job-experience'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-job-experience'));
          }
    }
    // Job experience end
    
    // Job type start
    public function jobtype()
    {
        $data['jobtype']=$this->commonModel->allFetchd('job_attributes_job_types',array());
        return view('superadmin/all-jobtype',$data);
    }
    
    public function addjobtype()
    {
       return view('superadmin/add-jobtype');
    }
    
    public function storejobtype()
    {
        $rules = [
            'title' => 'is_unique[job_attributes_job_types.name]',
        ];
        
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'Job Type already Exists.');
        }
        else
        {
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('job_attributes_job_types',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Job Type Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('superadmin/add-jobtype'));
       
    }
    
    public function editjobtype($id)
    {
        $data['datajobtype']=$this->commonModel->fs('job_attributes_job_types',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-jobtype',$data);
    }
    
    public function editjobtype1()
    {
        
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;		
    	$savedata=$this->commonModel->updateData('job_attributes_job_types',$save,array('id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Job Type Updated.');
              return redirect()->to(base_url('superadmin/all-jobtype'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-jobtype/',$id));
          }
    
        
    }
    
    public function deletejobtype()
    {
          $deleteId = $this->request->getVar('deleteId');
        //   print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('job_attributes_job_types',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Job Experience deleted.');
              return redirect()->to(base_url('superadmin/all-jobtype'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-jobtype'));
          }
    }
    // Job type end
    
    // Job Shift start
    public function jobshift()
    {
        $data['jobshift']=$this->commonModel->allFetchd('job_attributes_job_shifts',array());
        return view('superadmin/all-jobshift',$data);
    }
    
    public function addjobshift()
    {
       return view('superadmin/add-jobshift');
    }
    
    public function storejobshift()
    {
        $rules = [
            'title' => 'is_unique[job_attributes_job_shifts.name]',
        ];
        
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'Job Shift already Exists.');
        }
        else
        {
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('job_attributes_job_shifts',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Job Shift Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('superadmin/add-jobshift'));
       
    }
    
    public function editjobshift($id)
    {
        $data['datajobshift']=$this->commonModel->fs('job_attributes_job_shifts',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-jobshift',$data);
    }
    
    public function editjobshift1()
    {
        
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;		
    	$savedata=$this->commonModel->updateData('job_attributes_job_shifts',$save,array('id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Job Shift Updated.');
              return redirect()->to(base_url('superadmin/all-jobshift'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-jobshift/',$id));
          }
    
        
    }
    
    public function deletejobshift()
    {
          $deleteId = $this->request->getVar('deleteId');
        //  print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('job_attributes_job_shifts',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Job Experience deleted.');
              return redirect()->to(base_url('superadmin/all-jobshift'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-jobshift'));
          }
    }
    // Job Shift end
    
    // degree level start
    public function degreelevel()
    {
        $data['degreelevel']=$this->commonModel->allFetchd('job_attributes_degree_levels',array());
        return view('superadmin/all-degree-level',$data);
    }
    
    public function adddegreelevel()
    {
       return view('superadmin/add-degree-level');
    }
    
    public function storedegreelevel()
    {
        $rules = [
            'title' => 'is_unique[job_attributes_degree_levels.name]',
        ];
        
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'Degree Level already Exists.');
        }
        else
        {
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('job_attributes_degree_levels',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Degree Level Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('superadmin/add-degree-level'));
       
    }
    
    public function editdegreelevel($id)
    {
        $data['datadegreelevel']=$this->commonModel->fs('job_attributes_degree_levels',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-degree-level',$data);
    }
    
    public function editdegreelevel1()
    {
        
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;		
    	$savedata=$this->commonModel->updateData('job_attributes_degree_levels',$save,array('id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Degree Level Updated.');
              return redirect()->to(base_url('superadmin/all-degree-level'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-degree-level/',$id));
          }
    
        
    }
    
    public function deletedegreelevel()
    {
          $deleteId = $this->request->getVar('deleteId');
        //  print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('job_attributes_degree_levels',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Degree Level deleted.');
              return redirect()->to(base_url('superadmin/all-degree-level'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-degree-level'));
          }
    }
    // degree level end
    
    // Education start
    public function education()
    {
        
        $data['education']=$this->commonModel->allFetchd('job_attributes_degree_types',array());
        // $degree =$data['education'][0]->degree_level_id;
        
        // $degreess['deg']=$this->commonModel->allFetchd('job_attributes_degree_levels',array('id'=>$degree));
        // print_r($data['deg']);exit;
        return view('superadmin/all-education',$data);
    }
    
    public function addeducation()
    {
       $data['degree']=$this->commonModel->allFetchd('job_attributes_degree_levels',array());
       return view('superadmin/add-education',$data);
    }
    
    public function storeeducation()
    {
        $rules = [
            'title' => 'is_unique[job_attributes_degree_types.name]',
            // 'degree_level_id' => 'required',
        ];
        
        $title=$this->request->getVar('title');
        $degree_level_id=$this->request->getVar('degree_level_id');
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'Education already Exists.');
        }
        else
        {
        $save['name']=$title;
        $save['degree_level_id']=$degree_level_id;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('job_attributes_degree_types',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Education Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('superadmin/add-education'));
       
    }
    
    public function editeducation($id)
    {
        $data['degree']=$this->commonModel->allFetchd('job_attributes_degree_levels',array());
        $data['dataeducation']=$this->commonModel->fs('job_attributes_degree_types',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-education',$data);
    }
    
    public function editeducation1()
    {
        
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $degree_level_id=$this->request->getVar('degree_level_id');
        $is_active=$this->request->getVar('is_active');
        
        $save['name']=$title;
        $save['degree_level_id']=$degree_level_id;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;		
    	$savedata=$this->commonModel->updateData('job_attributes_degree_types',$save,array('id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Education Updated.');
              return redirect()->to(base_url('superadmin/all-education'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-education/',$id));
          }
    
        
    }
    
    public function deleteeducation()
    {
          $deleteId = $this->request->getVar('deleteId');
        //  print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('job_attributes_degree_types',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Education deleted.');
              return redirect()->to(base_url('superadmin/all-education'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-education'));
          }
    }
    // Education end
    
    // Ownership start
    public function ownership()
    {
        
        $data['ownership']=$this->commonModel->allFetchd('job_attributes_ownership_types',array());
        
        return view('superadmin/all-ownership',$data);
    }
    
    public function addownership()
    {
       return view('superadmin/add-ownership');
    }
    
    public function storeownership()
    {
        $rules = [
            'title' => 'is_unique[job_attributes_ownership_types.name]',
        ];
        
        $title=$this->request->getVar('title');
        
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'Ownership already Exists.');
        }
        else
        {
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('job_attributes_ownership_types',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Ownership Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('superadmin/add-ownership'));
       
    }
    
    public function editownership($id)
    {
        $data['dataownership']=$this->commonModel->fs('job_attributes_ownership_types',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-ownership',$data);
    }
    
    public function editownership1()
    {
        
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;		
    	$savedata=$this->commonModel->updateData('job_attributes_ownership_types',$save,array('id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Ownership Updated.');
              return redirect()->to(base_url('superadmin/all-ownership'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-ownership/',$id));
          }
    
        
    }
    
    public function deleteownership()
    {
          $deleteId = $this->request->getVar('deleteId');
        //  print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('job_attributes_ownership_types',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Ownership deleted.');
              return redirect()->to(base_url('superadmin/all-ownership'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-ownership'));
          }
    }
    // Ownership end
    
    // Salary type start
    public function salary()
    {
        
        $data['salary']=$this->commonModel->allFetchd('job_attributes_salary_periods',array());
        
        return view('superadmin/all-salary',$data);
    }
    
    public function addsalary()
    {
       return view('superadmin/add-salary');
    }
    
    public function storesalary()
    {
        $rules = [
            'title' => 'is_unique[job_attributes_salary_periods.name]',
        ];
        
        $title=$this->request->getVar('title');
        
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'Salary Type already Exists.');
        }
        else
        {
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('job_attributes_salary_periods',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Salary Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('superadmin/add-salary'));
       
    }
    
    public function editsalary($id)
    {
        $data['datasalary']=$this->commonModel->fs('job_attributes_salary_periods',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-salary',$data);
    }
    
    public function editsalary1()
    {
        
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;		
    	$savedata=$this->commonModel->updateData('job_attributes_salary_periods',$save,array('id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Salary Updated.');
              return redirect()->to(base_url('superadmin/all-salary'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-salary/',$id));
          }
    
        
    }
    
    public function deletesalary()
    {
          $deleteId = $this->request->getVar('deleteId');
        //  print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('job_attributes_salary_periods',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Salary deleted.');
              return redirect()->to(base_url('superadmin/all-salary'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-salary'));
          }
    }
    // Salary end
    
    // Country start
    public function country()
    {
        
        $data['country']=$this->commonModel->allFetchd('location_countries',array());
        
        return view('superadmin/all-country',$data);
    }
    
    public function addcountry()
    {
       return view('superadmin/add-country');
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
        return redirect()->to(base_url('superadmin/add-country'));
       
    }
    
    public function editcountry($id)
    {
        $data['datacountry']=$this->commonModel->fs('location_countries',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-country',$data);
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
              return redirect()->to(base_url('superadmin/all-country'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-country/',$id));
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
              return redirect()->to(base_url('superadmin/all-country'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-country'));
          }
    }
    // Country end
    
    // State start
    public function state()
    {
        
        $data['state']=$this->commonModel->allFetchd('location_states',array());
        
        return view('superadmin/all-state',$data);
    }
    
    public function addstate()
    {
       $data['country']=$this->commonModel->allFetchd('location_countries',array('id'=>101)); 
       return view('superadmin/add-state',$data);
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
        return redirect()->to(base_url('superadmin/add-state'));
       
    }
    
    public function editstate($id)
    {
        $data['country']=$this->commonModel->allFetchd('location_countries',array('id'=>101)); 
        $data['datastate']=$this->commonModel->fs('location_states',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-state',$data);
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
              return redirect()->to(base_url('superadmin/all-state'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-state/',$id));
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
              return redirect()->to(base_url('superadmin/all-state'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-state'));
          }
    }
    // State end
    
    // City start
    public function city()
    {
        
        $data['state']=$this->commonModel->allFetchd('location_states',array());
        
        return view('superadmin/all-state',$data);
    }
    
    public function addcity()
    {
       $data['country']=$this->commonModel->allFetchd('location_countries',array('id'=>101)); 
       return view('superadmin/add-state',$data);
    }
    
    public function storecity()
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
        return redirect()->to(base_url('superadmin/add-state'));
       
    }
    
    public function editcity($id)
    {
        $data['country']=$this->commonModel->allFetchd('location_countries',array('id'=>101)); 
        $data['datastate']=$this->commonModel->fs('location_states',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-state',$data);
    }
    
    public function editcity1()
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
              return redirect()->to(base_url('superadmin/all-state'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-state/',$id));
          }
    
        
    }
    
    public function deletecity()
    {
          $deleteId = $this->request->getVar('deleteId');
        //  print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('location_states',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'State deleted.');
              return redirect()->to(base_url('superadmin/all-state'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-state'));
          }
    }
    // City end
    
    
    // Company start
    public function companies()
    {
        $data['company']=$this->commonModel->allFetchd('companies',array());
        return view('superadmin/all-company',$data);
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
       $data['industry']=$this->commonModel->allFetch('job_attributes_industries',array()); 
       $data['ownership']=$this->commonModel->allFetch('job_attributes_ownership_types',array()); 
       $data['country']=$this->commonModel->allFetch('location_countries',array('id'=>'101')); 
       $data['state']=$this->commonModel->allFetch('location_states',array()); 
       $data['city']=$this->commonModel->allFetch('location_cities',array()); 
       return view('superadmin/add-company',$data);
    }
    
    public function storecompanies()
    {
        $rules0 = [
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
            'password' => 'required',
            
        ];
        $rules1 = [
            'company_name' => 'is_unique[companies.company_name]',
        ];
        $rules2 = [
            'company_email' => 'is_unique[companies.company_email]',
        ];
        $rules3 = [
            'phone' => 'is_unique[companies.phone]',
        ];
        
        
        
        if(!$this->validate($rules0))
        {
            $this->session->setFlashdata('error', 'Please enter valid details.');
        }
        else if(!$this->validate($rules1)){
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
        $password=$this->request->getVar('password');
        $save['emppassword']= password_hash($password, PASSWORD_DEFAULT);
        $save['is_active']=$is_active;
        $save['is_featured']=$is_featured;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
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
        return redirect()->to(base_url('superadmin/add-company'));
       
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
        
        $data['industry']=$this->commonModel->allFetch('job_attributes_industries',array()); 
        $data['ownership']=$this->commonModel->allFetch('job_attributes_ownership_types',array()); 
        $data['country']=$this->commonModel->allFetch('location_countries',array('id'=>'101')); 
        $data['state']=$this->commonModel->allFetch('location_states',array()); 
        $data['city']=$this->commonModel->allFetch('location_cities',array()); 
        
        $data['datacompany']=$this->commonModel->fs('companies',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-company',$data);
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
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Company Update.');
            return redirect()->to(base_url('superadmin/all-company'));
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('superadmin/edit-company/',$id));
          }
        
        return redirect()->to(base_url('superadmin/edit-company/',$id));
        
    
        
    }
    
    public function deletecompanies()
    {
          $deleteId = $this->request->getVar('deleteId');
        //  print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('companies',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Company deleted.');
              return redirect()->to(base_url('superadmin/all-company'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-company'));
          }
    }
    
    public function totalcompanyjob($id)
    {
        $data['datajobs']=$this->commonModel->allFetchd('jobs_list',array('company_id'=>$id));
        $data['datasjobs']=$this->commonModel->fs('companies',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/total-company-jobs',$data);
    }
    
    // Company end
    
    // Candidate start
    public function candidate()
    {
        $data['users']=$this->commonModel->allFetchd('users',array());
        
        return view('superadmin/all-user',$data);
    }
    
    public function addcandidate()
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
       $data['industry']=$this->commonModel->allFetch('job_attributes_industries',array()); 
       $data['ownership']=$this->commonModel->allFetch('job_attributes_ownership_types',array()); 
       $data['country']=$this->commonModel->allFetch('location_countries',array('id'=>'101')); 
       $data['state']=$this->commonModel->allFetch('location_states',array()); 
       $data['city']=$this->commonModel->allFetch('location_cities',array()); 
       return view('superadmin/add-company',$data);
    }
    
    public function storecandidate()
    {
        $rules0 = [
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
            'password' => 'required',
            
        ];
        $rules1 = [
            'company_name' => 'is_unique[companies.company_name]',
        ];
        $rules2 = [
            'company_email' => 'is_unique[companies.company_email]',
        ];
        $rules3 = [
            'phone' => 'is_unique[companies.phone]',
        ];
        
        
        
        if(!$this->validate($rules0))
        {
            $this->session->setFlashdata('error', 'Please enter valid details.');
        }
        else if(!$this->validate($rules1)){
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
        $password=$this->request->getVar('password');
        $save['emppassword']= password_hash($password, PASSWORD_DEFAULT);
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
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
        return redirect()->to(base_url('superadmin/add-company'));
       
    }
    
    public function editcandidate($id)
    {
        $currentYear = date('Y');
        
        $pastYears = range($currentYear - 30, $currentYear );
        $years = array_merge($pastYears);
        $startNumber = 1;
        $endNumber = 10;
        $numbers = range($startNumber, $endNumber);
        $data['numberList'] = $numbers;
        $data['years'] = $years;
        
        $data['industry']=$this->commonModel->allFetch('job_attributes_industries',array()); 
        $data['ownership']=$this->commonModel->allFetch('job_attributes_ownership_types',array()); 
        $data['country']=$this->commonModel->allFetch('location_countries',array('id'=>'101')); 
        $data['state']=$this->commonModel->allFetch('location_states',array()); 
        $data['city']=$this->commonModel->allFetch('location_cities',array()); 
        
        $data['datacompany']=$this->commonModel->fs('companies',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-company',$data);
    }
    
    public function editcandidate1()
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
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Company Update.');
            return redirect()->to(base_url('superadmin/all-company'));
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('superadmin/edit-company/',$id));
          }
        
        return redirect()->to(base_url('superadmin/edit-company/',$id));
        
    
        
    }
    
    public function deletecandidate()
    {
          $deleteId = $this->request->getVar('deleteId');
        //  print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('companies',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Company deleted.');
              return redirect()->to(base_url('superadmin/all-company'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-company'));
          }
    }
    // Candidate end
    
    // job post start
    public function jobslist()
    {
        $data['jobs']=$this->commonModel->allFetchd('jobs_list',array());
        // print_r($data);exit;

        return view('superadmin/all-jobs',$data);
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
        $data['companies']=$this->commonModel->allFetch('companies',array());
        // print_r($data);exit;

        return view('superadmin/add-jobs',$data);
        
    }
    
    public function storejobs()
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
        $is_active=$this->request->getVar('is_active');
        $is_featured=$this->request->getVar('is_featured');
        
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
        $save['is_active']=$is_active;
        $save['is_featured']=$is_featured;
        
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
        
        return redirect()->to(base_url('superadmin/all-jobs'));
        
        }
    
    public function editjobs($id)
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
        $data['companies']=$this->commonModel->allFetch('companies',array());
        // print_r($data);exit;
        
        $data['datajobpost']=$this->commonModel->fs('jobs_list',array('id'=>$id));

        return view('superadmin/edit-jobs',$data);
        
    }
    
    public function editjobs1()
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
        $is_active=$this->request->getVar('is_active');
        $is_featured=$this->request->getVar('is_featured');
        
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
        $save['is_active']=$is_active;
        $save['is_featured']=$is_featured;
        
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $update=$this->commonModel->updateData('jobs_list',$save,array('id'=>$id));
        // $savedata=$this->commonModel->insertData('jobs_list',$save);
       
        if($update)
          {
            $this->session->setFlashdata('success', 'Job Post Added.');
             return redirect()->to(base_url('superadmin/all-jobs'));
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('superadmin/edit-jobs/',$id));
          }
        
    }
    
    
    public function appliedjobslist()
    {
        $data['jobsapplicant']=$this->commonModel->allFetchd('job_applicants',array());
        // print_r($data);exit;
        return view('superadmin/all-applied-jobs',$data);
    }
    
    public function viewjoblist($id)
    {
        $data['jobslistss']=$this->commonModel->allFetchd('job_applicants',array()); 
        // print_r($data);exit;
        return view('superadmin/view-job-list',$data);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    // crop menu add
    public function crop1()
    {
        
        $data['crop']=$this->commonModel->allFetchd('far_crop',array(),'crop_id');
        return view('superadmin/crop',$data);
    }
    
    public function storecrop()
    {
        $title=$this->request->getVar('title');
        
        $save['crop_name']=$title;
        $save['crop_slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        
        $savedata=$this->commonModel->insertData('far_crop',$save);
        
        if($savedata)
          {
              $this->session->setFlashdata('success', 'Scheme Added.');
              return redirect()->to(base_url('superadmin/crop'));
          }
        else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/crop'));
          }
        
    }
    public function cropview($id)
    {
        $data=$this->commonModel->fs('far_crop',array('crop_id'=>$id));
        echo json_encode($data);
    }
    
    public function cropupdate() 
    {
        
        $id=$this->request->getVar('Id');
        $title=$this->request->getVar('title');
       
        $save['crop_name']=$title;
        $save['crop_slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        
        $savedata=$this->commonModel->updateData('far_crop',$save,array('crop_id'=>$id));
       
        if($savedata)
          {
              $this->session->setFlashdata('success', 'Crop Updated.');
              return redirect()->to(base_url('superadmin/crop'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/crop'));
          }

    }
     // crop menu end
    
    // crop new menu  
    
    public function crop()
    {
        
        $data['crop']=$this->commonModel->allFetchd('far_crop',array(),'crop_id');
        return view('superadmin/all-crop',$data);
    }
    
    public function addcrop1()
    {
        // echo 'dfs';
        return view('superadmin/add-crop');
    }
    
    public function storecrop1()
    {
        $title=$this->request->getVar('title');
        $details=$this->request->getVar('description');
        
        
        $save['crop_name']=$title;
        $save['crop_description']=$details;
        $save['crop_slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        
        
        $profile = $this->request->getFile('image');
        
        if ($profile->isValid() && !$profile->hasMoved())
        {
            $newName = $profile->getRandomName();
            $profile->move('./back/assets/images/crop/', $newName); // Move the file to the 'uploads' directory
            if(!empty($newName))
            {
                $save['crop_image']=$newName;
            }
        }
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('far_crop',$save);
        
        // print_r($savedata);exit;
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Crop Added.');
              return redirect()->to(base_url('superadmin/add-crop'));
          }
        else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/add-crop'));
          }
        
       
    }
    
    public function editcrop($id)
    {
        $data['datacrop']=$this->commonModel->fs('far_crop',array('crop_id'=>$id));
        return view('superadmin/edit-crop',$data);
    }
    
    public function editcrop1()
    {
       $id=$this->request->getVar('id');
       $title=$this->request->getVar('title');
       $details=$this->request->getVar('description');
      
       
        $save['crop_name']=$title;
        $save['crop_description']=$details;
        $save['crop_slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        
       
       // Image
    	$profile = $this->request->getFile('image');
            if ($profile->isValid() && !$profile->hasMoved())
            {
                $newName = $profile->getRandomName();
                $profile->move('./back/assets/images/crop/', $newName); // Move the file to the 'uploads' directory
                if(!empty($newName))
                {
                    $save['crop_image']=$newName;
                }
            }
    			
    	$savedata=$this->commonModel->updateData('far_crop',$save,array('crop_id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Scheme Updated.');
              return redirect()->to(base_url('superadmin/all-crop'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-crop'));
          }
    }
    
    public function viewcrop($slug)
    {
        // echo 'dgf';exit;
        $data['datacrop']=$this->commonModel->fs('far_crop',array('crop_slug'=>$slug));
        // print_r($data);
        return view('superadmin/view-crop',$data);
    }
    
    public function deletecrop()
    {
          $deleteId = $this->request->getVar('deleteId');
          $del=$this->commonModel->deleteData('far_crop',array('crop_id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Crop deleted.');
              return redirect()->to(base_url('superadmin/all-crop'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-crop'));
          }
    }
    // crop new menu end
    
    // crop type
    public function croptype()
    {
        
        $data['croptype']=$this->commonModel->allFetchd('far_crop_type',array(),'croptype_id');
        // print_r($data);exit;
        return view('superadmin/all-crop-type',$data);
    }
    
    public function viewcroptype($slug)
    {
        
        $data['datacroptype']=$this->commonModel->fs('far_crop_type',array('croptype_slug'=>$slug));
        // print_r($data);exit;
        return view('superadmin/view-crop-type',$data);
    }
    
    public function addcroptype()
    {
        // echo 'dfs';
        $data['croplist']=$this->commonModel->allFetchd('far_crop',array(),'crop_id');
        return view('superadmin/add-crop-type',$data);
    }
    
    public function storecroptype()
    {
        $cropid=$this->request->getVar('crop');
        $title=utf8_encode($this->request->getVar('title'));
        $details=utf8_encode($this->request->getVar('description'));
        $water=$this->request->getVar('water');
        $cultivation=$this->request->getVar('cultivation');
        $harvest=$this->request->getVar('harvest');
        $labour=$this->request->getVar('labour');
        $sunlight=$this->request->getVar('sunlight');
        $phvalue=$this->request->getVar('phvalue');
        $temp=$this->request->getVar('temp');
        $fertilization=$this->request->getVar('fertilization');
        
        
        $save['croptype_cropid']=$cropid;
        $save['croptype_title']=$title;
        $save['croptype_description']=$details;
        $save['croptype_water']=$water;
        $save['croptype_cultivation']=$cultivation;
        $save['croptype_harvest']=$harvest;
        $save['croptype_labour']=$labour;
        $save['croptype_sunlight']=$sunlight;
        $save['croptype_phvalue']=$phvalue;
        $save['croptype_temp']=$temp;
        $save['croptype_fertilization']=$fertilization;
        $save['croptype_slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        
        
        $profile = $this->request->getFile('image');
        
        if ($profile->isValid() && !$profile->hasMoved())
        {
            $newName = $profile->getRandomName();
            $profile->move('./back/assets/images/croptype/', $newName); // Move the file to the 'uploads' directory
            if(!empty($newName))
            {
                $save['croptype_image']=$newName;
            }
        }
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('far_crop_type',$save);
        
        // print_r($savedata);exit;
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Crop Type Added.');
              return redirect()->to(base_url('superadmin/add-crop-type'));
          }
        else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/add-crop-type'));
          }
        
       
    }
    
    public function editcroptype($id)
    {
        $data['croplist']=$this->commonModel->allFetchd('far_crop',array(),'crop_id');
        $data['datacroptype']=$this->commonModel->fs('far_crop_type',array('croptype_id'=>$id));
        return view('superadmin/edit-crop-type',$data);
    }
    
    public function editcroptype1()
    {
        $id=$this->request->getVar('Id');
        $cropid=$this->request->getVar('crop');
        $title=utf8_encode($this->request->getVar('title'));
        $details=utf8_encode($this->request->getVar('description'));
        $water=$this->request->getVar('water');
        $cultivation=$this->request->getVar('cultivation');
        $harvest=$this->request->getVar('harvest');
        $labour=$this->request->getVar('labour');
        $sunlight=$this->request->getVar('sunlight');
        $phvalue=$this->request->getVar('phvalue');
        $temp=$this->request->getVar('temp');
        $fertilization=$this->request->getVar('fertilization');
        
        
        $save['croptype_cropid']=$cropid;
        $save['croptype_title']=$title;
        $save['croptype_description']=$details;
        $save['croptype_water']=$water;
        $save['croptype_cultivation']=$cultivation;
        $save['croptype_harvest']=$harvest;
        $save['croptype_labour']=$labour;
        $save['croptype_sunlight']=$sunlight;
        $save['croptype_phvalue']=$phvalue;
        $save['croptype_temp']=$temp;
        $save['croptype_fertilization']=$fertilization;
        $save['croptype_slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        
       
       // Image
    	$profile = $this->request->getFile('image');
            if ($profile->isValid() && !$profile->hasMoved())
            {
                $newName = $profile->getRandomName();
                $profile->move('./back/assets/images/croptype/', $newName); // Move the file to the 'uploads' directory
                if(!empty($newName))
                {
                    $save['croptype_image']=$newName;
                }
            }
    			
    	$savedata=$this->commonModel->updateData('far_crop_type',$save,array('croptype_id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Scheme Updated.');
              return redirect()->to(base_url('superadmin/all-crop-type'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-crop-type'));
          }
    }
    
    public function deletecroptype()
    {
          $deleteId = $this->request->getVar('deleteId');
          $del=$this->commonModel->deleteData('far_crop_type',array('croptype_id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Crop deleted.');
              return redirect()->to(base_url('superadmin/all-crop-type'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-crop-type'));
          }
    }
    
    // news start
    public function allnews()
    {
        $data['news']=$this->commonModel->allFetchd('far_news',array(),'news_id');
        // print_r($data);exit;
        return view('superadmin/all-news',$data);
    }
    
    public function addnews()
    {
       return view('superadmin/add-news');
    }
    
    public function storenews()
    {
        $title=$this->request->getVar('title');
        $details=$this->request->getVar('description');
        
        
        $save['news_name']=$title;
        $save['news_description']=$details;
        $save['news_slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['news_date']= $this->request->getVar('date');
        
        $profile = $this->request->getFile('image');
        
        if ($profile->isValid() && !$profile->hasMoved())
        {
            $newName = $profile->getRandomName();
            $profile->move('./back/assets/images/news/', $newName); // Move the file to the 'uploads' directory
            if(!empty($newName))
            {
                $save['news_image']=$newName;
            }
        }
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('far_news',$save);
        
        // print_r($savedata);exit;
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'News Added.');
              return redirect()->to(base_url('superadmin/add-news'));
          }
        else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/add-news'));
          }
        
       
    }
    
    public function viewnews($slug)
    {
        
        $data['datanews']=$this->commonModel->fs('far_news',array('news_slug'=>$slug));
        // print_r($data);exit;
        return view('superadmin/view-news',$data);
    }
    
    public function editnews($id)
    {
        $data['datanews']=$this->commonModel->fs('far_news',array('news_id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-news',$data);
    }
    
     public function editnews1()
    {
       $id=$this->request->getVar('id');
       $title=$this->request->getVar('title');
       $details=$this->request->getVar('description');
      
       
        $save['news_name']=$title;
        $save['news_description']=$details;
        $save['news_slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['news_date']=$this->request->getVar('date');
        
       
       // Image
    	$profile = $this->request->getFile('image');
            if ($profile->isValid() && !$profile->hasMoved())
            {
                $newName = $profile->getRandomName();
                $profile->move('./back/assets/images/news/', $newName); // Move the file to the 'uploads' directory
                if(!empty($newName))
                {
                    $save['news_image']=$newName;
                }
            }
    // 		print_r($save);exit;	
    	$savedata=$this->commonModel->updateData('far_news',$save,array('news_id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'News Updated.');
              return redirect()->to(base_url('superadmin/all-news'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-news'));
          }
    }
    
     public function deletenews()
    {
          $deleteId = $this->request->getVar('deleteId');
          $del=$this->commonModel->deleteData('far_news',array('news_id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'News deleted.');
              return redirect()->to(base_url('superadmin/all-news'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-news'));
          }
    }
    
    // news ends
    
    // Events
    
    public function allevents()
    {
        $data['events']=$this->commonModel->allFetchd('far_events',array(),'events_id');
        // print_r($data);exit;
        return view('superadmin/all-events',$data);
    }
    
    public function addevents()
    {
       return view('superadmin/add-events');
    }
    
    public function storeevents()
    {
        $title=$this->request->getVar('title');
        $details=$this->request->getVar('description');
        
        
        $save['events_name']=$title;
        $save['events_description']=$details;
        $save['events_slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['events_date']= $this->request->getVar('date');
        
        $profile = $this->request->getFile('image');
        
        if ($profile->isValid() && !$profile->hasMoved())
        {
            $newName = $profile->getRandomName();
            $profile->move('./back/assets/images/events/', $newName); // Move the file to the 'uploads' directory
            if(!empty($newName))
            {
                $save['events_image']=$newName;
            }
        }
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('far_events',$save);
        
        // print_r($savedata);exit;
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Events Added.');
              return redirect()->to(base_url('superadmin/add-events'));
          }
        else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/add-events'));
          }
        
       
    }
    
    public function viewevents($slug)
    {
        $data['dataevents']=$this->commonModel->fs('far_events',array('events_slug'=>$slug));
        // print_r($data);exit;
        return view('superadmin/view-events',$data);
    }
    
    public function editevents($id)
    {
        $data['dataevents']=$this->commonModel->fs('far_events',array('events_id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-events',$data);
    }
    
    public function editevents1()
    {
       $id=$this->request->getVar('id');
       $title=$this->request->getVar('title');
       $details=$this->request->getVar('description');
      
        $save['events_name']=$title;
        $save['events_description']=$details;
        $save['events_slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['events_date']=$this->request->getVar('date');
        
       
       // Image
    	$profile = $this->request->getFile('image');
            if ($profile->isValid() && !$profile->hasMoved())
            {
                $newName = $profile->getRandomName();
                $profile->move('./back/assets/images/events/', $newName); // Move the file to the 'uploads' directory
                if(!empty($newName))
                {
                    $save['events_image']=$newName;
                }
            }
    // 		print_r($save);exit;	
    	$savedata=$this->commonModel->updateData('far_events',$save,array('events_id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Events Updated.');
              return redirect()->to(base_url('superadmin/all-events'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-events'));
          }
    }
    
    public function deleteevents()
    {
          $deleteId = $this->request->getVar('deleteId');
          $del=$this->commonModel->deleteData('far_events',array('events_id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'News deleted.');
              return redirect()->to(base_url('superadmin/all-events'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-events'));
          }
    }
    
    // Events end
    
    // blogs
    
    public function allblogs()
    {
        $data['blogs']=$this->commonModel->allFetchd('far_blogs',array(),'blogs_id');
        // print_r($data);exit;
        return view('superadmin/all-blogs',$data);
    }
    public function addblogs()
    {
       return view('superadmin/add-blogs');
    }
    public function storeblogs()
    {
        $title=$this->request->getVar('title');
        $details=$this->request->getVar('description');
        
        
        $save['blogs_name']=$title;
        $save['blogs_description']=$details;
        $save['blogs_slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['blogs_date']= $this->request->getVar('date');
        
        $profile = $this->request->getFile('image');
        
        if ($profile->isValid() && !$profile->hasMoved())
        {
            $newName = $profile->getRandomName();
            $profile->move('./back/assets/images/blogs/', $newName); // Move the file to the 'uploads' directory
            if(!empty($newName))
            {
                $save['blogs_image']=$newName;
            }
        }
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('far_blogs',$save);
        
        // print_r($savedata);exit;
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Blogs Added.');
              return redirect()->to(base_url('superadmin/add-blogs'));
          }
        else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/add-blogs'));
          }
        
       
    }
    
    public function viewblogs($slug)
    {
        $data['datablogs']=$this->commonModel->fs('far_blogs',array('blogs_slug'=>$slug));
        // print_r($data);exit;
        return view('superadmin/view-blogs',$data);
    }
    
    public function editblogs($id)
    {
        $data['datablogs']=$this->commonModel->fs('far_blogs',array('blogs_id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-blogs',$data);
    }
    public function editblogs1()
    {
       $id=$this->request->getVar('id');
       $title=$this->request->getVar('title');
       $details=$this->request->getVar('description');
      
        $save['blogs_name']=$title;
        $save['blogs_description']=$details;
        $save['blogs_slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['blogs_date']=$this->request->getVar('date');
        
       
       // Image
    	$profile = $this->request->getFile('image');
            if ($profile->isValid() && !$profile->hasMoved())
            {
                $newName = $profile->getRandomName();
                $profile->move('./back/assets/images/blogs/', $newName); // Move the file to the 'uploads' directory
                if(!empty($newName))
                {
                    $save['blogs_image']=$newName;
                }
            }
    // 		print_r($save);exit;	
    	$savedata=$this->commonModel->updateData('far_blogs',$save,array('blogs_id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Blogs Updated.');
              return redirect()->to(base_url('superadmin/all-blogs'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-blogs'));
          }
    }
    
    public function deleteblogs()
    {
          $deleteId = $this->request->getVar('deleteId');
          $del=$this->commonModel->deleteData('far_blogs',array('blogs_id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Blogs deleted.');
              return redirect()->to(base_url('superadmin/all-blogs'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-blogs'));
          }
    }
    
    // blogs end
    
    // Training
    public function alltraining()
    {
        $data['training']=$this->commonModel->allFetchd('far_training',array(),'train_id');
        // print_r($data);exit;
        return view('superadmin/all-training',$data);
    }
    public function addtraining()
    {
       return view('superadmin/add-training');
    }
    public function storetraining()
    {
        $title=$this->request->getVar('title');
        $details=$this->request->getVar('description');
        
        
        $save['train_name']=$title;
        $save['train_description']=$details;
        $save['train_slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['train_date']= $this->request->getVar('date');
        
        $profile = $this->request->getFile('image');
        
        if ($profile->isValid() && !$profile->hasMoved())
        {
            $newName = $profile->getRandomName();
            $profile->move('./back/assets/images/training/', $newName); // Move the file to the 'uploads' directory
            if(!empty($newName))
            {
                $save['train_image']=$newName;
            }
        }
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('far_training',$save);
        
        // print_r($savedata);exit;
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Training Added.');
              return redirect()->to(base_url('superadmin/add-training'));
          }
        else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/add-training'));
          }
        
    }
    public function viewtraining($slug)
    {
        $data['datatraining']=$this->commonModel->fs('far_training',array('train_slug'=>$slug));
        // print_r($data);exit;
        return view('superadmin/view-training',$data);
    }
    
    public function edittraining($id)
    {
        $data['datatraining']=$this->commonModel->fs('far_training',array('train_id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-training',$data);
    }
    public function edittraining1()
    {
       $id=$this->request->getVar('id');
       $title=$this->request->getVar('title');
       $details=$this->request->getVar('description');
      
        $save['train_name']=$title;
        $save['train_description']=$details;
        $save['train_slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['train_date']=$this->request->getVar('date');
        
       
       // Image
    	$profile = $this->request->getFile('image');
            if ($profile->isValid() && !$profile->hasMoved())
            {
                $newName = $profile->getRandomName();
                $profile->move('./back/assets/images/training/', $newName); // Move the file to the 'uploads' directory
                if(!empty($newName))
                {
                    $save['train_image']=$newName;
                }
            }
    // 		print_r($save);exit;	
    	$savedata=$this->commonModel->updateData('far_training',$save,array('train_id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Training Updated.');
              return redirect()->to(base_url('superadmin/all-training'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-training'));
          }
    }
    
    public function deletetraining()
    {
          $deleteId = $this->request->getVar('deleteId');
          $del=$this->commonModel->deleteData('far_training',array('train_id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Blogs deleted.');
              return redirect()->to(base_url('superadmin/all-training'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-training'));
          }
    }
    
    // Training end
    
    // product
    public function allproduct()
    {
        $data['product']=$this->commonModel->allFetchd('far_product',array(),'prod_id');
        // print_r($data);exit;
        return view('superadmin/all-product',$data);
    }
    public function addproduct()
    {
       return view('superadmin/add-product');
    }
    public function storeproduct()
    {
        $title=$this->request->getVar('title');
        $details=$this->request->getVar('description');
        $cate=$this->request->getVar('cate');
        $feature=$this->request->getVar('feature');
        $price=$this->request->getVar('price');
        
        
        $save['prod_name']=$title;
        $save['prod_description']=$details;
        $save['prod_slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['prod_price']= $price;
        $save['prod_feature']= $feature;
        $save['prod_category']= $cate;
        
        $profile = $this->request->getFile('image');
        
        if ($profile->isValid() && !$profile->hasMoved())
        {
            $newName = $profile->getRandomName();
            $profile->move('./back/assets/images/product/', $newName); // Move the file to the 'uploads' directory
            if(!empty($newName))
            {
                $save['prod_image']=$newName;
            }
        }
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('far_product',$save);
        
        // print_r($savedata);exit;
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Product Added.');
              return redirect()->to(base_url('superadmin/add-product'));
          }
        else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/add-product'));
          }
        
    }
    public function viewproduct($slug)
    {
        $data['dataproduct']=$this->commonModel->fs('far_product',array('prod_slug'=>$slug));
        // print_r($data);exit;
        return view('superadmin/view-product',$data);
    }
    public function deleteproduct()
    {
          $deleteId = $this->request->getVar('deleteId');
          $del=$this->commonModel->deleteData('far_product',array('prod_id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Product deleted.');
              return redirect()->to(base_url('superadmin/all-product'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-product'));
          }
    }
    
    // product end
    
    // pets / diseases
    public function alldiseases()
    {
        
        $data['diseases']=$this->commonModel->allFetchd('far_diseases',array(),'diseases_id');
        // print_r($data);exit;
        return view('superadmin/all-diseases',$data);
    }
    public function adddiseases()
    {
       return view('superadmin/add-diseases');
    }
    public function storediseases()
    {
        $title=$this->request->getVar('title');
        $details=$this->request->getVar('description');
        $sort_des=$this->request->getVar('sort_des');
        
        $save['diseases_name']=$title;
        $save['diseases_description']=$details;
        $save['diseases_slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['diseases_sort_des']= $sort_des;
        $save['diseases_tags']=$this->request->getVar('dtags');
        
        
        $profile = $this->request->getFile('image');
        
        if ($profile->isValid() && !$profile->hasMoved())
        {
            $newName = $profile->getRandomName();
            $profile->move('./back/assets/images/diseases/', $newName); // Move the file to the 'uploads' directory
            if(!empty($newName))
            {
                $save['diseases_image']=$newName;
            }
        }
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('far_diseases',$save);
        
        // print_r($savedata);exit;
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Diseases Added.');
              return redirect()->to(base_url('superadmin/add-diseases'));
          }
        else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/add-diseases'));
          }
          
      
    }
    
    public function editdiseases($id)
    {
        $data['datadiseases']=$this->commonModel->fs('far_diseases',array('diseases_id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-diseases',$data);
    }
    
    public function editdiseases1()
    {
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $details=$this->request->getVar('description');
        $sort_des=$this->request->getVar('sort_des');
        
        $save['diseases_name']=$title;
        $save['diseases_description']=$details;
        $save['diseases_slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['diseases_sort_des']= $sort_des;
        $save['diseases_tags']=$this->request->getVar('dtags');
        
        $profile = $this->request->getFile('image');
        
        if ($profile->isValid() && !$profile->hasMoved())
        {
            $newName = $profile->getRandomName();
            $profile->move('./back/assets/images/diseases/', $newName); // Move the file to the 'uploads' directory
            if(!empty($newName))
            {
                $save['diseases_image']=$newName;
            }
        }
        // print_r($save);exit;
        $savedata=$this->commonModel->updateData('far_diseases',$save,array('diseases_id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Diseases Updated.');
              return redirect()->to(base_url('superadmin/all-diseases'));
          }
        else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-diseases'));
          }
        
    }
    
    public function deleteDiseases()
    {
          $deleteId = $this->request->getVar('deleteId');
          $del=$this->commonModel->deleteData('far_diseases',array('diseases_id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Diseases deleted.');
              return redirect()->to(base_url('superadmin/all-diseases'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-diseases'));
          }
    }
    
    // pets / diseases end
    
    // crop Enquiry
    
    public function cropEnquiry()
    {
        $data['croplist'] = $this->commonModel->allFetchd('far_crop_details', array('deleted' => 0), 'crop_details_id');
    //     $data['crop'] = array(); // Initialize an array to store 'crop' data

    // if (!empty($data['croplist'])) {
    //     foreach ($data['croplist'] as $cropDetail) {
    //         $cropname = $cropDetail->crop_details_name;
            
    //         // Retrieve data for the current 'cropname' and add it to the 'crop' array
    //         $cropData = $this->commonModel->fs('far_crop_type', array('croptype_id' => $cropname), 'croptype_id');
    //         $data['crop'][] = $cropData;
    //     }
    // }

  
        
        // print_r($data);exit;
        return view('superadmin/crop-enquiry',$data);
    }
    
    public function viewcropenquiry($id)
    {
        $data['datacropdetails']=$this->commonModel->fs('far_crop_details',array('crop_details_id'=>$id));
        // $firstCropDetail = $data['datacropdetails'][0];
        // $cropname = $firstCropDetail->crop_details_name;
        // $data['croptype'] = $this->commonModel->fs('far_crop_type', array('croptype_id' => $cropname), 'croptype_id');
        // print_r($data);exit;
        return view('superadmin/crop-enquiry-view',$data);
    }
    
    public function assignto()
    {
        $id=$this->request->getVar('cdID');
        $title=$this->request->getVar('assign');
       
        $save['assign_to_advisor']=$title;
        
        $savedata=$this->commonModel->updateData('far_crop_details',$save,array('crop_details_id'=>$id));
        
        if($savedata)
          {
              $this->session->setFlashdata('success', 'Training Updated.');
              return redirect()->to(base_url('superadmin/crop-enquiry-view/'.$id));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/crop-enquiry-view/'.$id));
          }
        
    }
    
    public function logout(){
        session()->destroy();
        return  redirect()->to(base_url('superadmin/'));
    }
    
}

?>