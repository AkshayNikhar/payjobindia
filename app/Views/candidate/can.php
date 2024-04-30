<?php 
use App\Models\CommonModel;
$this->commonModel=new CommonModel();
$this->session = session();
$canid= $this->session->get('canid');
$candidatedetails=$this->commonModel->fs('users',array('id'=>$canid));
$username=$candidatedetails->name;
$useremail=$candidatedetails->email;
$userrole=$candidatedetails->role;

$db = db_connect();

?>