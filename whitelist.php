<?php include 'header.php';
if(isset($_POST['channel_id'])){
    $cid = $_POST['channel_id'];
    $note = $_POST['note'];
    $cdata = date("Y-m-d H:i");
    $cname = $_SESSION['emri'];
    $cnd = $cname." ka shtuar n&euml; whitelist kanalin me id ".$cid." me dat&euml;n: ".$cdata;
    $query = "INSERT INTO logs (stafi, ndryshimi, koha) VALUES ('$cname', '$cnd', '$cdata')";
    if($conn->query($query)){

    }else{
        echo '<script>alert("'.$conn->error.'")</script>';
    }
    $cjson = file_get_contents('https://bareshamusic.sourceaudio.com/api/contentid/whitelistChannel?token=6636-66f549fbe813b2087a8748f2b8243dbc&channel[0][channel_id]='.$cid.'&channel[0][note]='.$note);

                            $cdata = json_decode($cjson,true);
                            if($cdata['error'] == true){
                                echo '<script>alert("'.$cdata['error'].'");</script>';
                            }else{
                                echo '<script>Sukses.</script>';
                            }
}
if(isset($_GET['remove'])){
    $removeid = $_GET['remove'];
    $cdata = date("Y-m-d H:i:s");
    $cname = $_SESSION['emri'];
    $cnd = $cname." ka fshir&euml; nga whitelist kanalin me ID ".$removeid;
    $query = "INSERT INTO logs (stafi, ndryshimi, koha) VALUES ('$cname', '$cnd', '$cdata')";
    if($conn->query($query)){

    }else{
        echo '<script>alert("'.$conn->error.'")</script>';
    }
    $crem = file_get_contents('https://bareshamusic.sourceaudio.com/api/contentid/whitelistRemove?token=6636-66f549fbe813b2087a8748f2b8243dbc&channel[channel_id]='.$removeid);
}
?>

                <!-- Begin Page Content -->
                 <div class="container-fluid page-body-wrapper">
              
<!-- Modal -->
<div class="modal fade" id="shtochannel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Shto nj&euml; kanal</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
                    <!-- DataTales Example -->
                
                          <div class="main-panel">

        <div class="content-wrapper">
          <div class="container">
            <div class="card">
                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#shtochannel">
  Shto kanal n&euml; whitelist
</button>
              <div class="card-body">
             
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                                <table id="order-listing" class="table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>    
                                                <th>Kanali</th>
                                                <th>Note</th>
                                                <th></th>
                                               
                                                

                                        </tr>
                                    </thead>
                                    <tfoot>
                                                <th>Kanali</th>
                                                <th>Note</th>
                                                <th></th>
                                              
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                         <?php
                                         
                          $json = file_get_contents('https://bareshamusic.sourceaudio.com/api/contentid/whitelist?token=6636-66f549fbe813b2087a8748f2b8243dbc');

                            $data = json_decode($json,true);
                                           foreach ($data['whitelist'] as $sku) {
                                            ?>
                                            <tr>
                                                <td><a href="https://www.youtube.com/channel/<?php echo $sku['channel_id'];?>" target="_blank"><?php echo $sku['channel_name']; ?></a></td>
                                                <td><?php echo $sku['data']['note'] ?></td>
                                                <td><a href="whitelist.php?remove=<?php echo $sku['channel_id'];?>">Fshij nga Whitelist</a></td>
                                            </tr>


                                        <?php }?>
                                      
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

<?php include 'footer.php';?>