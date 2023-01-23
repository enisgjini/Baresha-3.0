<?php include 'partials/header.php';
error_reporting(0);


if (isset($_POST['ruaj'])) {
  $stafi = mysqli_real_escape_string($conn, $_POST['stafi']);
  $gstai = $conn->query("SELECT * FROM klientet WHERE id='$stafi'");
  $gstai2 = mysqli_fetch_array($gstai);



  $shuma = $_POST['shuma'];
  $data = mysqli_real_escape_string($conn, $_POST['data']);

  $pershkrimi = mysqli_real_escape_string($conn, $_POST['pershkrimi']);
  //Get the result.

  if ($conn->query("INSERT INTO yinc (kanali, shuma, pershkrimi, data) VALUES ('$stafi', '$shuma','$pershkrimi', '$data')")) {
    header("Location: yinc.php");
  } else {
    echo ("Gabim: " . $conn->error);
  }
}
if ($_SESSION['acc'] == '1') {
} else {
  die('<script>alert("Nuk keni Akses ne kete sektor")</script>');
  echo '<meta http-equiv="refresh" content="0;URL=index.php/" /> ';
}
if (isset($_POST['paguaj'])) {
  $shpages = $_POST['pagoi'];
  $lloji = $_POST['lloji'];
  $idof = $_POST['idp'];
  if ($conn->query("UPDATE yinc SET pagoi=pagoi + '$shpages', lloji='$lloji' WHERE id='$idof'")) {
    echo '<script>alert("Pagesa u be me sukses")</script>';
  } else {
    echo '<script>alert(' . $conn->error . ')</script>';
  }
}
?>

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
        <!-- Page Heading -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Shpenzimet e klient&euml;ve</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="">

                  <label for="emri">Zgjidh nj&euml;rin nga Klient&euml;t</label>
                  <select name="stafi" class="form-control">
                    <?php
                    $gsta = $conn->query("SELECT * FROM klientet");
                    while ($gst = mysqli_fetch_array($gsta)) {
                    ?>
                      <option value="<?php echo $gst['id']; ?>"><?php echo $gst['emri']; ?></option>
                    <?php } ?>

                  </select>
                  <label for="datab">Shuma:</label>

                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">&euro;</div>
                    </div>
                    <input type="text" name="shuma" class="form-control" id="inlineFormInputGroup" value="0.00">
                  </div>

                  <label for="datas">Data e pages&euml;s:</label>
                  <input type="text" name="data" class="form-control" value="<?php echo date("d-m-Y"); ?>">

                  <label for="pershkrimi">P&euml;rshkrimi:</label>
                  <textarea name="pershkrimi" class="form-control"></textarea>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mbylle</button>
                <input type="submit" class="btn btn-primary" name="ruaj" value="Ruaj">
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="main-panel">

          <div class="content-wrapper">
            <div class="container">
              <div class="card">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  E re
                </button>
                <div class="card-body">

                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="order-listing" class="table" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Klienti</th>
                              <th>Shuma</th>
                              <th>Pagoi</th>
                              <th>Obligim</th>
                              <th>Forma</th>
                              <th>P&euml;rshkrimi</th>
                              <th>Data</th>

                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th>Klienti</th>
                              <th>Shuma</th>
                              <th>Pagoi</th>
                              <th>Obligim</th>
                              <th>Forma</th>
                              <th>P&euml;rshkrimi</th>
                              <th>Data</th>

                            </tr>
                          </tfoot>
                          <tbody>
                            <?php
                            $kueri = $conn->query("SELECT * FROM yinc ORDER BY id DESC");
                            while ($k = mysqli_fetch_array($kueri)) {

                            ?>
                              <tr>
                                <?php
                                $sid = $k['kanali'];
                                $gstaf = $conn->query("SELECT * FROM klientet WHERE id='$sid'");
                                $gstafi = mysqli_fetch_array($gstaf);
                                //My number is 928.
                                $myNumber = $k['shuma'];

                                //I want to get 25% of 928.
                                $percentToGet = $gstafi['perqindja'];

                                //Convert our percentage value into a decimal.
                                $percentInDecimal = $percentToGet / 100;

                                //Get the result.
                                $percent = $percentInDecimal * $myNumber;

                                //Print it out - Result is 232.

                                ?>
                                <td><?php echo $gstafi['emri']; ?></td>

                                <td><?php echo $k['shuma']; ?>&euro;</td>
                                <td><?php echo $k['pagoi']; ?>&euro;</td>
                                <td style="color:red;"><?php echo $k['shuma'] - $k['pagoi']; ?>&euro; <a data-bs-toggle="modal" data-bs-target="#pages<?php echo $k['id']; ?>" class="btn btn-primary"><i class="fas fa-money-bill"></i></i> Pages&euml;</a></td>
                                <td><?php echo $k['lloji']; ?></td>
                                <td><?php echo $k['pershkrimi']; ?></td>

                                <td><?php echo $k['data']; ?></td>
                              </tr>
                              <div class="modal fade" id="pages<?php echo $k['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Pages&euml;</h5>
                                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" action="">
                                        <input type="hidden" name="idp" value="<?php echo $k['id']; ?>">
                                        <label for="datab">Shuma:</label>

                                        <div class="input-group mb-2">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text">&euro;</div>
                                          </div>
                                          <input type="text" name="pagoi" class="form-control" id="inlineFormInputGroup" value="0.00">
                                        </div>
                                        <label>Forma e pages&euml;s</label>
                                        <select name="lloji" class="form-control">
                                          <option value="Bank">Bank</option>
                                          <option value="Cash">Cash</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hiqe</button>
                                      <button type="submit" name="paguaj" class="btn btn-primary">Paguaj</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>

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