<?php 
require ("../../db_connection/myConn.php");
$id = $_GET["id"];
$item_code = $_GET["item_code"];
$qty = $_GET["qty"];
$stall_id = $_GET["stall_id"];

$item_name = '';
$description ='';
$price = 0;

$current_qty = 0;

$query = "SELECT `_id`, `_item_code`, `_item`, `description`, `_price`, `_quantity`, `_img`, `_stall_id` FROM `tbl_items` WHERE `_stall_id` LIKE '$stall_id' AND `_item_code` LIKE '$item_code'";
	$result= $con_str->query($query);
	
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$item_name = $row["_item"];
			$description =$row["description"];
			$price = $row["_price"];
			$current_qty = $row["_quantity"];
		}
		
	}


$ending_qty = (Int)$current_qty - (Int)$qty;

	
$tz = 'Asia/Hong_Kong';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz));
$dt->setTimestamp($timestamp);
$now = date_format($dt,"Y-m-d H:i:s");

	$query="DELETE FROM `tbl_replenishment` WHERE `_id` = $id";
					if(mysqli_query($con_str,$query)){
						$query="INSERT INTO `tbl_inventory`(`_date`,`_item_code`, `_item`, `description`, `_price`, `_stall_id`, `_beginning`,`_void_replenishment`, `_ending`, `_user`) VALUES ('$now','$item_code','$item_name','$description',$price,'$stall_id',$current_qty,$qty,$ending_qty,'Administrator')";
							if(mysqli_query($con_str,$query)){
							
							}
						$query="UPDATE `tbl_items` SET  `_quantity` = `_quantity` - $qty WHERE `_item_code` LIKE '$item_code' AND `_stall_id` LIKE '$stall_id'";
							if(mysqli_query($con_str,$query)){
							echo '200';	
							}
					}	

?>

