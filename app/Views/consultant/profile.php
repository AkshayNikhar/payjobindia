<?php 
 

include 'layouts/head-main.php';
$feedback='';

?>

<head>
    <title>Consultant Profile | Pay Job India</title>
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
                <div class="row">
                <div class="col-xl-3">
                    <?php
                    if(empty($companydetails->logo)){
                    ?>
                    <img src="https://placehold.jp/500x500.png" style="width:100%">
                    <?php } else { ?>
                    <img src="<?php echo base_url('back/assets/images/company_logo/'.$companydetails->logo)?>" style="width:100%">
                    <?php } ?>
                </div>
               <div class="col-xl-9">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Consultant Profile</h4>

                                <form id="editForm" method="POST" action="<?php echo base_url('/consultant/edit-profile') ?>"  enctype="multipart/form-data">
                                    <div class="row">
                                     <input type="hidden" name="empid" id="formrow-firstname-input" value="<?php echo $customerid ?>">
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="company_name" value="<?php echo $companydetails->company_name; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="company_email" value="<?php echo $companydetails->company_email; ?>" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label> Contact No.</label>
                                                <input type="text" class="form-control" name="phone" value="<?php echo $companydetails->phone; ?>" readonly required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Logo</label>
                                                <input type="file" class="form-control" name="image" >
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
													        if($indus->id == $companydetails->industry_id)
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
                                                <label>CEO</label>
                                                <input type="text" class="form-control" name="companyceo" value="<?php echo $companydetails->company_ceo; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Type</label>
                                                <select name="ownership_type_id" id="ownership_type_id" class="form-select select2">
                                                <option selected hidden>Select Ownership ...</option>
                                                
                                                <?php 
                                                foreach($ownership as $own)
													    {
													        if($own->id == $companydetails->ownership_type_id)
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
                                                <option value="1-10" <?php if($companydetails->no_of_employees=='1-10') {echo 'selected';} ?>>1-10</option>
                                                <option value="11-50" <?php if($companydetails->no_of_employees=='11-50') {echo 'selected';} ?>>11-50</option>
                                                <option value="51-100" <?php if($companydetails->no_of_employees=='51-100') {echo 'selected';} ?>>51-100</option>
                                                <option value="101-200" <?php if($companydetails->no_of_employees=='101-200') {echo 'selected';} ?>>101-200</option>
                                                <option value="201-300" <?php if($companydetails->no_of_employees=='201-300') {echo 'selected';} ?>>201-300</option>
                                                <option value="301-600" <?php if($companydetails->no_of_employees=='301-600') {echo 'selected';} ?>>301-600</option>
                                                <option value="601-1000" <?php if($companydetails->no_of_employees=='601-1000') {echo 'selected';} ?>>601-1000</option>
                                                <option value="1001-1500" <?php if($companydetails->no_of_employees=='1001-1500') {echo 'selected';} ?>>1001-1500</option>
                                                <option value="1501-2000" <?php if($companydetails->no_of_employees=='1501-2000') {echo 'selected';} ?>>1501-2000</option>
                                                <option value="2001-2500" <?php if($companydetails->no_of_employees=='2001-2500') {echo 'selected';} ?>>2001-2500</option>
                                                <option value="2501-3000" <?php if($companydetails->no_of_employees=='2501-3000') {echo 'selected';} ?>>2501-3000</option>
                                                <option value="3001-3500" <?php if($companydetails->no_of_employees=='3501-4000') {echo 'selected';} ?>>3001-3500</option>
                                                <option value="3501-4000" <?php if($companydetails->no_of_employees=='3501-4000') {echo 'selected';} ?>>3501-4000</option>
                                                <option value="4001-4500" <?php if($companydetails->no_of_employees=='4001-4500') {echo 'selected';} ?>>4001-4500</option>
                                                <option value="4501-5000" <?php if($companydetails->no_of_employees=='4501-5000') {echo 'selected';} ?>>4501-5000</option>
                                                <option value="5000+" <?php if($companydetails->no_of_employees=='5000+') {echo 'selected';} ?>>5000+</option>
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
													        if($listno == $companydetails->no_of_offices)
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
													        if($year == $companydetails->established_in)
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
													        if($countrys->id == $companydetails->country_id)
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
													        if($states->id == $companydetails->state_id)
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
													        if($citys->id == $companydetails->city_id)
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
                                                <input type="text" class="form-control" name="website" value="<?php echo $companydetails->website; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Fax</label>
                                                <input type="text" class="form-control" name="fax" value="<?php echo $companydetails->fax; ?>">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Facebook Link</label>
                                                <input type="text" class="form-control" name="facebook" value="<?php echo $companydetails->facebook; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Twitter link</label>
                                                <input type="text" class="form-control" name="twitter" value="<?php echo $companydetails->twitter; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Linkedin link</label>
                                                <input type="text" class="form-control" name="linkedin" value="<?php echo $companydetails->linkedin; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Youtube link</label>
                                                <input type="text" class="form-control" name="youtube" value="<?php echo $companydetails->youtube; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Pinterest link</label>
                                                <input type="text" class="form-control" name="pinterest" value="<?php echo $companydetails->pinterest; ?>">
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
                                                <textarea type="text" class="form-control" name="description" id="editor" ><?php echo $companydetails->description; ?></textarea> 
                                            </div>
                                        </div>
                                    
                                    
                                    </div>
                                    

                                    

                                    
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                    
                    </div>

               

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        
         

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Required datatable js -->
<?php include 'layouts/footerjs.php' ?>



<script>
    function deleteRow(id) {
        $('#member-id').val(id);
        // Call Modal Delete
        $('#deleteModal').modal('show');
    }
</script>
<script>
    $(document).ready(function () {
        $("#state").change(function () {
            var stateid = $(this).val(); // Get the selected state ID
            var urls = "<?php echo base_url() ?>/get-cityid-by-stateid/" + stateid;

            $.ajax({
                url: urls,
                method: "GET",
                success: function (data) {
                    // console.log(data);
                    document.getElementById('cityid').innerHTML=data;
                }
            });
        });
    });
</script>
</body>

</html>