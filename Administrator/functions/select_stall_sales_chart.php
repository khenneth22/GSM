<?php
require ("../../db_connection/myConn.php");
$_year = $_GET['_year'];
session_start();


$data=array();

$value=0;


$stall_sql = "SELECT `_id`, `_stall_id`, `_location`, `_status` FROM `tbl_stall` WHERE `_status` LIKE 'active' ORDER BY `_stall_id`";
	$result_stall= $con_str->query($stall_sql);

	if($result_stall->num_rows > 0) {

		while($row_stall = $result_stall->fetch_assoc()) {
			$stall_id='';
			$stall_id=$row_stall["_stall_id"];

			$query = "SELECT SUM(_total_amount) AS `_orders` from `tbl_service_rendered` WHERE `_status` LIKE 'completed' AND `_date_completed` LIKE '$_year%' AND `_stall_id` LIKE '$stall_id' ";
				$result= $con_str->query($query);

				if($result->num_rows > 0) {

					while($row = $result->fetch_assoc()) {
						  $value= $row["_orders"];
							
							if ($value>0 && $value!='') {
								$data[] =$value;
							}else{
								$data[]=0;
							}	

					}
				}

		}
	}






	 // $data[]=array( 'jan'=>$jan, 'feb'=>$feb,'mar'=>$mar,'apr'=>$apr,'may'=>$may,'jun'=>$jun,'jul'=>$jul,'aug'=>$aug,'sept'=>$sept,'oct'=>$oct,'nov'=>$nov,'dec'=>$dec );
	echo  json_encode( $data );
?>