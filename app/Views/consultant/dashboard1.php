<?php 
include 'layouts/head-main.php';
// echo $_SESSION["cusemail"];
?>

<head>
    <title>Dashbord | Farmer</title>
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
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card overflow-hidden">
                            <div class="bg-success bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-3">
                                            <h5 class="text-white">Welcome Back !</h5>
                                            <p class="text-white">Farmer Dashboard</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="<?php echo base_url('back/assets/images/profile-img.png')?>" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <img src="<?php echo base_url('back/assets/images/users/user.png')?>" alt="" class="img-thumbnail rounded-circle">
                                        </div>
                                        <h5 class="font-size-15 text-truncate">Admin</h5>
                                        <!--<p class="text-muted mb-0 text-truncate">Admin</p>-->
                                    </div>

                                   
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Orders</p>
                                                <h4 class="mb-0">1,235</h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-success align-self-center">
                                                <span class="avatar-title bg-success">
                                                    <i class="bx bx-copy-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Booking</p>
                                                <h4 class="mb-0">$35, 723</h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-success align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-success">
                                                    <i class="bx bx-archive-in font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Services</p>
                                                <h4 class="mb-0">$16.2</h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-success align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-success">
                                                    <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Crop Management</p>
                                                <h4 class="mb-0">$16.2</h4>
                                            </div>

                                            <div class="avatar-sm rounded-circle bg-success align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-success">
                                                    <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div>
                    
                     
                            
                
                    
                </div>
                <!-- end row -->
                
                <!--Todo List start-->
                <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none d-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end d-none">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                            <div class="text-center d-grid">
                                                <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light addtask-btn" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-id="#upcoming-task"><i class="mdi mdi-plus me-1"></i> Add New</a>
                                            </div>
                                            
                                        </div> <!-- end dropdown -->
        
                                        <h4 class="card-title mb-4">Upcoming Task</h4>
                                        <div id="task-1">
                                            <div id="upcoming-task" class="pb-1 task-list">
                                                <div class="row">
                                                    <?php
                                                        $sr=0;
                                                        foreach($tasklist as $list)
                                                        {
                                                            $sr++;
                                                            $id=$list->tid;
                                                            // $slug=$list->croptype_slug;
                                                            
                                                            if($list->tstatus == 'Pending'){
                                                              $status="warning";
                                                            }
                                                            else if($list->tstatus == 'Approved'){
                                                                $status="primary";
                                                            }
                                                            else if($list->tstatus == 'Complete'){
                                                                $status="success";
                                                            }
                                                            else if($list->tstatus == 'Waiting'){
                                                                $status="secondary";
                                                            }
                                                            else{
                                                                $status="danger";
                                                            }
                                                            
                                                    ?>
                                                    <div class="col-lg-4">
                                                        <div class="card task-box" id="uptask-1">
                                                            <div class="card-body">
                                                                <div class="dropdown float-end">
                                                                    <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <button class="dropdown-item edittask-details" id="taskedit" data-id="#uptask-1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" onclick="updateRow(<?= esc($list->tid) ?>)">Edit</button>
                                                                        <a class="dropdown-item deletetask" href="javascript:void()" data-id="#uptask-1" onclick="openDeleteModal(<?= esc($id) ?>)" >Delete</a>
                                                                    </div>
                                                                </div> <!-- end dropdown -->
                                                                <div class="float-end ml-2">
                                                                    <span class="badge rounded-pill badge-soft-<?php echo $status ?> secondarye-12" id="task-status"><?= esc($list->tstatus) ?></span>
                                                                </div>
                                                                <div>
                                                                    <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name"><?= esc($list->tname) ?></a></h5>
                                                                    <p class="text-muted mb-4"><?php echo date('d M Y',strtotime($list->tdate)) ?></p>
                                                                    <p class="text-muted mt-"><?php echo $list->tdes ?> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <!-- end task card -->
                                                    </div>
                                                    <?
                                                    }
                                                    ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                       
                       <!--Task Model-->
                       <div id="modalForm" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0 add-task-title">Add New Task</h5>
                                <h5 class="modal-title mt-0 update-task-title" style="display: none;">Update Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="NewtaskForm" role="form" method="POST" action="<?= base_url('/farmer/add-task'); ?>">
                                    <div class="form-group mb-3">
                                        <label for="taskname" class="col-form-label">Task Name<span class="text-danger">*</span></label>
                                        <div class="col-lg-12">
                                            <input id="taskname" name="taskname" type="text" class="form-control validate" placeholder="Enter Task Name..." required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="taskdate" class="col-form-label">Task Date<span class="text-danger">*</span></label>
                                        <div class="col-lg-12">
                                            <input id="taskdate" name="taskdate" type="date" class="form-control validate" required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-form-label">Task Description</label>
                                        <div class="col-lg-12">
                                            <textarea id="taskdesc" class="form-control" type="text" name="taskdesc"></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="uid" value="<?php echo $customerid ?>">
                                    <div class="form-group mb-4">
                                        <label class="col-form-label">Status<span class="text-danger">*</span></label>
                                        <div class="col-lg-12">
                                            <select class="form-select validate" id="taskstatus" name="taskstatus" >
                                                <option value="" selected>Choose..</option>
                                                <!--<option value="Pending">Pending</option>-->
                                                <option value="Waiting">Waiting</option>
                                                <!--<option value="Approved">Approved</option>-->
                                                <option value="Complete">Complete</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="tid" />
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <button type="submit" class="btn btn-primary" id="addtask" name="submit">Save</button>
                                            <!--<button type="button" class="btn btn-primary" id="updatetaskdetail">Update Task</button>-->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                        <!-- /.Task Modal -->     
                <!--Todo List end-->
                
                <!--callender start-->
                <div class="row d-none">
                    <div class="col-12">

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-grid">
                                            <button class="btn font-16 btn-primary" id="btn-new-event"><i class="mdi mdi-plus-circle-outline"></i> Create
                                                New Event</button>
                                        </div>

                                        <div id="external-events" class="mt-2">
                                            <br>
                                            <p class="text-muted">Drag and drop your event or click in the calendar</p>
                                            <div class="external-event fc-event bg-success" data-class="bg-success">
                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>New Event Planning
                                            </div>
                                            <div class="external-event fc-event bg-info" data-class="bg-info">
                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Meeting
                                            </div>
                                            <div class="external-event fc-event bg-warning" data-class="bg-warning">
                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Generating Reports
                                            </div>
                                            <div class="external-event fc-event bg-danger" data-class="bg-danger">
                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Create New theme
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mt-5">
                                            <img src="<?php echo base_url('back/assets/images/verification-img.png')?>" alt="" class="img-fluid d-block">
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                        </div>

                        <div style='clear:both'></div>


                        <!-- Add New Event MODAL -->
                        <div class="modal fade" id="event-modal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header py-3 px-4 border-bottom-0">
                                        <h5 class="modal-title" id="modal-title">Event</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Event Name</label>
                                                        <input class="form-control" placeholder="Insert Event Name" type="text" name="event-title" id="event-title" required value="" />
                                                        <div class="invalid-feedback">Please provide a valid event name</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Event Start Date</label>
                                                        <input class="form-control" placeholder="Insert Event Name" type="date" name="event-sdate" id="event-sdate" required value="" />
                                                        <div class="invalid-feedback">Please provide a valid event Date</div>
                                                    </div>
                                                </div>
                                                <input class="form-control" placeholder="Insert Event Name" type="hidden" name="event-date" id="event-date" required value="" />
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Event End Date</label>
                                                        <input class="form-control" placeholder="Insert Event Name" type="date" name="event-edate" id="event-edate" required value="" />
                                                        <div class="invalid-feedback">Please provide a valid event End Date</div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Category</label>
                                                        <select class="form-control form-select" name="event-category" id="event-category">
                                                            <option selected> --Select-- </option>
                                                            <option value="bg-danger">Danger</option>
                                                            <option value="bg-success">Success</option>
                                                            <option value="bg-primary">Primary</option>
                                                            <option value="bg-info">Info</option>
                                                            <option value="bg-dark">Dark</option>
                                                            <option value="bg-warning">Warning</option>
                                                        </select>
                                                        <div class="invalid-feedback">Please select a valid event category</div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Event Description</label>
                                                        <textarea class="form-control" type="text" name="event-msg" id="event-msg" required></textarea>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                                </div>
                                            </div>
                                            <input type="hidden" name="event-id" id="event-id" value="">
                                        </form>
                                    </div>
                                </div> <!-- end modal-content-->
                            </div> <!-- end modal dialog-->
                        </div>
                        <!-- end modal-->

                    </div>
                </div>
                <!--callender end-->
                
               
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!--Delete Modal-->
<div id="deleteModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Delete Crop</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
			    <h5>Are you sure you want to Delete this Task?</h5>
				<form method="POST" action="task-delete" class="needs-validation" novalidate>
				    <input type="hidden" name="deleteId" id="deleteId">
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Yes">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Delete Modal -->


<!-- /Right-bar -->



<?php include 'layouts/footerjs.php'; ?>



<!--<script src="<!?php echo base_url('/back/assets/js/app.js') ?>"></script>-->
<!-- plugin js -->
<script src="<?php echo base_url('/back/assets/js/main.js')?>"></script>

<!-- Calendar init -->
<script>
    !function ($) {
    "use strict";

    var CalendarPage = function () { };

    CalendarPage.prototype.init = function () {

        var addEvent = $("#event-modal");
        var modalTitle = $("#modal-title");
        var formEvent = $("#form-event");
        var selectedEvent = null;
        var newEventData = null;
        var forms = document.getElementsByClassName('needs-validation');
        var selectedEvent = null;
        var newEventData = null;
        var eventObject = null;
        /* initialize the calendar */

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var Draggable = FullCalendar.Draggable;
        var externalEventContainerEl = document.getElementById('external-events');
        // init dragable
        new Draggable(externalEventContainerEl, {
            itemSelector: '.external-event',
            eventData: function (eventEl) {
                return {
                    title: eventEl.innerText,
                    className: $(eventEl).data('class')
                };
            }
        });
        var defaultEvents = [{
            title: 'All Day Event',
            start: new Date(y, m, 1)
        },
        {
            title: 'Long Event',
            start: new Date(y, m, d - 5),
            end: new Date(y, m, d - 2),
            className: 'bg-warning'
        },
        {
            id: 999,
            title: 'Repeating Event',
            start: new Date(y, m, d - 3, 16, 0),
            allDay: false,
            className: 'bg-info'
        },
        {
            id: 999,
            title: 'Repeating Event',
            start: new Date(y, m, d + 4, 16, 0),
            allDay: false,
            className: 'bg-primary'
        },
        {
            title: 'Meeting',
            start: new Date(y, m, d, 10, 30),
            allDay: false,
            className: 'bg-success'
        },
        {
            title: 'Lunch',
            start: new Date(y, m, d, 12, 0),
            end: new Date(y, m, d, 14, 0),
            allDay: false,
            className: 'bg-danger'
        },
        {
            title: 'Birthday Party',
            start: new Date(y, m, d + 1, 19, 0),
            end: new Date(y, m, d + 1, 22, 30),
            allDay: false,
            className: 'bg-success'
        },
        {
            title: 'Click for Google',
            start: new Date(y, m, 28),
            end: new Date(y, m, 29),
            url: 'http://google.com/',
            className: 'bg-dark'
        }];

        var draggableEl = document.getElementById('external-events');
        var calendarEl = document.getElementById('calendar');

        function addNewEvent(info) {
            addEvent.modal('show');
            formEvent.removeClass("was-validated");
            formEvent[0].reset();

            $("#event-title").val();
            $('#event-category').val();
            modalTitle.text('Add Event');
            newEventData = info;
        }
        function getInitialView() {
            if (window.innerWidth >= 768 && window.innerWidth < 1200) {
                return 'timeGridWeek';
            } else if (window.innerWidth <= 768) {
                return 'listMonth';
            } else {
                return 'dayGridMonth';
            }
        }


        var calendar = new FullCalendar.Calendar(calendarEl, {
            editable: true,
            droppable: true,
            selectable: true,
            initialView: getInitialView(),
            themeSystem: 'bootstrap',
            // responsive
            windowResize: function (view) {
                var newView = getInitialView();
                calendar.changeView(newView);
            },
            eventDidMount: function (info) {
                if (info.event.extendedProps.status === 'done') {

                    // Change background color of row
                    info.el.style.backgroundColor = 'red';

                    // Change color of dot marker
                    var dotEl = info.el.getElementsByClassName('fc-event-dot')[0];
                    if (dotEl) {
                        dotEl.style.backgroundColor = 'white';
                    }
                }
            },
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            eventClick: function (info) {
                addEvent.modal('show');
                formEvent[0].reset();
                selectedEvent = info.event;
                
                
                
                // $('#event-id').val(event.publicId);
                console.log(selectedEvent);
                $("#event-id").val(selectedEvent.id);
                $("#event-title").val(selectedEvent.title);
                $('#event-category').val(selectedEvent.classNames[0]);
                $('#event-date').val(selectedEvent.start);
                
                
                console.log(info);
                // Input start date string
                var inputDate =selectedEvent.extendedProps.sdate;
                var date = new Date(inputDate);
                var day = date.getDate();
                var month = date.getMonth() + 1; // Month is zero-based, so we add 1
                var year = date.getFullYear();
                var formattedstartDate = year + '-' + (month < 10 ? '0' : '') + month + '-' + day;
                document.getElementById("event-sdate").value = formattedstartDate;
                
                // Input End date string
                var inputDate1 =selectedEvent.extendedProps.edate;
                var date1 = new Date(inputDate1);
                var day1 = date1.getDate();
                var month1 = date1.getMonth() + 1; // Month is zero-based, so we add 1
                var year1 = date1.getFullYear();
                var formattedstartDate1 = year1 + '-' + (month1 < 10 ? '0' : '') + month1 + '-' + day1;
                document.getElementById("event-edate").value = formattedstartDate1;



                // Use .html() to set the innerHTML for an element
                $('#event-msg').html(selectedEvent.extendedProps.message);
                
                // var eventId = selectedEvent.id;
    
                newEventData = null;
                modalTitle.text('Edit Event');
                newEventData = null;
                
                $("#btn-save-event").off('click').on('click', function () {
                    // Make an AJAX request to edit the event
                     $.ajax({
                        url: "<?php echo base_url('/farmer/calendar-edit'); ?>/" + selectedEvent.id, // Replace with the actual edit-event route
                        type: "POST",
                        data: $("#form-event").serialize(), // Serialize the form data
                        // data:new FormData(this),
                        // contentType:false,
                        // cache:false,
                        // dataType :'JSON',
                        // processData:false,
                        success: function (result) {
                            if (result.status == 200) {
                                toastr.success(result.msg);
                                // Update the FullCalendar event if needed
                                selectedEvent.setProp('title', result.title);
                                selectedEvent.setProp('classNames', [result.category]);
                                selectedEvent.setStart(result.start_date);
                                selectedEvent.setEnd(result.end_date);
                                selectedEvent.setProp(result.date);
                                selectedEvent.setExtendedProp('message', result.message);
                            } else {
                                toastr.error(result.msg);
                            }
                            addEvent.modal('hide');
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                });
            },
            dateClick: function (info) {
                addNewEvent(info);
                
                // This function is called when a date is clicked
                var clickedDate = info.dateStr; // Get the clicked date
        
                // Format the date as a string (you can customize the format)
                // var formattedDate = clickedDate.toISOString();
                var formattedDate = clickedDate;
                
                $('#event-date').val(formattedDate);
                // console.log(info);

            },
            // events: defaultEvents
            // events: '<!?php echo base_url(); ?>/farmer/calendar-list',
            events: '<?php echo base_url('farmer/calendar-list'); ?>',
        });
        calendar.render();

        /*Add new event*/
        // Form to add new event

        $(formEvent).on('submit', function (ev) {
            // ev.preventDefault();
            event.preventDefault();
            var inputs = $('#form-event :input');
            var updatedTitle = $("#event-title").val();
            var updatedsdate = $("#event-sdate").val();
            var updatededate = $("#event-edate").val();
            var updatedmsg = $("#event-msg").val();
            var updatedCategory = $('#event-category').val();

            // validation
            if (forms[0].checkValidity() === false) {
                // event.preventDefault();
                // event.stopPropagation();
                forms[0].classList.add('was-validated');
            } else {
                if (selectedEvent) {
                    selectedEvent.setProp("title", updatedTitle);
                    selectedEvent.setProp("classNames", [updatedCategory]);
                    selectedEvent.setProp("sdate", [updatedsdate]);
                    selectedEvent.setProp("edate", [updatededate]);
                    selectedEvent.setProp("message", [updatedmsg]);
                } else {
                    var newEvent = {
                        title: updatedTitle,
                        sdate: updatedsdate,
                        edate: updatededate,
                        message: updatedmsg,
                        // start: newEventData.date,
                        // allDay: newEventData.allDay,
                        className: updatedCategory
                    }
                    calendar.addEvent(newEvent);
                }
                addEvent.modal('hide');
            }
            
            $.ajax({
                url:"<?php echo base_url(); ?>/farmer/calender-add",
                type:"POST",
                data:new FormData(this),
                contentType:false,
                cache:false,
                dataType :'JSON',
                processData:false,
                success: function(result)
                {   
                    if (result.status == 1) {
                        toastr.success(result.msg);
                        // location.reload();
                    }
                    else{
                        toastr.error(result.msg);
                        // location.reload();
                    }
                },
                error: function(data)
                {
                    console.log(data);
                }
            });
            
        });

        $("#btn-delete-event").on('click', function (e) {
            if (selectedEvent) {
                /*selectedEvent.remove();
                selectedEvent = null;
                addEvent.modal('hide');*/
                var eventId = selectedEvent.id; // Assuming the event ID is set
                // alert(eventId);exit;
                deleteEvent(eventId);
            }
        });
        
        function deleteEvent(eventId) {
            var eventId = selectedEvent.id;
            // alert(eventId);exit;
            $.ajax({
                
                url: '<?php echo base_url('/farmer/calendar-delete'); ?>/' + eventId, // Replace with the actual URL to your delete controller method
                type: 'POST',
                data:new FormData(this),
                contentType:false,
                dataType :'JSON',
                processData:false,
                success: function (response) {
                    selectedEvent.remove();
                    selectedEvent = null;
                    addEvent.modal('hide');
                },
                error: function (error) {
                    // Handle error
                    console.error('Error deleting event: ' + error);
                }
            });
        }
        
        
        $("#btn-new-event").on('click', function (e) {
            addNewEvent({ date: new Date(), allDay: true });
        });

    },
        //init
        $.CalendarPage = new CalendarPage, $.CalendarPage.Constructor = CalendarPage
}(window.jQuery),

    //initializing 
    function ($) {
        "use strict";
        $.CalendarPage.init()
    }(window.jQuery);
</script>
    
    <script>
        function updateRow(tid) {
        $.ajax({
                url: "<?php echo base_url('/farmer/taskedit') ?>/" + tid,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log("XX==", data)
                    // alert(data.tstatus)
                    $('[name="tid"]').val(data.tid);
                    
                    $('select#taskstatus option[value="' + data.tstatus + '"]').attr("selected", true);
                    $('[name="taskname"]').val(data.tname);
                    $('[name="taskdate"]').val(data.tdate);
                    $('[name="taskdesc"]').val(data.tdes);
                    // $('[name="uid"]').val(data.tuserID);
                    $('#myModal').modal('show');
                    $('.modal-title').text('Update Todo List');
                    $("#NewtaskForm").attr('action', '<?php echo base_url('/farmer/edittask1')?>')
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Error get data from ajax');
                }
            });
    }
    
    function openDeleteModal(id)
    {
        var deleteId=document.getElementById('deleteId');
        deleteId.value=id;
        $('#deleteModal').modal('show');
    }
    </script>
</body>

</html>