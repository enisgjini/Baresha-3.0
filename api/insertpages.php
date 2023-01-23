<?php
include '../conn-d.php';
if(isset($_POST['btn_save']))
{
	 $fatura = $_POST['fatura'];
  $shuma = $_POST['shuma'];
  $data = $_POST['data'];
  $menyra = $_POST['menyra'];
  $pershkrimi = $_POST['pershkrimi'];
  if($conn->query("INSERT INTO pagesat (fatura, shuma, menyra, data, pershkrimi) VALUES ('$fatura', '$shuma', '$menyra', '$data', '$pershkrimi')")){
  	echo 'Pagesa e faturës '.$fatura.' u ruajt me suksesë';
  }else{
  	echo "Pagesa dështoj";
  }
}
?>