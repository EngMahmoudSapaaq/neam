<?php

session_start();
if(!(isset($_SESSION['password']))){
	header('Location:../login.php');
}

$id = $_SESSION['id'];

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

                    <a href="../index.php" class="logo logo-light">
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
                         <?php

                        include('../connect.php');  
                        $sql = $con->prepare("SELECT * FROM admins");      
                        $sql->execute();
                        $rows = $sql->fetch();


                        ?>
                        <span>Admin | <?php echo $rows['name']; ?></span>
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
                    <a href="../logout.php" type="button" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu mm-active">

        <!-- LOGO -->
        <div class="navbar-brand-box">

            <div>
                <a href="../index.php" class="logo logo-light">
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
                                            <a href="index.php" class="active" aria-expanded="false">
                                                <i class="fa mx-3 fa-users"></i>
                                                <span>Users</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="sections.php" class="active" aria-expanded="false">
                                                <i class="fa mx-3 fa-list-ul"></i>
                                                <span>Sections</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="delivery.php" class="active" aria-expanded="false">
                                                <i class="fa mx-3 fa-truck"></i>
                                                <span>Delivery Users</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="reports.php" class="active" aria-expanded="false">
                                                <i class="fa mx-3 fa-exclamation-circle"></i>
                                                <span>Reports</span>
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
                                    <li class="breadcrumb-item active">Reports</li>
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
                                <h4 class="card-title mb-4"><i class="fa me-2 fa-exclamation-circle"></i> Reports</h4>
                                <div class="table-responsive">
                                    <table class="table table-centered mb-0">
                                        <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        
                                            if(isset($_GET['edit']) && $_GET['edit'] == 1){
                                                
                                                
                                            echo '
                                                <div class="container" dir="rtl" style="margin-top:80px;color:#000">
                                                    <div class="alert alert-success role="alert" style="color:#000;text-align:center">
                                                        Donation Deleted Successfully
                                                    </div>
                                                </div>';
                                            
                                            }
                                        ?> 
                                        <?php
                                        
                                            if(isset($_GET['edit']) && $_GET['edit'] == 2){
                                                
                                                
                                            echo '
                                                <div class="container" dir="rtl" style="margin-top:80px;color:#000">
                                                    <div class="alert alert-success role="alert" style="color:#000;text-align:center">
                                                        Donor Blocked Successfully
                                                    </div>
                                                </div>';
                                            
                                            }
                                        ?>     
                                        <?php
                                        
                                            if(isset($_GET['edit']) && $_GET['edit'] == 3){
                                                
                                                
                                            echo '
                                                <div class="container" dir="rtl" style="margin-top:80px;color:#000">
                                                    <div class="alert alert-success role="alert" style="color:#000;text-align:center">
                                                        Donor Activated Successfully
                                                    </div>
                                                </div>';
                                            
                                            }
                                        ?> 
                                        <?php
                                        
                                            if(isset($_GET['edit']) && $_GET['edit'] == 4){
                                                
                                                
                                            echo '
                                                <div class="container" dir="rtl" style="margin-top:80px;color:#000">
                                                    <div class="alert alert-success role="alert" style="color:#000;text-align:center">
                                                        Donation Deleted And Donor Blocked Successfully
                                                    </div>
                                                </div>';
                                            
                                            }
                                        ?>       
                                        <?php

                                        include('../connect.php');  
                                        $sql = $con->prepare("SELECT * FROM reports");      
                                        $sql->execute();
                                        $rows = $sql->fetchAll();

                                        foreach($rows as $pat)
                                        {
                                            
                                            $donate_id = $pat['donate_id'];
                                            $sqlq = $con->prepare("SELECT donors.* , donors.id as donor_id , donates.description , donates.quantity , donates.address , sections.name as section_name FROM donates INNER JOIN donors ON donates.donor_id=donors.id INNER JOIN sections ON sections.id=donates.section_id WHERE donates.id='$donate_id'");      
                                            $sqlq->execute();
                                            $rowsq = $sqlq->fetch();

                                        ?>     
                                        <tr>
                                            <td><a class="text-body fw-bold"><?php echo $pat['id']; ?></a></td>
                                            <td><?php echo $pat['description']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                    data-bs-target="#show-user-data"
                                                    data-bs-toggle="modal"
                                                    data-id="<?php echo $pat['id']; ?>"
                                                    data-description="<?php echo $pat['description']; ?>"
                                                    data-address="<?php echo $rowsq['address']; ?>"
                                                    data-description1="<?php echo $rowsq['description']; ?>"
                                                    data-quantity="<?php echo $rowsq['quantity']; ?>"
                                                    data-section_name="<?php echo $rowsq['section_name']; ?>"
                                                    data-donate_id="<?php echo $donate_id; ?>"
                                                    data-donor_id="<?php echo $rowsq['donor_id']; ?>"
                                                    data-name="<?php echo $rowsq['name']; ?>"
                                                    data-email="<?php echo $rowsq['email']; ?>"
                                                    data-phone="<?php echo $rowsq['phone']; ?>"
                                                    data-city="<?php echo $rowsq['city']; ?>"
                                                    data-quarter="<?php echo $rowsq['quarter']; ?>"
                                                    data-street="<?php echo $rowsq['street']; ?>"
                                                    data-status="<?php echo $rowsq['status']; ?>">
                                                    Show Details
                                                </button>
                                            </td>
                                        </tr>
                                        <?php } ?>    
                                       
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="show-user-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Report</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <td id="modalId"></td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td id="modalDescription"></td>
                                        </tr>
                                        <tr class="table-dark">
                                            <th colspan="2">
                                                <div class="row justify-content-around align-items-center">
                                                    <div class="col text-start">Donation Details</div>
                                                    <div class="col text-end">
                                                        <a class="btn btn-danger"
                                                            href="#" id="deleteButton" onclick="return confirm('Are you sure you want to continue?')" >
                                                            Delete <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td id="modalAddress"></td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td id="modalDescription1"></td>
                                        </tr>
                                        <tr>
                                            <th>Quantity</th>
                                            <td id="modalQuantity"></td>
                                        </tr>
                                        <tr>
                                            <th>Section</th>
                                            <td id="modalSection"></td>
                                        </tr>
                                        <tr class="table-dark">
                                            <th colspan="2">
                                                <div class="row justify-content-around align-items-center">
                                                    <div class="col text-start">Donor Details</div>
                                                    <div class="col text-end">
                                                        <a href="#" id="blockButton" onclick="return confirm('Are you sure you want to continue?')" type="button" class="btn btn-danger">Block <i class="fa fa-ban"></i></a>
                                                        <!-- زر الاكتيف -->
                                                        <a href="#" id="activeButton" class="btn btn-success" style="display: none;" onclick="return confirm('Are you sure you want to activate this user?')">
                                                            Active <i class="fa fa-check"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td id="modalName"></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td id="modalEmail"></td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td id="modalPhone"></td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td id="modalCity"></td>
                                        </tr>
                                        <tr>
                                            <th>Quarter</th>
                                            <td id="modalQuarter"></td>
                                        </tr>
                                        <tr>
                                            <th>Street</th>
                                            <td id="modalStreet"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Back</button>
                                <a href="#" id="blockDeleteButton" onclick="return confirm('Are you sure you want to continue?')" type="button" class="btn btn-danger">Block The Donor & Delete The Donation</i></a>
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
<script>
    // When the modal is about to be shown
    var showModal = document.getElementById('show-user-data');
    showModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget;
        
        // Extract info from data-* attributes
        var id = button.getAttribute('data-id');
        var description = button.getAttribute('data-description');
        var address = button.getAttribute('data-address');
        var description1 = button.getAttribute('data-description1');
        var quantity = button.getAttribute('data-quantity'); 
        var section = button.getAttribute('data-section_name'); 
        var donate_id = button.getAttribute('data-donate_id'); 
        var donor_id = button.getAttribute('data-donor_id'); 
        var name = button.getAttribute('data-name'); 
        var email = button.getAttribute('data-email'); 
        var phone = button.getAttribute('data-phone'); 
        var city = button.getAttribute('data-city'); 
        var quarter = button.getAttribute('data-quarter'); 
        var street = button.getAttribute('data-street'); 
        var status = button.getAttribute('data-status'); 
        
        console.log(phone);
         
        // Update the modal's content
        document.getElementById('modalId').textContent = id;
        document.getElementById('modalDescription').textContent = description;
        document.getElementById('modalAddress').textContent = address;
        document.getElementById('modalDescription1').textContent = description1;
        document.getElementById('modalQuantity').textContent = quantity;
        document.getElementById('modalSection').textContent = section;
        document.getElementById('modalName').textContent = name;
        document.getElementById('modalEmail').textContent = email;
        document.getElementById('modalPhone').textContent = phone;
        document.getElementById('modalCity').textContent = city;
        document.getElementById('modalQuarter').textContent = quarter;
        document.getElementById('modalStreet').textContent = street;
        
        
        // Show or hide buttons based on the status
        var blockButton = document.getElementById('blockButton');
        var activeButton = document.getElementById('activeButton');

        if (status == '1') {
            blockButton.style.display = 'block';   // إذا كانت الحالة 1، نظهر زر البلوك
            activeButton.style.display = 'none';   // نخفي زر الاكتيف
            blockButton.href = "block_user.php?id=" + donor_id + "&test=" + 2; // إعداد الرابط للبلوك
        } else if (status == '2') {
            blockButton.style.display = 'none';    // نخفي زر البلوك
            activeButton.style.display = 'block';  // نظهر زر الاكتيف
            activeButton.href = "activate_user.php?id=" + donor_id + "&test=" + 2; // إعداد الرابط للاكتيف
        }
        
        var deleteButton = document.getElementById('deleteButton');

        deleteButton.href = "delete_donate.php?id=" + donate_id;
        
        
        var blockDeleteButton = document.getElementById('blockDeleteButton');

        blockDeleteButton.href = "delete_block_donate.php?donate_id=" + donate_id + "&donor_id=" + donor_id;
        
    });
</script>    

</body>
</html>