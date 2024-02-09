<?php 
require ("../../db_connection/myConn.php");
session_start();
$transaction_num = $_GET["transaction_num"];

$tz = 'Asia/Hong_Kong';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp);
$now = date_format($dt,"Y-m-d H:i:s");

	$query="UPDATE `tbl_appointment` SET `_status` ='completed',`_date_completed` = '$now' WHERE `_transaction_num` LIKE '$transaction_num'";
					if(mysqli_query($con_str,$query)){

							$query="UPDATE `tbl_service_rendered` SET `_status` ='completed',`_date_completed` = '$now' WHERE `_transaction_num` LIKE '$transaction_num'";
										if(mysqli_query($con_str,$query)){
											echo '200';	
										}

				}
	


		
	
?> 