<?php
require ("../../db_connection/myConn.php");
$service_type = $_GET["service_type"];
$device_unit = $_GET["device_unit"];
$query = "SELECT `_id`, `_device_type`, `_device_unit`, `_service_type`, `_service`, `_service_charge`, `_emp_rate` FROM `tbl_services` WHERE `_service_type` LIKE '$service_type' AND `_device_unit` LIKE '$device_unit'";
	$result= $con_str->query($query);
	$output='<option value="" selected="" hidden="">Please select service...</option>';
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			 $output.='<option value="'.$row["_service"].'">'.$row["_service"]. ' </option>';
		}
		
	}



	echo  $output;
?>