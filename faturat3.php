<?php include 'header.php';
if (isset($_POST["submit_file"])) {
  $file = $_FILES["file"]["tmp_name"];
  $file_open = fopen($file, "r");
  while (($csv = fgetcsv($file_open, ",")) !== false) {
    $ReportingPeriod = $csv[0];
    $AccountingPeriod = $csv[1];
    $Artist = $csv[2];
    $rel = $csv[3];
    $Track = $csv[4];
    $UPC = $csv[5];
    $ISRC = $csv[6];
    $Partner = $csv[7];
    $Country = $csv[8];
    $Type = $csv[9];
    $Units = $csv[10];
    $RevenueUSD = $csv[11];
    $RevenueShare = $csv[12];
    $SplitPayShare = $csv[13];

    $query = "insert platformat (ReportingPeriod, AccountingPeriod, Artist, rel, Track, UPC, ISRC, Partner, Country, Type, Units, RevenueUSD, RevenueShare, SplitPayShare) values('$ReportingPeriod', '$AccountingPeriod', '$Artist', '$rel', '$Track', '$UPC', '$ISRC', '$Partner', '$Country', '$Type', '$Units', '$RevenueUSD', '$RevenueShare', '$SplitPayShare')";
    $conn->query($query);
  }
}
?>

<!-- Modal -->
<div class="modal fade" id="shtochannel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ngarko CSV</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Ngarko File (CSV):</label>
            <input type="file" name="file" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hiqe</button>
        <input type="submit" name="submit_file" class="btn btn-primary" value="Ngarko" />
        </form>
      </div>
    </div>
  </div>
</div>





<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Platformat tjera</h4>
            <div class="form-group row">
              <div class="col">
                <form method="POST">
                  <label>Artisti</label>
                  <select name="artistii" class="js-example-basic-single w-100" data-live-search="true" style="">
                    <?php
                    $merrarti = $conn->query("SELECT * FROM platformat GROUP BY Artist");
                    while ($merrart = mysqli_fetch_array($merrarti)) {
                    ?>
                      <option value="<?php echo $merrart['Artist']; ?>"><?php echo $merrart['Artist']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
              </div>
              <div class="col">
                <label>Perioda</label>
                <select name="perioda" class="js-example-basic-single w-100" data-live-search="true" style="">
                  <?php
                  $merrarti = $conn->query("SELECT * FROM platformat GROUP BY AccountingPeriod");
                  while ($merrart = mysqli_fetch_array($merrarti)) {
                  ?>
                    <option value="<?php echo $merrart['AccountingPeriod']; ?>"><?php echo $merrart['AccountingPeriod']; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="col">
                <button type="submit" class="btn btn-primary">
                  Filtro
                </button>
                </form>
              </div>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#shtochannel">
              Ngarko CSV
            </button>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Emri</th>
                        <th>Emri artistik</th>
                        <th>Nr. Llogaris&euml;</th>
                        <th>Platformat</th>
                        <th>Data</th>
                        <th>Shuma</th>
                        <th>Sh. Paguar</th>
                        <th>Obligim</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Emri & Mbiemri</th>
                        <th>Emri artistik</th>
                        <th>Nr. Llogaris&euml;</th>
                        <th>Platformat</th>
                        <th>Data</th>
                        <th>Shuma</th>
                        <th>Sh. Paguar</th>
                        <th>Obligim</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $kueri = $conn->query("SELECT * FROM fatura2 ORDER BY id DESC");
                      while ($k = mysqli_fetch_array($kueri)) {

                      ?>
                        <tr>
                          <?php
                          $sid = $k['fatura'];
                          $q4 = $conn->query("SELECT SUM(`totali`) as `sum` FROM `shitje2` WHERE fatura='$sid'");
                          $qq4 = mysqli_fetch_array($q4);
                          $klientiid = $k['emri'];
                          $mkl = $conn->query("SELECT * FROM klientet WHERE id='$klientiid'");
                          $k4 = mysqli_fetch_array($mkl);
                          ?>
                          <td><?php echo $k4['emri']; ?></td>
                          <td><?php echo $k4['emriart']; ?></td>

                          <td><?php echo $k4['nrllog']; ?></td>
                          <td><?php echo $k['platformat']; ?></td>
                          <td><?php echo $k['data']; ?></td>
                          <td><?php echo $qq4['sum']; ?>&euro;</td>
                          <td>
                            <?php
                            $merrpagesen = $conn->query("SELECT SUM(`shuma`) as `sum` FROM `pagesat2` WHERE fatura='$sid'");
                            $merrep = mysqli_fetch_array($merrpagesen);
                            echo $merrep['sum'] . "&euro; &nbsp;";
                            ?>
                            <a href="" data-toggle="modal" data-target="#modal<?php echo $k['id']; ?>"><i class="fas fa-file-invoice-dollar"></i></a>
                          </td>
                          <!-- Modal -->
                          <div class="modal fade" id="modal<?php echo $k['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Shto Pages&euml;</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form method="POST" action="">
                                    <label>Fatura:</label>
                                    <input type="text" name="fatura" class="form-control" value="<?php echo $k['fatura']; ?>">
                                    <label>P&euml;rshkrimi:</label>
                                    <textarea class="form-control" name="pershkrimi"></textarea>
                                    <label>Shuma:</label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">&euro;</span>
                                      </div>
                                      <input type="text" name="shuma" class="form-control" placeholder="0" aria-label="Shuma">
                                      <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                      </div>
                                    </div>
                                    <label>M&euml;nyra e pages&euml;s</label>
                                    <select name="menyra" class="form-control">
                                      <option value="BANK">BANK</option>
                                      <option value="CASH">CASH</option>
                                    </select>
                                    <label>Data</label>
                                    <input type="text" name="data" value="<?php echo date("d-m-Y"); ?>" class="form-control">

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hiqe</button>
                                  <button type="submit" name="ruajp" class="btn btn-primary">Ruaj</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <td><?php $obli =  $qq4['sum'] - $merrep['sum'];
                              if ($obli > 0) {
                                echo '<span style="color:red;">' . $obli . '&euro;</span>';
                              } else {
                                echo $obli . '&euro;';
                              }

                              ?></td>


                          <td><a href="shitje2.php?fatura=<?php echo $sid; ?>"><i class="far fa-edit"></i></a>&nbsp; <a target="_blank" href="fatura2.php?invoice=<?php echo $sid; ?>"><i class="fas fa-print"></i></a> <a href="faturat2.php?fshij=<?php echo $k['fatura']; ?>" onclick="return confirm('A jeni i sigurt qe deshironi ta fshini?');"><i class="fas fa-trash-alt"></i> </a> </td>
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
<?php include 'footer.php'; ?>