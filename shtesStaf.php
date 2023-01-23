<?php include 'partials/header.php';

require_once 'googleLib/GoogleAuthenticator.php';
if ($_SESSION['acc'] == '1') {
} else {
  die('<script>alert("Nuk keni qasje në kete sektor")</script>');
  echo '<meta http-equiv="refresh" content="0;URL=index.php/" /> ';
}
if (isset($_POST["register"])) {
  if (empty($_POST["user"]) && empty($_POST["password"])) {
    echo '<script>alert("Both Fields are required")</script>';
  } else {

    $emri = mysqli_real_escape_string($conn, $_POST["emri"]);
    $user = mysqli_real_escape_string($conn, $_POST["user"]);
    $adresa = mysqli_real_escape_string($conn, $_POST["adresa"]);
    $tel = mysqli_real_escape_string($conn, $_POST["nr"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $banka = mysqli_real_escape_string($conn, $_POST["banka"]);
    $llogariab = mysqli_real_escape_string($conn, $_POST["llogariab"]);
    $password = md5($password);
    $ban = $_POST['ban'];
    $aksesi = mysqli_real_escape_string($conn, $_POST['acc']);
    $secret = "XVQ2UIGO75XRUKJO";
    $chrList = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';

    // Minimum/Maximum times to repeat character List to seed from
    $chrRepeatMin = 1; // Minimum times to repeat the seed string
    $chrRepeatMax = 10; // Maximum times to repeat the seed string

    // Length of Random String returned
    $chrRandomLength = 32;

    // The ONE LINE random command with the above variables.
    $randomi = substr(str_shuffle(str_repeat($chrList, mt_rand($chrRepeatMin, $chrRepeatMax))), 1, $chrRandomLength);

    $query = "INSERT INTO users (name, email, perdoruesi, fjalkalimi, tel, adresa, aksesi, google_auth_code, emrib, llogariab) VALUES('$emri', '$email', '$user', '$password', '$tel', '$adresa', '$aksesi', '$randomi', '$banka', '$llogariab')";
    if (mysqli_query($conn, $query)) {
      echo '<script>alert("Regjistirmi mbaroj me sukses")</script>';
    } else {
      echo '<script>alert("' . $conn->error . '")</script>';
    }
  }
}

if (isset($_POST["update"])) {
  if (empty($_POST["user"])) {
    echo '<script>alert("Both Fields are required")</script>';
  } else {
    $idc = mysqli_real_escape_string($conn, $_POST['id']);
    $emri = mysqli_real_escape_string($conn, $_POST["emri"]);
    $user = mysqli_real_escape_string($conn, $_POST["user"]);
    $banka = mysqli_real_escape_string($conn, $_POST["banka"]);
    $llogariab = mysqli_real_escape_string($conn, $_POST["llogariab"]);
    $adresa = mysqli_real_escape_string($conn, $_POST["adresa"]);
    $tel = mysqli_real_escape_string($conn, $_POST["nr"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $ban = mysqli_real_escape_string($conn, $_POST['ban']);
    $aksesi = mysqli_real_escape_string($conn, $_POST['acc']);
    $query = "UPDATE users SET name='$emri', email='$email', perdoruesi='$user', ban='$ban', emrib='$banka', llogariab='$llogariab', tel='$tel', adresa='$adresa', aksesi='$aksesi' WHERE id='$idc'";
    if (mysqli_query($conn, $query)) {
      echo '<script>alert("Ndryshimi mbaroi me sukses!")</script>';
    } else {
      echo '<script>alert("' . $conn->error . '")</script>';
    }
  }
}

if (isset($_GET['del'])) {
  $did = mysqli_real_escape_string($conn, $_GET['del']);
  if ($conn->query("DELETE FROM users WHERE id='$did'")) {
    echo '<script>alert("Klienti eshte fshir me sukses")</script>';
  } else {
    echo ("Pershkrimi i gabimit: " . $conn->error);
  }
}
