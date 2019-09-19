<?php
date_default_timezone_set('Asia/Calcutta'); 
$date = date("Y-m-d");
echo $date;
$conn =  mysqli_connect('localhost', 'root', '', 'sams');
//echo $sdate;
$showid = "first";
$seatno = array();
	$getprice = "SELECT * FROM showdetails WHERE showdate <= $date"; 
     $getpriceres= mysqli_query($conn,$getprice);
     if(!$getpriceres){
     	echo("error ".mysqli_error($conn));
     }
     $row = mysqli_fetch_row($getpriceres);
       printf ("%s  %s\n",$row[0],$row[1]);





?>