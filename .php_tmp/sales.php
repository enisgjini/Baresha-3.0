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



$janarShitje2021 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2021-01-01' AND data <= '2021-01-31'");
$janarRezultatiShitjeve2021 = mysqli_fetch_array($janarShitje2021);
$janarMbetje2021 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2021-01-01' AND data <= '2021-01-31'");
$janarRezultatiMbetjes2021 = mysqli_fetch_array($janarMbetje2021);
$shkurtShitje2021 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2021-02-01' AND data <= '2021-02-28'");
$shkurtRezultatiShitjeve2021 = mysqli_fetch_array($shkurtShitje2021);
$shkurtMbetje2021 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2021-02-01' AND data <= '2021-02-28'");
$shkurtRezultatiMbetjes2021 = mysqli_fetch_array($shkurtMbetje2021);
$marsShitje2021 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2021-03-01' AND data <= '2021-03-31'");
$marsRezultatiShitjeve2021 = mysqli_fetch_array($marsShitje2021);
$marsMbetje2021 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2021-03-01' AND data <= '2021-03-31'");
$marsRezultatiMbetjes2021 = mysqli_fetch_array($marsMbetje2021);
$prillShitje2021 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2021-04-01' AND data <= '2021-04-30'");
$prillRezultatiShitjeve2021 = mysqli_fetch_array($prillShitje2021);
$prillMbetje2021 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2021-04-01' AND data <= '2021-04-30'");
$prillRezultatiMbetjes2021 = mysqli_fetch_array($prillMbetje2021);
$majShitje2021 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2021-05-01' AND data <= '2021-05-31'");
$majRezultatiShitjeve2021 = mysqli_fetch_array($majShitje2021);
$majMbetje2021 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2021-05-01' AND data <= '2021-05-31'");
$majRezultatiMbetjes2021 = mysqli_fetch_array($majMbetje2021);
$qershorShitje2021 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2021-06-01' AND data <= '2021-06-30'");
$qershorRezultatiShitjeve2021 = mysqli_fetch_array($qershorShitje2021);
$qershorMbetje2021 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2021-06-01' AND data <= '2021-06-30'");
$qershorRezultatiMbetjes2021 = mysqli_fetch_array($qershorMbetje2021);
$korrikShitje2021 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2021-07-01' AND data <= '2021-07-31'");
$korrikRezultatiShitjeve2021 = mysqli_fetch_array($korrikShitje2021);
$korrikMbetje2021 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2021-07-01' AND data <= '2021-07-31'");
$korrikRezultatiMbetjes2021 = mysqli_fetch_array($korrikMbetje2021);
$gushtShitje2021 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2021-08-01' AND data <= '2021-08-31'");
$gushtRezultatiShitjeve2021 = mysqli_fetch_array($gushtShitje2021);
$gushtMbetje2021 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2021-08-01' AND data <= '2021-08-31'");
$gushtRezultatiMbetjes2021 = mysqli_fetch_array($gushtMbetje2021);
$shtatorShitje2021 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2021-09-01' AND data <= '2021-09-30'");
$shtatorRezultatiShitjeve2021 = mysqli_fetch_array($shtatorShitje2021);
$shtatorMbetje2021 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2021-09-01' AND data <= '2021-09-30'");
$shtatorRezultatiMbetjes2021 = mysqli_fetch_array($shtatorMbetje2021);
$tetorShitje2021 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2021-10-01' AND data <= '2021-10-31'");
$tetorRezultatiShitjeve2021 = mysqli_fetch_array($tetorShitje2021);
$tetorMbetje2021 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2021-10-01' AND data <= '2021-10-31'");
$tetorRezultatiMbetjes2021 = mysqli_fetch_array($tetorMbetje2021);
$nentorShitje2021 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2021-11-01' AND data <= '2021-11-30'");
$nentorRezultatiShitjeve2021 = mysqli_fetch_array($nentorShitje2021);
$nentorMbetje2021 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2021-11-01' AND data <= '2021-11-30'");
$nentorRezultatiMbetjes2021 = mysqli_fetch_array($nentorMbetje2021);
$dhjetorShitje2021 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2021-12-01' AND data <= '2021-12-31'");
$dhjetorRezultatiShitjeve2021 = mysqli_fetch_array($dhjetorShitje2021);
$dhjetorMbetje2021 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2021-12-01' AND data <= '2021-12-31'");
$dhjetorRezultatiMbetjes2021 = mysqli_fetch_array($dhjetorMbetje2021);



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


$janarShitje2023 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2023-01-01' AND data <= '2023-01-31'");
$janarRezultatiShitjeve2023 = mysqli_fetch_array($janarShitje2023);
$janarMbetje2023 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2023-01-01' AND data <= '2023-01-31'");
$janarRezultatiMbetjes2023 = mysqli_fetch_array($janarMbetje2023);

$shkurtShitje2023 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2023-02-01' AND data <= '2023-02-28'");
$shkurtRezultatiShitjeve2023 = mysqli_fetch_array($shkurtShitje2023);
$shkurtMbetje2023 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2023-02-01' AND data <= '2023-02-28'");
$shkurtRezultatiMbetjes2023 = mysqli_fetch_array($shkurtMbetje2023);

$marsShitje2023 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2023-03-01' AND data <= '2023-03-31'");
$marsRezultatiShitjeve2023 = mysqli_fetch_array($marsShitje2023);
$marsMbetje2023 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2023-03-01' AND data <= '2023-03-31'");
$marsRezultatiMbetjes2023 = mysqli_fetch_array($marsMbetje2023);

$prillShitje2023 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2023-04-01' AND data <= '2023-04-30'");
$prillRezultatiShitjeve2023 = mysqli_fetch_array($prillShitje2023);
$prillMbetje2023 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2023-04-01' AND data <= '2023-04-30'");
$prillRezultatiMbetjes2023 = mysqli_fetch_array($prillMbetje2023);

$majRezultatiShitjeve2023 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-05-01' AND data <= '2022-05-31'");
$majRezultatiShitjeve2023 = mysqli_fetch_array($majRezultatiShitjeve2023);
$majMbetje2023 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-05-01' AND data <= '2022-05-31'");
$majRezultatiMbetjes2023 = mysqli_fetch_array($majMbetje2023);

$qershorShitje2023 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2023-06-01' AND data <= '2023-06-30'");
$qershorRezultatiShitjeve2023 = mysqli_fetch_array($qershorShitje2023);
$qershorMbetje2023 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2023-06-01' AND data <= '2023-06-30'");
$qershorRezultatiMbetjes2023 = mysqli_fetch_array($qershorMbetje2023);

$korrikShitje2023 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2023-07-01' AND data <= '2023-07-31'");
$korrikRezultatiShitjeve2023 = mysqli_fetch_array($korrikShitje2023);
$korrikMbetje2023 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2023-07-01' AND data <= '2023-07-31'");
$korrikRezultatiMbetjes2023 = mysqli_fetch_array($korrikMbetje2023);

$gushtShitje2023 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2023-08-01' AND data <= '2023-08-31'");
$gushtRezultatiShitjeve2023 = mysqli_fetch_array($gushtShitje2023);
$gushtMbetje2023 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2023-08-01' AND data <= '2023-08-31'");
$gushtRezultatiMbetjes2023 = mysqli_fetch_array($gushtMbetje2023);

$shtatorShitje2023 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2023-09-01' AND data <= '2023-09-30'");
$shtatorRezultatiShitjeve2023 = mysqli_fetch_array($shtatorShitje2023);
$shtatorMbetje2023 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2023-09-01' AND data <= '2023-09-30'");
$shtatorRezultatiMbetjes2023 = mysqli_fetch_array($shtatorMbetje2023);

$tetorShitje2023 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2023-10-01' AND data <= '2023-10-31'");
$tetorRezultatiShitjeve2023 = mysqli_fetch_array($tetorShitje2023);
$tetorMbetje2023 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2023-10-01' AND data <= '2023-10-31'");
$tetorRezultatiMbetjes2023 = mysqli_fetch_array($tetorMbetje2023);

$nentorShitje2023 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2023-11-01' AND data <= '2023-11-30'");
$nentorRezultatiShitjeve2023 = mysqli_fetch_array($nentorShitje2023);
$nentorMbetje2023 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2023-11-01' AND data <= '2023-11-30'");
$nentorRezultatiMbetjes2023 = mysqli_fetch_array($nentorMbetje2023);

$dhjetorShitje2023 = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2023-12-01' AND data <= '2023-12-31'");
$dhjetorRezultatiShitjeve2023 = mysqli_fetch_array($dhjetorShitje2023);
$dhjetorMbetje2023 = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2023-12-01' AND data <= '2023-12-31'");
$dhjetorRezultatiMbetjes2023 = mysqli_fetch_array($dhjetorMbetje2023);







// $february = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-03-01' AND data <= '2022-03-31'");
// $shkurt = mysqli_fetch_array($february);
// $februarym = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-03-01' AND data <= '2022-03-31'");
// $shkurtRezultatiMbetje = mysqli_fetch_array($februarym);




// $march = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-04-01' AND data <= '2022-04-30'");
// $mars = mysqli_fetch_array($march);
// $marchm = $conn->query("SELECT SUM(mbetja) AS sum FROM shitje WHERE data >= '2022-04-01' AND data <= '2022-04-30'");
// $marsRezultatiMbetje = mysqli_fetch_array($marchm);

// $april = $conn->query("SELECT SUM(klientit) AS sum FROM shitje WHERE data >= '2022-05-01' AND data <= '2022-05-31'");
// $prill = mysqli_fetch_array($april);`aC H
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



