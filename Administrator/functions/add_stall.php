<?php 
require ("../../db_connection/myConn.php");
$stall_id = $_GET["stall_id"];
$_location = $_GET["_location"];


		$query="INSERT INTO `tbl_stall` (`_stall_id`, `_location`, `_status`) VALUES ('$stall_id','$_location','active')";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}else{
						echo 'Stall ID isa already taken!';
					}
	
?> 