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
  <!-- theme -->
  <link href="assets/css/theme.css" rel="stylesheet" />

</head>


<body class="animate__animated animate__fadeIn">

  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-warning" data-navbar-on-scroll="data-navbar-on-scroll">
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
          <div class="d-flex ms-lg-4"><a class="btn btn-outline-light" href="login.php">Sign In</a><a
              class="btn btn-outline-light ms-3" href="register.php">Sign Up</a></div>
        </div>
      </div>
    </nav>

    <section class="pt-7">

      <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block"
        style="background-image:url(../../assets/img/category/shape.png);opacity:0.5;">
      </div>
      <!--/.bg-holder-->

      <div class="container">
        <?php
            
        if(isset($_POST['register'])){

            include('connect.php');
            $name = $_POST["name"];    
            $email = $_POST["email"];    
            $password = $_POST["password"];
            $confirm = $_POST["confirm"];
            $city = $_POST["city"]; 
            $qar = $_POST["qar"]; 
            $street = $_POST["street"]; 
            $phone = $_POST["phone"]; 
            $type = $_POST["type"]; 
            if($password == $confirm){
            if($type == 1){

        $sql=$con->prepare("SELECT * FROM beneficiaries WHERE 
        email=? AND password=?");
        $sql->execute(array($email,$password));
        $row=$sql->fetch();
        $count=$sql->rowCount();


        if($email != "" && $password != ""){


        if($count>0){


            $sql = $con->prepare("SELECT * FROM  beneficiaries");
            $sql->execute();
            $rows = $sql->fetchAll();

            foreach($rows as $pat)
            {
                if($email == $pat["email"] && $password == $pat["password"])
                {
                    echo '
            <div class="container" dir="rtl" style="margin-top:80px;color:#000">
                <div class="alert alert-danger role="alert" style="color:#000;text-align:center">
                    Email Or Password May Be Incorrect Please Try Again!
                </div>
            </div>';
                }

            }

        } else{

            $sql = "INSERT INTO beneficiaries (name , email , password , city , quarter , street , phone , status) VALUES ('$name' , '$email', '$password', '$city' , '$qar' , '$street' , '$phone' , '1')";

            $con->exec($sql);


            echo '
            <div class="container" dir="rtl" style="margin-top:80px;color:#000">
                <div class="alert alert-success role="alert" style="color:#000;text-align:center">
                    Account Created Successfully!
                </div>
            </div>';


            }}else{


            //include('logout.php');
            include('signup.php');

        }}else{

            $sql=$con->prepare("SELECT * FROM donors WHERE 
            email=? AND password=?");
            $sql->execute(array($email,$password));
            $row=$sql->fetch();
            $count=$sql->rowCount();

            if($email != "" && $password != ""){


                if($count>0){


                    $sql = $con->prepare("SELECT * FROM  donors");
                    $sql->execute();
                    $rows = $sql->fetchAll();

                    foreach($rows as $pat)
                    {
                        if($email == $pat["email"] && $password == $pat["password"])
                        {
                            echo '
                    <div class="container" dir="rtl" style="margin-top:80px;color:#000">
                        <div class="alert alert-danger role="alert" style="color:#000;text-align:center">
                            Email Or Password May Be Incorrect Please Try Again!
                        </div>
                    </div>';
                        }

                    }

                } else{

                    $sql = "INSERT INTO donors (name , email , password , city , quarter , street , phone , status) VALUES ('$name' , '$email', '$password', '$city' , '$qar' , '$street' , '$phone' , '1')";

                     $con->exec($sql);


                    echo '
                    <div class="container" dir="rtl" style="margin-top:80px;color:#000">
                        <div class="alert alert-success role="alert" style="color:#000;text-align:center">
                            Account Created Successfully!
                        </div>
                    </div>';


                    }}else{


                    //include('logout.php');
                    include('signup.php');

                }

        }


    }else{
            
            echo '
                    <div class="container" dir="rtl" style="margin-top:80px;color:#000">
                        <div class="alert alert-success role="alert" style="color:#000;text-align:center">
                            Password Desn\'t Matching
                        </div>
                    </div>';
            
            
            }}

    ?>  
        <div class="row align-items-center">
          <div class="col-md-6 text-md-start text-center py-6">
            <h1 class="mb-4 fs-9 fw-bold"><span class="text-warning">Create</span> an account</h1>
            <form id="login-form" method="post">
              <div>
                <label for="email">Account Type <span class="text-warning-darker">*</span></label>
                <select name="type" id="user_type" class="form-control border border-dark">
                  <option value="1">Beneficiary</option>
                  <option value="2">Donor</option>
                </select>
              </div>

              <div class="mt-3">
                <label for="name">Name <span class="text-warning-darker">*</span></label>
                <input type="text" name="name" required id="name" class="form-control border border-dark">
              </div>

              <div class="mt-3">
                <label for="email">Email <span class="text-warning-darker">*</span></label>
                <input type="email" name="email" required id="email" class="form-control border border-dark">
              </div>

              <div class="mt-3">
                <label for="phone">Phone <span class="text-warning-darker">*</span></label>
                <input type="text" name="phone" required id="phone" class="form-control border border-dark">
              </div>

              <div class="mt-3">
                <label for="city">City <span class="text-warning-darker">*</span></label>
                <input type="text" name="city" required id="city" class="form-control border border-dark">
              </div>

              <div class="mt-3">
                <label for="quarter">Quarter <span class="text-warning-darker">*</span></label>
                <input type="text" name="qar" required id="quarter" class="form-control border border-dark">
              </div>

              <div class="mt-3">
                <label for="street">Street <span class="text-warning-darker">*</span></label>
                <input type="text" name="street" required id="street" class="form-control border border-dark">
              </div>

              <div class="mt-3">
                <label for="password">Password <span class="text-warning-darker">*</span></label>
                <input type="password" name="password" required id="password" class="form-control border border-dark">
              </div>

              <div class="mt-3">
                <label for="password_confirmation">Confirm Password <span class="text-warning-darker">*</span></label>
                <input type="password" name="confirm" id="password_confirmation" class="form-control border border-dark">
              </div>

              <div class="text-center text-md-start mt-3">
                <button class="btn btn-warning me-3 btn-lg" type="submit" name="register" role="button">
                  Register&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>
                </button>
                <a class="btn-link text-warning fw-medium" href="login.php" role="button">
                  Do you already have an account?
                </a>
              </div>
            </form>
          </div>
          <div class="col-md-6 text-start"><img class="pt-7 pt-md-0 img-fluid" style="object-fit: cover;" width="100%"
              src="assets/img/5.png" alt="" />
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pb-2 pb-lg-5 bg-warning">

      <div class="container">
        <div class="row border-top border-top-secondary border-2 pt-7 justify-content-between align-items-center">
          <div class="col-lg-3 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1 text-center">
            <!-- <img class="mb-4"
              src="assets/img/logo3.png" width="184" alt="" /> -->
            <h1 class="text-light fw-bolder">Neam</h1>
          </div>
          <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 order-3 order-md-3 order-lg-2 text-start">
            <p class="fs-6 mb-lg-4 text-light fw-bolder">Quick Links</p>
            <ul class="list-unstyled mb-0">
              <li class="mb-1"><a
                  class="fs-1 link-light fw-bolder text-decoration-none d-flex justify-content-start align-items-center"
                  href="index.php"><i class="fa fa-home me-1" style="width: 25px;"></i> <span>Home</span></a>
              </li>
              <li class="mb-1"><a
                  class="fs-1 link-light fw-bolder text-decoration-none d-flex justify-content-start align-items-center"
                  href="login.php"><i class="fa fa-lock me-1" style="width: 25px;"></i> <span>Login</span></a>
              </li>
              <li class="mb-1"><a
                  class="fs-1 link-light fw-bolder text-decoration-none d-flex justify-content-start align-items-center"
                  href="register.php"><i class="fa fa-user-plus me-1" style="width: 25px;"></i>
                  <span>Register</span></a>
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
  <script src="assets/js/theme.js"></script>
  <!-- scripts -->


  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap"
    rel="stylesheet">
</body>

</html>