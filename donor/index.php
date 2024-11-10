<?php
include 'config.php';
session_start();
$password = $_SESSION['password'];

if (!isset($password)) {
    header('location:../index.php');
};
$type=$_SESSION['type'];
if ($type!=='donor') {
    header('location:../index.php');
};
$donor_id= $_SESSION['id'];
if (isset($_GET['logout'])) {
    unset($donor_id);
    unset($password);
    session_destroy();
    header('location:../index.php');
}
$sections = mysqli_query($conn, "SELECT * FROM `sections`") or die('Query failed: ' . mysqli_error($conn));
$donors_data = mysqli_query($conn, "SELECT * FROM `donors` WHERE id = '$donor_id'") or die('Query failed: ' . mysqli_error($conn));
 $donors_data_name = mysqli_fetch_assoc($donors_data);
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
    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-warning" data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container"><a class="navbar-brand" href="../index.php">
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
            <li class="nav-item"><a class="nav-link text-light me-2" aria-current="page" href="donations.php"><i class="fa fa-donate"></i> Donations</a></li>
            <li class="nav-item"><a class="nav-link text-light me-2" aria-current="page" href="appointments.php"><i class="fa fa-calendar-check"></i> Appointments</a></li>
            

          </ul>
           <div class="d-flex ms-lg-4 align-items-center">
                            <a class="nav-link text-light" aria-current="page"><i class="fa fa-user"></i> <?php echo $donors_data_name['name'];   ?></a>
                            <a class="btn btn-danger" href="appointments.php?logout">Sign Out <i class="fa fa-arrow-right"></i></a>
                        </div>
        </div>
      </div>
    </nav>
    <section class="pt-7">

      <!-- <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block"
        style="background-image:url(assets/img/category/shape.png);opacity:1;">
      </div> -->
      <!--/.bg-holder-->

      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 text-md-center text-center py-6 wow animate__animated animate__fadeIn aya" style="font-size: 70px;">
            {وَأَقِيمُوا الصَّلَاةَ وَآتُوا <span class="text-warning fw-bolder">الزَّكَاةَ</span> وَأَقْرِضُوا اللَّهَ قَرْضًا حَسَنًا}
          </div>
          <div class="col-md-6 text-md-start text-center py-6 wow animate__animated animate__fadeInUp">
            <h1 class="mb-4 fs-9 fw-bold"><span class="text-warning">Empower Change:</span> Easy Donations, Greater
              Impact!</h1>
            <p class="mb-6 lead text-secondary">Join our community in making a difference. Donate items or funds
              effortlessly and trust that they will be delivered to those in need. Our streamlined process ensures your
              contributions are handled with care and reach their intended recipients swiftly.</p>
            <div class="text-center text-md-start">
              <a class="btn btn-warning me-3 btn-lg" href="donate.php" role="button">Make a Donation</a>
              <a class="btn btn-link text-warning fw-medium" href="#how-it-works" role="button"><span
                  class="fas fa-info-circle me-2"></span>Learn How It Works</a>
            </div>
          </div>
          <div class="col-md-6 text-end wow animate__animated animate__fadeInUp"><img class="pt-7 pt-md-0 img-fluid rounded"
              src="assets/img/3.png" alt="" />
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pt-5 pt-md-9 mb-6 mt-5" style="background-color: #c1c3ab55;" id="about-us">

      <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block"
        style="background-image:url(assets/img/category/shape.png);opacity:0.5; transform: scaleY(-1);">
      </div>
      <!--/.bg-holder-->

      <div class="container">
        <h1 class="fs-9 fw-bold mb-4 text-center wow animate__animated animate__bounceIn">About <span class="text-warning">Us</span></h1>



        <div class="row text-center align-items-center">
          <div class="col-md-6 text-start wow animate__animated animate__fadeIn">
            <img class="pt-7 pt-md-0 img-fluid rounded" src="assets/img/4.png" alt="" />
          </div>

          <div class="col-md-6 text-md-start wow animate__animated animate__fadeInUp">
            <div class="col-md-12 mb-4">
              <div class="icon mb-3">
                <i class="fas fa-people-carry fa-3x text-warning"></i>
              </div>
              <h3 class="fs-5 fw-bold">Our Mission</h3>
              <p class="text-secondary">We are dedicated to bridging the gap between generous donors and those in need.
                Our mission is to facilitate seamless donations and ensure that contributions make a meaningful impact
                in
                the community.</p>
            </div>

            <div class="col-md-12 mb-4 wow animate__animated animate__fadeInUp">
              <div class="icon mb-3">
                <i class="fas fa-hand-holding-heart fa-3x text-warning"></i>
              </div>
              <h3 class="fs-5 fw-bold">Our Services</h3>
              <p class="text-secondary">From collection and storage to distribution, we manage every step of the
                donation
                process. We ensure that each item or fund reaches its intended recipient efficiently and transparently.
              </p>
            </div>
          </div>

        </div>
      </div><!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pt-5 pt-md-9 mb-6" id="how-it-works">

      <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block"
        style="background-image:url(assets/img/category/shape.png);opacity:0.5;">
      </div>
      <!--/.bg-holder-->

      <div class="container">
        <h1 class="fs-9 fw-bold mb-4 text-center  wow animate__animated animate__bounceIn">Our <span class="text-warning">Sections</span></h1>

        <style>
          .section div {
            opacity: 0;
            transition: opacity .3s;
          }
          .section:hover div {
            opacity: 1;
          }
        </style>


        <div class="row justify-content-center align-items-center">
            <?php
if (isset($sections) && mysqli_num_rows($sections) > 0) {
    while ($section = mysqli_fetch_assoc($sections)) {
        $img='../assets/img/'.$section['image'];
        echo ' <div class="col-md-4 mb-4 wow animate__animated animate__fadeInUp">
            <div style="width: 300px; height: 300px; position: relative;" class="section mx-auto" role="button" onclick="location.href=\'donate.php\'">
              <img src="'.$img.'" class="img-fluid rounded-circle border border-warning border-2 p-1" width="300" height="300" style="height: 300px; z-index: 1000; object-fit: cover;" alt="">
              <div class="w-100 h-100 position-absolute rounded-circle d-flex justify-content-center align-items-center" style="top: 0; left: 0; background-color: rgba(0, 0, 0, .5);">
                <h3 class="text-white">'.$section['name'].' | Donate</h3>
              </div>
            </div>
          </div>';
        
        
    }
    }else {
        echo '<div class="col-md-4 mb-4 wow animate__animated animate__fadeInUp">
            <div style="width: 300px; height: 300px; position: relative;" class="section mx-auto" role="button" >
              <img src="assets/img/clothes.jpg" class="img-fluid rounded-circle border border-warning border-2 p-1" width="300" height="300" style="height: 300px; z-index: 1000; object-fit: cover;" alt="">
              <div class="w-100 h-100 position-absolute rounded-circle d-flex justify-content-center align-items-center" style="top: 0; left: 0; background-color: rgba(0, 0, 0, .5);">
                <h3 class="text-white">there are no sections | Donate</h3>
              </div>
            </div>
          </div>';
    }
    ?>
         
        </div>
      </div><!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pt-5 pt-md-9" style="background-color: #c1c3ab55;" id="how-it-works">

      <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block"
        style="background-image:url(assets/img/category/shape.png);opacity:0.5;">
      </div>
      <!--/.bg-holder-->

      <div class="container">
        <h1 class="fs-9 fw-bold mb-4 text-center  wow animate__animated animate__bounceIn">How <span class="text-warning">It Works</span></h1>

        <div class="row text-center">
          <div class="col-md-4 mb-4 wow animate__animated animate__fadeInUp">
            <div class="icon mb-3">
              <i class="fas fa-hand-holding-heart fa-3x text-warning"></i>
            </div>
            <h3 class="fs-5 fw-bold">1. Donate</h3>
            <p class="text-secondary">Choose to donate items or funds. You can easily schedule a pick-up or drop-off at
              our designated locations.</p>
          </div>

          <div class="col-md-4 mb-4 wow animate__animated animate__fadeInUp">
            <div class="icon mb-3">
              <i class="fas fa-box-open fa-3x text-warning"></i>
            </div>
            <h3 class="fs-5 fw-bold">2. We Collect</h3>
            <p class="text-secondary">Our team collects and stores your donations securely. We ensure everything is
              sorted and prepared for distribution.</p>
          </div>

          <div class="col-md-4 mb-4 wow animate__animated animate__fadeInUp">
            <div class="icon mb-3">
              <i class="fas fa-handshake fa-3x text-warning"></i>
            </div>
            <h3 class="fs-5 fw-bold">3. Distribute</h3>
            <p class="text-secondary">Donations are delivered to individuals or organizations in need. We ensure that
              your contributions make a meaningful impact.</p>
          </div>
        </div>

        <div class="text-center mt-4 wow animate__animated animate__fadeInUp">
          <a class="btn btn-warning btn-lg" href="donate.php" role="button">Make a Donation</a>
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
          <div class="col-lg-3 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1 text-center wow animate__animated animate__bounceIn">
            <!-- <img class="mb-4"
              src="assets/img/logo3.png" width="184" alt="" /> -->
            <h1 class="text-light fw-bolder">Neam</h1>
          </div>
          <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-3 order-md-3 order-lg-2 text-start wow animate__animated animate__bounceIn">
            <p class="fs-6 mb-lg-4 text-light fw-bolder">Quick Links</p>
            <ul class="list-unstyled mb-0">
              <li class="mb-1"><a
                  class="fs-1 link-light fw-bolder text-decoration-none d-flex justify-content-start align-items-center"
                  href="index.php"><i class="fa fa-home me-1" style="width: 25px;"></i> <span>Home</span></a>
              </li>
              <li class="mb-1"><a
                  class="fs-1 link-light fw-bolder text-decoration-none d-flex justify-content-start align-items-center"
                  href="sections.php"><i class="fa fa-list-ul me-1" style="width: 25px;"></i> <span>Sections</span></a>
              </li>
              <li class="mb-1"><a
                class="fs-1 link-light fw-bolder text-decoration-none d-flex justify-content-start align-items-center"
                href="donations.php"><i class="fa fa-donate me-1" style="width: 25px;"></i> <span>Donations</span></a>
            </li>
              <li class="mb-1"><a
                  class="fs-1 link-light fw-bolder text-decoration-none d-flex justify-content-start align-items-center"
                  href="appointments.php"><i class="fa fa-calendar-check me-1" style="width: 25px;"></i>
                  <span>Appointments</span></a>
              </li>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="assets/js/theme.js"></script>
  <!-- scripts -->
  <script src="assets/js/scripts.js"></script>

  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap"
    rel="stylesheet">
</body>

</html>