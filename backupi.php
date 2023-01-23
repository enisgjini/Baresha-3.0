<?php

include 'conn-d.php';
 
 $tables = array();

$result = mysqli_query($conn,"SHOW TABLES");
while ($row = mysqli_fetch_row($result)) {
    $tables[] = $row[0];
}

$return = '';

foreach ($tables as $table) {
    $result = mysqli_query($conn, "SELECT * FROM ".$table);
    $num_fields = mysqli_num_fields($result);

    $row2 = mysqli_fetch_row(mysqli_query($conn, 'SHOW CREATE TABLE '.$table));
    $return .= "\n\n".$row2[1].";\n\n";

    for ($i=0; $i < $num_fields; $i++) { 
        while ($row = mysqli_fetch_row($result)) {
            $return .= 'INSERT INTO '.$table.' VALUES(';
            for ($j=0; $j < $num_fields; $j++) { 
                $row[$j] = addslashes($row[$j]);
                if (isset($row[$j])) {
                    $return .= '"'.$row[$j].'"';} else { $return .= '""';}
                    if($j<$num_fields-1){ $return .= ','; }
                }
                $return .= ");\n";
            }
        }
        $return .= "\n\n\n";
    
}

$nami = "backups/".date("d-m-Y").".sql";
if (file_exists($nami)) {
   
} else {
   $handle = fopen($nami, 'w+');
fwrite($handle, $return);
fclose($handle);
$guse = $conn->query("SELECT * FROM klientet");
while($guse2 = mysqli_fetch_array($guse)){

        $channel_id = $guse2['youtube'];
        $ajdiaklient = $guse2['id'];
$api_key = "AIzaSyBrE0kFGTQJwn36FeR4NIyf4FEw2HqSSIQ";

$aa = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$channel_id.'&key='.$api_key);
$aaa = json_decode($aa, true); 
$subnum = $aaa['items'][0]['statistics']['subscriberCount'];
if($conn->query("UPDATE klientet SET subscribers='$subnum' WHERE id='$ajdiaklient'")){
    
}
}
echo '<script>alert("Backup u ruajt & Subscribers jan perditsuar")</script>';
}




?>