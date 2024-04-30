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

public function getCityIdByStateId($stateid)
{
    $allcities=$this->commonModel->allFetchd('far_cities',array('state_id'=>$stateid),'name','asc');
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

// End
}
?>