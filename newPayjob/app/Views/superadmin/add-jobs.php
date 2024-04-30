<?php 
include 'layouts/head-main.php';
?>

<head>
    <title>Add Job | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">Add Job </h4>
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
                                <form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('superadmin/create-jobs'); ?>" novalidate>
                                    
                                    
                                    <div class="row">
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label required">Title</label>
                                                <input type="text" name="title" class="form-control border-dark" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Functional Area</label>
                                                <select name="functional_area_id" id="functional_area_id" class="form-select">
                                                <option selected hidden>Select ...</option>
                                                <?php
                                                    foreach($functionarea as $s)
												    {
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
                                                    echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
												    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group mb-3">
                                                <label>Company</label>
                                                <select name="companyid" id="companyid" class="form-select">
                                                <option selected hidden>Select ...</option>
                                                <?php
                                                    foreach($companies as $s)
												    {
                                                    echo '<option value="'.$s->id.'" '.$sel.'>'.$s->company_name.'</option>';
												    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-top: 20px;padding-bottom: 20px;background: #212f7c29;">
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Allow Active Status</label>
                                                <select name="is_active" id="is_active" class="form-select" required>
                                                <option selected>Select Status ...</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group mb-3">
                                                <label>Enable Urgent Job</label>
                                                <small class="text-primary">(With urgent job featured your job will be a prominent badge, show up on website homepage, suggestions for candidates...)</small>
                                                <select name="is_featured" id="is_featured" class="form-select" required>
                                                <option selected>Select Feature ...</option>
                                                <option value="1">Enable</option>
                                                <option value="0">Disable</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="row" style="margin-top: 20px;">
                                    
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Career level</label>
                                                <select name="career_level_id" id="career_level_id" class="form-select">
                                                    <option value=''>Select Career level</option>
                                                    <?php
                                                        foreach($careerlevel as $s)
    												    {
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
                                                        echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
    												    }
    											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label required">Vacancies</label>
                                                <input type="text" name="vacancies" class="form-control border-dark" required>
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
                                                        echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
    												    }
    											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label required">Salary from</label>
                                                <input type="text" name="salary_from" class="form-control border-dark" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label required">Salary to</label>
                                                <input type="text" name="salary_to" class="form-control border-dark" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-none">
                                            <div class="form-group mb-3">
                                                <label class="form-label required">Salary Currency</label>
                                                 <select name="salary_currency" class="form-control border-dark" required="">
                                                        <option value="AED">AED</option>
                                                        <option value="AF">AF</option>
                                                        <option value="ALL">ALL</option>
                                                        <option value="ANG">ANG</option>
                                                        <option value="ARS">ARS</option>
                                                        <option value="AUD">AUD</option>
                                                        <option value="AWG">AWG</option>
                                                        <option value="AZ">AZ</option>
                                                        <option value="BAM">BAM</option>
                                                        <option value="BBD">BBD</option>
                                                        <option value="BG">BG</option>
                                                        <option value="BMD">BMD</option>
                                                        <option value="BOB">BOB</option>
                                                        <option value="BRL">BRL</option>
                                                        <option value="BWP">BWP</option>
                                                        <option value="BYR">BYR</option>
                                                        <option value="CAD">CAD</option>
                                                        <option value="CHF">CHF</option>
                                                        <option value="CLP">CLP</option>
                                                        <option value="CNY">CNY</option>
                                                        <option value="COP">COP</option>
                                                        <option value="CRC">CRC</option>
                                                        <option value="CUP">CUP</option>
                                                        <option value="CZK">CZK</option>
                                                        <option value="DKK">DKK</option>
                                                        <option value="DOP">DOP</option>
                                                        <option value="EGP">EGP</option>
                                                        <option value="EUR">EUR</option>
                                                        <option value="FKP">FKP</option>
                                                        <option value="GBP">GBP</option>
                                                        <option value="GHC">GHC</option>
                                                        <option value="GIP">GIP</option>
                                                        <option value="GTQ">GTQ</option>
                                                        <option value="GYD">GYD</option>
                                                        <option value="HNL">HNL</option>
                                                        <option value="HUF">HUF</option>
                                                        <option value="IDR">IDR</option>
                                                        <option value="ILS">ILS</option>
                                                        <option value="INR">INR</option>
                                                        <option value="IRR">IRR</option>
                                                        <option value="ISK">ISK</option>
                                                        <option value="JEP">JEP</option>
                                                        <option value="JMD">JMD</option>
                                                        <option value="JPY">JPY</option>
                                                        <option value="KGS">KGS</option>
                                                        <option value="KHR">KHR</option>
                                                        <option value="KYD">KYD</option>
                                                        <option value="KZT">KZT</option>
                                                        <option value="LAK">LAK</option>
                                                        <option value="LBP">LBP</option>
                                                        <option value="LKR">LKR</option>
                                                        <option value="LRD">LRD</option>
                                                        <option value="LTL">LTL</option>
                                                        <option value="LVL">LVL</option>
                                                        <option value="MKD">MKD</option>
                                                        <option value="MNT">MNT</option>
                                                        <option value="MUR">MUR</option>
                                                        <option value="MX">MX</option>
                                                        <option value="MYR">MYR</option>
                                                        <option value="MZ">MZ</option>
                                                        <option value="NAD">NAD</option>
                                                        <option value="NG">NG</option>
                                                        <option value="NIO">NIO</option>
                                                        <option value="NOK">NOK</option>
                                                        <option value="NPR">NPR</option>
                                                        <option value="NZD">NZD</option>
                                                        <option value="OMR">OMR</option>
                                                        <option value="PAB">PAB</option>
                                                        <option value="PE">PE</option>
                                                        <option value="PHP">PHP</option>
                                                        <option value="PKR">PKR</option>
                                                        <option value="PL">PL</option>
                                                        <option value="PYG">PYG</option>
                                                        <option value="QAR">QAR</option>
                                                        <option value="RO">RO</option>
                                                        <option value="RSD">RSD</option>
                                                        <option value="RUB">RUB</option>
                                                        <option value="SAR">SAR</option>
                                                        <option value="SBD">SBD</option>
                                                        <option value="SCR">SCR</option>
                                                        <option value="SEK">SEK</option>
                                                        <option value="SGD">SGD</option>
                                                        <option value="SHP">SHP</option>
                                                        <option value="SOS">SOS</option>
                                                        <option value="SRD">SRD</option>
                                                        <option value="SVC">SVC</option>
                                                        <option value="SYP">SYP</option>
                                                        <option value="THB">THB</option>
                                                        <option value="TRY">TRY</option>
                                                        <option value="TTD">TTD</option>
                                                        <option value="TVD">TVD</option>
                                                        <option value="TWD">TWD</option>
                                                        <option value="UAH">UAH</option>
                                                        <option value="USD">USD</option>
                                                        <option value="UYU">UYU</option>
                                                        <option value="UZS">UZS</option>
                                                        <option value="VEF">VEF</option>
                                                        <option value="VND">VND</option>
                                                        <option value="YER">YER</option>
                                                        <option value="ZAR">ZAR</option>
                                                        <option value="ZWD">ZWD</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label required">Salary Currency</label>
                                                <select name="salary_currency" class="form-control border-dark" required="">
                                                    <option value="INR">INR</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label required">Work Mode</label>
                                                <select name="work_mode" class="form-select" required="">
                                                        <option value="onsite">Onsite</option>
                                                        <option value="hybrid">Hybrid</option>
                                                        <option value="remote">Remote</option>
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
                                                        echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
    												    }
    											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label required">Expiry date</label>
                                                <input type="date" name="expiry_date" class="form-control border-dark" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Status</label>
                                                <select name="is_active" id="is_active" class="form-select">
                                                <option selected>Select Status ...</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Address</label>
                                                <textarea type="text" class="form-control" name="address" required></textarea>
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="companyid" value="0"    
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Job Description</label>
                                                <textarea type="text" id="editor" class="form-control" name="description" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Responbilities</label>
                                                <textarea type="text" id="editor1" class="form-control" name="responbilities" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Requirements</label>
                                                <textarea type="text" id="editor2" class="form-control" name="requirements" required></textarea>
                                            </div>
                                        </div>


                                       <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="submit" class="btn btn-primary" name="submit" value="Add">
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
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
</script>

</body>

</html>