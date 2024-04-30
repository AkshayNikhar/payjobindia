<?php

namespace App\Controllers;
use App\Models\CommonModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Files\File;

class Candidate extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        helper('general');
        $this->commonModel = new CommonModel();
        $this->canid = $this->session->get('canid');
        // print_r($this->canid);exit;
    }
    
    public function dashboard()
    {
        $data['activemenu']='candidashboard';
        $data['seotitle']='Candidate Dashboard | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        // return view('dashboard',$data);
        $data['totalapplied']=$this->commonModel->allCount('job_applicants',array('user_id'=>$this->canid));
        $data['totalsave']=$this->commonModel->allCount('jobsave',array('userid'=>$this->canid));
        // print_r($data);exit;
        return view('candidate/dashboard',$data);
    }
    public function profile()
    {
        $data['activemenu']='candiprofile';
        $data['seotitle']='Profile | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        
        $data['gender']=$this->commonModel->allFetchd('job_attributes_genders',array()); 
        $data['degree']=$this->commonModel->allFetch('job_attributes_degree_levels',array()); 
        $data['degreetype']=$this->commonModel->allFetch('job_attributes_degree_types',array()); 
        $data['jobcate']=$this->commonModel->allFetch('job_category',array()); 
        $data['function_area']=$this->commonModel->allFetch('function_area',array()); 
        $data['careerlevel']=$this->commonModel->allFetch('job_attributes_career_levels',array()); 
        $data['exp']=$this->commonModel->allFetch('job_attributes_job_experiences',array()); 
        $data['country']=$this->commonModel->allFetch('location_countries',array('is_active'=>1)); 
        $data['state']=$this->commonModel->allFetch('location_states',array());
        $data['city']=$this->commonModel->allFetch('location_cities',array());
        return view('candidate/profile',$data);
    }
    public function appliedJob()
    {
        $data['activemenu']='candiappliedjob';
        $data['seotitle']='Applied Job | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        $data['jobapplied']=$this->commonModel->allFetchd('job_applicants',array('user_id'=>$this->canid));
        // print_r($data['jobapplied']);exit;
        return view('candidate/applied-job',$data);
    }
    public function savedJob()
    {
        $data['activemenu']='candisavedjob';
        $data['seotitle']='Saved Job | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        $data['jobsave']=$this->commonModel->allFetchd('jobsave',array('userid'=>$this->session->get('canid')));
        // print_r($data);exit;
        return view('candidate/saved-job',$data);
    }
    public function setting()
    {
        $data['activemenu']='candisetting';
        $data['seotitle']='Setting | Best jobs placement provider and consultancy in India';
        $data['seodesc']='Best jobs placement provider and consultancy in India | Find job online and get hired in top companies. Search Job, Create Resume &amp; Apply with Pay Job India.';
        $data['seokeywords']='Job, Jobs, Job near me, jobs search near me, work from home jobs, job alert, careers, remote jobs, job vacancy, hiring near me, employment, jobs hiring, best paying jobs, remote jobs near me, Naukri, job listings near me, fast jobs, online jobs, target careers, top jobs, job consultancy, Best placement agency,  job search, job seeker, high paying jobs, hiring, recruitment, paying jobs, part time work from home jobs, remote work, onsite work, hybrid, work from home, full time jobs, bank jobs, part time job, job opening websites, career opportunity, work search, job opportunities, job sites, work india, find jobs,  job employment websites, career websites for jobs, career jobs, job openings, Internship, recruiting websites, private job vacancy, freelance jobs,  paid internships,  job vacancy for freshers, latest vacancies, job apply, job openings near me, job openings, work from home internships, free job, naukri jobs, data scientist jobs, work from home jobs for students, female job vacancy near me, teaching vacancies, work from home, jobs for women, new jobs, application for employment, Hr jobs, employment agency near me, job recruitment, office work, marketing jobs, best jobs, best work from home jobs, engineering jobs, startup jobs, part time work, mba jobs, work from home jobs for female, writing jobs, work near me, post office jobs, typing jobs from home, hiring manager, software testing jobs, web developer jobs, hotel jobs, sales jobs, accounting jobs, tech jobs, office jobs, job IT';
        return view('candidate/setting',$data);
    }
    
    public function editProfileCandidateSubmit()
    {
        $id=$this->request->getVar('id');
        $name=$this->request->getVar('name');
        $email=$this->request->getVar('email');
        $mobile=$this->request->getVar('mobile');
        $gender_id=$this->request->getVar('gender_id');
        $education=$this->request->getVar('education');
        $degree_type_id=$this->request->getVar('degree_type_id');
        $functional_area_id=$this->request->getVar('functional_area_id');
        $career_level_id=$this->request->getVar('career_level_id');
        $experience=$this->request->getVar('experience');
        $technical_skills=$this->request->getVar('technical_skills');
        $country_id=$this->request->getVar('country_id');
        $state=$this->request->getVar('state');
        $city=$this->request->getVar('city');
        $address=$this->request->getVar('address');
        $description=$this->request->getVar('description');
        $jobcateid=$this->request->getVar('jobcate_id');
        
        $profile = $this->request->getFile('image');
        if ($profile->isValid() && !$profile->hasMoved())
        {
            $newName = $profile->getRandomName();
            $profile->move('./back/assets/images/userProfile/', $newName); // Move the file to the 'uploads' directory
            if(!empty($newName))
            {
                $save['image']=$newName;
            }
        }
        
        $profile1 = $this->request->getFile('resume');
        if ($profile1->isValid() && !$profile1->hasMoved())
        {
            $newName1 = $profile1->getRandomName();
            $profile1->move('./back/assets/images/userResume/', $newName1); // Move the file to the 'uploads' directory
            if(!empty($newName1))
            {
                $save['resume']=$newName1;
            }
        }
        
        $save['name']=$name;
        $save['slug']=preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($name));
        $save['email']=$email;
        $save['mobile']=$mobile;
        $save['gender_id']=$gender_id;
        $save['education']=$education;
        $save['degree_type_id']=$degree_type_id;
        $save['functional_area_id']=$functional_area_id;
        $save['careerlevel_id']=$career_level_id;
        $save['experience']=$experience;
        $save['technical_skills']=$technical_skills;
        $save['country_id']=$country_id;
        $save['state']=$state;
        $save['address']=$address;
        $save['description']=$description;
        $save['jobcate_id']=$jobcateid;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        // $savedata=$this->commonModel->insertData('companies',$save);
        $savedata=$this->commonModel->updateData('users',$save,array('id'=>$id));
        
        if($savedata)
          {
            $this->session->setFlashdata('success', 'Profile Update.');
            return redirect()->to(base_url('candidate/profile'));
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('candidate/profile'));
          }
          return redirect()->to(base_url('candidate/profile'));
    }
    
    public function editProfileCandidateSubmit2()
    {
        $id=$this->request->getVar('id');
        $gender_id=$this->request->getVar('gender_id');
        $education=$this->request->getVar('education');
        $degree_type_id=$this->request->getVar('degree_type_id');
        $functional_area_id=$this->request->getVar('functional_area_id');
        $career_level_id=$this->request->getVar('career_level_id');
        $experience=$this->request->getVar('experience');
        $technical_skills=$this->request->getVar('technical_skills');
        $country_id=$this->request->getVar('country_id');
        $state=$this->request->getVar('state');
        $city1=$this->request->getVar('city1');
        $address=$this->request->getVar('address');
        $description=$this->request->getVar('description');
        $jobcateid=$this->request->getVar('jobcate_id');
        
        $profile = $this->request->getFile('image');
        if ($profile->isValid() && !$profile->hasMoved())
        {
            $newName = $profile->getRandomName();
            $profile->move('./back/assets/images/userProfile/', $newName); // Move the file to the 'uploads' directory
            if(!empty($newName))
            {
                $save['image']=$newName;
            }
        }
        
        $profile1 = $this->request->getFile('resume');
        if ($profile1->isValid() && !$profile1->hasMoved())
        {
            $newName1 = $profile1->getRandomName();
            $profile1->move('./back/assets/images/userResume/', $newName1); // Move the file to the 'uploads' directory
            if(!empty($newName1))
            {
                $save['resume']=$newName1;
            }
        }
        
        $save['gender_id']=$gender_id;
        $save['education']=$education;
        $save['degree_type_id']=$degree_type_id;
        $save['functional_area_id']=$functional_area_id;
        $save['careerlevel_id']=$career_level_id;
        $save['experience']=$experience;
        $save['technical_skills']=$technical_skills;
        $save['country_id']=$country_id;
        $save['state']=$state;
        $save['city']=$city1;
        $save['address']=$address;
        $save['description']=$description;
        $save['jobcate_id']=$jobcateid;
        $save['updated_at']=Time::now()->format('Y-m-d H:i:s');
        
        // print_r($save);exit;
        // $savedata=$this->commonModel->insertData('companies',$save);
        $savedata=$this->commonModel->updateData('users',$save,array('id'=>$id));
        
        if($savedata)
          {
              $sav['user_id']=$userid=$this->request->getVar('userid');
              $sav['job_id']=$jobid=$this->request->getVar('jobid');
              $sav['company_id']=$companyid=$this->request->getVar('companyid');
              $sav['vendorid']=$vendorid=$this->request->getVar('vendorid');
              $slug=$this->request->getVar('slug');
              $sav['created_at']=Time::now()->format('Y-m-d H:i:s');
               $savedata1=$this->commonModel->insertData('job_applicants',$sav);
            if($savedata1)
          {
            $this->session->setFlashdata('success', 'Applied to Job Successfully.');
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
          }
        
        // }  
          return redirect()->to(base_url('job1/'.$slug));
          }
        else
          {
            $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
            return redirect()->to(base_url('candidate/profile'));
          }
          return redirect()->to(base_url('candidate/profile'));
    }
    
    public function deletesavejob()
    {
          $deleteId = $this->request->getVar('deleteId');
        //   print_r($deleteId);exit;
          $del=$this->commonModel->deleteData('jobsave',array('id'=>$deleteId));
        //   $del=$this->commonModel->deleteData('jobsave',array('id'=>$deleteId));
          if($del)
          {
              $this->session->setFlashdata('success', 'Remove Job Successfull.');
              return redirect()->to(base_url('candidate/saved-jobs'));
          }
          else
          {
              $this->session->setFlashdata('error', 'Something went wrong. Try again later.');
              return redirect()->to(base_url('candidate/saved-jobs'));
          }
    }
    
}
