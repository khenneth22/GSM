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

$date1 = new DateTime($date_from);
$date2 = new DateTime($date_to);

$interval = $date2->diff($date1);
$days = intval($interval->format("%a"));
$days+=1;
$query = "SELECT DISTINCT(`_emp_email`) AS employee, SUM(`_qty` * `_emp_rate`) AS salary,`_stall_id`,`_emp_name` FROM `tbl_service_rendered` WHERE `_status` LIKE 'completed'".$date_filter.$stall_filter;


$columns = array("_stall_id","_stall_id","_stall_id","_stall_id");

if(isset($_POST["search"]["value"])) {
 $query .= ' AND (`_emp_email` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_emp_name` LIKE "%'.$_POST["search"]["value"].'%"
)';
}

$query.='GROUP BY employee';
$query1 = '';
// if(isset($_POST["order"])) {
//  $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
//  ';
// } else {
//  $query .= 'ORDER BY Date DESC ';
// }
// $query1 = '';

// if($_POST["length"] != -1) {
//  $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
// }

$number_filter_row = mysqli_num_rows(mysqli_query($con_str, $query));

$result = mysqli_query($con_str, $query . $query1);

$result = mysqli_query($con_str, $query );

$data = array();

while($row = mysqli_fetch_array($result)) {
  $sub_array = array();

 $sub_array[] = '<div id="td_name'.$row["employee"].'"><center>'.$row["_stall_id"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["employee"].'"><center>'.$row["_emp_name"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["employee"].'"><center>'.$days.' day(s)</center></div>';
 $sub_array[] = '<div id="td_name'.$row["employee"].'"><center>₱'.number_format($row["salary"],2).'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["employee"].'"><center><a id="btn_breakdown" data-_email="'.$row["employee"].'" data-emp_name="'.$row["_emp_name"].'" style="color:white;" class="btn btn-success" data-toggle="modal" data-target="#employeeModal">Breakdown<a></center></div>';


 $data[] = $sub_array;
}
function get_all_data($con_str) {
require ("../../db_connection/myConn.php");
 $query = "SELECT DISTINCT(`_emp_email`) AS employee, SUM(`_qty` * `_service_charge`) AS salary,`_stall_id`,`_emp_name` FROM `tbl_service_rendered` WHERE `_status` LIKE 'completed' GROUP BY employee";
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