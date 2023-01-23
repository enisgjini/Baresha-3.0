<?php
include 'header.php';
$json = file_get_contents('http://www.floatrates.com/daily/usd.json');
$obj = json_decode($json);
if (empty($_GET['fatura'])) {
  die("Nuk u gjet fatura!");
} else {
  $fatura = $_GET['fatura'];
}
$mfid = $conn->query("SELECT * FROM fatura2 WHERE fatura='$fatura'");
$mfidi = mysqli_fetch_array($mfid);
$midc  = $mfidi['emri'];
if (isset($_POST['ruaj'])) {

  $emertimi = mysqli_real_escape_string($conn, $_POST['emertimi']);
  $qmimi2 = $_POST['qmimi'] * $obj->eur->rate;
  if ($_POST['valuta'] == "euro") {
    $qmimi = $_POST['qmimi'];
  } else {
    $qmimi = $qmimi2;
  }
  $gstai = $conn->query("SELECT * FROM klientet WHERE id='$midc'");
  $gstai2 = mysqli_fetch_array($gstai);
  $perqindja = $gstai2['perqindja'];
  $pdc = $perqindja / 100;
  if ($qmimi <= "0") {
    $shk = "0.00";
  } else {
    $shk = $pdc * $qmimi;
  }
  $shm = $qmimi - $shk;
  $datas = date("Y-m-d H:i:s");


  if ($conn->query("INSERT INTO shitje2 (emertimi, qmimi, perqindja, klientit, mbetja,totali, fatura, data) VALUES ('$emertimi', '$qmimi', '$perqindja', '$shm', '$shk', '$shm', '$fatura', '$datas')")) {
  } else {
    echo "Ndodhi nj&euml; gabim: " . $conn->error;
  }
}
if (isset($_POST['update'])) {
  $qmimi = $_POST['qmimi'];
  $gstai = $conn->query("SELECT * FROM klientet WHERE id='$midc'");
  $gstai2 = mysqli_fetch_array($gstai);
  $perqindja = $gstai2['perqindja'];
  $pdc = $perqindja / 100;
  if ($qmimi <= "0") {
    $shk = "0.00";
  } else {
    $shk = $pdc * $qmimi;
  }
  $shm = $qmimi - $shk;
  $updateid = $_POST['editid'];
  $eme = $_POST['emertimi'];

  if ($conn->query("UPDATE shitje2 SET emertimi='$eme', qmimi='$qmimi', klientit='$shm', mbetja='$shk', totali='$shm' WHERE id='$updateid'")) {
  } else {
    echo "Ndodhi nj&euml; gabim: " . $conn->error;
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="container">
        <?php
        $checkob = $conn->query("SELECT * FROM yinc WHERE kanali='$midc'");
        while ($listaob = mysqli_fetch_array($checkob)) {
          if ($listaob['shuma'] > $listaob['pagoi']) {
        ?>

            <div class="alert alert-danger" id="alert" role="alert">
              Klienti ka nj&euml; obligim me shum&euml;n: <b><?php echo $listaob['shuma'] - $listaob['pagoi']; ?>&euro;</b>, <br><b>P&euml;rshkrimi:</b> <?php echo $listaob['pershkrimi']; ?>.
            </div>
        <?php
          }
        }
        ?>

        <form method="POST" action="shitje2.php?fatura=<?php echo $fatura; ?>">
          <div class="form-group row">
            <div class="col">
              <input type="text" name="emertimi" autocomplete="off" class="form-control" placeholder="Em&euml;rtimi">
            </div>
            <div class="col">
              <select name="valuta" class="js-example-basic-single w-100">
                <option value="dollar">$</option>
                <option value="euro" selected="">&euro;</option>
              </select>
            </div>
            <div class="col">
              <input type="text" name="qmimi" autocomplete="off" class="form-control" placeholder="Qmimi">
            </div>
            <div class="col">
              <input type="submit" name="ruaj" class="btn btn-primary" value="Shto">
            </div>
        </form>
      </div>
      <br>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Em&euml;rtimi</th>
            <th scope="col">Qmimi</th>
            <th scope="col">Perqindja</th>
            <th scope="col">Shuma</th>
            <th scope="col">Mbetja</th>
            <th scope="col">Totali</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $rend = 0;
          $i = mysqli_real_escape_string($conn, $_GET['fatura']);
          $q = $conn->query("SELECT * FROM shitje2 WHERE fatura='$i'");
          while ($r = mysqli_fetch_array($q)) {
            $rend++;
          ?>
            <tr>
              <th scope="row"><?php echo $rend; ?></th>
              <td><?php echo $r['emertimi']; ?></td>
              <td><?php echo $r['qmimi']; ?></td>
              <td><?php echo $r['perqindja']; ?></td>
              <td><?php echo $r['klientit']; ?></td>
              <td><?php echo $r['mbetja']; ?></td>
              <td><?php echo $r['totali']; ?></td>
              <td><a class="btn btn-danger btn-sm" href="delete.php?fshij=<?php echo $r['id']; ?>&fatura=<?php echo $i; ?>"><i class="ti-trash"></i></a>
                <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editrow<?php echo $r['id']; ?>"><i class="ti-pencil-alt"></i></a>
              </td>
            </tr>
            <div class="modal fade" id="editrow<?php echo $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $r['emertimi']; ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                      <input type="hidden" name="editid" value="<?php echo $r['id']; ?>">
                      <div class="form-group">
                        <label for="emri">Em&euml;rtimi: </label>
                        <input type="text" name="emertimi" class="form-control" value="<?php echo $r['emertimi']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="nr">Qmimi</label>
                        <input type="text" name="qmimi" class="form-control" value="<?php echo $r['qmimi']; ?>">
                      </div>




                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mbylle</button>
                    <input type="submit" class="btn btn-primary" name="update" value="Ruaj">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <?php
            $q4 = $conn->query("SELECT SUM(`totali`) as `sum` FROM `shitje2` WHERE fatura='$fatura'");
            $qq4 = mysqli_fetch_array($q4);
            ?>
            <td><b>Totali:</b></td>
            <td> <?php echo $qq4['sum']; ?>&euro;</td>

          </tr>
        </tbody>
      </table>
      <br>
      <a href="faturat2.php" class="btn btn-success float-right" target="_blank">D&euml;rgo</a>
      <a href="#" class="btn btn-secondary">Anulo</a>


    </div>
    <!-- /.container-fluid -->

  </div>
</div>


<!-- End of Main Content -->

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
<?php include 'footer.php'; ?>