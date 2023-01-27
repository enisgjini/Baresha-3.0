<?php include 'partials/header.php';
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

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


        <div class="card my-2 py-5 px-3 mb-4">
          <div class="form-group row">
            <div class="col">
              <form method="POST">
                <label>Zgjedh artistin</label>
                <select name="artistii" class="form-select border shadow-2  text-dark " data-live-search="true" id="my-select">
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
              <label>Zgjedh perioden</label>
              <select name="perioda" class="form-select border shadow-2  text-dark w-100" data-live-search="true">
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
          </div>
          <div class="col">
            <button type="submit" class="btn btn-primary">
              <i class="fi fi-rr-filter fa-lg"></i>&nbsp;&nbsp; Filtro
            </button>
            </form>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Platformat tjera</h4>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="example" data-ordering="false" class="table w-100">
                    <thead>
                      <tr>
                        <th>Artist(s)</th>
                        <th>Reporting Period</th>
                        <th>Accounting Period</th>

                        <th>Release</th>
                        <th>Track</th>
                        <th>Country</th>

                        <th>Revenue (USD)</th>
                        <th>Revenue Share (%)</th>
                        <th>Split Pay Share (%)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_POST['artistii']) && isset($_POST['perioda'])) {
                        $artistii = $_POST['artistii'];
                        $perioda = $_POST['perioda'];
                        $kueri = $conn->query("SELECT * FROM platformat WHERE Artist='$artistii' AND AccountingPeriod='$perioda'");
                        $q4 = $conn->query("SELECT SUM(`RevenueUSD`) as `sum` FROM `platformat` WHERE Artist='$artistii' AND AccountingPeriod='$perioda'");
                        $qq4 = mysqli_fetch_array($q4);
                        if (mysqli_num_rows($kueri) > 0) {
                          while ($k = mysqli_fetch_array($kueri)) {

                      ?>
                            <tr>
                              <td><?php echo $k['Artist']; ?></td>
                              <td><?php echo $k['ReportingPeriod']; ?></td>
                              <td><?php echo $k['AccountingPeriod']; ?></td>
                              <td><?php echo $k['rel']; ?></td>
                              <td><?php echo $k['Track']; ?></td>
                              <td><?php echo $k['Country']; ?></td>
                              <td><?php echo $k['RevenueUSD']; ?></td>
                              <td><?php echo $k['RevenueShare']; ?></td>
                              <td><?php echo $k['SplitPayShare']; ?></td>
                            </tr>
                          <?php
                          }
                          ?>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>Totali:</b><?php echo $qq4['sum']; ?></td>
                            <td></td>
                            <td></td>
                          </tr>
                      <?php
                        }
                      } else {
                        // handle empty result set
                      }
                      ?>
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
<?php include 'partials/footer.php'; ?>
<script>
  $('#example').DataTable({
    responsive: true,
    search: {
      return: true,
    },
    dom: 'Bfrtip',
    buttons: [{
      text: '<i class="fi fi-rr-upload fa-lg"></i>&nbsp;&nbsp; Ngarko CSV',
      className: 'btn btn-light border shadow-2 me-2',
      action: function(e, node, config) {
        $('#shtochannel').modal('show')
      }
    }, {
      extend: 'pdfHtml5',
      text: '<i class="fi fi-rr-file-pdf fa-lg"></i>&nbsp;&nbsp; PDF',
      titleAttr: 'Eksporto tabelen ne formatin PDF',
      className: 'btn btn-light border shadow-2 me-2'
    }, {
      extend: 'copyHtml5',
      text: '<i class="fi fi-rr-copy fa-lg"></i>&nbsp;&nbsp; Kopjo',
      titleAttr: 'Kopjo tabelen ne formatin Clipboard',
      className: 'btn btn-light border shadow-2 me-2'
    }, {
      extend: 'excelHtml5',
      text: '<i class="fi fi-rr-file-excel fa-lg"></i>&nbsp;&nbsp; Excel',
      titleAttr: 'Eksporto tabelen ne formatin CSV',
      className: 'btn btn-light border shadow-2 me-2'
    }, {
      extend: 'print',
      text: '<i class="fi fi-rr-print fa-lg"></i>&nbsp;&nbsp; Printo',
      titleAttr: 'Printo tabelën',
      className: 'btn btn-light border shadow-2 me-2'
    }, {
      text: 'Print',
      action: function(e, dt, node, config) {
        var data = dt.data();
        var jsonData = JSON.stringify(data, function(key, val) {
          if (key == '_buttons' || key == 'context') {
            return undefined;
          }
          return val;
        });

        window.location.href = "newPage.php?data=" + jsonData;

      }
    }],
    initComplete: function() {
      var btns = $('.dt-buttons');
      btns.addClass('');
      btns.removeClass('dt-buttons btn-group');

    },
    fixedHeader: true,
    language: {
      url: "https://cdn.datatables.net/plug-ins/1.13.1/i18n/sq.json",
    },

  })
</script>