<?php
//fetch.php
include '../conn-d.php';
$columns = array('emri', 'emriart', 'fatura', 'data', 'shuma', 'shpag', 'obligim');
$query = "SELECT * FROM fatura ";
if (isset($_POST["search"]["value"])) {
    $query .= '
 WHERE emrifull LIKE "%' . $_POST["search"]["value"] . '%" 
 OR data LIKE "%' . $_POST["search"]["value"] . '%" 
 ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
} else {
    $query .= 'ORDER BY id DESC ';
}
$query1 = '';

if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));

$result = mysqli_query($conn, $query . $query1);

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $dda = $row['data'];
    $date = date_create($dda);
    $dats = date_format($date, 'Y-m-d');
    $sid = $row['fatura'];
    $q4 = $conn->query("SELECT SUM(`totali`) as `sum` FROM `shitje` WHERE fatura='$sid'");
    $qq4 = mysqli_fetch_array($q4);


    $merrpagesen = $conn->query("SELECT SUM(`shuma`) as `sum` FROM `pagesat` WHERE fatura='$sid'");
    $merrep = mysqli_fetch_array($merrpagesen);


    $klientiid = $row['emri'];
    $queryy = "SELECT * FROM klientet WHERE id=" . $klientiid . " ";

    $mkl = $conn->query($queryy);
    $k4 = mysqli_fetch_array($mkl);
    $obli =  $qq4['sum'] - $merrep['sum'];
    if ($qq4['sum'] > $merrep['sum']) {
        $pagesaaa = '<b style="color:red;">' . $row["emrifull"] . '</b>';
    } else {
        $pagesaaa = '<b style="color:green;">' . $row["emrifull"] . '</b>';
    }
    $sub_array = array();
    $sub_array[] = $pagesaaa;
    $sub_array[] = $k4["emriart"];
    $sub_array[] = $row["fatura"];
    $sub_array[] = $dats;
    $sub_array[] = $qq4["sum"];
    $sub_array[] = $merrep['sum'];
    $sub_array[] = $obli;
    $sub_array[] = '<a class="btn btn-primary btn-sm py-2" href="shitje.php?fatura=' . $sid . '" target="_blank"><i class="fi fi-rr-edit"></i></a>
                                                 <a class="btn btn-success btn-sm py-2" target="_blank" href="fatura.php?invoice=' . $sid . '"><i class="fi fi-rr-print"></i></a> 
                                                 <a type="button" name="delete" class="btn btn-danger btn-xs delete py-2" id="' . $sid . '"><i class="fi fi-rr-trash"></i></a> ';

    $data[] = $sub_array;
}
function get_all_data($conn)
{
    $query = "SELECT * FROM fatura";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result);
}

$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  get_all_data($conn),
    "recordsFiltered" => $number_filter_row,
    "data"    => $data
);

echo json_encode($output);
