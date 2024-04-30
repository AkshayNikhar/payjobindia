<?php 
include 'layouts/head-main.php';
$feedback='';
?>

<head>
    <title><?php echo $seotitle ?></title>
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
                <div class="row justify-content-center">
                
                <div class="col-xl-5 ">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Change Password</h4>

                                <form id="changePass" method="POST" action="<?php echo base_url('/vendor/reset-password') ?>"  >
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Enter old password</label>
                                                <input type="text" class="form-control" name="oldpassword" id="oldpassword">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">New password</label>
                                                <input type="text" class="form-control" name="password" id="password" onkeyup="checkpassword()" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Confirm password</label>
                                                <input type="text" class="form-control" name="cpassword" id="cpassword" onkeyup="checkpassword()" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-3">
										    <div id="error"></div>
										</div>
                                    
                                    
                                    </div>
                                    

                                    <div>
                                        <button type="submit" id="savebtn" class="btn btn-primary w-md">Submit</button>
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
    
		function checkpassword()
        {
            var pwd = document.getElementById("password").value;
            var cpwd = document.getElementById("cpassword").value;
            if (pwd !== "" && cpwd !== "") {
            if(pwd==cpwd)
            {
              document.getElementById("error").style.color ='Green';
              document.getElementById("error").innerHTML ="";
            }
            else
            {
              document.getElementById("error").style.color ='#ff192f';
              document.getElementById("error").innerHTML ="The passwords you entered do not match.";
            }
            }
        }
        
        
        $('form#changePass').submit(function(e){
            document.getElementById('savebtn').innerHTML='<span class="spinner-border spinner-border-sm"></span> Please Wait';
            var form = $(this);
            let urls = form.attr('action');
            e.preventDefault();
            $.ajax({
              url:urls,
              type:"POST",
              data:form.serialize(),
              dataType :'JSON',
              success:function(data){
                if (data.status==1) {
                  $('form#changePass')[0].reset();
                  toastr.success(data.msg);
                  document.getElementById('savebtn').innerHTML='Register';
                  
                  setTimeout(function() {
                location.replace("dashboard");
                 }, 1000);
                }else{
                  document.getElementById('savebtn').innerHTML='Register';
                  toastr.error(data.msg);
                }
              }
            });
          });
</script>
</body>

</html>