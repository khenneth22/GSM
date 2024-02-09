<?php
session_start();
$stall_id = $_SESSION['_stall'];
require ("../../db_connection/myConn.php");

$query = "SELECT `_id`, `_stall_id`, `_location`, `_status` FROM `tbl_stall` WHERE `_status` LIKE 'active' AND `_stall_id` NOT LIKE '$stall_id'";
	$result= $con_str->query($query);
	$output='<option value="" selected="" hidden="">Please select stall...</option>';
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			 $output.='<option value="'.$row["_stall_id"].'">'.$row["_stall_id"]. ' ' . $row["_location"].'</option>';
		}
		
	}



	echo  $output;
?>