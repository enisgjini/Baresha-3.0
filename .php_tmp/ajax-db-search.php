<?php
require_once "conn-d.php";
if (isset($_GET['term'])) {
     
   $query = "SELECT * FROM ngarkimi WHERE kengetari LIKE '{$_GET['term']}%' GROUP BY kengetari";
    $result = mysqli_query($conn, $query);
 
    if (mysqli_num_rows($result) > 0) {
     while ($user = mysqli_fetch_array($result)) {
      $res[] = $user['kengetari'];
     }
    } else {
      $res = array();
    }
    //return json res
    echo json_encode($res);
}
