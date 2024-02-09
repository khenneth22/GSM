<?php 
require ("../../db_connection/myConn.php");
session_start();

$stall_id = $_SESSION["_stall"];
$emp_email = $_SESSION['_email'];

$emp_name = $_SESSION['_first_name'] . ' ' . $_SESSION['_middle_name']. ' '.$_SESSION['_surname'] ;

$customer_name = $_GET['customer_name'];
$contact = $_GET['customer_contact'];
$address = $_GET['customer_address'];



$tz = 'Asia/Hong_Kong';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp);
$date=(new DateTime('now'));

$now = date_format($dt,"Y-m-d");
$time_now = date_format($dt,"H:i:s");
$transaction_num = date_format($date,"YmdHisu");



		$query="INSERT INTO `tbl_appointment`(`_transaction_num`, `_date`, `_time`, `_customer_name`, `_customer_contact`, `_customer_address`, `_origin`, `_status`,`_stall_id`,`_emp_email`,`_emp_name`) VALUES ('$transaction_num','$now','$time_now','$customer_name','$contact','$address','walkin','approved','$stall_id','$emp_email','$emp_name')";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}
	
?> 