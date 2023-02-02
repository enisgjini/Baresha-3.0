<?php include 'header.php'; ?>

<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="container">
        <div class="card">
          <div class="card-body">

            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="order-listing" class="table" width="100%" cellspacing="0">
                    <thead>
                      <tr>

                        <th>Titulli</th>



                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      $trackid = $_GET['id'];
                      $json = file_get_contents('https://bareshamusic.sourceaudio.com/api/tracks/getById?track_id=' . $trackid . '&token=6636-66f549fbe813b2087a8748f2b8243dbc');

                      $data = json_decode($json, true);

                      ?>
                      <tr>
                        <td><?php echo $data['Title']; ?></td>

                      </tr>



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

<?php include 'footer.php'; ?>