<?php include 'partials/header.php';

if (isset($_POST['ruaj'])) {


  $shuma = mysqli_real_escape_string($conn, $_POST['shuma']);
  $data = mysqli_real_escape_string($conn, $_POST['data']);
  $pagesa = mysqli_real_escape_string($conn, $_POST['forma']);
  $pershkrimi = mysqli_real_escape_string($conn, $_POST['pershkrimi']);
  if ($conn->query("INSERT INTO tatimi (shuma, pershkrimi, data, pagesa) VALUES ('$shuma', '$pershkrimi','$data', '$pagesa')")) {
  }
}
if ($_SESSION['acc'] == '1') {
} elseif ($_SESSION['acc'] == '3') {
} else {
  die('<script>alert("Nuk keni Akses ne kete sektor")</script>');
  echo '<meta http-equiv="refresh" content="0;URL=index.php/" /> ';
}
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="container">
        <div class="p-5 bg-light mb-4 card">
          <h4 class="font-weight-bold text-gray-800 mb-4">Financat</h4>
          <nav class="d-flex">
            <h6 class="mb-0">
              <a href="" class="text-reset">Financat</a>
              <span>/</span>
              <a href="tatimi.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Tatimi</u></a>
            </h6>
          </nav>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tatimi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </button>
              </div>
              <div class="modal-body ">
                <form method="POST" action="" class="">


                  <label for="datab">Shuma:</label>

                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">&euro;</div>
                    </div>
                    <input type="text" name="shuma" class="form-control" id="inlineFormInputGroup" value="0.00">
                  </div>

                  <label for="datas">Data e pages&euml;s:</label>
                  <input type="text" name="data" class="form-control" value="<?php echo date("d-m-Y"); ?>">
                  <label for="imei">Forma e pages&euml;s:</label>
                  <select name="forma" class="form-select mr-sm-2">
                    <option value="Cash">Cash</option>
                    <option value="Bank">Bank</option>
                  </select>
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
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="example" class="table w-100">
                    <thead>
                      <tr>
                        <th>Shuma</th>
                        <th>P&euml;rshkrimi</th>
                        <th>Data</th>
                        <th>Forma</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Shuma</th>
                        <th>P&euml;rshkrimi</th>
                        <th>Data</th>
                        <th>Forma</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $kueri = $conn->query("SELECT * FROM tatimi ORDER BY id DESC");
                      while ($k = mysqli_fetch_array($kueri)) {

                      ?>
                        <tr>



                          <td><?php echo $k['shuma']; ?>&euro;</td>
                          <td><?php echo $k['pershkrimi']; ?></td>
                          <td><?php echo $k['data']; ?></td>
                          <td><?php echo $k['pagesa']; ?></td>
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
<?php include 'partials/footer.php'; ?>
<script>
  $('#example').DataTable({
    responsive: true,
    search: {
      return: true,
    },
    dom: 'Bfrtip',
    buttons: [{
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
      text: '<i class="fi fi-rr-file-invoice fa-lg"></i>&nbsp;&nbsp; Fatura',
      className: 'btn btn-light border shadow-2 me-2',
      action: function(e, node, config) {
        $('#exampleModal').modal('show')
      }
    }, ],
    initComplete: function() {
      var btns = $('.dt-buttons');
      btns.addClass('');
      btns.removeClass('dt-buttons btn-group');

    },
    fixedHeader: true,
    language: {
      url: "https://cdn.datatables.net/plug-ins/1.13.1/i18n/sq.json",
    },
    stripeClasses: ['stripe-color']

  })
</script>