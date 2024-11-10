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
                                    <li class="breadcrumb-item active">Delivery Users</li>
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
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="card-title">
                                        <i class="fa me-2 fa-truck"></i> Delivery Users
                                    </h4>
                                    <div>
                                        <button class="btn btn-success"
                                            data-bs-target="#add"
                                            data-bs-toggle="modal">
                                            Add Delivery User <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap mb-0">
                                        <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>City</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         <?php
                  
                                            if(isset($_POST['add'])){

                                              $name = $_POST['name'];
                                              $email = $_POST['email']; 
                                              $city = $_POST['city'];
                                              $password = $_POST['password']; 
                                              $confirm = $_POST['confirm'];
                                              if($password == $confirm){    
                                              include('../connect.php');  
                                              $sqlPL = $con->prepare("SELECT * FROM deliveries WHERE email='$email'");      
                                              $sqlPL->execute();
                                              $rowsPL = $sqlPL->fetchAll();
                                              $countPL=$sqlPL->rowCount();
                                              if($countPL > 0){ 

                                                  foreach($rowsPL as $pat){

                                                      if($pat['email'] == $email){


                                                          echo '
                                                            <div class="container" dir="ltr" style="margin-top:80px;color:#000">
                                                                <div class="alert alert-danger role="alert" style="color:#000">
                                                                    This Delivery Is Found Before
                                                                </div>
                                                            </div>';



                                                      }


                                                  }


                                              }else{


                                                  $sql = "INSERT INTO deliveries (name , city , email , password , status) VALUES ('$name' , '$city' , '$email' , '$password' , '1')";

                                                    $con->exec($sql);

                                                  echo '
                                                    <div class="container" dir="ltr" style="margin-top:80px;color:#000">
                                                        <div class="alert alert-success role="alert" style="color:#000">
                                                            Delivery Added Successfully
                                                        </div>
                                                    </div>';


                                              }}else{
                                              
                                              
                                              echo '
                                                    <div class="container" dir="ltr" style="margin-top:80px;color:#000">
                                                        <div class="alert alert-success role="alert" style="color:#000">
                                                            Password Dosen\'t Matching
                                                        </div>
                                                    </div>';
                                              
                                              
                                              }

                                            }


                                          ?> 
                                            <?php
                                        
                                            if(isset($_GET['edit']) && $_GET['edit'] == 1){
                                                
                                                
                                            echo '
                                                <div class="container" dir="rtl" style="margin-top:80px;color:#000">
                                                    <div class="alert alert-success role="alert" style="color:#000;text-align:center">
                                                        Delivery Blocked Successfully
                                                    </div>
                                                </div>';
                                            
                                            }
                                        ?> 
                                       
                                        <?php
                                        
                                            if(isset($_GET['edit']) && $_GET['edit'] == 2){
                                                
                                                
                                            echo '
                                                <div class="container" dir="rtl" style="margin-top:80px;color:#000">
                                                    <div class="alert alert-success role="alert" style="color:#000;text-align:center">
                                                        Delivery Activated Successfully
                                                    </div>
                                                </div>';
                                            
                                            }
                                        ?> 
                                     
                                         <?php

                                        include('../connect.php');  
                                        $sql = $con->prepare("SELECT * FROM deliveries");      
                                        $sql->execute();
                                        $rows = $sql->fetchAll();

                                        foreach($rows as $pat)
                                        {

                                        ?>      
                                        <tr>
                                            <td><a class="text-body fw-bold"><?php echo $pat['id']; ?></a></td>
                                            <td><?php echo $pat['name']; ?></td>
                                            <td><?php echo $pat['email']; ?></td>
                                            <td><?php echo $pat['city']; ?></td>
                                            <?php if($pat['status'] == 1){ ?>
                                            <td>Active</td>
                                            <?php }else{ ?>
                                            <td>Blocked</td>
                                            <?php  } ?>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                    data-bs-target="#show-user-data"
                                                    data-bs-toggle="modal"
                                                    data-id="<?php echo $pat['id']; ?>"
                                                    data-name="<?php echo $pat['name']; ?>"
                                                    data-email="<?php echo $pat['email']; ?>"
                                                    data-city="<?php echo $pat['city']; ?>"
                                                    data-status="<?php echo $pat['status']; ?>">
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
                                <h5 class="modal-title" id="modalTitle"></h5>
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
                                            <th>Name</th>
                                            <td id="modalName"></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td id="modalEmail"></td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td id="modalCity"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Back</button>
                                <a href="#" id="blockButton" onclick="return confirm('Are you sure you want to continue?')" type="button" class="btn btn-danger">Block <i class="fa fa-ban"></i></a>
                                <!-- زر الاكتيف -->
                                <a href="#" id="activeButton" class="btn btn-success" style="display: none;" onclick="return confirm('Are you sure you want to activate this user?')">
                                    Active <i class="fa fa-check"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Delivery User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" class="form">
                                <div class="modal-body">
                                    <div class="d-flex flex-column justify-content-around gap-4">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" required id="name" placeholder="Enter Delivery User Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" required id="email" placeholder="Enter Delivery User Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" name="city" required id="city" placeholder="Enter Delivery User City">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" required id="password" placeholder="Enter Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirm" required id="password_confirmation" placeholder="Enter Password Confirmation">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Back</button>
                                    <button type="submit" name="add" class="btn btn-success">
                                        Save <i class="fa fa-save"></i>
                                    </button>
                                </div>
                            </form>
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
        var name = button.getAttribute('data-name');
        var email = button.getAttribute('data-email');
        var city = button.getAttribute('data-city');
        var status = button.getAttribute('data-status'); // جلب الحالة

        // Update the modal's content
        document.getElementById('modalTitle').textContent = 'User: ' + name;
        document.getElementById('modalId').textContent = id;
        document.getElementById('modalName').textContent = name;
        document.getElementById('modalEmail').textContent = email;
        document.getElementById('modalCity').textContent = city;
        
        // Show or hide buttons based on the status
        var blockButton = document.getElementById('blockButton');
        var activeButton = document.getElementById('activeButton');

        if (status == '1') {
            blockButton.style.display = 'block';   // إذا كانت الحالة 1، نظهر زر البلوك
            activeButton.style.display = 'none';   // نخفي زر الاكتيف
            blockButton.href = "block_delv.php?id=" + id; // إعداد الرابط للبلوك
        } else if (status == '2') {
            blockButton.style.display = 'none';    // نخفي زر البلوك
            activeButton.style.display = 'block';  // نظهر زر الاكتيف
            activeButton.href = "activate_delv.php?id=" + id; // إعداد الرابط للاكتيف
        }
    });
</script>    

</body>
</html>