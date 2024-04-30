<?php 
include 'layouts/head-main.php';

?>

<head>
    <title>Edit Company | Pay Job India</title>
    <?php include 'layouts/head.php'; ?>

    

    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-8">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Edit Company </h4>
                        </div>
                    </div>
                    
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- <div class="col-lg-2"></div> -->
                                    <div class="col-lg-12">
                                    
                                    <div class="col-lg-12  mb-3">
                                         <?php if (session()->getFlashdata('success')) : ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <?= session()->getFlashdata('success') ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (session()->getFlashdata('error')) : ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <?= session()->getFlashdata('error') ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php endif; ?>
                                    </div>   
                                <form method="POST" class="needs-validation" enctype="multipart/form-data" action="<?= base_url('vendor/edit-company'); ?>"  novalidate>
                                    
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $datacompany->id; ?>">
                                   
                                    <div class="row" style="margin-top: 20px;">
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Company Name</label>
                                                <input type="text" class="form-control" name="company_name" value="<?php echo $datacompany->company_name; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Company Email</label>
                                                <input type="text" class="form-control" name="company_email" value="<?php echo $datacompany->company_email; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Company Contact No.</label>
                                                <input type="text" class="form-control" name="phone" value="<?php echo $datacompany->phone; ?>" required>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                         
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Industry</label>
                                                <select name="industry_id" id="industry_id" class="form-select select2">
                                                <option selected hidden>Select Industry ...</option>
                                                <?php 
                                                foreach($industry as $indus)
													    {
													        if($indus->id == $datacompany->industry_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$indus->id.'" '.$sel.'>'.$indus->name.'</option>';
													    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Company CEO</label>
                                                <input type="text" class="form-control" name="companyceo" value="<?php echo $datacompany->company_ceo; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Company Type</label>
                                                <select name="ownership_type_id" id="ownership_type_id" class="form-select ">
                                                <option selected hidden>Select Ownership ...</option>
                                                
                                                <?php 
                                                foreach($ownership as $own)
													    {
													        if($own->id == $datacompany->ownership_type_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$own->id.'" '.$sel.'>'.$own->name.'</option>';
													    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Number of Employees</label>
                                                <select name="no_of_employees" id="no_of_employees" class="form-select select2">
                                                <option selected hidden>Select Number ...</option>
                                                <option value="1-10" <?php if($datacompany->no_of_employees=='1-10') {echo 'selected';} ?>>1-10</option>
                                                <option value="11-50" <?php if($datacompany->no_of_employees=='11-50') {echo 'selected';} ?>>11-50</option>
                                                <option value="51-100" <?php if($datacompany->no_of_employees=='51-100') {echo 'selected';} ?>>51-100</option>
                                                <option value="101-200" <?php if($datacompany->no_of_employees=='101-200') {echo 'selected';} ?>>101-200</option>
                                                <option value="201-300" <?php if($datacompany->no_of_employees=='201-300') {echo 'selected';} ?>>201-300</option>
                                                <option value="301-600" <?php if($datacompany->no_of_employees=='301-600') {echo 'selected';} ?>>301-600</option>
                                                <option value="601-1000" <?php if($datacompany->no_of_employees=='601-1000') {echo 'selected';} ?>>601-1000</option>
                                                <option value="1001-1500" <?php if($datacompany->no_of_employees=='1001-1500') {echo 'selected';} ?>>1001-1500</option>
                                                <option value="1501-2000" <?php if($datacompany->no_of_employees=='1501-2000') {echo 'selected';} ?>>1501-2000</option>
                                                <option value="2001-2500" <?php if($datacompany->no_of_employees=='2001-2500') {echo 'selected';} ?>>2001-2500</option>
                                                <option value="2501-3000" <?php if($datacompany->no_of_employees=='2501-3000') {echo 'selected';} ?>>2501-3000</option>
                                                <option value="3001-3500" <?php if($datacompany->no_of_employees=='3501-4000') {echo 'selected';} ?>>3001-3500</option>
                                                <option value="3501-4000" <?php if($datacompany->no_of_employees=='3501-4000') {echo 'selected';} ?>>3501-4000</option>
                                                <option value="4001-4500" <?php if($datacompany->no_of_employees=='4001-4500') {echo 'selected';} ?>>4001-4500</option>
                                                <option value="4501-5000" <?php if($datacompany->no_of_employees=='4501-5000') {echo 'selected';} ?>>4501-5000</option>
                                                <option value="5000+" <?php if($datacompany->no_of_employees=='5000+') {echo 'selected';} ?>>5000+</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Number of Office</label>
                                                <select name="no_of_offices" id="no_of_offices" class="form-select select2">
                                                    <option selected hidden>Select Office ...</option>
                                                    
                                                    <?php 
                                                foreach($numberList as $listno)
													    {
													        if($listno == $datacompany->no_of_offices)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$listno.'" '.$sel.'>'.$listno.'</option>';
													    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Established</label>
                                                <select name="established_in" id="established_in" class="form-select select2">
                                                <option selected hidden>Select Year ...</option>
                                                <?php
                                                    
												    foreach($years as $year)
													    {
													        if($year == $datacompany->established_in)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$year.'" '.$sel.'>'.$year.'</option>';
													    }
											    ?>
                                                
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Country</label>
                                                <select name="country_id" id="country_id" class="form-select select2">
                                                <option selected hidden>Select Status ...</option>
                                                <?php
                                                    foreach($country as $countrys)
													    {
													        if($countrys->id == $datacompany->country_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$countrys->id.'" '.$sel.'>'.$countrys->name.'</option>';
													    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>State</label>
                                                <select name="state_id" id="state_id" class="form-select select2">
                                                <option selected hidden>Select States ...</option>
                                                <?php
                                                    foreach($state as $states)
													    {
													        if($states->id == $datacompany->state_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$states->id.'" '.$sel.'>'.$states->name.'</option>';
													    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>City</label>
                                                <select name="city_id" id="city_id" class="form-select select2">
                                                <option selected hidden>Select City ...</option>
                                                <?php
                                                   
												    foreach($city as $citys)
													    {
													        if($citys->id == $datacompany->city_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$citys->id.'" '.$sel.'>'.$citys->name.'</option>';
													    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Website Url</label>
                                                <input type="text" class="form-control" name="website" value="<?php echo $datacompany->website; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Fax</label>
                                                <input type="text" class="form-control" name="fax" value="<?php echo $datacompany->fax; ?>">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Facebook Link</label>
                                                <input type="text" class="form-control" name="facebook" value="<?php echo $datacompany->facebook; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Twitter link</label>
                                                <input type="text" class="form-control" name="twitter" value="<?php echo $datacompany->twitter; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Linkedin link</label>
                                                <input type="text" class="form-control" name="linkedin" value="<?php echo $datacompany->linkedin; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Youtube link</label>
                                                <input type="text" class="form-control" name="youtube" value="<?php echo $datacompany->youtube; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Pinterest link</label>
                                                <input type="text" class="form-control" name="pinterest" value="<?php echo $datacompany->pinterest; ?>">
                                            </div>
                                        </div>
                                        <!--<div class="col-lg-4">-->
                                        <!--    <div class="form-group mb-3">-->
                                        <!--        <label>Password</label>-->
                                        <!--        <input type="text" class="form-control" name="password">-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Description</label>
                                                <textarea type="text" class="form-control" name="description" id="editor" ><?php echo $datacompany->description; ?></textarea> 
                                            </div>
                                        </div>
                                        
                                        <!--permission-->
                                        <!--<h4>Permission</h4>-->
                                        <div class="row d-none">
                                        <div class="col-lg-2">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" name="peremail" type="checkbox" value="1" <?php if($companypermissions->email=='1') {echo 'checked';} ?>>
                                                <label class="form-check-label" for="formCheck1">
                                                    View Email
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-2">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" name="pername" type="checkbox" value="1" <?php if($companypermissions->name=='1') {echo 'checked';} ?>>
                                                <label class="form-check-label" for="formCheck1">
                                                    View Name
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" name="perview_resume" type="checkbox" value="1" <?php if($companypermissions->view_resume=='1') {echo 'checked';} ?>>
                                                <label class="form-check-label" for="formCheck1">
                                                    View Resume
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" name="perdelete_resume" type="checkbox" value="1" <?php if($companypermissions->delete_resume=='1') {echo 'checked';} ?>>
                                                <label class="form-check-label" for="formCheck1">
                                                    Delete Resume
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" name="perphone" type="checkbox" value="1" <?php if($companypermissions->phone=='1') {echo 'checked';} ?>>
                                                <label class="form-check-label" for="formCheck1">
                                                   View Phone
                                                </label>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        <div class="col-lg-2">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" name="peraaplied_job" type="checkbox" value="1" <?php if($companypermissions->aaplied_job=='1') {echo 'checked';} ?>>
                                                <label class="form-check-label" for="formCheck1">
                                                    View Applied Job
                                                </label>
                                            </div>
                                        </div>
                                        
                                        
                                        </div>
                                            
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="submit" class="btn btn-primary" name="submit" value="Update">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

               

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<!-- Required datatable js -->
<?php include 'layouts/footerjs.php' ?>
<!-- Required datatable js -->







</body>

</html>