<?php include 'partials/header.php';
if (isset($_GET['id'])) {
  $gid = $_GET['id'];
  $conn->query("UPDATE rrogat SET lexuar='1' WHERE id='$gid'");
}
if (isset($_POST['ruaj'])) {
  $emri = mysqli_real_escape_string($conn, $_POST['emri']);
  $merreperemer = $conn->query("SELECT * FROM klientet WHERE id='$emri'");
  $merreperemer2 = mysqli_fetch_array($merreperemer);

  $emrifull = $merreperemer2['emri'];
  $data = mysqli_real_escape_string($conn, $_POST['data']);
  $fatura = mysqli_real_escape_string($conn, $_POST['fatura']);
  if ($conn->query("INSERT INTO fatura (emri, emrifull, data, fatura) VALUES ('$emri', '$emrifull', '$data','$fatura')")) {
?>
    <meta http-equiv="refresh" content="0;URL='shitje.php?fatura=<?php echo $fatura; ?>'" />
<?php
  } else {
    echo "Gabim: " . $conn->error;
  }
}
if ($_SESSION['acc'] == '1') {
} elseif ($_SESSION['acc'] == '3') {
} else {
  die('<script>alert("Nuk keni Akses ne kete sektor")</script>');
  echo '<meta http-equiv="refresh" content="0;URL=index.php/" /> ';
}
if (isset($_GET['fshij'])) {
  $fshijid = $_GET['fshij'];
  $mfsh4 = $conn->query("SELECT * FROM fatura WHERE fatura='$fshijid'");
  $mfsh2 = mysqli_fetch_array($mfsh4);
  $emr = $mfsh2['emri'];
  $fatura2 = $mfsh2['fatura'];
  $data2 = $mfsh2['data'];
  if ($conn->query("INSERT INTO draft (emri, data, fatura) VALUES ('$emr', '$data2','$fatura2')")) {
    $conn->query("DELETE FROM fatura WHERE fatura='$fshijid'");
    $shdraft = $conn->query("SELECT * FROM shitje WHERE fatura='$fshijid'");
    while ($draft = mysqli_fetch_array($shdraft)) {
      $shemertimi = $draft['emertimi'];
      $shqmimi = $draft['qmimi'];
      $shperqindja = $draft['perqindja'];
      $shklienti = $draft['klientit'];
      $shmbetja = $draft['mbetja'];
      $shtotali = $draft['totali'];
      $shfatura = $draft['fatura'];
      $shdata = $draft['data'];
      if ($conn->query("INSERT INTO shitjedraft (emertimi, qmimi, perqindja, klientit, mbetja, totali, fatura, data) VALUES ('$shemertimi', '$shqmimi', '$shperqindja', '$shklienti', '$shmbetja', '$shtotali', '$shfatura', '$shdata')")) {
        $conn->query("DELETE FROM shitje WHERE fatura='$fshijid'");
      }
    }
  } else {
    echo '<script>alert("' . $conn->error . '");</script>';
  }
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fatur e re</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">

          <label for="emri">Emri & Mbiemri</label>
          <select name="emri" class="form-control">
            <?php
            $gsta = $conn->query("SELECT * FROM klientet WHERE blocked='0'");
            while ($gst = mysqli_fetch_array($gsta)) {
            ?>
              <option value="<?php echo $gst['id']; ?>"><?php echo $gst['emri']; ?></option>
            <?php } ?>

          </select>
          <label for="datas">Data:</label>
          <input type="text" name="data" class="form-control" value="<?php echo date("Y-m-d"); ?>">
          <label for="imei">Fatura:</label>

          <input type="text" name="fatura" class="form-control" value="<?php echo date('dmYhis'); ?>" readonly>

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



            <div class="table-responsive">

              <div class="modal fade" id="pagesmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Shto Pages&euml;</h5>
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form id="user_form">
                        <label>Fatura:</label>
                        <input type="text" name="fatura" id="fatura" class="form-control" value="" placeholder="Shëno numrin e faturës">
                        <label>P&euml;rshkrimi:</label>
                        <textarea class="form-control" name="pershkrimi" id="pershkrimi"></textarea>
                        <label>Shuma:</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">&euro;</span>
                          </div>
                          <input type="text" name="shuma" id="shuma" class="form-control" placeholder="0" aria-label="Shuma">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                        </div>
                        <label>M&euml;nyra e pages&euml;s</label>
                        <select name="menyra" id="menyra" class="form-control">
                          <option value="BANK">BANK</option>
                          <option value="CASH">CASH</option>
                          <option value="PayPal">PayPal</option>
                          <option value="Ria">Ria</option>
                          <option value="MoneyGram">Money Gram</option>
                          <option value="WesternUnion">Western Union</option>
                        </select>
                        <label>Data</label>
                        <input type="text" name="data" id="data" value="<?php echo date("Y-m-d"); ?>" class="form-control">
                        <hr>
                        <div id="mesg" style="color:red;"></div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hiqe</button>
                      <input type="button" name="ruajp" id="btnruaj" class="btn btn-primary" value="Ruaj">
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <div id="alert_message"></div>
              <table id="employeeList" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Emri</th>
                    <th>Emri artistik</th>
                    <th>Fatura</th>
                    <th>Data</th>
                    <th>Shuma</th>
                    <th>Sh.Paguar</th>
                    <th>Obligim</th>
                    <th></th>
                  </tr>
                </thead>
              </table>
              <script type="text/javascript">
                $(document).ready(function() {
                  $('#btnruaj').click(function() {
                    var data = $('#user_form').serialize() + '&btn_save=btn_save';
                    $.ajax({
                      url: '/api/insertpages.php',
                      type: 'POST',
                      data: data,
                      success: function(response) {
                        $('#mesg').text(response);
                      }
                    });
                  });
                });
              </script>
              <script src="js/fetch.js"></script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>



<?php include 'partials/footer.php'; ?>