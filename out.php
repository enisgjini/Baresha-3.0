<?php
session_start();
unset($_SESSION["uid"]);
unset($_SESSION["emri"]);
unset($_SESSION["acc"]);
unset($_SESSION["checked"]);
header("Location:kycu_1.php");
?>