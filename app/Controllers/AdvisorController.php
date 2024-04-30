<?php

namespace App\Controllers;
use App\Models\CommonModel;
use CodeIgniter\I18n\Time;

class AdvisorController extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        helper('general');
        $this->commonModel = new CommonModel();
        $this->cusid= $this->session->get('cusid');
        $cusdetails=$this->commonModel->fs('far_customer_registration',array('cusid'=> $this->cusid));
        $this->stateid=$cusdetails->cusstate;
        $this->db = \Config\Database::connect();
    }
    
    public function dashboard()
    {
        $data['tasklist']=$this->commonModel->allFetch('far_task',array('tuserID'=>$this->cusid),'tid');
        // print_r($data);exit;
        return view('advisor/dashboard',$data);
        // echo 'dgf';
    }
    
    // Task Start
    
    public function addtask()
    {
        $title=$this->request->getVar('taskname');
        $details=$this->request->getVar('taskdesc');
        $type=$this->request->getVar('taskstatus'); 
        $uid=$this->request->getVar('uid'); 
        
        $save['tname']=$title;
        $save['tdes']=$details;
        $save['tstatus']=$type;
        $save['tuserID']=$uid;
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('far_task',$save);
        
        // print_r($savedata);exit;
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'Scheme Added.');
              return redirect()->to(base_url('advisor/dashboard'));
          }
        else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('advisor/dashboard'));
          }
    }
    
    public function edittask($id)
    {
        $data=$this->commonModel->fs('far_task',array('tid'=>$id));
        // print_r($data);
        echo json_encode($data);
    }
    
    public function edittask1()
    {
        $title=$this->request->getVar('taskname');
        $details=$this->request->getVar('taskdesc');
        $type=$this->request->getVar('taskstatus'); 
        $tid=$this->request->getVar('tid'); 
        // $uid=$this->request->getVar('uid'); 
        
        $save['tname']=$title;
        $save['tdes']=$details;
        $save['tstatus']=$type;
        // $save['tuserID']=$uid;
        // print_r($save);
        // exit;
        $savedata=$this->commonModel->updateData('far_task',$save,array('tid'=>$tid));
    	if($savedata)
          {
              $this->session->setFlashdata('success', 'TAsk Updated.');
              return redirect()->to(base_url('advisor/dashboard'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('advisor/dashboard'));
          }
        
    }
    
    public function deletetask()
    {
          $deleteId = $this->request->getVar('deleteId');
          $del=$this->commonModel->deleteData('far_task',array('tid'=>$deleteId));
        
          if($del)
          {
              $this->session->setFlashdata('success', 'scheme deleted.');
              return redirect()->to(base_url('advisor/dashboard'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('advisor/dashboard'));
          }
    }
    
    // Task End
    
    public function profile()
    {
        $data['states']=$this->commonModel->allFetch('far_states',array('country_id'=>'101'));
        $data['cities']=$this->commonModel->allFetch('far_cities',array('state_id'=>$this->stateid));
        return view('advisor/profile',$data);
    }
    
    public function editProfileSubmit()
    {
        $customerid=$this->request->getVar('cusid');
        $save['cusfname']=$this->request->getVar('cusfname');
        $save['cuslname']=$this->request->getVar('cuslname');
        $save['cusemail']=$this->request->getVar('cusemail');
        $save['cusphone']=$this->request->getVar('cusphone');
        $save['cusstate']=$this->request->getVar('state');
        $save['cuscity']=$this->request->getVar('cityid');
        $save['cusprofession']=$this->request->getVar('cusprofession');
        $save['cuspincode']=$this->request->getVar('cuspincode');
        
        $profile = $this->request->getFile('image');
        if ($profile->isValid() && !$profile->hasMoved())
        {
            $newName = $profile->getRandomName();
            $profile->move('./front/assets/img/user/avatar/', $newName); // Move the file to the 'uploads' directory
            if(!empty($newName))
            {
                $save['cusimage']=$newName;
            }
        }
        
        $update=$this->commonModel->updateData('far_customer_registration',$save,array('cusid'=>$this->cusid));
        
        $array=array();
        if($update)
        {
            $this->session->setFlashdata('success', 'Profile Updated.');
            return redirect()->to(base_url('advisor/profile'));
        }
        else
        {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('advisor/profile'));
        }
        
    }
    
    
    
    public function crop()
    {
        
        $data['croplist'] = $this->commonModel->allFetchd('far_crop_details', array('deleted' => 0,'crop_details_uid'=>$this->cusid), 'crop_details_id');
        // print_r($data['croplist']);exit;
        // $query=$this->db->getLastQuery();
        if (!empty($data['croplist'])) {
            $firstCropDetail = $data['croplist'][0];
            $cropname = $firstCropDetail->crop_details_name;
            $data['crop'] = $this->commonModel->allFetch('far_crop_type', array('croptype_id' => $cropname), 'croptype_id');
        } 
        
        return view('advisor/crop',$data);
        
    }
    
    public function addcrop()
    {
        $data['croplist']=$this->commonModel->allFetchd('far_crop_type',array(),'croptype_id');
        return view('advisor/addcrop',$data);
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
        $save['crop_details_seed_treatment']=$this->request->getVar('seed_treatment');
        $save['crop_details_cultivation_type']=$this->request->getVar('cultivation_type');
        $save['crop_details_seed_nashak']=$this->request->getVar('kharapatvaar_nashak');
        $save['crop_details_cultivation_method']=$this->request->getVar('cultivation_method');
        $save['crop_details_fertilizaion_name']=$this->request->getVar('fertilizer_name');
        $save['crop_details_fertilization_qty']=$this->request->getVar('fertilizer_quantity');
        $save['crop_details_water_supply']=$this->request->getVar('water_supply');
        $save['crop_details_water_resource']=$this->request->getVar('water_resource');
        $save['crop_details_seed_expenses']=$this->request->getVar('seed_expenses');
        $save['crop_details_fertilizers_expenses']=$this->request->getVar('fertilizers_expenses');
        $save['crop_details_land_preparation_expenses']=$this->request->getVar('land_preparation_expenses');
        $save['crop_details_approx_yield']=$this->request->getVar('approx_yield');
        $save['crop_details_approx_expenses']=$this->request->getVar('approx_expenses');
        $save['crop_details_uid']=$this->request->getVar('Uid');
        
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
        $savedata=$this->commonModel->insertData('far_crop_details',$save);
        if($savedata)
          {
              $this->session->setFlashdata('success', 'crop Added.');
              return redirect()->to(base_url('advisor/crop'));
          }
        else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('advisor/crop'));
          }
        
    }
    
    public function editcrops($id)
    {
        
        $data['datacrop']=$this->commonModel->fs('far_crop_details',array('crop_details_id'=>$id));
        $data['croplist']=$this->commonModel->allFetchd('far_crop_type',array(),'croptype_id');
        // print_r($data);exit;
        return view('advisor/edit-crop',$data);
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
        $save['crop_details_seed_treatment']=$this->request->getVar('seed_treatment');
        $save['crop_details_cultivation_type']=$this->request->getVar('cultivation_type');
        $save['crop_details_seed_nashak']=$this->request->getVar('kharapatvaar_nashak');
        $save['crop_details_cultivation_method']=$this->request->getVar('cultivation_method');
        $save['crop_details_fertilizaion_name']=$this->request->getVar('fertilizer_name');
        $save['crop_details_fertilization_qty']=$this->request->getVar('fertilizer_quantity');
        $save['crop_details_water_supply']=$this->request->getVar('water_supply');
        $save['crop_details_water_resource']=$this->request->getVar('water_resource');
        $save['crop_details_seed_expenses']=$this->request->getVar('seed_expenses');
        $save['crop_details_fertilizers_expenses']=$this->request->getVar('fertilizers_expenses');
        $save['crop_details_land_preparation_expenses']=$this->request->getVar('land_preparation_expenses');
        $save['crop_details_approx_yield']=$this->request->getVar('approx_yield');
        $save['crop_details_approx_expenses']=$this->request->getVar('approx_expenses');
        
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
              return redirect()->to(base_url('advisor/crop'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('advisor/edit-crop'));
          }
        
    }
    
    public function deletecrop()
    {
          $deleteId = $this->request->getVar('deleteId');
          
          $save = [
                'deleted' => 1, // Change 'status' field to the desired status value
            ];
          $del=$this->commonModel->updateData('far_crop_details',$save,array('crop_details_id'=>$deleteId));
        
          if($del)
          {
              $this->session->setFlashdata('success', 'Crop deleted.');
              return redirect()->to(base_url('advisor/crop'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('advisor/crop'));
          }
    }
    
    public function cropEnquiry()
    {
       $data['croplist'] = $this->commonModel->allFetchd('far_crop_details', array('deleted' => 0,'assign_to_advisor'=>$this->cusid), 'crop_details_id');
    //   $data['croplist'] = $this->commonModel->allFetchd('far_crop_details', array('deleted' => 0,'crop_details_uid'=>$this->cusid), 'crop_details_id');
        
        if (!empty($data['croplist'])) {
            $firstCropDetail = $data['croplist'][0];
            $cropname = $firstCropDetail->crop_details_name;
            $data['crop'] = $this->commonModel->allFetch('far_crop_type', array('croptype_id' => $cropname), 'croptype_id');
        }  
        
        // print_r($data);
        return view('advisor/crop-enquiry',$data);
    }
    
    public function viewChangePassword()
    {
        $data['seotitle']='Change Password | FarmEasy';
        $data['seodescription']='';
        $data['seokeyword']='';
        
        $teacherdetails=$this->commonModel->fs('far_customer_registration',array('cusid'=> $this->cusid));
        $data['oldpass']=$teacherdetails->password;
        return view('advisor/change-password',$data);
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
    
    public function logout()
    {
       session()->destroy();
       return redirect()->to(base_url('/'));
    }
}

?>