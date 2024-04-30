<?php

namespace App\Controllers;
use App\Models\CommonModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Files\File;

class Authentication extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        helper('general');
        $this->commonModel = new CommonModel();
    }
    
    public function vendorLogin()
    {
        $data['seotitle']='Vendor Login | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        return view('auth/login-vendor',$data);
    }
    
    public function vendorReg()
    {
        $data['seotitle']='Vendor Registration | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        
        return view('auth/registration-vendor',$data);
    }
    
    public function employerLogin()
    {
        $data['seotitle']='Employer Login | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        
        if (session()->get('isLoggedInCand') ) {
            return redirect()->to(base_url('/'));
          }
          else
          {
              
        return view('auth/login-employer',$data);
          }
    }
    public function candidateLogin()
    {
        
        $data['seotitle']='Candidate Login | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        if (session()->get('isLoggedInCand')  ) {
            return redirect()->to(base_url('/'));
          }
          else
          {
         return view('auth/login-candidate',$data);
          }
    }
    public function employerReg()
    {
        $data['seotitle']='Employer Registration | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        
        return view('auth/registration-employer',$data);
    }
    public function candidateReg()
    {
        $data['seotitle']='Candidate Registration | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        if (session()->get('isLoggedInCand')  ) {
            return redirect()->to(base_url('/'));
          }
          else
          {
        return view('auth/registration-candidate',$data);
          }
    }
    public function employerFP()
    {
        $data['seotitle']='Forgot Password | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        
        
        return view('auth/fp-employer',$data);
    }
    public function vendorFP()
    {
        $data['seotitle']='Forgot Password | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        
        
        return view('auth/fp-vendor',$data);
    }
    
    public function candidateFP()
    {
        $data['seotitle']='Forgot Password | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        
        
        return view('auth/fp-candidate',$data);
    }
    
    public function storeCandidate()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'mobile' => 'required|numeric',
            'password' => 'required',
            'cpassword' => 'required',
        ];
        $uniquephone=[
            'mobile' => 'is_unique[users.mobile]',
        ];
        $uniqueemail=[
            'email' => 'is_unique[users.email]',
        ];
        $rulepass=[
            'cpassword' => 'matches[password]',
            ];
          
        if(!$this->validate($rules))
        {
            $this->session->setFlashdata('error', 'Please enter valid details.');
        }
        else if(!$this->validate($rulepass))
        {
            $this->session->setFlashdata('error', 'The passwords you entered do not match.');
        }
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
            $data['role']=$this->request->getVar('role');
            
            $password=$this->request->getVar('password');
            $data['password']= password_hash($password, PASSWORD_DEFAULT);
            $cpassword=$this->request->getVar('cpassword');
            $data['created_at']=Time::now()->format('Y-m-d H:i:s');
            
            // print_r($data);exit;
            $insertdata=$this->commonModel->insertData('users',$data);
            if($insertdata)
            {
                $this->session->setFlashdata('success', ' Registration Completed');
                return redirect()->to(base_url('candidate-login'));
            }
            else
            {
                $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
                return redirect()->to(base_url('candidate-registration'));
            }
        }
        
        return redirect()->to(base_url('candidate-registration'));
    }
    
    public function loginCandidate()
    {
        
          
        $email=$this->request->getVar('email');
        $password=$this->request->getVar('password');
        $job1Data=$this->request->getVar('job_url_id');
        // $referer = $this->request->getServer('HTTP_REFERER');
        
        $checkuser=$this->commonModel->fs('users',array('email'=>$email));
        
        if($checkuser)
        {
             $pass=$checkuser->password;
             $authenticatePassword = password_verify($password, $pass);
             if($authenticatePassword)
             {
                $ses_data = [
                    'canid' => $checkuser->id,
                    'canemail' => $checkuser->email,
                    'canrole' => $checkuser->role,
                    'isLoggedInCand' => TRUE
                ];
                $this->session->set($ses_data);
                
                $this->session->setFlashdata('success', 'Login Successfully.');
                if(empty($job1Data))
                {
                    return redirect()->to(base_url('candidate/profile'));
                }
                else
                {
                    // $previousUrl = str_replace(base_url(), '', $previousUrl);
                    
                    return redirect()->to($job1Data);
                    
                }
                
               
                // return redirect()->back();
             
                // return redirect()->back(2);
                // return redirect()->to(base_url('candidate/profile'));
             }
             else
            {
                $this->session->setFlashdata('error', 'Incorrect Password.');
                return redirect()->to(base_url('candidate-login'));
            }
        }
        else
        {
            $this->session->setFlashdata('error', 'Email id not registered');
            return redirect()->to(base_url('candidate-login'));
        }
        
    }
    

    
    
    public function forgotpasswordbyuser()
    {
        $email = \Config\Services::email();
        $eemail = $this->request->getVar('email');
        
        $checkuser = $this->commonModel->allCount('users', array('email' => $eemail));
        
        // Initialize session
        $session = session();
    
        // Check if user exists
        if ($checkuser == 0)
        {
            $session->setFlashdata('error', 'Email id not registered');
        }
        else
        {
            // Get user details
            $userdet = $this->commonModel->fs('users', array('email' => $eemail));
            $userid = $userdet->id;
            $encoded = base64_encode($userid);
            
            // Mail configuration
            $email->setFrom('alka.thakur2016@gmail.com', 'Pay Job India');
            $email->setTo($eemail); // Set the recipient email address
            
            $email->setSubject('Password Reset: Pay Job India');
    
            // Email message with HTML format
            $message = '<h2>Hello User</h2>
                        <h4><b>We received a request to reset the password</b></h4>
                        <br>
                        <p>Use this link below to set up a new password for your account. If you did not request to reset the password, ignore this email.</p>
                        <br>
                        <a href="' . base_url() . '/user-reset-password/' . $encoded . '" class="btn btn-success">Reset Password</a>
                        </div>';
            $email->setMessage($message);
           
            // Send email
            if ($email->send())
            {
                $session->setFlashdata('success', 'We have sent you a password reset link on email!');
            }
            else
            {
                $session->setFlashdata('error', 'Something went wrong. Try again later!');
            }
        }
    
        // Redirect to the candidate-forgot-password page after processing
        return redirect()->to('candidate-forgot-password');
    }
    
    public function userResetPassword($encoded)
    {
        $decoded = base64_decode($encoded);
        $data['userdata'] = $this->commonModel->fs('users', array('id' => $decoded));
        
        return view('auth/user-reset-password', $data);
       
    }
    
    
    public function updateResetPassworduser()
    {
        $rules = [
            'password' => 'required',
            'cpassword' => 'required|matches[password]',
        ];
    
        if (!$this->validate($rules)) {
            $this->session->setFlashdata('error', 'Please enter valid details.');
        } 
        else {
            $userid = $this->request->getVar('id');
            $password = $this->request->getVar('password');
    
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            
            // print_r($data);exit;
            $this->commonModel->updateData('users', $data, ['id' => $userid]);
    
            return redirect()->to('candidate-login');
        }
    }
    
    

    
    public function storeVendor()
    {
        $rules = [
            
            'name' => 'required',
            'email' => 'required|valid_email',
            'mobile' => 'required|numeric',
            'password' => 'required',
            'cpassword' => 'required',
        ];
        $uniquephone=[
            'mobile' => 'is_unique[vendor.phone]',
        ];
        $uniqueemail=[
            'email' => 'is_unique[vendor.email]',
        ];
        $rulepass=[
            'cpassword' => 'matches[password]',
            ];
          
        if(!$this->validate($rules))
        {
            $this->session->setFlashdata('error', 'Please enter valid details.');
        }
        else if(!$this->validate($rulepass))
        {
            $this->session->setFlashdata('error', 'The passwords you entered do not match.');
        }
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
            
            /*$profile = $this->request->getFile('image');
            if ($profile->isValid() && !$profile->hasMoved())
            {
                $newName = $profile->getRandomName();
                $profile->move('./back/assets/images/vendorlogo/', $newName); // Move the file to the 'uploads' directory
                if(!empty($newName))
                {
                    $data['logo']=$newName;
                }
            }*/
            $data['name']=$this->request->getVar('name');
            $data['email']=$this->request->getVar('email');
            $data['phone']=$this->request->getVar('mobile');
            $password=$this->request->getVar('password');
            $data['password']= password_hash($password, PASSWORD_DEFAULT);
            $cpassword=$this->request->getVar('cpassword');
            $data['created']=Time::now()->format('Y-m-d H:i:s');
            
            // print_r($data);exit;
            $insertdata=$this->commonModel->insertData('vendor',$data);
            // $inserted_id = $this->db->insert_id();
             
            if($insertdata)
            {
                 
                // $inserted_id = $insertdata;
                // $permissiondata=$this->commonModel->insertData('companies_Permission',['companyID'=>$inserted_id]);
                $this->session->setFlashdata('success', ' Registration Completed');
                return redirect()->to(base_url('vendor-login'));
            }
            else
            {
                $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
                return redirect()->to(base_url('vendor-registration'));
            }
        }
        
        return redirect()->to(base_url('vendor-registration'));
    }
    
    public function loginVendor()
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
                    // 'emptype' => $checkuser->type,
                    'isLoggedInVendo' => TRUE
                ];
                $this->session->set($ses_data);
                
                
                
                $this->session->setFlashdata('success', 'Login Successfully.');
                return redirect()->to(base_url('vendor/dashboard'));
             }
             else
            {
                $this->session->setFlashdata('error', 'Incorrect Password.');
                return redirect()->to(base_url('vendor-login'));
            }
        }
        else
        {
            $this->session->setFlashdata('error', 'Email id not registered');
            return redirect()->to(base_url('vendor-login'));
        }
        
    }
    
    public function forgotpasswordbyVendor()
    {
        $email = \Config\Services::email();
        $eeeemail = $this->request->getVar('vendoremail');
        
        $checkuser = $this->commonModel->allCount('vendor', array('email' => $eeeemail));
        
        // Initialize session
        $session = session();
    
        // Check if user exists
        if ($checkuser == 0)
        {
            $session->setFlashdata('error', 'Email id not registered');
        }
        else
        {
            // Get user details
            $userdet = $this->commonModel->fs('vendor', array('email' => $eeeemail));
            $userid = $userdet->id;
            $encoded = base64_encode($userid);
            // print_r($encoded);
            // exit;
            // Mail configuration
            $email->setFrom('alka.thakur2016@gmail.com', 'Pay Job India');
            $email->setTo($eeeemail); // Set the recipient email address
            
            $email->setSubject('Password Reset: Pay Job India');
    
            // Email message with HTML format
            $message = '<h2>Hello Vendor</h2>
                        <h4><b>We received a request to reset the password</b></h4>
                        <br>
                        <p>Use this link below to set up a new password for your account. If you did not request to reset the password, ignore this email.</p>
                        <br>
                        <a href="' . base_url() . '/vendor-reset-password/' . $encoded . '" class="btn btn-success">Reset Password</a>
                        </div>';
            $email->setMessage($message);
           
            // Send email
            if ($email->send())
            {
                $session->setFlashdata('success', 'We have sent you a password reset link on email!');
            }
            else
            {
                $session->setFlashdata('error', 'Something went wrong. Try again later!');
            }
        }
    
        // Redirect to the candidate-forgot-password page after processing
        return redirect()->to('/vendor-forgot-password');
    }
    
    public function vendorResetPassword($encoded)
    {
        $decoded = base64_decode($encoded);
        
        $data['userdata'] = $this->commonModel->fs('vendor', array('id' => $decoded));
        
        return view('auth/vendor-reset-password',$data);
    }
    
    public function updateResetPasswordvendor()
    {
        $rules = [
            'password' => 'required',
            'cpassword' => 'required|matches[password]',
        ];
    
        if (!$this->validate($rules)) {
            $this->session->setFlashdata('error', 'Please enter valid details.');
        } 
        else {
            $userid = $this->request->getVar('id');
            $password = $this->request->getVar('password');
    
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            
            // print_r($data);exit;
            $this->commonModel->updateData('vendor', $data, ['id' => $userid]);
    
            return redirect()->to('/vendor-login');
        }
    }
    
    
    public function storeEmployer()
    {
        $rules = [
            
            'name' => 'required',
            'email' => 'required|valid_email',
            'mobile' => 'required|numeric',
            'password' => 'required',
            'cpassword' => 'required',
        ];
        $uniquephone=[
            'mobile' => 'is_unique[companies.phone]',
        ];
        $uniqueemail=[
            'email' => 'is_unique[companies.company_email]',
        ];
        $rulepass=[
            'cpassword' => 'matches[password]',
            ];
          
        if(!$this->validate($rules))
        {
            $this->session->setFlashdata('error', 'Please enter valid details.');
        }
        else if(!$this->validate($rulepass))
        {
            $this->session->setFlashdata('error', 'The passwords you entered do not match.');
        }
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
            /*$profile = $this->request->getFile('image');
            if ($profile->isValid() && !$profile->hasMoved())
            {
                $newName = $profile->getRandomName();
                $profile->move('./back/assets/images/company_logo/', $newName); // Move the file to the 'uploads' directory
                if(!empty($newName))
                {
                    $data['logo']=$newName;
                }
            }*/
        
            $data['company_name']=$this->request->getVar('name');
            $data['company_email']=$this->request->getVar('email');
            $data['phone']=$this->request->getVar('mobile');
            $password=$this->request->getVar('password');
            $data['emppassword']= password_hash($password, PASSWORD_DEFAULT);
            $cpassword=$this->request->getVar('cpassword');
            $data['created_at']=Time::now()->format('Y-m-d H:i:s');
            
            // print_r($data);exit;
            $insertdata=$this->commonModel->insertData('companies',$data);
            // $inserted_id = $this->db->insert_id();
             
            if($insertdata)
            {
                 
                $inserted_id = $insertdata;
                $permissiondata=$this->commonModel->insertData('companies_Permission',['companyID'=>$inserted_id]);
                $this->session->setFlashdata('success', ' Registration Completed');
                return redirect()->to(base_url('employer-login'));
            }
            else
            {
                $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
                return redirect()->to(base_url('employer-registration'));
            }
        }
        
        return redirect()->to(base_url('employer-registration'));
    }
    
    public function loginEmployer()
    {
        $email=$this->request->getVar('email');
        $password=$this->request->getVar('password');
        $type=$this->request->getVar('type');
        
        $checkuser=$this->commonModel->fs('companies',array('company_email'=>$email));
        
        if($checkuser)
        {
             $pass=$checkuser->emppassword;
             $authenticatePassword = password_verify($password, $pass);
             if($authenticatePassword)
             {
                $ses_data = [
                    'empid' => $checkuser->id,
                    'empemail' => $checkuser->company_email,
                    // 'emptype' => $checkuser->type,
                    'isLoggedInEmpl' => TRUE
                ];
                $this->session->set($ses_data);
                
                
                
                $this->session->setFlashdata('success', 'Login Successfully.');
                return redirect()->to(base_url('company/dashboard'));
             }
             else
            {
                $this->session->setFlashdata('error', 'Incorrect Password.');
                return redirect()->to(base_url('employer-login'));
            }
        }
        else
        {
            $this->session->setFlashdata('error', 'Email id not registered');
            return redirect()->to(base_url('employer-login'));
        }
        
    }
    
    public function forgotpasswordbyEmployer()
    {
        $email = \Config\Services::email();
        $eeemail = $this->request->getVar('companyemail');
        
        $checkuser = $this->commonModel->allCount('companies', array('company_email' => $eeemail));
        
        // Initialize session
        $session = session();
    
        // Check if user exists
        if ($checkuser == 0)
        {
            $session->setFlashdata('error', 'Email id not registered');
        }
        else
        {
            // Get user details
            $userdet = $this->commonModel->fs('companies', array('company_email' => $eeemail));
            $userid = $userdet->id;
            $encoded = base64_encode($userid);
            // print_r($encoded);
            // exit;
            // Mail configuration
            $email->setFrom('alka.thakur2016@gmail.com', 'Pay Job India');
            $email->setTo($eeemail); // Set the recipient email address
            
            $email->setSubject('Password Reset: Pay Job India');
    
            // Email message with HTML format
            $message = '<h2>Hello Employer</h2>
                        <h4><b>We received a request to reset the password</b></h4>
                        <br>
                        <p>Use this link below to set up a new password for your account. If you did not request to reset the password, ignore this email.</p>
                        <br>
                        <a href="' . base_url() . '/company-reset-password/' . $encoded . '" class="btn btn-success">Reset Password</a>
                        </div>';
            $email->setMessage($message);
           
            // Send email
            if ($email->send())
            {
                $session->setFlashdata('success', 'We have sent you a password reset link on email!');
            }
            else
            {
                $session->setFlashdata('error', 'Something went wrong. Try again later!');
            }
        }
    
        // Redirect to the candidate-forgot-password page after processing
        return redirect()->to('/employer-forgot-password');
    }
    
    public function employerResetPassword($encoded)
    {
        $decoded = base64_decode($encoded);
        
        $data['userdata'] = $this->commonModel->fs('companies', array('id' => $decoded));
        
        return view('auth/company-reset-password',$data);
    }
    
    public function updateResetPasswordemployer()
    {
        $rules = [
            'password' => 'required',
            'cpassword' => 'required|matches[password]',
        ];
    
        if (!$this->validate($rules)) {
            $this->session->setFlashdata('error', 'Please enter valid details.');
        } 
        else {
            $userid = $this->request->getVar('id');
            $password = $this->request->getVar('password');
    
            $data['emppassword'] = password_hash($password, PASSWORD_DEFAULT);
            
            // print_r($data);exit;
            $this->commonModel->updateData('companies', $data, ['id' => $userid]);
    
            return redirect()->to('/employer-login');
        }
    }
    
    public function logout()
    {
        /*$asd = redirect()->to('/');
        $redirectUrl = $asd->getTargetUrl();
        
        // Now you can check the redirect URL
        echo $redirectUrl; 
                 exit;*/
        session()->destroy();
       return redirect()->to(base_url('/'));
        // return redirect()->to('/');
    }
    
}
