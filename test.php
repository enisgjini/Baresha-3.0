<?php
include 'conn-d.php';
$m1 = $conn->query("SELECT * FROM fatura");
while($row = mysqli_fetch_array($m1)){
	$cid = $row['emri'];
	$m2 = $conn->query("SELECT * FROM klientet WHERE id='$cid'");
	$m3 = mysqli_fetch_array($m2);
	$emri = $m3['emri'];
	if($conn->query("UPDATE fatura SET emrifull='$emri' WHERE emri='$cid'")){
		echo $emri;
	}
}
?>