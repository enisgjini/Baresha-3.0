<?php // Check if GET id is set
if (isset($_GET['id'])) {
    $kid = $_GET['id'];
    $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
    $limit = 10;
    $offset = ($page - 1) * $limit;
    $kueri = $conn->query("SELECT * FROM ngarkimi WHERE klienti='$kid' ORDER BY id DESC LIMIT $offset, $limit");
} else {
    $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
    $limit = 10;
    $offset = ($page - 1) * $limit;
    $kueri = $conn->query("SELECT * FROM ngarkimi ORDER BY id DESC LIMIT $offset, $limit");
}

$data = array();
while ($k = mysqli_fetch_array($kueri)) {
    $data[] = $k;
}

echo json_encode($data);
?>