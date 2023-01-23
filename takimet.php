<?php include 'header.php';
if(isset($_POST['emertimi'])){
    $emertimi = $_POST['emertimi'];
    $pershkrimi = $_POST['pershkrimi'];
    $data = $_POST['data'];
    if($conn->query("INSERT INTO takimet (emertimi, pershkrimi, data, statusi) VALUES ('$emertimi', '$pershkrimi', '$data', '0')")){
        echo '<script>alert("Takimi u shtua me sukses");</script>';
    }
}
if(isset($_GET['mbaro'])){
    $perfundo = $_GET['mbaro'];
    $conn->query("UPDATE takimet SET statusi='1' WHERE id='$perfundo'");
}
?>

                <!-- Begin Page Content -->
                 <div class="container-fluid page-body-wrapper">
              
<!-- Modal -->
<div class="modal fade" id="shtochannel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Shto nj&euml; takim</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="takimet.php">
        <div class="form-group">
        <label>Em&euml;rtimi</label>
        <input type="text" name="emertimi" placeholder="Em&euml;rtimi" class="form-control">
    </div>
    <div class="form-group">
         <label>P&euml;rshkrim:</label>
        <textarea name="pershkrimi" placeholder="P&euml;rshkrimi" class="form-control"></textarea>
    </div>
      <div class="form-group">
         <label>Data:</label>
      <input type="date" class="form-control" name="data" value="<?php echo date("Y-m-d");?>">
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
  Shto nj&euml; takim n&euml; list&euml;
</button>
              <div class="card-body">
             
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                                <table id="order-listing" data-ordering="false" class="table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>    
                                                <th>Emertimi</th>
                                                <th>Pershkrimi</th>
                                                <th>Data</th>
                                                <th>Statusi</th>
                                                

                                        </tr>
                                    </thead>
                                    <tfoot>
                                                <th>Emertimi</th>
                                                <th>Pershkrimi</th>
                                                <th>Data</th>
                                                <th>Statusi</th>
                                              
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                         <?php
                                            $gt = $conn->query("SELECT * FROM takimet ORDER BY statusi");
                                            while($rowta = mysqli_fetch_array($gt)){
                                            
                                            ?>
                                            <tr>
                                                <td><?php echo $rowta['emertimi'];?></td>
                                                <td><?php echo $rowta['pershkrimi'];?></td>
                                                <td><?php 
                                                $dda = $rowta['data'];
                                                   $date = date_create($dda);
                                                 echo date_format($date, 'd-m-Y');
                                              ?></td>
                                              <td><?php
                                              if($rowta['statusi'] == "1"){
                                                $statusi = "<span style='color:green'>P&euml;rfunduar</span>";
                                              }else{
                                                $statusi = "<a href='takimet.php?mbaro=".$rowta['id']."' class='btn btn-info btn-rounded btn-fw'>P&euml;rfundo Takimin</a>";
                                              }
                                               echo $statusi;?></td>
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