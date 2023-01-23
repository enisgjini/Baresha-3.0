<?php
include('conn-d.php');
date_default_timezone_set('Europe/Tirane');
session_start();
if (isset($_SESSION['uid'])) {
    header("Location: index.php");
} else {
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Username and Password sent from Form
    $username = mysqli_real_escape_string($conn, $_POST['uname']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = md5($password);
    $sql = "SELECT * FROM users WHERE email='$username' AND  fjalkalimi='$password'";
    $query = mysqli_query($conn, $sql);
    $res = mysqli_num_rows($query);
    $f = mysqli_fetch_array($query);

    //If result match $username and $password Table row must be 1 row
    if ($res == 1) {
        $_SESSION['emri'] = $f['name'];
        $_SESSION['uid'] = $f['id'];
        $_SESSION['acc'] = $f['aksesi'];
        $_SESSION['email'] = $f['email'];
        $_SESSION['secret'] = $f['google_auth_code'];
        $_SESSION['time'] = time();
        $cdata = date("Y-m-d H:i:s");
        $cname = $_SESSION['emri'];
        $cnd = $cname . " &euml;sht&euml; ky&ccedil;ur n&euml; sistem";
        if ($f['id'] == '26') {
        } else {
            $query = "INSERT INTO logs (stafi, ndryshimi, koha) VALUES ('$cname', '$cnd', '$cdata')";
            if ($conn->query($query)) {
            } else {
                echo '<script>alert("' . $conn->error . '")</script>';
            }
        }
        //  header("Location: auth.php");
    } else {
        $gabim = "Email ose Fjalkalimi nuk eshte i sakt";
    }
}
?>


<!-- <form method="POST" action="" class="pt-3">
                <div class="form-group">
                    <input type="text" name="uname" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Shkruaj E-mail tend">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Kycu" name="submit">
                </div>

            </form> -->



<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/a1927a49ea.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5 rounded-6 shadow-4">
                            <div class="brand-logo">
                                <img src="images/logob.png" alt="logo">
                            </div>
                            <h5>Përshëndetje !</h5>
                            <h6 class="font-weight-light">Identifikohu për të vazhduar.</h6>
                            <form class="pt-3" method="POST" action="">
                                <div class="form-group">
                                    <input type="email" class="form-control p-3 rounded-3" id="exampleInputEmail1" placeholder="Email-i juaj" name="uname">
                                </div>
                                <div class="mb-3 d-flex align-items-center">
                                    <input type="password" class="form-control p-3 rounded-3" name="password" id="password" placeholder="Fjalëkalimi"><i class="fa-regular fa-eye-slash ms-n5" id="togglePassword"></i>
                                </div>
                                <div class="mt-3 d-flex justify-content-between align-items-center">
                                    <input class="btn btn-primary" value="Hyr" type="submit" name="submit" />
                                    <a href="#" class="auth-link text-black">Keni harruar fjalëkalimin ?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <!-- endinject -->

    <!-- Skripta e mëposhtme  -->
    <script src="js/passwordEye.js"></script>


</body>

</html>