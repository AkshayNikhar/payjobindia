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
$routes->post('/applyjob', 'Home::applyjob');
$routes->get('blogs', 'Home::blogs');
$routes->get('blog', 'Home::blog');
$routes->get('privacy-policy', 'Home::privacyPolicy');
$routes->get('terms-conditions', 'Home::termsConditions');
$routes->get('refund-policy', 'Home::refundPolicy');
$routes->get('company-profile/(:any)', 'Home::companyDetails/$1');

// LOGIN & LOGOUT
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

$routes->get('logout', 'Authentication::logout');

// CANDIDATE DASHBOARD ROUTING START
$routes->get('candidate/dashboard', 'Candidate::dashboard');
$routes->get('candidate/profile', 'Candidate::profile');
$routes->get('candidate/applied-jobs', 'Candidate::appliedJob');
$routes->get('candidate/saved-jobs', 'Candidate::savedJob');
$routes->get('candidate/setting', 'Candidate::setting');
$routes->post('candidate/edit-candidate-profile', 'Candidate::editProfileCandidateSubmit');
// CANDIDATE DASHBOARD ROUTING END

// Common
$routes->get('get-cityid-by-stateid/(:any)', 'Common::getCityIdByStateId/$1');

// Company Dashboard Start
$routes->get('company/dashboard', 'CompanyController::dashboard');
$routes->get('company/profile', 'CompanyController::profile');
$routes->post('company/edit-profile', 'CompanyController::editProfileSubmit');

//jobs
$routes->get('company/view-jobs', 'CompanyController::jobs');
$routes->get('company/post-jobs', 'CompanyController::addjobs');
$routes->post('company/create-jobs', 'CompanyController::jobsSubmit');
$routes->get('company/edit-post-jobs/(:any)', 'CompanyController::editjobspost/$1');
$routes->post('company/edit-post-jobs', 'CompanyController::editjobspost1');
$routes->post('company/delete-jobs', 'CompanyController::deletejobs'); 

// Company Dashboard End

 
// superadmin
$routes->get('superadmin/', 'SuperAdminController::index');
$routes->match(['get', 'post'], 'superadmin/loginAuth', 'SuperAdminController::loginAuth');
$routes->get('superadmin/dashboard', 'SuperAdminController::dashboard',['filter' => 'superloginin']);
$routes->get('superadmin/city-wise-job/(:any)', 'SuperAdminController::citywiseshow/$1',['filter' => 'superloginin']);

// customer
$routes->get('superadmin/all-customer', 'SuperAdminController::allcustomer');
$routes->get('superadmin/change-status-product/(:num)/(:num)', 'SuperAdminController::changestatuscustomer/$1/$2');

$routes->get('/superadmin/crop-enquiry', 'SuperAdminController::cropEnquiry');
$routes->get('superadmin/crop-enquiry-view/(:any)', 'SuperAdminController::viewcropenquiry/$1');
$routes->post('superadmin/assign-to', 'SuperAdminController::assignto');

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

//Candidate
$routes->get('superadmin/all-user', 'SuperAdminController::candidate',['filter' => 'superloginin']);
$routes->get('superadmin/add-user', 'SuperAdminController::addcandidate',['filter' => 'superloginin']);
$routes->post('superadmin/create-user', 'SuperAdminController::storecandidate',['filter' => 'superloginin']);
$routes->get('superadmin/edit-user/(:any)', 'SuperAdminController::editcandidate/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-user', 'SuperAdminController::editcandidate1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-user', 'SuperAdminController::deletecandidate',['filter' => 'superloginin']);

//Job Post
$routes->get('superadmin/all-jobs', 'SuperAdminController::jobslist',['filter' => 'superloginin']);
$routes->get('superadmin/add-jobs', 'SuperAdminController::addjobs',['filter' => 'superloginin']);
$routes->post('superadmin/create-jobs', 'SuperAdminController::storejobs',['filter' => 'superloginin']);
$routes->get('superadmin/edit-jobs/(:any)', 'SuperAdminController::editjobs/$1',['filter' => 'superloginin']);
$routes->post('superadmin/edit-jobs', 'SuperAdminController::editjobs1',['filter' => 'superloginin']);
$routes->post('superadmin/delete-jobs', 'SuperAdminController::deletejobs',['filter' => 'superloginin']);

// Applied Job
$routes->get('superadmin/all-applied-jobs', 'SuperAdminController::appliedjobslist',['filter' => 'superloginin']);
$routes->get('superadmin/view-job-list/(:any)', 'SuperAdminController::viewjoblist/$1',['filter' => 'superloginin']);





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
