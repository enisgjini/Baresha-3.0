<?php
include 'conn-d.php';
$id = $_GET['invoice'];
$resultas = $conn->query("SELECT SUM(`totali`) as `sum` FROM `shitje2` WHERE fatura='$id'");
$rowas = mysqli_fetch_array($resultas);
$fgfg = $rowas['sum'];
$resultas = $conn->query("SELECT SUM(`mbetja`) as `sum` FROM `shitje2` WHERE fatura='$id'");
$rowass = mysqli_fetch_array($resultas);
$fgfgg = $rowass['sum'];

?>
<html>

<head>
	<title>Fatura - <?php echo $_GET['invoice']; ?></title>
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
			padding-bottom: 2.5rem;
			/* Footer height */
		}

		#footer {
			position: absolute;
			bottom: 0;
			width: 100%;
			text-align: center;
			color: black;
		}

		#footer p {
			padding: 2px;
		}

		#footer hr {
			color: black;
		}
	</style>
	<script language="javascript">
		function Clickheretoprint() {
			var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
			disp_setting += "scrollbars=yes,width=1000, height=500, left=100, top=25";
			var content_vlue = document.getElementById("content").innerHTML;

			var docprint = window.open("", "", disp_setting);
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
				<div style="text-align: center;">
					<img src="images/baresha.png" width="150"><br>
					TEL. : +383 (049) 605 655<br>

					<br><br><br>
				</div>
				<?php
				$gin = $conn->query("SELECT * FROM fatura2 WHERE fatura='$id'");
				$ginfo = mysqli_fetch_array($gin);
				$stafi =  $ginfo['emri'];
				$gstai = $conn->query("SELECT * FROM klientet WHERE id='$stafi'");
				$gstai2 = mysqli_fetch_array($gstai);
				?>
				<div style="float: left;width: 520px;margin-right: 30px; background: #f2f2f2; padding:5px;">
					<span style="display: inline-block;width: 150px;text-align: right;padding-right: 20px;margin-bottom: 10px;font-weight: bold;width: 75px;">Fatura p&euml;r: </span> &nbsp;&nbsp;&nbsp; <?php echo $gstai2['emri']; ?><br>

					<span style="display: inline-block;width: 150px;text-align: right;padding-right: 20px;margin-bottom: 10px;font-weight: bold;width: 75px;">Adresa :</span>&nbsp;&nbsp;&nbsp; <?php echo $gstai2['adresa']; ?><br>


					<span style="display: inline-block;width: 150px;text-align: right;padding-right: 20px;margin-bottom: 10px;font-weight: bold;width: 75px;">Fatura :</span>&nbsp;&nbsp;&nbsp; <?php echo $_GET['invoice']; ?>


				</div>


				<div style="float: right;width: 300px; margin-bottom: 20px; background: #f2f2f2; padding:5px;">
					<span style="font-weight: bold; text-align: left; margin-bottom: 10px; display: inline-block;">Data :</span><span style="float: right;"><?php echo date("d/m/Y"); ?></span><br>

					<span style="font-weight: bold; text-align: left; margin-bottom: 10px; display: inline-block; border-bottom: ">Mbetja :</span><span style="float: right;"> <?php echo $fgfgg; ?>&euro;</span>

					<br>

					<div style="border-bottom: 2px solid black;"><span style="font-weight: bold; text-align: left; margin-bottom: 10px; display: inline-block; border-bottom: ">Vlera p&euml;r pages :</span><span style="float: right;"> <?php echo $fgfg; ?>&euro;</span>

					</div><br>

					<br>
				</div>
				<div class="clearfix"></div>
				<hr>
				<table class="gridtable" style="font-family: verdana,arial,sans-serif; font-size:11px; border-color: #666666; border-collapse: collapse; width: 100%; margin-top: 20px;">

					<th style="border-bottom: 1px solid #000000; width: 30px;">NR.</th>
					<th style="border-bottom: 1px solid #000000; width: 80px;">Emertimi</th>

					<th style="border-bottom: 1px solid #000000; width: 80px;">Qmimi</th>

					<th style="border-bottom: 1px solid #000000; width: 81px;">perqindja</th>
					<th style="border-bottom: 1px solid #000000; width: 80px;">Shuma</th>
					<th style="border-bottom: 1px solid #000000; width: 80px;">Mbetja</th>
					<th style="border-bottom: 1px solid #000000; width: 100px;">Totali</th>

					</tr>
					<?php
					$rendori = 1;
					$result = $conn->query("SELECT * FROM shitje2 WHERE fatura='$id'");
					for ($i = 0; $row = $result->fetch_array(); $i++) {

					?>
						<tr>

							<td style="text-align: center;"><?php echo $rendori . "."; ?></td>
							<td style="text-align: center;"><?php echo $row['emertimi']; ?></td>

							<td style="text-align: center;"><?php echo $row['qmimi']; ?></td>


							<td style="text-align: center;"><?php echo $row['perqindja']; ?>%</td>
							<td style="text-align: center;"><?php echo $row['klientit']; ?></td>
							<td style="text-align: center;"><?php echo $row['mbetja']; ?></td>

							<td style="text-align: center;"><?php echo $row['totali']; ?>&euro;</td>


						<?php
						$rendori++;
					}
						?>
						<tr>
							<th style="border-top: 1px solid #000000;">&nbsp;</th>
							<th style="border-top: 1px solid #000000;">&nbsp;</th>
							<th style="border-top: 1px solid #000000;">&nbsp;</th>
							<th style="border-top: 1px solid #000000;">&nbsp;</th>
							<th style="border-top: 1px solid #000000;">&nbsp;</th>




							<?php

							$resultatvsh = $conn->query("SELECT sum(totali) FROM shitje2 WHERE fatura='$id'");

							for ($i = 0; $rowatvsh = $resultatvsh->fetch_array(); $i++) {
								$ttvsh = $rowatvsh['sum(totali)'];
							}
							?>

							<th style="border-top: 1px solid #000000;"></th>
							<th style="border-top: 1px solid #000000; text-align: center;"><b>Totali:</b>
								<?php

								echo $ttvsh;
								?> &euro;
							</th>
						</tr>





						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						<tr>

							<th style="border-bottom: 1px solid #000000; padding:20px; text-align: center;">Faturoi:</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>

							<th style="border-bottom: 1px solid #000000; padding:20px; text-align: center;">Pranoi:</th>
						</tr>
				</table>
			</div>
		</div>
		<center>Pagesat:<br>
			<?php
			$shpagesat = $conn->query("SELECT * FROM pagesat2 WHERE fatura='$id'");
			while ($gpa = mysqli_fetch_array($shpagesat)) {
				echo '<b>M&euml;nyrat e pages&euml;s:</b> ' . $gpa['menyra'] . '<br>
					<b>P&euml;rshkrimmi:</b>' . $gpa['pershkrimi'] . '<br>
					<b>Shuma:</b> ' . $gpa['shuma'] . '&euro;<br>
					<b>Data:</b> ' . $gpa['data'] . '<br>';
			}
			?>


		</center>
		<style>
			div.columns {
				width: 870px;
			}

			div.columns div {
				width: 270px;
				height: 100px;
				float: left;
			}

			div.clear {
				clear: both;
			}
		</style>
		<footer id="footer">




		</footer>

</body>

</html>