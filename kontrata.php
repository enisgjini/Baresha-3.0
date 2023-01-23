
<?php
include 'conn-d.php';
session_start();
if(isset($_GET['id'])){
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$m = $conn->query("SELECT * FROM klientet WHERE id='$id'");
	$m2 = mysqli_fetch_array($m);
}
?>
<html>
<head>
<title>Kontrata - <?php echo $id;?></title>
<style>
            body {
                font-family: arial;
                font-size: 12px;
                
            }
            
            .clearfix {
                clear: both;
            }
            table.gridtable th {
                padding: 5px;
            }
            table.gridtable td {
                padding: 5px;
            }
            #page-container {
  position: relative;
  min-height: 100vh;
}

#content-wrap {
  padding-bottom: 2.5rem;    /* Footer height */
}

#footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  text-align: center;
  color: black;
}
#footer p{
    padding: 2px;
}
#footer hr{
    color: black;
}
@media all {
    .page-break { display: none; }
}

@media print {
    .page-break { display: block; page-break-before: always; }
}
        </style>
<script language="javascript" type="0bce25757d6dd3c012c757df-text/javascript">
        function Clickheretoprint()
        { 
          var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
              disp_setting+="scrollbars=yes,width=1000, height=500, left=100, top=25"; 
          var content_vlue = document.getElementById("content").innerHTML; 
          
          var docprint=window.open("","",disp_setting); 
           docprint.document.open(); 
           docprint.document.write('</head><body onLoad="self.print()" style="width: 1000px; font-size:11px; font-family:arial; font-weight:normal;">');          
           docprint.document.write(content_vlue); 
           docprint.document.close(); 
           docprint.focus(); 
        }
        </script>
</head>
<body onload="window.print();">
<div id="page-container">
<div id="content-wrap">
<div class="content" id="content" style="width: 870px; margin: 10px auto;">

<strong style="font-size: 20px; display: inline-block;"><img src="images/baresha.png" width="150"></strong>
 

<span style="float: right; padding-top: 5px;"><b>(Baresha Music SH.P.K)</b>
<br>Shirok&euml; - Suharek&euml;<br>
23000, Rr.Ilirida<br>
Tel: +383 49 605 655<br>
info@bareshamusic.com
</span>
    <br>

<hr>
    <centeR>
<h2>KONTRATË NE MES TE ARTISTIT<br> DHE<br> BARESHA MUSIC </h2>
<STRONG><i>AGREEMENT BETWEEN THE ARTIST AND BARESHA MUSIC </i></STRONG><br><br>
    </center>
<div style="float: left;width: 520px;margin-right: 30p; padding:5px;">
<span style="display: inline-block;width: 150px;text-align: left;padding-right: 20px;margin-bottom: 10px;font-weight: bold;width: 75px;">Emri & Mbiemri <small>(Name & Last Name)</small>: </span> &nbsp;&nbsp;&nbsp;<?php echo $m2['emri'];?><br>
<span style="display: inline-block;width: 150px;text-align: left;padding-right: 20px;margin-bottom: 10px;font-weight: bold;width: 75px;">Emri Artistik <small>(Artistic name)</small>: </span> &nbsp;&nbsp;&nbsp; <?php echo $m2['emriart'];?><br>
<span style="display: inline-block;width: 150px;text-align: left;padding-right: 20px;margin-bottom: 10px;font-weight: bold;width: 75px;">ID Dokumentit <small>(Document ID)</small>:</span>&nbsp;&nbsp;&nbsp;<?php echo $m2['np'];?><br>
<span style="display: inline-block;width: 150px;text-align: left;padding-right: 20px;margin-bottom: 10px;font-weight: bold;width: 75px;">Adresa <small>(Address)</small>:</span> &nbsp;&nbsp;&nbsp; <?php echo $m2['adresa'];?><br>
<span style="display: inline-block;width: 150px;text-align: left;padding-right: 20px;margin-bottom: 10px;font-weight: bold;width: 75px;">Numri telefonit <small>(Phone number)</small>: </span> &nbsp;&nbsp;&nbsp; <?php echo $m2['nrtel'];?>  <br>
<span style="display: inline-block;width: 150px;text-align: left;padding-right: 20px;margin-bottom: 10px;font-weight: bold;width: 75px;">Email: </span> &nbsp;&nbsp;&nbsp; <?php echo $m2['email'];?> <br>

</div>
<div style="float: right;width: 300px; margin-bottom: 20px; padding:5px;">
<span style="font-weight: bold; text-align: left; margin-bottom: 10px; display: inline-block;">Data e kontrates:</span><span style="float: right;"><?php echo $m2['dk'];?></span><br>
<span style="font-weight: bold; text-align: left; margin-bottom: 10px; display: inline-block;">Data e mbarimit:</span><span style="float: right;"><?php echo $m2['dks'];?></span><br>
<br>
<br>
</div>
<div class="clearfix"></div>
ne tekstin e mëtejmë quhet në përgjithësi si  
<br>
<i>
in the below text in general is known as 
    </i>
    <br><br><br><br><br>
    <center>
    <h2>
    „ARTIST- PERFORMUES“ ME TE DREJTA KOMERCIALE </h1>
<h3><i>
PERFORMER WITH THE COMMERCIAL RIGHTS </i></h3>

<h3>dhe <br><i>and</i> 
<br>
Baresha Music <br>

as 

    </h3>

<h2>“PËRFAQËSUES I PLOTFUQISHËM I TE DREJTAVE KOMERCIALE”. </h2>
<h3><i>
THE LEGAL REPRESENTER OF THE COMMERCIAL RIGHTS </i></h3>

    </center>
    <div class="page-break"></div>
   <div style="font-size:15px;">
   <strong style="font-size: 20px; display: inline-block;"><img src="images/baresha.png" width="150"></strong>
 

<span style="float: right; padding-top: 5px;"><b>(Baresha Music SH.P.K)</b>
<br>Shirok&euml; - Suharek&euml;<br>
23000, Rr.Ilirida<br>
Tel: +383 49 605 655<br>
info@bareshamusic.com
</span>
    <br>

<hr>
    <b>1. Objekti i Kontratës  </b>
<br>
<i>The object of the contract </i>

 <br><br>

<b>1.1 </b>
<br>
Vepra e realizuar audio - vizuale te cilat publikohen ne te gjitha platformat e internetit nga Baresha Music e njëjta i përdorë për fitime komerciale. 
    <br>
    <i>
Audio and visual work which will be published on the all integrated platforms of the internet from Baresha Music, the same will be used for the commercial profits. 
    </i>
 <br><br>
 <b>
1.2 
    </b>
    <br>
    <b>
Youtube_channel:  

 
<br><br>
1.3 
    </b>
    <br>
Baresha Music i merr nga Artisti-Pronari te gjitha te drejtat për përfaqësimin e veprave te komercializuara ne te gjitha platformat e internetit. 
<br><i><br>
Baresha Music  takes from the Owner all the rights for representation of the commercialised works in all platforms of the internet. 

    </i><br><br>
<b>
1.4 
    </b><br>

Baresha Music detyrohet qe veprat me te drejtën e transferuar për përfaqësim ti mbroj nga përdoruesit tjerë te paautorizuar si publikimet ne formatet e ndryshme ne internet. 
<br><i><br>
Baresha Music is obligated that works with the transfered right for the represent to cover from the other unauthorised user such as publications in other formats in internet. 
    </i>
 
<br><b><br>
1.5 
    </b><br>
    
Artisti – Pronari garanton se veprat e transferuara për përfaqësim nuk janë dhënë palës se tretë ne te njëjtën kohë po ashtu nuk ka ndonjë kontratë te vlefshme me te, njëherit me nënshkrimin e Artistit – Pronarit garantohet qe nga krijuesit si kompozitoret, tekstshkruesit dhe studiot regjistruese janë marr pëlqimet për përdorimin e se drejtës komerciale. 
    <br>
    <i>
Owner guarantees that the transfered work for the represent are not given to the third parties in the same time, also he hasn’t any valid contract with the third parties. Meanwhile the Owner guarantiees that the composer, lyricswriter and the records studio has been granted the permissions for the commercial rights. 
    </i><br></br>
 
<b>
1.6 
    </b>
    <br>
Pjesa e fitimit te Artistit-Pronarit prej___<u><?php echo 100 - $m2['perqindja'];?></u>__% do te i transferohet ne llogarinë e saj/tij komerciale dhe Artisti-Pronari është obligues për barazime tatimore ne shtetin ku jeton. 
<i><br>
The income portion of the Owner from __<?php echo 100 - $m2['perqindja'];?></u>___%  will be transfer on his commercial Bank Account and the Owner is obligated to pay the income taxes of the Country where he/she lives. 
    </i> 
    <div class="page-break"></div><br>
    <strong style="font-size: 20px; display: inline-block;"><img src="images/baresha.png" width="150"></strong>
 

<span style="float: right; padding-top: 5px;"><b>(Baresha Music SH.P.K)</b>
<br>Shirok&euml; - Suharek&euml;<br>
23000, Rr.Ilirida<br>
Tel: +383 49 605 655<br>
info@bareshamusic.com
</span>
    <br>

<hr>
 <b>  2. Përmbledhja ligjore </b><br>
 <i>The legal content</i><br><br>
 <b>2.1</b> 
<br><br>
Artisti-Pronari e transferon te drejtën e plotë komerciale gjatë gjithë kohës sa është kontrata ne fuqi per veprat e cekura ne aneksin 1.2 te kontrates. 
<br><i>
The Owner is transfered the whole commercial right during the all the time as the contract is valid for the works described in the annex 1.2 of the contract. 
    </i>
    <br><br><br>
    <b>2.2 </b><br><br>

Palët janë te vetëdijshëm qe ne përdorimin online te kësaj krijimtarie, e njëjta mund te shikohet ne te gjithë boten, përpos nëse artisti vendos qe mos ta shfaqë ne territore te caktuara. 
<br>
<i>
Parties are aware that using online of this work, the same can be viewed in the whole world, except if the Owner decide his/her not to be shown in particualr countries. 
    </i>
    <br><br><br>
  <b>  2.3 </b><br><br>

Artisti pajtohet qe gjatë shfaqjeve online në te gjitha platformat e internetit do te vendosen materiale propaganduese / reklamuese pa dallim gjuhë apo figure (përpos materiale te cilat përmbajnë skena urrejtje, dhune, raciste etj.). 
<br>
<i>
The Owner agrees that during online tune in all platforms of internet will be shown other commercial/propagandistic content, no matter what language(except if materials containing hate sceenes, racism or  violence sceenes, etc). 
    </i>

 
<br><br><br>
  <b>  Kohëzgjatja e kontratës </b><br>
<i>
Duration of Contract </i><br><br>
<b>3.1 </b><br><br>

 
<?php
$df = $m2['dk'];
$ds = $m2['dks'];
$start = new DateTime(''.$df.' 00:00:00');
$end = new DateTime(''.$ds.' 00:00:00');
$diff = $start->diff($end);

$yearsInMonths = $diff->format('%r%y') * 12;
$months = $diff->format('%r%m');
$totalMonths = $yearsInMonths + $months;

?>
Kohëzgjatja e kësaj kontrate është <?php echo $totalMonths;?> muaj nga data e nënshkrimit nga te dy palët. Kontrata zgjatet ne mënyrë automatike. <br> 
<i>
Duration of this contract is set for <?php echo $totalMonths;?>  Months from the signing date from the both parties. The contract will be extended automaticlly. 
    </i>
<br>
    <b>3.2 </b><br><br>

 

Shkëputja e kontratës mund te behet me pajtimin e palëve duke e njoftuar Baresha Music  

1 muaj para skadimit te kontratës. 
<br>
<i>
The termination of the contract can be done with agreement of both parties informing Baresha Music  one Month in advance from the date of the contract expire.
    </i>  
    <br>
   <b> 3.3 </b><br><br>

Baresha Music ka te drejt ta shkëput kontratën njëanshëm ne rast se Artisti-Përformuesi i shkel marrëveshjet e përmendura dhe me këtë Baresha Music ka te drejte ti kërkoj dëmshpërblim. 
<br><i>
Baresha Music has the right to terminate the contract unilateral in case the performer violates the agreements set and  based on this the Baresha Music has the right to request the compensation from the performer. 
    </i><br>
   <b> 3.4</b><br><br> 

 

Artistit-Përformuesit ka te drejt shkëputjen e njëanshme me shkrim ne rast se Baresha Music nuk e bënë pjesën e pagesës te cekur ne 1.5 brenda afatit 1 mujor ne muajin pasues. 
<br><i>
Performer has the right to terminate the contract unilateraly on writen form in case Baresha Music does not accomplish the payments mentioned in 1.5 section within one month following next month. 
    </i>

<div class="page-break"></div>
<br>
<strong style="font-size: 20px; display: inline-block;"><img src="images/baresha.png" width="150"></strong>
 

 <span style="float: right; padding-top: 5px;"><b>(Baresha Music SH.P.K)</b>
 <br>Shirok&euml; - Suharek&euml;<br>
 23000, Rr.Ilirida<br>
 Tel: +383 49 605 655<br>
 info@bareshamusic.com
 </span>
 <hr>
     <br>
<b><u>Mbrojtja e te dhënave </b></u>
<br>
    <i>Data protection </i>

 <br> <br>

 Performer agrees that his/her personal data such as name, surname, address, phone number, email, can be used for registration reason to the file records from the Baresha Music, whereas the artistic name can be published in all platorms of the internet. 

 <br><br>

Palët obligohet qe te përdorin kodin e sekretit mbi marrëveshjen ne këtë kontrate.  
<i><br>
Parties are obligated to use the secret over the agreement in this contract. 
    </i><br><br><br>
 

 

 

Marrëveshjet plotësuese ne mes te palëve mund te behën vetëm me shkrim.  
<br><i>
The additional agreements between the parties can be done only in writen form. 
    </i>
<br><br><br><br><br><br><br><br>
</div>
<br>
<br>
<table style="width:100%">
<tr>
<td class="text-left"><b>(Baresha Music SH.P.K)<br>
        <i>Owner / Pronari</i></b><br>
        Afrim Kolgeci
</td>
<td></td>
<td></td>
<td></td>
<td style="text-align: right;"><b>Artisti / Pronari<br>
        <i>Artist / Owner</i></b><br>
       <?php echo $m2['emri'];?>
</td>
</tr>
<tr>
<td class="text-left">______________</td>
<td></td>
<td class="text-center">V.V</td>
<td></td>
<td style="float: right;"><u><img src="signatures/<?php echo $id;?>.png" width="250px" style="float: right;"></u></td>
</tr>
</table>

</div>
</div>
<style>
        div.columns       { width: 870px; }
div.columns div   { width: 270px; height: 100px; float: left; }

div.clear         { clear: both; }
    </style>
<footer id="footer">

<div class="clear"></div>
</footer>
</html>