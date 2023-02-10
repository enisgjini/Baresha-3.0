<?php
include 'partials/header.php';
if (isset($_POST['ruaj'])) {
  $stats = mysqli_real_escape_string($conn, $_POST['stats']);
  $tid = mysqli_real_escape_string($conn, $_POST['tid']);
  $conn->query("UPDATE tiketa SET statusi='$stats' WHERE id='$tid'");
}
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="container">

        <div class="p-5 bg-light mb-4 card">
          <h4 class="font-weight-bold text-gray-800 mb-4">Listat e tiketave</h4> <!-- Breadcrumb -->
          <nav class="d-flex">
            <h6 class="mb-0">
              <a href="" class="text-reset">Tiketat</a>
              <span>/</span>
              <a href="listat.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Listat e tiketave</u></a>
            </h6>
          </nav>
          <!-- Breadcrumb -->
        </div>
        <div class="card">
          <div class="card-body">

            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="example" class="table w-100">
                    <thead class="bg-light">
                      <tr>
                        <th>Subjekti</th>
                        <th>Opsioni</th>
                        <th>Statusi</th>
                        <th>Data</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Subjekti</th>
                        <th>Opsioni</th>
                        <th>Statusi</th>
                        <th>Data</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $kueri = $conn->query("SELECT * FROM tiketa WHERE stafi='$uid' ORDER BY id DESC");
                      while ($k = mysqli_fetch_array($kueri)) {
                        if ($k['opsioni'] == "standard") {
                          $moni = "<td>Standard</td>";
                        } elseif ($k['opsioni'] == "urgjent") {
                          $moni = "<td style='color:orange;'>Urgjent</td>";
                        } elseif ($k['opsioni'] == "urgjent1") {
                          $moni = "<td style='color:RED;'>SHUM&Euml; URGJENT!</td>";
                        }
                        if ($k['lexuar'] == '0') {
                          $subjekti  = "<b>" . $k['subjekti'] . "</b>";
                        } else {
                          $subjekti = $k['subjekti'];
                        }
                        if ($k['statusi'] == "1") {
                          $statusi = '<span style="color:#ff6600;">N&euml; proces</span>';
                        } elseif ($k['statusi'] == '2') {
                          $statusi = '<span style="color:green;">P&euml;rfunduar</span>';
                        } else {
                          $statusi = '<span style="color:red;">N&euml; Pritje</a>';
                        }
                      ?>
                        <tr>
                          <td><a href="lexot.php?id=<?php echo $k['id']; ?>"><?php echo $subjekti; ?></a></td>

                          <?php echo $moni; ?>
                          <td><?php echo $statusi; ?></td>
                          <td><?php echo $k['data']; ?></td>

                          <td>
                            <form method="POST" action="">
                              <input type="hidden" name="tid" value="<?php echo $k['id']; ?>">
                              <div class="input-group mb-3">
                                <select class="form-control" name="stats">

                                  <option value="1" style="color:#ff6600;">N&euml; proces</option>
                                  <option value="2" style="color:green;">P&euml;rfunduar</option>
                                </select>
                                <div class="input-group-append">
                                  <button class="btn btn-outline-secondary" name="ruaj" type="submit">Ruaj</button>
                                </div>
                              </div>
                            </form>
                          </td>
                        </tr>


                      <?php } ?>
                      <?php
                      $kueri = $conn->query("SELECT * FROM tiketa WHERE stafi='0' ORDER BY id DESC");
                      while ($k = mysqli_fetch_array($kueri)) {
                        if ($k['opsioni'] == "standard") {
                          $moni = "<td>Standard</td>";
                        } elseif ($k['opsioni'] == "urgjent") {
                          $moni = "<td style='color:orange;'>Urgjent</td>";
                        } elseif ($k['opsioni'] == "urgjent1") {
                          $moni = "<td style='color:RED;'>SHUM&Euml; URGJENT!</td>";
                        }
                        if ($k['lexuar'] == '0') {
                          $subjekti  = "<b>" . $k['subjekti'] . "</b>";
                        } else {
                          $subjekti = $k['subjekti'];
                        }
                        if ($k['statusi'] == "1") {
                          $statusi = '<span style="color:#ff6600;">N&euml; proces</span>';
                        } elseif ($k['statusi'] == '2') {
                          $statusi = '<span style="color:green;">P&euml;rfunduar</span>';
                        } else {
                          $statusi = '<span style="color:red;">N&euml; Pritje</a>';
                        }
                      ?>
                        <tr>
                          <td><a href="lexot.php?id=<?php echo $k['id']; ?>"><?php echo $subjekti; ?></a></td>

                          <?php echo $moni; ?>
                          <td><?php echo $statusi; ?></td>
                          <td><?php echo $k['data']; ?></td>

                          <td>
                            <form method="POST" action="">
                              <input type="hidden" name="tid" value="<?php echo $k['id']; ?>">
                              <div class="input-group mb-3">
                                <select class="form-control" name="stats">

                                  <option value="1" style="color:#ff6600;">N&euml; proces</option>
                                  <option value="2" style="color:green;">P&euml;rfunduar</option>
                                </select>
                                <div class="input-group-append">
                                  <button class="btn btn-outline-secondary" name="ruaj" type="submit">Ruaj</button>
                                </div>
                              </div>
                            </form>
                          </td>
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
    stripeClasses: ['stripe-color'],
  })
</script>