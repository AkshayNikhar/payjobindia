<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\CommonModel;
use CodeIgniter\Files\File;
use CodeIgniter\Controller;
use ImageKit\ImageKit;

class Common extends BaseController
{
    public function __construct()
{
    $this->session = \Config\Services::session();
    helper('general');
    $this->commonModel = new CommonModel();
}

public function getStateIdByCountryId($countryid)
{
    $allstates=$this->commonModel->allFetchd('location_states',array('country_id'=>$countryid),'name','asc');
    // print_r($allcities);
    if(empty($allstates))
    {
        $html='<option value="" selected hidden >Data Not Found </option>';
    }
    else
    {
        $html='<option value="" selected hidden >Select States</option>';
        foreach($allstates as $c)
        {
            $html.= '<option value="'.$c->id.'">'.$c->name.'</option>';
        }
    }
    echo $html;
}

public function getCityIdByStateId($stateid)
{
    $allcities=$this->commonModel->allFetchd('location_cities',array('state_id'=>$stateid),'name','asc');
    // print_r($allcities);
    if(empty($allcities))
    {
        $html='<option value="" selected hidden >Data Not Found </option>';
    }
    else
    {
        $html='<option value="" selected hidden >Select City</option>';
        foreach($allcities as $c)
        {
            $html.= '<option value="'.$c->id.'">'.$c->name.'</option>';
        }
    }
    echo $html;
}

public function getFunctionIdByJobcateId($jobcategoryid)
{
    $allfunctionarea=$this->commonModel->allFetchd('function_area',array('job_cate_id'=>$jobcategoryid),'name','asc');
    // print_r($allcities);
    if(empty($allfunctionarea))
    {
        $html='<option value="" selected hidden >Data Not Found </option>';
    }
    else
    {
        $html='<option value="" selected hidden >Select Function</option>';
        foreach($allfunctionarea as $c)
        {
            $html.= '<option value="'.$c->id.'">'.$c->name.'</option>';
        }
    }
    echo $html; 
}

public function getCareerlevelidByFunctionareaid($functionareaid)
{
    $allcareerLevel=$this->commonModel->allFetchd('job_attributes_career_levels',array('function_area_id'=>$functionareaid),'name','asc');
    // print_r($allcities);
    if(empty($allcareerLevel))
    {
        $html='<option value="" selected hidden >Data Not Found </option>';
    }
    else
    {
        $html='<option value="" selected hidden >Select Career Level</option>';
        foreach($allcareerLevel as $c)
        {
            $html.= '<option value="'.$c->id.'">'.$c->name.'</option>';
        }
    }
    echo $html;
}

public function getEducationidByDegreeLevelid($degreelevelid)
{
    $alldegreelevel=$this->commonModel->allFetchd('job_attributes_degree_types',array('degree_level_id'=>$degreelevelid),'name','asc');
    // print_r($allcities);
    if(empty($alldegreelevel))
    {
        $html='<option value="" selected hidden >Data Not Found </option>';
    }
    else
    {
        $html='<option value="" selected hidden >Select Degree</option>';
        foreach($alldegreelevel as $c)
        {
            $html.= '<option value="'.$c->id.'">'.$c->name.'</option>';
        }
    }
    echo $html;
}

public function getjobcategorybyid($jobcategoryid)
{
    $alljobcategory=$this->commonModel->fs('job_attributes_career_levels',array('id'=>$jobcategoryid));
    // // print_r($alljobcategory);exit;
    // $html='';
    //     // $html='<option value="" selected hidden >Select Function</option>';
    //     foreach($alljobcategory as $c)
    //     {
    //         $html.=$c->description;
    //         $html.=$c->responsibility;
    //         $html.=$c->requirement;
    //     }
    
    // echo $html;
    $data=array();
    $data['desc']= $alljobcategory->description;
    $data['resp']= $alljobcategory->responbilities;
    $data['req']= $alljobcategory->requirements;
    echo json_encode($data);
    
}

// End
}
?>