<?php
// include language configuration file based on selected language

use App\Models\CommonModel;
$this->commonModel=new CommonModel();
$this->session = session();
$customerid= $this->session->get('empid');

$companydetails=$this->commonModel->fs('companies',array('id'=>$customerid));
$company_name=$companydetails->company_name;
$company_email=$companydetails->company_email;
$phone=$companydetails->phone;
// $customerstate=$companydetails->cusstate;
// $customercity=$companydetails->cuscity;
// $customerprofession=$companydetails->cusprofession;
			        
$lang = "en";
if (isset($_GET['lang'])) {
   $lang = $_GET['lang'];
    $_SESSION['lang'] = $lang;
}
if( isset( $_SESSION['lang'] ) ) {
    $lang = $_SESSION['lang'];
}else {
    $lang = "en";
}
require_once "back/assets/lang/" . $lang . ".php";
// require_once (base_url("back/assets/lang/" . $lang . ".php"));

?>
<!DOCTYPE html>
<html lang="<?php echo $lang ?>">