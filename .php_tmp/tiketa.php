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
<div class="main-panel">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="container">
        <div class="p-5 bg-light mb-4 card">
          <h4 class="font-weight-bold text-gray-800 mb-4">Tiket e re</h4>
          <nav class="d-flex">
            <h6 class="mb-0">
              <a href="" class="text-reset">Tiketat</a>
              <span>/</span>
              <a href="klient.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Tiket e re</u></a>
            </h6>
          </nav>
        </div>
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tiket e re</h4>
            <div class="row">
              <div class="col-12">


                <form method="POST" action="" enctype="multipart/form-data">
                  <div class="form-group row">

                    <div class="col">
                      <label for="Subjekti" class="form-label">Subjekti</label>
                      <input type="text" name="Subjekti" autocomplete="off" class="form-control" placeholder="Subjekti">
                    </div>
                    <div class="col">
                      <label for="datam" class="form-label">Data e mbarimit</label>
                      <input type="text" name="datam" value="<?php echo date('d-m-Y'); ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col">
                      <label for="stafi" class="form-label">Stafi</label>
                      <select name="stafi" class="form-select w-100">
                        <option value="0">T&euml; Gjith</option>
                        <?php
                        $gu = $conn->query("SELECT * FROM users");
                        while ($gus = mysqli_fetch_array($gu)) {

                        ?>
                          <option value="<?php echo $gus['id']; ?>"><?php echo $gus['name']; ?></option>

                        <?php } ?>
                      </select>
                    </div>
                    <div class="col">
                      <label for="op" class="form-label">Opsioni</label>
                      <select name="op" class="form-select">
                        <option value="standard">Standard</option>
                        <option value="urgjent">Urgjente</option>
                        <option value="urgjent1" style="color:red;">Shume urgjente</option>
                      </select>
                    </div>
                  </div>
                  <div class="col">
                    <div class="mb-3">
                      <label for="formFile" class="form-label">Ngarko nj&euml; dokument</label>
                      <input class="form-control" type="file" name="tipi" id="formFile">
                    </div>
                  </div>
                  <br>
                  <textarea class="form-control" id="simpleMde" name="pershk"></textarea>
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