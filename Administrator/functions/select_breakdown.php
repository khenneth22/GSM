<?php
require ("../../db_connection/myConn.php");
$date_from=$_GET["date_from"];
$date_to=$_GET["date_to"];
$emp_email=$_GET["_email"];

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

$query = "SELECT `_id`, `_date_completed`,`_service`,`_emp_rate` FROM `tbl_service_rendered` WHERE `_status` LIKE 'completed' AND `_emp_email` LIKE '$emp_email' ".$date_filter;


$columns = array("_date_completed","_service","_service_charge");

if(isset($_POST["order"])) {
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
} else {
 $query .= 'ORDER BY _id ';
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

 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_date_completed"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_service"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_emp_rate"],2).'</center></div>';

 $data[] = $sub_array;
}
function get_all_data($con_str) {
require ("../../db_connection/myConn.php");
$emp_email=$_GET["_email"];
 $query = "SELECT `_date_completed`,`_service`,`_service_charge` FROM `tbl_service_rendered` WHERE `_status` LIKE 'completed' AND `_emp_email` LIKE '$emp_email'";
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