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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Shto nj&euml; llogari</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <label>ADS ID</label>
            <input type="text" name="adsid" class="form-control" placeholder="ADS Id">
          </div>
          <div class="form-group">
            <label>Shteti</label>
            <input type="text" name="shteti" class="form-control" placeholder="Shteti">
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
          <h4 class="font-weight-bold text-gray-800 mb-4">Llogaritë e ADS</h4>
          <nav class="d-flex">
            <h6 class="mb-0">
              <a href="" class="text-reset">Klientët</a>
              <span>/</span>
              <a href="ads.php" class="text-reset" data-mdb-toggle="tooltip" title="Hi! I'm tooltip" title="<?php echo __FILE__; ?>"><u>Llogaritë e ADS</u></a>
            </h6>
          </nav>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="example" class="table w-100">
                    <thead class="bg-light">
                      <tr>
                        <th>Email</th>
                        <th>ADS ID</th>
                        <th>Shteti</th>
                        <th>Klientet</th>
                        <th></th>

                      </tr>
                    </thead>

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
                          <td><a class="btn btn-light border border-1 hover-shadow" href="adslist.php?id=<?php echo $k['id']; ?>"><i class="fi fi-rr-folder"></i> Hap Listen</a>
                          </td>
                          <td>
                            <a class="btn btn-danger" href="ads.php?delete=<?php echo $k['id']; ?>"><i class="fi fi-rr-trash"></i></a>
                            <a class="btn btn-warning" href="ads.php?edit=<?php echo $k['id']; ?>"><i class="fi fi-rr-edit"></i></a>
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
      text: '<i class="fi fi-rr-ballot fa-lg"></i>&nbsp;&nbsp; Shto nje kategori',
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