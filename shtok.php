<?php include 'partials/header.php';
if (isset($_POST['ruaj'])) {
  $emri = $_POST['emri'];
  if (empty($_POST['min'])) {
    $mon = "JO";
  } else {
    $mon = $_POST['min'];
  }
  $dk = mysqli_real_escape_string($conn, $_POST['dk']);
  $np = mysqli_real_escape_string($conn, $_POST['np']);
  $dks = mysqli_real_escape_string($conn, $_POST['dks']);
  $yt = mysqli_real_escape_string($conn, $_POST['yt']);
  $info = mysqli_real_escape_string($conn, $_POST['info']);
  $perq = mysqli_real_escape_string($conn, $_POST['perqindja']);
  $perq2 = mysqli_real_escape_string($conn, $_POST['perqindja2']);
  $ads = mysqli_real_escape_string($conn, $_POST['ads']);
  $fb = mysqli_real_escape_string($conn, $_POST['fb']);
  $ig = mysqli_real_escape_string($conn, $_POST['ig']);
  $adresa = mysqli_real_escape_string($conn, $_POST['adresa']);
  $kategoria = mysqli_real_escape_string($conn, $_POST['kategoria']);
  $nrtel = mysqli_real_escape_string($conn, $_POST['nrtel']);
  $emailadd = mysqli_real_escape_string($conn, $_POST['emailadd']);
  $emailp = mysqli_real_escape_string($conn, $_post['emailp']);
  $emriart = mysqli_real_escape_string($conn, $_POST['emriart']);
  $nrllog = mysqli_real_escape_string($conn, $_POST['nrllog']);
  $perdoruesi = mysqli_real_escape_string($conn, $_POST['perdoruesi']);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);
  $emails = implode(', ', $_POST['emails']);
  $password = md5($password);

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


  if ($conn->query("INSERT INTO klientet (emri, np, monetizuar, dk, dks, youtube, info, perqindja, perqindja2, kontrata, ads, fb, ig, adresa, kategoria, nrtel, emailadd, emailp, emriart, nrllog, fjalkalimi, perdoruesi, emails, blocked) VALUES ('$emri', '$np','$mon', '$dk', '$dks', '$yt', '$info', '$perq', '$perq2', '$targetfolder', '$ads', '$fb', '$ig', '$adresa', '$kategoria', '$nrtel', '$emailadd', '$emailp', '$emriart', '$nrllog', '$password', '$perdoruesi', '$emails', '0')")) {
    $cdata = date("Y-m-d H:i:s");
    $cname = $_SESSION['emri'];
    $cnd = $cname . " ka shtuar  klientin " . $emri;
    $query = "INSERT INTO logs (stafi, ndryshimi, koha) VALUES ('$cname', '$cnd', '$cdata')";
    if ($conn->query($query)) {
    } else {
      echo '<script>alert("' . $conn->error . '")</script>';
    }
    echo '<script>alert("Kengetari u shtua me sukses");</script>';
  }
}
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
              <input type="text" name="emri" id="emri" class="form-control" placeholder="Shkruaj Emrin Mbiemrin">
            </div>
            <div class="col">
              <label for="emri">Emri artistik</label>
              <input type="text" name="emriart" id="emriart" class="form-control" placeholder="Emri artistik">
            </div>
          </div>
          <div class="form-group row">
            <div class="col">
              <label for="emri">ID Dokumentit</label>
              <input type="text" name="np" id="emriart" class="form-control" placeholder="ID Dokumentit">
            </div>
            <div class="col">
              <label for="dk">Data e Kontrates</label>
              <input type="text" name="dk" id="dk" class="form-control" placeholder="Shkruaj Daten e kontrates" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <div class="col">
              <label for="dks">Data e Skadimit <small>(Kontrates)</small></label>
              <input type="text" name="dks" id="dks" class="form-control" placeholder="Shkruaj Daten e skaditimit" autocomplete="off">
            </div>
            <div class="col">
              <label for="yt">Shkruaj ID e kanalit t&euml; YouTube</label>
              <input type="text" name="yt" id="yt" class="form-control" placeholder="Youtube Channel ID" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <div class="col">

              <label for="yt">Kategoria</label>
              <select class="js-example-basic-single w-100" name="kategoria" id="kategoria">
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
              <input type="text" name="adresa" id="adresa" class="form-control" placeholder="Adresa" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <div class="col">
              <label for="yt">Nr.Tel</label>
              <input type="text" name="nrtel" id="nrtel" class="form-control" placeholder="Nr.Tel" autocomplete="off">
            </div>
            <div class="col">
              <label for="yt">Nr. Xhirollogaris</label>
              <input type="text" name="nrllog" id="nrllog" class="form-control" placeholder="Nr. Xhirollogaris" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <div class="col">
              <label for="yt">Email Adresa</label>
              <input type="text" name="emailadd" id="emailadd" class="form-control" placeholder="Email Adresa" autocomplete="off">
            </div>
            <div class="col">
              <label for="yt">Email Adresa per platforma</label>
              <input type="text" name="emailp" id="emailp" class="form-control" placeholder="Email Adresa per platforma" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <div class="col">
              <label>P&euml;rdoruesi <small>(Sistemit)</small>:</label>
              <input type="text" name="perdoruesi" class="form-control" placeholder="P&euml;rdoruesi i sistemit">
            </div>
            <div class="col">
              <label>Fjalkalimi <small>(Sistemit)</small>:</label>
              <input type="text" name="password" class="form-control" placeholder="Fjalkalimi i sistemit">
            </div>
          </div>
          <div class="form-group row">
            <div class="col">
              <label for="tel">Monetizuar ? </label><br>
              <input type="radio" id="html" name="min" value="PO">
              <label for="html" style="color:green;">PO</label>
              <input type="radio" id="css" name="min" value="JO">
              <label for="css" style="color:red;">JO</label><br>

            </div>

            <div class="col">
              <label>Zgjidhni kategorin</label>
              <select class="js-example-basic-single w-100" name="ads" id="js-example-basic-single w-100">
                <option value="">Zgjidhni Llogarin&euml;</option>
                <?php
                $mads = $conn->query("SELECT * FROM ads");
                while ($ads = mysqli_fetch_array($mads)) {
                ?>
                  <option value="<?php echo $ads['id']; ?>"><?php echo $ads['email']; ?> | <?php echo $ads['adsid']; ?> (<?php echo $ads['shteti']; ?>)</option>
                <?php } ?>
              </select>
            </div>

          </div><br>
          <div class="form-group row">
            <div class="col">
              <label for="imei">Ngarko kontrat&euml;n:</label>
              <div class="file-upload-wrapper">
                <input type="file" name="tipi" class="fileuploader" />
              </div>
            </div>

            <div class="col">
              <label for="imei">Perqindja:</label>
              <input type="text" name="perqindja" class="form-control" placeholder="0.00%">
            </div>
            <div class="col">
              <label for="imei">Perqindja platformat tjera:</label>
              <input type="text" name="perqindja2" class="form-control" placeholder="0.00%">
            </div>
          </div>
          <div class="form-group row">
            <div class="col">
              <label><i class="ti-facebook"></i> Facebook URL:</label>
              <input type="URL" name="fb" class="form-control" placeholder="https://facebook.com/....">
            </div>
            <div class="col">
              <label><i class="ti-instagram"></i> Instagram URL:</label>
              <input type="URL" name="ig" class="form-control" placeholder="https://instagram.com/....">
            </div>
          </div>
          <div class="form-group row">
            <div class="col">
              <label for="imei">Email qe kan akses <small>(Mbaj shtypur CTRL)</small> </label>
              <select multiple class="form-control" name="emails[]" id="exampleFormControlSelect2">
                <?php
                $getemails = $conn->query("SELECT * FROM emails");
                while ($maillist = mysqli_fetch_array($getemails)) {
                ?>
                  <option value="<?php echo $maillist['email']; ?>"><?php echo $maillist['email']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col">
              <label for="info"> Info Shtes&euml;</label>
              <textarea id="simpleMde" name="info" placeholder="Info Shtes&euml;"></textarea>
            </div>
          </div>
      </div>
      <br>
      <center> <button type="submit" class="btn btn-primary" name="ruaj"><i class="ti-save"></i> Ruaj</button> </center>
      </form>

    </div>
    <!-- /.container-fluid -->

  </div>

  <script src="vendors/simplemde/simplemde.min.js"></script>
  <script src="vendors/jquery-file-upload/jquery.uploadfile.min.js"></script>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <script src="js/editorDemo.js"></script>
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <?php include 'partials/footer.php'; ?>