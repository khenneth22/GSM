<?php 
require ("../../db_connection/myConn.php");
session_start();
$transaction_num = $_GET["transaction_num"];
$_type = $_GET["_type"];
$_device_unit = $_GET["_device_unit"];
$service_charge = $_GET["service_charge"];
$emp_rate = $_GET["emp_rate"];
$service_type = $_GET["service_type"];
$service = $_GET["service"];
$qty = $_GET["qty"];
$total_amount = $_GET["total_amount"];

$subtotal_item = $_GET["subtotal_item"];
$subtotal_service = $_GET["subtotal_service"];
$service_item_code = $_GET["service_item_code"];
$service_item = $_GET["service_item"];
$service_price = $_GET["service_price"];
$stall_id = $_GET["stall_id"];




$email = $_SESSION['_email'];
$customer_name = $_SESSION['_first_name'] . ' ' . $_SESSION['_middle_name']. ' '.$_SESSION['_surname'] ;
$contact = $_SESSION['_contact'];
$address = $_SESSION['_address'];


 $sql = "SELECT * FROM `tbl_service_rendered` WHERE `_transaction_num` LIKE '$transaction_num' AND `_device_type` LIKE '$_type' AND `_device_unit` LIKE '$_device_unit' AND `_service_type` LIKE '$service_type' AND `_service` LIKE '$service'";
	$result2= $con_str->query($sql);

	if($result2->num_rows > 0) {
		$query="UPDATE `tbl_service_rendered` SET `_qty` = `_qty` + $qty , `_sub_total` = `_sub_total` + $subtotal_service,`_quantity`=`_quantity` + $qty,`_sub_total_item`=`_sub_total_item` + $subtotal_item,`_total_amount` = `_total_amount` + $total_amount WHERE `_transaction_num` LIKE '$transaction_num' AND `_device_type` LIKE '$_type' AND `_device_unit` LIKE '$_device_unit' AND `_service_type` LIKE '$service_type' AND `_service` LIKE '$service'";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}
	}else{
		$query="INSERT INTO `tbl_service_rendered`(`_transaction_num`, `_customer_email`, `_customer_name`, `_customer_contact`, `_customer_address`, `_device_type`, `_device_unit`, `_service_type`, `_service`, `_service_charge`, `_qty`, `_sub_total`,`_item_code`,`_item`,`_unit_price`,`_quantity`,`_sub_total_item`,`_total_amount`,`_emp_rate`,`_stall_id`,`_status`) VALUES ('$transaction_num','$email','$customer_name','$contact','$address','$_type','$_device_unit','$service_type','$service',$service_charge,$qty,$subtotal_service,'$service_item_code','$service_item',$service_price,$qty,$subtotal_item,$total_amount,$emp_rate,'$stall_id','pending')";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}
	}


		
	
?> 