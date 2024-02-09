<?php
require ("../../db_connection/myConn.php");

$query = "SELECT DISTINCT(`_item_code`) AS Item_code,`_item` FROM `tbl_items`";
	$result= $con_str->query($query);
	$output='<option value="" selected="" hidden="">Please select item...</option>';
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$photo=$row["_img"];
			if($photo==''){
				$photo='no-image-available.png';
			}
			 $output.='<option value="'.$row["Item_code"].'">'.$row["Item_code"]. ' - ' . $row["_item"].'</option>';
		}
		
	}



	echo  $output;
?>