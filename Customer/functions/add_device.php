<?php 
require ("../../db_connection/myConn.php");
session_start();
$transaction_num = $_GET["transaction_num"];
$id = $_GET["id"];



		$query="UPDATE `tbl_service_rendered` SET `_qty` = `_qty` + 1 , `_sub_total` = `_sub_total` + `_service_charge`,`_total_amount` = `_total_amount` + `_service_charge`+`_unit_price`,`_sub_total_item` = `_sub_total_item` + `_unit_price`,`_quantity` =`_quantity` + 1  WHERE `_id` = $id";
					if(mysqli_query($con_str,$query)){
						echo '200';	
					}
	


		
	
?> 