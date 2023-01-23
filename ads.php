<?php include 'partials/header.php';
if (isset($_POST['ruaj'])) {

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $adsid = mysqli_real_escape_string($conn, $_POST['adsid']);
  $shteti = mysqli_real_escape_string($conn, $_POST['shteti']);


  if ($conn->query("INSERT INTO ads (email, adsid, shteti) VALUES ('$email', '$adsid', '$shteti')")) {
  }
}
if (isset($_GET['delete'])) {
  $delid = $_GET['delete'];
  $conn->query("DELETE FROM ads WHERE id='$delid'");
}
?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Shto nj&euml; llogari</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" placeholder="Shkruaj emailin">
          </div>
          <div class="form-group">
            <label>ADS ID</label>
            <input type="text" name="adsid" class="form-control" placeholder="Shkruaj id e ADS">
          </div>
          <div class="form-group">
            <label>shteti</label>
            <input type="text" name="shteti" class="form-control" placeholder="Shkruaj Shtetin">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mbylle</button>
        <input type="submit" class="btn btn-primary" name="ruaj" value="Ruaj">
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
          <h4 class="font-weight-bold text-gray-800 mb-4">Lista e klientëve tjerë</h4>
          <nav class="d-flex">
            <h6 class="mb-0">
              <a href="" class="text-reset">Klientët</a>
              <span>/</span>
              <a href="klient.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Lista e klientëve</u></a>
            </h6>
          </nav>
          <!-- Breadcrumb -->
        </div>
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="ti-plus"></i> Shto nj&euml; kategori
              </a></h4>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="order-listing" class="table" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Email</th>
                        <th>ADS ID</th>
                        <th>Shteti</th>
                        <th>Klientet</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Email</th>
                        <th>ADS ID</th>
                        <th>Shteti</th>
                        <th>Klientet</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $kueri = $conn->query("SELECT * FROM ads ORDER BY id DESC");
                      while ($k = mysqli_fetch_array($kueri)) {

                      ?>
                        <tr>
                          <td>
                            <?php echo $k['email']; ?>
                          </td>
                          <td>
                            <?php echo $k['adsid']; ?>
                          </td>
                          <td>
                            <?php echo $k['shteti']; ?>
                          </td>
                          <td><a href="adslist.php?id=<?php echo $k['id']; ?>"><i class="ti-folder"></i> Hap Listen</a>
                          </td>
                          <td><a href="ads.php?delete=<?php echo $k['id']; ?>"><i class="ti-trash" style="color:red;"></i></a> &nbsp; <i class="fas fa-user-edit" style="color:blue;"></i>
                            &nbsp;</td>
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
<!-- End of Main Content -->

<?php include 'partials/footer.php'; ?>