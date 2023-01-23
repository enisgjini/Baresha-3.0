<?php
$search = $_POST['search'];
// code to connect to the database
$query = "SELECT * FROM table_name WHERE Artist LIKE '%$search%' ";
$result = mysqli_query($conn, $query);
$data = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row['artistii'];
    }
}
echo json_encode($data);
?>
