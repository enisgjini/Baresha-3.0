<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $data = $_GET['data']; ?> </title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
</head>

<body>

    <div class="card">
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;font-size: 20px; " class="border border-1 shadow-2 w-25 px-2 rounded">Invoice >> <strong>ID: #123-123</strong></p>
                    </div>
                    <div class="col-xl-3 float-end">
                        <button class="btn btn-light text-capitalize border border-1 shadow-2" data-mdb-ripple-color="dark" id="printBtn" onclick="printData()"><i class="fas fa-print text-primary "></i> Print</button>
                        <a class="btn btn-light text-capitalize border border-1 shadow-2" data-mdb-ripple-color="dark"><i class="far fa-file-pdf text-danger"></i> Export</a>
                    </div>
                    <hr>
                </div>

                <div class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                            <p class="pt-0">MDBootstrap.com</p>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted">To: <span style="color:#5d9fc5 ;">John Lorem</span></li>
                                <li class="text-muted">Street, City</li>
                                <li class="text-muted">State, Country</li>
                                <li class="text-muted"><i class="fas fa-phone"></i> 123-456-789</li>
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <p class="text-muted">Invoice</p>
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="fw-bold">ID:</span>#123-456</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="fw-bold">Creation Date: </span>Jun 23,2021</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                                        Unpaid</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row my-2 mx-1 justify-content-center">
                            <?php
                            error_reporting(E_ERROR | E_PARSE);

                            $data = $_GET['data'];
                            echo "<table id='printTable' class='table table-striped table-borderless'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Column 1</th>";
                            echo "<th>Column 2</th>";
                            echo "<th>Column 3</th>";
                            echo "<th>Column 3</th>";
                            echo "<th>Column 3</th>";
                            echo "<th>Column 3</th>";
                            echo "<th>Column 3</th>";
                            echo "<th>Column 3</th>";
                            echo "<th>Column 3</th>";
                            echo "<th>Column 3</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            $jsonData = $_GET['data'];
                            $data = json_decode($jsonData, true);
                            foreach ($data as $row) {
                                echo "<tr>";
                                // Use loop to iterate through the keys of the data
                                foreach ($row as $key => $value) {
                                    echo "<td>" . $value . "</td>";
                                }
                                echo "</tr>";
                            }


                            echo "</tbody>";
                            echo "</table>";
                            echo '<button id="printBtn" onclick="printData()">Print</button>';
                            ?>

                       
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <p class="ms-3">Add additional notes and payment information</p>

                        </div>
                        <div class="col-xl-3">
                            <ul class="list-unstyled">
                                <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>$1110</li>
                                <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Tax(15%)</span>$111</li>
                            </ul>
                            <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span style="font-size: 25px;">$1221</span></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-10">
                            <p>Thank you for your purchase</p>
                        </div>
                        <div class="col-xl-2">
                            <button type="button" class="btn btn-primary text-capitalize" style="background-color:#60bdf3 ;">Pay Now</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script>
        function printData() {
            var printBtn = document.getElementById("printBtn");
            printBtn.style.visibility = 'hidden';
            window.print();
            printBtn.style.visibility = 'visible';
        }
    </script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
</body>

</html>