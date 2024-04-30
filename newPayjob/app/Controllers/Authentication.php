<?php

namespace App\Controllers;
use App\Models\CommonModel;
use CodeIgniter\I18n\Time;

class Authentication extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        helper('general');
        $this->commonModel = new CommonModel();
    }
    
    public function employerLogin()
    {
        $data['seotitle']='Employer Login | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        return view('auth/login-employer',$data);
    }
    public function candidateLogin()
    {
        $data['seotitle']='Candidate Login | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        
        return view('auth/login-candidate',$data);
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
        
        return view('auth/registration-candidate',$data);
    }
    public function employerFP()
    {
        $data['seotitle']='Forgot Password | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        
        
        return view('auth/fp-employer',$data);
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
                return redirect()->to(base_url('/'));
                
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
            $data['company_name']=$this->request->getVar('name');
            $data['company_email']=$this->request->getVar('email');
            $data['phone']=$this->request->getVar('mobile');
            $password=$this->request->getVar('password');
            $data['emppassword']= password_hash($password, PASSWORD_DEFAULT);
            $cpassword=$this->request->getVar('cpassword');
            $data['created_at']=Time::now()->format('Y-m-d H:i:s');
            
            // print_r($data);exit;
            $insertdata=$this->commonModel->insertData('companies',$data);
            if($insertdata)
            {
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
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
    
}
