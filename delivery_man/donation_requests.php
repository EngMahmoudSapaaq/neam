<?php
include 'config.php';
session_start();
$password = $_SESSION['password'];
$type = $_SESSION['type'];
if ($type != 'delivery') {
    header('location:../index.php');
};
if (!isset($password)) {
    header('location:../index.php');
};
$delivery_id = $_SESSION['id'];
if (isset($_GET['logout'])) {
    unset($delivery_id);
    unset($type);
    unset($password);
    session_destroy();
    header('location:../index.php');
}

$receive_appointments_Pending = mysqli_query($conn, "SELECT * FROM `receive_appointments` WHERE deliver_id IS NULL AND status = 'pending'") or die('Query failed: ' . mysqli_error($conn));
$receive_appointments_Accepted = mysqli_query($conn, "SELECT * FROM `receive_appointments` WHERE deliver_id = '$delivery_id' AND status = 'pending'") or die('Query failed: ' . mysqli_error($conn));

$deliveries_data = mysqli_query($conn, "SELECT * FROM `deliveries` WHERE id = '$delivery_id'") or die('Query failed: ' . mysqli_error($conn));
$deliveries_data_name = mysqli_fetch_assoc($deliveries_data);
$i = 0;
$j = 0;
if (isset($_GET['Accept_id'])) {
    $appointment_id = $_GET['Accept_id'];

    $requests = "UPDATE `receive_appointments` SET `deliver_id` = '$delivery_id' WHERE `id` = '$appointment_id'";
    mysqli_query($conn, $requests);

    header('location:donation_requests.php');
}
?>
<!doctype html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8"/>
        <title>Neam</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard" name="description"/>
        <meta content="Themesbrand" name="author"/>
        <!-- App favicon -->
        <link rel="shortcut icon" href="images/logo3.png">

        <!-- Bootstrap Css -->
        <link href="css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css"/>
        <!-- Icons Css -->
        <link href="css/icons.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- App Css-->
        <link href="css/app.min.css" id="app-style" rel="stylesheet" type="text/css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300&display=swap" rel="stylesheet">
        <style>
            *{
                font-family: 'IBM Plex Sans Arabic', sans-serif;
            }
        </style>
    </head>

    <body data-sidebar="dark" cz-shortcut-listen="true">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header pe-0">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="../index.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="images/logo3.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="images/logo3.png" alt="" height="20">
                                </span>
                            </a>

                            <a href="index.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="images/logo3.png" alt="" style="height: 60px;width: 60px" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="images/logo3.png" alt=""  height="20">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->

                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block language-switch">

                            <button type="button" style="cursor: default" class="btn header-item"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span>Delivery Man | <?php echo $deliveries_data_name['name']; ?></span>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button"  data-bs-toggle="modal" data-bs-target="#logout"
                                    class="btn btn-danger header-item waves-effect">
                                <span class="d-inline-block ms-1 fw-medium font-size-15">Logout <i class="fa fa-sign-out"></i></span>
                            </button>
                        </div>

                    </div>
                </div>

            </header>
            <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Logout !</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure to logout?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Back</button>
                            <a href="donation_requests.php?logout" type="button" class="btn btn-danger">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu mm-active">

                <!-- LOGO -->
                <div class="navbar-brand-box">

                    <div>
                        <a href="#" class="logo logo-light">
                            <span class="logo-lg">
                                <img src="images/logo2.png" style="display: block;
                                     margin-left: auto;
                                     margin-right: auto;
                                     height: 100px;">
                            </span>
                        </a>
                    </div>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <div data-simplebar="init" class="sidebar-menu-scroll mm-show">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask" style="margin-top: 30px">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper"
                                     style="height: 100%; overflow: hidden; padding-right: 0px; padding-bottom: 0px;">
                                    <div class="simplebar-content" style="padding: 0px;">

                                        <!--- Sidemenu -->
                                        <div id="sidebar-menu" class="mm-active">
                                            <!-- Left Menu Start -->
                                            <ul class="metismenu list-unstyled mm-show" id="side-menu">
                                                <li class="">
                                                    <a href="donation_requests.php" class="active" aria-expanded="false">
                                                        <i class="fa mx-3 fa-file-text"></i>
                                                        <span>Donation Requests</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="appointments.php" class="active" aria-expanded="false">
                                                        <i class="fa mx-3 fa fa-clock"></i>
                                                        <span>Appointments</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                        <!-- Sidebar -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: auto; height: 169px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                        <div class="simplebar-scrollbar"
                             style="height: 519px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
                    </div>
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item active">Donation Requests</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4"><i class="fa me-2 fa-file-text"></i>Pending Donation Requests</h4>
                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Donation Number</th>
                                                        <th>Donator</th>
                                                        <th>Beneficiary</th>
                                                        <th>Section</th>
                                                        <th>Quantity</th>
                                                        <th>Description</th>
                                                        <th class="align-middle">Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (isset($receive_appointments_Pending) && mysqli_num_rows($receive_appointments_Pending) > 0) {
                                                        $i = 0;
                                                        while ($receive_appointment = mysqli_fetch_assoc($receive_appointments_Pending)) {
                                                            $request_id = $receive_appointment['request_id'];

                                                            // Fetch request, donate, donor, section, and beneficiary information
                                                            $request = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `requests` WHERE id = '$request_id'"));
                                                            $donate = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `donates` WHERE id = '{$request['donate_id']}'"));
                                                            $donor = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `donors` WHERE id = '{$donate['donor_id']}'"));
                                                            $section = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `sections` WHERE id = '{$donate['section_id']}'"));
                                                            $beneficiary = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `beneficiaries` WHERE id = '{$request['beneficiary_id']}'"));

                                                            $i++;
                                                            $description = strlen($donate['description']) > 100 ? substr($donate['description'], 0, 60) . '...' : $donate['description'];
                                                            ?>
                                                            <tr>
                                                                <td><a class="text-body fw-bold">#<?= $i; ?></a></td>
                                                                <td><?= $donate['id']; ?></td>
                                                                <td><?= $donor['name']; ?></td>
                                                                <td><?= $beneficiary['name']; ?></td>
                                                                <td><?= $section['name']; ?></td>
                                                                <td><?= $donate['quantity']; ?></td>
                                                                <td style="width:200px"><?= htmlspecialchars($description); ?></td>
                                                                <td class="align-middle"><span class="badge bg-warning">Pending</span></td>
                                                                <td>
                                                                    <a class="btn btn-success" href="donation_requests.php?Accept_id=<?= $receive_appointment['id']; ?>">Accept <i class="fa fa-check ms-2"></i></a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        echo '
            <tr>
                <td colspan="9" class="text-center">No data available</td>
            </tr>';
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>

                                        </div>
                                        <!-- end table-responsive -->
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4"><i class="fa me-2 fa-file-text"></i>Accepted Donation Requests</h4>
                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Donation Number</th>
                                                        <th>Donator</th>
                                                        <th>Beneficiary</th>
                                                        <th>Section</th>
                                                        <th>Quantity</th>
                                                        <th>Description</th>
                                                        <th class="align-middle">Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (isset($receive_appointments_Accepted) && mysqli_num_rows($receive_appointments_Accepted) > 0) {
                                                        while ($receive_appointmentA = mysqli_fetch_assoc($receive_appointments_Accepted)) {
                                                            $request_id = $receive_appointmentA['request_id'];
                                                            $requests = mysqli_query($conn, "SELECT * FROM `requests` WHERE id = '$request_id'") or die('Query failed: ' . mysqli_error($conn));
                                                            $request = mysqli_fetch_assoc($requests);
                                                            $donate_id = $request['donate_id'];
                                                            $donates = mysqli_query($conn, "SELECT * FROM `donates` WHERE id = '$donate_id'") or die('Query failed: ' . mysqli_error($conn));
                                                            $donate = mysqli_fetch_assoc($donates);
                                                            //-------------------------------------
                                                            $donor_id = $donate['donor_id'];
                                                            $donors = mysqli_query($conn, "SELECT * FROM `donors` WHERE id = '$donor_id'") or die('Query failed: ' . mysqli_error($conn));
                                                            $donor = mysqli_fetch_assoc($donors);
                                                            //-------------------------------------
                                                            $section_id = $donate['section_id'];
                                                            $sections = mysqli_query($conn, "SELECT * FROM `sections` WHERE id = '$section_id'") or die('Query failed: ' . mysqli_error($conn));
                                                            $section = mysqli_fetch_assoc($sections);
                                                            // Fetch delivery info
                                                            $beneficiary_id = $request['beneficiary_id'];
                                                            $beneficiaries = mysqli_query($conn, "SELECT * FROM `beneficiaries` WHERE id = '$beneficiary_id'") or die('Query failed: ' . mysqli_error($conn));
                                                            $beneficiarie = mysqli_fetch_assoc($beneficiaries);
                                                            $j++;
                                                            $descriptionc = strlen($donate['description']) > 100 ? substr($donate['description'], 0, 60) . '...' : $donate['description'];
                                                            
                                                            echo '<tr>
                                                        <td><a class="text-body fw-bold">#' . $j . '</a></td>
                                                        <td>' . $donate['id'] . '</td>
                                                        <td>' . $donor['name'] . '</td>
                                                        <td>' . $beneficiarie['name'] . '</td>
                                                        <td>' . $section['name'] . '</td>
                                                        <td>' . $donate['quantity'] . '</td>
                                                        <td>' . $descriptionc . '</td>
                                                        <td class="align-middle"><span class="badge bg-success">Accepted</span></td> 
                                                        <td>
                                                            <a class="btn btn-primary" href="set_pick_up.php?appointment_id=' . $receive_appointmentA['id'] . '" title="Set pick-up time" ><i class="fa fa-reply ms-2"></i></a>
                                                            <a class="btn btn-success" href="set_delivery.php?appointment_id=' . $receive_appointmentA['id'] . '" title="Set delivery time" ><i class="fa fa-reply ms-2"></i></a>

                                                        </td>
                                                        
                                                    </tr>';
                                                        }
                                                    } else {
                                                        echo '<tr>
                                                        <td></td>
                                                        <td>there are data</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>';
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                    </div>

                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <!-- End Page-content -->


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                Neam © 2024.
                            </div>
                        </div>
                    </div>
                </footer> 
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- JAVASCRIPT -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/jquery.validate.additional-methods.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="js/metisMenu.min.js"></script>


        <script src="js/dashboard.init.js"></script>

        <!-- App js -->
        <script src="js/app.js"></script>

        <script src="js/validate.js"></script>

    </body>
</html>