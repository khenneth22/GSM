<?php 
require ("../../db_connection/myConn.php");

$item_code = $_GET["item_code"];
$item_name = $_GET["item_name"];
$description = $_GET["description"];
$price = $_GET["price"];
$qty = $_GET["qty"];
$stall_id = $_GET["stall_id"];

$image_name = $_GET["image_name"];

	

if(empty($_FILES["file_add"]["name"])){
	$query="UPDATE `tbl_items` SET `_item`='$item_name', `description`='$description', `_price`=$price  WHERE `_item_code` LIKE '$item_code' AND `_stall_id` LIKE '$stall_id'";
					if(mysqli_query($con_str,$query)){
						$query="UPDATE `tbl_inventory`SET `_item`='$item_name', `description`='$description', `_price`=$price WHERE `_item_code` LIKE '$item_code' AND `_stall_id` LIKE '$stall_id'";
							if(mysqli_query($con_str,$query)){
							echo '200';	
						}
					}else{
						echo 'Item already exist!';
					}	
	

}else{
	$test=explode(".", $_FILES["file_add"]["name"]);
	$extension=end($test);
	$image = $image_name.'.'.$extension;
	$location = '../img/items/'.$image;
	move_uploaded_file($_FILES["file_add"]["tmp_name"], $location);
	$query="UPDATE `tbl_items` SET `_item`='$item_name', `description`='$description', `_price`=$price,`_img` = '$image' WHERE `_item_code` LIKE '$item_code' AND `_stall_id` LIKE '$stall_id'";
					if(mysqli_query($con_str,$query)){
						$query="UPDATE `tbl_inventory`SET `_item`='$item_name', `description`='$description', `_price`=$price WHERE `_item_code` LIKE '$item_code' AND `_stall_id` LIKE '$stall_id'";
							if(mysqli_query($con_str,$query)){
							echo '200';	
						}
					}else{
						echo 'Item already exist!';
					}
}

?>

