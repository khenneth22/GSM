<?php 
require ("../../db_connection/myConn.php");
session_start();
$transaction_num = $_GET["transaction_num"];
$stall=$_GET["stall"];
$email = $_SESSION['_email'];
$emp_name = $_SESSION['_first_name'] . ' ' . $_SESSION['_middle_name']. ' '.$_SESSION['_surname'] ;

$customer_email='';
$sql = "SELECT `_customer_email` FROM `tbl_appointment`  WHERE  `_transaction_num` LIKE '$transaction_num'";
    $result= $con_str->query($sql);

  if($result->num_rows > 0) {
                
    while($row = $result->fetch_assoc()) {
      $customer_email = $row["_customer_email"];
    }
  }

	$query="UPDATE `tbl_appointment` SET `_status` ='pending',`_emp_email` ='',`_emp_name` = '',`_stall_id` = '$stall' WHERE `_transaction_num` LIKE '$transaction_num'";
					if(mysqli_query($con_str,$query)){

							$query="UPDATE `tbl_service_rendered` SET `_status` ='pending',`_emp_email` ='',`_emp_name` = '',`_stall_id` = '$stall' WHERE `_transaction_num` LIKE '$transaction_num'";
										if(mysqli_query($con_str,$query)){
											echo '200';	
										}

				}
	


		
	
?> 