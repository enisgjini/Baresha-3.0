<?php include 'partials/header.php';
$editid = mysqli_real_escape_string($conn, $_GET['id']);
if (isset($_POST['ndrysho'])) {
  $emri = $_POST['emri'];
  if (empty($_POST['min'])) {
    $mon = "JO";
  } else {
    $mon = $_POST['min'];
  }
  $dk = mysqli_real_escape_string($conn, $_POST['dk']);
  $dks = mysqli_real_escape_string($conn, $_POST['dks']);
  $yt = mysqli_real_escape_string($conn, $_POST['yt']);
  $info = $_POST['info'];
  $np = mysqli_real_escape_string($conn, $_POST['np']);
  $perq = mysqli_real_escape_string($conn, $_POST['perqindja']);
  $perq2 = mysqli_real_escape_string($conn, $_POST['perqindja2']);
  $adsa = mysqli_real_escape_string($conn, $_POST['ads']);
  $fb = mysqli_real_escape_string($conn, $_POST['fb']);
  $emailadd = mysqli_real_escape_string($conn, $_POST['emailadd']);
  $emailp = mysqli_real_escape_string($conn, $_POST['emailp']);
  $ig = mysqli_real_escape_string($conn, $_POST['ig']);
  $adresa = mysqli_real_escape_string($conn, $_POST['adresa']);
  $kategoria = mysqli_real_escape_string($conn, $_POST['kategoria']);
  $emriart = mysqli_real_escape_string($conn, $_POST['emriart']);
  $nrllog = mysqli_real_escape_string($conn, $_POST['nrllog']);
  $perdoruesi = mysqli_real_escape_string($conn, $_POST['perdoruesi']);
  $emails = mysqli_real_escape_string($conn, $_POST['emails']);
  $targetfolder = "dokument/";

  $targetfolder = $targetfolder . basename($_FILES['tipi']['name']);

  $ok = 1;

  $file_type = $_FILES['tipi']['type'];

  if ($file_type == "application/pdf") {

    if (move_uploaded_file($_FILES['tipi']['tmp_name'], $targetfolder)) {
    } else {
    }
  } else {
  }


  if ($conn->query("UPDATE klientet SET emri='$emri', np='$np',monetizuar='$mon', emails='$emails', dk='$dk', dks='$dks', youtube='$yt', info='$info', perqindja='$perq', perqindja2='$perq2', fb='$fb', ig='$ig', adresa='$adresa', kategoria='$kategoria', nrtel='$nrtel', emailp='$emailp', emailadd='$emailadd', emriart='$emriart', nrllog='$nrllog', ads='$adsa', perdoruesi='$perdoruesi' WHERE id='$editid'")) {
    echo '<script>alert("Kengetari u perditsua me sukses");</script>';
    $cdata = date("Y-m-d H:i:s");
    $cname = $_SESSION['emri'];
    $cnd = $cname . " ka ndryshuar  klientin " . $emri;
    $query = "INSERT INTO logs (stafi, ndryshimi, koha) VALUES ('$cname', '$cnd', '$cdata')";
    if ($conn->query($query)) {
    } else {
      echo '<script>alert("' . $conn->error . '")</script>';
    }
  } else {
    echo '<script>alert("' . $conn->error . '");</script>';
  }
}
$editc = $conn->query("SELECT * FROM klientet WHERE id='$editid'");
$editcl = mysqli_fetch_array($editc);
?>
<!-- Begin Page Content -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="container">
        <div class="alert alert-successalert-dismissible" id="success" style="display:none;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
        </div>
        <!-- Page Heading -->
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="form-group row">
            <div class="col">
              <label for="emri">Emri & Mbiemri</label>
              <input type="text" name="emri" class="form-control" placeholder="Shkruaj Emrin Mbiemrin" value="<?php echo $editcl['emri']; ?>" autocomplete="off">
            </div>
            <div class="col">
              <label for="emri">Emri artistik</label>
              <input type="text" name="emriart" id="emriart" class="form-control" placeholder="Emri artistik" value="<?php echo $editcl['emriart']; ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col">

              <label for="emri">ID Dokumentit</label>
              <input type="text" name="np" id="emriart" class="form-control" placeholder="ID Dokumentit" value="<?php echo $editcl['np']; ?>">
            </div>
            <div class="col">
              <label for="dk">Data e Kontrates</label>
              <input type="text" name="dk" class="form-control" placeholder="Shkruaj Daten e kontrates" value="<?php echo $editcl['dk']; ?>" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <div class="col">

              <label for="dks">Data e Skadimit <small>(Kontrates)</small></label>
              <input type="text" name="dks" class="form-control" placeholder="Shkruaj Daten e skaditimit" value="<?php echo $editcl['dks']; ?>" autocomplete="off">
            </div>
            <div class="col">
              <label for="yt">Shkruaj ID e kanalit t&euml; YouTube</label>
              <input type="text" name="yt" class="form-control" placeholder="Youtube Channel ID" value="<?php echo $editcl['youtube']; ?>" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <div class="col">


              <label for="yt">Kategoria</label>
              <select class="js-example-basic-single w-100" name="kategoria">
                <option value="<?php echo $editcl['kategoria']; ?>" selected><?php echo $editcl['kategoria']; ?></option>
                <?php
                $kg = $conn->query("SELECT * FROM kategorit");
                while ($kgg = mysqli_fetch_array($kg)) {
                  echo '<option value="' . $kgg['kategorit'] . '">' . $kgg['kategorit'] . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="col">
              <label for="yt">Adresa</label>
              <input type="text" name="adresa" class="form-control" value="<?php echo $editcl['adresa']; ?>" placeholder="Adresa" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <div class="col">

              <label for="yt">Nr.Tel</label>
              <input type="text" name="nrtel" class="form-control" value="<?php echo $editcl['nrtel']; ?>" placeholder="Nr.Tel" autocomplete="off">
            </div>
            <div class="col">
              <label for="yt">Nr. Xhirollogaris</label>
              <input type="text" name="nrllog" class="form-control" placeholder="Nr. Xhirollogaris" value="<?php echo $editcl['nrllog']; ?>" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <div class="col">

              <label for="yt">Email Adresa</label>
              <input type="text" name="emailadd" class="form-control" value="<?php echo $editcl['emailadd']; ?>" placeholder="Email Adresa" autocomplete="off">
            </div>
            <div class="col">
              <label for="yt">Email Adresa per platforma</label>
              <input type="text" name="emailp" class="form-control" value="<?php echo $editcl['emailp']; ?>" placeholder="Email Adresa per platforma" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <div class="col">

              <label>P&euml;rdoruesi <small>(Sistemit)</small>:</label>
              <input type="text" name="perdoruesi" class="form-control" placeholder="P&euml;rdoruesi i sistemit" value="<?php echo $editcl['perdoruesi']; ?>">
            </div>
            <div class="col">
              <label for="tel">Monetizuar ? </label><br>
              <?php if ($editcl['monetizuar'] == "PO") {
              ?>
                <input type="radio" id="html" name="min" value="PO" checked>
                  <label for="html" style="color:green;" selected>PO</label>
                  <input type="radio" id="css" name="min" value="JO">
                  <label for="css" style="color:red;">JO</label><br>
              <?php
              } else {
              ?>
                <input type="radio" id="html" name="min" value="PO">
                  <label for="html" style="color:green;">PO</label>
                  <input type="radio" id="css" name="min" value="JO" checked>
                  <label for="css" style="color:red;">JO</label><br>
              <?php } ?>



            </div>

          </div>
          <div class="form-group row">
            <div class="col">

              <label for="imei">ADS Account: </label>
              <select class="js-example-basic-single w-100" name="ads" id="exampleFormControlSelect2">
                <option value="<?php echo $editcl['ads']; ?>">Zgjidhni Llogarin&euml;</option>

                <?php
                $mads = $conn->query("SELECT * FROM ads");
                while ($ads = mysqli_fetch_array($mads)) {
                ?>
                  <option value="<?php echo $ads['id']; ?>"><?php echo $ads['email']; ?> | <?php echo $ads['adsid']; ?> (<?php echo $ads['shteti']; ?>)</option>
                <?php } ?>
              </select>


            </div>
            <?php if ($_SESSION['acc'] == '2') {
            ?>
              <div class="col">

                <input type="hidden" name="perqindja" class="form-control" value="<?php echo $editcl['perqindja']; ?>" placeholder="0.00%">
              </div>
            <?php } else {
            ?>
          </div>

          <div class="form-group row">
            <div class="col">

              <label for="imei">Perqindja:</label>
              <input type="text" name="perqindja" class="form-control" value="<?php echo $editcl['perqindja']; ?>" placeholder="0.00%">
            </div>
          <?php
            } ?>
          <div class="col">

            <label for="imei">Perqindja platformave tjera:</label>
            <input type="text" name="perqindja2" class="form-control" value="<?php echo $editcl['perqindja2']; ?>" placeholder="0.00%">
          </div>
          <div class="col">
            <label><i class="ti-facebook"></i> Facebook URL:</label>
            <input type="URL" name="fb" class="form-control" placeholder="https://facebook.com/...." value="<?php echo $editcl['fb']; ?>">
          </div>
          </div>
          <div class="form-group row">
            <div class="col">
              <label><i class="ti-instagram"></i> Instagram URL:</label>
              <input type="URL" name="ig" class="form-control" placeholder="https://instagram.com/...." value="<?php echo $editcl['ig']; ?>">
            </div>

            <div class="col">
              <label>Email qe kan akses:</label>
              <input type="text" name="emails" class="form-control" placeholder="Emails" value="<?php echo $editcl['emails']; ?>">
            </div>
          </div>
          <div class="col">

            <label for="info"> Info Shtes&euml;</label>
            <textarea id="simpleMde" name="info" placeholder="Info Shtes&euml;"><?php echo $editcl['info']; ?></textarea>
          </div>


          <br>
          <center> <button type="submit" class="btn btn-primary" name="ndrysho"><i class="ti-save"></i> Ruaj</button> </center>
        </form>

      </div>
      <!-- /.container-fluid -->

    </div>

    <?php include 'partials/footer.php'; ?>