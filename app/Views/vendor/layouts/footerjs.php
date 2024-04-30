<!-- JAVASCRIPT -->
<?php include 'vendor-scripts.php'; ?>

<!--<script src="<?php echo base_url('assets/libs/jquery/jquery.min.js') ?>"></script>-->
<!-- Required datatable js -->
<script src="<?php echo base_url('/back/assets/libs/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('/back/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Buttons examples -->
<script src="<?php echo base_url('/back/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('/back/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('/back/assets/libs/jszip/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('/back/assets/libs/pdfmake/build/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('/back/assets/libs/pdfmake/build/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('/back/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('/back/assets/libs/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('/back/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') ?>"></script>

<!-- Responsive examples -->
<script src="<?php echo base_url('/back/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('/back/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>

<!-- Datatable init js -->
<script src="<?php echo base_url('/back/assets/js/pages/datatables.init.js') ?>"></script>

<script src="<?php echo base_url('/back/assets/js/app.js') ?>"></script>
<script src="<?php echo base_url('/back/assets/js/pages/form-advanced.init.js') ?>"></script>

<script src="<?php echo base_url('/back/assets/libs/select2/js/select2.min.js') ?>"></script>
<script src="<?php echo base_url('/back/assets/libs/parsleyjs/parsley.min.js') ?>"></script>

<script src="<?php echo base_url('/back/assets/js/pages/form-validation.init.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- dragula plugins -->
<script src="<?php echo base_url('/back/assets/libs/dragula/dragula.min.js')?>"></script>
<script src="<?php echo base_url('/back/assets/js/pages/task-kanban.init.js')?>"></script>
<!--<script src="<?php echo base_url('/back/assets/js/pages/task-form.init.js')?>"></script>-->
<script>
    CKEDITOR.replace('editor')
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
$('.select2').select2({
// multiple: "multiple",
});

});
</script>

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

