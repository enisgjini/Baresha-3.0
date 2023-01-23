<?php include "./partials/sales.php" ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 col-xl-5 mb-4 mb-xl-0">
            <h4 class="font-weight-bold">Mir&euml; se erdhe!</h4>
            <h4 class="font-weight-normal mb-0"><?php echo $_SESSION["emri"]; ?></h4>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="fw-bold text-md-left text-xl-left ">Fitimi në platformën YouTube</span>
                </p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $summ6['sum']; ?>&euro;</h3>
                  <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="fw-bold text-md-left text-xl-left">Pagesa klient&euml;ve</p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $summ5['sum']; ?>&euro;</h3>
                  <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>

              </div>
            </div>
          </div>
          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="fw-bold text-md-left text-xl-left">Paga bruto e punonj&euml;sve</p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $summ7['sum']; ?>&euro;</h3>
                  <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>

              </div>
            </div>
          </div>
          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="fw-bold text-md-left text-xl-left">Fitimi në platformat tjera

                </p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $summ8['sum']; ?>&euro;</h3>
                  <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="fw-bold text-md-left text-xl-left">Numri i takimeve</p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $takimet2; ?></h3>
                  <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>

              </div>
            </div>
          </div>
          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <?php
                $gc = $conn->query("SELECT * FROM ngarkimi");
                $ngc = mysqli_num_rows($gc);
                ?>
                <p class="fw-bold text-md-left text-xl-left">Numri i ngarkim&euml;ve</p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $ngc; ?></h3>
                  <i class="ti-youtube icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="fw-bold text-md-left text-xl-left">Takimet e realizuara</p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $tm2; ?></h3>
                  <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="fw-bold text-md-left text-xl-left">Takimet e pa realizuara</p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $tp2; ?></h3>
                  <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        $max = max($janar['sum'], $shkurt['sum'], $mars['sum'], $prill['sum']);
        $min = min($janar['sum'], $shkurt['sum'], $mars['sum'], $prill['sum']);
        $dd = strtotime("-6 Months");
        $ggdata = date("Y-m-d", $dd);

        $mp6 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '$ggdata' AND data <= '$dataAktuale'");
        $m6 = mysqli_fetch_array($mp6);
        ?>
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card position-relative">
              <div class="card-body">
                <p class="fw-bold">Raporti 6 muaj&euml;t e fundit</p>
                <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="row">
                        <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-center">
                          <div class="ml-xl-4">
                            <h1><?php echo $m6['sum']; ?>&euro;</h1>
                            <h3 class="font-weight-light mb-xl-4">Pagesa Klient&euml;ve</h3>
                            <p class="text-muted mb-2 mb-xl-0">Mbrenda k&euml;tyre 6 muajve jan b&euml;r&euml; total
                              pagesa n&euml; vler&euml; prej <?php echo $m6['sum']; ?> euro</p>
                          </div>
                        </div>
                        <div class="col-md-12 col-xl-9">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="table-responsive mb-3 mb-md-0">
                                <table class="table table-borderless report-table">
                                  <tr>
                                    <td class="text-muted">Janar</td>
                                    <td class="w-100 px-0">
                                      <div class="progress progress-md mx-4">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php

                                                                                                              echo ($janar['sum'] * 100) / $max; ?>%" aria-valuenow="<?php echo $janar['sum']; ?>" aria-valuemin="??php echo $min; ??" aria-valuemin="??php echo $min; ??" aria-valuemin="<?php echo $min; ?>" aria-valuemax="<?php echo $max; ?>"></div>
                                      </div>
                                    </td>
                                    <td>
                                      <h5 class="font-weight-bold mb-0"><?php echo $janar['sum']; ?>&euro;</h5>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="text-muted">Shkurt</td>
                                    <td class="w-100 px-0">
                                      <div class="progress progress-md mx-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo ($shkurt['sum'] * 100) / $max; ?>%" aria-valuenow="<?php echo $shkurt['sum']; ?>" aria-valuemin="??php echo $min; ??" aria-valuemin="??php echo $min; ??" aria-valuemin="<?php echo $min; ?>" aria-valuemax="<?php echo $max; ?>"></div>
                                      </div>
                                    </td>
                                    <td>
                                      <h5 class="font-weight-bold mb-0"><?php echo $shkurt['sum']; ?>&euro;</h5>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="text-muted">Mars</td>
                                    <td class="w-100 px-0">
                                      <div class="progress progress-md mx-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo ($mars['sum'] * 100) / $max; ?>%" aria-valuenow="<?php echo $mars['sum']; ?>" aria-valuemin="0" aria-valuemax="<?php echo $max; ?>"></div>
                                      </div>
                                    </td>
                                    <td>
                                      <h5 class="font-weight-bold mb-0"><?php echo $mars['sum']; ?>&euro;</h5>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="text-muted">Prill</td>
                                    <td class="w-100 px-0">
                                      <div class="progress progress-md mx-4">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo ($prill['sum'] * 100) / $max; ?>%" aria-valuenow="<?php echo $prill['sum']; ?>" aria-valuemin="0" aria-valuemax="<?php echo $max; ?>"></div>
                                      </div>
                                    </td>
                                    <td>
                                      <h5 class="font-weight-bold mb-0"><?php echo $prill['sum']; ?>&euro;</h5>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="text-muted">Maj</td>
                                    <td class="w-100 px-0">
                                      <div class="progress progress-md mx-4">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo ($maj['sum'] * 100) / $max; ?>%" aria-valuenow="<?php echo $maj['sum']; ?>" aria-valuemin="0" aria-valuemax="<?php echo $max; ?>"></div>
                                      </div>
                                    </td>
                                    <td>
                                      <h5 class="font-weight-bold mb-0"><?php echo $maj['sum']; ?>&euro;</h5>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="text-muted">Qershor</td>
                                    <td class="w-100 px-0">
                                      <div class="progress progress-md mx-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo ($qersho['sum'] * 100) / $max; ?>%" aria-valuenow="<?php echo $qersho['sum']; ?>" aria-valuemin="0" aria-valuemax="<?php echo $max; ?>"></div>
                                      </div>
                                    </td>
                                    <td>
                                      <h5 class="font-weight-bold mb-0"><?php echo $qersho['sum']; ?>&euro;</h5>
                                    </td>
                                  </tr>
                                </table>
                              </div>
                            </div>
                            <div class="col-md-6 mt-3">
                              <canvas id="north-america-chart"></canvas>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>






        <?php

        $api_key = "AIzaSyBrE0kFGTQJwn36FeR4NIyf4FEw2HqSSIQ";
        $apiu = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=snippet&id=UCV6ZBT0ZUfNbtZMbsy-L3CQ&key=' . $api_key);
        $apid = json_decode($apiu, true);

        $aa = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=statistics&id=UCV6ZBT0ZUfNbtZMbsy-L3CQ&key=' . $api_key);
        $aaa = json_decode($aa, true);
        ?>
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="card bg-primary border-0 position-relative">
              <div class="card-body">
                <p class="fw-bold text-white">Baresha Overview</p>
                <div id="performanceOverview" class="carousel slide performance-overview-carousel position-static pt-2" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="row">
                        <div class="col-md-4 item">
                          <div class="d-flex flex-column flex-xl-row mt-4 mt-md-0">
                            <div class="icon icon-a text-white me-3">
                              <i class="ti-cup icon-lg ms-3"></i>
                            </div>
                            <div class="content text-white">
                              <div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
                                <h3 class="font-weight-light me-2 mb-1">Abonues</h3>
                                <h3 class="mb-0"><?php echo number_format($aaa['items'][0]['statistics']['subscriberCount'], 2, '.', ','); ?></h3>
                              </div>

                              <p class="text-white font-weight-light pr-lg-2 pr-xl-5">Numri total i abonues&euml;ve
                                n&euml; kanalin <?php echo $apid['items'][0]['snippet']['title']; ?> &euml;sht&euml;
                                <?php echo number_format($aaa['items'][0]['statistics']['subscriberCount'], 2, '.', ','); ?>
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 item">
                          <div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
                            <div class="icon icon-b text-white me-3">
                              <i class="ti-bar-chart icon-lg ms-3"></i>
                            </div>
                            <div class="content text-white">
                              <div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
                                <h3 class="font-weight-light me-2 mb-1">Shikime</h3>
                                <h3 class="mb-0"><?php echo number_format($aaa['items'][0]['statistics']['viewCount'], 2, '.', ','); ?></h3>
                              </div>

                              <p class="text-white font-weight-light pr-lg-2 pr-xl-5">Numri total i shikimeve n&euml;
                                kanalin <?php echo $apid['items'][0]['snippet']['title']; ?> &euml;sht&euml; <?php echo number_format($aaa['items'][0]['statistics']['viewCount'], 2, '.', ','); ?></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 item">
                          <div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
                            <div class="icon icon-c text-white me-3">
                              <i class="ti-shopping-cart-full icon-lg ms-3"></i>
                            </div>
                            <div class="content text-white">
                              <div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
                                <h3 class="font-weight-light me-2 mb-1">Ngarkime</h3>
                                <h3 class="mb-0"><?php echo $aaa['items'][0]['statistics']['videoCount']; ?></h3>
                              </div>

                              <p class="text-white font-weight-light pr-lg-2 pr-xl-5">Numri total i ngarkimeve n&euml;
                                kanalin <?php echo $apid['items'][0]['snippet']['title']; ?> &euml;sht&euml; <?php echo $aaa['items'][0]['statistics']['videoCount']; ?></p>
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
        <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="fw-bold">Pagesat e platformave</p>
                <p class="text-muted font-weight-light">Grafiku i pagesave dhe fitimeve nga platformat</p>

                <canvas id="orderichart"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="fw-bold">Raporti i vitit</p>
                <p class="text-muted font-weight-light">Pagesat e klient&euml;ve dhe mbetja e vitit 2022</p>
                <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                <canvas id="salesreport"></canvas>
              </div>
              <div class="card border-right-0 border-left-0 border-bottom-0">
                <div class="d-flex justify-content-center justify-content-md-end">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-lg btn-outline-light dropdown-toggle rounded-0 border-top-0 border-bottom-0" type="button" id="dropdownMenuDate2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      Today
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                  <button class="btn btn-lg btn-outline-light text-primary rounded-0 border-0 d-none d-md-block" type="button"> View all </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="fw-bold mb-0">Top 20 Users with most subscribers</p>
                <div class="table-responsive">
                  <table class="table table-striped table-borderless">
                    <thead>
                      <tr>
                        <th>Artisti</th>

                        <th>Subscribers</th>
                        <th>Last Pay</th>
                        <th>Total Pay</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $most = $conn->query("SELECT * FROM klientet ORDER BY subscribers DESC LIMIT 20");
                      while ($res = mysqli_fetch_array($most)) {
                        $kengtaid = $res['id'];
                        $merrpagesenefundit = $conn->query("SELECT * FROM fatura WHERE emri='$kengtaid' ORDER BY id DESC");
                        $mpf = mysqli_fetch_array($merrpagesenefundit);
                        $mft = $mpf['fatura'];
                        $lastpay1 = $conn->query("SELECT SUM(shuma) AS sumc FROM pagesat WHERE fatura='$mft'");
                        $lastpay = mysqli_fetch_array($lastpay1);
                        $sqlja = $conn->query("SELECT * FROM fatura WHERE emri='$kengtaid'");
                        while ($sqlja2 = mysqli_fetch_array($sqlja)) {
                          $fatli = $sqlja2['fatura'];

                          $getsum = $conn->query("SELECT SUM(klientit) as total FROM shitje WHERE fatura='$fatli'");

                          $rowit = mysqli_fetch_array($getsum);

                          $totalii += $rowit['total'];
                        }
                        if (empty($totalii)) {
                          $totalii += "0.00";
                        }

                      ?>
                        <tr>
                          <td><b><?php echo $res['emri']; ?></b></td>

                          <td><b><?php echo $res['subscribers']; ?></b></td>
                          <td><b><?php echo $lastpay['sumc']; ?>&euro;</b></td>
                          <td><b><?php echo $totalii; ?>&euro;</b></td>
                        </tr>
                      <?php
                      }
                      ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-5 grid-margin stretch-card mt-5">
            <div class="card">
              <div class="card-body">
                <h4 class="fw-bold">To Do Lists</h4>
                <div class="list-wrapper pt-2">
                  <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                    <li>
                      <div class="form-check form-check-flat">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox">
                          Meeting with Urban Team
                        </label>
                      </div>
                      <i class="remove ti-close"></i>
                    </li>
                    <li class="completed">
                      <div class="form-check form-check-flat">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox" checked>
                          Duplicate a project for new customer
                        </label>
                      </div>
                      <i class="remove ti-close"></i>
                    </li>
                    <li>
                      <div class="form-check form-check-flat">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox">
                          Project meeting with CEO
                        </label>
                      </div>
                      <i class="remove ti-close"></i>
                    </li>
                    <li class="completed">
                      <div class="form-check form-check-flat">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox" checked>
                          Follow up of team zilla
                        </label>
                      </div>
                      <i class="remove ti-close"></i>
                    </li>
                    <li>
                      <div class="form-check form-check-flat">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox">
                          Level up for Antony
                        </label>
                      </div>
                      <i class="remove ti-close"></i>
                    </li>
                  </ul>
                </div>
                <div class="add-items d-flex mb-0 mt-2">
                  <input type="text" class="form-control todo-list-input" placeholder="Add new task">
                  <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="ti-location-arrow"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
            <div class="card">
              <div class="card-body">
                <p class="fw-bold mb-0">Ngarkimet n&euml; Baresha</p>
                <div class="table-responsive">
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th class="ps-0 border-bottom">K&euml;nga</th>
                        <th class="border-bottom">Platforma</th>
                        <th class="border-bottom">Data</th>
                      </tr>

                    </thead>
                    <tbody>
                      <?php
                      $kueri = $conn->query("SELECT * FROM ngarkimi WHERE klienti='197' ORDER BY id DESC LIMIT 7");
                      while ($row = mysqli_fetch_array($kueri)) {
                      ?>
                        <tr>
                          <td class="text-muted ps-0"><?php echo $row['emri']; ?></td>
                          <td class="text-muted"> <?php echo $row['platforma']; ?></td>
                          <td class="text-muted"><?php echo $row['data']; ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 stretch-card">
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="fw-bold">Charts</p>
                    <div class="charts-data">
                      <div class="mt-3">
                        <p class="text-muted mb-0">Orders</p>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="progress progress-md flex-grow-1 me-4">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <p class="text-muted mb-0">5k</p>
                        </div>
                      </div>
                      <div class="mt-3">
                        <p class="text-muted mb-0">Users</p>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="progress progress-md flex-grow-1 me-4">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <p class="text-muted mb-0">3k</p>
                        </div>
                      </div>
                      <div class="mt-3">
                        <p class="text-muted mb-0">Downloads</p>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="progress progress-md flex-grow-1 me-4">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <p class="text-muted mb-0">992</p>
                        </div>
                      </div>
                      <div class="mt-3">
                        <p class="text-muted mb-0">Visitors</p>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="progress progress-md flex-grow-1 me-4">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <p class="text-muted mb-0">687</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                <div class="card data-icon-card-primary">
                  <div class="card-body">
                    <p class="fw-bold text-white text-lowercase">Numri i takim&euml;ve</p>
                    <div class="row">
                      <div class="col-8 text-white">
                        <h3><?php echo $takimet2; ?></h3>
                        <p class="text-white font-weight-light mb-0">Numri total i takimeve t&euml; mbajtura dhe takimet
                          n&euml; proces</p>
                      </div>
                      <div class="col-4 background-icon">
                        <i class="ti-calendar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="fw-bold">Logs</p>
                <ul class="icon-data-list">
                  <?php

                  $merri = $conn->query("SELECT * FROM logs ORDER BY id DESC LIMIT 5");
                  while ($k = mysqli_fetch_array($merri)) {
                  ?>
                    <li>
                      <p class="text-primary mb-1"><?php echo $k['stafi']; ?></p>
                      <p class="text-muted"><?php echo $k['ndryshimi']; ?></p>
                      <small class="text-muted"><?php echo $k['koha']; ?></small>
                    </li>

                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php


$v2021 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2021-01-01' AND data <= '2021-12-31'");
$v21 = mysqli_fetch_array($v2021);
$v2022 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-01-01' AND data <= '2022-12-31'");
$v22 = mysqli_fetch_array($v2022);
?>
<script>
  let test = ["Janar", "Shkurt", "Mars", "Prill", "Maj", "Qershor", "Korrik", "Gusht", "Shtator", "Tetor", "Nentor", "Dhjetor"];
  let datatm = [<?php echo $janar['sum']; ?>, <?php echo $shkurt['sum']; ?>, <?php echo $mars['sum']; ?>, <?php echo $prill['sum']; ?>, <?php echo $maj['sum']; ?>, <?php echo $qersho['sum']; ?>, <?php echo $korrik['sum']; ?>];
  let canvass = document.getElementById("salesreport");
  let thirdChart = new Chart(canvass, {
    type: "bar",
    data: {
      labels: test,
      datasets: [{
          label: "Pagesa Klienteve",
          data: datatm,
          backgroundColor: '#ffc100',
          borderColor: '#ffc100'
        },
        {
          label: 'Mbetja',
          data: [<?php echo $janarm['sum']; ?>, <?php echo $shkurtm['sum']; ?>, <?php echo $marsm['sum']; ?>, <?php echo $prillm['sum']; ?>, <?php echo $majm['sum']; ?>, <?php echo $qershor['sum']; ?>, <?php echo $korrikm['sum']; ?>],
          backgroundColor: '#f5a623'
        }
      ]

    },
    options: {
      plugins: {
        legend: {
          title: {
            display: true,
            text: "Pagesat e klienteve dhe mbetja"
          }
        }
      }
    }
  });
</script>
<script>
  let canvasss = document.getElementById("orderichart");
  let threeChart = new Chart(canvasss, {
    type: "line",
    data: {
      labels: test,
      datasets: [{
          label: "Pagesa Klienteve",
          data: datatm,
          backgroundColor: '#ff0000',
          borderColor: '#ff0000'
        },
        {
          label: 'Mbetja',
          data: [<?php echo $janarm['sum']; ?>, <?php echo $shkurtm['sum']; ?>, <?php echo $marsm['sum']; ?>, <?php echo $prillm['sum']; ?>],
          backgroundColor: '#000000'
        }
      ]

    },
    options: {
      plugins: {
        legend: {
          title: {
            display: true,
            text: "Grafiku i pagesave dhe fitimeve nga platformat"
          }
        }
      }
    }
  });
</script>


<script>
  let coins = ["2021", "2022"];
  let marketCap = [<?php echo $v21['sum']; ?>, <?php echo $v22['sum']; ?>];
  let canvas = document.getElementById("north-america-chart");
  let firstChart = new Chart(canvas, {
    type: "doughnut",
    data: {
      labels: coins,
      datasets: [{
        label: "Coin",
        data: marketCap,
        backgroundColor: ["#fc0303", "#347deb"],
        borderColor: ["#fc0303", "#347deb"]
      }]
    },
    options: {
      plugins: {
        legend: {
          title: {
            display: true,
            text: "Fitimet e vitit 2021 - 2022"
          }
        }
      }
    }
  });
</script>