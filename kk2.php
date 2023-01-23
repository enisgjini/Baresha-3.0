<?php
session_start();
require_once 'googleLib/GoogleAuthenticator.php';
$secret = $_SESSION['secret'];
$user     = $_SESSION['email'];
$g = new GoogleAuthenticator();
echo $g->getCode($secret, $code);

?>
<title><?php echo $g->getCode($secret, $code); ?></title>