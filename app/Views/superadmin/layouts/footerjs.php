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

<script src="<?php echo base_url('/back/assets/libs/parsleyjs/parsley.min.js') ?>"></script>

<script src="<?php echo base_url('/back/assets/js/pages/form-validation.init.js') ?>"></script>

<script src="<?php echo base_url('/back/assets/js/pages/form-advanced.init.js') ?>"></script>

<script src="<?php echo base_url('/back/assets/libs/select2/js/select2.min.js') ?>"></script>



<script src="<?php echo base_url('back/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?php echo base_url('back/assets/libs/spectrum-colorpicker2/spectrum.min.js')?>"></script>
<script src="<?php echo base_url('back/assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js')?>"></script>
<script src="<?php echo base_url('back/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')?>"></script>
<script src="<?php echo base_url('back/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')?>"></script>
<script src="<?php echo base_url('back/assets/libs/%40chenfengyuan/datepicker/datepicker.min.js')?>"></script>


<script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
<script src="https://htmlstream.com/preview/front-v2.9.0/assets/vendor/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!--<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>-->

<script>
    CKEDITOR.replace('editor')
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
$('.select2').select2({
// multiple: "multiple",
});

$('#job_category_id').on('change', function() {
        if ($(this).val() && $(this).val().includes('all')) {
            // If "Select All" is selected, select all other options
            $(this).val($(this).find('option').not(':first').map(function() {
                return this.value;
            }).get());
            $(this).trigger('change');
        }
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

<script>
    $(document).ready(function() {
    $('#datatable1-buttons').DataTable( {
        dom: 'Bfrtip',
        // buttons: [
        //     'excel', 'pdf'
        // ],
         lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength','excel', 'pdf'
        ]
    } );
} );
</script>

<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            // 'copyHtml5',
            'excelHtml5',
            // 'csvHtml5',
            // 'pdfHtml5'
        ]
    } );
} );
</script>

