<?php
require ("../../db_connection/myConn.php");
$_year = $_GET['_year'];
session_start();
$jan = 0;
$feb =0;
$mar=0;
$apr=0;
$may = 0;
$jun = 0;
$jul = 0;
$aug = 0;
$sept = 0;
$oct = 0;
$nov = 0;
$dec = 0;

$data=array();
$query = "SELECT SUM(_total_amount) AS `_orders` from `tbl_service_rendered` WHERE `_status` LIKE 'completed' AND `_date_completed` LIKE '$_year-01%' ";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $jan= $row["_orders"];
				
				if ($jan>0 && $jan!='') {
					$data[] =$jan;
				}else{
					$data[]=0;
				}	

		}
	}

$query = "SELECT SUM(_total_amount) AS `_orders` from `tbl_service_rendered` WHERE `_status` LIKE 'completed' AND `_date_completed` LIKE '$_year-02%' ";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $feb= $row["_orders"];
				
				if ($feb>0 && $feb!='') {
					$data[] =$feb;
				}else{
					$data[]=0;
				}	

		}
	}

$query = "SELECT SUM(_total_amount) AS `_orders` from `tbl_service_rendered` WHERE `_status` LIKE 'completed' AND `_date_completed` LIKE '$_year-03%' ";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			 $mar= $row["_orders"];
				
				if ($mar>0 && $mar!='') {
					$data[] =$mar;
				}else{
					$data[]=0;
				}	

		}
	}

$query = "SELECT SUM(_total_amount) AS `_orders` from `tbl_service_rendered` WHERE `_status` LIKE 'completed' AND `_date_completed` LIKE '$_year-04%' ";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			 $jan= $row["_orders"];
				
				if ($apr>0 && $apr!='') {
					$data[] =$apr;
				}else{
					$data[]=0;
				}	

		}
	}

$query = "SELECT SUM(_total_amount) AS `_orders` from `tbl_service_rendered` WHERE `_status` LIKE 'completed' AND `_date_completed` LIKE '$_year-05%' ";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			 $may= $row["_orders"];
				
				if ($may>0 && $may!='') {
					$data[] =$may;
				}else{
					$data[]=0;
				}	
		}
	}

$query = "SELECT SUM(_total_amount) AS `_orders` from `tbl_service_rendered` WHERE `_status` LIKE 'completed' AND `_date_completed` LIKE '$_year-06%' ";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			 $jun= $row["_orders"];
				
				if ($jun>0 && $jun!='') {
					$data[] =$jun;
				}else{
					$data[]=0;
				}	

		}
	}

$query = "SELECT SUM(_total_amount) AS `_orders` from `tbl_service_rendered` WHERE `_status` LIKE 'completed' AND `_date_completed` LIKE '$_year-07%' ";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $jul= $row["_orders"];
				
				if ($jul>0 && $jul!='') {
					$data[] =$jul;
				}else{
					$data[]=0;
				}	

		}
	}

$query = "SELECT SUM(_total_amount) AS `_orders` from `tbl_service_rendered` WHERE `_status` LIKE 'completed' AND `_date_completed` LIKE '$_year-08%' ";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $aug= $row["_orders"];
				
				if ($aug>0 && $aug!='') {
					$data[] =$aug;
				}else{
					$data[]=0;
				}	

		}
	}

$query = "SELECT SUM(_total_amount) AS `_orders` from `tbl_service_rendered` WHERE `_status` LIKE 'completed' AND `_date_completed` LIKE '$_year-09%' ";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $sept	= $row["_orders"];
				
				if ($sept	>0 && $sept	!='') {
					$data[] =$sept	;
				}else{
					$data[]=0;
				}	

		}
	}

$query = "SELECT SUM(_total_amount) AS `_orders` from `tbl_service_rendered` WHERE `_status` LIKE 'completed' AND `_date_completed` LIKE '$_year-10%' ";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $oct= $row["_orders"];
				
				if ($oct>0 && $oct!='') {
					$data[] =$oct;
				}else{
					$data[]=0;
				}	

		}
	}

$query = "SELECT SUM(_total_amount) AS `_orders` from `tbl_service_rendered` WHERE `_status` LIKE 'completed' AND `_date_completed` LIKE '$_year-11%' ";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$nov= $row["_orders"];
				
				if ($nov>0 && $nov!='') {
					$data[] =$nov;
				}else{
					$data[]=0;
				}	

		}
	}

$query = "SELECT SUM(_total_amount) AS `_orders` from `tbl_service_rendered` WHERE `_status` LIKE 'completed' AND `_date_completed` LIKE '$_year-12%' ";
	$result= $con_str->query($query);

	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			  $dec= $row["_orders"];
				
				if ($dec>0 && $dec!='') {
					$data[] =$dec;
				}else{
					$data[]=0;
				}	

		}
	}


	 // $data[]=array( 'jan'=>$jan, 'feb'=>$feb,'mar'=>$mar,'apr'=>$apr,'may'=>$may,'jun'=>$jun,'jul'=>$jul,'aug'=>$aug,'sept'=>$sept,'oct'=>$oct,'nov'=>$nov,'dec'=>$dec );
	echo  json_encode( $data );
?>