<?php
require ("../../db_connection/myConn.php");
$_type=$_GET["_type"];
$query = "SELECT `_id`, `_type`, `_device_unit` FROM `tbl_device_list` WHERE `_type` LIKE '$_type'";
	$result= $con_str->query($query);
	$output='<option value="" selected="" hidden="">Please select device...</option>';
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			 $output.='<option value="'.$row["_device_unit"].'">'.$row["_device_unit"].'</option>';
		}
		
	}



	echo  $output;
?>