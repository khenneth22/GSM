<?php
require ("../../db_connection/myConn.php");
$_date = $_GET["_date"];
$stall_id= $_GET["stall_id"];

$output='<option value="" selected="" hidden="">Please select time...</option>';

$time='7:00 AM - 8:00 AM';
$query = "SELECT COUNT(`_id`) as COUNTER FROM `tbl_appointment` WHERE `_date` LIKE '$_date' AND `_stall_id` LIKE '$stall_id' AND `_time` LIKE '$time' AND `_status` NOT LIKE 'declined' AND `_status` NOT LIKE 'cancelled'";
	$result= $con_str->query($query);
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$counter = $row["COUNTER"];
			if ($counter<2){
				 $output.='<option value="'.$time.'">'.$time. '</option>';
			}

		}
		
	}

$time='8:00 AM - 9:00 AM';
$query = "SELECT COUNT(`_id`) as COUNTER FROM `tbl_appointment` WHERE `_date` LIKE '$_date' AND `_stall_id` LIKE '$stall_id' AND `_time` LIKE '$time' AND `_status` NOT LIKE 'declined' AND `_status` NOT LIKE 'cancelled'";
	$result= $con_str->query($query);
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$counter = $row["COUNTER"];
			if ($counter<2){
				 $output.='<option value="'.$time.'">'.$time. '</option>';
			}

		}
		
	}


$time='9:00 AM - 10:00 AM';
$query = "SELECT COUNT(`_id`) as COUNTER FROM `tbl_appointment` WHERE `_date` LIKE '$_date' AND `_stall_id` LIKE '$stall_id' AND `_time` LIKE '$time' AND `_status` NOT LIKE 'declined' AND `_status` NOT LIKE 'cancelled'";
	$result= $con_str->query($query);
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$counter = $row["COUNTER"];
			if ($counter<2){
				 $output.='<option value="'.$time.'">'.$time. '</option>';
			}

		}
		
	}


$time='10:00 AM - 11:00 AM';
$query = "SELECT COUNT(`_id`) as COUNTER FROM `tbl_appointment` WHERE `_date` LIKE '$_date' AND `_stall_id` LIKE '$stall_id' AND `_time` LIKE '$time' AND `_status` NOT LIKE 'declined' AND `_status` NOT LIKE 'cancelled'";
	$result= $con_str->query($query);
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$counter = $row["COUNTER"];
			if ($counter<2){
				 $output.='<option value="'.$time.'">'.$time. '</option>';
			}

		}
		
	}

$time='11:00 AM - 12:00 NN';
$query = "SELECT COUNT(`_id`) as COUNTER FROM `tbl_appointment` WHERE `_date` LIKE '$_date' AND `_stall_id` LIKE '$stall_id' AND `_time` LIKE '$time' AND `_status` NOT LIKE 'declined' AND `_status` NOT LIKE 'cancelled'";
	$result= $con_str->query($query);
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$counter = $row["COUNTER"];
			if ($counter<2){
				 $output.='<option value="'.$time.'">'.$time. '</option>';
			}

		}
		
	}

$time='12:00 NN - 1:00 PM';
$query = "SELECT COUNT(`_id`) as COUNTER FROM `tbl_appointment` WHERE `_date` LIKE '$_date' AND `_stall_id` LIKE '$stall_id' AND `_time` LIKE '$time' AND `_status` NOT LIKE 'declined' AND `_status` NOT LIKE 'cancelled'";
	$result= $con_str->query($query);
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$counter = $row["COUNTER"];
			if ($counter<2){
				 $output.='<option value="'.$time.'">'.$time. '</option>';
			}

		}
		
	}

$time='1:00 PM - 2:00 PM';
$query = "SELECT COUNT(`_id`) as COUNTER FROM `tbl_appointment` WHERE `_date` LIKE '$_date' AND `_stall_id` LIKE '$stall_id' AND `_time` LIKE '$time' AND `_status` NOT LIKE 'declined' AND `_status` NOT LIKE 'cancelled'";
	$result= $con_str->query($query);
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$counter = $row["COUNTER"];
			if ($counter<2){
				 $output.='<option value="'.$time.'">'.$time. '</option>';
			}

		}
		
	}


$time='2:00 PM - 3:00 PM';
$query = "SELECT COUNT(`_id`) as COUNTER FROM `tbl_appointment` WHERE `_date` LIKE '$_date' AND `_stall_id` LIKE '$stall_id' AND `_time` LIKE '$time' AND `_status` NOT LIKE 'declined' AND `_status` NOT LIKE 'cancelled'";
	$result= $con_str->query($query);
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$counter = $row["COUNTER"];
			if ($counter<2){
				 $output.='<option value="'.$time.'">'.$time. '</option>';
			}

		}
		
	}

$time='3:00 PM - 4:00 PM';
$query = "SELECT COUNT(`_id`) as COUNTER FROM `tbl_appointment` WHERE `_date` LIKE '$_date' AND `_stall_id` LIKE '$stall_id' AND `_time` LIKE '$time' AND `_status` NOT LIKE 'declined' AND `_status` NOT LIKE 'cancelled'";
	$result= $con_str->query($query);
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$counter = $row["COUNTER"];
			if ($counter<2){
				 $output.='<option value="'.$time.'">'.$time. '</option>';
			}

		}
		
	}

$time='4:00 PM - 5:00 PM';
$query = "SELECT COUNT(`_id`) as COUNTER FROM `tbl_appointment` WHERE `_date` LIKE '$_date' AND `_stall_id` LIKE '$stall_id' AND `_time` LIKE '$time' AND `_status` NOT LIKE 'declined' AND `_status` NOT LIKE 'cancelled'";
	$result= $con_str->query($query);
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$counter = $row["COUNTER"];
			if ($counter<2){
				 $output.='<option value="'.$time.'">'.$time. '</option>';
			}

		}
		
	}

$time='5:00 PM - 6:00 PM';
$query = "SELECT COUNT(`_id`) as COUNTER FROM `tbl_appointment` WHERE `_date` LIKE '$_date' AND `_stall_id` LIKE '$stall_id' AND `_time` LIKE '$time' AND `_status` NOT LIKE 'declined' AND `_status` NOT LIKE 'cancelled'";
	$result= $con_str->query($query);
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$counter = $row["COUNTER"];
			if ($counter<2){
				 $output.='<option value="'.$time.'">'.$time. '</option>';
			}

		}
		
	}

$time='6:00 PM - 7:00 PM';
$query = "SELECT COUNT(`_id`) as COUNTER FROM `tbl_appointment` WHERE `_date` LIKE '$_date' AND `_stall_id` LIKE '$stall_id' AND `_time` LIKE '$time' AND `_status` NOT LIKE 'declined' AND `_status` NOT LIKE 'cancelled'";
	$result= $con_str->query($query);
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$counter = $row["COUNTER"];
			if ($counter<2){
				 $output.='<option value="'.$time.'">'.$time. '</option>';
			}

		}
		
	}

$time='7:00 PM - 8:00 PM';
$query = "SELECT COUNT(`_id`) as COUNTER FROM `tbl_appointment` WHERE `_date` LIKE '$_date' AND `_stall_id` LIKE '$stall_id' AND `_time` LIKE '$time' AND `_status` NOT LIKE 'declined' AND `_status` NOT LIKE 'cancelled'";
	$result= $con_str->query($query);
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$counter = $row["COUNTER"];
			if ($counter<2){
				 $output.='<option value="'.$time.'">'.$time. '</option>';
			}

		}
		
	}

$time='8:00 PM - 9:00 PM';
$query = "SELECT COUNT(`_id`) as COUNTER FROM `tbl_appointment` WHERE `_date` LIKE '$_date' AND `_stall_id` LIKE '$stall_id' AND `_time` LIKE '$time' AND `_status` NOT LIKE 'declined' AND `_status` NOT LIKE 'cancelled'";
	$result= $con_str->query($query);
	if($result->num_rows > 0) {

		while($row = $result->fetch_assoc()) {
			$counter = $row["COUNTER"];
			if ($counter<2){
				 $output.='<option value="'.$time.'">'.$time. '</option>';
			}

		}
		
	}






	echo  $output;
?>