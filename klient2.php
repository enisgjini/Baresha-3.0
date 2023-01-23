<?php include 'partials/header.php';

if (isset($_POST['ruaj'])) {
}
?>


<!-- DataTales Example -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="container">

        <div class="p-5 bg-light mb-4 card">
          <h4 class="font-weight-bold text-gray-800 mb-4">Lista e klientëve tjerë</h4>
          <nav class="d-flex">
            <h6 class="mb-0">
              <a href="" class="text-reset">Klientët</a>
              <span>/</span>
              <a href="klient.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Lista e klientëve tjerë</u></a>
            </h6>
          </nav>
        </div>
        <div class="card">
          <div class="card-body">

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Shto nj&euml; klient</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="emri">Emri dhe Mbiemri</label>
                        <input type="text" name="emri" class="form-control" placeholder="Shkruaj Emrin Mbiemrin">
                      </div>
                      <div class="form-group">
                        <label for="nr">Nr. i telefonit</label>
                        <input type="text" name="nr" class="form-control" placeholder="Shkruaj numrin e telefonit">
                      </div>



                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mbylle</button>
                    <input type="submit" class="btn btn-primary" name="register" value="Ruaj">
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="example" class="table w-full">
                    <thead>
                      <tr>
                        <th>Emri dhe Mbiemri</th>

                        <th>Nr. i telefonit </th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Emri dhe Mbiemri</th>

                        <th>Nr.i telefonit</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $kueri = $conn->query("SELECT * FROM klient2 ORDER BY id DESC");
                      while ($k = mysqli_fetch_array($kueri)) {

                      ?>
                        <tr>
                          <td><?php echo $k['emri']; ?></td>
                          <td><?php echo $k['nrtel']; ?></td>
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
      text: '<i class="fi fi-rr-user-add fa-lg"></i>&nbsp;&nbsp; Shto klientë',
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

  })
</script>

