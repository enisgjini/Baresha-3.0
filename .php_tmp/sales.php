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





$janarShitje = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-01-01' AND data <= '2022-01-31'");
$janarRezultatiShitjeve = mysqli_fetch_array($janarShitje);
$janarMbetje = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-01-01' AND data <= '2022-01-31'");
$janarRezultatiMbetjes = mysqli_fetch_array($janarMbetje);



$shkurtShitje = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-02-01' AND data <= '2022-02-28'");
$shkurtRezultatiShitjeve = mysqli_fetch_array($shkurtShitje);
$shkurtMbetje = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-02-01' AND data <= '2022-02-28'");
$shkurtRezultatiMbetjes = mysqli_fetch_array($shkurtMbetje);

$marsShitje = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-03-01' AND data <= '2022-03-31'");
$marsRezultatiShitjeve = mysqli_fetch_array($marsShitje);
$marsMbetje = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-03-01' AND data <= '2022-03-31'");
$marsRezultatiMbetjes = mysqli_fetch_array($marsMbetje);

$prillShitje = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-04-01' AND data <= '2022-04-30'");
$prillRezultatiShitjeve = mysqli_fetch_array($prillShitje);
$prillMbetje = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-04-01' AND data <= '2022-04-30'");
$prillRezultatiMbetjes = mysqli_fetch_array($prillMbetje);

$majShitje = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-05-01' AND data <= '2022-05-31'");
$majRezultatiShitjeve = mysqli_fetch_array($majShitje);
$majMbetje = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-05-01' AND data <= '2022-05-31'");
$majRezultatiMbetjes = mysqli_fetch_array($majMbetje);

$qershorShitje = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-06-01' AND data <= '2022-06-30'");
$qershorRezultatiShitjeve = mysqli_fetch_array($qershorShitje);
$qershorMbetje = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-06-01' AND data <= '2022-06-30'");
$qershorRezultatiMbetjes = mysqli_fetch_array($qershorMbetje);

$korrikShitje = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-07-01' AND data <= '2022-07-31'");
$korrikRezultatiShitjeve = mysqli_fetch_array($korrikShitje);
$korrikMbetje = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-07-01' AND data <= '2022-07-31'");
$korrikRezultatiMbetjes = mysqli_fetch_array($korrikMbetje);

$gushtShitje = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-08-01' AND data <= '2022-08-30'");
$gushtRezultatiShitjeve = mysqli_fetch_array($gushtShitje);
$gushtMbetje = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-08-01' AND data <= '2022-08-30'");
$gushtRezultatiMbetjes = mysqli_fetch_array($gushtMbetje);

$shtatorShitje = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-09-01' AND data <= '2022-09-31'");
$shtatorRezultatiShitjeve = mysqli_fetch_array($shtatorShitje);
$shtatorMbetje = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-09-01' AND data <= '2022-09-31'");
$shtatorRezultatiMbetjes = mysqli_fetch_array($shtatorMbetje);

$tetorShitje = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-10-01' AND data <= '2022-10-30'");
$tetorRezultatiShitjeve = mysqli_fetch_array($tetorShitje);
$tetorMbetje = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-10-01' AND data <= '2022-10-30'");
$tetorRezultatiMbetjes = mysqli_fetch_array($tetorMbetje);

$nentorShitje = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-11-01' AND data <= '2022-11-31'");
$nentorRezultatiShitjeve = mysqli_fetch_array($nentorShitje);
$nentorMbetje = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-11-01' AND data <= '2022-11-31'");
$nentorRezultatiMbetjes = mysqli_fetch_array($nentorMbetje);

$dhjetorShitje = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-12-01' AND data <= '2022-12-31'");
$dhjetorRezultatiShitjeve = mysqli_fetch_array($dhjetorShitje);
$dhjetorMbetje = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-12-01' AND data <= '2022-12-31'");
$dhjetorRezultatiMbetjes = mysqli_fetch_array($dhjetorMbetje);





// $february = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-03-01' AND data <= '2022-03-31'");
// $shkurt = mysqli_fetch_array($february);
// $februarym = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-03-01' AND data <= '2022-03-31'");
// $shkurtRezultatiMbetje = mysqli_fetch_array($februarym);




// $march = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-04-01' AND data <= '2022-04-30'");
// $mars = mysqli_fetch_array($march);
// $marchm = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-04-01' AND data <= '2022-04-30'");
// $marsRezultatiMbetje = mysqli_fetch_array($marchm);

// $april = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-05-01' AND data <= '2022-05-31'");
// $prill = mysqli_fetch_array($april);
// $aprilm = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-05-01' AND data <= '2022-05-31'");
// $prillm = mysqli_fetch_array($aprilm);

// $may = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-06-01' AND data <= '2022-06-30'");
// $maj = mysqli_fetch_array($may);
// $maym = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-06-01' AND data <= '2022-06-30'");
// $majm = mysqli_fetch_array($maym);

// $qersh = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-07-01' AND data <= '2022-07-30'");
// $qersho = mysqli_fetch_array($qersh);
// $qershm = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-07-01' AND data <= '2022-07-30'");
// $qershor = mysqli_fetch_array($qershm);

// $korr = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-08-01' AND data <= '2022-08-31'");
// $korrik = mysqli_fetch_array($korr);
// $korri = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-08-01' AND data <= '2022-08-31'");
// $korrikm = mysqli_fetch_array($korri);



