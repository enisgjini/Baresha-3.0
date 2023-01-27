<?php include 'shtesStaf.php'; ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="container">
        <div class="p-5 bg-light mb-4 card">
          <h4 class="font-weight-bold text-gray-800 mb-4">Lista e stafi-it</h4> <!-- Breadcrumb -->
          <nav class="d-flex">
            <h6 class="mb-0">
              <a href="stafi.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Stafi</u></a>
            </h6>
          </nav>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="perdoruesiPopUp" tabindex="-1" aria-labelledby="perdoruesiPopUpLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="perdoruesiPopUpLabel">Shto një përdorues të ri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="emri">Emri dhe Mbiemri</label>
                    <input type="text" name="emri" class="form-control" placeholder="Shëno Emrin Mbiemrin">
                  </div>
                  <div class="form-group">
                    <label for="nr">Nr. i telefonit</label>
                    <input type="text" name="nr" class="form-control" placeholder="Shëno numrin e telefonit">
                  </div>
                  <div class="form-group">

                    <label for="email">Adresa e email-it</label>
                    <input type="text" name="email" class="form-control" placeholder="Shëno email adresen">
                  </div>
                  <div class="form-group">
                    <label for="password">Fjal&euml;kalimi</label>
                    <input type="password" name="password" class="form-control" placeholder="Shëno fjalkalimin">
                  </div>
                  <div class="form-group">
                    <label for="user">P&euml;rdoruesi</label>
                    <input type="text" name="user" class="form-control" placeholder="Shëno p&euml;rdoruesin">
                  </div>
                  <div class="form-group">
                    <label for="user">Banka</label>
                    <input type="text" name="banka" class="form-control" placeholder="Banka">
                  </div>
                  <div class="form-group">
                    <label for="user">Llogaria</label>
                    <input type="text" name="llogaria" class="form-control" placeholder="Llogaria e bank&euml;s">
                  </div>
                  <div class="form-group">

                    <label for="adresa">Adresa</label>
                    <input type="text" name="adresa" class="form-control" placeholder="Shëno adresen e bendbanimit">
                  </div>
                  <div class="form-group">
                    <label for="acc">Pozita</label>
                    <select name="acc" class="js-example-basic-single w-100">
                      <option value="2">Staff</option>
                      <option value="3">Financa</option>
                      <option value="1">Menagjer</option>
                    </select>
                  </div>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mbylle</button>
                <input type="submit" class="btn btn-primary" name="register" value="Ruaj">
                </form>
              </div>
            </div>
          </div>
        </div>


        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Logs</h4>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table id="example" class="table table-hover table-light border w-100" style="width:100%">
                    <thead>
                      <tr>

                        <th>Emri dhe Mbiemri</th>
                        <th>Adresa</th>
                        <th>Nr. i telefonit</th>
                        <th>Adresa e email-it</th>
                        <th>P&euml;rdoruesi</th>
                        <th>Autentifikuesi</th>
                        <th>Llogaria e bank&euml;s</th>
                        <div class="modal fade" id="create_new_workorder">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              dfs </div>
                          </div>
                        </div>
                        <th></th>
                      </tr>
                    </thead>
                    <!-- <tfoot>
                      <tr>
                        <th>Emri & Mbiemri</th>
                        <th>Adresa</th>
                        <th>Nr.TEL</th>
                        <th>Email Adresa</th>
                        <th>P&euml;rdoruesi</th>

                        <th>Authenticator</th>
                        <th>Llogaria e bank&euml;s</th>
                        <th></th>
                      </tr>
                    </tfoot> -->
                    <tbody>
                      <?php
                      $kueri = $conn->query("SELECT * FROM users ORDER BY id DESC");
                      while ($k = mysqli_fetch_array($kueri)) {
                        if (empty($k['ban'])) {
                          $eme = $k['name'];
                        } else {
                          $eme = '<del style="color:red;">' . $k['name'] . '</del> ';
                        }
                      ?>
                        <tr>

                          <td><?php echo $eme; ?></td>
                          <td><?php echo $k['adresa']; ?></td>
                          <td><?php echo $k['tel']; ?></td>
                          <td><?php echo $k['email']; ?></td>
                          <td><?php echo $k['perdoruesi']; ?></td>
                          <td>
                            <button type="button" class="btn btn-primary shadow-0" data-bs-toggle="modal" data-bs-target="#kodi<?php echo $k['id']; ?>"><i class="ti-unlock"></i> Shfaq

                            </button>
                          </td>
                          <td><?php echo $k['emrib'] . ": " . $k['llogariab']; ?></td>




                          <td><a href="?del=<?php echo $k['id']; ?>"><i class="ti-trash" style="color:red;"></i></a>
                            &nbsp;
                            <a data-bs-toggle="modal" data-bs-target="#edit<?php echo $k['id']; ?>"><i class="ti-pencil-alt menu-icon"></i></a> &nbsp;
                          </td>
                          </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="kodi<?php echo $k['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="perdoruesiPopUpLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">


                              <div class="modal-header">
                                <h5 class="modal-title">Te dhenat e nevojshme per autentifikim</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>

                              <div class="modal-body">
                                <div class="alert alert-light border shadow-2 " role="alert">
                                  Emri dhe Mbiemri : <?php echo $k['name']; ?>
                                </div>

                                <div class="alert alert-light border shadow-2 text-dark" role="alert">
                                  Kodi i sigurisë (kyqjes): <code><?php echo $k['google_auth_code']; ?></code>
                                </div>


                                <?php
                                $secreti = $k['google_auth_code'];
                                $userik = $k['email'];
                                $linkui = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=otpauth://totp/BareshaOffice (' . $userik . ')?secret=' . $secreti . '&issuer=BareshaOffice';


                                ?>
                                <hr>
                                <center><img src="<?php echo $linkui; ?>"></center>
                              </div>

                            </div>
                          </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="edit<?php echo $k['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="perdoruesiPopUpLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="perdoruesiPopUpLabel">Ndrysho Stafin</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="POST" action="" enctype="multipart/form-data">
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <input type="hidden" name="id" value="<?php echo $k['id']; ?>">
                                      <label for="emri">Emri dhe Mbiemri</label>
                                      <input type="text" name="emri" class="form-control" placeholder="Shëno Emrin Mbiemrin" value="<?php echo $k['name']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="tel">NR.Tel </label><br>
                                      <input type="text" name="nr" class="form-control" placeholder="Shëno numrin e telefonit" value="<?php echo $k['tel']; ?>">

                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="dks">Email adresa</label>
                                      <input type="text" name="email" class="form-control" placeholder="Shëno email adresen" value="<?php echo $k['email']; ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                      <label for="yt">P&euml;rdoruesi</label>
                                      <input type="text" name="user" class="form-control" placeholder="Shëno p&euml;rdoruesin" value="<?php echo $k['perdoruesi']; ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                      <label for="dk">Adresa</label>
                                      <input type="text" name="adresa" class="form-control" placeholder="Shëno adresen e bendbanimit" value="<?php echo $k['adresa']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="dk">Banka</label>
                                      <input type="text" name="banka" class="form-control" placeholder="Banka" value="<?php echo $k['emrib']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="dk">Llogaria</label>
                                      <input type="text" name="llogariab" class="form-control" placeholder="Llogaria e bank&euml;s" value="<?php echo $k['llogariab']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="dk">Pozita</label>
                                      <select name="acc" class="form-control">
                                        <?php
                                        if ($k['aksesi'] == '2') {
                                        ?>
                                          <option value="2" selected="selected">Staff</option>
                                          <option value="3">Financa</option>
                                          <option value="1">Menagjer</option>
                                        <?php } elseif ($k['aksesi'] == '3') {

                                        ?>
                                          <option value="2">Staff</option>
                                          <option value="3" selected="selected">Financa</option>
                                          <option value="1">Menagjer</option>
                                        <?php
                                        } else { ?>
                                          <option value="2">Staff</option>
                                          <option value="3">Financa</option>
                                          <option value="1" selected="selected">Menagjer</option>
                                        <?php
                                        }
                                        ?>
                                      </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label><i class="fas fa-ban"></i> Disable</label>
                                      <select name="ban" class="form-control">
                                        <option value="1"><i class="fas fa-ban"></i> Disable</option>
                                        <option value="0" selected="">Active</option>
                                      </select>
                                    </div>


                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mbylle</button>
                                <input type="submit" class="btn btn-primary" name="update" value="Ruaj">
                                </form>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                        </div>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>

    </div>
    <!-- <button data-bs-toggle="modal" data-bs-target="#create_new_workorder" type="button" class="btn btn-sm btn-warning btn-outline"><span class="hidden-md hidden-sm hidden-xs">Create Workorder</span> <i class="fa fa-fw fa-plus"></i>
    </button> -->

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
      text: '<i class="fi fi-rr-user-add fa-lg"></i>&nbsp;&nbsp; Shto përdorues',
      className: 'btn btn-light border shadow-2 me-2',
      action: function(e, node, config) {
        $('#perdoruesiPopUp').modal('show')
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

  })
</script>