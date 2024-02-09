<?php 
require ("../../db_connection/myConn.php");
session_start();
$_date = $_GET["_date"];
$_time = $_GET["_time"];
$stall_id = $_GET["stall_id"];
$email = $_SESSION['_email'];
$customer_name = $_SESSION['_first_name'] . ' ' . $_SESSION['_middle_name']. ' '.$_SESSION['_surname'] ;
$contact = $_SESSION['_contact'];
$address = $_SESSION['_address'];



$tz = 'Asia/Hong_Kong';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp);
$date=(new DateTime('now'));

$now = date_format($dt,"Y-m-d H:i:s");
$transaction_num = date_format($date,"YmdHisu");


	$query = "SELECT * FROM `tbl_appointment` WHERE `_customer_email` LIKE '$email' AND `_date` LIKE '$_date' AND `_stall_id` LIKE '$stall_id'";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {
		echo '501';
	}else{
		$query="INSERT INTO `tbl_appointment`(`_transaction_num`, `_date`, `_time`, `_customer_email`, `_customer_name`, `_customer_contact`, `_customer_address`, `_origin`, `_status`,`_stall_id`) VALUES ('$transaction_num','$_date','$_time','$email','$customer_name','$contact','$address','appointment','pending','$stall_id')";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}
	}
?> 