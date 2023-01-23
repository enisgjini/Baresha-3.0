<?php include 'partials/header.php';
if (isset($_POST['ruaj'])) {
  $emri = $_POST['emri'];
  if (empty($_POST['min'])) {
    $mon = "JO";
  } else {
    $mon = $_POST['min'];
  }
  $pershkrimi = mysqli_real_escape_string($conn, $_POST['pershkrimi']);
  $targetfolder = "dokument/";

  $targetfolder = $targetfolder . basename($_FILES['fileToUpload']['name']);

  $ok = 1;

  $file_type = $_FILES['fileToUpload']['type'];

  if ($file_type == "application/pdf") {

    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetfolder)) {
    } else {
    }
  } else {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetfolder)) {
    }
  }


  if ($conn->query("INSERT INTO filet (pershkrimi, file) VALUES ('$pershkrimi', '$targetfolder')")) {
  }
}
?>

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
            <h4 class="card-title">Dokumente t&euml; ndryshme</h4>
            <div class="row">
              <div class="col-12">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ngarkofile">
                  Ngarko nj&euml; File
                </button>

                <!-- Modal -->
                <div class="modal fade" id="ngarkofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ngarko nj&euml; file</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="filet.php" method="post" enctype="multipart/form-data">

                          <label>Ngarko nj&euml; file:</label>
                          <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                          <label>P&euml;rshkrimi</label>
                          <input type="text" name="pershkrimi" placeholder="P&euml;rshkrimi" class="form-control" required="">


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hiqe</button>
                        <button type="submit" class="btn btn-primary" name="ruaj">Ruaj</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                </p>

                <!-- DataTales Example -->

                <div class="table-responsive">
                  <table id="order-listing" data-ordering="false" class="table">
                    <thead>
                      <tr>
                        <th>Pershkrimi</th>
                        <th>Filet</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Pershkrimi</th>
                        <th>Filet</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $kueri = $conn->query("SELECT * FROM filet ORDER BY id DESC");
                      while ($k = mysqli_fetch_array($kueri)) {

                      ?>
                        <tr>

                          <td><?php echo $k['pershkrimi']; ?></td>
                          <td><a href="<?php echo $k['file']; ?>" target="_blank">Hap Filen</a></td>
                          <td><i class="ti-trash" style="color:red;"></i> &nbsp; <i class="fas fa-user-edit" style="color:blue;"></i> &nbsp;</td>
                        </tr>


                      <?php } ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End of Main Content -->

<?php include 'partials/footer.php'; ?>