<?php
require ("../../db_connection/myConn.php");

session_start();
$email = $_SESSION['_email']; 
$new_password = $_GET["new_password"];

$apiresponse='';

	$query="UPDATE `tbl_users` SET `_password` = '$new_password' WHERE `_email` LIKE '$email'";
					if(mysqli_query($con_str,$query)){

				
						$apiresponse = "200";
					}
		

	echo $apiresponse;



?>

