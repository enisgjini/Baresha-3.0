<?php include 'partials/header.php';
if (isset($_POST['channel_id'])) {
  $cid = $_POST['channel_id'];
  $note = $_POST['note'];
  $cdata = date("Y-m-d H:i");
  $cname = $_SESSION['emri'];
  $cnd = $cname . " ka shtuar n&euml; whitelist kanalin me id " . $cid . " me dat&euml;n: " . $cdata;
  $query = "INSERT INTO logs (stafi, ndryshimi, koha) VALUES ('$cname', '$cnd', '$cdata')";
  if ($conn->query($query)) {
  } else {
    echo '<script>alert("' . $conn->error . '")</script>';
  }
  $cjson = file_get_contents('https://bareshamusic.sourceaudio.com/api/contentid/whitelistChannel?token=6636-66f549fbe813b2087a8748f2b8243dbc&channel[0][channel_id]=' . $cid . '&channel[0][note]=' . $note);

  $cdata = json_decode($cjson, true);
  if ($cdata['error'] == true) {
    echo '<script>alert("' . $cdata['error'] . '");</script>';
  } else {
    echo '<script>Sukses.</script>';
  }
}
if (isset($_GET['remove'])) {
  $removeid = $_GET['remove'];
  $cdata = date("Y-m-d H:i:s");
  $cname = $_SESSION['emri'];
  $cnd = $cname . " ka fshir&euml; nga whitelist kanalin me ID " . $removeid;
  $query = "INSERT INTO logs (stafi, ndryshimi, koha) VALUES ('$cname', '$cnd', '$cdata')";
  if ($conn->query($query)) {
  } else {
    echo '<script>alert("' . $conn->error . '")</script>';
  }
  $crem = file_get_contents('https://bareshamusic.sourceaudio.com/api/contentid/whitelistRemove?token=6636-66f549fbe813b2087a8748f2b8243dbc&channel[channel_id]=' . $removeid);
}
?>



<!-- Modal -->
<div class="modal fade" id="shtochannel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Shto nj&euml; kanal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <div class="modal-body">
        <form method="POST" action="whitelist.php">
          <div class="form-group">
            <label>Channel ID:</label>
            <input type="text" name="channel_id" placeholder="Channel ID" class="form-control">
          </div>
          <div class="form-group">
            <label>P&euml;rshkrim:</label>
            <input type="text" name="note" placeholder="P&euml;rshkrimi" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hiqe</button>
        <button type="submit" class="btn btn-primary">Shto</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="container">
      <div class="p-5 bg-light mb-4 card">
        <h4 class="font-weight-bold text-gray-800 mb-4">Whitelist</h4>
        <nav class="d-flex">
          <h6 class="mb-0">
            <a href="" class="text-reset">Content ID</a>
            <span>/</span>
            <a href="whitelist.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Whitelist</u></a>
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
                      <th>Kanali</th>
                      <th>Shenime</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php

                    $json = file_get_contents('https://bareshamusic.sourceaudio.com/api/contentid/whitelist?token=6636-66f549fbe813b2087a8748f2b8243dbc');

                    $data = json_decode($json, true);
                    foreach ($data['whitelist'] as $sku) {
                    ?>
                      <tr>
                        <td><a href="https://www.youtube.com/channel/<?php echo $sku['channel_id']; ?>" target="_blank"><?php echo $sku['channel_name']; ?></a></td>
                        <td><?php echo $sku['data']['note'] ?></td>
                        <td><a class="btn btn-danger" href="whitelist.php?remove=<?php echo $sku['channel_id']; ?>"><i class="fi fi-rr-trash"></i></a></td>
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
    }, {
      text: '<i class="fi fi-rr-file-video fa-lg"></i>&nbsp;&nbsp; Shto nje kanal ne whitelist',
      className: 'btn btn-light border shadow-2 me-2',
      action: function(e, node, config) {
        $('#shtochannel').modal('show')
      }
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