<?php
include 'config.php';
session_start();
$password = $_SESSION['password'];
$type = $_SESSION['type'];
if ($type != 'beneficiary') {
    header('location:../index.php');
};
if (!isset($password)) {
    header('location:../index.php');
};
$beneficiary_id = $_SESSION['id'];
if (isset($_GET['logout'])) {
    unset($beneficiary_id);
    unset($password);
    session_destroy();
    header('location:../index.php');
}
$beneficiarys_data = mysqli_query($conn, "SELECT * FROM `beneficiaries` WHERE id = '$beneficiary_id'") or die('Query failed: ' . mysqli_error($conn));
$beneficiarys_data_name = mysqli_fetch_assoc($beneficiarys_data);
$donate_id = $_GET['donate_id'] ?? null;
if (isset($_POST['submit'])) {

    $Report = mysqli_real_escape_string($conn, $_POST['Report']);



   $insert = mysqli_query($conn, "INSERT INTO `reports`(description,donate_id)"
            . " VALUES('$Report','$donate_id')") or die('query failed');
    if ($insert) {
        $message1[] = 'A report has been added successfully';
    } else {
        $message[] = 'Something went wrong with the plugin!';
    }
}
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
            .message{
                margin:10px 0;
                width: 100%;
                border-radius: 5px;
                padding:10px;
                text-align: center;
                background-color:red;
                color:white;
                font-size: 20px;
            }
            .message1{
                margin:10px 0;
                width: 100%;
                border-radius: 5px;
                padding:10px;
                text-align: center;
                background-color:green;
                color:white;
                font-size: 20px;
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
                            <li class="nav-item"><a class="nav-link text-light me-2" aria-current="page" href="donations.php"><i class="fa fa-donate"></i> Donations</a></li>
                            <li class="nav-item"><a class="nav-link text-light me-2" aria-current="page" href="requests.php"><i class="fa fa-file"></i> Donation Requests</a></li>  
                            <li class="nav-item"><a class="nav-link text-light me-2" aria-current="page" href="appointments.php"><i class="fa fa-calendar-check"></i> Appointments</a></li>


                        </ul>
                        <div class="d-flex ms-lg-4 align-items-center">
                            <a class="nav-link text-light" aria-current="page"><i class="fa fa-user"></i> <?php echo $beneficiarys_data_name['name']; ?></a>
                            <a class="btn btn-danger" href="index.php?logout">Sign Out <i class="fa fa-arrow-right"></i></a>
                        </div>
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
                        {وَأَقِيمُوا الصَّلَاةَ وَآتُوا <span class="text-warning fw-bolder">الزَّكَاةَ</span> وَارْكَعُوا مَعَ الرَّاكِعِينَ}
                    </div>

                    <div class="row align-items-center">
                        <div class="col-md-6 text-md-start text-center py-6">
                            <h1 class="mb-4 fs-9 fw-bold">Send   <span class="text-warning">Report</span></h1>
                            <?php
                            if (isset($message)) {
                                foreach ($message as $message) {
                                    echo '<div class="message">' . $message . '</div>';
                                }
                            } elseif (isset($message1)) {
                                foreach ($message1 as $message1) {
                                    echo '<div class="message1">' . $message1 . '</div>';
                                }
                            }
                            ?>
                            <form method="post" enctype="multipart/form-data" >
                                <div class="mt-3">
                                    <label for="date">Report <span class="text-warning-darker">*</span></label>
                                    <textarea  style="height: 200px" name="Report" id="date" class="form-control border border-dark"></textarea>
                                </div>





                                <div class="text-center text-md-start mt-3">
                                    <button class="btn btn-warning me-3 btn-lg" type="submit" name="submit">
                                        Send&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 text-start"><img class="pt-7 pt-md-0 img-fluid" style="object-fit: cover;" width="100%"
                                                              src="assets/img/1.png" alt="" />
                        </div>
                    </div>
                </div>

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
                                        href="requests.php"><i class="fa fa-list-ul me-1" style="width: 25px;"></i> <span>Donations Requests</span></a>
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