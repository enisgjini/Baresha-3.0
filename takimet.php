<?php include 'partials/header.php';
if (isset($_POST['emertimi'])) {
  $emertimi = $_POST['emertimi'];
  $pershkrimi = $_POST['pershkrimi'];
  $data = $_POST['data'];
  if ($conn->query("INSERT INTO takimet (emertimi, pershkrimi, data, statusi) VALUES ('$emertimi', '$pershkrimi', '$data', '0')")) {
    echo '<script>alert("Takimi u shtua me sukses");</script>';
  }
}
if (isset($_GET['mbaro'])) {
  $perfundo = $_GET['mbaro'];
  $conn->query("UPDATE takimet SET statusi='1' WHERE id='$perfundo'");
}
?>

<script src="https://apis.google.com/js/api.js"></script>

<!-- Modal -->
<div class="modal fade" id="shtochannel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Shto nj&euml; takim</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="takimet.php">
          <div class="form-group">
            <label>Em&euml;rtimi</label>
            <input type="text" name="emertimi" placeholder="Em&euml;rtimi" class="form-control">
          </div>
          <div class="form-group">
            <label>P&euml;rshkrim:</label>
            <textarea name="pershkrimi" placeholder="P&euml;rshkrimi" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Data:</label>
            <input type="date" class="form-control" name="data" value="<?php echo date("Y-m-d"); ?>">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hiqe</button>
        <button type="submit" class="btn btn-primary">Shto</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="container">
      <div class="p-5 bg-light mb-4 card">
        <h4 class="font-weight-bold text-gray-800 mb-4">Takimet</h4>
        <nav class="d-flex">
          <h6 class="mb-0">
            <a href="takimet.php" class="text-reset" data-mdb-toggle="tooltip" title="Hi! I'm tooltip" title="<?php echo __FILE__; ?>"><u>Takimet</u></a>
          </h6>
        </nav>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="example" class="table w-100 responsive">
                  <thead>
                    <tr>
                      <th>Emertimi</th>
                      <th>Pershkrimi</th>
                      <th>Data</th>
                      <th>Statusi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $gt = $conn->query("SELECT * FROM takimet ORDER BY statusi");
                    while ($rowta = mysqli_fetch_array($gt)) {

                    ?>
                      <tr>
                        <td><?php echo $rowta['emertimi']; ?></td>
                        <td><?php echo $rowta['pershkrimi']; ?></td>
                        <td><?php
                            $dda = $rowta['data'];
                            $date = date_create($dda);
                            echo date_format($date, 'd-m-Y');
                            ?></td>
                        <td><?php
                            if ($rowta['statusi'] == "1") {
                              $statusi = "<span style='color:green'>P&euml;rfunduar</span>";
                            } else {
                              $statusi = "<a href='takimet.php?mbaro=" . $rowta['id'] . "' class='btn btn-info btn-rounded btn-fw'>P&euml;rfundo Takimin</a>";
                            }
                            echo $statusi; ?></td>
                      </tr>
                    <?php } ?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Emertimi</th>
                      <th>Pershkrimi</th>
                      <th>Data</th>
                      <th>Statusi</th>
                    </tr>
                  </tfoot>
                </table>
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
      text: '<i class="fi fi-rr-ballot fa-lg"></i>&nbsp;&nbsp; Shto nje takim',
      className: 'btn btn-light border shadow-2 me-2',
      action: function(e, node, config) {
        $('#shtochannel').modal('show')
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

  })
</script>