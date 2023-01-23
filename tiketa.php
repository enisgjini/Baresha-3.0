<?php
include 'partials/header.php';
if (isset($_POST['ruaj'])) {
  $subjekti = $_POST['Subjekti'];
  $opsioni = $_POST['op'];
  $stafi = $_POST['stafi'];
  $pershk = $_POST['pershk'];
  $datam = $_POST['datam'];
  $data = date("d-m-Y");
  $datam = $_POST['datam'];
  $targetfolder = "tikdoc/";

  $targetfolder = $targetfolder . basename($_FILES['tipi']['name']);

  $ok = 1;

  $file_type = $_FILES['tipi']['type'];

  if ($file_type == "application/pdf") {

    if (move_uploaded_file($_FILES['tipi']['tmp_name'], $targetfolder)) {
    } else {
    }
  } else {
  }

  if (!$conn->query("INSERT INTO tiketa (subjekti, pershkrimi, opsioni, stafi, file, statusi, lexuar, data, datam, nga) VALUES ('$subjekti', '$pershk', '$opsioni', '$stafi', '$targetfolder', 'N&euml; pritje', '0', '$data', '$datam', '$uid')")) {
    echo "Ndodhi nj&euml; gabim: " . $conn->error;
  }
}
?>
<script src="https://cdn.tiny.cloud/1/v1lt364np68v98q2hye277yd2kz3szp65wttpsgbe8g4z6iv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: 'textarea#editor',
    menubar: false
  });
</script>
<!-- Begin Page Content -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="container">

        <div class="p-5 bg-light mb-4 card">
          <h4 class="font-weight-bold text-gray-800 mb-4">Lista e klientëve</h4> <!-- Breadcrumb -->
          <nav class="d-flex">
            <h6 class="mb-0">
              <a href="" class="text-reset">Klientët</a>
              <span>/</span>
              <a href="klient.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Lista e klientëve</u></a>
            </h6>
          </nav>
          <!-- Breadcrumb -->
        </div>
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tiket e re</h4>
            <div class="row">
              <div class="col-12">


                <form method="POST" action="" enctype="multipart/form-data">
                  <div class="form-inline">
                    <div class="form-group">
                      <input type="text" name="Subjekti" autocomplete="off" class="form-control" placeholder="Subjekti">
                    </div>
                    <div class="form-group">
                      Opsioni:
                      <select name="op" class="form-control">
                        <option value="standard">Standard</option>
                        <option value="urgjent">Urgjent</option>
                        <option value="urgjent1" style="color:red;">SHUM URGJENT!</option>
                      </select>
                    </div>
                    <div class="form-group">
                      Stafi:
                      <select name="stafi" class="js-example-basic-single w-100">
                        <option value="0">T&euml; Gjith</option>
                        <?php
                        $gu = $conn->query("SELECT * FROM users");
                        while ($gus = mysqli_fetch_array($gu)) {

                        ?>
                          <option value="<?php echo $gus['id']; ?>"><?php echo $gus['name']; ?></option>

                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      Data e mbarimit:
                      <input type="text" name="datam" value="<?php echo date('d-m-Y'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      Ngarko nj&euml; dokument:
                      <input type="file" name="tipi" class="" />
                    </div>
                  </div>
                  <br>
                  <textarea class="form-control" id="simpleMde" name="pershk" style="height: 300px;"></textarea>
                  <br>
                  <input type="submit" name="ruaj" value="D&euml;rgo" class="btn btn-success float-right">
                  <a href="index.php" class="btn btn-secondary">Anulo</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'partials/footer.php'; ?>