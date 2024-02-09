<?php 
require ("../../db_connection/myConn.php");
session_start();
$transaction_num = $_GET["transaction_num"];
$reason = $_GET["reason"];


	$query="UPDATE `tbl_appointment` SET `_status` ='cancelled',`_cancel_reason` = '$reason' WHERE `_transaction_num` LIKE '$transaction_num'";
					if(mysqli_query($con_str,$query)){

							$query="UPDATE `tbl_service_rendered` SET `_status` ='cancelled' WHERE `_transaction_num` LIKE '$transaction_num'";
										if(mysqli_query($con_str,$query)){
											echo '200';	
										}

				}
	


		
	
?> 