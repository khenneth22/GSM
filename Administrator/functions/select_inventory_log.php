<?php
require ("../../db_connection/myConn.php");
$date_from=$_GET["date_from"];
$date_to=$_GET["date_to"];
$stall_filter='';

$date_filter='';
if ($date_from!='' && $date_to !='') {
	$date_filter = "WHERE (`_date` BETWEEN '".$date_from."' AND '".$date_to."')";
}else if ($date_from!='' && $date_to =='') {
	$date_filter = "WHERE (`_date` LIKE '".$date_from."')";
}else if ($date_from=='' && $date_to !='') {
	$date_filter = "WHERE (`_date` BETWEEN '%%%%-%%-%%' AND '".$date_to."')";
}else{
	$date_filter="WHERE (`_date` LIKE '%')";
}

$stall = $_GET["stall"];

if ($stall=='') {
	$stall_filter="AND `_stall_id` LIKE '%'";
}else{
	$stall_filter="AND `_stall_id` LIKE '$stall'";
}

$query = "SELECT `_id`, `_date`, `_item_code`, `_item`, `description`, `_price`, `_stall_id`, `_beginning`, `_in`, `_out`, `_void_sales`, `_void_replenishment`, `_ending`, `_user` FROM `tbl_inventory`".$date_filter.$stall_filter;


$columns = array("_date","_item_code","_item","description","_beginning","_in","_out","_void_sales","_void_replenishment","_ending","_user");



if(isset($_POST["search"]["value"])) {
 $query .= ' AND (`_item_code` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_item` LIKE "%'.$_POST["search"]["value"].'%"
 OR `description` LIKE "%'.$_POST["search"]["value"].'%"
)';
}

if(isset($_POST["order"])) {
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
} else {
 $query .= 'ORDER BY _date ';
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


 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_date"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_item_code"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_item"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["description"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_beginning"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_in"].'</center></div>';
$sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_out"].'</center></div>';
$sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_void_sales"].'</center></div>';
$sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_void_replenishment"].'</center></div>';
$sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_ending"].'</center></div>';
$sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_user"].'</center></div>';
 $data[] = $sub_array;
}
function get_all_data($con_str) {
require ("../../db_connection/myConn.php");
 $query = "SELECT `_id`, `_date`, `_item_code`, `_item`, `description`, `_price`, `_stall_id`, `_beginning`, `_in`, `_out`, `_void_sales`, `_void_replenishment`, `_ending`, `_user` FROM `tbl_inventory`";
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