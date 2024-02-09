<?php 
require ("../../db_connection/myConn.php");
$_type = $_GET["_type"];
$_unit = $_GET["_unit"];
$id = $_GET["id"];

		$query="UPDATE `tbl_device_list` SET `_type` = '$_type',`_device_unit` = '$_unit'  WHERE `_id` = $id";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}else{
						echo 'Device already exist!';
					}
	
?> 