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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <meta charset="utf-8">
 
  <title>BareshaNetwork - <?php echo date("Y"); ?></title>
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="bootstrap-5.2.3-dist/css/bootstrap.min.css">
  <script src="bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="images/logos.png" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/a1927a49ea.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="datatables/Bootstrap-5-5.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="datatables/AutoFill-2.5.1/css/autoFill.bootstrap5.css" />
  <link rel="stylesheet" type="text/css" href="datatables/Buttons-2.3.3/css/buttons.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="datatables/DateTime-1.2.0/css/dataTables.dateTime.min.css" />
  <script type="text/javascript" src="datatables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="datatables/Bootstrap-5-5.1.3/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="datatables/JSZip-2.5.0/jszip.min.js"></script>
  <script type="text/javascript" src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="datatables/AutoFill-2.5.1/js/dataTables.autoFill.min.js"></script>
  <script type="text/javascript" src="datatables/AutoFill-2.5.1/js/autoFill.bootstrap5.min.js"></script>
  <script type="text/javascript" src="datatables/Buttons-2.3.3/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="datatables/Buttons-2.3.3/js/buttons.bootstrap5.min.js"></script>
  <script type="text/javascript" src="datatables/Buttons-2.3.3/js/buttons.colVis.min.js"></script>
  <script type="text/javascript" src="datatables/Buttons-2.3.3/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="datatables/Buttons-2.3.3/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="datatables/DateTime-1.2.0/js/dataTables.dateTime.min.js"></script> -->

  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  <link rel="stylesheet" href="./vendors/mdi/css/materialdesignicons.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/a1927a49ea.js" crossorigin="anonymous"></script>

  <!-- <link rel="stylesheet" type="text/css" href="datatables/Bootstrap-5-5.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="datatables/AutoFill-2.5.1/css/autoFill.bootstrap5.css" />
  <link rel="stylesheet" type="text/css" href="datatables/Buttons-2.3.3/css/buttons.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="datatables/DateTime-1.2.0/css/dataTables.dateTime.min.css" /> -->


  <link rel="stylesheet" type="text/css" href="./datatables/DataTables-1.13.1/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="./datatables/AutoFill-2.5.1/css/autoFill.bootstrap5.css" />
  <link rel="stylesheet" type="text/css" href="./datatables/Buttons-2.3.3/css/buttons.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="./datatables/ColReorder-1.6.1/css/colReorder.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="./datatables/DateTime-1.2.0/css/dataTables.dateTime.min.css" />
  <link rel="stylesheet" type="text/css" href="./datatables/FixedColumns-4.2.1/css/fixedColumns.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="./datatables/FixedHeader-3.3.1/css/fixedHeader.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="../datatables/KeyTable-2.8.0/css/keyTable.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="./datatables/Responsive-2.4.0/css/responsive.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="./datatables/RowGroup-1.3.0/css/rowGroup.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="./datatables/RowReorder-1.3.1/css/rowReorder.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="./datatables/Scroller-2.0.7/css/scroller.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="./datatables/SearchBuilder-1.4.0/css/searchBuilder.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="./datatables/SearchPanes-2.1.0/css/searchPanes.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="./datatables/Select-1.5.0/css/select.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="./datatables/StateRestore-1.2.0/css/stateRestore.bootstrap5.min.css" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <script type="text/javascript" src="../datatables/datatables.min.js"></script>
  <link href="mdb5/css/mdb.min.css" rel="stylesheet" />
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <style>
    .alert {
      display: none;
    }
  </style>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>



  
</head>

<body>
  <div class="container-scroller">
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <!-- Navbar -->
    <?php include "partials/navbar.php" ?>

    <div class="container-fluid page-body-wrapper" id="sss">
      <?php include "partials/sidebar.php" ?>

      <?php // include "akseset/kryesor.php" 
      ?>
      <!-- <script src="vendors/base/vendor.bundle.base.js"></script> -->