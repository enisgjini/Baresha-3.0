<html>
<body>
<center> 
<?php
include 'conn-d.php';

require_once "Classes/PHPExcel.php";
$path="uploads/".$file_name;
//$path="uploads/".$file_name;
$reader= PHPExcel_IOFactory::createReaderForFile($path);
$excel_Obj = $reader->load($path);


//Read Sheet 0
$worksheet=$excel_Obj->getSheet('0');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery='INSERT INTO `platformat` (`ReportingPeriod`, `AccountingPeriod`, `Artist`, `rel`, `Track`, `UPC`, `ISRC`, `Partner`, `Country`, `Type`, `Units`, `RevenueUSD`, `RevenueShare`, `SplitPayShare`) VALUES ';
$subquery='';
	for($row=1;$row<=100;$row++){
		$subquery=$subquery.' (';
		for($col=0;$col<$colomncount_number;$col++){
		 	$subquery=$subquery.'\''.$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue().'\',';
		}
		 $subquery = substr($subquery, 0, strlen($subquery) - 1);
		 $subquery=$subquery.')'.' , ';
	}
	$insertquery=$insertquery.$subquery;	
	$insertquery= substr($insertquery,0,strlen($insertquery)-2);
 if ($conn->query($insertquery)) {
  echo "Sheet 1 Uploaded <br>";
} else {
  echo "Error: " . $insertquery . "<br>" . $conn->error;
}




//Read Sheet 1
$worksheet=$excel_Obj->getSheet('1');
$colomncount = $worksheet->getHighestDataColumn();
$rowcount = $worksheet->getHighestRow();
$colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);
$insertquery='INSERT INTO `platformat` (`ReportingPeriod`, `AccountingPeriod`, `Artist`, `rel`, `Track`, `UPC`, `ISRC`, `Partner`, `Country`, `Type`, `Units`, `RevenueUSD`, `RevenueShare`, `SplitPayShare`) VALUES ';
$subquery='';
	for($row=1;$row<=100;$row++){
		$subquery=$subquery.' (';
		for($col=0;$col<$colomncount_number;$col++){
		 	$subquery=$subquery.'\''.$worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue().'\',';
		}
		 $subquery = substr($subquery, 0, strlen($subquery) - 1);
		 $subquery=$subquery.')'.' , ';
	}
	$insertquery=$insertquery.$subquery;	
	$insertquery= substr($insertquery,0,strlen($insertquery)-2);
 if (mysqli_query($conn, $insertquery)) {
   echo "Sheet 2 Uploaded <br>";
} else {
  echo "Error: " . $insertquery . "<br>" . mysqli_error($conn);
}




?>
</center>
</body>
</html>