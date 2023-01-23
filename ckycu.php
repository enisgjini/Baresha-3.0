<?php
session_start();
unset($_SESSION["uid"]);
unset($_SESSION["uname"]);
header("Location:kycu_1.php");
