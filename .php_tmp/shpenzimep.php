<?php include 'partials/header.php';

if (isset($_POST['ruaj'])) {


  $shuma = mysqli_real_escape_string($conn, $_POST['shuma']);
  $data = mysqli_real_escape_string($conn, $_POST['data']);
  $pagesa = mysqli_real_escape_string($conn, $_POST['forma']);
  $pershkrimi = mysqli_real_escape_string($conn, $_POST['pershkrimi']);
  if ($conn->query("INSERT INTO shpenzimep (shuma, pershkrimi, data, pagesa) VALUES ('$shuma', '$pershkrimi','$data', '$pagesa')")) {
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
          <h4 class="font-weight-bold text-gray-800 mb-4">Shpenzimet personale</h4> <!-- Breadcrumb -->
          <nav class="d-flex">
            <h6 class="mb-0">
              <a href="" class="text-reset">Financat</a>
              <span>/</span>
              <a href="shpenzimep.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Shpenzimet personale</u></a>
            </h6>
          </nav>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Shpenzimet personale</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="POST" action="">
                  <label for="datab">Shuma</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">&euro;</div>
                    </div>
                    <input type="text" name="shuma" class="form-control" id="inlineFormInputGroup" value="0.00">
                  </div>

                  <label for="datas">Data e pages&euml;s</label>
                  <input type="text" name="data" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                  <label for="imei">Forma e pages&euml;s</label>
                  <select name="forma" class="form-select">
                    <option value="Cash">Cash</option>
                    <option value="Bank">Bank</option>
                  </select>
                  <label for="pershkrimi">P&euml;rshkrimi</label>
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
                    <thead class="bg-light">
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
                      $kueri = $conn->query("SELECT * FROM shpenzimep ORDER BY id DESC");
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
      text: '<i class="fi fi-rr-wallet fa-lg"></i>&nbsp;&nbsp; E re',
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