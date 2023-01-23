<?php
include 'partials/header.php';
if ($_SESSION['acc'] == '1') {
    include 'akseset/kryesor.php';
} else {

    include 'akseset/staff.php';
}
include 'partials/footer.php';
