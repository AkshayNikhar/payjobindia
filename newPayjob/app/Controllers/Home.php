<?php

namespace App\Controllers;
use App\Models\CommonModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Files\File;

class Home extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        helper('general');
        $this->commonModel = new CommonModel();
    }
    
    public function index()
    {
        $data['activemenu']='home';
        $data['seotitle']='Pay Job India &mdash; Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        $data['jobs']=$this->commonModel->allFetchd('jobs_list',array('is_active'=>1));
        // print_r($data['jobs']);exit;
        return view('index',$data);
    }
    public function about()
    {
        $data['activemenu']='about';
        $data['seotitle']='About Us | Pay Job India &mdash; Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        return view('about',$data);
    }
    public function internships()
    {
        $data['activemenu']='internships';
        $data['seotitle']='Internship Jobs | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        return view('internships',$data);
    }
    public function contact()
    {
        $data['seotitle']='Contact Pay Job India &mdash; Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        return view('contact',$data);
    }
    public function jobs()
    {
        $data['seotitle']='Jobs | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        $data['jobs']=$this->commonModel->allFetchd('jobs_list',array('is_active'=>1));
        return view('jobs',$data);
    }
    public function job($slug)
    {
        $data['seotitle']='Job title | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        $data['job']=$this->commonModel->fs('jobs_list',array('slug'=>$slug));
        // print_r($data['jobs']);exit;
        return view('job',$data);
    }
    
    public function applyjob()
    {
        $userid=$this->request->getVar('userid');
        $jobid=$this->request->getVar('jobid');
        $slug=$this->request->getVar('slug');
        
         $profile1 = $this->request->getFile('resume');
        if ($profile1->isValid() && !$profile1->hasMoved())
        {
            $newName1 = $profile1->getRandomName();
            $profile1->move('./back/assets/images/userResume/', $newName); // Move the file to the 'uploads' directory
            if(!empty($newName1))
            {
                $save['resume_pdf']=$newName1;
            }
        }
        
        $save['user_id']=$userid;
        $save['job_id']=$jobid;
        $save['created_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        $savedata=$this->commonModel->insertData('job_applicants',$save);
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Apply Job Successfully.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
          
          return redirect()->to(base_url('/job/'.$slug));
        //   return redirect()->to(base_url('superadmin/add-scheme'));
        
    }
    
    public function blogs()
    {
        $data['seotitle']='Blogs | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        return view('blogs',$data);
    }
    public function blog()
    {
        $data['seotitle']='Blogs title | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        return view('blog',$data);
    }
    public function privacyPolicy()
    {
        $data['seotitle']='Privacy Policy | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        return view('privacy-policy',$data);
    }
    public function termsConditions()
    {
        $data['seotitle']='Terms and Conditions | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        return view('terms-conditions',$data);
    }
    public function refundPolicy()
    {
        $data['seotitle']='Refund Policy | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        return view('refund-policy',$data);
    }
    public function companyDetails($comapnyurl)
    {
        $data['seotitle']='Company Name | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        return view('company-details',$data);
    }
    
    
    
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
    
}
