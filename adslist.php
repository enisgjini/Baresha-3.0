<?php
include 'header.php';
?>
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><a type="button" class="btn btn-primary" href="ads.php">
                <i class="ti-back-left"></i> Kthehu
              </a></h4>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="order-listing" class="table" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th scope="col">Emri</th>
                        <th scope="col">Emri Artistik</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
      $idof = $_GET['id'];
      $merrl = $conn->query("SELECT * FROM klientet WHERE ads='$idof'");
      while ($loa = mysqli_fetch_array($merrl)) {
      ?>

                      <tr>
                        <td>
                          <?php echo $loa['emri']; ?>
                        </td>
                        <td>
                          <?php echo $loa['emriart']; ?>
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
<?php include 'footer.php'; ?>