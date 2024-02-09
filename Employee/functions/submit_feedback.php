<?php 
require ("../../db_connection/myConn.php");
session_start();
$transaction_num = $_GET["transaction_num"];
$rating = $_GET["rating"];
$feedback = $_GET["feedback"];



		$query="UPDATE `tbl_appointment` SET `_rating` = $rating,`_feedback` = '$feedback' WHERE `_transaction_num` LIKE '$transaction_num'";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}
	


		
	
?> 