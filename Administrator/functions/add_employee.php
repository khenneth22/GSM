<?php 
require ("../../db_connection/myConn.php");
$email = $_GET["email"];
$firstname = $_GET["firstname"];
$middlename = $_GET["middlename"];
$lastname = $_GET["lastname"];
$firstname = $_GET["firstname"];
$contact = $_GET["contact"];
$address = $_GET["address"];
$stall_id = $_GET["stall_id"];

$image_name = $_GET["image_name"];

$seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789!@#$%^&*()'); // and any other characters
shuffle($seed); // probably optional since array_is randomized; this may be redundant
$rand = '';
foreach (array_rand($seed, 8) as $k) $rand .= $seed[$k];

$password = $rand;

if($_FILES["file_add"]["name"] != ""){
		
	$test=explode(".", $_FILES["file_add"]["name"]);
	$extension=end($test);
	$image = $image_name.'.'.$extension;
	$location = '../img/employees/'.$image;
	move_uploaded_file($_FILES["file_add"]["tmp_name"], $location);
	$query="INSERT INTO `tbl_users`(`_email`, `_first_name`, `_middle_name`, `_surname`, `_contact`, `_address`, `_usertype`, `_password`, `_status`, `_stall`, `_img`) VALUES ('$email','$firstname','$middlename','$lastname','$contact','$address','Employee','$password','active','$stall_id','$image')";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}else{
						echo 'E-mail address is already taken!';
					}

}else{
	$query="INSERT INTO `tbl_users`(`_email`, `_first_name`, `_middle_name`, `_surname`, `_contact`, `_address`, `_usertype`, `_password`, `_status`, `_stall`) VALUES ('$email','$firstname','$middlename','$lastname','$contact','$address','Employee','$password','active','$stall_id')";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}else{
						echo 'E-mail address is already taken!';
					}
}

?>

