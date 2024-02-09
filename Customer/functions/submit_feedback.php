<?php 
require ("../../db_connection/myConn.php");
session_start();
$transaction_num = $_GET["transaction_num"];
$rating = $_GET["rating"];
$feedback = $_GET["feedback"];

$tz = 'Asia/Hong_Kong';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp);
$now = date_format($dt,"Y-m-d");


		$query="UPDATE `tbl_appointment` SET `_rating` = $rating,`_feedback` = '$feedback',`_date_feedback` ='$now' WHERE `_transaction_num` LIKE '$transaction_num'";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}
	


		
	
?> 