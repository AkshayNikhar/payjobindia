<?php 
namespace App\Controllers;
use App\Models\SuperAdminModel;
use App\Models\CommonModel;
use CodeIgniter\Files\File;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Response;
// use CodeIgniter\HTTP\ResponseInterface;
// use Intervention\Image\ImageManagerStatic as Image;
use CodeIgniter\I18n\Time;



class SuperAdminController extends BaseController
{
    public function __construct()
    {
        // Load session service
        $this->session = \Config\Services::session();
        $this->id = $this->session->get('id');;
        // Create an instance of the CommonModel
        $this->commonModel = new CommonModel();
        $this->db = \Config\Database::connect();
        
    }
    
    public function roleassign()
    {
        $data['roleassign']=$this->commonModel->allFetchd('roleAssign',array());
        return view('superadmin/roleassign',$data);
    }
    
    public function assignviewpermission($id)
    {
        $data['roleassignpermission']=$this->commonModel->allFetchd('permissions_emp',array('role_id'=>$id));
        // print_r($data);exit;
        return view('superadmin/view-permission',$data); 
    }
    
    public function addroleassign()
    {
        // $data['country']=$this->commonModel->allFetch('location_countries',array('is_active'=>1)); 
       $data['jobcategory']=$this->commonModel->allFetch('job_category',array('is_active'=>1));
       
    //   $data['permission_emp'] = $this->commonModel->allFetch('permission_type', array('permission_for' => 'Employer'), 'id', 'asc', 4, 1);
    //   print_r($data['permission_emp']);exit;
      $data['permission_emp']=$this->commonModel->allFetch('permission_type',array('permission_for'=>'Employer'));
       $data['permission_can']=$this->commonModel->allFetch('permission_type',array('permission_for'=>'Candidate'));
    //   $data['permission_can1']=$this->commonModel->allFetch('candidate_permission',array());
       return view('superadmin/add-roleassign',$data);
    }
    
    public function addroleassign0()
    {
        // $data['country']=$this->commonModel->allFetch('location_countries',array('is_active'=>1)); 
      $data['jobcategory']=$this->commonModel->allFetch('job_category',array('is_active'=>1));
       
    //   $data['permission_emp'] = $this->commonModel->allFetch('permission_type', array('permission_for' => 'Employer'), 'id', 'asc', 4, 1);
    //   print_r($data['permission_emp']);exit;
    //   $data['permission_emp']=$this->commonModel->allFetch('permission_type',array('permission_for'=>'Employer'));
    //   $data['permission_can']=$this->commonModel->allFetch('permission_type',array('permission_for'=>'Candidate'));
       
       $data['permission']=$this->commonModel->allFetch('newpermission',array());
    //   print_r($data);exit;
    //   $data['permission_can1']=$this->commonModel->allFetch('candidate_permission',array());
       return view('superadmin/newaddrole',$data);
    }
    
    public function storeassignrole()
    {
        $rules = [
            'title' => 'is_unique[roleAssign.name]',
        ];
    
        $title = $this->request->getVar('title');
        $job_category_id = $this->request->getVar('job_category_id');
        $is_active = $this->request->getVar('is_active');
    
        if (!$this->validate($rules)) {
            $this->session->setFlashdata('error', 'Role already exists.');
        } else {
            
            $job_category_ids_str = implode(',', $job_category_id); 
            
            $save['name'] = $title;
            $save['jobcate_id'] = $job_category_ids_str;
            $save['slug'] = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
            $save['is_active'] = $is_active;
            $save['created'] = Time::now()->format('Y-m-d H:i:s');
    
    
            // print_r($save);exit;
            $savedata = $this->commonModel->insertData('roleAssign', $save);
    
            if ($savedata) {
                $inserted_id = $savedata;
    
                $permissions = $this->request->getPost('permissions');
                $candidatepermission = $this->request->getPost('candidatepermission');
                
                // print_r($permissions);exit;
                //  $permissionData = []; 
                
                if (!empty($permissions)) {
                foreach ($permissions as $permission) {
                    $permissionData = [
                        'role_id' => $inserted_id,
                        'permission_type_id' => $permission,
                    ];
                    
                    $datasave = $this->commonModel->insertData('permissions_emp', $permissionData);
                }
                }
                
                if (!empty($candidatepermission)) {
                foreach ($candidatepermission as $candidatepermissions) {
                    $candidateData = [
                        'role_id' => $inserted_id,
                        'permission_type_id' => $candidatepermissions,
                    ];
        
                    $datasave = $this->commonModel->insertData('permissions_emp', $candidateData);
                }
                }
                
                if ($datasave) {
                    $this->session->setFlashdata('success', 'Role added.');
                } else {
                    $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
                }
            } else {
                $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            }
        }
    
        return redirect()->to(base_url('superadmin/add-roleassign'));
    }
    
    public function editroleassign($id)
    {
        
       $data['jobcategory']=$this->commonModel->allFetch('job_category',array('is_active'=>1));
       $data['permission_emp']=$this->commonModel->allFetch('permission_type',array('permission_for'=>'Employer'));
       $data['permission_can']=$this->commonModel->allFetch('permission_type',array('permission_for'=>'Candidate'));
       
       $data['roleAssigns']=$this->commonModel->fs('roleAssign',array('id'=>$id));
       $data['selectedJobCategories'] = explode(',', $data['roleAssigns']->jobcate_id);
    
       return view('superadmin/edit-roleassign',$data);
    }
    
    public function editroleassign1()
    {
        $id = $this->request->getVar('id');
        $title = $this->request->getVar('title');
        $job_category_id = $this->request->getVar('job_category_id');
        $is_active = $this->request->getVar('is_active');
        $emp_id = $this->request->getVar('emp_id');
    
        $save['name'] = $title;
        // $save['jobcate_id'] = $job_category_id;
        $save['jobcate_id'] = implode(',', $job_category_id);
        $save['slug'] = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active'] = $is_active;
    
        // print_r($save);exit;
        $savedata = $this->commonModel->updateData('roleAssign', $save,array('id'=>$id));
    
        if ($savedata) {
            $permissions = $this->request->getPost('permissions');
            $candidatepermission = $this->request->getPost('candidatepermission');
            $emp_id = $this->request->getPost('emp_id');
    
            if (!empty($permissions)) {
            foreach ($permissions as $permission) {
            $existingPermission = $this->db->table('permissions_emp')
                ->where(['role_id' => $id, 'permission_type_id' => $permission])
                ->get()
                ->getRow();
                
                // print_r($existingPermission);exit;
               

                if ($existingPermission) {
                    // Update existing permission record
                    // Delete existing permissions not present in the current set
                    $this->db->table('permissions_emp')
                        ->where(['role_id' => $id, 'emp_id' => $emp_id])
                        ->whereNotIn('permission_type_id', $permissions)
                        ->delete();
                } else {
                    // Insert new permission record
                    $this->db->table('permissions_emp')->insert(['role_id' => $id, 'permission_type_id' => $permission,'emp_id'=>$emp_id]);
                }
            }
            }else
            {
                 $this->session->setFlashdata('error', 'Please select atleast one permission');
            }
            
             $action = '';
             
            if (!empty($candidatepermission)) {
            foreach ($candidatepermission as $candidatepermissions) {
                    $existingPermission1 = $this->db->table('permissions_emp')
                        ->where(['role_id' => $id, 'permission_type_id' => $candidatepermissions])
                        ->get()
                        ->getRow();
    
                    if ($existingPermission1) {
                        // Update existing permission record
                        $this->db->table('permissions_emp')
                            ->where(['role_id' => $id, 'permission_type_id' => $candidatepermissions,'emp_id'=>$emp_id])
                            ->set(['role_id' => $id, 'permission_type_id' => $candidatepermissions,'emp_id'=>$emp_id])
                            ->update();
                        $action = 'updated';
                    } else {
                        // Insert new permission record
                        $this->db->table('permissions_emp')->insert(['role_id' => $id, 'permission_type_id' => $candidatepermissions,'emp_id'=>$emp_id]);
                        $action = 'inserted';
                    }
                }
            }
            
    
            if ($action) {
                $this->session->setFlashdata('success', 'Role ' . $action . '.');
            } else {
                $this->session->setFlashdata('success', 'Role Updated');
                // $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            }
    
            return redirect()->to(base_url('superadmin/edit-roleassign/'.$id));
        } else {
            $this->session->setFlashdata('error', 'Something went wrong. Try again .');
            return redirect()->to(base_url('superadmin/edit-roleassign/'.$id));
        }
    }
    
    /*public function editroleassign1()
    {
        $id = $this->request->getVar('id');
        $title = $this->request->getVar('title');
        $job_category_id = $this->request->getVar('job_category_id');
        $is_active = $this->request->getVar('is_active');
        $emp_id = $this->request->getVar('emp_id');
    
        $save['name'] = $title;
        $save['jobcate_id'] = $job_category_id;
        $save['slug'] = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active'] = $is_active;
    
        $savedata = $this->commonModel->updateData('roleAssign', $save,array('id'=>$id));
    
        if ($savedata) {
            $permissions = $this->request->getPost('permissions');
            $candidatepermission = $this->request->getPost('candidatepermission');
            $emp_id = $this->request->getPost('emp_id');
    
            foreach ($permissions as $permission) {
            $existingPermission = $this->db->table('permissions_emp')
                ->where(['role_id' => $id, 'permission_type_id' => $permission])
                ->get()
                ->getRow();
                
                // print_r($existingPermission);exit;
               

                if ($existingPermission) {
                    // Update existing permission record
                    $this->db->table('permissions_emp')
                        ->where(['role_id' => $id, 'permission_type_id' => $permission,'emp_id'=>$emp_id])
                        ->set(['role_id' => $id, 'permission_type_id' => $permission,'emp_id'=>$emp_id])
                        ->update();
                } else {
                    // Insert new permission record
                    $this->db->table('permissions_emp')->insert(['role_id' => $id, 'permission_type_id' => $permission,'emp_id'=>$emp_id]);
                }
            }
            
            if (!empty($candidatepermission)) {
            foreach ($candidatepermission as $candidatepermissions) {
                    $existingPermission1 = $this->db->table('permissions_emp')
                        ->where(['role_id' => $id, 'permission_type_id' => $candidatepermissions])
                        ->get()
                        ->getRow();
    
                    if ($existingPermission1) {
                        // Update existing permission record
                        $this->db->table('permissions_emp')
                            ->where(['role_id' => $id, 'permission_type_id' => $candidatepermissions,'emp_id'=>$emp_id])
                            ->set(['role_id' => $id, 'permission_type_id' => $candidatepermissions,'emp_id'=>$emp_id])
                            ->update();
                        $action = 'updated';
                    } else {
                        // Insert new permission record
                        $this->db->table('permissions_emp')->insert(['role_id' => $id, 'permission_type_id' => $candidatepermissions,'emp_id'=>$emp_id]);
                        $action = 'inserted';
                    }
                }
            }
            
    
            if ($action) {
                $this->session->setFlashdata('success', 'Role ' . $action . '.');
            } else {
                $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            }
    
            return redirect()->to(base_url('superadmin/roleassign'));
        } else {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('superadmin/roleassign'));
        }
    }*/




    
    public function editassignrole($id)
    {
        $data['datarole']=$this->commonModel->fs('job_attributes_functional_areas',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-jobs-role',$data);
    }
    
    
    
    public function addrolepermission()
    {
        $data['roleassign']=$this->commonModel->allFetchd('roleAssign',array('is_active'=>1));
        $data['country']=$this->commonModel->allFetch('location_countries',array('is_active'=>1)); 
        $data['jobcategory']=$this->commonModel->allFetch('job_category',array('is_active'=>1)); 
        return view('superadmin/add-rolepermission',$data);
    }
    
    public function storerolepermission()
    {
        $rules = [
            'email' => 'is_unique[vendor.email]',
        ];
    
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $phone = $this->request->getVar('phone');
        $country_id = $this->request->getVar('country_id');
        $state_id = $this->request->getVar('state_id');
        $city_id = $this->request->getVar('city_id');
        $address = $this->request->getVar('address');
        $assign = $this->request->getVar('assign');
        // $type = $this->request->getVar('type');
        $password = $this->request->getVar('password');
        
        if (!$this->validate($rules)) {
            $this->session->setFlashdata('error', 'Email ID already exists.');
        } else {
            $save = [
                'name'      => $name,
                'email'     => $email,
                'phone'   => $phone,
                'country'   => $country_id,
                'state'     => $state_id,
                'city'      => $city_id,
                'address'   => $address,
                'assign'    => $assign,
                // 'type'      => $type,
                'password'  => password_hash($password, PASSWORD_DEFAULT),
            ];
            
            

                // print_r($save);exit;
    
            $savedata = $this->commonModel->insertData('vendor', $save);
            // $savedata = $this->commonModel->insertData('payjobadmin', $save);
    
            if ($savedata) {
                $inserted_id = $savedata;
    
                
                $data =[
                        'emp_id'  => $inserted_id,
                    ];
                    
                $datasave=$this->commonModel->updateData('permissions_emp',$data,array('role_id'=>$assign));
                // print_r($datasave);exit;
                // $datasave = $this->commonModel->insertData('role_permission', $data);
    
                $this->session->setFlashdata('success', 'Permission Added.');
            } else {
                $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            }
        }
    
        return redirect()->to(base_url('superadmin/add-role-permission'));
    }
    
    public function vendorlist()
    {
        $data['state']=$this->commonModel->allFetch('location_states',array('is_active'=>1)); 
        $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1)); 
        $data['vendorlist']=$this->commonModel->allFetchd('vendor',array());
        // print_r($data);exit;
        return view('superadmin/vendor-list',$data);
    }
    public function vendorlistview($id)
    {
        // $data['state']=$this->commonModel->allFetch('location_states',array('is_active'=>1)); 
        // $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1)); 
        $data['vendorlistview']=$this->commonModel->fs('vendor',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/total-vendor-company-jobs-view',$data);
    }
    public function totalvendorcompany($id)
    {
        // $data['state']=$this->commonModel->allFetch('location_states',array('is_active'=>1)); 
        // $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1)); 
        $data['vendorlistcompany']=$this->commonModel->allFetch('companies',array('vendorID'=>$id));
        // print_r($data);exit;
        return view('superadmin/total-vendor-company',$data);
    }
    
    // Extra Start
    public function filterVendor()
    {
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');
        $vendorName = $this->request->getPost('vendor_name');
        $stateId = $this->request->getPost('state_id');
        $cityId = $this->request->getPost('city_id');
        
        echo $candidateName, $stateId, $cityId, $startDate, $endDate;
        
        $data['state']=$this->commonModel->allFetch('location_states',array('is_active'=>1)); 
        $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1)); 
        
        $data['vendorlist'] = $this->commonModel->fetchVendorByDate($vendorName, $stateId, $cityId, $startDate, $endDate);
        // print_r($data);exit;
        return view('superadmin/vendor-list', $data);
    }
    // Extra End
    public function vendorEdit($id)
    {
        $data['roleassign']=$this->commonModel->allFetch('roleAssign',array('is_active'=>1));
        $data['country']=$this->commonModel->allFetch('location_countries',array('is_active'=>1)); 
        $data['state']=$this->commonModel->allFetch('location_states',array('is_active'=>1)); 
        $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1)); 
        $data['jobcategory']=$this->commonModel->allFetch('job_category',array('is_active'=>1)); 
        
        $data['vendordata']=$this->commonModel->fs('vendor',array('id'=>$id));
        // print_r($data['country']);exit;
        return view('superadmin/vendor-edit',$data);
    }
    public function vendorEditss($id)
    {
        $data['roleassign']=$this->commonModel->allFetch('roleAssign',array('is_active'=>1));
        $data['country']=$this->commonModel->allFetch('location_countries',array('is_active'=>1)); 
        $data['state']=$this->commonModel->allFetch('location_states',array('is_active'=>1)); 
        $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1)); 
        $data['jobcategory']=$this->commonModel->allFetch('job_category',array('is_active'=>1));
        $data['permission_emp']=$this->commonModel->allFetch('permission_type',array());
        $data['permission_emp1']=$this->commonModel->allFetch('permissions_emp',array('emp_id'=>$id));
        
        $data['vendordata']=$this->commonModel->fs('vendor',array('id'=>$id));
        
        // print_r($data);exit;
        return view('superadmin/vendor-edit0',$data);
    }
    
    public function vendorEdit1()
    {
        $id=$this->request->getVar('id');
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $phone = $this->request->getVar('phone');
        $country_id = $this->request->getVar('country_id');
        $state_id = $this->request->getVar('state_id');
        $city_id = $this->request->getVar('city_id');
        $address = $this->request->getVar('address');
        $assign = $this->request->getVar('assign');
        
        $save = [
                'name'      => $name,
                'email'     => $email,
                'phone'     => $phone,
                'country'   => $country_id,
                'state'     => $state_id,
                'city'      => $city_id,
                'address'   => $address,
                'assign'    => $assign,
               
            ];
        
        
            // print_r($data);exit;
            
        $savedata=$this->commonModel->updateData('vendor',$save,array('id'=>$id));
        
        if($savedata)
          {
              $data =[
                    'emp_id'  => $id,
                ];
            
            $datasave=$this->commonModel->updateData('permissions_emp',$data,array('role_id'=>$assign));
            
              $this->session->setFlashdata('success', 'Vendor Updated.');
              return redirect()->to(base_url('superadmin/vendor-list'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/vendor-list/'.$id));
          }
    }
    
    public function jobcategorywisedatashow()
    {
       
        return view('superadmin/job-category-wise-data-display');
        
    }
    
    public function index()
    {
        helper(['form']);
        // echo password_hash("123", PASSWORD_BCRYPT);
        return view('superadmin/index');
        
    }  
    
    public function dashboard()
    {
        $currentYear = date('Y-m-d');
        
        $data['company']=$this->commonModel->allFetchd('companies',array(),'id','desc',5);
        $data['jobs']=$this->commonModel->allFetchd('jobs_list',array(),'id','desc',5);
        
        $data['totaljobs']=$this->commonModel->allCount('jobs_list',array('is_active'=>1));
        $data['totalcompany']=$this->commonModel->allCount('companies',array('is_active'=>1));
        $data['totalcandidate']=$this->commonModel->allCount('users',array());
        $data['totalcountry']=$this->commonModel->allCount('location_countries',array('is_active'=>1));
        $data['totalstate']=$this->commonModel->allCount('location_states',array('is_active'=>1));
        $data['totalcity']=$this->commonModel->allCount('location_cities',array('is_active'=>1));
        
        $data['todayjobs']=$this->commonModel->allCount('jobs_list',array('DATE(created_at)' => $currentYear));
        $data['todaycompany']=$this->commonModel->allCount('companies',array('DATE(created_at)' => $currentYear));
        $data['todaycandidate']=$this->commonModel->allCount('users',array('DATE(created_at)' => $currentYear));
        // print_r($data['todayjobs']);exit;
        return view('superadmin/dashboard',$data);
    }
    
    public function todaycompany()
    {
        $currentYear = date('Y-m-d');
        $data['company']=$this->commonModel->allFetchd('companies',array('DATE(created_at)' => $currentYear));
        // $data['todaycompany']=$this->commonModel->allFetchd('companies',array('DATE(created_at)' => $currentYear));
        // print_r($data['company']);exit;
        return view('superadmin/todaycompany',$data);
    }
    
    public function todayjobs()
    {
        $currentYear = date('Y-m-d');
        $data['jobs']=$this->commonModel->allFetchd('jobs_list',array('DATE(created_at)' => $currentYear));
        // print_r($data['company']);exit;
        return view('superadmin/todayjobs',$data);
    }
    
    public function todaycandidate()
    {
        $currentYear = date('Y-m-d');
        $data['users']=$this->commonModel->allFetchd('users',array('DATE(created_at)' => $currentYear));
        // print_r($data['company']);exit;
        return view('superadmin/todaycandidate',$data);
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
                    'roleassign' => $data['assign'],
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
       
       $data['jobcategory']=$this->commonModel->allFetch('job_category',array('is_active'=>1));
       return view('superadmin/add-career-level',$data);
    }
    
    public function storecareerlevel()
    {
        $rules = [
            'title' => 'is_unique[job_attributes_career_levels.name]',
        ];
        
        
        $job_category_id=$this->request->getVar('job_category_id');
        $functional_area_id=$this->request->getVar('functional_area_id');
        $title=$this->request->getVar('title');
        $slug=$this->request->getVar('slug');
        
        
        $metatitle=$this->request->getVar('metatitle');
        $metakeywords=$this->request->getVar('metakeywords');
        $metadescription=$this->request->getVar('metadescription');
        
        $description=$this->request->getVar('description');
        $responbilities=$this->request->getVar('responbilities');
        $requirements=$this->request->getVar('requirements');
        $schema_markup=$this->request->getVar('schema_markup');
        
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'Carrer Level already Exists.');
        }
        else
        {
        $save['jobcate_id']=$job_category_id;
        $save['function_area_id']=$functional_area_id;
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($slug));
        
        $save['metatitless']=$metatitle;
        $save['metakeywordss']=$metakeywords;
        $save['metadescriptionss']=$metadescription;
        
        $save['description']=$description;
        $save['responbilities']=$responbilities;
        $save['requirements']=$requirements;
        $save['schema_markup']=$schema_markup;
        
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
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
        $data['jobcategory']=$this->commonModel->allFetch('job_category',array('is_active'=>1));
        $data['functionareas']=$this->commonModel->allFetch('function_area',array('is_active'=>1));
        
        $jobcateslug=$data['jobcategory'][0]->name;
        $functionslug=$data['functionareas'][0]->name;
        
        $data['datacareer']=$this->commonModel->fs('job_attributes_career_levels',array('id'=>$id));
        
        
        // print_r($functionslug);exit;
        return view('superadmin/edit-career-level',$data);
    }
    
    public function editcareerlevel1()
    {
        
        
        $id=$this->request->getVar('id');
        $job_category_id=$this->request->getVar('job_category_id');
        $functional_area_id=$this->request->getVar('functional_area_id');
        $title=$this->request->getVar('title');
        $slug=$this->request->getVar('slug');
        
        
        $metatitle=$this->request->getVar('metatitle');
        $metakeywords=$this->request->getVar('metakeywords');
        $metadescription=$this->request->getVar('metadescription');
        
        $description=$this->request->getVar('description');
        $responbilities=$this->request->getVar('responbilities');
        $requirements=$this->request->getVar('requirements');
        $schema_markup=$this->request->getVar('schema_markup');
        
        $is_active=$this->request->getVar('is_active');
        
        
        $save['jobcate_id']=$job_category_id;
        $save['function_area_id']=$functional_area_id;
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($slug));
        
        $save['metatitless']=$metatitle;
        $save['metakeywordss']=$metakeywords;
        $save['metadescriptionss']=$metadescription;
        
        $save['description']=$description;
        $save['responbilities']=$responbilities;
        $save['requirements']=$requirements;
        $save['schema_markup']=$schema_markup;
        ;
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
    
    // vacancy type start
    public function vacancytype()
    {
        $data['vacancytype']=$this->commonModel->allFetchd('vacancy_type',array());
        return view('superadmin/all-vacancytype',$data);
    }
    
    public function addvacancytype()
    {
       return view('superadmin/add-vacancytype');
    }
    
    public function storevacancytype()
    {
        $rules = [
            'title' => 'is_unique[vacancy_type.name]',
        ];
        
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'Vacancy Type already Exists.');
        }
        else
        {
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('vacancy_type',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Vacancy Type Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('superadmin/add-vacancytype'));
       
    }
    
    public function editvacancytype($id)
    {
        $data['datavacancytype']=$this->commonModel->fs('vacancy_type',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-vacancytype',$data);
    }
    
    public function editvacancytype1()
    {
        
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $is_active=$this->request->getVar('is_active');
        
        $save['name']=$title;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;		
    	$savedata=$this->commonModel->updateData('vacancy_type',$save,array('id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Job Type Updated.');
              return redirect()->to(base_url('superadmin/all-vacancytype'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-vacancytype/',$id));
          }
    
        
    }
    
    public function deletevacancytype()
    {
          $deleteId = $this->request->getVar('deleteId');
        //   print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('vacancy_type',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Job Experience deleted.');
              return redirect()->to(base_url('superadmin/all-vacancytype'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-vacancytype'));
          }
    }
    // vacancy type end
    
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
    
    public function statewisecity($id)
    {
        $data['datacity']=$this->commonModel->allFetchd('location_cities',array('state_id'=>$id));
        // print_r($data);exit;
        return view('superadmin/state-wise-city',$data);
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
        
        $data['state']=$this->commonModel->allFetchd('location_cities',array());
        return view('superadmin/all-city',$data);
    }
    
    public function citywisecompany($id)
    {
        
        $data['datacompany']=$this->commonModel->allFetchd('companies',array('city_id'=>$id));
        // print_r($data);exit;
        return view('superadmin/city-wise-company',$data);
    }
    
    public function citywisejob($id)
    {
        $data['datascity']=$this->commonModel->fs('location_cities',array('id'=>$id));
        $data['datajob']=$this->commonModel->allFetchd('jobs_list',array('city_id'=>$id));
        // print_r($data);exit;
        return view('superadmin/city-wise-jobs',$data);
    }
    
    public function addcity()
    {
       
       $data['state']=$this->commonModel->allFetchd('location_states',array()); 
       return view('superadmin/add-city',$data);
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
        return redirect()->to(base_url('superadmin/add-city'));
       
    }
    
    public function editcity($id)
    {
        $data['state']=$this->commonModel->allFetchd('location_states',array()); 
        $data['datacity']=$this->commonModel->fs('location_cities',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-city',$data);
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
              return redirect()->to(base_url('superadmin/all-city'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-city/',$id));
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
              return redirect()->to(base_url('superadmin/all-city'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-city'));
          }
    }
    // City end
    
    // Job category start
    public function jobcategory()
    {
        
        $data['jobcategory']=$this->commonModel->allFetchd('job_category',array());
        
        return view('superadmin/all-job-category',$data);
    }
    
    public function addjobcategory()
    {
        // echo 'dsf';exit;
       return view('superadmin/add-job-category');
    }
    
    public function storejobcategory()
    {
        $rules = [
            'title' => 'is_unique[job_category.name]',
        ];
        
        $title=$this->request->getVar('title');
        /*$description=$this->request->getVar('description');
        $responsibility=$this->request->getVar('responbilities');
        $requirement=$this->request->getVar('requirements');*/
        
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'Job Category already Exists.');
        }
        else
        {
        $save['name']=$title;
        /*$save['description']=$description;
        $save['responsibility']=$responsibility;
        $save['requirement']=$requirement;*/
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('job_category',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Job Category Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('superadmin/add-job-category'));
       
    }
    
    public function editjobcategory($id)
    {
       
        $data['datajobcate']=$this->commonModel->fs('job_category',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-job-category',$data);
    }
    
    public function editjobcategory1()
    { 
        
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        /*$description=$this->request->getVar('description');
        $responsibility=$this->request->getVar('responbilities');
        $requirement=$this->request->getVar('requirements');*/
        $is_active=$this->request->getVar('is_active');
        
        $save['name']=$title;
        /*$save['description']=$description;
        $save['responsibility']=$responsibility;
        $save['requirement']=$requirement;*/
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;		
    	$savedata=$this->commonModel->updateData('job_category',$save,array('id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Job Category Updated.');
              return redirect()->to(base_url('superadmin/all-job-category'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-job-category/',$id));
          }
    
        
    }
    
    public function deletejobcategory()
    {
          $deleteId = $this->request->getVar('deleteId');
        //  print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('job_category',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Job Category deleted.');
              return redirect()->to(base_url('superadmin/all-job-category'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-job-category'));
          }
    }
    // Job category end
    
    // Function Area start
    public function functionarea()
    {
        // echo 'df';exit;
        $data['functionarea']=$this->commonModel->allFetchd('function_area',array());
        
        return view('superadmin/all-function-area',$data);
    }
    
    public function addfunctionarea()
    {
        // echo 'dsf';exit;
       $data['jobcate']=$this->commonModel->allFetchd('job_category',array());  
    //   print_r($data['jobcate']);exit;
       return view('superadmin/add-function-area',$data);
    }
    
    public function storefunctionarea()
    {
        $rules = [
            'title' => 'is_unique[function_area.name]',
        ];
        
        $title=$this->request->getVar('title');
        /*$description=$this->request->getVar('description');
        $responsibility=$this->request->getVar('responbilities');
        $requirement=$this->request->getVar('requirements');*/
        $job_cate_id=$this->request->getVar('job_cate_id');
        
        $is_active=$this->request->getVar('is_active');
        
        if(!$this->validate($rules))
        {
            // $response['status']=0;
            $this->session->setFlashdata('error', 'Function Area already Exists.');
        }
        else
        {
        $save['name']=$title;
        $save['job_cate_id']=$job_cate_id;
        /*$save['description']=$description;
        $save['responbilities']=$responsibility;
        $save['requirements']=$requirement;*/
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('function_area',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Function Area Added.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        }
        return redirect()->to(base_url('superadmin/add-function-area'));
       
    }
    
    public function editfunctionarea($id)
    {
        
        // $data['datafuncarea']=$this->commonModel->fs('function-area',array('id'=>$id));
        $data['datafuncarea']=$this->commonModel->fs('function_area',array('id'=>$id));
        $data['degree']=$this->commonModel->allFetchd('job_category',array());
        // print_r($data);exit;
        return view('superadmin/edit-function-area',$data);
    }
    
    public function editfunctionarea1()
    {
        
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $job_cate_id=$this->request->getVar('job_cate_id');
        /*$description=$this->request->getVar('description');
        $responsibility=$this->request->getVar('responbilities');
        $requirement=$this->request->getVar('requirements');*/
        $is_active=$this->request->getVar('is_active');
        
        $save['name']=$title;
        $save['job_cate_id']=$job_cate_id;
        /*$save['description']=$description;
        $save['responbilities']=$responsibility;
        $save['requirements']=$requirement;*/
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($title));
        $save['is_active']=$is_active;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;		
    	$savedata=$this->commonModel->updateData('function_area',$save,array('id'=>$id));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Function Area Updated.');
              return redirect()->to(base_url('superadmin/all-function-area'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/edit-function-area/',$id));
          }
    
        
    }
    
    public function deletefunctionarea()
    {
          $deleteId = $this->request->getVar('deleteId');
        //  print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('function_area',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Job Category deleted.');
              return redirect()->to(base_url('superadmin/all-function-area'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-function-area'));
          }
    }
    // Function Area end
    
    // consultant start 
    
    public function consultant()
    {
        $data['company']=$this->commonModel->allFetchd('companies',array('type'=>'Consultant'));
        // print_r($data['company']);exit;
        return view('superadmin/view-consultant',$data);
    }
    public function editconsultant($id)
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
        $data['permission_emp']=$this->commonModel->allFetch('permission_type',array());
        $data['permission_emp1']=$this->commonModel->allFetch('permissions_emp',array('emp_id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-consultant',$data);
    }
    
    public function editconsultant1()
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
        if ($savedata) {
                // $inserted_id = $savedata;
                $permissions = $this->request->getPost('permissions');
                
                foreach ($permissions as $permission) {
            // Check if the permission record already exists
            $existingPermission = $this->db->table('permissions_emp')
                ->where(['emp_id' => $id, 'permission_type_id' => $permission])
                ->get()
                ->getRow();

            if ($existingPermission) {
                // Update existing permission record
                $datasave = $this->db->table('permissions_emp')
                    ->where(['emp_id' => $id, 'permission_type_id' => $permission])
                    ->update(['emp_id' => $id, 'permission_type_id' => $permission]);
                $action = 'updated';
            } else {
                // Insert new permission record
                $datasave = $this->db->table('permissions_emp')
                    ->insert(['emp_id' => $id, 'permission_type_id' => $permission]);
                $action = 'inserted';
            }
            if ($datasave) {
                // Log success message or use flashdata
                $this->session->setFlashdata('success', "Permission $action for Permission Type ID: $permission.");
            } else {
                // Log error message or use flashdata
                $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            }
        }
                
               
        
        // $datasave = $this->commonModel->updateData('companies_Permission', $data,array('companyID'=>$id));
        // print_r($datasave);exit;
        
        } else {
                $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            }
        
        
        return redirect()->to(base_url('superadmin/edit-consultant/'.$id));
        
    
        
    }
    
    // Company start
    public function companies()
    {
        $data['state']=$this->commonModel->allFetch('location_states',array('is_active'=>1)); 
        $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1)); 
        $data['company']=$this->commonModel->allFetchd('companies',array());
        
        /*$data['company'] = $this->db->table('companies')
            ->select('DATE(created_at) as distinct_date') // Use DATE() to consider only the date portion
            ->distinct()
            ->groupBy('distinct_date')
            ->orderBy('distinct_date', 'DESC')
            ->get()
            ->getResult();*/
            
        // print_r($data);exit;
        return view('superadmin/all-company',$data);
    }
    // Extra start
    public function filterCompanies()
    {
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');
        $companyName = $this->request->getPost('company_name');
        $stateId = $this->request->getPost('state_id');
        $cityId = $this->request->getPost('city_id');
        
        $data['state']=$this->commonModel->allFetch('location_states',array('is_active'=>1)); 
        $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1)); 
        
        $data['company'] = $this->commonModel->fetchCompaniesByDate($companyName, $stateId, $cityId,$startDate, $endDate);
        // print_r($data);exit;
        return view('superadmin/all-company', $data);
    }
    
    // extra end
    
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
              $inserted_id = $savedata;
                $permissiondata=$this->commonModel->insertData('companies_Permission',['companyID'=>$inserted_id]);
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
        
        $data['industry']=$this->commonModel->allFetch('job_attributes_industries',array('is_active'=>1)); 
        $data['ownership']=$this->commonModel->allFetch('job_attributes_ownership_types',array('is_active'=>1)); 
        $data['country']=$this->commonModel->allFetch('location_countries',array('is_active'=>1)); 
        $data['state']=$this->commonModel->allFetch('location_states',array('is_active'=>1)); 
        $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1)); 
        
        $data['permissions']=$this->commonModel->allFetch('permission_type',array()); 
        $data['companypermissions']=$this->commonModel->fs('companies_Permission',array('companyID'=>$id)); 
        
        $data['datacompany']=$this->commonModel->fs('companies',array('id'=>$id));
        
        // print_r($data['userpermissions']);exit;
        return view('superadmin/edit-company',$data);
    }
    
    public function viewcompanies($id)
    {
        $data['datacompany']=$this->commonModel->fs('companies',array('id'=>$id));
        // print_r($data);exit;
        
        return view('superadmin/view-company',$data);
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
        // 'degree_level'     => $this->request->getPost('perdegree_level') === '1' ? 1 : 0,
        // 'degree_type'      => $this->request->getPost('perdegree_type') === '1' ? 1 : 0,
        // 'functional_area'  => $this->request->getPost('perfunctional_area') === '1' ? 1 : 0, 
        // 'exp'              => $this->request->getPost('perexp') === '1' ? 1 : 0,
        'logo'             => $this->request->getPost('perlogo') === '1' ? 1 : 0,
        'aaplied_job'      => $this->request->getPost('peraaplied_job') === '1' ? 1 : 0,
        // 'technical_skill'  => $this->request->getPost('pertechnical_skill') === '1' ? 1 : 0,
        // Add other checkbox fields here
        ];
        // print_r($data);exit;
        $datasave = $this->commonModel->updateData('companies_Permission', $data,array('companyID'=>$id));
        // print_r($datasave);exit;
        
        
        if($savedata && $datasave)
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
    
    public function totalvendorcompanyjob($id)
    {
        $data['datajobs']=$this->commonModel->allFetchd('jobs_list',array('vendorID'=>$id));
            /*$data['datajobs'] = $this->db->table('jobs_list')
            ->select('DATE(created_at) as distinct_date') // Use DATE() to consider only the date portion
            ->distinct()
            ->where('vendorID', $id)
            ->groupBy('distinct_date')
            ->get()
            ->getResult();*/



        // $data['datasjobs']=$this->commonModel->fs('companies',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/total-vendor-company-jobs',$data);
    }
    
    // extra start
    
    // SuperAdminController.php
    public function filtervendorcompanyjob()
    {
        $vendor_id = $this->request->getPost('vendor_id');
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');
    
        // Debugging statements
        // echo "Start Date: $startDate, End Date: $endDate, Company ID: $company_id";
    
        // Use the Query Builder to filter data
        $result = $this->db->table('jobs_list')
            ->where('vendorID', $vendor_id)
            ->where('created_at >=', $startDate)
            ->where('created_at <=', $endDate)
            ->get();
    
        // Debugging: Print the generated SQL query
        // echo "SQL Query: " . $this->db->getLastQuery();
    
        $data['datajobs'] = $result->getResult();
    
        return view('superadmin/total-vendor-company-jobs', $data);
    }
    // extra end
    
    // Company end
    
    // Candidate start
    public function candidate()
    {
        $data['state']=$this->commonModel->allFetch('location_states',array('is_active'=>1)); 
        $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1)); 
        $data['users']=$this->commonModel->allFetchd('users',array());
        
        return view('superadmin/all-user',$data);
    }
    
    // Extra Start
    
    public function filterCandidate()
    {
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');
        $candidateName = $this->request->getPost('candidate_name');
        $stateId = $this->request->getPost('state_id');
        $cityId = $this->request->getPost('city_id');
        
        //  echo "Start Date: $startDate, End Date: $endDate, Candidate Name: $candidateName, State ID: $stateId, City ID: $cityId"; // Add this line
         
        $data['state']=$this->commonModel->allFetch('location_states',array('is_active'=>1)); 
        $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1)); 
        
        $data['users'] = $this->commonModel->fetchFilteredCandidates($candidateName, $stateId, $cityId, $startDate, $endDate);
        // print_r($data['users']);exit;
        return view('superadmin/all-user', $data);
    }
    
    // Extra End
    
    public function addcandidate()
    {
        return view('superadmin/add-user');
    }
    
    public function storeCandidate()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'mobile' => 'required|numeric',
            'password' => 'required',

        ];
        $uniquephone=[
            'mobile' => 'is_unique[users.mobile]',
        ];
        $uniqueemail=[
            'email' => 'is_unique[users.email]',
        ];
        /*$rulepass=[
            'cpassword' => 'matches[password]',
            ];*/
          
        if(!$this->validate($rules))
        {
            $this->session->setFlashdata('error', 'Please enter valid details.');
        }
        /*else if(!$this->validate($rulepass))
        {
            $this->session->setFlashdata('error', 'The passwords you entered do not match.');
        }*/
        else if(!$this->validate($uniquephone))
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
            $password=$this->request->getVar('password');
            $data['password']= password_hash($password, PASSWORD_DEFAULT);
            $data['created_at']=Time::now()->format('Y-m-d H:i:s');
            
            // print_r($data);exit;
            $insertdata=$this->commonModel->insertData('users',$data);
            if($insertdata)
            {
                $this->session->setFlashdata('success', ' Registration Completed');
                return redirect()->to(base_url('superadmin/all-user'));
            }
            else
            {
                $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
                return redirect()->to(base_url('superadmin/add-user'));
            }
        }
        
        return redirect()->to(base_url('superadmin/add-user'));
    }
    
    public function editcandidate($id)
    {
        $data['datauser']=$this->commonModel->fs('users',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-user',$data);
    }
    
    public function viewcandidate($id)
    {
        $data['datacandidate']=$this->commonModel->fs('users',array('id'=>$id));
        // print_r($data);exit;
        
        return view('superadmin/view-user',$data);
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
            return redirect()->to(base_url('superadmin/all-user'));
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('superadmin/edit-user/',$id));
          }
        
        return redirect()->to(base_url('superadmin/edit-user/',$id));
        
    
        
    }
    
    public function deletecandidate()
    {
          $deleteId = $this->request->getVar('deleteId');
        //  print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('users',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'User deleted.');
              return redirect()->to(base_url('superadmin/all-user'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/all-user'));
          }
    }
    // Candidate end
    
    // job post start
    public function jobslist()
    {
        // $data['jobs']=$this->commonModel->allFetchd('jobs_list',array());
        // $data['jobs']=$this->commonModel->allFetchd('jobs_list',array(),'id','desc');
        // $query = $this->commonModel->getLastQuery();
        
        $data['jobs'] = $this->db->table('jobs_list')
            ->select('YEAR(created_at) as distinct_date') // Use DATE() to consider only the date portion
            ->distinct()
            ->groupBy('distinct_date')
            ->get()
            ->getResult();
            
            /*$data['jobs'] = $this->db->table('jobs_list')
            ->select('DATE(created_at) as distinct_date') // Use DATE() to consider only the date portion
            ->distinct()
            ->groupBy('distinct_date')
            ->get()
            ->getResult();*/

        // Print or log the query
        // echo $query; exit;
        // print_r($data);exit;

        return view('superadmin/all-jobs',$data);
    }
    
    // Extra Start
    public function filterJobs()
    {
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');
    
        $data['jobs'] = $this->commonModel->fetchJobsByDate($startDate, $endDate);
        // print_r($data);exit;
        return view('superadmin/all-jobs', $data);
    }
    // Extra End
    
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
        $data['companies']=$this->commonModel->allFetch('companies',array('is_active'=>1));
        $data['jobcategory']=$this->commonModel->allFetch('job_category',array('is_active'=>1));
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

        return view('superadmin/edit-jobs',$data);
        
    }
    
    public function viewjobs($id)
    {
       $data['datajobpost']=$this->commonModel->fs('jobs_list',array('id'=>$id)); 
       return view('superadmin/view-jobs',$data);
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
        
        
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
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
    
    public function generateImage()
    {
        // Receive data from the request
        $data = $this->request->getPost();
        
        // Generate an image with the received data (use a library of your choice)
        $image = $this->generateTableImage($data);
        
        /*$title = $this->request->getPost('title');
        $functional_area = $this->request->getPost('functional_area');
        $vacancy = $this->request->getPost('vacancy');
        $education = $this->request->getPost('education');
        $work_mode = $this->request->getPost('work_mode');
        $experience = $this->request->getPost('experience');
        $vacancy_name = $this->request->getPost('vacancy_name');
        $gender = $this->request->getPost('gender');
        $job_location = $this->request->getPost('job_location');
        $salary = $this->request->getPost('salary');
        $expire_date = $this->request->getPost('expire_date');
        
        print_r($expire_date);exit;*/
        
        // $image='<table><tr><td></td></tr></table>';
        // $image = $this->generateTableImage($title, $functional_area,$vacancy,$education,$work_mode,$experience,$vacancy_name,$gender,$job_location,$salary,$expire_date);
    
        // $base64Image = base64_encode($image);
        $base64Image = base64_encode($image);
        $this->saveImageToFile($base64Image);
        return $this->response->setJSON(['status' => 'success']);
        // return $this->response->setJSON($base64Image);
        // $image = $this->generateTableImage($data);
        
        // header('Content-Type: image/png');
        // header('Content-Disposition: attachment; filename="downloaded_image.png"');
        // echo $image;
        
        // Return the image as a response with the specified headers
        // return $this->response->setStatusCode(200)->setHeaders($headers)->setBody($image)->send();
    }
    
    private function generateTableImage($data)
    {
        // Implement your logic to generate an image with the provided data
        // You can use the GD library or any other image generation library
        // Return the image data (example: using GD library)
        
        
        
        $imageWidth = 600;
        $imageHeight = 400;
        $image = imagecreatetruecolor($imageWidth, $imageHeight);
    
        // Set background color
        $backgroundColor = imagecolorallocate($image, 255, 255, 255);
        imagefill($image, 0, 0, $backgroundColor);

        // Set text color
        $textColor = imagecolorallocate($image, 0, 0, 0);

        // Set font size and style
        $fontSize = 14;
        $font = 'path/to/your/font.ttf'; // Replace with the path to your TTF font file
        if (!file_exists($font)) {
            // If the font file doesn't exist, use the default GD font
            $font = 1;
        }

        // Set initial position for text
        $x = 20;
        $y = 30;

        // Loop through data and draw table
        foreach ($data as $key => $value) {
            // Draw table cells
            imagettftext($image, $fontSize, 0, $x, $y, $textColor, $font, "$key:");
            imagettftext($image, $fontSize, 0, $x + 120, $y, $textColor, $font, $value);
    
            // Move to the next row
            $y += 30;
        }

        // Output the image as PNG
        ob_start();
        imagepng($image);
        $imageData = ob_get_contents();
        ob_end_clean();
    
        // Destroy the image resource to free up memory
        imagedestroy($image);
    
        return $imageData;
    }
    
    
    public function appliedjobslist()
    {
        $data['jobsapplicant']=$this->commonModel->allFetchd('job_applicants',array());
        // print_r($data);exit;
        return view('superadmin/all-applied-jobs',$data);
    }
    
    // extra start
    public function filterappliedjoblist()
    {
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');
    
        // Debugging statements
        // echo "Start Date: $startDate, End Date: $endDate, Company ID: $company_id";
    
        // Use the Query Builder to filter data
        $result = $this->db->table('job_applicants')
            
            ->where('created_at >=', $startDate)
            ->where('created_at <=', $endDate)
            ->get();
    
        // Debugging: Print the generated SQL query
        // echo "SQL Query: " . $this->db->getLastQuery();
    
        $data['jobsapplicant'] = $result->getResult();
    
        return view('superadmin/all-applied-jobs', $data);
    }
    // extra end
    
    public function jobscountlist($companys_id)
    {
        // $data['datajobs']=$this->commonModel->allFetchd('jobs_list',array('company_id'=>$companys_id));
        $data['joblistcount']=$this->commonModel->allFetchd('jobs_list',array('company_id'=>$companys_id));
        // print_r($data);exit;
        return view('superadmin/jobs-count-list',$data);
    }
    
    // extra start
   
    public function filterjoblist()
    {
        $company_id = $this->request->getPost('company_id');
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');
    
        // Debugging statements
        // echo "Start Date: $startDate, End Date: $endDate, Company ID: $company_id";
    
        // Use the Query Builder to filter data
        $result = $this->db->table('jobs_list')
            ->where('company_id', $company_id)
            ->where('created_at >=', $startDate)
            ->where('created_at <=', $endDate)
            ->get();
    
        // Debugging: Print the generated SQL query
        // echo "SQL Query: " . $this->db->getLastQuery();
    
        $data['joblistcount'] = $result->getResult();
    
        return view('superadmin/jobs-count-list', $data);
    }


    // extra end
    
    public function appliedjobscount($job_id)
    {
        // $job_id1=base64_decode($job_id);
        // $data['datajobs']=$this->commonModel->allFetchd('jobs_list',array('company_id'=>$companys_id));
        $data['joblistcount']=$this->commonModel->allFetchd('job_applicants',array('job_id'=>$job_id));
        // print_r($data);exit;
        return view('superadmin/applied-jobs-count',$data);
    }
    // extra start
    
    public function filterappliedjobs()
    {
        
        $job_id = $this->request->getPost('job_id');
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');
    
        // Debugging statements
        // echo "Start Date: $startDate, End Date: $endDate, Company ID: $company_id";
    
        // Use the Query Builder to filter data
        $result = $this->db->table('job_applicants')
            ->where('job_id', $job_id)
            ->where('created_at >=', $startDate)
            ->where('created_at <=', $endDate)
            ->get();
    
        // Debugging: Print the generated SQL query
        // echo "SQL Query: " . $this->db->getLastQuery();
    
        $data['joblistcount'] = $result->getResult();
        // print_r($data);exit;
        return view('superadmin/applied-jobs-count', $data);
    }
    
    // extra end
    
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
            // return redirect()->to(base_url('superadmin/jobs-count-list'));
            return redirect()->back();
          }
         else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('superadmin/applied-jobs-count/'.$deleteId));
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
        return view('superadmin/view-job-list',$data);
    }
    
    
    // Pages start
    public function pageslist()
    {
        $data['pages']=$this->commonModel->allFetchd('pages',array());
        // $query = $this->commonModel->getLastQuery();

        // Print or log the query
        // echo $query; exit;
        // print_r($data);exit;

        return view('superadmin/all-pages',$data);
    }
    
    public function addpages()
    {
        return view('superadmin/add-pages');
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
        
        return redirect()->to(base_url('superadmin/all-pages'));
        
        }
    
    public function editpages($id)
    {
       $data['datapages']=$this->commonModel->fs('pages',array('id'=>$id));
       return view('superadmin/edit-pages',$data);
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
             return redirect()->to(base_url('superadmin/all-pages'));
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('superadmin/edit-pages/',$id));
          }
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    // blogs
    
    public function allblogs()
    {
        $data['blogs']=$this->commonModel->allFetchd('blog',array());
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
        $meta_title=$this->request->getVar('meta_title');
        $details=$this->request->getVar('description');
        $slug=$this->request->getVar('slug');
        $metadetails=$this->request->getVar('meta_description');
        $meta_keyword=$this->request->getVar('meta_keyword');
        $schema_markup=$this->request->getVar('schema_markup');
        $canonical_tag=$this->request->getVar('canonical_tag');
        
        
        $save['title']=$title;
        $save['meta_title']=$meta_title;
        $save['description']=$details;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($slug));
        $save['meta_description']= $metadetails;
        $save['meta_keyword']= $meta_keyword;
        $save['schema_markup']= $schema_markup;
        $save['canonical_tag']= $canonical_tag;
        
        $profile = $this->request->getFile('image');
        
        if ($profile->isValid() && !$profile->hasMoved())
        {
            $newName = $profile->getRandomName();
            $profile->move('./back/assets/images/blogs/', $newName); // Move the file to the 'uploads' directory
            if(!empty($newName))
            {
                $save['image']=$newName;
            }
        }
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('blog',$save);
        
        // print_r($savedata);exit;
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Blogs Added.');
              return redirect()->to(base_url('superadmin/all-blogs'));
          }
        else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('superadmin/add-blogs'));
          }
        
       
    }
    
    public function viewblogs($slug)
    {
        $data['datablogs']=$this->commonModel->fs('blog',array('slug'=>$slug));
        // print_r($data);exit;
        return view('superadmin/view-blogs',$data);
    }
    
    public function editblogs($id)
    {
        $data['datablogs']=$this->commonModel->fs('blog',array('id'=>$id));
        // print_r($data);exit;
        return view('superadmin/edit-blogs',$data);
    }
    public function editblogs1()
    {
        $id=$this->request->getVar('id');
        $title=$this->request->getVar('title');
        $meta_title=$this->request->getVar('meta_title');
        $details=$this->request->getVar('description');
        $slug=$this->request->getVar('slug');
        $metadetails=$this->request->getVar('meta_description');
        $meta_keyword=$this->request->getVar('meta_keyword');
        $schema_markup=$this->request->getVar('schema_markup');
        $canonical_tag=$this->request->getVar('canonical_tag');
        
        
        $save['title']=$title;
        $save['meta_title']=$meta_title;
        $save['description']=$details;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($slug));
        $save['meta_description']= $metadetails;
        $save['meta_keyword']= $meta_keyword;
        $save['schema_markup']= $schema_markup;
        $save['canonical_tag']= $canonical_tag;
        
       
       // Image
    	$profile = $this->request->getFile('image');
            if ($profile->isValid() && !$profile->hasMoved())
            {
                $newName = $profile->getRandomName();
                $profile->move('./back/assets/images/blogs/', $newName); // Move the file to the 'uploads' directory
                if(!empty($newName))
                {
                    $save['image']=$newName;
                }
            }
    // 		print_r($save);exit;	
    	$savedata=$this->commonModel->updateData('blog',$save,array('id'=>$id));
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
          $del=$this->commonModel->deleteData('blog',array('id'=>$deleteId));
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