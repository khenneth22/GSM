<?php 
require ("../../db_connection/myConn.php");
$email = $_GET["email"];
$firstname = $_GET["firstname"];
$middlename = $_GET["middlename"];
$lastname = $_GET["lastname"];
$firstname = $_GET["firstname"];
$contact = $_GET["contact"];
$address = $_GET["address"];


$password = $_GET['password'];


	$query="INSERT INTO `tbl_users`(`_email`, `_first_name`, `_middle_name`, `_surname`, `_contact`, `_address`, `_usertype`, `_password`, `_status`) VALUES ('$email','$firstname','$middlename','$lastname','$contact','$address','Customer','$password','pending')";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}else{
						echo 'E-mail address is already taken!';
					}


?>

