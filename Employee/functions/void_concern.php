<?php 
require ("../../db_connection/myConn.php");
session_start();
$transaction_num = $_GET["transaction_num"];
$id = $_GET["id"];



		$query="DELETE FROM `tbl_service_rendered`  WHERE `_id` = $id";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}
	


		
	
?> 