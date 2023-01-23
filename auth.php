<?php
include('conn-d.php');
session_start();

$secret = $_SESSION['secret'];
$user 	= $_SESSION['email'];
require_once 'googleLib/GoogleAuthenticator.php';

if(isset($_POST['kyc'])){
	$code = $_POST['kodi'];
$g = new GoogleAuthenticator();

if($g->verifyCode($secret, $code)){
$_SESSION['checked'] = "yes";
header("Location: index.php");
	
}else{
	$gabim = "Kodi nuk &euml;sht&euml; i vlefsh&euml;m";
}
}


$ga 		= new GoogleAuthenticator();
$qrCodeUrl 	= $ga->getQRCodeGoogleUrl($user, $secret,'BareshaOffice');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Kycu - BareshaNetwork</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="endors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/horizontal-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="main-panel">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="images/logob.png" alt="logo">
                </div>
                <h4>Ky&ccedil;u n&euml; sistem!</h4>
                <h6 class="font-weight-light">Two step verification</h6>
                <form method="POST" action="" class="pt-3">
                  <div class="form-group">
                    <input type="text" name="kodi" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Shkruaj kodin">
                  </div>
                 
                  <div class="mt-3">
                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Kycu" name="kyc">
                  </div>
                  <hr>
                 <center>  <a class="btn btn-block btn-social" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en">
                                        <img src="images/android.png" width="120">
                                      </a>
                                     <a class="btn btn-block btn-social" href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8" target="_blank">
                                        <img src="images/iphone.png" width="120">
                                      </a></center>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
     
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
