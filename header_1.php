<?php
session_start();
$_SESSION['time'] = time();
date_default_timezone_set('Europe/Tirane');
// Then when they get to submitting the payment, just check whether they're within the 5 minute window
if (time() - $_SESSION['time'] < 3600) { // 300 seconds = 5 minutes
  // they're within the 5 minutes so save the details to the database
} else {
  // sorry, you're out of time
  unset($_SESSION["uid"]);
  unset($_SESSION["emri"]);
  unset($_SESSION["acc"]);
  unset($_SESSION["checked"]);
  header("Location:kycu_1.php");
}



if (isset($_SESSION['checked'])) {

} else {
  // header("Location: auth.php");
}
include 'backupi.php';
include 'conn-d.php';
if (isset($_SESSION['uid'])) {
  //Kyqur
} else {
  header("Location: kycu_1.php");
}
$uid = $_SESSION['uid'];
$shikoban = $conn->query("SELECT * FROM users WHERE id='$uid'");
$shikoban1 = mysqli_fetch_array($shikoban);
if ($shikoban1['ban'] == 1) {
  die("<center><h2>Disabled</h2></center><script>alert('Llogaria juaj nuk eshte aktive');</script>");
}
$men = $conn->query("SELECT * FROM tiketa WHERE stafi='$uid' AND lexuar='0'");
$men2 = mysqli_num_rows($men);


$mes = $conn->query("SELECT * FROM  rrogat WHERE stafi='$uid' AND lexuar='0'");
$mes2 = mysqli_num_rows($mes);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BareshaNetwork - <?php echo date("Y"); ?></title> <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">

  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">

  <link rel="shortcut icon" href="images/logos.png" />
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

    <!-- Navbar -->
    <?php include "partials/navbar.php " ?>

    <div class="container-fluid page-body-wrapper">
      <?php include "partials/sidebar.php " ?>

      <?php include "akseset/kryesor.php" ?>

      <!-- plugins:js -->
      <script src="vendors/base/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page-->
      <script src="vendors/chart.js/Chart.min.js"></script>
      <script src="vendors/datatables.net/jquery.dataTables.js"></script>
      <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
      <!-- End plugin js for this page-->
      <!-- inject:js -->
      <script src="js/off-canvas.js"></script>
      <script src="js/hoverable-collapse.js"></script>
      <script src="js/template.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page-->
      <script src="js/dashboard.js"></script>
      <script src="js/data-table.js"></script>
      <script src="js/jquery.dataTables.js"></script>
      <script src="js/dataTables.bootstrap4.js"></script>
      <!-- End custom js for this page-->
    </div>
  </div>
  <script src="js/jquery.cookie.js" type="text/javascript"></script>