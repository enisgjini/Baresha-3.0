<?php include 'partials/header.php';
if (isset($_GET['import'])) {
    $linkuof = $_GET['import'];
    $cjson = file_get_contents('https://bareshamusic.sourceaudio.com/api/import/upload?token=6636-66f549fbe813b2087a8748f2b8243dbc&url=http://login.bareshaoffice.com/' . $linkuof);

    $cdata = json_decode($cjson, true);
    if ($cdata['error'] == true) {
        echo '<script>alert("' . $cdata['error'] . '");</script>';
    } else {
        echo '<script>alert("' . $cdata['status'] . '");</script>';
    }
}
if (isset($_GET['del'])) {
    $did = mysqli_real_escape_string($conn, $_GET['del']);
    if ($conn->query("DELETE FROM ngarkimi WHERE id='$did'")) {
        echo '<script>alert("Eshte fshir me sukses")</script>';
    } else {
        echo ("Pershkrimi i gabimit: " . $conn->error);
    }
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="container">

                <div class="p-5 bg-light mb-4 card">
                    <h4 class="font-weight-bold text-gray-800 mb-4">Lista e kengëve</h4> <!-- Breadcrumb -->
                    <nav class="d-flex">
                        <h6 class="mb-0">
                            <a href="" class="text-reset">Video - Ngarkimi</a>
                            <span>/</span>
                            <a href="klient.php" class="text-reset" data-bs-placement="top" data-bs-toggle="tooltip" title="<?php echo __FILE__; ?>"><u>Lista e kengëve</u></a>
                        </h6>
                    </nav>
                    <!-- Breadcrumb -->
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="example" class="table w-100">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>K&euml;ng&euml;tari</th>
                                                <th>Emri</th>
                                                <th>T.Shkruesi</th>
                                                <th>Muzika</th>
                                                <th>Orkesetra</th>
                                                <th>C/O</th>
                                                <th>FB</th>
                                                <th>IG</th>
                                                <th>Veper nga Koha</th>
                                                <th>Klienti</th>
                                                <th>Platformat Tjera</th>
                                                <th style="color:green;">Linku</th>
                                                <th style="color:green;">Linku Plat.</th>
                                                <th>Data</th>
                                                <th>Gjuha</th>
                                                <th>Info Shtes</th>
                                                <th>Postuar Nga</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_GET['id'])) {
                                                $kid = $_GET['id'];
                                                $kueri = $conn->query("SELECT * FROM ngarkimi WHERE klienti='$kid' ORDER BY id DESC");
                                            } else {
                                                $kueri = $conn->query("SELECT * FROM ngarkimi ORDER BY id DESC");
                                            }
                                            while ($k = mysqli_fetch_array($kueri)) {
                                                $klientid = $k['klienti'];
                                                $postuarng = $k['nga'];
                                                $kueri2 = $conn->query("SELECT * FROM klientet WHERE id='$klientid'");
                                                $k2 = mysqli_fetch_array($kueri2);
                                                $kueri3 = $conn->query("SELECT * FROM users WHERE id='$postuarng'");
                                                $k3 = mysqli_fetch_array($kueri3);
                                            ?>
                                                <tr>
                                                    <td><a href="?del=<?php echo $k['id']; ?>"><i class="ti-trash" onclick="return confirm('A jeni i sigurt qe deshironi ta fshini?');" style="color:red; text-decoration: none;"></i></a> &nbsp;<?php echo $k['kengetari']; ?></td>
                                                    <td><?php echo $k['emri']; ?></td>
                                                    <td><?php echo $k['teksti']; ?></td>
                                                    <td><?php echo $k['muzika']; ?></td>

                                                    <td> <?php echo $k['orkestra']; ?></td>
                                                    <td><?php echo $k['co']; ?></td>
                                                    <td><?php echo $k['facebook']; ?></td>
                                                    <td><?php echo $k['instagram']; ?></td>
                                                    <td><?php echo $k['veper']; ?></td>
                                                    <td><?php echo $k2['emri']; ?></td>

                                                    <td>
                                                        <?php echo $k['platformat']; ?>

                                                    </td>

                                                    <td><a href="<?php echo $k['linku']; ?>" target="_blank">Hap Linkun</a></td>
                                                    <td><a href="<?php echo $k['linkuplat']; ?>" target="_blank">Hap Linkun</a></td>
                                                    <td><?php echo $k['data']; ?></td>
                                                    <td><?php echo $k['gjuha']; ?></td>
                                                    <td><?php echo $k['infosh']; ?></td>
                                                    <td><?php echo $k3['name']; ?></td>
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
<!-- <script src="js/tooltips.js"></script>
<script src="js/popover.js"></script> -->

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
            text: '<i class="fi fi-rr-user-add fa-lg"></i>&nbsp;&nbsp; Shto klientë',
            className: 'btn btn-light border shadow-2 me-2',
            action: function(e, node, config) {
                window.location.href = 'shtok.php';
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
        stripeClasses: ['stripe-color'],
        deferRender: true
    })
</script>