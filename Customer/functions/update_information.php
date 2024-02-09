<?php 
require ("../../db_connection/myConn.php");
$email = $_GET["email"];
$firstname = $_GET["firstname"];
$middlename = $_GET["middlename"];
$lastname = $_GET["lastname"];
$firstname = $_GET["firstname"];
$contact = $_GET["contact"];
$address = $_GET["address"];

$image_name = $_GET["image_name"];


if(empty($_FILES["file_add"]["name"])){
		
	$query="UPDATE `tbl_users` SET `_first_name`='$firstname', `_middle_name`='$middlename', `_surname`='$lastname', `_contact`='$contact', `_address`='$address', `_stall`='$stall_id' WHERE `_email` LIKE '$email'";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}

}else{
	$test=explode(".", $_FILES["file_add"]["name"]);
	$extension=end($test);
	$image = $image_name.'.'.$extension;
	$location = '../img/my-img/'.$image;
	move_uploaded_file($_FILES["file_add"]["tmp_name"], $location);
	$query="UPDATE `tbl_users` SET `_first_name`='$firstname', `_middle_name`='$middlename', `_surname`='$lastname', `_contact`='$contact', `_address`='$address', `_stall`='$stall_id', `_img`='$image' WHERE `_email` LIKE '$email'";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}
}

?>

