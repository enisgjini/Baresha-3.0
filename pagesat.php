<?php include 'partials/header.php';

?>
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
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="container">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Pagesat e kryera</h4>
                  <div class="row">
                    <div class="col-12">
                      <form method="GET" action="" class="form-inline">
                        <div class="form-group mb-2">
                          Prej:
                          <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" style="width: 230px;" name="d1" autocomplete="off">
                        </div>
                        <div class="form-group mb-2">
                          Deri:
                          <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" style="width: 230px;" name="d2" autocomplete="off">
                          <input type="submit" class="btn btn-primary" name="kerko" value="Kerko">
                        </div>
                      </form>
                      <div class="table-responsive">
                        <table id="order-listing" data-ordering="false" class="table">
                          <thead>
                            <tr>
                              <th>Klieni</th>
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
                                <td> <a class="btn btn-success btn-sm" target="_blank" href="fatura.php?invoice=<?php echo $k['fatura']; ?>"><i class="ti-printer"></i></a> </td>
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
  <!-- End of Main Content -->
  <?php include 'partials/footer.php'; ?>