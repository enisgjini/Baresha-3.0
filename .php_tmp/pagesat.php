<?php include 'partials/header.php'; ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="container">
        <div class="p-5 bg-light mb-4 card">
          <h4 class="font-weight-bold text-gray-800 mb-4">Pagesat e kryera</h4> <!-- Breadcrumb -->
          <nav class="d-flex">
            <h6 class="mb-0">
              <a href="" class="text-reset">Financat</a>
              <span>/</span>
              <a href="pagesat.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Pagesat e kryera</u></a>
            </h6>
          </nav>
        </div>

        <div class="card my-2 py-5 px-3 mb-4">

          <form method="GET" action="" class="form-inline">
            <div class="form-group row">
              <div class="col-6">
                Prej :
                <input type="date" class="form-control w-100" value="<?php echo date("Y-m-d"); ?>" style="width: 230px;" name="d1" autocomplete="off">
              </div>
              <div class="col-6">
                Deri :
                <input type="date" class="form-control w-100" value="<?php echo date("Y-m-d"); ?>" style="width: 230px;" name="d2" autocomplete="off">
              </div>
              <div class="col my-3">
                <input type="submit" class="btn btn-primary" name="kerko" value="Kerko">
              </div>
            </div>
          </form>
        </div>
      </div>




      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12">

              <div class="table-responsive">
                <table id="example" class="table w-100 border">
                  <thead class="bg-light">
                    <tr>
                      <th>Klienti</th>
                      <th>Fatura</th>
                      <th>Pershkrimi</th>
                      <th>Shuma</th>
                      <th>Menyra</th>
                      <th>Data</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (isset($_GET['kerko'])) {
                      $d1 = $_GET['d1'];
                      $d2 = $_GET['d2'];
                      $merri = $conn->query("SELECT * FROM pagesat WHERE data >= '$d1' AND data <= '$d2' ORDER BY data DESC");
                    } else {
                      $merri = $conn->query("SELECT * FROM pagesat ORDER BY data DESC");
                    }

                    while ($k = mysqli_fetch_array($merri)) {
                      $nrfatures = $k['fatura'];
                      // $merremrin = $conn->query("SELECT * FROM fatura WHERE fatura='$nrfatures'");

                      $merremrin = $conn->query("SELECT * FROM fatura WHERE fatura='$nrfatures'");
                      if (mysqli_num_rows($merremrin) > 0) {
                        $dhenat = mysqli_fetch_array($merremrin);
                        $cliidi = $dhenat['emri'];
                        $merremrin2 = $conn->query("SELECT * FROM klientet WHERE id='$cliidi'");
                        $dhena = mysqli_fetch_array($merremrin2);
                      } else {
                        // handle empty result set
                      }
                      // $dhenat = mysqli_fetch_array($merremrin);
                      // $cliidi = $dhenat['emri'];
                      // $merremrin2 = $conn->query("SELECT * FROM klientet WHERE id='$cliidi'");
                      // $dhena = mysqli_fetch_array($merremrin2);
                    ?>
                      <tr>
                        <th><?php echo $dhena['emri']; ?></th>
                        <td><?php echo $k['fatura']; ?></td>
                        <td><?php echo $k['pershkrimi']; ?></td>
                        <td><?php echo $k['shuma']; ?></td>
                        <td><?php echo $k['menyra']; ?></td>
                        <td><?php echo  date("d-m-Y", strtotime($k['data'])); ?></td>
                        <td> <a class="btn btn-light shadow-2 border border-1" target="_blank" href="fatura.php?invoice=<?php echo $k['fatura']; ?>"><i class="fi fi-rr-print"></i></a> </td>
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
    buttons: [],
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