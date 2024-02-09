<?php
require ("../../db_connection/myConn.php");
$item_code=$_GET["item_code"];
$stall_id=$_GET["stall_id"];
$data=array();
$query = "SELECT `_id`, `_item_code`, `_item`, `description`, `_price`, `_quantity`, `_img`, `_stall_id` FROM `tbl_items` WHERE `_item_code` LIKE '$item_code' AND `_stall_id` LIKE '$stall_id'";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			   $data[]=array('_item'=>$row['_item'],'description'=>$row['description'],'_price'=>$row['_price'],'_quantity'=>$row['_quantity']);

		}
	}
	echo  json_encode( $data );
?>