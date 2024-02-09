<?php 
require ("../../db_connection/myConn.php");
$_type = $_GET["_type"];
$_unit = $_GET["_unit"];


		$query="INSERT INTO `tbl_device_list`(`_type`, `_device_unit`) VALUES ('$_type','$_unit')";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}else{
						echo 'Device already exist!';
					}
	
?> 