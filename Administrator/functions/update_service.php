<?php 
require ("../../db_connection/myConn.php");
$_type = $_GET["_type"];
$_device_unit = $_GET["_device_unit"];
$service_charge = $_GET["service_charge"];
$emp_rate = $_GET["emp_rate"];
$service_type = $_GET["service_type"];
$service = $_GET["service"];
$id = $_GET["id"];
$item_code = $_GET["item_code"];

		$query="UPDATE `tbl_services` SET `_device_type`='$_type', `_device_unit`='$_device_unit', `_service_type`='$service_type', `_service`='$service', `_service_charge`=$service_charge,`_emp_rate`=$emp_rate,`_item_code`='$item_code' WHERE `_id` = $id";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}else{
						echo 'Service already exist!';
					}
	
?> 