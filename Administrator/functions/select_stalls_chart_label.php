<?php
require ("../../db_connection/myConn.php");


$data=array();
$query = "SELECT `_id`, `_stall_id`, `_location`, `_status` FROM `tbl_stall` WHERE `_status` LIKE 'active' ORDER BY `_stall_id`";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			 $data[]=$row["_stall_id"];
		}
	}

	echo  json_encode( $data );
?>