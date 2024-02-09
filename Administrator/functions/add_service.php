<?php 
require ("../../db_connection/myConn.php");
$_type = $_GET["_type"];
$_device_unit = $_GET["_device_unit"];
$service_charge = $_GET["service_charge"];
$emp_rate = $_GET["emp_rate"];
$service_type = $_GET["service_type"];
$service = $_GET["service"];
$item_code = $_GET["item_code"];


		$query="INSERT INTO `tbl_services`(`_device_type`, `_device_unit`, `_service_type`, `_service`, `_service_charge`,`_emp_rate`,`_item_code`) VALUES ('$_type','$_device_unit','$service_type','$service',$service_charge,$emp_rate,'$item_code')";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}else{
						echo 'Service already exist!';
					}
	
?> 