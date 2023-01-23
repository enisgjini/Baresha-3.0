<?php

require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
require('conn-d.php');

if(isset($_POST['submit_file'])){

  $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
  if(in_array($_FILES["file"]["type"],$mimes)){

    $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

    $Reader = new SpreadsheetReader($uploadFilePath);

    $totalSheet = count($Reader->sheets());

    echo "Totali faqe ".$totalSheet." faqe";

    /* For Loop for all sheets */
    for($i=0;$i<$totalSheet;$i++){

      $Reader->ChangeSheet($i);

      foreach ($Reader as $Row)
      {
        $html.="<tr>";
        $ReportingPeriod = isset($Row[0]) ? $Row[0] : '';
        $AccountingPeriod = isset($Row[1]) ? $Row[1] : '';
        $Artist = isset($Row[2]) ? $Row[2] : '';
        $rel = isset($Row[3]) ? $Row[3] : '';
        $Track = isset($Row[4]) ? $Row[4] : '';
        $UPC = isset($Row[5]) ? $Row[5] : '';
        $ISRC = isset($Row[6]) ? $Row[6] : '';
        $Partner = isset($Row[7]) ? $Row[7] : '';
        $Country = isset($Row[8]) ? $Row[8] : '';
        $Type = isset($Row[9]) ? $Row[9] : '';
        $Units = isset($Row[10]) ? $Row[10] : '';
        $RevenueUSD = isset($Row[11]) ? $Row[11] : '';
        $RevenueShare = isset($Row[12]) ? $Row[12] : '';
        $SplitPayShare = isset($Row[6]) ? $Row[6] : '';
        
        echo "Artikujt jan importuar me sukses.";
        $query = "insert platformat (ReportingPeriod, AccountingPeriod, Artist, rel, Track, UPC, ISRC, Partner, Country, Type, Units, RevenueUSD, RevenueShare, SplitPayShare) values('$ReportingPeriod', '$AccountingPeriod', '$Artist', '$rel', '$Track', '$UPC', '$ISRC', '$Partner', '$Country', '$Type', '$Units', '$RevenueUSD', '$RevenueShare', '$SplitPayShare')";

        $conn->query($query);
       }
    }
    
    
    header("Location: listaart.php");
  }else { 
    die("<br/>Sorry, File type is not allowed. Only Excel file."); 
  }
}
?>