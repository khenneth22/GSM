<?php 
require ("../../db_connection/myConn.php");
$id = $_GET["id"];


		$query="UPDATE `tbl_stall` SET `_status` ='deactivated' WHERE `_id` = '$id'";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}
	
?> 