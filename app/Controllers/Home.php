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
        $this->canid = $this->session->get('canid');
        $this->db = \Config\Database::connect();
    }
    
    /*public function searchjobs()
    {
        
        // $data['state']=$this->commonModel->allFetchd('location_states',array('is_active'=>1));
        // $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1));
        
        $data['state'] = $this->commonModel->getStateList();
        $data['city'] = $this->commonModel->getCityList();

        // Get search parameters
        $jobTitle = $this->request->getGet('jobs');
        $stateId = $this->request->getGet('state');
        $cityId = $this->request->getGet('location');

        // Perform search
        $data['jobs'] = $this->commonModel->searchJobs($jobTitle, $cityId);
        // print_r($data);exit;
        return view('job_search', $data);
    }*/
    
    public function searchjobs()
    {
        $data['state'] = $this->commonModel->getStateList();
        $data['city'] = $this->commonModel->getCityList();
    
        // Get search parameters
        $jobTitle = $this->request->getGet('jobs');
        $cityId = $this->request->getGet('location');
        
        $resultArray = explode(',', $cityId);
        $cityname=$resultArray[0];
        $cityquery=$this->commonModel->fs('location_cities',array('name'=>$cityname));
        $cityId=$cityquery->id;
        
        
        // Perform search
        $data['jobs'] = $this->commonModel->searchJobs($jobTitle, $cityId);
        
        // print_r($cityId);exit
        return view('job_search', $data);
    }

    
    public function index()
    {
        $data['activemenu']='home';
        $data['home']=$this->commonModel->fs('pages',array('name'=>'Home'));
        $data['seotitle']=$data['home']->title;
        $data['seodesc']=$data['home']->description;
        $data['seokeywords']=$data['home']->keywords;
        $data['state']=$this->commonModel->allFetchd('location_states',array('is_active'=>1));
        $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1));
        $data['jobcate']=$this->commonModel->allFetch('job_category',array('is_active'=>1));
        
        $data['jobs']=$this->commonModel->allFetchd('jobs_list',array('is_active'=>1));
        
        $data['jobs1']=$this->commonModel->allFetchd('jobs_list',array('is_active'=>1,'is_featured'=>1));
        $data['jobs2']=$this->commonModel->allFetchd('jobs_list',array('is_active'=>1,'is_featured'=>1,'vacancy_type'=>2));
        $data['jobs3']=$this->commonModel->allFetchd('jobs_list',array('is_active'=>1,'is_featured'=>1,'work_mode'=>'remote'));
        
        
        $data['jobsave']=$this->commonModel->allFetchd('jobsave',array('userid'=>$this->canid));
        
        // print_r($data);exit;
        return view('index',$data);
    }
    
    public function careerleveljobs($slug)
    {
        $data['careerjobs']=$this->commonModel->fs('job_attributes_career_levels',array('is_active'=>1,'slug'=>$slug));
        // print_r($data);exit;
         return view('career-level-jobs',$data);
    }
    
    public function citywisejob($slug)
    {
        
        $data['state']=$this->commonModel->allFetchd('location_states',array('is_active'=>1));
        $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1));
        
        $data['jobscity1']=$this->commonModel->fs('location_cities',array('is_active'=>1,'slug'=>$slug));
        
        // print_r($data['jobscity1']);exit;
        return view('city-wise-job',$data);
    }
    
    public function about()
    {
        $data['activemenu']='about';
        $data['home']=$this->commonModel->fs('pages',array('name'=>'About'));
        $data['seotitle']=$data['home']->title;
        $data['seodesc']=$data['home']->description;
        $data['seokeywords']=$data['home']->keywords;
        // $data['seotitle']='About Us | Pay Job India &mdash; Best jobs placement provider and consultancy in India';
        // $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        // $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        return view('about',$data);
    }
    
    public function department()
    {
        
        $data['activemenu']='forcandidate';
        $data['department']=$this->commonModel->allFetch('job_category',array());
        
        $data['seotitle']=$data['home']->title;
        $data['seodesc']=$data['home']->description;
        $data['seokeywords']=$data['home']->keywords;
        // print_r($data['department']);exit;
        
        return view('category',$data);
    }
    
    public function functionalArea($slug)
    {
        
        $builder = $this->db->table('job_category');
        $builder->select('job_category.id as job_category_id,job_category.name as job_category_name,job_category.slug as job_category_slug, function_area.id as function_area_id,function_area.slug,function_area.name as function_area_name');
        $builder->join('function_area', 'function_area.job_cate_id = job_category.id', 'left');
        $builder->where('job_category.slug', $slug);
        $data['functional'] = $builder->get()->getResult();
        
        // $query = $this->db->getLastQuery();
        // echo $query;
    
        // Print the result for testing
        // print_r($data['functional']);exit; 
        
        return view('job-category',$data);
    }
    
    
    
    public function jobsbyfunctionalarea($slug)
    {
        // echo 'sdf';exit;
         $data['functional']=$this->commonModel->fs('function_area',array('slug'=>$slug));
         //  $data['careerlevel']=$this->commonModel->allFetchd('job_attributes_career_levels',array());
        //  print_r($data);exit;
        // $data['jobs']=$this->commonModel->allFetchd('jobs_list',array('is_active'=>1,'job_type_id'=>3));
        return view('jobs-by-functional-area',$data);
    }
    
    public function jobsbycareerlevel($slug)
    {
      $data['careerlevel']=$this->commonModel->fs('job_attributes_career_levels',array('slug'=>$slug));
    //   $query=$this->db->getLastQuery();
    //   print_r($query);exit;
       return view('jobs-by-career-level',$data);
    }
    
    public function cities()
    {
        
        $data['activemenu']='forcandidate';
        $data['cities']=$this->commonModel->allFetch('location_cities',array('is_active'=>1));
        
        $data['seotitle']=$data['home']->title;
        $data['seodesc']=$data['home']->description;
        $data['seokeywords']=$data['home']->keywords;
        // print_r($data['department']);exit;
        
        return view('cities',$data);
    }
    
    public function jobsbycity($slug)
    {
       $data['city']=$this->commonModel->fs('location_cities',array('slug'=>$slug));
    //   $query=$this->db->getLastQuery();
    //   print_r($query);exit;
       return view('jobs-by-city',$data);
    }
    
    public function internships()
    {
        $data['activemenu']='internships';
        $data['home']=$this->commonModel->fs('pages',array('name'=>'Intership'));
        $data['seotitle']=$data['home']->title;
        $data['seodesc']=$data['home']->description;
        $data['seokeywords']=$data['home']->keywords;
        // $data['seotitle']='Internship Jobs | Best jobs placement provider and consultancy in India';
        // $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        // $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        
        $data['state']=$this->commonModel->allFetchd('location_states',array('is_active'=>1));
        $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1));
        $data['jobs']=$this->commonModel->allFetchd('jobs_list',array('is_active'=>1,'job_type_id'=>3));
        return view('internships',$data);
    }
    
    public function contact()
    {
        $data['home']=$this->commonModel->fs('pages',array('name'=>'Contact Us'));
        $data['seotitle']=$data['home']->title;
        $data['seodesc']=$data['home']->description;
        $data['seokeywords']=$data['home']->keywords;
        // $data['seotitle']='Contact Pay Job India &mdash; Best jobs placement provider and consultancy in India';
        // $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        // $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        return view('contact',$data);
    }
    public function jobs()
    {
        $data['seotitle']='Jobs | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        $data['state']=$this->commonModel->allFetchd('location_states',array('is_active'=>1));
        $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1));
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
    public function job1($slug)
    {
        $data['seotitle']='Job title | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        // $data['state']=$this->commonModel->allFetchd('location_states',array('is_active'=>1));
        // $data['city']=$this->commonModel->allFetch('location_cities',array('is_active'=>1));
        // $data['jobs']=$this->commonModel->fs('jobs_list',array('slug'=>$slug));
        $data['job']=$this->commonModel->fs('jobs_list',array('slug'=>$slug));
        // print_r($data['jobs']);exit;
        
        
         $data['gender1']=$this->commonModel->allFetchd('job_attributes_genders',array()); 
        $data['degree']=$this->commonModel->allFetch('job_attributes_degree_levels',array()); 
        $data['degreetype']=$this->commonModel->allFetch('job_attributes_degree_types',array()); 
        $data['jobcate']=$this->commonModel->allFetch('job_category',array()); 
        $data['function_area']=$this->commonModel->allFetch('function_area',array()); 
        $data['careerlevel1']=$this->commonModel->allFetch('job_attributes_career_levels',array()); 
        $data['exp']=$this->commonModel->allFetch('job_attributes_job_experiences',array()); 
        $data['country']=$this->commonModel->allFetch('location_countries',array('is_active'=>1)); 
        $data['state']=$this->commonModel->allFetch('location_states',array());
        $data['city1']=$this->commonModel->allFetch('location_cities',array());
        
        return view('job1',$data);
    }
    
    public function applyjob()
    {
        $userid=$this->request->getVar('userid');
        $jobid=$this->request->getVar('jobid');
        $companyid=$this->request->getVar('companyid');
        $vendorid=$this->request->getVar('vendorid');
        $slug=$this->request->getVar('slug');
        
        $profile1 = $this->request->getFile('resume');
        if ($profile1->isValid() && !$profile1->hasMoved())
        {
            $newName1 = $profile1->getRandomName();
            $profile1->move('./back/assets/images/userResume/', $newName1); // Move the file to the 'uploads' directory
            if(!empty($newName1))
            {
                $save['resume_pdf']=$newName1;
            }
        }
        
        /*$checkapplyjob = $this->commonModel->allFetch('job_applicants', ['job_id' => $jobid, 'user_id' => $userid]);
        if (!empty($checkjob)) 
        {
            $this->session->setFlashdata('error', 'Already Applied');
            // return $this->response->setJSON(['status' => 401, 'msg' => 'This Job is already in Bookmark.']);
        }
        else
        {*/
        
        $save['user_id']=$userid;
        $save['job_id']=$jobid;
        $save['company_id']=$companyid;
        $save['vendorid']=$vendorid;
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
        
        // }  
          return redirect()->to(base_url('job1/'.$slug));
        //   return redirect()->to(base_url('superadmin/add-scheme'));
        
    }
    
    public function blogs()
    {
        $data['seotitle']='Blogs | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        $data['bloglist'] = $this->commonModel->allFetch('blog',array());
        // print_r($data);exit;
        return view('blogs',$data);
    }
    public function blog($slug)
    {
        $data['seotitle']='Blogs title | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        $data['bloglist'] = $this->commonModel->fs('blog',array('slug'=>$slug));
        $data['bloglist1'] = $this->commonModel->allFetchd('blog',array());
        // print_r($data['bloglist']);exit;
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
    
    public function jobsavebyuser()
    {
        $JobID = $this->request->getVar('JobID');
        $userId = $this->request->getVar('userId');
    
        $save['jobid'] = $JobID;
        $save['userid'] = $userId;
    
        $checkjob = $this->commonModel->allFetch('jobsave', ['jobid' => $JobID, 'userid' => $userId]);
    
        if (!empty($checkjob)) {
            $this->session->setFlashdata('error', 'This Job is already in Bookmark.');
            return $this->response->setJSON(['status' => 401, 'msg' => 'This Job is already in Bookmark.']);
        } else {
            $savedata = $this->commonModel->insertData('jobsave', $save);
    
            if (!empty($savedata)) {
                $this->session->setFlashdata('success', 'Job Added To Bookmark');
                return $this->response->setJSON(['status' => 200, 'msg' => 'Job Added To Bookmark']);
            } else {
                $this->session->setFlashdata('error', 'Something went wrong. Job not added to bookmark.');
                return $this->response->setJSON(['status' => 401, 'msg' => 'Something went wrong. Job not added to bookmark.']);
            }
        }
    }

    
    
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
    
}
