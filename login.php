<?php

ob_start();

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

       if(isset($_POST['login'])){

        session_start();

        include('connect.php');  

        //print_r($_POST);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $type = $_POST['type'];
           
        if($type == 1){

           
           $sql1=$con->prepare("SELECT * FROM beneficiaries WHERE 
            email=? AND password=?");
            $sql1->execute(array($email,$password));
            $row1=$sql1->fetch();
            //print_r($row);
            $count1=$sql1->rowCount();       

            //echo "<br>".$count;
            if($email != "" && $password != ""){


            if($count1>0){

            $sql = $con->prepare("SELECT * FROM beneficiaries");
            $sql->execute();
            $rows = $sql->fetchAll();

            foreach($rows as $pat)
            {

                if($email == $pat["email"] && $password == $pat["password"] && $pat["status"] == 1)
                {

                    $_SESSION['id'] = $pat['id'];
                    $_SESSION['password'] = $pat['password'];
                    $_SESSION['email'] = $pat['email'];
                    $_SESSION['type'] = "beneficiary";

                    header('Location:beneficiary/index.php');

                    //echo $_SESSION['name'];
                }elseif($email == $pat["email"] && $password == $pat["password"] && $pat["status"] == 2){
                    
                    
                        echo '
                        <div class="container" dir="ltr" style="margin-top:80px;color:#000">
                            <div class="alert alert-danger role="alert" style="color:#000">
                                You Are Blocked From Administrator
                            </div>
                        </div>
                        ';
                        
                }
            }
            $con=null;
            //echo "wrong password or email";




            }else{



            echo '
            <div class="container" dir="ltr" style="margin-top:80px;color:#000">
                <div class="alert alert-danger role="alert" style="color:#000">
                    Email Or Password May Be Incorrect Please Try Again
                </div>
            </div>
            ';


            }}else{


            /*include('logout.php');
            include('login.php');*/

            //echo "Not found UserName or password";
            }
            
          
          }elseif($type == 2){
          
          
            $sql1=$con->prepare("SELECT * FROM donors WHERE 
                email=? AND password=?");
                $sql1->execute(array($email,$password));
                $row1=$sql1->fetch();
                //print_r($row);
                $count1=$sql1->rowCount();       

                //echo "<br>".$count;
                if($email != "" && $password != ""){


                if($count1>0){

                $sql = $con->prepare("SELECT * FROM donors");
                $sql->execute();
                $rows = $sql->fetchAll();

                foreach($rows as $pat)
                {

                    if($email == $pat["email"] && $password == $pat["password"] && $pat["status"] == 1)
                    {

                        $_SESSION['id'] = $pat['id'];
                        $_SESSION['password'] = $pat['password'];
                        $_SESSION['email'] = $pat['email'];
                        $_SESSION['type'] = "donor";

                        header('Location:donor/index.php');

                        //echo $_SESSION['name'];
                    }elseif($email == $pat["email"] && $password == $pat["password"] && $pat["status"] == 2){
                    
                    
                        echo '
                        <div class="container" dir="ltr" style="margin-top:80px;color:#000">
                            <div class="alert alert-danger role="alert" style="color:#000">
                                You Are Blocked From Administrator
                            </div>
                        </div>
                        ';
                        
                    }
                }
                $con=null;
                //echo "wrong password or email";




                }else{



                echo '
                <div class="container" dir="ltr" style="margin-top:80px;color:#000">
                    <div class="alert alert-danger role="alert" style="color:#000">
                        Email Or Password May Be Incorrect Please Try Again
                    </div>
                </div>
                ';


                }}else{


                /*include('logout.php');
                include('login.php');*/

                //echo "Not found UserName or password";
                }
            
            
          }elseif($type == 3){
        
        
            $sql1=$con->prepare("SELECT * FROM deliveries WHERE 
                email=? AND password=?");
                $sql1->execute(array($email,$password));
                $row1=$sql1->fetch();
                //print_r($row);
                $count1=$sql1->rowCount();       

                //echo "<br>".$count;
                if($email != "" && $password != ""){


                if($count1>0){

                $sql = $con->prepare("SELECT * FROM deliveries");
                $sql->execute();
                $rows = $sql->fetchAll();

                foreach($rows as $pat)
                {

                    if($email == $pat["email"] && $password == $pat["password"] && $pat["status"] == 1)
                    {

                        $_SESSION['id'] = $pat['id'];
                        $_SESSION['password'] = $pat['password'];
                        $_SESSION['email'] = $pat['email'];
                        $_SESSION['type'] = "delivery";

                        header('Location:delivery_man/donation_requests.php');

                        //echo $_SESSION['name'];
                    }elseif($email == $pat["email"] && $password == $pat["password"] && $pat["status"] == 2){
                    
                    
                        echo '
                        <div class="container" dir="ltr" style="margin-top:80px;color:#000">
                            <div class="alert alert-danger role="alert" style="color:#000">
                                You Are Blocked From Administrator
                            </div>
                        </div>
                        ';
                        
                    }
                }
                $con=null;
                //echo "wrong password or email";




                }else{



                echo '
                <div class="container" dir="ltr" style="margin-top:80px;color:#000">
                    <div class="alert alert-danger role="alert" style="color:#000">
                        Email Or Password May Be Incorrect Please Try Again
                    </div>
                </div>
                ';


                }}else{


                /*include('logout.php');
                include('login.php');*/

                //echo "Not found UserName or password";
                }
            
          }elseif($type == 4){
        
            
            $sql1=$con->prepare("SELECT * FROM admins WHERE 
                email=? AND password=?");
                $sql1->execute(array($email,$password));
                $row1=$sql1->fetch();
                //print_r($row);
                $count1=$sql1->rowCount();       

                //echo "<br>".$count;
                if($email != "" && $password != ""){


                if($count1>0){

                $sql = $con->prepare("SELECT * FROM admins");
                $sql->execute();
                $rows = $sql->fetchAll();

                foreach($rows as $pat)
                {

                    if($email == $pat["email"] && $password == $pat["password"])
                    {

                        $_SESSION['id'] = $pat['id'];
                        $_SESSION['password'] = $pat['password'];
                        $_SESSION['email'] = $pat['email'];
                        $_SESSION['type'] = "admin";

                        header('Location:admin/index.php');

                        //echo $_SESSION['name'];
                    }
                }
                $con=null;
                //echo "wrong password or email";




                }else{



                echo '
                <div class="container" dir="ltr" style="margin-top:80px;color:#000">
                    <div class="alert alert-danger role="alert" style="color:#000">
                        Email Or Password May Be Incorrect Please Try Again
                    </div>
                </div>
                ';


                }}else{


                /*include('logout.php');
                include('login.php');*/

                //echo "Not found UserName or password";
                }
        
          }}


        ?>  
        <div class="row align-items-center">
          <div class="col-md-6 text-md-start text-center py-6">
            <h1 class="mb-4 fs-9 fw-bold">Log<span class="text-warning">in</span></h1>
            <form id="login-form" method="post">
              <div>
                <label for="email">Account Type <span class="text-warning-darker">*</span></label>
                <select name="type" id="user_type" class="form-control border border-dark">
                  <option value="1">Beneficiary</option>
                  <option value="2">Donor</option>
                  <option value="3">Delivery</option>
                  <option value="4">Admin</option>
                </select>
              </div>
              <div class="mt-3">
                <label for="email">Email <span class="text-warning-darker">*</span></label>
                <input type="email" name="email" required id="email" class="form-control border border-dark">
              </div>

              <div class="mt-3">
                <label for="password">Password <span class="text-warning-darker">*</span></label>
                <input type="password" name="password" required id="password" class="form-control border border-dark">
                <a class="btn-link text-warning fw-medium" href="password-forget.php" role="button">
                  Forget your password?
                </a>
              </div>

              <div class="text-center text-md-start mt-3">
                <button class="btn btn-warning me-3 btn-lg" type="submit" name="login" role="button">
                  Login&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>
                </button>
                <a class="btn-link text-warning fw-medium" href="register.php" role="button">
                  Don't have an account?
                </a>
              </div>
            </form>
          </div>
          <div class="col-md-6 text-start"><img class="pt-7 pt-md-0 img-fluid" style="object-fit: cover;" width="100%"
              src="assets/img/1.png" alt="" />
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
<?php

ob_end_flush();

?>