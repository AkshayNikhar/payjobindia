<?php
// include language configuration file based on selected language

use App\Models\CommonModel;
$this->commonModel=new CommonModel();
$this->session = session();
$customerid= $this->session->get('venid');
$customertype= $this->session->get('emptype');

$companydetails=$this->commonModel->fs('vendor',array('id'=>$customerid));
$company_name=$companydetails->company_name;
$company_email=$companydetails->company_email;
$phone=$companydetails->phone;

$rolepermissiondetails=$this->commonModel->allFetch('permissions_emp',array('emp_id'=>$customerid));

$permissionIDs = array_column($rolepermissiondetails, 'permission_type_id');
$empIDs = array_column($rolepermissiondetails, 'emp_id');
// $roleIDs = array_column($rolepermissiondetails, 'role_id');

			        
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