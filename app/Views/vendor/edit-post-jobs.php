<?php 
include 'layouts/head-main.php';
?>

<head>
    <title>Add Edit Job Post | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">Add Edit Job Post </h4>
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
                                <form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('vendor/edit-post-jobs'); ?>" novalidate>
                                    
                                    
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Company</label>
                                                <select name="companyid" id="companyid" class="form-control select2">
                                                <option selected hidden>Select ...</option>
                                                <?php
                                                    foreach($companies as $s)
												    {
												        if($s->id == $datajobpost->company_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                    echo '<option value="'.$s->id.'" '.$sel.'>'.$s->company_name.'</option>';
												    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label required">Title</label>
                                                <input type="text" name="title" value="<?php echo $datajobpost->title; ?>" class="form-control border-dark" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Job Category</label>
                                                <select name="job_category_id" id="job_category_id" class="form-select select2">
                                                <option selected hidden>Select ...</option>
                                                <?php
                                                
                                                    foreach($jobcategory as $s)
												    {
												        if($s->id == $datajobpost->jobcategory)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                    echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
												    }
											    
											    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Functional Area</label>
                                                <select name="functional_area_id" id="functional_area_id" class="form-select select2">
                                                <option selected hidden>Select ...</option>
                                                <?php
                                                    foreach($functionarea as $s)
													    {
													        if($s->id == $datajobpost->functional_area_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
													    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Career level</label>
                                                <select name="career_level_id" id="career_level_id" class="form-select">
                                                    <option value=''>Select...</option>
                                                    <?php
                                                        foreach($careerlevel as $s)
    												    {
    												        if($s->id == $datajobpost->career_level_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
    												    }
    											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Education</label>
                                                <select name="degree_level_id" id="degree_level_id" class="form-select">
                                                <option selected hidden>Select ...</option>
                                                <?php
                                                    foreach($degree as $s)
												    {
												        if($s->id == $datajobpost->degree_level_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                    echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
												    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Require degree level</label>
                                                <select name="degree_type_id" id="degree_type_id" class="form-select">
                                                <option selected hidden>Select ...</option>
                                                <?php
                                                    foreach($degreelevel as $s)
												    {
												        if($s->id == $datajobpost->degree_type_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                    echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
												    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Require job experience</label>
                                                <select name="job_experience_id" id="job_experience_id" class="form-select">
                                                    <option value=''>Select experience</option>
                                                    <?php
                                                        foreach($experience as $s)
    												    {
    												        if($s->id == $datajobpost->job_experience_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
    												    }
    											    ?>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Gender</label>
                                                <select name="gender_id" id="gender_id" class="form-select">
                                                    <option value=''>Select Gender</option>
                                                    <?php
                                                        foreach($gender as $s)
    												    {
    												        if($s->id == $datajobpost->gender_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
    												    }
    											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Vacancy type</label>
                                                <select name="vacancy_type" id="vacancy_type" class="form-select" required>
                                                    <option selected hidden>Select Vacancy Type</option>
                                                    <!--<option value='Intership'>Intership</option>-->
                                                    <!--<option value='Jobs'>Jobs</option>-->
                                                    <?php
                                                        foreach($vtype as $s)
    												    {
    												        if($s->id == $datajobpost->vacancy_type)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
    												    }
    											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Job type</label>
                                                <select name="job_type_id" id="job_type_id" class="form-select">
                                                    <option value=''>Select Job type</option>
                                                    <?php
                                                        foreach($jtype as $s)
    												    {
    												        if($s->id == $datajobpost->job_type_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
    												    }
    											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Job shift</label>
                                                <select name="job_shift_id" id="job_shift_id" class="form-select">
                                                    <option value=''>Select Job shift</option>
                                                    <?php
                                                        foreach($jshift as $s)
    												    {
    												        if($s->id == $datajobpost->job_shift_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
    												    }
    											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label required">Vacancies</label>
                                                <input type="text" name="vacancies" value="<?php echo $datajobpost->vacancies; ?>" class="form-control border-dark" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Country</label>
                                                <select name="country_id" id="country_id" class="form-select">
                                                    <option value=''>Select Country</option>
                                                    <?php
                                                        foreach($country as $s)
    												    {
    												        if($s->id == $datajobpost->country_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
    												    }
    											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>State</label>
                                                <select name="state_id" id="state_id" class="form-select">
                                                    <option value=''>Select State</option>
                                                    <?php
                                                        foreach($state as $s)
    												    {
    												        if($s->id == $datajobpost->state_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
    												    }
    											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>City</label>
                                                <select name="city_id" id="city_id" class="form-select">
                                                    <option value=''>Select City</option>
                                                    <?php
                                                        foreach($city as $s)
    												    {
    												        if($s->id == $datajobpost->city_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
    												    }
    											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label required">Salary from</label>
                                                <input type="text" name="salary_from" value="<?php echo $datajobpost->salary_from; ?>" class="form-control border-dark" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label required">Salary to</label>
                                                <input type="text" name="salary_to" value="<?php echo $datajobpost->salary_to; ?>" class="form-control border-dark" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label required">Salary Currency</label>
                                                <select name="salary_currency" class="form-control border-dark" required="">
                                                    <option value="INR" <?php if($datajobpost->salary_currency=='INR') {echo 'selected';} ?>>INR</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label required">Work Mode</label>
                                                <select name="work_mode" class="form-select" required="">
                                                        <option value="onsite" <?php if($datajobpost->work_mode=='onsite') {echo 'selected';} ?>>Onsite</option>
                                                        <option value="hybrid" <?php if($datajobpost->work_mode=='hybrid') {echo 'selected';} ?>>Hybrid</option>
                                                        <option value="remote" <?php if($datajobpost->work_mode=='remote') {echo 'selected';} ?>>Remote</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Salary period</label>
                                                <select name="salary_period_id" id="salary_period_id" class="form-select">
                                                    <option value=''>Select Salary period</option>
                                                    <?php
                                                        foreach($salaryperiod as $s)
    												    {
    												        if($s->id == $datajobpost->salary_period_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                        echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
    												    }
    											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label required">Expiry date</label>
                                                <input type="date" name="expiry_date" value="<?php echo $datajobpost->expiry_date; ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Address</label>
                                                <textarea type="text" class="form-control" name="address" required><?php echo $datajobpost->address; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="id" value="<?php echo $datajobpost->id; ?>"    
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Job Description</label>
                                                <textarea type="text" id="editor" class="form-control" name="company_des" required><?php echo $datajobpost->company_des; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Responbilities</label>
                                                <textarea type="text" id="editor1" class="form-control" name="company_responbility_home" required><?php echo $datajobpost->company_responbility_home; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Requirements</label>
                                                <textarea type="text" id="editor2" class="form-control" name="company_requirement_home" required><?php echo $datajobpost->company_requirement_home; ?></textarea>
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
<script>
$(document).ready(function () {
$("#country_id").change(function () {
var countryid = $(this).val(); // Get the selected state ID
var urls = "<?= base_url('')?>/get-stateid-by-countryid/" + countryid;

$.ajax({
    url: urls,
    method: "GET",
    success: function (data) {
        // console.log(data);
        document.getElementById('state_id').innerHTML=data;
    }
});
});
});
</script>
<script>
$(document).ready(function () {
$("#state_id").change(function () {
var stateid = $(this).val(); // Get the selected state ID
var urls = "<?= base_url('')?>/get-cityid-by-stateid/" + stateid;

$.ajax({
    url: urls,
    method: "GET",
    success: function (data) {
        // console.log(data);
        document.getElementById('city_id').innerHTML=data;
    }
});
});
});
</script>
<script>
$(document).ready(function () {
$("#job_category_id").change(function () {
var jobcategoryid = $(this).val(); // Get the selected state ID
var urls = "<?= base_url('')?>/get-functionid-by-jobcateid/" + jobcategoryid;

$.ajax({
    url: urls,
    method: "GET",
    success: function (data) {
        // console.log(data);
        document.getElementById('functional_area_id').innerHTML=data;
    }
});
});
});
</script>

<script>
$(document).ready(function () {
$("#functional_area_id").change(function () {
var functionareaid = $(this).val(); // Get the selected state ID
var urls = "<?= base_url('')?>/get-careerlevelid-by-functionareaid/" + functionareaid;

$.ajax({
    url: urls,
    method: "GET",
    success: function (data) {
        // console.log(data);
        document.getElementById('career_level_id').innerHTML=data;
    }
});
});
});
</script>
<script>
$(document).ready(function () {
$("#degree_level_id").change(function () {
var degreelevelid = $(this).val(); // Get the selected state ID
var urls = "<?= base_url('')?>/get-educationid-by-degreelevelid/" + degreelevelid;

$.ajax({
    url: urls,
    method: "GET",
    success: function (data) {
        // console.log(data);
        document.getElementById('degree_type_id').innerHTML=data;
    }
});
});
});
</script>

<script>
$(document).ready(function () {
$("#functional_area_id").change(function () {
var jobcategoryid = $(this).val(); // Get the selected state ID
var urls = "<?= base_url('')?>/get-job-category-byid/" + jobcategoryid;

$.ajax({
    url: urls,
    method: "GET",
    success: function (data) {
        console.log(data);
        const jsonObject = JSON.parse(data);
        const descValue = jsonObject.desc;
        const respValue = jsonObject.resp;
        const reqValue = jsonObject.req;
        
        
        const editor = CKEDITOR.instances.editor;
        const editor1 = CKEDITOR.instances.editor1;
        const editor2 = CKEDITOR.instances.editor2;
        
       
        // document.getElementById('editor').innerHTML=data.description;
        editor.setData(descValue);
        editor1.setData(respValue);
        editor2.setData(reqValue);
        
        // document.getElementById('company_des').value = jsonObject.desc;
    }
});
});
});
</script>
<script>
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
</script>

</body>

</html>