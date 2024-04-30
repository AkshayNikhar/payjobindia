<?php
// include language configuration file based on selected language

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

use App\Models\CommonModel;
$this->commonModel=new CommonModel();
$this->session = session();

$assignid= $this->session->get('id');
$assignRole= $this->session->get('roleassign');

$Assignassigndetails=$this->commonModel->fs('roleAssign',array('id'=>$assignRole));

$jobcateid=$Assignassigndetails->jobcate_id;

$Jobassigndetails=$this->commonModel->fs('job_category',array('id'=>$jobcateid));

$rolepermissiondetails=$this->commonModel->allFetch('permissions_emp',array('emp_id'=>$assignid,'role_id'=>$assignRole));

$permissionIDs = array_column($rolepermissiondetails, 'permission_type_id');
$empIDs = array_column($rolepermissiondetails, 'emp_id');
$roleIDs = array_column($rolepermissiondetails, 'role_id');
$feedback='';

?>
<!DOCTYPE html>
<html lang="<?php echo $lang ?>">