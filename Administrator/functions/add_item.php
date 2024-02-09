<?php 
require ("../../db_connection/myConn.php");
$item_code = $_GET["item_code"];
$item_name = $_GET["item_name"];
$description = $_GET["description"];
$price = $_GET["price"];
$qty = $_GET["qty"];
$stall_id = $_GET["stall_id"];

$image_name = $_GET["image_name"];
$tz = 'Asia/Hong_Kong';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz));
$dt->setTimestamp($timestamp);
$now = date_format($dt,"Y-m-d H:i:s");


$sql = "SELECT * FROM `tbl_items` WHERE (`_item_code` LIKE '$item_code' ) And (`_stall_id` LIKE '$stall_id')  ";
	$result= $con_str->query($sql);

	if($result->num_rows > 0) {
		echo 'Item already exist in '.$stall_id;
		return;
    }		

if(empty($_FILES["file_add"]["name"])){
	$query="INSERT INTO `tbl_items`(`_item_code`, `_item`, `description`, `_price`, `_quantity`, `_stall_id`) VALUES ('$item_code','$item_name','$description',$price,$qty,'$stall_id')";
					if(mysqli_query($con_str,$query)){
						$query="INSERT INTO `tbl_inventory`(`_date`,`_item_code`, `_item`, `description`, `_price`, `_stall_id`, `_beginning`, `_ending`, `_user`) VALUES ('$now','$item_code','$item_name','$description',$price,'$stall_id',$qty,$qty,'Administrator')";
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
	$query="INSERT INTO `tbl_items`(`_item_code`, `_item`, `description`, `_price`, `_quantity`, `_img`, `_stall_id`) VALUES ('$item_code','$item_name','$description',$price,$qty,'$image','$stall_id')";
					if(mysqli_query($con_str,$query)){
						$query="INSERT INTO `tbl_inventory`(`_date`,`_item_code`, `_item`, `description`, `_price`, `_stall_id`, `_beginning`, `_ending`, `_user`) VALUES ('$now','$item_code','$item_name','$description',$price,'$stall_id',$qty,$qty,'Administrator')";
							if(mysqli_query($con_str,$query)){
							echo '200';	
						}
					}else{
						echo 'Item already exist!';
					}
}

?>

