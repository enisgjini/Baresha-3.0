<?php include 'partials/header.php'; ?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <?php
  $channel_id = $_GET['id'];
  $api_key = "AIzaSyCvc0tIeB58Sz0hpDFSEYxDXFT8tg0VGGQ";
  $apiu = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=snippet&id=' . $channel_id . '&key=' . $api_key);
  $apid = json_decode($apiu, true);

  ?>
  <?php

  $aa = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=statistics&id=' . $channel_id . '&key=' . $api_key);
  $aaa = json_decode($aa, true);

  ?>
  <!-- Begin Page Content -->
  <div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="container">
          <div class="alert alert-successalert-dismissible" id="success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
          </div>
          <!-- Page Heading -->
          <center><img src="<?php echo $apid['items'][0]['snippet']['thumbnails']['high']['url']; ?>" width="100" class="rounded-circle"></center>
          <h2>
            <center>Kanali: <?php echo $apid['items'][0]['snippet']['title']; ?></center>
          </h2>
          <center><?php echo $apid['items'][0]['snippet']['description']; ?></center>
          <center><?php echo "<b>Total Abonues:</b> " . number_format($aaa['items'][0]['statistics']['subscriberCount'], 2, '.', ',') . " | &nbsp; ";
                  echo "<b>Total Shikime:</b> " . number_format($aaa['items'][0]['statistics']['viewCount'], 2, '.', ',') . " | &nbsp;";
                  echo "<b>Total Video:</b> " . $aaa['items'][0]['statistics']['videoCount']; ?></center>
          <hr>

          <div class="album py-5 bg-light">
            <div class="container">

              <div class="row">
                <?php


                $Max_Results = 1;

                // Get videos from channel by YouTube Data API 
                $apiData = @file_get_contents('https://www.googleapis.com/youtube/v3/search?key=' . $api_key . '&channelId=' . $channel_id . '&part=snippet,id&order=date&maxResults=9');
                if ($apiData) {
                  $api_response_decoded = json_decode($apiData);
                } else {
                  echo 'Invalid API key or channel ID.';
                }

                if (!empty($api_response_decoded->items)) {
                  foreach ($api_response_decoded->items as $item) {
                    // Embed video 
                    if (isset($item->id->videoId)) {

                ?>
                      <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                          <img class="card-img-top" src="<?php echo $item->snippet->thumbnails->high->url; ?>" alt="Card image cap">
                          <div class="card-body">
                            <p class="card-text">
                              <b><a href="https://www.youtube.com/watch?v=<?php echo $item->id->videoId; ?>"><?php echo $item->snippet->title; ?></a></b>
                              <br><?php echo $item->snippet->description; ?>.
                            </p>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">

                              <?php
                              $gc = file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=statistics&id=' . $item->id->videoId . '&key=' . $api_key);
                              $gcc = json_decode($gc, true);
                              echo "Shikime: " . $gcc['items'][0]['statistics']['viewCount'];
                              echo " Like: " . $gcc['items'][0]['statistics']['likeCount'];
                              echo " Dislike: " . $gcc['items'][0]['statistics']['dislikeCount'];
                              echo " komente: " . $gcc['items'][0]['statistics']['commentCount'] . "<br>";
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                <?php }
                  }
                } ?>
              </div>
            </div>
          </div>

        </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include 'partials/footer.php'; ?>