<?php
require ("../../db_connection/myConn.php");
$stall_id=$_GET["stall_id"];
$query = "SELECT `_item_code`,`_img`,`_item` FROM `tbl_items` WHERE `_stall_id` LIKE '$stall_id'";
	$result= $con_str->query($query);
	$output='<option value="" selected="" hidden="">Please select item...</option>';
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$photo=$row["_img"];
			if($photo==''){
				$photo='no-image-available.png';
			}
			 $output.='<option value="'.$row["_item_code"].'">'.$row["_item_code"]. ' - ' . $row["_item"].'</option>';
		}
		
	}



	echo  $output;
?>