<?php 
require ("../../db_connection/myConn.php");
$stall_id = $_GET["stall_id"];
$_location = $_GET["_location"];


		$query="UPDATE `tbl_stall` SET `_location` ='$_location' WHERE `_stall_id` LIKE '$stall_id'";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}
	
?> 