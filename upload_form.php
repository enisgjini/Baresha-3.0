<?php
include 'conn-d.php';
if(isset($_POST["submit_file"]))
{
 $file = $_FILES["file"]["tmp_name"];
 $file_open = fopen($file,"r");
 while(($csv = fgetcsv($file_open, ",")) !== false)
 {
       $ReportingPeriod = $csv[0];
        $AccountingPeriod = $csv[1];
        $Artist = $csv[2];
        $rel = $csv[3];
        $Track = $csv[4];
        $UPC = $csv[5];
        $ISRC = $csv[6];
        $Partner = $csv[7];
        $Country = $csv[8];
        $Type = $csv[9];
        $Units = $csv[10];
        $RevenueUSD = $csv[11];
        $RevenueShare = $csv[12];
        $SplitPayShare = $csv[13];
        
        $query = "insert platformat (ReportingPeriod, AccountingPeriod, Artist, rel, Track, UPC, ISRC, Partner, Country, Type, Units, RevenueUSD, RevenueShare, SplitPayShare) values('$ReportingPeriod', '$AccountingPeriod', '$Artist', '$rel', '$Track', '$UPC', '$ISRC', '$Partner', '$Country', '$Type', '$Units', '$RevenueUSD', '$RevenueShare', '$SplitPayShare')";
        	$conn->query($query);
 }
}
?>