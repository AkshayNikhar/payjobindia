<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed. 
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');
$routes->get('internships', 'Home::internships');
$routes->get('contact', 'Home::contact');
$routes->get('jobs', 'Home::jobs');
// $routes->get('job', 'Home::job');
$routes->get('job/(:any)', 'Home::job/$1');
$routes->get('job1/(:any)/', 'Home::job1/$1');
$routes->post('/applyjob', 'Home::applyjob');
$routes->get('blogs', 'Home::blogs');
// $routes->get('blog', 'Home::blog');
$routes->get('blog-details/(:any)', 'Home::blog/$1');
$routes->get('privacy-policy', 'Home::privacyPolicy');
$routes->get('terms-conditions', 'Home::termsConditions');
$routes->get('refund-policy', 'Home::refundPolicy');
$routes->get('company-profile/(:any)', 'Home::companyDetails/$1');

$routes->post('/jobs-save-by-user', 'Home::jobsavebyuser'); 

$routes->get('job_search', 'Home::searchjobs');

$routes->get('city-wise-job/(:any)', 'Home::citywisejob/$1');


$routes->get('category', 'Home::department');
$routes->get('career-level-jobs/(:any)', 'Home::careerleveljobs/$1');
$routes->get('job-category/(:any)', 'Home::functionalArea/$1');
$routes->get('jobs-by-functional-area/(:any)/(:any)', 'Home::jobsbyfunctionalarea/$2/$1');
$routes->get('jobs-by-career-level/(:any)/(:any)/(:any)', 'Home::jobsbycareerlevel/$3/$1/$2');

$routes->get('cities', 'Home::cities');
$routes->get('job-by-city/(:any)', 'Home::jobsbycity/$1');
 
// LOGIN & LOGOUT
$routes->get('/vendor-login', 'Authentication::vendorLogin');
$routes->post('/login-vendor', 'Authentication::loginVendor');

$routes->get('/vendor-registration', 'Authentication::vendorReg');
$routes->post('store-vendor', 'Authentication::storeVendor');

$routes->get('/employer-login', 'Authentication::employerLogin');
$routes->post('/login-employer', 'Authentication::loginEmployer');

$routes->get('/candidate-login', 'Authentication::candidateLogin');
$routes->post('/login-candidate', 'Authentication::loginCandidate');

$routes->get('/employer-registration', 'Authentication::employerReg');
$routes->post('store-employer', 'Authentication::storeEmployer');

$routes->get('/candidate-registration', 'Authentication::candidateReg');
$routes->post('store-candidate', 'Authentication::storeCandidate');

$routes->get('/employer-forgot-password', 'Authentication::employerFP');
$routes->get('/candidate-forgot-password', 'Authentication::candidateFP');
$routes->get('/vendor-forgot-password', 'Authentication::vendorFP');

$routes->post('/forgot-password-by-user', 'Authentication::forgotpasswordbyuser');
$routes->get('/user-reset-password/(:any)', 'Authentication::userResetPassword/$1');
$routes->post('/password-reset-by-user', 'Authentication::updateResetPassworduser');

$routes->post('/forgot-password-by-employer', 'Authentication::forgotpasswordbyEmployer');
$routes->get('/company-reset-password/(:any)', 'Authentication::employerResetPassword/$1');
$routes->post('/password-reset-by-employer', 'Authentication::updateResetPasswordemployer');

$routes->post('/forgot-password-by-vendor', 'Authentication::forgotpasswordbyVendor');
$routes->get('/vendor-reset-password/(:any)', 'Authentication::vendorResetPassword/$1');
$routes->post('/password-reset-by-vendor', 'Authentication::updateResetPasswordvendor');

$routes->get('logout', 'Authentication::logout');

// CANDIDATE DASHBOARD ROUTING START 
$routes->get('candidate/dashboard', 'Candidate::dashboard');
$routes->get('candidate/profile', 'Candidate::profile');
$routes->get('candidate/applied-jobs', 'Candidate::appliedJob');
$routes->get('candidate/saved-jobs', 'Candidate::savedJob');
$routes->get('candidate/setting', 'Candidate::setting');
$routes->post('candidate/edit-candidate-profile', 'Candidate::editProfileCandidateSubmit');
$routes->post('candidate/edit-candidate-profile2', 'Candidate::editProfileCandidateSubmit2');
$routes->post('candidate/delete-save-job', 'Candidate::deletesavejob');
// CANDIDATE DASHBOARD ROUTING END

// Common
$routes->get('get-stateid-by-countryid/(:any)', 'Common::getStateIdByCountryId/$1');
$routes->get('get-cityid-by-stateid/(:any)', 'Common::getCityIdByStateId/$1');
$routes->get('get-functionid-by-jobcateid/(:any)', 'Common::getFunctionIdByJobcateId/$1');
$routes->get('get-careerlevelid-by-functionareaid/(:any)', 'Common::getCareerlevelidByFunctionareaid/$1');
$routes->get('get-educationid-by-degreelevelid/(:any)', 'Common::getEducationidByDegreeLevelid/$1');
$routes->get('get-job-category-byid/(:any)', 'Common::getjobcategorybyid/$1');

// Company Dashboard Start
$routes->get('company/dashboard', 'CompanyController::dashboard',['filter' => 'employerlogin']);
$routes->get('company/profile', 'CompanyController::profile',['filter' => 'employerlogin']);
$routes->post('company/edit-profile', 'CompanyController::editProfileSubmit',['filter' => 'employerlogin']);

$routes->get('company/job-applicant', 'CompanyController::companyjobapplicant',['filter' => 'employerlogin']);

$routes->get('company/jobs-post-view/(:any)', 'CompanyController::jobspostview/$1',['filter' => 'employerlogin']);

$routes->get('company/view-candidate-job-applicant/(:any)', 'CompanyController::viewcandidatejobapplicant/$1',['filter' => 'employerlogin']);

$routes->get('company/edit-company-job-applicant/(:any)', 'CompanyController::editcompanyjobaplicant/$1',['filter' => 'employerlogin']);
$routes->post('company/edit-company-job-applicant', 'CompanyController::editcompanyjobaplicant1',['filter' => 'employerlogin']);


$routes->get('company/change-status-jobss/(:num)/(:num)', 'CompanyController::changestatusjobss/$1/$2',['filter' => 'employerlogin']);

$routes->get('company/change-password', 'CompanyController::viewChangePassword',['filter' => 'employerlogin']);
$routes->post('company/reset-password', 'CompanyController::resetPassword',['filter' => 'employerlogin']);

//jobs
$routes->get('company/view-jobs', 'CompanyController::jobs',['filter' => 'employerlogin']);
$routes->get('company/post-jobs', 'CompanyController::addjobs',['filter' => 'employerlogin']);
$routes->post('company/create-jobs', 'CompanyController::jobsSubmit',['filter' => 'employerlogin']);
$routes->get('company/edit-post-jobs/(:any)', 'CompanyController::editjobspost/$1',['filter' => 'employerlogin']);
$routes->post('company/edit-post-jobs', 'CompanyController::editjobspost1',['filter' => 'employerlogin']);
$routes->post('company/delete-jobs', 'CompanyController::deletejobs',['filter' => 'employerlogin']); 
$routes->get('company/view-post-jobs/(:any)', 'CompanyController::viewpostjobs/$1',['filter' => 'employerlogin']);
$routes->get('company/view-post-jobs1/(:any)', 'CompanyController::viewpostjobs1/$1',['filter' => 'employerlogin']);

// Company Dashboard End

// Consultant Dashboard Start

$routes->get('consultant/', 'ConsultantController::index');
$routes->match(['get', 'post'], 'consultant/loginAuth', 'ConsultantController::loginAuth');

$routes->get('consultant/dashboard', 'ConsultantController::dashboard');
/*$routes->get('consultant/profile', 'ConsultantController::profile');
$routes->post('consultant/edit-profile', 'ConsultantController::editProfileSubmit');

$routes->get('consultant/job-applicant', 'ConsultantController::companyjobapplicant');
$routes->get('consultant/jobs-post-view/(:any)', 'ConsultantController::jobspostview/$1');
$routes->get('consultant/view-candidate-job-applicant/(:any)', 'ConsultantController::viewcandidatejobapplicant/$1');

$routes->get('consultant/edit-company-job-applicant/(:any)', 'ConsultantController::editcompanyjobaplicant/$1');
$routes->post('consultant/edit-company-job-applicant', 'ConsultantController::editcompanyjobaplicant1');*/

$routes->get('consultant/change-status-jobss/(:num)/(:num)', 'ConsultantController::changestatusjobss/$1/$2');
$routes->get('consultant/change-password', 'ConsultantController::viewChangePassword');
$routes->post('consultant/reset-password', 'ConsultantController::resetPassword');

//Companies
$routes->get('consultant/all-company', 'ConsultantController::companies');
$routes->get('consultant/add-company', 'ConsultantController::addcompanies');
$routes->post('consultant/create-company', 'ConsultantController::storecompanies');
$routes->get('consultant/edit-company/(:any)', 'ConsultantController::editcompanies/$1');
$routes->post('consultant/edit-company', 'ConsultantController::editcompanies1');
$routes->post('consultant/delete-company', 'ConsultantController::deletecompanies');
$routes->get('consultant/total-company-jobs/(:any)', 'ConsultantController::totalcompanyjob/$1');
$routes->get('consultant/view-company/(:any)', 'ConsultantController::viewcompanies/$1');


//Candidate
$routes->get('consultant/all-user', 'ConsultantController::candidate');
$routes->get('consultant/add-user', 'ConsultantController::addcandidate');
$routes->post('consultant/create-user', 'ConsultantController::storecandidate');
$routes->get('consultant/edit-user/(:any)', 'ConsultantController::editcandidate/$1');
$routes->post('consultant/edit-user', 'ConsultantController::editcandidate1');
$routes->post('consultant/delete-user', 'ConsultantController::deletecandidate');
$routes->get('consultant/view-user/(:any)', 'ConsultantController::viewcandidate/$1');

//Job Post
/*$routes->get('consultant/all-jobs', 'ConsultantController::jobslist');
$routes->get('consultant/add-jobs', 'ConsultantController::addjobs');
$routes->post('consultant/create-jobs', 'ConsultantController::storejobs');
$routes->get('consultant/edit-jobs/(:any)', 'ConsultantController::editjobs/$1');
$routes->post('consultant/edit-jobs', 'ConsultantController::editjobs1');
$routes->post('consultant/delete-jobs', 'ConsultantController::deletejobs');
$routes->get('consultant/view-jobs/(:any)', 'ConsultantController::viewjobs/$1');
$routes->post('consultant/generateImage', 'ConsultantController::generateImage');*/

//jobs
$routes->get('consultant/view-jobs', 'ConsultantController::jobs');
$routes->get('consultant/post-jobs', 'ConsultantController::addjobs');
$routes->post('consultant/create-jobs', 'ConsultantController::jobsSubmit');
$routes->get('consultant/edit-post-jobs/(:any)', 'ConsultantController::editjobspost/$1');
$routes->post('consultant/edit-post-jobs', 'ConsultantController::editjobspost1');
$routes->post('consultant/delete-jobs', 'ConsultantController::deletejobs'); 
$routes->get('consultant/view-post-jobs/(:any)', 'ConsultantController::viewpostjobs/$1');
$routes->get('consultant/view-post-jobs1/(:any)', 'ConsultantController::viewpostjobs1/$1');


// Applied Job
$routes->get('consultant/all-applied-jobs', 'ConsultantController::appliedjobslist');
$routes->get('consultant/view-job-list/(:any)', 'ConsultantController::viewjoblist/$1');
$routes->get('consultant/jobs-count-list/(:any)', 'ConsultantController::jobscountlist/$1');
$routes->get('consultant/applied-jobs-count/(:any)', 'ConsultantController::appliedjobscount/$1');
$routes->get('consultant/change-status-job/(:num)/(:num)', 'ConsultantController::changestatusjob/$1/$2');


//Country
$routes->get('consultant/all-country', 'ConsultantController::country');
$routes->get('consultant/add-country', 'ConsultantController::addcountry');
$routes->post('consultant/create-country', 'ConsultantController::storecountry');
$routes->get('consultant/edit-country/(:any)', 'ConsultantController::editcountry/$1');
$routes->post('consultant/edit-country', 'ConsultantController::editcountry1');
$routes->post('consultant/delete-country', 'ConsultantController::deletecountry');

//State
$routes->get('consultant/all-state', 'ConsultantController::state');
$routes->get('consultant/add-state', 'ConsultantController::addstate');
$routes->post('consultant/create-state', 'ConsultantController::storestate');
$routes->get('consultant/edit-state/(:any)', 'ConsultantController::editstate/$1');
$routes->post('consultant/edit-state', 'ConsultantController::editstate1');
$routes->post('consultant/delete-state', 'ConsultantController::deletestate');

//City
$routes->get('consultant/all-city', 'ConsultantController::city');
$routes->get('consultant/add-city', 'ConsultantController::addcity');
$routes->post('consultant/create-city', 'ConsultantController::storecity');
$routes->get('consultant/edit-city/(:any)', 'ConsultantController::editcity/$1');
$routes->post('consultant/edit-city', 'ConsultantController::editcity1');
$routes->post('consultant/delete-city', 'ConsultantController::deletecity');

// Consultant Dashboard End


// Vendor Dashboard Start

$routes->get('vendor/', 'VendorController::index');
$routes->match(['get', 'post'], 'consultant/loginAuth', 'VendorController::loginAuth');

$routes->get('vendor/dashboard', 'VendorController::dashboard',['filter' => 'vendorlogin']);

$routes->get('vendor/profile', 'VendorController::profile',['filter' => 'vendorlogin']);
$routes->post('vendor/edit-profile', 'VendorController::editProfileSubmit',['filter' => 'vendorlogin']);

$routes->get('vendor/job-applicant', 'VendorController::companyjobapplicant',['filter' => 'vendorlogin']);
$routes->get('vendor/jobs-post-view/(:any)', 'VendorController::jobspostview/$1',['filter' => 'vendorlogin']);
$routes->get('vendor/view-candidate-job-applicant/(:any)', 'VendorController::viewcandidatejobapplicant/$1',['filter' => 'vendorlogin']);

$routes->get('vendor/edit-company-job-applicant/(:any)', 'VendorController::editcompanyjobaplicant/$1',['filter' => 'vendorlogin']);
$routes->post('vendor/edit-company-job-applicant', 'VendorController::editcompanyjobaplicant1',['filter' => 'vendorlogin']);

$routes->get('vendor/change-status-jobss/(:num)/(:num)', 'VendorController::changestatusjobss/$1/$2',['filter' => 'vendorlogin']);
$routes->get('vendor/change-password', 'VendorController::viewChangePassword',['filter' => 'vendorlogin']);
$routes->post('vendor/reset-password', 'VendorController::resetPassword',['filter' => 'vendorlogin']);

//Pages type
$routes->get('vendor/all-pages', 'VendorController::pageslist',['filter' => 'vendorlogin']);
$routes->get('vendor/add-pages', 'VendorController::addpages',['filter' => 'vendorlogin']);
$routes->post('vendor/create-pages', 'VendorController::storepages',['filter' => 'vendorlogin']);
$routes->get('vendor/edit-pages/(:any)', 'VendorController::editpages/$1',['filter' => 'vendorlogin']);
$routes->post('vendor/edit-pages', 'VendorController::editpages1',['filter' => 'vendorlogin']);

// job display wise job category
$routes->get('vendor/job-display-category/(:any)', 'VendorController::jobcategorydeatails/$1',['filter' => 'vendorlogin']);

// Master Start

//career level
$routes->get('vendor/all-career-level', 'VendorController::careerlevel',['filter' => 'vendorlogin']);
$routes->get('vendor/add-career-level', 'VendorController::addcareerlevel',['filter' => 'vendorlogin']);
$routes->post('vendor/create-career-level', 'VendorController::storecareerlevel',['filter' => 'vendorlogin']);
$routes->get('vendor/edit-career-level/(:any)', 'VendorController::editcareerlevel/$1',['filter' => 'vendorlogin']);
$routes->post('vendor/edit-career-level', 'VendorController::editcareerlevel1',['filter' => 'vendorlogin']);
$routes->post('vendor/delete-career-level', 'VendorController::deletecareerlevel',['filter' => 'vendorlogin']);

//job role
$routes->get('vendor/all-jobs-role', 'VendorController::jobsrole');
$routes->get('vendor/add-jobs-role', 'VendorController::addjobsrole');
$routes->post('vendor/create-jobs-role', 'VendorController::storejobsrole');
$routes->get('vendor/edit-jobs-role/(:any)', 'VendorController::editjobsrole/$1');
$routes->post('vendor/edit-jobs-role', 'VendorController::editjobsrole1');
$routes->post('vendor/delete-jobs-role', 'VendorController::deletejobsrole');

//gender
$routes->get('vendor/all-gender', 'VendorController::gender');
$routes->get('vendor/add-gender', 'VendorController::addgender');
$routes->post('vendor/create-gender', 'VendorController::storegender');
$routes->get('vendor/edit-gender/(:any)', 'VendorController::editgender/$1');
$routes->post('vendor/edit-gender', 'VendorController::editgender1');
$routes->post('vendor/delete-gender', 'VendorController::deletegender');

//industries
$routes->get('vendor/all-industry', 'VendorController::industry');
$routes->get('vendor/add-industry', 'VendorController::addindustry');
$routes->post('vendor/create-industry', 'VendorController::storeindustry');
$routes->get('vendor/edit-industry/(:any)', 'VendorController::editindustry/$1');
$routes->post('vendor/edit-industry', 'VendorController::editindustry1');
$routes->post('vendor/delete-industry', 'VendorController::deleteindustry');

//Job Experience
$routes->get('vendor/all-job-experience', 'VendorController::jobExp');
$routes->get('vendor/add-job-experience', 'VendorController::addjobExp');
$routes->post('vendor/create-job-experience', 'VendorController::storejobExp');
$routes->get('vendor/edit-job-experience/(:any)', 'VendorController::editjobExp/$1');
$routes->post('vendor/edit-job-experience', 'VendorController::editjobExp1');
$routes->post('vendor/delete-job-experience', 'VendorController::deletejobExp');

//Vacancy type
$routes->get('vendor/all-vacancytype', 'VendorController::vacancytype');
$routes->get('vendor/add-vacancytype', 'VendorController::addvacancytype');
$routes->post('vendor/create-vacancytype', 'VendorController::storevacancytype');
$routes->get('vendor/edit-vacancytype/(:any)', 'VendorController::editvacancytype/$1');
$routes->post('vendor/edit-vacancytype', 'VendorController::editvacancytype1');
$routes->post('vendor/delete-vacancytype', 'VendorController::deletevacancytype');

//Job type
$routes->get('vendor/all-jobtype', 'VendorController::jobtype');
$routes->get('vendor/add-jobtype', 'VendorController::addjobtype');
$routes->post('vendor/create-jobtype', 'VendorController::storejobtype');
$routes->get('vendor/edit-jobtype/(:any)', 'VendorController::editjobtype/$1');
$routes->post('vendor/edit-jobtype', 'VendorController::editjobtype1');
$routes->post('vendor/delete-jobtype', 'VendorController::deletejobtype');

//Job shift
$routes->get('vendor/all-jobshift', 'VendorController::jobshift');
$routes->get('vendor/add-jobshift', 'VendorController::addjobshift');
$routes->post('vendor/create-jobshift', 'VendorController::storejobshift');
$routes->get('vendor/edit-jobshift/(:any)', 'VendorController::editjobshift/$1');
$routes->post('vendor/edit-jobshift', 'VendorController::editjobshift1');
$routes->post('vendor/delete-jobshift', 'VendorController::deletejobshift');

//degree level
$routes->get('vendor/all-degree-level', 'VendorController::degreelevel');
$routes->get('vendor/add-degree-level', 'VendorController::adddegreelevel');
$routes->post('vendor/create-degree-level', 'VendorController::storedegreelevel');
$routes->get('vendor/edit-degree-level/(:any)', 'VendorController::editdegreelevel/$1');
$routes->post('vendor/edit-degree-level', 'VendorController::editdegreelevel1');
$routes->post('vendor/delete-degree-level', 'VendorController::deletedegreelevel');

//education
$routes->get('vendor/all-education', 'VendorController::education');
$routes->get('vendor/add-education', 'VendorController::addeducation');
$routes->post('vendor/create-education', 'VendorController::storeeducation');
$routes->get('vendor/edit-education/(:any)', 'VendorController::editeducation/$1');
$routes->post('vendor/edit-education', 'VendorController::editeducation1');
$routes->post('vendor/delete-education', 'VendorController::deleteeducation');

//Ownership type
$routes->get('vendor/all-ownership', 'VendorController::ownership');
$routes->get('vendor/add-ownership', 'VendorController::addownership');
$routes->post('vendor/create-ownership', 'VendorController::storeownership');
$routes->get('vendor/edit-ownership/(:any)', 'VendorController::editownership/$1');
$routes->post('vendor/edit-ownership', 'VendorController::editownership1');
$routes->post('vendor/delete-ownership', 'VendorController::deleteownership');

//Salary period
$routes->get('vendor/all-salary', 'VendorController::salary');
$routes->get('vendor/add-salary', 'VendorController::addsalary');
$routes->post('vendor/create-salary', 'VendorController::storesalary');
$routes->get('vendor/edit-salary/(:any)', 'VendorController::editsalary/$1');
$routes->post('vendor/edit-salary', 'VendorController::editsalary1');
$routes->post('vendor/delete-salary', 'VendorController::deletesalary');

//Country
$routes->get('vendor/all-country', 'VendorController::country');
$routes->get('vendor/add-country', 'VendorController::addcountry');
$routes->post('vendor/create-country', 'VendorController::storecountry');
$routes->get('vendor/edit-country/(:any)', 'VendorController::editcountry/$1');
$routes->post('vendor/edit-country', 'VendorController::editcountry1');
$routes->post('vendor/delete-country', 'VendorController::deletecountry');

//State
$routes->get('vendor/all-state', 'VendorController::state');
$routes->get('vendor/add-state', 'VendorController::addstate');
$routes->post('vendor/create-state', 'VendorController::storestate');
$routes->get('vendor/edit-state/(:any)', 'VendorController::editstate/$1');
$routes->post('vendor/edit-state', 'VendorController::editstate1');
$routes->post('vendor/delete-state', 'VendorController::deletestate');

//City
$routes->get('vendor/all-city', 'VendorController::city');
$routes->get('vendor/add-city', 'VendorController::addcity');
$routes->post('vendor/create-city', 'VendorController::storecity');
$routes->get('vendor/edit-city/(:any)', 'VendorController::editcity/$1');
$routes->post('vendor/edit-city', 'VendorController::editcity1');
$routes->post('vendor/delete-city', 'VendorController::deletecity');

//Job category
$routes->get('vendor/all-job-category', 'VendorController::jobcategory',['filter' => 'vendorlogin']);
$routes->get('vendor/add-job-category', 'VendorController::addjobcategory',['filter' => 'vendorlogin']);
$routes->post('vendor/create-job-category', 'VendorController::storejobcategory',['filter' => 'vendorlogin']);
$routes->get('vendor/edit-job-category/(:any)', 'VendorController::editjobcategory/$1',['filter' => 'vendorlogin']);
$routes->post('vendor/edit-job-category', 'VendorController::editjobcategory1',['filter' => 'vendorlogin']);
$routes->post('vendor/delete-job-category', 'VendorController::deletejobcategory',['filter' => 'vendorlogin']);

// Function Area
$routes->get('vendor/all-function-area', 'VendorController::functionarea',['filter' => 'vendorlogin']);
$routes->get('vendor/add-function-area', 'VendorController::addfunctionarea',['filter' => 'vendorlogin']);
$routes->post('vendor/create-function-area', 'VendorController::storefunctionarea',['filter' => 'vendorlogin']);
$routes->get('vendor/edit-function-area/(:any)', 'VendorController::editfunctionarea/$1',['filter' => 'vendorlogin']);
$routes->post('vendor/edit-function-area', 'VendorController::editfunctionarea1',['filter' => 'vendorlogin']);
$routes->post('vendor/delete-function-area', 'VendorController::deletefunctionarea',['filter' => 'vendorlogin']);

// Master End


//Companies
$routes->get('vendor/all-company', 'VendorController::companies',['filter' => 'vendorlogin']);
$routes->get('vendor/add-company', 'VendorController::addcompanies',['filter' => 'vendorlogin']);
$routes->post('vendor/create-company', 'VendorController::storecompanies',['filter' => 'vendorlogin']);
$routes->get('vendor/edit-company/(:any)', 'VendorController::editcompanies/$1',['filter' => 'vendorlogin']);
$routes->post('vendor/edit-company', 'VendorController::editcompanies1',['filter' => 'vendorlogin']);
$routes->post('vendor/delete-company', 'VendorController::deletecompanies',['filter' => 'vendorlogin']);
$routes->get('vendor/total-company-jobs/(:any)', 'VendorController::totalcompanyjob/$1',['filter' => 'vendorlogin']);
$routes->get('vendor/view-company/(:any)', 'VendorController::viewcompanies/$1',['filter' => 'vendorlogin']);


//Candidate
$routes->get('vendor/all-user', 'VendorController::candidate',['filter' => 'vendorlogin']);
$routes->get('vendor/add-user', 'VendorController::addcandidate',['filter' => 'vendorlogin']);
$routes->post('vendor/create-user', 'VendorController::storecandidate',['filter' => 'vendorlogin']);
$routes->get('vendor/edit-user/(:any)', 'VendorController::editcandidate/$1',['filter' => 'vendorlogin']);
$routes->post('vendor/edit-user', 'VendorController::editcandidate1',['filter' => 'vendorlogin']);
$routes->post('vendor/delete-user', 'VendorController::deletecandidate',['filter' => 'vendorlogin']);
$routes->get('vendor/view-user/(:any)', 'VendorController::viewcandidate/$1',['filter' => 'vendorlogin']);

//Job Post
/*$routes->get('consultant/all-jobs', 'ConsultantController::jobslist');
$routes->get('consultant/add-jobs', 'ConsultantController::addjobs');
$routes->post('consultant/create-jobs', 'ConsultantController::storejobs');
$routes->get('consultant/edit-jobs/(:any)', 'ConsultantController::editjobs/$1');
$routes->post('consultant/edit-jobs', 'ConsultantController::editjobs1');
$routes->post('consultant/delete-jobs', 'ConsultantController::deletejobs');
$routes->get('consultant/view-jobs/(:any)', 'ConsultantController::viewjobs/$1');
$routes->post('consultant/generateImage', 'ConsultantController::generateImage');*/

//jobs
$routes->get('vendor/view-jobs', 'VendorController::jobs',['filter' => 'vendorlogin']);
$routes->get('vendor/post-jobs', 'VendorController::addjobs',['filter' => 'vendorlogin']);
$routes->post('vendor/create-jobs', 'VendorController::jobsSubmit',['filter' => 'vendorlogin']);
$routes->get('vendor/edit-post-jobs/(:any)', 'VendorController::editjobspost/$1',['filter' => 'vendorlogin']);
$routes->post('vendor/edit-post-jobs', 'VendorController::editjobspost1',['filter' => 'vendorlogin']);
$routes->post('vendor/delete-jobs', 'VendorController::deletejobs',['filter' => 'vendorlogin']); 
$routes->get('vendor/view-post-jobs/(:any)', 'VendorController::viewpostjobs/$1',['filter' => 'vendorlogin']);
$routes->get('vendor/view-post-jobs1/(:any)', 'VendorController::viewpostjobs1/$1',['filter' => 'vendorlogin']);




// Vendor Dashboard End



 
// superadmin
$routes->get('superadmin/', 'SuperAdminController::index');
$routes->match(['get', 'post'], 'superadmin/loginAuth', 'SuperAdminController::loginAuth');
$routes->get('superadmin/dashboard', 'SuperAdminController::dashboard',['filter' => 'superloginin']);
$routes->get('superadmin/city-wise-job/(:any)', 'SuperAdminController::citywiseshow/$1',['filter' => 'superloginin']);

$routes->get('superadmin/roleassign', 'SuperAdminController::roleassign',['filter' => 'superloginin']);
$routes->get('superadmin/add-roleassign', 'SuperAdminController::addroleassign',['filter' => 'superloginin']); 
$routes->get('superadmin/newaddrole', 'SuperAdminController::addroleassign0',['filter' => 'superloginin']); 
$routes->get('superadmin/view-permission/(:any)', 'SuperAdminController::assignviewpermission/$1');
$routes->post('superadmin/create-assignrole', 'SuperAdminController::storeassignrole');
$routes->get('superadmin/add-role-permission', 'SuperAdminController::addrolepermission',['filter' => 'superloginin']); 
$routes->post('superadmin/create-role-permission', 'SuperAdminController::storerolepermission');

$routes->get('superadmin/vendor-list', 'SuperAdminController::vendorlist',['filter' => 'superloginin']);
$routes->get('superadmin/vendor-edit/(:any)', 'SuperAdminController::vendorEdit/$1');
$routes->get('superadmin/vendor-edit0/(:any)', 'SuperAdminController::vendorEditss/$1');
$routes->post('superadmin/vendor-edit', 'SuperAdminController::vendorEdit1');

$routes->post('superadmin/filter-vendor', 'SuperAdminController::filterVendor');
$routes->get('superadmin/total-vendor-company-jobs-view/(:any)', 'SuperAdminController::vendorlistview/$1');
$routes->get('superadmin/total-vendor-company/(:any)', 'SuperAdminController::totalvendorcompany/$1');

$routes->get('superadmin/edit-roleassign/(:any)', 'SuperAdminController::editroleassign/$1');
$routes->post('superadmin/edit-roleassign', 'SuperAdminController::editroleassign1');


$routes->get('superadmin/city-wise-company/(:any)', 'SuperAdminController::citywisecompany/$1');
$routes->get('superadmin/state-wise-city/(:any)', 'SuperAdminController::statewisecity/$1');
$routes->get('superadmin/city-wise-jobs/(:any)', 'SuperAdminController::citywisejob/$1');

$routes->get('superadmin/job-category-wise-data-display', 'SuperAdminController::jobcategorywisedatashow',['filter' => 'superloginin']);

// customer
$routes->get('superadmin/all-customer', 'SuperAdminController::allcustomer');
$routes->get('superadmin/change-status-product/(:num)/(:num)', 'SuperAdminController::changestatuscustomer/$1/$2');

$routes->get('/superadmin/crop-enquiry', 'SuperAdminController::cropEnquiry');
$routes->get('superadmin/crop-enquiry-view/(:any)', 'SuperAdminController::viewcropenquiry/$1');
$routes->post('superadmin/assign-to', 'SuperAdminController::assignto');

// today data start
$routes->get('superadmin/today-company-registration', 'SuperAdminController::todaycompany',['filter' => 'superloginin']);
$routes->get('superadmin/today-jobs', 'SuperAdminController::todayjobs',['filter' => 'superloginin']);
$routes->get('superadmin/today-candidate-registration', 'SuperAdminController::todaycandidate',['filter' => 'superloginin']);
// today data end

//contact
$routes->get('superadmin/all-contact', 'SuperAdminController::allContact',['filter' => 'superloginin']);

//career level
$routes->get('superadmin/all-career-level', 'SuperAdminController::careerlevel',['filter' => 'superloginin']);
$routes->get('superadmin/add-career-level', 'SuperAdminController::addcareerlevel',['filter' => 'superloginin']);
$routes->post('superadmin/create-career-level', 'SuperAdminController::storecareerlevel',['filter' => 'superloginin']);
$routes->get('superadmin/edit-career-level/(:any)', 'SuperAdminController::editcareerlevel/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-career-level', 'SuperAdminController::editcareerlevel1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-career-level', 'SuperAdminController::deletecareerlevel',['filter' => 'superloginin']);

//job role
$routes->get('superadmin/all-jobs-role', 'SuperAdminController::jobsrole',['filter' => 'superloginin']);
$routes->get('superadmin/add-jobs-role', 'SuperAdminController::addjobsrole',['filter' => 'superloginin']);
$routes->post('superadmin/create-jobs-role', 'SuperAdminController::storejobsrole',['filter' => 'superloginin']);
$routes->get('superadmin/edit-jobs-role/(:any)', 'SuperAdminController::editjobsrole/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-jobs-role', 'SuperAdminController::editjobsrole1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-jobs-role', 'SuperAdminController::deletejobsrole',['filter' => 'superloginin']);

//gender
$routes->get('superadmin/all-gender', 'SuperAdminController::gender',['filter' => 'superloginin']);
$routes->get('superadmin/add-gender', 'SuperAdminController::addgender',['filter' => 'superloginin']);
$routes->post('superadmin/create-gender', 'SuperAdminController::storegender',['filter' => 'superloginin']);
$routes->get('superadmin/edit-gender/(:any)', 'SuperAdminController::editgender/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-gender', 'SuperAdminController::editgender1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-gender', 'SuperAdminController::deletegender',['filter' => 'superloginin']);

//industries
$routes->get('superadmin/all-industry', 'SuperAdminController::industry',['filter' => 'superloginin']);
$routes->get('superadmin/add-industry', 'SuperAdminController::addindustry',['filter' => 'superloginin']);
$routes->post('superadmin/create-industry', 'SuperAdminController::storeindustry',['filter' => 'superloginin']);
$routes->get('superadmin/edit-industry/(:any)', 'SuperAdminController::editindustry/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-industry', 'SuperAdminController::editindustry1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-industry', 'SuperAdminController::deleteindustry',['filter' => 'superloginin']);

//Job Experience
$routes->get('superadmin/all-job-experience', 'SuperAdminController::jobExp',['filter' => 'superloginin']);
$routes->get('superadmin/add-job-experience', 'SuperAdminController::addjobExp',['filter' => 'superloginin']);
$routes->post('superadmin/create-job-experience', 'SuperAdminController::storejobExp',['filter' => 'superloginin']);
$routes->get('superadmin/edit-job-experience/(:any)', 'SuperAdminController::editjobExp/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-job-experience', 'SuperAdminController::editjobExp1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-job-experience', 'SuperAdminController::deletejobExp',['filter' => 'superloginin']);

//Vacancy type
$routes->get('superadmin/all-vacancytype', 'SuperAdminController::vacancytype',['filter' => 'superloginin']);
$routes->get('superadmin/add-vacancytype', 'SuperAdminController::addvacancytype',['filter' => 'superloginin']);
$routes->post('superadmin/create-vacancytype', 'SuperAdminController::storevacancytype',['filter' => 'superloginin']);
$routes->get('superadmin/edit-vacancytype/(:any)', 'SuperAdminController::editvacancytype/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-vacancytype', 'SuperAdminController::editvacancytype1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-vacancytype', 'SuperAdminController::deletevacancytype',['filter' => 'superloginin']);

//Job type
$routes->get('superadmin/all-jobtype', 'SuperAdminController::jobtype',['filter' => 'superloginin']);
$routes->get('superadmin/add-jobtype', 'SuperAdminController::addjobtype',['filter' => 'superloginin']);
$routes->post('superadmin/create-jobtype', 'SuperAdminController::storejobtype',['filter' => 'superloginin']);
$routes->get('superadmin/edit-jobtype/(:any)', 'SuperAdminController::editjobtype/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-jobtype', 'SuperAdminController::editjobtype1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-jobtype', 'SuperAdminController::deletejobtype',['filter' => 'superloginin']);

//Job shift
$routes->get('superadmin/all-jobshift', 'SuperAdminController::jobshift',['filter' => 'superloginin']);
$routes->get('superadmin/add-jobshift', 'SuperAdminController::addjobshift',['filter' => 'superloginin']);
$routes->post('superadmin/create-jobshift', 'SuperAdminController::storejobshift',['filter' => 'superloginin']);
$routes->get('superadmin/edit-jobshift/(:any)', 'SuperAdminController::editjobshift/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-jobshift', 'SuperAdminController::editjobshift1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-jobshift', 'SuperAdminController::deletejobshift',['filter' => 'superloginin']);

//degree level
$routes->get('superadmin/all-degree-level', 'SuperAdminController::degreelevel',['filter' => 'superloginin']);
$routes->get('superadmin/add-degree-level', 'SuperAdminController::adddegreelevel',['filter' => 'superloginin']);
$routes->post('superadmin/create-degree-level', 'SuperAdminController::storedegreelevel',['filter' => 'superloginin']);
$routes->get('superadmin/edit-degree-level/(:any)', 'SuperAdminController::editdegreelevel/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-degree-level', 'SuperAdminController::editdegreelevel1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-degree-level', 'SuperAdminController::deletedegreelevel',['filter' => 'superloginin']);

//education
$routes->get('superadmin/all-education', 'SuperAdminController::education',['filter' => 'superloginin']);
$routes->get('superadmin/add-education', 'SuperAdminController::addeducation',['filter' => 'superloginin']);
$routes->post('superadmin/create-education', 'SuperAdminController::storeeducation',['filter' => 'superloginin']);
$routes->get('superadmin/edit-education/(:any)', 'SuperAdminController::editeducation/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-education', 'SuperAdminController::editeducation1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-education', 'SuperAdminController::deleteeducation',['filter' => 'superloginin']);

//Ownership type
$routes->get('superadmin/all-ownership', 'SuperAdminController::ownership',['filter' => 'superloginin']);
$routes->get('superadmin/add-ownership', 'SuperAdminController::addownership',['filter' => 'superloginin']);
$routes->post('superadmin/create-ownership', 'SuperAdminController::storeownership',['filter' => 'superloginin']);
$routes->get('superadmin/edit-ownership/(:any)', 'SuperAdminController::editownership/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-ownership', 'SuperAdminController::editownership1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-ownership', 'SuperAdminController::deleteownership',['filter' => 'superloginin']);

//Salary period
$routes->get('superadmin/all-salary', 'SuperAdminController::salary',['filter' => 'superloginin']);
$routes->get('superadmin/add-salary', 'SuperAdminController::addsalary',['filter' => 'superloginin']);
$routes->post('superadmin/create-salary', 'SuperAdminController::storesalary',['filter' => 'superloginin']);
$routes->get('superadmin/edit-salary/(:any)', 'SuperAdminController::editsalary/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-salary', 'SuperAdminController::editsalary1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-salary', 'SuperAdminController::deletesalary',['filter' => 'superloginin']);

//Country
$routes->get('superadmin/all-country', 'SuperAdminController::country',['filter' => 'superloginin']);
$routes->get('superadmin/add-country', 'SuperAdminController::addcountry',['filter' => 'superloginin']);
$routes->post('superadmin/create-country', 'SuperAdminController::storecountry',['filter' => 'superloginin']);
$routes->get('superadmin/edit-country/(:any)', 'SuperAdminController::editcountry/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-country', 'SuperAdminController::editcountry1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-country', 'SuperAdminController::deletecountry',['filter' => 'superloginin']);

//State
$routes->get('superadmin/all-state', 'SuperAdminController::state',['filter' => 'superloginin']);
$routes->get('superadmin/add-state', 'SuperAdminController::addstate',['filter' => 'superloginin']);
$routes->post('superadmin/create-state', 'SuperAdminController::storestate',['filter' => 'superloginin']);
$routes->get('superadmin/edit-state/(:any)', 'SuperAdminController::editstate/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-state', 'SuperAdminController::editstate1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-state', 'SuperAdminController::deletestate',['filter' => 'superloginin']);

//City
$routes->get('superadmin/all-city', 'SuperAdminController::city',['filter' => 'superloginin']);
$routes->get('superadmin/add-city', 'SuperAdminController::addcity',['filter' => 'superloginin']);
$routes->post('superadmin/create-city', 'SuperAdminController::storecity',['filter' => 'superloginin']);
$routes->get('superadmin/edit-city/(:any)', 'SuperAdminController::editcity/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-city', 'SuperAdminController::editcity1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-city', 'SuperAdminController::deletecity',['filter' => 'superloginin']);

//Companies
$routes->get('superadmin/all-company', 'SuperAdminController::companies',['filter' => 'superloginin']);
$routes->get('superadmin/add-company', 'SuperAdminController::addcompanies',['filter' => 'superloginin']);
$routes->post('superadmin/create-company', 'SuperAdminController::storecompanies',['filter' => 'superloginin']);
$routes->get('superadmin/edit-company/(:any)', 'SuperAdminController::editcompanies/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-company', 'SuperAdminController::editcompanies1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-company', 'SuperAdminController::deletecompanies',['filter' => 'superloginin']);
$routes->get('superadmin/total-company-jobs/(:any)', 'SuperAdminController::totalcompanyjob/$1',['filter' => 'superloginin']);
$routes->get('superadmin/total-vendor-company-jobs/(:any)', 'SuperAdminController::totalvendorcompanyjob/$1',['filter' => 'superloginin']);
$routes->get('superadmin/view-company/(:any)', 'SuperAdminController::viewcompanies/$1',['filter' => 'superloginin']);

$routes->post('superadmin/filter-vendor-company-jobs', 'SuperAdminController::filtervendorcompanyjob');

$routes->post('superadmin/filter-companies', 'SuperAdminController::filterCompanies');
$routes->post('superadmin/export-companies', 'SuperAdminController::exportCompanies');

//blogs
$routes->get('superadmin/all-blogs', 'SuperAdminController::allblogs',['filter' => 'superloginin']);
$routes->get('superadmin/add-blogs', 'SuperAdminController::addblogs',['filter' => 'superloginin']);
$routes->post('superadmin/create-blogs', 'SuperAdminController::storeblogs',['filter' => 'superloginin']);
$routes->get('superadmin/edit-blogs/(:any)', 'SuperAdminController::editblogs/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-blogs', 'SuperAdminController::editblogs1',['filter' => 'superloginin']);
$routes->get('superadmin/view-blogs/(:any)', 'SuperAdminController::viewblogs/$1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-blogs', 'SuperAdminController::deleteblogs',['filter' => 'superloginin']);

// Consultant

$routes->get('superadmin/view-consultant', 'SuperAdminController::consultant',['filter' => 'superloginin']);
// $routes->get('superadmin/view-consultant', 'SuperAdminController::consultant',['filter' => 'superloginin']);
$routes->get('superadmin/edit-consultant/(:any)', 'SuperAdminController::editconsultant/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-consultant', 'SuperAdminController::editconsultant1',['filter' => 'superloginin']);

//Candidate
$routes->get('superadmin/all-user', 'SuperAdminController::candidate',['filter' => 'superloginin']);
$routes->get('superadmin/add-user', 'SuperAdminController::addcandidate',['filter' => 'superloginin']);
$routes->post('superadmin/create-user', 'SuperAdminController::storecandidate',['filter' => 'superloginin']);
$routes->get('superadmin/edit-user/(:any)', 'SuperAdminController::editcandidate/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-user', 'SuperAdminController::editcandidate1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-user', 'SuperAdminController::deletecandidate',['filter' => 'superloginin']);
$routes->get('superadmin/view-user/(:any)', 'SuperAdminController::viewcandidate/$1',['filter' => 'superloginin']);

$routes->post('superadmin/filter-user', 'SuperAdminController::filterCandidate');
// $routes->get('superadmin/filter-user', 'SuperAdminController::filterCandidate');
$routes->post('superadmin/export-user', 'SuperAdminController::exportCandidate');

//Job Post
$routes->get('superadmin/all-jobs', 'SuperAdminController::jobslist',['filter' => 'superloginin']);
$routes->get('superadmin/add-jobs', 'SuperAdminController::addjobs',['filter' => 'superloginin']);
$routes->post('superadmin/create-jobs', 'SuperAdminController::storejobs',['filter' => 'superloginin']);
$routes->get('superadmin/edit-jobs/(:any)', 'SuperAdminController::editjobs/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-jobs', 'SuperAdminController::editjobs1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-jobs', 'SuperAdminController::deletejobs',['filter' => 'superloginin']);
$routes->get('superadmin/view-jobs/(:any)', 'SuperAdminController::viewjobs/$1',['filter' => 'superloginin']);
$routes->post('superadmin/generateImage', 'SuperAdminController::generateImage');

$routes->post('superadmin/filter-jobs', 'SuperAdminController::filterJobs');



// Applied Job
$routes->get('superadmin/all-applied-jobs', 'SuperAdminController::appliedjobslist',['filter' => 'superloginin']);
$routes->get('superadmin/view-job-list/(:any)', 'SuperAdminController::viewjoblist/$1',['filter' => 'superloginin']);
$routes->get('superadmin/jobs-count-list/(:any)', 'SuperAdminController::jobscountlist/$1',['filter' => 'superloginin']);
$routes->get('superadmin/applied-jobs-count/(:any)', 'SuperAdminController::appliedjobscount/$1',['filter' => 'superloginin']);
$routes->get('superadmin/change-status-job/(:num)/(:num)', 'SuperAdminController::changestatusjob/$1/$2');

$routes->post('superadmin/filter-all-applied-jobs', 'SuperAdminController::filterappliedjoblist');

$routes->post('superadmin/filter-applied-jobs/(:any)', 'SuperAdminController::filterappliedjobs/$1');

$routes->post('superadmin/filter-job-list', 'SuperAdminController::filterjoblist');

$routes->post('superadmin/edit-company-job-applicant_approved', 'SuperAdminController::editcompanyjobapplicantapproved1');

//Job category
$routes->get('superadmin/all-job-category', 'SuperAdminController::jobcategory',['filter' => 'superloginin']);
$routes->get('superadmin/add-job-category', 'SuperAdminController::addjobcategory',['filter' => 'superloginin']);
$routes->post('superadmin/create-job-category', 'SuperAdminController::storejobcategory',['filter' => 'superloginin']);
$routes->get('superadmin/edit-job-category/(:any)', 'SuperAdminController::editjobcategory/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-job-category', 'SuperAdminController::editjobcategory1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-job-category', 'SuperAdminController::deletejobcategory',['filter' => 'superloginin']);

// Function Area
$routes->get('superadmin/all-function-area', 'SuperAdminController::functionarea',['filter' => 'superloginin']);
$routes->get('superadmin/add-function-area', 'SuperAdminController::addfunctionarea',['filter' => 'superloginin']);
$routes->post('superadmin/create-function-area', 'SuperAdminController::storefunctionarea',['filter' => 'superloginin']);
$routes->get('superadmin/edit-function-area/(:any)', 'SuperAdminController::editfunctionarea/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-function-area', 'SuperAdminController::editfunctionarea1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-function-area', 'SuperAdminController::deletefunctionarea',['filter' => 'superloginin']);

//Pages type
$routes->get('superadmin/all-pages', 'SuperAdminController::pageslist',['filter' => 'superloginin']);
$routes->get('superadmin/add-pages', 'SuperAdminController::addpages',['filter' => 'superloginin']);
$routes->post('superadmin/create-pages', 'SuperAdminController::storepages',['filter' => 'superloginin']);
$routes->get('superadmin/edit-pages/(:any)', 'SuperAdminController::editpages/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-pages', 'SuperAdminController::editpages1',['filter' => 'superloginin']);



$routes->get('superadmin/logout', 'SuperAdminController::logout');


// API

// $routes->resource('apischeme', 'FarmerEasyAPI/apischeme');
$routes->group("api", function ($routes) {
    $routes->get("scheme", "FarmerEasyAPI::apischeme");
    $routes->get("blog", "FarmerEasyAPI::apiblog");
    $routes->get("events", "FarmerEasyAPI::apievent");
    $routes->get("news", "FarmerEasyAPI::apinews");
    $routes->get("training", "FarmerEasyAPI::apitraining");
    $routes->get("crop", "FarmerEasyAPI::apicrop");
    $routes->get("product", "FarmerEasyAPI::apiproduct");
    $routes->post("register", "FarmerEasyAPI::apiregister");
    $routes->post("login", "FarmerEasyAPI::apilogin");
});



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
