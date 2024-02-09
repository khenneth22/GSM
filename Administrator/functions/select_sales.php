<?php
require ("../../db_connection/myConn.php");

$date_from=$_GET["date_from"];
$date_to=$_GET["date_to"];
$stall_filter='';

$date_filter='';
if ($date_from!='' && $date_to !='') {
	$date_filter = "AND (`_date_completed` BETWEEN '".$date_from."' AND '".$date_to."')";
}else if ($date_from!='' && $date_to =='') {
	$date_filter = "AND (`_date_completed` LIKE '".$date_from."')";
}else if ($date_from=='' && $date_to !='') {
	$date_filter = "AND (`_date_completed` BETWEEN '%%%%-%%-%%' AND '".$date_to."')";
}else{
	$date_filter="AND (`_date_completed` LIKE '%')";
}

$stall = $_GET["stall"];

if ($stall=='') {
	$stall_filter="AND `_stall_id` LIKE '%'";
}else{
	$stall_filter="AND `_stall_id` LIKE '$stall'";
}

$origin = $_GET["type"];
$originfilter='';
if ($origin=='') {
	$originfilter="AND `_origin` LIKE '%'";
}else{
	$originfilter="AND `_origin` LIKE '$origin'";
}
$query = "SELECT `_id`, `_transaction_num`, `_date`, `_time`, `_customer_email`, `_customer_name`, `_customer_contact`, `_customer_address`, `_origin`, `_stall_id`, `_status`,`_cancel_reason`,`_rating`,`_feedback`,`_date_feedback`,`_date_completed`,`_emp_name` FROM `tbl_appointment` WHERE `_status` LIKE 'completed'".$date_filter.$stall_filter.$originfilter;


$columns = array("_id","_transaction_num","_date","_time","_id","_stall_id","_id");



if(isset($_POST["search"]["value"])) {
 $query .= ' AND (`_transaction_num` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_time` LIKE "%'.$_POST["search"]["value"].'%"
)';
}

if(isset($_POST["order"])) {
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
} else {
 $query .= 'ORDER BY _id DESC ';
}

$query1 = '';

if($_POST["length"] != -1) {
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($con_str, $query));

$result = mysqli_query($con_str, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result)) {
  $sub_array = array();
$customer='Name: '. $row["_customer_name"] . '<br>Contact: '.$row["_customer_contact"]. '<br>Address: '.$row["_customer_address"];
 $technician='';
 $concerns='';
 $totalstr='';
 $total=0;
 $tn = $row["_transaction_num"];
 $totalSalary=0;
 $totalsalaryStr='';
 $sql = "SELECT `_service_charge`,`_unit_price`,`_service`,`_device_unit`,`_qty`,`_total_amount`,`_emp_name`,`_emp_rate` FROM `tbl_service_rendered` WHERE `_transaction_num` LIKE '$tn' AND `_status` LIKE 'completed'";
	$result2= $con_str->query($sql);

	if($result2->num_rows > 0) {

		while($row2 = $result2->fetch_assoc()) {
			 $concerns.='('.$row2["_qty"].')'. $row2["_device_unit"]. ' - ' .$row2["_service"].' -> '.number_format($row2["_unit_price"],2).'<hr>';
			 $total+=$row2["_total_amount"];
			 $technician = $row2["_emp_name"];
			 $totalSalary+=($row2["_service_charge"] * $row2["_qty"]);
		}
		$totalstr='₱'.number_format($total,2);
		$totalsalaryStr='₱'.number_format($totalSalary,2);
	}	

 
$sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_origin"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_date_completed"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_transaction_num"].'</center></div>';

$sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$customer.'</center></div>';
$sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$technician.'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$concerns.'</center></div>';
$sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$totalsalaryStr.'</center></div>';

 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$totalstr.'</center></div>';

 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_stall_id"].'</center></div>';



 $data[] = $sub_array;
}
function get_all_data($con_str) {
require ("../../db_connection/myConn.php");
 $query = "SELECT `_id`, `_transaction_num`, `_date`, `_time`, `_customer_email`, `_customer_name`, `_customer_contact`, `_customer_address`, `_origin`, `_stall_id`, `_status` FROM `tbl_appointment` WHERE `_status` LIKE 'completed'";
 $result = mysqli_query($con_str, $query);
 return mysqli_num_rows($result);
}


$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($con_str),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);




?>