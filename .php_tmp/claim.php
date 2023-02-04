<?php include 'partials/header.php';
if (isset($_GET['claim'])) {
  $cid = $_GET['claim'];
  $cdata = date("Y-m-d H:i:s");
  $cname = $_SESSION['emri'];
  $cnd = $cname . " ka ber Release Claim k&euml;ng&euml;n me Claim ID " . $cid;
  $query = "INSERT INTO logs (stafi, ndryshimi, koha) VALUES ('$cname', '$cnd', '$cdata')";
  if ($conn->query($query)) {
  } else {
    echo '<script>alert("' . $conn->error . '")</script>';
  }
  $cjson = file_get_contents('https://bareshamusic.sourceaudio.com/api/contentid/releaseclaim?token=6636-66f549fbe813b2087a8748f2b8243dbc&release[0][type]=claim&release[0][id]=' . $cid);

  $cdata = json_decode($cjson, true);
  if ($cdata['error'] == true) {
    echo '<script>alert("' . $cdata['error'] . '");</script>';
  } else {
    echo '<script>Sukses.</script>';
  }
}
?>
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
        </div>
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Recent Claims</h4>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>Track ID</th>
                        <th>Video</th>
                        <th>Kanali</th>
                        <th>Claim ID</th>
                        <th></th>



                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <td>Track ID</td>
                        <th>Video</th>
                        <th>Kanali</th>
                        <th>Claim ID</th>
                        <th></th>

                      </tr>
                    </tfoot>
                    <tbody>
                      <?php

                      $json = file_get_contents('https://bareshamusic.sourceaudio.com/api/contentid/claims?token=6636-66f549fbe813b2087a8748f2b8243dbc&show=5000');

                      $data = json_decode($json, true);
                      foreach ($data['claim'] as $sku) {
                      ?>
                        <tr>
                          <td><a href="track.php?id=<?php echo $sku['track_id']; ?>" target="_blank"><?php
                                                                                                      echo $sku['track_id'];

                                                                                                      ?></a></td>
                          <td><a href="https://www.youtube.com/watch?v=<?php echo $sku['video_id']; ?>" target="_blank"><?php echo $sku['video_title']; ?></a></td>

                          <td><a href="https://www.youtube.com/channel/<?php echo $sku['channel_id']; ?>" target="_blank"><?php echo $sku['video_author']; ?></a></td>
                          <td><?php echo $sku['claim_id']; ?></td>
                          <td><?php
                              if ($sku['released'] == '1') {
                                echo $sku['released_by'];
                              } else {
                                echo "<a href='claim.php?claim=" . $sku['claim_id'] . "'>Release</a>";
                              }
                              ?></td>
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
<!-- /.container-fluid -->
<?php include 'partials/footer.php'; ?>