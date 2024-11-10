<?php
include 'config.php';
session_start();
if(isset($_SESSION['password'])){
	
    if($_SESSION['type'] == "admin"){
        
        $id = $_SESSION['id'];
        
    }elseif($_SESSION['type'] == "delivery"){
        
        
        $id = $_SESSION['id'];
        
    }elseif($_SESSION['type'] == "beneficiary"){
        
        
        $id = $_SESSION['id'];
        
    }elseif($_SESSION['type'] == "donor"){
        
        
        $id = $_SESSION['id'];
        
    }
}
$donates = mysqli_query($conn, "SELECT * FROM `donates`") or die('Query failed: ' . mysqli_error($conn));
$sections_clothes = mysqli_query($conn, "SELECT * FROM `sections` WHERE name = 'clothes'") or die('Query failed: ' . mysqli_error($conn));
$sections_food = mysqli_query($conn, "SELECT * FROM `sections` WHERE name = 'food'") or die('Query failed: ' . mysqli_error($conn));
$sections_moneys = mysqli_query($conn, "SELECT * FROM `sections` WHERE name = 'money'") or die('Query failed: ' . mysqli_error($conn));
 

?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>Neam</title>


  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/logo3.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/logo3.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo3.png">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo3.png">
  <link rel="manifest" href="assets/img/favicons/manifest.json">
  <meta name="msapplication-TileImage" content="assets/img/logo3.png">
  <meta name="theme-color" content="#ffffff">


  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <!-- swiper -->
  <link rel="stylesheet" href="assets/css/lib/swiper.min.css">
  <!-- animate css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.compat.min.css"
    integrity="sha512-b42SanD3pNHoihKwgABd18JUZ2g9j423/frxIP5/gtYgfBz/0nDHGdY/3hi+3JwhSckM3JLklQ/T6tJmV7mZEw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gulzar&display=swap" rel="stylesheet">
  <!-- theme -->
  <link href="assets/css/theme.css" rel="stylesheet" />

  <!-- fonts activate -->
  <style>
    .aya {
      font-family: "Gulzar", serif;
      font-weight: 400;
      font-style: normal;
    }
  </style>

</head>


<body class="animate__animated animate__fadeIn">

  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-warning"
      data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container"><a class="navbar-brand" href="index.php">
          <img src="assets/img/logo2.png" height="100"
            alt="logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
            class="navbar-toggler-icon"> </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link text-light me-2" aria-current="page" href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="nav-item"><a class="nav-link text-light me-2" aria-current="page" href="sections.php"><i class="fa fa-list-ul"></i> Sections</a></li>


          </ul>
          <?php
            
            if(isset($_SESSION['password'])){
	
                if($_SESSION['type'] == "admin"){ ?>

                    <div class="d-flex ms-lg-4"><a class="btn btn-outline-light" href="admin/index.php">My Profile</a></div>

           <?php  }elseif($_SESSION['type'] == "delivery"){ ?>

<div class="d-flex ms-lg-4"><a class="btn btn-outline-light" href="delivery_man/donation_requests.php">My Profile</a></div>
                    

              <?php  }elseif($_SESSION['type'] == "beneficiary"){ ?>


                    <div class="d-flex ms-lg-4"><a class="btn btn-outline-light" href="beneficiary/index.php">My Profile</a></div>

               <?php }elseif($_SESSION['type'] == "donor"){ ?>


            <div class="d-flex ms-lg-4"><a class="btn btn-outline-light" href="donor/index.php">My Profile</a></div>
                    

              <?php  }
                
            }else{ ?>
            
            <div class="d-flex ms-lg-4"><a class="btn btn-outline-light" href="login.php">Sign In</a><a
              class="btn btn-outline-light ms-3" href="register.php">Sign Up</a></div>
            
           <?php }
            
            
            ?>
        </div>
      </div>
    </nav>

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="mb-6" id="about-us">

      <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block"
        style="background-image:url(assets/img/category/shape.png);opacity:0.5; transform: scaleY(-1);">
      </div>
      <!--/.bg-holder-->

      <div class="container">
        <div class="col-md-12 text-md-center text-center py-6 wow animate__animated animate__fadeIn aya"
          style="font-size: 50px;">
          {مَّن ذَا الَّذِي يُقْرِضُ اللّهَ <span class="text-warning fw-bolder">قَرْضًا حَسَنًا</span> فَيُضَاعِفَهُ
          لَهُ <span class="text-warning fw-bolder">أَضْعَافًا كَثِيرَةً</span>}
        </div>

        <ul class="nav nav-pills mb-3 gap-2 justify-content-center" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="rounded-pill btn btn-outline-warning active" id="pills-all-tab" data-bs-toggle="pill"
              data-bs-target="#pills-all" type="button" role="tab">All</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="rounded-pill btn btn-outline-warning" id="pills-clothes-tab" data-bs-toggle="pill"
              data-bs-target="#pills-clothes" type="button" role="tab">Clothes</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="rounded-pill btn btn-outline-warning" id="pills-food-tab" data-bs-toggle="pill"
              data-bs-target="#pills-food" type="button" role="tab">Food</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="rounded-pill btn btn-outline-warning" id="pills-money-tab" data-bs-toggle="pill"
              data-bs-target="#pills-money" type="button" role="tab">Money</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
            <div class="row gx-4 gx-lg-5 justify-content-center text-start">
              <?php
if (isset($donates) && mysqli_num_rows($donates) > 0) {
    while ($donate = mysqli_fetch_assoc($donates)) {
        $section_id=$donate['section_id'];
        $sections = mysqli_query($conn, "SELECT * FROM `sections` WHERE id = '$section_id'") or die('Query failed: ' . mysqli_error($conn));
        $section= mysqli_fetch_assoc($sections);
        $donor_idt=$donate['donor_id'];
        $donors = mysqli_query($conn, "SELECT * FROM `donors` WHERE id = '$donor_idt'") or die('Query failed: ' . mysqli_error($conn));
        $donor= mysqli_fetch_assoc($donors);
        $image='assets/img/'.$donate['image'];
        echo '<div class="col-lg-5 mt-3 p-2">
                <div class="card border p-1">
                  <img
                    src="'.$image.'"
                    class="card-img-top border border-warning border-3" alt="..." width="220" height="220"
                    style="object-fit: cover;">
                  <div class="card-body">
                    <h5 class="card-title fw-bolder">
                      Mrs. '.$donor['name'].'
                    </h5>
                    <h6>'.$section['name'].'</h6>
                  </div>
                  <div class="card-body">
                    <div>
                      <span class="d-block">
                        <span class="text-warning fw-bolder">Quantity:</span> '.$donate['quantity'].'
                      </span>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="d-flex justify-content-start align-items-center gap-2">
                      <a class="btn btn-warning"
                        href="login.php">Donate <i class="fa fa-donate"></i></a>
                    </div>
                  </div>
                </div>
              </div>';
        
    }
    }else {
        echo ' <div class="col-lg-5 mt-3 p-2">
                <div class="card border p-1">
                  
                  <div class="card-body">
                    <h5 class="card-title fw-bolder">
                      there are no Sections
                    </h5>
                  </div>
                  <div class="card-body">
                    
                  </div>
                  <div class="card-footer">
                    <div class="d-flex justify-content-start align-items-center gap-2">
                     
                    </div>
                  </div>
                </div>
              </div>';
    }
    ?>

            </div>
          </div>
          <div class="tab-pane fade" id="pills-clothes" role="tabpanel" aria-labelledby="pills-clothes-tab">
            <div class="row gx-4 gx-lg-5 justify-content-center text-start">
             <?php
if (isset($sections_clothes) && mysqli_num_rows($sections_clothes) > 0) {
    while ($sections_clothe = mysqli_fetch_assoc($sections_clothes)) {
        $section_idc=$sections_clothe['id'];
        $donates_clothes = mysqli_query($conn, "SELECT * FROM `donates` WHERE section_id = '$section_idc'") or die('Query failed: ' . mysqli_error($conn));
        if (isset($donates_clothes) && mysqli_num_rows($donates_clothes) > 0) {
    while ($donates_clothe = mysqli_fetch_assoc($donates_clothes)) {
         $donor_idtc=$donates_clothe['donor_id'];
        $donorsc = mysqli_query($conn, "SELECT * FROM `donors` WHERE id = '$donor_idtc'") or die('Query failed: ' . mysqli_error($conn));
        $donorc= mysqli_fetch_assoc($donorsc);
        $image='assets/img/'.$sections_clothe['image'];
        echo ' <div class="col-lg-5 mt-3 p-2">
                <div class="card border p-1">
                  <img
                    src="'.$image.'"
                    class="card-img-top border border-warning border-3" alt="..." width="220" height="220"
                    style="object-fit: cover;">
                  <div class="card-body">
                    <h5 class="card-title fw-bolder">
                      Mrs. '.$donorc['name'].'
                    </h5>
                    <h6>Clothes</h6>
                  </div>
                  <div class="card-body">
                    <div>
                      <span class="d-block">
                        <span class="text-warning fw-bolder">Quantity:</span> '.$donates_clothe['quantity'].'
                      </span>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="d-flex justify-content-start align-items-center gap-2">
                      <a class="btn btn-warning"
                        href="login.php">Donate <i class="fa fa-donate"></i></a>
                    </div>
                  </div>
                </div>
              </div>';
        
    }
    }
        
    }
    }else {
         echo ' <div class="col-lg-5 mt-3 p-2">
                <div class="card border p-1">
                  
                  <div class="card-body">
                    <h5 class="card-title fw-bolder">
                      there are no Sections
                    </h5>
                  </div>
                  <div class="card-body">
                    
                  </div>
                  <div class="card-footer">
                    <div class="d-flex justify-content-start align-items-center gap-2">
                     
                    </div>
                  </div>
                </div>
              </div>';
    }
    ?>
              
            </div>
          </div>
          <div class="tab-pane fade" id="pills-food" role="tabpanel" aria-labelledby="pills-food-tab">
            <div class="row gx-4 gx-lg-5 justify-content-center text-start">
             <?php
if (isset($sections_food) && mysqli_num_rows($sections_food) > 0) {
    while ($sections_food_data = mysqli_fetch_assoc($sections_food)) {
        $section_idf=$sections_food_data['id'];
        $donates_foods = mysqli_query($conn, "SELECT * FROM `donates` WHERE section_id = '$section_idf'") or die('Query failed: ' . mysqli_error($conn));
        if (isset($donates_foods) && mysqli_num_rows($donates_foods) > 0) {
    while ($donates_food = mysqli_fetch_assoc($donates_foods)) {
         $donor_idtf=$donates_food['donor_id'];
        $donorsf = mysqli_query($conn, "SELECT * FROM `donors` WHERE id = '$donor_idtf'") or die('Query failed: ' . mysqli_error($conn));
        $donorf= mysqli_fetch_assoc($donorsf);
        $image='assets/img/'.$donates_food['image'];
        echo ' <div class="col-lg-5 mt-3 p-2">
                <div class="card border p-1">
                  <img
                    src="'.$image.'"
                    class="card-img-top border border-warning border-3" alt="..." width="220" height="220"
                    style="object-fit: cover;">
                  <div class="card-body">
                    <h5 class="card-title fw-bolder">
                      Mrs. '.$donorf['name'].'
                    </h5>
                    <h6>food</h6>
                  </div>
                  <div class="card-body">
                    <div>
                      <span class="d-block">
                        <span class="text-warning fw-bolder">Quantity:</span> '.$donates_food['quantity'].'
                      </span>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="d-flex justify-content-start align-items-center gap-2">
                      <a class="btn btn-warning"
                        href="login.php">Donate <i class="fa fa-donate"></i></a>
                    </div>
                  </div>
                </div>
              </div>';
        
    }
    }
        
    }
    }else {
         echo ' <div class="col-lg-5 mt-3 p-2">
                <div class="card border p-1">
                  
                  <div class="card-body">
                    <h5 class="card-title fw-bolder">
                      there are no Sections
                    </h5>
                  </div>
                  <div class="card-body">
                    
                  </div>
                  <div class="card-footer">
                    <div class="d-flex justify-content-start align-items-center gap-2">
                     
                    </div>
                  </div>
                </div>
              </div>';
    }
    ?>
              
            </div>
          </div>
          <div class="tab-pane fade" id="pills-money" role="tabpanel" aria-labelledby="pills-money-tab">
            <div class="row gx-4 gx-lg-5 justify-content-center text-start">
              <?php
if (isset($sections_moneys) && mysqli_num_rows($sections_moneys) > 0) {
    while ($sections_moneys = mysqli_fetch_assoc($sections_moneys)) {
        $section_idm=$sections_moneys['id'];
        $donates_moneys = mysqli_query($conn, "SELECT * FROM `donates` WHERE section_id = '$section_idm'") or die('Query failed: ' . mysqli_error($conn));
        if (isset($donates_moneys) && mysqli_num_rows($donates_moneys) > 0) {
    while ($donates_money = mysqli_fetch_assoc($donates_moneys)) {
         $donor_idtm=$donates_money['donor_id'];
        $donorsm = mysqli_query($conn, "SELECT * FROM `donors` WHERE id = '$donor_idtm'") or die('Query failed: ' . mysqli_error($conn));
        $donorm= mysqli_fetch_assoc($donorsm);
        $image='assets/img/'.$donates_money['image'];
        echo ' <div class="col-lg-5 mt-3 p-2">
                <div class="card border p-1">
                  <img
                    src="'.$image.'"
                    class="card-img-top border border-warning border-3" alt="..." width="220" height="220"
                    style="object-fit: cover;">
                  <div class="card-body">
                    <h5 class="card-title fw-bolder">
                      Mrs. '.$donorm['name'].'
                    </h5>
                    <h6>Clothes</h6>
                  </div>
                  <div class="card-body">
                    <div>
                      <span class="d-block">
                        <span class="text-warning fw-bolder">Quantity:</span> '.$donates_money['quantity'].'
                      </span>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="d-flex justify-content-start align-items-center gap-2">
                      <a class="btn btn-warning"
                        href="login.php">Donate <i class="fa fa-donate"></i></a>
                    </div>
                  </div>
                </div>
              </div>';
        
    }
    }
        
    }
    }else {
         echo ' <div class="col-lg-5 mt-3 p-2">
                <div class="card border p-1">
                  
                  <div class="card-body">
                    <h5 class="card-title fw-bolder">
                      there are no Sections
                    </h5>
                  </div>
                  <div class="card-body">
                    
                  </div>
                  <div class="card-footer">
                    <div class="d-flex justify-content-start align-items-center gap-2">
                     
                    </div>
                  </div>
                </div>
              </div>';
    }
    ?>
                

             
            </div>
          </div>
        </div>
      </div><!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pb-2 pb-lg-5 bg-warning">

      <div class="container">
        <div class="row border-top border-top-secondary border-2 pt-7 justify-content-between align-items-center">
          <div
            class="col-lg-3 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1 text-center wow animate__animated animate__bounceIn">
            <!-- <img class="mb-4"
              src="assets/img/logo3.png" width="184" alt="" /> -->
            <h1 class="text-light fw-bolder">Neam</h1>
          </div>
          <div
            class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-3 order-md-3 order-lg-2 text-start wow animate__animated animate__bounceIn">
            <p class="fs-6 mb-lg-4 text-light fw-bolder">Quick Links</p>
            <ul class="list-unstyled mb-0">
              <li class="mb-1"><a
                  class="fs-1 link-light fw-bolder text-decoration-none d-flex justify-content-start align-items-center"
                  href="index.php"><i class="fa fa-home me-1" style="width: 25px;"></i> <span>Home</span></a>
              </li>
              <?php
            
            if(isset($_SESSION['password'])){
	
                if($_SESSION['type'] == "admin"){ ?>

                    <li class="mb-1"><a
                  class="fs-1 link-light fw-bolder text-decoration-none d-flex justify-content-start align-items-center"
                  href="admin/index.php"><i class="fa fa-user me-1" style="width: 25px;"></i> <span>My Profile</span></a>
              </li>

           <?php  }elseif($_SESSION['type'] == "delivery"){ ?>

<li class="mb-1"><a
                  class="fs-1 link-light fw-bolder text-decoration-none d-flex justify-content-start align-items-center"
                  href="delivery_man/donation_requests.php"><i class="fa fa-user me-1" style="width: 25px;"></i> <span>My Profile</span></a>
              </li>
                    

              <?php  }elseif($_SESSION['type'] == "beneficiary"){ ?>


                    <li class="mb-1"><a
                  class="fs-1 link-light fw-bolder text-decoration-none d-flex justify-content-start align-items-center"
                  href="beneficiary/index.php"><i class="fa fa-user me-1" style="width: 25px;"></i> <span>My Profile</span></a>
              </li>

               <?php }elseif($_SESSION['type'] == "donor"){ ?>


            <li class="mb-1"><a
                  class="fs-1 link-light fw-bolder text-decoration-none d-flex justify-content-start align-items-center"
                  href="donor/index.php"><i class="fa fa-user me-1" style="width: 25px;"></i> <span>My Profile</span></a>
              </li>
              
                    

              <?php  }
                
            }else{ ?>
            
            <li class="mb-1"><a
                  class="fs-1 link-light fw-bolder text-decoration-none d-flex justify-content-start align-items-center"
                  href="login.php"><i class="fa fa-lock me-1" style="width: 25px;"></i> <span>Login</span></a>
              </li>
              <li class="mb-1"><a
                  class="fs-1 link-light fw-bolder text-decoration-none d-flex justify-content-start align-items-center"
                  href="register.php"><i class="fa fa-user-plus me-1" style="width: 25px;"></i>
                  <span>Register</span></a>
              </li>
            
           <?php }
            
            
            ?>   
            </ul>
          </div>
        </div>
      </div><!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="text-center py-0">

      <div class="container">
        <div class="container border-top py-3">
          <div class="mb-1 mb-md-0">
            <p class="mb-0 text-center"> All rights reserved &copy; <span class="text-warning fw-bold">2024 -
                Neam</span>. </p>
          </div>
        </div>
      </div><!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->


  </main>
  <!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->


  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <script src="assets/js/lib/jquery.3.7.min.js"></script>
  <script src="assets/js/lib/bootstrap.bundle.min.js"></script>
  <script src="vendors/is/is.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="vendors/fontawesome/all.min.js"></script>
  <!-- swiper -->
  <script src="assets/js/lib/swiper.min.js"></script>
  <!-- wow -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
    integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="assets/js/theme.js"></script>
  <!-- scripts -->
  <script src="assets/js/scripts.js"></script>

  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap"
    rel="stylesheet">
</body>

</html>