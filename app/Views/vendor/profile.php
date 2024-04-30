<?php 
 

include 'layouts/head-main.php';
$feedback='';
// if(isset($_POST['delete']))
// {
//      $memberid=$_POST['memberid'];
     
//      $delete="Delete from members where id=$memberid";
//      if($conn->query($delete))
//         {
//             $feedback='<div class="alert alert-success">Member deleted successfully </div>';
//         }
// }
?>

<head>
    <title>Vendor Profile | Pay Job India</title>
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
                <div class="row justify content center">
                
               <div class="col-xl-9">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Company Profile</h4>

                                <form id="editForm" method="POST" action=""  enctype="multipart/form-data">
                                <!--<form id="editForm" method="POST" action="<?php echo base_url('/company/edit-profile') ?>"  enctype="multipart/form-data">-->
                                    <div class="row">
                                     <input type="hidden" name="venid" id="formrow-firstname-input" value="<?php echo $customerid ?>">
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Company Name</label>
                                                <input type="text" class="form-control" name="company_name" value="<?php echo $companydetails->name; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Company Email</label>
                                                <input type="text" class="form-control" name="company_email" value="<?php echo $companydetails->email; ?>" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Company Contact No.</label>
                                                <input type="text" class="form-control" name="phone" value="<?php echo $companydetails->phone; ?>" readonly required>
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
													        if($countrys->id == $companydetails->country)
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
													        if($states->id == $companydetails->state)
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
													        if($citys->id == $companydetails->city)
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
                                                <label>Role</label>
                                                <select name="city_id" id="city_id" class="form-select select2">
                                                <option selected hidden>Select City ...</option>
                                                <?php
                                                   
												    foreach($city as $citys)
													    {
													        if($citys->id == $companydetails->city)
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
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Address</label>
                                                <textarea type="text" class="form-control" name="twitter"><?php echo $companydetails->address; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <!--<div class="col-lg-4">-->
                                        <!--    <div class="form-group mb-3">-->
                                        <!--        <label>Password</label>-->
                                        <!--        <input type="text" class="form-control" name="password">-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        
                                        
                                    
                                    
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