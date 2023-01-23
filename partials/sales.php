<?php
$d = strtotime("-1 Months");
$gdata = date("Y-m-d", $d);
$dataAktuale = date("Y-m-d  ");
$takimet = $conn->query("SELECT * FROM takimet");
$takimet2 = mysqli_num_rows($takimet);
$tm = $conn->query("SELECT * FROM takimet WHERE statusi='1'");
$tm2 = mysqli_num_rows($tm);
$tp = $conn->query("SELECT * FROM takimet WHERE statusi='0'");
$tp2 = mysqli_num_rows($tp);
$sum5 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '$gdata' AND data <= '$dataAktuale'");
$summ5 = mysqli_fetch_array($sum5);
$sum6 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '$gdata' AND data <= '$dataAktuale'");
$summ6 = mysqli_fetch_array($sum6);

$sum7 = $conn->query("SELECT SUM(shuma) AS sum FROM rrogat WHERE data >= '$gdata' AND data <= '$dataAktuale'");
$summ7 = mysqli_fetch_array($sum7);
$sum8 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje2 WHERE data >= '$gdata' AND data <= '$dataAktuale'");
$summ8 = mysqli_fetch_array($sum8);
$sum9 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje2 WHERE data >= '$gdata' AND data <= '$dataAktuale'");
$summ9 = mysqli_fetch_array($sum9);





$january = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-02-01' AND data <= '2022-02-28'");
$janar = mysqli_fetch_array($january);
$januarym = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-02-01' AND data <= '2022-02-28'");
$janarm = mysqli_fetch_array($januarym);

$february = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-03-01' AND data <= '2022-03-31'");
$shkurt = mysqli_fetch_array($february);
$februarym = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-03-01' AND data <= '2022-03-31'");
$shkurtm = mysqli_fetch_array($februarym);


$march = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-04-01' AND data <= '2022-04-30'");
$mars = mysqli_fetch_array($march);
$marchm = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-04-01' AND data <= '2022-04-30'");
$marsm = mysqli_fetch_array($marchm);

$april = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-05-01' AND data <= '2022-05-31'");
$prill = mysqli_fetch_array($april);
$aprilm = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-05-01' AND data <= '2022-05-31'");
$prillm = mysqli_fetch_array($aprilm);

$may = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-06-01' AND data <= '2022-06-30'");
$maj = mysqli_fetch_array($may);
$maym = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-06-01' AND data <= '2022-06-30'");
$majm = mysqli_fetch_array($maym);

$qersh = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-07-01' AND data <= '2022-07-30'");
$qersho = mysqli_fetch_array($qersh);
$qershm = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-07-01' AND data <= '2022-07-30'");
$qershor = mysqli_fetch_array($qershm);

$korr = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-08-01' AND data <= '2022-08-31'");
$korrik = mysqli_fetch_array($korr);
$korri = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-08-01' AND data <= '2022-08-31'");
$korrikm = mysqli_fetch_array($korri);


?>