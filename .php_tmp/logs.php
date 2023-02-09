<?php include 'partials/header.php'; ?><style>
</style>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="container">
      <div class="p-5 bg-light mb-4 card">
        <h4 class="font-weight-bold text-gray-800 mb-4">Lista e përdoruesve gjatë kyçjes në sistem</h4> <!-- Breadcrumb -->
        <nav class="d-flex">
          <h6 class="mb-0">
            <a href="logs.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Logs</u></a>
          </h6>
        </nav>
      </div>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Logs</h4>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="example1" class="table w-100">
                  <thead class="bg-light">
                    <tr>
                      <th>Stafi</th>
                      <th>Sherbimi</th>
                      <th>Koha</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $merri = $conn->query("SELECT * FROM logs ORDER BY id DESC");
                    while ($k = mysqli_fetch_array($merri)) {
                    ?>
                      <tr>
                        <td><?php echo $k['stafi']; ?></td>
                        <td>
                          <?php echo $k['ndryshimi']; ?>
                        </td>
                        <td><?php echo $k['koha']; ?></td>
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
<?php include 'partials/footer.php'; ?>
<script>
  $('#example1').DataTable({
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
    stripeClasses: ['stripe-color']
  })
</script>