<?php
require ("../../db_connection/myConn.php");
$service=$_GET["service"];
$stall_id=$_GET["stall_id"];
$item_code='';
$item='';
$price=0;
$item_qty=0;
$data=array();
$query = "SELECT `_id`, `_device_type`, `_device_unit`, `_service_type`, `_service`, `_service_charge`, `_emp_rate`,`_item_code` FROM `tbl_services` WHERE `_service` LIKE '$service'";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$item_code= $row["_item_code"];
			$sql = "SELECT `_id`, `_item_code`, `_item`, `description`, `_price`, `_quantity`, `_img`, `_stall_id` FROM `tbl_items` WHERE `_item_code` LIKE '$item_code'";
			$result2= $con_str->query($sql);

			if($result2->num_rows > 0) {

				while($row2 = $result2->fetch_assoc()) {
					$item_qty=$row2["_quantity"];
					$item=$row2["_item"];
					$price = $row2["_price"];

				}
			}

			   $data[]=array('service_charge'=>$row['_service_charge'],'emp_rate'=>$row['_emp_rate'],'item_code'=>$item_code,'item_name'=>$item,'price'=>$price,'item_qty'=>$item_qty);

		}
	}
	echo  json_encode( $data );
?>