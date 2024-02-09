<?php 
require ("../../db_connection/myConn.php");
$item_code = $_GET["item_code"];
$item_name = $_GET["item_name"];
$description = $_GET["description"];
$price = $_GET["price"];
$qty = $_GET["qty"];
$stall_id = $_GET["stall_id"];
$current_qty = $_GET["current_qty"];
$ending_qty = (Int)$qty + (Int)$current_qty;

	
$tz = 'Asia/Hong_Kong';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz));
$dt->setTimestamp($timestamp);
$now = date_format($dt,"Y-m-d H:i:s");

	$query="INSERT INTO `tbl_replenishment`(`_date`, `_item_code`, `_item`, `description`, `_price`, `_quantity`, `_stall_id`) VALUES ('$now','$item_code','$item_name','$description',$price,$qty,'$stall_id')";
					if(mysqli_query($con_str,$query)){
						$query="INSERT INTO `tbl_inventory`(`_date`,`_item_code`, `_item`, `description`, `_price`, `_stall_id`, `_beginning`,`_in`, `_ending`, `_user`) VALUES ('$now','$item_code','$item_name','$description',$price,'$stall_id',$current_qty,$qty,$ending_qty,'Administrator')";
							if(mysqli_query($con_str,$query)){
							
							}
						$query="UPDATE `tbl_items` SET `_price` = $price, `_quantity` = `_quantity` + $qty WHERE `_item_code` LIKE '$item_code' AND `_stall_id` LIKE '$stall_id'";
							if(mysqli_query($con_str,$query)){
							echo '200';	
							}
					}	

?>

