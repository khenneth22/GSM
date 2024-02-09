<?php 
require ("../../db_connection/myConn.php");
session_start();
$transaction_num = $_GET["transaction_num"];
$reason = $_GET["reason"];
$email = $_SESSION['_email'];
$emp_name = $_SESSION['_first_name'] . ' ' . $_SESSION['_middle_name']. ' '.$_SESSION['_surname'] ;

	$query="UPDATE `tbl_appointment` SET `_status` ='declined',`_cancel_reason` = '$reason',`_emp_email` ='$email',`_emp_name` = '$emp_name' WHERE `_transaction_num` LIKE '$transaction_num'";
					if(mysqli_query($con_str,$query)){

							$query="UPDATE `tbl_service_rendered` SET `_status` ='declined',`_emp_email` ='$email',`_emp_name` = '$emp_name' WHERE `_transaction_num` LIKE '$transaction_num'";
										if(mysqli_query($con_str,$query)){
											echo '200';	
										}

				}
	


		
	
?> 