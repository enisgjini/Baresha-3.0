<?php
  // check if the data is available
  if (isset($_POST['data'])) {
    // decode the json data
    $data = json_decode($_POST['data'], true);
    echo "<table>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Age</th>";
    echo "<th>Gender</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>".$data[0]."</td>";
    echo "<td>".$data[1]."</td>";
    echo "<td>".$data[2]."</td>";
    echo "</tr>";
    echo "</table>";
  } else {
    echo "No data received.";
  }
?>
