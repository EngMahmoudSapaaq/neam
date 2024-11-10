<?php
include 'config.php';
session_start();
$password = $_SESSION['password'];
$type=$_SESSION['type'];
if ($type!='beneficiary') {
    header('location:../index.php');
};
if (!isset($password)) {
    header('location:../index.php');
};
$beneficiary_id= $_SESSION['id'];
if (isset($_GET['logout'])) {
    unset($beneficiary_id);
    unset($password);
    session_destroy();
    header('location:../index.php');
}
$requests = mysqli_query($conn, "SELECT * FROM `requests` WHERE beneficiary_id = '$beneficiary_id' AND status = 'accepted'") or die('Query failed: ' . mysqli_error($conn));
$beneficiarys_data = mysqli_query($conn, "SELECT * FROM `beneficiaries` WHERE id = '$beneficiary_id'") or die('Query failed: ' . mysqli_error($conn));
$beneficiarys_data_name = mysqli_fetch_assoc($beneficiarys_data);

//----------------------------------
if (isset($_GET['appointment_id'])) {
    $appointment_id = $_GET['appointment_id'];
    
         $requests = "UPDATE `receive_appointments` SET `beneficiary_consent` = 'accepted' WHERE `id` = '$appointment_id'";
    mysqli_query($conn, $requests);
    
     header('location:appointments.php');
    
   
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
            <li class="nav-item"><a class="nav-link text-light me-2" aria-current="page" href="donations.php"><i class="fa fa-donate"></i> Donations</a></li>
            <li class="nav-item"><a class="nav-link text-light me-2" aria-current="page" href="requests.php"><i class="fa fa-file"></i> Donation Requests</a></li>  
            <li class="nav-item"><a class="nav-link text-light me-2" aria-current="page" href="appointments.php"><i class="fa fa-calendar-check"></i> Appointments</a></li>
            

          </ul>
          <div class="d-flex ms-lg-4 align-items-center">
            <a class="nav-link text-light" aria-current="page"><i class="fa fa-user"></i> </i>  <?php echo $beneficiarys_data_name['name']; ?></a>
            <a class="btn btn-danger" href="requests.php?logout">Sign Out <i class="fa fa-arrow-right"></i></a>
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
          style="font-size: 50px;" dir="rtl">
          {لَن تَنَالُوا الْبِرَّ حَتَّىٰ <span class="text-warning fw-bolder">تُنفِقُوا</span> مِمَّا تُحِبُّونَ وَمَا <span class="text-warning fw-bolder">تُنفِقُوا</span> مِن شَيْءٍ فَإِنَّ اللَّهَ بِهِ عَلِيمٌ}
        </div>

        <div class="row">
          <div class="text-md-start text-center py-6">
            <h1 class="mb-4 fs-9 fw-bold text-center">
              <span class="text-warning">App</span>ointments
            </h1>
          </div>
          <div class="col-12 m-auto">
            <table class="dataTable table">
              <thead>
                                <th class="align-middle">Donation Number</th>
                                <th class="align-middle">Recieve Date</th>
                                <th class="align-middle">Delivery Man Name</th>
                                <th class="align-middle">Beneficiary consent</th>
                                <th class="align-middle">Appointment status</th>
                                <th class="align-middle">Actions</th>
                                </thead>
              <tbody>
                  
                   <?php
if (isset($requests) && mysqli_num_rows($requests) > 0) {
    while ($request = mysqli_fetch_assoc($requests)) {
        $request_id = $request['id'];
        $receive_appointments = mysqli_query($conn, "SELECT * FROM `receive_appointments` WHERE request_id = '$request_id'") or die('Query failed: ' . mysqli_error($conn));
        $receive_appointment = mysqli_fetch_assoc($receive_appointments);
        //-------------------------------------------
        $donate_id = $request['donate_id'];
        $donates = mysqli_query($conn, "SELECT * FROM `donates` WHERE id = '$donate_id'") or die('Query failed: ' . mysqli_error($conn));
        $donate = mysqli_fetch_assoc($donates);
        $this_Beneficiary_id = $request['beneficiary_id'];

        // Fetch delivery info
        $deliver_id = $receive_appointment['deliver_id'];
        $deliveries = mysqli_query($conn, "SELECT * FROM `deliveries` WHERE id = '$deliver_id'") or die('Query failed: ' . mysqli_error($conn));
        $deliverie = mysqli_fetch_assoc($deliveries);

        if ($this_Beneficiary_id == $beneficiary_id) {
            echo '<tr>
            <td class="align-middle">' . $donate['id'] . '</td>';

            // Format the receive date to 'dd/mm/yyyy'
            $formattedDate = date('d/m/Y', strtotime($receive_appointment['beneficiary_receive_date']));
            echo '<td class="align-middle">' . $formattedDate . '</td>';

            if ($receive_appointment['deliver_id'] > 0) {
                echo '<td class="align-middle">' . $deliverie['name'] . '</td>';
            } else {
                echo '<td class="align-middle">not yet</td>';
            }

            echo '<td class="align-middle"><span class="badge bg-secondary">' . $receive_appointment['beneficiary_consent'] . '</span></td>
            <td class="align-middle"><span class="badge bg-secondary">' . $receive_appointment['status'] . '</span></td>';

            if ($receive_appointment['status'] == 'pending') {
                echo '<td class="align-middle">
                <a role="button" href="appointments.php?appointment_id=' . $receive_appointment['id'] . '" class="btn btn-success p-0" style="padding-right: 5px !important; padding-left: 5px !important;">
                    <i class="fa fa-check"></i>
                </a>
                <a role="button" href="edit_date.php?appointment_id=' . $receive_appointment['id'] . '" class="btn btn-primary p-0" style="padding-right: 5px !important; padding-left: 5px !important;">
                    <i class="fa fa-edit"></i>
                </a>
                </td>';
            } else {
                echo '<td class="align-middle">
                <a role="button" class="btn btn-success p-0" style="padding-right: 5px !important; padding-left: 5px !important;">
                    --
                </a>
                <a role="button" class="btn btn-primary p-0" style="padding-right: 5px !important; padding-left: 5px !important;">
                    --
                </a>
                </td>';
            }

            echo '</tr>';
        }
    }
} else {
    echo '<tr>
    <td class="align-middle"></td>
    <td class="align-middle">there are no data</td>
    <td class="align-middle"></td>
    <td class="align-middle"></td>
    <td class="align-middle"></td>
    <td class="align-middle"></td>
    </tr>';
}
?>
               
              </tbody>
            </table>
          </div>
      </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editLabel">Edit Appointment</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="appointments.php">
              <div class="modal-body">
                <div class="mt-3">
                  <label for="date">New Recieve Date <span class="text-warning-darker">*</span></label>
                  <input type="date" id="date" class="form-control border border-dark">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning">Request Changes <i class="fa fa-arrow-right ms-2"></i></button>
              </div>
            </form>
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