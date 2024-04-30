<?php 
include 'layouts/head-main.php';
?>
<head>
<title>Crop Management | Farmeasy</title>
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
				<h4 class="mb-sm-0 font-size-18">Add Crop Management </h4> </div>
		</div>
	</div>
	<!-- end page title -->
	<div class="row">
		<div class="col-12">
			<!--<div class="card">-->
			<!--    <div class="card-body">-->
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-body">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs nav-tabs-custom nav-justified " role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab"> <span class="d-sm-flex">Land Preparation</span> </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
										<!--<span class="d-block d-sm-none"><i class="far fa-user"></i></span>--><span class="d-sm-flex">Seed </span> </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab"> <span class="d-sm-flex">Sowing</span> </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#settings1" role="tab"> <span class="d-sm-flex">Operation</span> </a>
								</li>
								<!--<li class="nav-item">-->
								<!--    <a class="nav-link" data-bs-toggle="tab" href="#monitoring1" role="tab">-->
								<!--        <span class="d-sm-flex">Crop Monitoring</span>-->
								<!--    </a>-->
								<!--</li>-->
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#harvesting1" role="tab"> <span class="d-sm-flex">Harvesting</span> </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#post_harvesting1" role="tab"> <span class="d-sm-flex">Post Harvesting</span> </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#packaging" role="tab"> <span class="d-sm-flex">Packaging</span> </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#transport1" role="tab"> <span class="d-sm-flex">Transport</span> </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#sales1" role="tab"> <span class="d-sm-flex">Sales</span> </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-bs-toggle="tab" href="#renew1" role="tab"> <span class="d-sm-flex">Review</span> </a>
								</li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content p-3 text-muted">
								<div class="tab-pane active" id="home1" role="tabpanel">
									<form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
										<div class="row">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col-lg-4">
															<div class="form-group mb-3">
																<label>Land Name</label>
																<select name="landname" id="landname" class="form-select">
																	<option selected hidden value="">Choose Land Name ...</option>
																	<option value="Land Name 1">Land Name 1</option>
																	<option value="Land Name 2">Land Name 2</option>
																	<option value="Land Name 3">Land Name 3</option>
																</select>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="form-group mb-3">
																<label>Area of land</label>
																<input type="number" class="form-control" name="area"> </div>
														</div>
														<div class="col-lg-4">
															<div class="form-group mb-3">
																<label>Name Of Crop</label>
																<input type="text" class="form-control" name="cropname"> </div>
														</div>
														<div class="col-lg-4">
															<div class="form-group mb-3">
																<label>Variety Of Crop</label>
																<input type="text" class="form-control" name="cropvariety"> </div>
														</div>
														<div class="col-lg-4">
															<div class="form-group mb-3">
																<label>Crop ID</label>
																<input type="text" class="form-control" name="cropid"> </div>
														</div>
														<div class="col-lg-4">
															<div class="form-group mb-3">
																<label>Type of Crop</label>
																<select name="croptype" id="croptype" class="form-select">
																	<option selected hidden value="">Choose Crop type ...</option>
																	<option value="Seed">Seed</option>
																	<option value="Plant">Plant</option>
																</select>
															</div>
														</div>
														<div class="col-lg-4">
															<div class="form-group mb-3">
																<label>Resource of Seed/Plant</label>
																<select name="resource" id="resource" onchange="showResourceAmount()" class="form-select">
																	<option selected hidden value="">Choose Resource ...</option>
																	<option value="Purchased">Purchased</option>
																	<option value="Pre-Owned">Pre-Owned</option>
																	<option value="Government">Government</option>
																</select>
															</div>
														</div>
														<div class="col-lg-4" id="resource-amount" style="display:none">
															<div class="form-group mb-3">
																<label>Amount</label>
																<input type="number" class="form-control" name="resourceAmount"> </div>
														</div>
														<div class="col-lg-4">
															<div class="form-group mb-3">
																<label>Quantity of Seed/Plant</label>
																<input type="number" class="form-control" name="quantity"> </div>
														</div>
														<div class="col-lg-4">
															<div class="form-group mb-3">
																<label>Mode of Working/Source</label>
																<select name="modeofwork" id="modeofwork" class="form-select" onchange="showInnerFields()">
																	<option selected hidden value="">Choose Resource ...</option>
																	<option value="Labour">Labour</option>
																	<option value="Machine">Machine</option>
																	<option value="Both">Both</option>
																</select>
															</div>
														</div>
													</div>
													<div id="labourdiv" style="display:none">
														<div class="row">
															<div class="col-lg-4">
																<div class="form-group mb-3">
																	<label>Number of labour</label>
																	<input type="text" class="form-control" name="noOfLabour"> </div>
															</div>
															<div class="col-lg-4">
																<div class="form-group mb-3">
																	<label>Amount</label>
																	<input type="text" class="form-control" name="amount"> </div>
															</div>
														</div>
													</div>
													<div id="machinediv" style="display:none">
														<div class="row">
															<div class="col-lg-4">
																<div class="form-group mb-3">
																	<label>Machine Type</label>
																	<select class="form-control" name="machinetype" id="machinetype" onchange="showMachineInnerDiv()">
																		<option value="" selected hidden>Select</option>
																		<option value="Owned">Owned</option>
																		<option value="Rented">Rented</option>
																	</select>
																</div>
															</div>
														</div>
													</div>
													<div id="machineInnerDiv" style="display:none">
														<div class="row">
															<div class="col-lg-4">
																<div class="form-group mb-3">
																	<label>Machine Name</label>
																	<input type="text" class="form-control" name="machineName"> </div>
															</div>
															<div class="col-lg-4">
																<div class="form-group mb-3">
																	<label>Number of Hours</label>
																	<input type="text" class="form-control" name="noOfMachineHours"> </div>
															</div>
															<div class="col-lg-4">
																<div class="form-group mb-3">
																	<label>Amount</label>
																	<input type="text" class="form-control" name="amountOfMachine"> </div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group mb-3">
													<input type="submit" class="btn btn-primary" name="submit" value="Submit"> </div>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane" id="profile1" role="tabpanel">
									<form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group mb-3">
													<label>Types of Seeds</label>
													<select name="seedstypes" id="seedstypes" class="form-select">
														<option value="" selected hidden>Types of Seeds ...</option>
														<option value="Heirloom">Heirloom</option>
														<option value="Hybrid">Hybrid</option>
														<option value="Open-Pollinated">Open-Pollinated</option>
													</select>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group mb-3">
													<label>Crop Id</label>
													<select name="cropid2" id="cropid2" class="form-select">
														<option value="" selected hidden>Select Crop ID ...</option>
														<option value="">Crop ID 1</option>
														<option value="">Crop ID 2</option>
														<option value="">Crop ID 3</option>
													</select>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group mb-3">
													<label>Seed Brand Name</label>
													<input type="text" class="form-control" name="seedBrandName"> </div>
											</div>
											<div class="col-lg-4">
												<div class="form-group mb-3">
													<label>Quantity</label>
													<input type="number" class="form-control" name="seedQuantity"> </div>
											</div>
											<div class="col-lg-12">
												<div class="form-group mb-3">
													<input type="submit" class="btn btn-primary" name="submit" value="Submit"> </div>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane" id="messages1" role="tabpanel">
									<form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group mb-3">
													<label>Sowing</label>
													<select name="sowing" id="sowing" onchange="sowingfunction()" class="form-select">
														<option value="" selected hidden>Choose Sowing ...</option>
														<option value="Yes">Yes</option>
														<option value="No">No</option>
													</select>
												</div>
											</div>
											<div class="col-lg-4" style="display:none" id="sowingmethodDiv">
												<div class="form-group mb-3">
													<label>Method Of Sowing</label>
													<select name="methodSowing" id="methodSowing" onchange="sowingMethodfunction()" class="form-select">
														<option value="" selected hidden>Select...</option>
														<option value="By Hand">By Hand</option>
														<option value="By Machine">By Machine</option>
														<option value="Both">Both</option>
													</select>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group mb-3">
													<label>Method Of Planting</label>
													<select name="methodPlanting" id="methodPlanting" class="form-select">
														<option value="" selected hidden>Select...</option>
														<option value="Stripe Seeding">Stripe Seeding</option>
														<option value="Point Seeding">Point Seeding</option>
														<option value="Boradcast Seeding">Boradcast Seeding</option>
													</select>
												</div>
											</div>
											<div style="display:none" id="byhandDiv">
												<div class="row">
													<h4>By Hand</h4>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Number of labour</label>
															<input type="text" name="sowingNoOfLabour" id="sowingNoOfLabour" class="form-control"> </div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Number of days</label>
															<input type="text" name="sowingNoOfDays" id="sowingNoOfDays" class="form-control"> </div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Amount</label>
															<input type="text" name="sowingLabourAmount" id="sowingLabourAmount" class="form-control"> </div>
													</div>
												</div>
											</div>
											<div style="display:none" id="bymachineDiv">
												<div class="row">
													<h4>By Machine</h4>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Total Hours</label>
															<input type="text" name="sowingMachineHours" id="sowingMachineHours" class="form-control"> </div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Amount</label>
															<input type="text" name="sowingMachineAmount" id="sowingMachineAmount" class="form-control"> </div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Mechanical Seeder</label>
															<select name="mechanicaltypes" class="form-select">
																<option value="" selected hidden>Choose Mechanical ...</option>
																<option value="Drill-Seeder">Drill-Seeder</option>
																<option value="Drop-Seeder">Drop-Seeder</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group mb-3">
													<input type="submit" class="btn btn-primary" name="submit" value="Submit"> </div>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane" id="settings1" role="tabpanel">
									<form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate> 
									    <div class="row">
									        <div class="col-lg-4">
									            <select name="operation" id="operation" class="form-select" >
													<option value="" selected hidden>Choose operation ...</option>
													<option value="Cleaning">Cleaning</option>
													<option value="Tilling">Tilling</option>
													<option value="Harrowing">Harrowing</option>
													<option value="Layouting">Layouting</option>
													<option value="Compost">Compost</option>
													<option value="Other">Other</option>
												</select>
									        </div>
									        <div class="col-lg-2">
									            <button type="button" class="btn btn-primary" onclick="showOperations()">
									                Add
									            </button>
									        </div>
									    </div>
									    
									    <div id="op-Cleaning" class="mt-4" style="display:none;">
                                            <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4">Cleaning <button type="button" class="float-right closebtn btn-sm btn btn-danger" onclick="closeOpCleaning()">X</button></h4>
                                                <div class="row">
                                                
                                                <div class="col-lg-4">
                                                    <div class="form-group mb-3">
                                                        <label>Date</label>
                                                        <input type="date" class="form-control" name="op-cleaning-date" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                    <div class="form-group mb-3">
                                                        <label>Cleaning Source</label>
                                                        <select name="op-cleaning-source" id="op-cleaning-source" onchange="showOpCleaning()" class="form-select">
                                                            <option value="" selected hidden>Choose Cleaning Source ...</option>
                                                            <option value="By Hand">By Hand</option>
                                                            <option value="By Machine">By Machine</option>
                                                            <option value="Both">Both</option>
        												</select>
                                                    </div>
                                                </div>
                                                
                                                <div id="op-clean-by-hand" style="display:none">
                                                    <div class="row">
													<h4>By Hand</h4>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Number of labour</label>
															<input type="text" name="op-cleaning-no-labour" id="op-cleaning-no-labour" class="form-control"> </div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Number of days</label>
															<input type="text" name="op-cleaning-no-days" id="op-cleaning-no-days" class="form-control"> </div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Amount</label>
															<input type="text" name="op-cleaning-amount" id="op-cleaning-amount" class="form-control"> </div>
													</div>
												    </div>
                                                </div>
                                                
                                                <div id="op-clean-by-machine" style="display:none">
                                                    <div class="row">
													<h4>By Machine</h4>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Total Hours</label>
															<input type="text" name="op-cleaning-hour-machine" id="op-cleaning-hour-machine" class="form-control"> </div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Amount</label>
															<input type="text" name="op-cleaning-amount-machine" id="op-cleaning-amount-machine" class="form-control"> </div>
													</div>
													
												</div>
                                                </div>
                                                
                                                
                                                </div>
                                            </div>
                                        </div>									        
									    </div>
									    
									    <div id="op-Tilling" class="mt-4" style="display:none;">
                                            <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4">Tilling <button type="button" class="float-right closebtn btn-sm btn btn-danger" onclick="closeOpTilling()">X</button></h4>
                                                <div class="row">
                                                
                                                <div class="col-lg-4">
                                                    <div class="form-group mb-3">
                                                        <label>Date</label>
                                                        <input type="date" class="form-control" name="op-tilling-date" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                    <div class="form-group mb-3">
                                                        <label>Tilling Source</label>
                                                        <select name="op-tilling-source" id="op-tilling-source" onchange="showOpTilling()" class="form-select">
                                                            <option value="" selected hidden>Choose Tilling Source ...</option>
                                                            <option value="By Hand">By Hand</option>
                                                            <option value="By Machine">By Machine</option>
                                                            <option value="Both">Both</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div id="op-tilling-by-hand" style="display:none">
                                                    <div class="row">
                                                    <h4>By Hand</h4>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Number of labour</label>
                                                            <input type="text" name="op-tilling-no-labour" id="op-tilling-no-labour" class="form-control"> </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Number of days</label>
                                                            <input type="text" name="op-tilling-no-days" id="op-tilling-no-days" class="form-control"> </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Amount</label>
                                                            <input type="text" name="op-tilling-amount" id="op-tilling-amount" class="form-control"> </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <div id="op-tilling-by-machine" style="display:none">
                                                    <div class="row">
                                                    <h4>By Machine</h4>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Total Hours</label>
                                                            <input type="text" name="op-tilling-hour-machine" id="op-tilling-hour-machine" class="form-control"> </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Amount</label>
                                                            <input type="text" name="op-tilling-amount-machine" id="op-tilling-amount-machine" class="form-control"> </div>
                                                    </div>
                                                    
                                                </div>
                                                </div>
                                                
                                                
                                                </div>
                                            </div>
                                        </div>                                          
                                        </div>
                                        
									    <div id="op-Harrowing" class="mt-4" style="display:none;">
                                            <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4">Harrowing <button type="button" class="float-right closebtn btn-sm btn btn-danger" onclick="closeOpHarrowing()">X</button></h4>
                                                <div class="row">
                                                
                                                <div class="col-lg-4">
                                                    <div class="form-group mb-3">
                                                        <label>Date</label>
                                                        <input type="date" class="form-control" name="op-harrowing-date" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                    <div class="form-group mb-3">
                                                        <label>Harrowing Source</label>
                                                        <select name="op-harrowing-source" id="op-harrowing-source" onchange="showOpHarrowing()" class="form-select">
                                                            <option value="" selected hidden>Choose Harrowing Source ...</option>
                                                            <option value="By Hand">By Hand</option>
                                                            <option value="By Machine">By Machine</option>
                                                            <option value="Both">Both</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div id="op-harrowing-by-hand" style="display:none">
                                                    <div class="row">
                                                    <h4>By Hand</h4>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Number of labour</label>
                                                            <input type="text" name="op-harrowing-no-labour" id="op-harrowing-no-labour" class="form-control"> </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Number of days</label>
                                                            <input type="text" name="op-harrowing-no-days" id="op-harrowing-no-days" class="form-control"> </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Amount</label>
                                                            <input type="text" name="op-harrowing-amount" id="op-harrowing-amount" class="form-control"> </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <div id="op-harrowing-by-machine" style="display:none">
                                                    <div class="row">
                                                    <h4>By Machine</h4>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Total Hours</label>
                                                            <input type="text" name="op-harrowing-hour-machine" id="op-harrowing-hour-machine" class="form-control"> </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Amount</label>
                                                            <input type="text" name="op-harrowing-amount-machine" id="op-harrowing-amount-machine" class="form-control"> </div>
                                                    </div>
                                                    
                                                </div>
                                                </div>
                                                
                                                
                                                </div>
                                            </div>
                                        </div>                                          
                                        </div>
                                        
									    <div id="op-Layouting" class="mt-4" style="display:none;">
                                            <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4">Layouting <button type="button" class="float-right closebtn btn-sm btn btn-danger" onclick="closeOpLayouting()">X</button></h4>
                                                <div class="row">
                                                
                                                <div class="col-lg-4">
                                                    <div class="form-group mb-3">
                                                        <label>Date</label>
                                                        <input type="date" class="form-control" name="op-layouting-date" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                    <div class="form-group mb-3">
                                                        <label>Layouting Source</label>
                                                        <select name="op-layouting-source" id="op-layouting-source" onchange="showOpLayouting()" class="form-select">
                                                            <option value="" selected hidden>Choose Layouting Source ...</option>
                                                            <option value="By Hand">By Hand</option>
                                                            <option value="By Machine">By Machine</option>
                                                            <option value="Both">Both</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div id="op-layouting-by-hand" style="display:none">
                                                    <div class="row">
                                                    <h4>By Hand</h4>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Number of labour</label>
                                                            <input type="text" name="op-layouting-no-labour" id="op-layouting-no-labour" class="form-control"> </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Number of days</label>
                                                            <input type="text" name="op-layouting-no-days" id="op-layouting-no-days" class="form-control"> </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Amount</label>
                                                            <input type="text" name="op-layouting-amount" id="op-layouting-amount" class="form-control"> </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <div id="op-layouting-by-machine" style="display:none">
                                                    <div class="row">
                                                    <h4>By Machine</h4>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Total Hours</label>
                                                            <input type="text" name="op-layouting-hour-machine" id="op-layouting-hour-machine" class="form-control"> </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Amount</label>
                                                            <input type="text" name="op-layouting-amount-machine" id="op-layouting-amount-machine" class="form-control"> </div>
                                                    </div>
                                                    
                                                </div>
                                                </div>
                                                
                                                
                                                </div>
                                            </div>
                                        </div>                                          
                                        </div>
                                        
									    <div id="op-Compost" class="mt-4" style="display:none;">
                                            <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4">Compost <button type="button" class="float-right closebtn btn-sm btn btn-danger" onclick="closeOpCompost()">X</button></h4>
                                                <div class="row">
                                                
                                                <div class="col-lg-4">
                                                    <div class="form-group mb-3">
                                                        <label>Date</label>
                                                        <input type="date" class="form-control" name="op-compost-date" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                    <div class="form-group mb-3">
                                                        <label>Compost Source</label>
                                                        <select name="op-compost-source" id="op-compost-source" onchange="showOpCompost()" class="form-select">
                                                            <option value="" selected hidden>Choose Compost Source ...</option>
                                                            <option value="By Hand">By Hand</option>
                                                            <option value="By Machine">By Machine</option>
                                                            <option value="Both">Both</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div id="op-compost-by-hand" style="display:none">
                                                    <div class="row">
                                                    <h4>By Hand</h4>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Number of labour</label>
                                                            <input type="text" name="op-compost-no-labour" id="op-compost-no-labour" class="form-control"> </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Number of days</label>
                                                            <input type="text" name="op-compost-no-days" id="op-compost-no-days" class="form-control"> </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Amount</label>
                                                            <input type="text" name="op-compost-amount" id="op-compost-amount" class="form-control"> </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <div id="op-compost-by-machine" style="display:none">
                                                    <div class="row">
                                                    <h4>By Machine</h4>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Total Hours</label>
                                                            <input type="text" name="op-compost-hour-machine" id="op-compost-hour-machine" class="form-control"> </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group mb-3">
                                                            <label>Amount</label>
                                                            <input type="text" name="op-compost-amount-machine" id="op-compost-amount-machine" class="form-control"> </div>
                                                    </div>
                                                    
                                                </div>
                                                </div>
                                                
                                                
                                                </div>
                                            </div>
                                        </div>                                          
                                        </div>
                                        
									    <div id="op-Other" class="mt-4" style="display:none;">
                                            <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4">Other <button type="button" class="float-right closebtn btn-sm btn btn-danger" onclick="closeOpOther()">X</button></h4>
                                                <div class="row">
                                                
                                                <div class="col-lg-4">
                                                    <div class="form-group mb-3">
                                                        <label>Other Operation</label>
                                                        <input type="text" class="form-control" name="op-other-name" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group mb-3">
                                                        <label>Date</label>
                                                        <input type="date" class="form-control" name="op-other-date" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group mb-3">
                                                        <label> Amount</label>
                                                        <input type="text" class="form-control" name="op-other-amount" required>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
									    </div>
									</form>
								</div>
								<div class="tab-pane" id="monitoring1" role="tabpanel">
									<form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group mb-3">
													<label>Hibernation</label>
													<select name="hibernation" id="hibernation" class="form-select">
														<option selected>Choose Hibernation ...</option>
														<option value="Yes">Yes</option>
														<option value="No">No</option>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group mb-3">
													<label>Growth Start</label>
													<select name="growth-start" id="growth-start" class="form-select">
														<option selected>Choose Growth Start ...</option>
														<option value="Yes">Yes</option>
														<option value="No">No</option>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group mb-3">
													<label>Bud Burst</label>
													<select name="bud-burst" id="bud-burst" class="form-select">
														<option selected>Choose Bud Burst ...</option>
														<option value="Yes">Yes</option>
														<option value="No">No</option>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group mb-3">
													<label>Leaf Out</label>
													<select name="leaf-out" id="leaf-out" class="form-select">
														<option selected>Choose Leaf Out ...</option>
														<option value="Yes">Yes</option>
														<option value="No">No</option>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group mb-3">
													<label>Flowering</label>
													<select name="flowering" id="flowering" class="form-select">
														<option selected>Choose Flowering ...</option>
														<option value="Yes">Yes</option>
														<option value="No">No</option>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group mb-3">
													<label>Ripening</label>
													<select name="ripening" id="ripening" class="form-select">
														<option selected>Choose Ripening ...</option>
														<option value="Yes">Yes</option>
														<option value="No">No</option>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group mb-3">
													<label>Leaf Coloration</label>
													<select name="leaf-coloration" id="leaf-coloration" class="form-select">
														<option selected>Choose Leaf Coloration ...</option>
														<option value="Yes">Yes</option>
														<option value="No">No</option>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group mb-3">
													<label>Leat Fall</label>
													<select name="leat-fall" id="leat-fall" class="form-select">
														<option selected>Choose Leat Fall ...</option>
														<option value="Yes">Yes</option>
														<option value="No">No</option>
													</select>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group mb-3">
													<input type="submit" class="btn btn-primary" name="submit" value="Submit"> </div>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane" id="harvesting1" role="tabpanel">
									<form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group mb-3">
													<label>Harvesting</label>
													<select name="harvestingType" id="harvestingType" onchange="showHarvesting()" class="form-select">
														<option value="" selected hidden>Choose Harvesting ...</option>
														<option value="By hand">By hand</option>
														<option value="Harvesting with hand tools">Harvesting with hand tools</option>
														<option value="Harvesting with Machinery">Harvesting with Machinery</option>
														<option value="Both">Both</option>
													</select>
												</div>
											</div>
											<div id="harv-by-hand" style="display:none">
												<h4> By Hand </h4>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Number of labours</label>
															<input type="text" name="harvestNoOfLabours" id="harvestNoOfLabours" class="form-control"> </div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Number of Days</label>
															<input type="text" name="harvestNoOfDays" id="harvestNoOfDays" class="form-control"> </div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Amount</label>
															<input type="text" name="harvestLabourAmount" id="harvestLabourAmount" class="form-control"> </div>
													</div>
												</div>
											</div>
											<div id="harv-by-hand-tools" style="display:none">
												<h4>Harvesting By Hand Tool</h4>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Total Hours</label>
															<input type="text" name="harvestHours1" id="harvestHours1" class="form-control"> </div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Amount</label>
															<input type="text" name="harvestAmount1" id="harvestAmount1" class="form-control"> </div>
													</div>
												</div>
											</div>
											<div id="harv-by-hand-machinery" style="display:none">
												<h4>Harvesting with Machinery</h4>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Total Hours</label>
															<input type="text" name="harvestHours2" id="harvestHours2" class="form-control"> </div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Amount</label>
															<input type="text" name="harvestAmount2" id="harvestAmount2" class="form-control"> </div>
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group mb-3">
													<input type="submit" class="btn btn-primary" name="submit" value="Submit"> </div>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane" id="post_harvesting1" role="tabpanel">
									<form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group mb-3">
													<label>Threshing</label>
													<select name="threshing" id="threshing" onchange="showThreshingDiv()" class="form-select">
														<option value="" selected hidden>Choose Threshing ...</option>
														<option value="Yes">Yes</option>
														<option value="No">No</option>
													</select>
												</div>
											</div>
										</div>
										<div id="threshingDiv" style="display: none;">
											<div class="row">
												<div class="col-lg-4">
													<div class="form-group mb-3">
														<label>Threshing Method</label>
														<select name="threshingMethod" id="threshingMethod" onchange="showThreshingMethod()" class="form-select">
															<option value="" selected hidden>Select...</option>
															<option value="By hand">By hand</option>
															<option value="By machine">By machine</option>
															<option value="Both">Both</option>
														</select>
													</div>
												</div>
											</div>
											<div id="thresh-by-hand" style="display: none;">
												<h4> By Hand </h4>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Number of labours</label>
															<input type="text" name="threshNoOfLabours" id="threshNoOfLabours" class="form-control"> </div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Number of Days</label>
															<input type="text" name="threshNoOfDays" id="threshNoOfDays" class="form-control"> </div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Amount</label>
															<input type="text" name="threshLabourAmount" id="threshLabourAmount" class="form-control"> </div>
													</div>
												</div>
											</div>
											<div id="thresh-by-machine" style="display: none;">
												<h4>Threshing By Machine</h4>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Total Hours</label>
															<input type="text" name="threshHours" id="threshHours" class="form-control"> </div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Amount</label>
															<input type="text" name="threshAmount" id="threshAmount" class="form-control"> </div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group mb-3">
													<label>Cleaning</label>
													<select name="cleaning" id="cleaning" onchange="showCleaningDiv()" class="form-select">
														<option value="" selected hidden>Choose cleaning ...</option>
														<option value="Yes">Yes</option>
														<option value="No">No</option>
													</select>
												</div>
											</div>
										</div>
										<div id="cleaningDiv" style="display: none;">
											<div class="row">
												<div class="col-lg-4">
													<div class="form-group mb-3">
														<label>Cleaning Method</label>
														<select name="cleaningMethod" id="cleaningMethod" onchange="showCleaningMethod()" class="form-select">
															<option value="" selected hidden>Select...</option>
															<option value="By hand">By hand</option>
															<!--<option value="By machine">By machine</option>-->
															<!--<option value="Both">Both</option>-->
														</select>
													</div>
												</div>
											</div>
											<div id="clean-by-hand" style="display: none;">
												<h4> By Hand </h4>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Number of labours</label>
															<input type="text" name="cleanNoOfLabours" id="cleanNoOfLabours" class="form-control"> </div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Number of Days</label>
															<input type="text" name="cleanNoOfDays" id="cleanNoOfDays" class="form-control"> </div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mb-3">
															<label>Amount</label>
															<input type="text" name="cleanLabourAmount" id="cleanLabourAmount" class="form-control"> </div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group mb-3">
													<input type="submit" class="btn btn-primary" name="submit" value="Submit"> </div>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane" id="packaging" role="tabpanel">
								    <div class="row">
								        <div class="col-lg-4">
											<div class="form-group mb-3">
												<label>Packaging Type</label>
												<select name="packageType" id="packageType" onchange="showPackageInfo()" class="form-select">
													<option value="" hidden selected>Choose package type ...</option>
													<option value="Sack">Sack</option>
													<option value="Packet">Packet</option>
													<option value="Both">Both</option>
												</select>
											</div>
										</div>
								    </div>
								    
								    <div id="sack-packaging" style="display:none">
								        <h4>Sack Packaging</h4>
								        <div class="row">
								            <div class="col-lg-4">
								            <div class="form-group mb-3">
												<label>Packaging (kg)</label>
												<input type="text" class="form-control" name="sack-packaging">
											</div>
											</div>
											
											<div class="col-lg-4">
								            <div class="form-group mb-3">
												<label>Quantity of sack</label>
												<input type="number" class="form-control" name="sack-quantity">
											</div>
											</div>
											
											<div class="col-lg-4">
								            <div class="form-group mb-3">
												<label>Amount </label>
												<input type="text" class="form-control" name="sack-amount">
											</div>
											</div>
											
											<div class="col-lg-4">
								            <div class="form-group mb-3">
												<label>Number of Workers </label>
												<input type="number" class="form-control" name="sack-no-worker">
											</div>
											</div>
											
											<div class="col-lg-4">
								            <div class="form-group mb-3">
												<label>Number of Days </label>
												<input type="number" class="form-control" name="sack-no-days">
											</div>
											</div>
											
											<div class="col-lg-4">
								            <div class="form-group mb-3">
												<label>Amount </label>
												<input type="text" class="form-control" name="sack-worker-amount">
											</div>
											</div>
								        </div>
								    </div>
								    
								    <div id="packet-packaging" style="display:none">
								        <h4>Packet Packaging</h4>
                                        <div class="row">
                                            <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Packaging (kg)</label>
                                                <input type="text" class="form-control" name="packet-packaging">
                                            </div>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Quantity of packet </label>
                                                <input type="number" class="form-control" name="packet-quantity">
                                            </div>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Amount </label>
                                                <input type="text" class="form-control" name="packet-amount">
                                            </div>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Number of Workers </label>
                                                <input type="number" class="form-control" name="packet-no-worker">
                                            </div>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Number of Days </label>
                                                <input type="number" class="form-control" name="packet-no-days">
                                            </div>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Amount </label>
                                                <input type="text" class="form-control" name="packet-worker-amount">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
								</div>
								<div class="tab-pane" id="transport1" role="tabpanel">
									<form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
										<div class="row">
											<div class="col-lg-4">
												<div class="form-group mb-3">
													<label>Vehicle</label>
													<select name="vehicle" id="vehicle" class="form-select">
														<option value="" hidden selected>Choose Vehicle ...</option>
														<option value="Truck">Truck</option>
														<option value="Tractor">Tractor</option>
														<option value="Pickup Truck">Pickup Truck</option>
													</select>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group mb-3">
													<label>Total Trip</label>
													<input type="number" name="totaltrip" id="totaltrip" class="form-control">
												</div>
											</div>
											<div class="col-lg-4">
												<div class="form-group mb-3">
													<label>Trip Rate (Amount)</label>
													<input type="number" name="tripamount" id="tripamount" class="form-control">
												</div>
											</div>
											
											<div class="col-lg-12">
												<div class="form-group mb-3">
													<input type="submit" class="btn btn-primary" name="submit" value="Submit"> </div>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane" id="sales1" role="tabpanel">
									<form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
										Sales
									</form>
								</div>
								<div class="tab-pane" id="renew1" role="tabpanel">
									<form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
										review
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--    </div>-->
			<!--</div>-->
		</div>
	</div>
	<!-- end col -->
</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->
<?php include 'layouts/footer.php'; ?>
</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->
<!-- Right Sidebar -->
<!--  datatable js -->
<?php include 'layouts/footerjs.php' ?>
<script>
function showInnerFields() {
var modeofwork = document.getElementById('modeofwork').value;
// alert(modeofwork);
if(modeofwork == "Labour") {
document.getElementById("labourdiv").style.display = 'block';
document.getElementById("machinediv").style.display = 'none';
document.getElementById("machineInnerDiv").style.display = 'none';
} else if(modeofwork == "Machine") {
document.getElementById("machinediv").style.display = 'block';
document.getElementById("labourdiv").style.display = 'none';
}
if(modeofwork == "Both") {
document.getElementById("labourdiv").style.display = 'block';
document.getElementById("machinediv").style.display = 'block';
}
}

function showMachineInnerDiv() {
var machinetype = document.getElementById('machinetype').value;
// alert(machinetype);
if(machinetype == "Owned") {
document.getElementById("machineInnerDiv").style.display = 'none';
} else if(machinetype == "Rented") {
document.getElementById("machineInnerDiv").style.display = 'block';
}
}

function sowingfunction() {
var sowing = document.getElementById('sowing').value;
if(sowing == 'Yes') {
document.getElementById("sowingmethodDiv").style.display = 'block';
} else if(sowing == 'No') {
document.getElementById("sowingmethodDiv").style.display = 'none';
document.getElementById("bymachineDiv").style.display = 'none';
document.getElementById("byhandDiv").style.display = 'none';
}
}

function sowingMethodfunction() {
var methodSowing = document.getElementById('methodSowing').value;
if(methodSowing == 'By Hand') {
document.getElementById("byhandDiv").style.display = 'block';
document.getElementById("bymachineDiv").style.display = 'none';
} else if(methodSowing == 'By Machine') {
document.getElementById("bymachineDiv").style.display = 'block';
document.getElementById("byhandDiv").style.display = 'none';
} else if(methodSowing == 'Both') {
document.getElementById("byhandDiv").style.display = 'block';
document.getElementById("bymachineDiv").style.display = 'block';
}
}

function showHarvesting() {
var type = document.getElementById('harvestingType').value;
if(type == "By hand") {
document.getElementById("harv-by-hand").style.display = 'block';
document.getElementById("harv-by-hand-machinery").style.display = 'none';
document.getElementById("harv-by-hand-tools").style.display = 'none';
} else if(type == "Harvesting with hand tools") {
document.getElementById("harv-by-hand-tools").style.display = 'block';
document.getElementById("harv-by-hand").style.display = 'none';
document.getElementById("harv-by-hand-machinery").style.display = 'none';
} else if(type == "Harvesting with Machinery") {
document.getElementById("harv-by-hand-machinery").style.display = 'block';
document.getElementById("harv-by-hand").style.display = 'none';
document.getElementById("harv-by-hand-tools").style.display = 'none';
} else if(type == "Both") {
document.getElementById("harv-by-hand").style.display = 'block';
document.getElementById("harv-by-hand-machinery").style.display = 'block';
document.getElementById("harv-by-hand-tools").style.display = 'none';
}
}

function showThreshingDiv() {
var threshing = document.getElementById('threshing').value;
// alert(threshing);
if(threshing == 'Yes') {
document.getElementById("threshingDiv").style.display = "block";
} else if(threshing == 'No') {
document.getElementById("threshingDiv").style.display = "none";
}
}

function showThreshingMethod() {
var threshingMethod = document.getElementById('threshingMethod').value;
if(threshingMethod == 'By hand') {
document.getElementById("thresh-by-hand").style.display = "block";
document.getElementById("thresh-by-machine").style.display = "none";
} else if(threshingMethod == 'By machine') {
document.getElementById("thresh-by-machine").style.display = "block";
document.getElementById("thresh-by-hand").style.display = "none";
} else if(threshingMethod == 'Both') {
document.getElementById("thresh-by-hand").style.display = "block";
document.getElementById("thresh-by-machine").style.display = "block";
}
}

function showCleaningDiv() {
var cleaning = document.getElementById('cleaning').value;
if(cleaning == 'Yes') {
document.getElementById("cleaningDiv").style.display = "block";
} else if(cleaning == 'No') {
document.getElementById("cleaningDiv").style.display = "none";
}
}

function showCleaningMethod() {
var cleaningMethod = document.getElementById('cleaningMethod').value;
if(cleaningMethod == 'By hand') {
document.getElementById("clean-by-hand").style.display = "block";
} else {
document.getElementById("clean-by-hand").style.display = "none";
}
}

function showOperations()
{
    var operation=document.getElementById('operation').value;
    if(operation=='Cleaning')
    {
        document.getElementById('op-Cleaning').style.display="block";
    }
    if(operation=='Tilling')
    {
        document.getElementById('op-Tilling').style.display="block";
    }
    if(operation=='Harrowing')
    {
        document.getElementById('op-Harrowing').style.display="block";
    }
    if(operation=='Layouting')
    {
        document.getElementById('op-Layouting').style.display="block";
    }
    if(operation=='Compost')
    {
        document.getElementById('op-Compost').style.display="block";
    }
    if(operation=='Other')
    {
        document.getElementById('op-Other').style.display="block";
    }
}

function showOpCleaning()
{
    var t1=document.getElementById('op-cleaning-source').value;
    if(t1=='By Hand')
    {
        document.getElementById('op-clean-by-hand').style.display="block";
        document.getElementById('op-clean-by-machine').style.display="none";
    }
    else if(t1=='By Machine')
    {
        document.getElementById('op-clean-by-machine').style.display="block";
        document.getElementById('op-clean-by-hand').style.display="none";
    }
    else if(t1=='Both')
    {
        document.getElementById('op-clean-by-hand').style.display="block";
        document.getElementById('op-clean-by-machine').style.display="block";
    }    
}

function closeOpCleaning()
{
    document.getElementById('op-Cleaning').style.display="none";
}

function showOpTilling()
{
    var t1=document.getElementById('op-tilling-source').value;
    if(t1=='By Hand')
    {
        document.getElementById('op-tilling-by-hand').style.display="block";
        document.getElementById('op-tilling-by-machine').style.display="none";
    }
    else if(t1=='By Machine')
    {
        document.getElementById('op-tilling-by-machine').style.display="block";
        document.getElementById('op-tilling-by-hand').style.display="none";
    }
    else if(t1=='Both')
    {
        document.getElementById('op-tilling-by-hand').style.display="block";
        document.getElementById('op-tilling-by-machine').style.display="block";
    }    
}

function closeOpTilling()
{
    document.getElementById('op-Tilling').style.display="none";
}

function showOpHarrowing()
{
    var t1=document.getElementById('op-harrowing-source').value;
    if(t1=='By Hand')
    {
        document.getElementById('op-harrowing-by-hand').style.display="block";
        document.getElementById('op-harrowing-by-machine').style.display="none";
    }
    else if(t1=='By Machine')
    {
        document.getElementById('op-harrowing-by-machine').style.display="block";
        document.getElementById('op-harrowing-by-hand').style.display="none";
    }
    else if(t1=='Both')
    {
        document.getElementById('op-harrowing-by-hand').style.display="block";
        document.getElementById('op-harrowing-by-machine').style.display="block";
    }    
}

function closeOpHarrowing()
{
    document.getElementById('op-Harrowing').style.display="none";
}

function showOpLayouting()
{
    var t1=document.getElementById('op-layouting-source').value;
    if(t1=='By Hand')
    {
        document.getElementById('op-layouting-by-hand').style.display="block";
        document.getElementById('op-layouting-by-machine').style.display="none";
    }
    else if(t1=='By Machine')
    {
        document.getElementById('op-layouting-by-machine').style.display="block";
        document.getElementById('op-layouting-by-hand').style.display="none";
    }
    else if(t1=='Both')
    {
        document.getElementById('op-layouting-by-hand').style.display="block";
        document.getElementById('op-layouting-by-machine').style.display="block";
    }    
}

function closeOpLayouting()
{
    document.getElementById('op-Layouting').style.display="none";
}
function showOpCompost()
{
    var t1=document.getElementById('op-compost-source').value;
    if(t1=='By Hand')
    {
        document.getElementById('op-compost-by-hand').style.display="block";
        document.getElementById('op-compost-by-machine').style.display="none";
    }
    else if(t1=='By Machine')
    {
        document.getElementById('op-compost-by-machine').style.display="block";
        document.getElementById('op-compost-by-hand').style.display="none";
    }
    else if(t1=='Both')
    {
        document.getElementById('op-compost-by-hand').style.display="block";
        document.getElementById('op-compost-by-machine').style.display="block";
    }    
}

function closeOpCompost()
{
    document.getElementById('op-Compost').style.display="none";
}
function closeOpOther()
{
    document.getElementById('op-Other').style.display="none";
}

function showPackageInfo()
{
    var ptype=document.getElementById('packageType').value;
    if(ptype=='Sack')
    {
        document.getElementById('sack-packaging').style.display="block";
        document.getElementById('packet-packaging').style.display="none";
    }
    else if(ptype=='Packet')
    {
        document.getElementById('packet-packaging').style.display="block";
        document.getElementById('sack-packaging').style.display="none";
    }
    else if(ptype=='Both')
    {
        document.getElementById('sack-packaging').style.display="block";
        document.getElementById('packet-packaging').style.display="block";
    }    
}

function showResourceAmount()
{
    var res=document.getElementById('resource').value;
    if(res=='Purchased')
    {
        document.getElementById('resource-amount').style.display="block";
    }
    else
    {
        document.getElementById('resource-amount').style.display="none";
    }
}

</script>
</body>

</html>