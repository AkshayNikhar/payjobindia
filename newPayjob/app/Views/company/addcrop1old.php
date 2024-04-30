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
                            <h4 class="mb-sm-0 font-size-18">Add Crop Management </h4>
                        </div>
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
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                                            <!--<span class="d-block d-sm-none"><i class="fas fa-home"></i></span>-->
                                                            <span class="d-sm-flex">Land Preparation</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                                            <!--<span class="d-block d-sm-none"><i class="far fa-user"></i></span>-->
                                                            <span class="d-sm-flex">Seed </span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                                                            <!--<span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>-->
                                                            <span class="d-sm-flex">Sowing</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#settings1" role="tab">
                                                            <!--<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>-->
                                                            <span class="d-sm-flex">Operation</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#monitoring1" role="tab">
                                                            <!--<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>-->
                                                            <span class="d-sm-flex">Crop Monitoring</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#harvesting1" role="tab">
                                                            <!--<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>-->
                                                            <span class="d-sm-flex">Harvesting</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#post_harvesting1" role="tab">
                                                            <!--<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>-->
                                                            <span class="d-sm-flex">Post Harvesting</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#transport1" role="tab">
                                                            <!--<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>-->
                                                            <span class="d-sm-flex">Transport</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#sales1" role="tab">
                                                            <!--<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>-->
                                                            <span class="d-sm-flex">Sales</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#renew1" role="tab">
                                                            <!--<span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>-->
                                                            <span class="d-sm-flex">Review</span>
                                                        </a>
                                                    </li>
                                                </ul>
                
                                                <!-- Tab panes -->
                                                <div class="tab-content p-3 text-muted">
                                                    <div class="tab-pane active" id="home1" role="tabpanel">
                                                        
                                                        <form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
                                                            <div class="row">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title mb-4">Cleaning</h4>
                                                                        <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group mb-3">
                                                                                <label>Cleaning</label>
                                                                                <select name="cleaning" id="cleaning" class="form-select">
                                                                                    <option selected>Choose Cleaning ...</option>
                                                                                    <option value="Yes">Yes</option>
                                                                                    <option value="No">No</option>
                                												</select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group mb-3">
                                                                                <label>Date</label>
                                                                                <input type="date" class="form-control" name="compostname" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="form-group mb-3">
                                                                                <label>Amount</label>
                                                                                <input type="number" class="form-control" name="compostname" required>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title mb-4">Tilling</h4>
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Telling</label>
                                                                                    <select name="telling" id="telling" class="form-select">
                                                                                        <option selected>Choose Telling ...</option>
                                                                                        <option value="Tractor">Tractor</option>
                                                                                        <option value="Bulls">Bulls</option>
                                    												</select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Date</label>
                                                                                    <input type="date" class="form-control" name="compostname" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Amount</label>
                                                                                    <input type="number" class="form-control" name="compostname" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title mb-4">Harrowing</h4>
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Harrowing</label>
                                                                                    <select name="harrowing" id="harrowing" class="form-select">
                                                                                        <option selected>Choose Harrowing ...</option>
                                                                                        <option value="Tractor">Tractor</option>
                                                                                        <option value="Bulls">Bulls</option>
                                    												</select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Date</label>
                                                                                    <input type="date" class="form-control" name="compostname" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Amount</label>
                                                                                    <input type="number" class="form-control" name="compostname" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title mb-4">Apply Compost</h4>
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Apply Compost</label>
                                                                                    <select name="compost" id="compostselect" onchange="compostfunction()" class="form-select">
                                                                                        <option selected>Choose Compost ...</option>
                                                                                        <option value="Yes">Yes</option>
                                                                                        <option value="No">No</option>
                                    												</select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3" id="compost_name" style="display:none">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Compost Name</label>
                                                                                    <input type="text" class="form-control" name="compostname" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Date</label>
                                                                                    <input type="date" class="form-control" name="compostname" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Amount</label>
                                                                                    <input type="number" class="form-control" name="compostname" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title mb-4">Level Of Layouting</h4>
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Level Of Layouting</label>
                                                                                    <select name="harrowing" id="harrowing" class="form-select">
                                                                                        <option selected>Choose Level ...</option>
                                                                                        <option value="Yes">Yes</option>
                                                                                        <option value="No">No</option>
                                    												</select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Date</label>
                                                                                    <input type="date" class="form-control" name="compostname" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Amount</label>
                                                                                    <input type="number" class="form-control" name="compostname" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--<div class="col-lg-6">-->
                                                                <!--    <div class="form-group mb-3">-->
                                                                <!--        <label>Post Harvesting</label>-->
                                                                <!--        <input type="text" class="form-control" name="crop_variety" required>-->
                                                                <!--    </div>-->
                                                                <!--</div>-->
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-3">
                                                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane" id="profile1" role="tabpanel">
                                                        <form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Types of Seeds</label>
                                                                        <select name="seedstypes" id="seedstypes" class="form-select">
                                                                            <option selected>Types of Seeds ...</option>
                                                                            <option value="Heirloom">Heirloom</option>
                                                                            <option value="Hybrid">Hybrid</option>
                                                                            <option value="Open-Pollinated">Open-Pollinated</option>
                        												</select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Quantity</label>
                                                                        <input type="number" class="form-control" name="crop_variety" required>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-3">
                                                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane" id="messages1" role="tabpanel">
                                                        <form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Soaring</label>
                                                                        <select name="soaring" id="soaring" onchange="soaringfunction()" class="form-select">
                                                                            <option selected>Choose Soaring ...</option>
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-lg-6" id="methodfertilization" style="display:none">
                                                                    <div class="form-group mb-3">
                                                                        <label>Method of Fertilization</label>
                                                                        <select name="methodfertilization" class="form-select">
                                                                            <option selected>Choose Mechanical ...</option>
                                                                            <option value="Broadcasting">Broadcasting</option>
                                                                            <option value="Placement">Placement</option>
                                                                            <option value="Foliar">Foliar</option>
                                                                            <option value="Injection-into-soil">Injection-into-soil</option>
                                                                            <option value="Air">Air</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Method of Planting</label>
                                                                        <select name="methodplanting" id="methodplanting" class="form-select">
                                                                            <option selected>Choose Planting ...</option>
                                                                            <option value="Stripe-Seeding">Stripe-Seeding</option>
                                                                            <option value="Point-Seeding">Point-Seeding</option>
                                                                            <option value="Broadcast-Seeding">Broadcast-Seeding</option>
                        												</select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Method of Seeding</label>
                                                                        <select name="seedsmethod" id="seedsmethod" onchange="seedsfunction()" class="form-select">
                                                                            <option selected>Choose Seeding ...</option>
                                                                            <option value="By-Hand">By-Hand</option>
                                                                            <option value="Mechanical-Seeder">Mechanical-Seeder</option>
                                                                            <option value="Both">Both</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6" id="mechanicaltypes" style="display:none">
                                                                    <div class="form-group mb-3">
                                                                        <label>Mechanical Seeder</label>
                                                                        <select name="mechanicaltypes"  class="form-select">
                                                                            <option selected>Choose Mechanical ...</option>
                                                                            <option value="Drill-Seeder">Drill-Seeder</option>
                                                                            <option value="Drop-Seeder">Drop-Seeder</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-3">
                                                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane" id="settings1" role="tabpanel">
                                                        <form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Weeding</label>
                                                                        <select name="weeding" id="weeding" class="form-select">
                                                                            <option selected>Choose Soaring ...</option>
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Herbicide</label>
                                                                        <select name="herbicide" id="herbicide" class="form-select">
                                                                            <option selected>Choose Herbicide ...</option>
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Pesticide</label>
                                                                        <select name="pesticide" id="pesticide" class="form-select">
                                                                            <option selected>Choose Pesticide ...</option>
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Irigation</label>
                                                                        <select name="irrigation" id="irrigation" class="form-select">
                                                                            <option selected>Choose Irigation ...</option>
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-3">
                                                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
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
                                                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane" id="harvesting1" role="tabpanel">
                                                        <form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Harvesting</label>
                                                                        <select name="harvesting" id="harvesting" onchange="harvestingfunction()" class="form-select">
                                                                            <option selected>Choose Harvesting ...</option>
                                                                            <option value="Hand">Hand</option>
                                                                            <option value="Harvesting with hand tools">Harvesting with hand tools</option>
                                                                            <option value="Harvesting with Machinery">Harvesting with Machinery</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6" id="hand-tools" style="display:none">
                                                                    <div class="form-group mb-3">
                                                                        <label>Hand Tools</label>
                                                                        <select name="hand-tools"  class="form-select">
                                                                            <option selected>Choose Hand Tools ...</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6" id="machinery-tools" style="display:none">
                                                                    <div class="form-group mb-3">
                                                                        <label>Machinery Tools</label>
                                                                        <select name="machinery-tools"  class="form-select">
                                                                            <option selected>Choose Machinery Tools ...</option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-3">
                                                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane" id="post_harvesting1" role="tabpanel">
                                                        <form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Threshing</label>
                                                                        <select name="threshing" id="threshing" class="form-select">
                                                                            <option selected>Choose Threshing ...</option>
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Cleaning</label>
                                                                        <select name="cleaning" id="cleaning" class="form-select">
                                                                            <option selected>Choose Cleaning ...</option>
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-3">
                                                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane" id="transport1" role="tabpanel">
                                                        <form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Soaring</label>
                                                                        <select name="mechanicaltypes" id="mechanicaltypes" class="form-select">
                                                                            <option selected>Choose Soaring ...</option>
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Method of Fertilization</label>
                                                                        <select name="methodfertilization" id="methodfertilization" class="form-select">
                                                                            <option selected>Choose Mechanical ...</option>
                                                                            <option value="Broadcasting">Broadcasting</option>
                                                                            <option value="Placement">Placement</option>
                                                                            <option value="Foliar">Foliar</option>
                                                                            <option value="Injection-into-soil">Injection-into-soil</option>
                                                                            <option value="Air">Air</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-3">
                                                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane" id="sales1" role="tabpanel">
                                                        <form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Soaring</label>
                                                                        <select name="mechanicaltypes" id="mechanicaltypes" class="form-select">
                                                                            <option selected>Choose Soaring ...</option>
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Method of Fertilization</label>
                                                                        <select name="methodfertilization" id="methodfertilization" class="form-select">
                                                                            <option selected>Choose Mechanical ...</option>
                                                                            <option value="Broadcasting">Broadcasting</option>
                                                                            <option value="Placement">Placement</option>
                                                                            <option value="Foliar">Foliar</option>
                                                                            <option value="Injection-into-soil">Injection-into-soil</option>
                                                                            <option value="Air">Air</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-3">
                                                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane" id="renew1" role="tabpanel">
                                                        <form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Soaring</label>
                                                                        <select name="mechanicaltypes" id="mechanicaltypes" class="form-select">
                                                                            <option selected>Choose Soaring ...</option>
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group mb-3">
                                                                        <label>Method of Fertilization</label>
                                                                        <select name="methodfertilization" id="methodfertilization" class="form-select">
                                                                            <option selected>Choose Mechanical ...</option>
                                                                            <option value="Broadcasting">Broadcasting</option>
                                                                            <option value="Placement">Placement</option>
                                                                            <option value="Foliar">Foliar</option>
                                                                            <option value="Injection-into-soil">Injection-into-soil</option>
                                                                            <option value="Air">Air</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-3">
                                                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                                                                    </div>
                                                                </div>
                                                            </div>
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
                </div> <!-- end col -->
               

               

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
    function compostfunction(){
        
        // alert("sda");
        let compostname = document.getElementById("compostselect").value;
        
        if(compostname=='Yes'){
            document.getElementById("compost_name").style.display ='block';
        }else{
            document.getElementById("compost_name").style.display ='none';
        }
    }
    function seedsfunction(){
        // alert("sda");
        let seedsmethod = document.getElementById("seedsmethod").value;
        
        if(seedsmethod=='Mechanical-Seeder'){
            document.getElementById("mechanicaltypes").style.display ='block';
        }else{
            document.getElementById("mechanicaltypes").style.display ='none';
        }
    }
    function soaringfunction(){
        
        var soaring = document.getElementById("soaring").value;
        // alert(soaring);
        if(soaring=='Yes'){
            document.getElementById("methodfertilization").style.display ='block';
        }else{
            document.getElementById("methodfertilization").style.display ='none';
        }
    }
    function harvestingfunction(){
        var harvesting = document.getElementById("harvesting").value;
        if(harvesting=='Harvesting with hand tools'){
            document.getElementById("hand-tools").style.display='block';
            document.getElementById("machinery-tools").style.display='none';
        }
        else if(harvesting=='Harvesting with Machinery'){
            document.getElementById("hand-tools").style.display='none';
            document.getElementById("machinery-tools").style.display='block';
        }else{
            document.getElementById("hand-tools").style.display='none';
            document.getElementById("machinery-tools").style.display='none';
        }
    }
</script>

</body>

</html>