<?php
include 'conn-d.php';
$fatura = $_GET['fatura'];
$ida = $_GET['fshij'];
  if($conn->query("DELETE FROM shitje WHERE fatura='$fatura' AND id='$ida'")){
      
      header("Location: shitje.php?fatura=".$fatura);
  }else{
    echo $conn->error;
  }

?>