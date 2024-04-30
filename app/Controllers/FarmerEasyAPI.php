<?php

namespace App\Controllers;
use App\Models\CommonModel;
use CodeIgniter\I18n\Time;

class FarmerEasyAPI extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        helper('general');
        $this->commonModel = new CommonModel();
        $this->db = db_connect();
    }
    
    public function apischeme()
    {
        $data['scheme'] = $this->commonModel->allFetchd('far_scheme', array(), 'scheme_id');
        // You can return the $data as JSON
        return $this->response->setJSON($data);
    }
    
    public function apiblog()
    {
        $data['blog'] = $this->commonModel->allFetchd('far_blogs', array(), 'blogs_id');
        // You can return the $data as JSON
        return $this->response->setJSON($data);
    }
    
    public function apievent()
    {
        $data['events'] = $this->commonModel->allFetchd('far_events', array(), 'events_id');
        // You can return the $data as JSON
        return $this->response->setJSON($data);
    }
    
    public function apinews()
    {
        $data['news'] = $this->commonModel->allFetchd('far_news', array(), 'news_id');
        // You can return the $data as JSON
        return $this->response->setJSON($data);
    }
    
    public function apitraining()
    {
        $data['training'] = $this->commonModel->allFetchd('far_training', array(), 'train_id');
        // You can return the $data as JSON
        return $this->response->setJSON($data);
    }
    
    public function apicrop()
    {
        $cropQuery = $this->db->table('far_crop');
        $cropData = $cropQuery->get()->getResult();
    
        // Query to retrieve data from 'far_crop_type' based on 'crop_id'
        if (!empty($cropData) && isset($cropData[0]->crop_id)) {
            $croptypeQuery = $this->db->table('far_crop_type');
            $croptypeQuery->where('croptype_cropid', $cropData[0]->crop_id);
            $croptypeData = $croptypeQuery->get()->getResult();
        } else {
            $croptypeData = [];
        }
    
        // Combine the data into a single array
        $data = [
            'crop' => $cropData,
            'croptype' => $croptypeData,
        ];
        // You can return the $data as JSON
        return $this->response->setJSON($data);
    }
    
    public function apiproduct()
    {
        $data['product'] = $this->commonModel->allFetchd('far_product', array(), 'prod_id');
        // You can return the $data as JSON
        return $this->response->setJSON($data);
    }
    
    public function apiregister()
    {
        // Retrieve JSON data from the request
        $json = $this->request->getJSON();
        
        // Define validation rules
        $validationRules = [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|valid_email',
            'phone' => 'required|numeric',
            'state' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'profession' => 'required',
            'pincode' => 'required',
            'password' => 'required',
            'cpassword' => 'required',
        ];
        $uniquephone=[
            'phone' => 'is_unique[far_customer_registration.cusphone]',
        ];
        $uniqueemail=[
            'email' => 'is_unique[far_customer_registration.cusemail]',
        ];
        $rulepass=[
            'cpassword' => 'matches[password]',
            ];
        // Perform validation
        if (!$this->validate($validationRules)) {
            return $this->response->setJSON([
                'status' => 0,
                'msg' => 'Validation failed',
                'errors' => $this->validator->getErrors()
            ]);
        }

        // Check if email and phone are unique (you can use your model for this)
        

        if (!$uniqueemail) {
            return $this->response->setJSON([
                'status' => 0,
                'msg' => 'Email already registered'
            ]);
        }

        if (!$uniquephone) {
            return $this->response->setJSON([
                'status' => 0,
                'msg' => 'Phone number already registered'
            ]);
        }
        
        

        // Process the registration
        $registrationData = [
            'cusfname' => $json->fname,
            'cuslname' => $json->lname,
            'cusemail' => $json->email,
            'cusphone' => $json->phone,
            'cuscountry' => 0,
            'cusstate' => $json->state,
            'cuscity' => $json->city,
            'cusgender' => $json->gender,
            'cusprofession' => $json->profession,
            'cuspincode' => $json->pincode,
            'cuspassword' => password_hash($json->password, PASSWORD_DEFAULT),
          
        ];
        
        // $profile = $json->image;
        // if ($profile->isValid() && !$profile->hasMoved()) {
        //     $newName = $profile->getRandomName();
        //     $profile->move('./front/assets/img/user/avatar/', $newName);
        //     $registrationData['cusimage'] = $newName;
        // }
            
           
        
        // print_r($registrationData);exit;
        // $inserted = $this->db->table('far_customer_registration')->insert($registrationData);
        $inserted=$this->commonModel->insertData('far_customer_registration',$registrationData);

        if ($inserted) {
            return $this->response->setJSON([
                'status' => 1,
                'msg' => 'Registration successful'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 0,
                'msg' => 'Registration failed'
            ]);
        }
    
    }
    
    public function apiLogin()
    {
        $json = $this->request->getJSON();
        
        if (empty($json->email) || empty($json->password)) {
            return $this->response->setJSON([
                'status' => 0,
                'msg' => 'Email and password are required fields'
            ]);
        }
    
        $email = $json->email;
        $password = $json->password;
        
        $checkuser = $this->commonModel->fs('far_customer_registration', array('cusemail' => $email));
    
        if ($checkuser) {
            $pass = $checkuser->cuspassword;
            $authenticatePassword = password_verify($password, $pass);
    
            if ($authenticatePassword) {
                $ses_data = [
                    'cusid' => $checkuser->cusid,
                    'cusemail' => $checkuser->cusemail,
                    'cusprofession' => $checkuser->cusprofession,
                    'isLoggedIn' => TRUE
                ];
                $this->session->set($ses_data);
                
                // print_r($checkuser);exit;
                
                if ($checkuser->cusprofession == 'Seller') {
                    $response['msg'] = 'Seller Dashboard';
                } elseif ($checkuser->cusprofession == 'Farmer') {
                    $response['msg'] = 'Farmer Dashboard';
                } elseif ($checkuser->cusprofession == 'Adviser') {
                    $response['msg'] = 'Advisor Dashboard';
                }
            } else {
                $response['status'] = 0;
                $response['msg'] = 'Incorrect Password';
            }
        } else {
            $response['status'] = 0;
            $response['msg'] = 'Email ID not registered';
        }
    
        return $this->response->setJSON($response);
    }

    
}

?>