<?php
require ("../../db_connection/myConn.php");

$transaction_num=$_GET["transaction_num"];
$query = "SELECT `_id`, `_transaction_num`, `_customer_email`, `_customer_name`, `_customer_contact`, `_customer_address`, `_device_type`, `_device_unit`, `_service_type`, `_service`, `_service_charge`, `_qty`, `_sub_total`, `_item_code`, `_item`, `_unit_price`, `_quantity`, `_total_amount`, `_emp_email`, `_emp_name`, `_emp_rate`, `_status` FROM `tbl_service_rendered` WHERE `_transaction_num` LIKE '$transaction_num'";


$columns = array("_id","_device_unit","_service","_service_charge","_qty","_total_amount");



if(isset($_POST["search"]["value"])) {
 $query .= ' AND (`_device_unit` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_service` LIKE "%'.$_POST["search"]["value"].'%"
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


 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_device_unit"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_service"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_service_charge"],2).'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_item"].'</center></div>';
$sub_array[] = '<div id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_unit_price"],2).'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_qty"].'</center></div>';

 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_total_amount"],2).'</center></div>';


 $data[] = $sub_array;
}
function get_all_data($con_str) {
require ("../../db_connection/myConn.php");
$transaction_num=$_GET["transaction_num"];
$query = "SELECT `_id`, `_transaction_num`, `_customer_email`, `_customer_name`, `_customer_contact`, `_customer_address`, `_device_type`, `_device_unit`, `_service_type`, `_service`, `_service_charge`, `_qty`, `_sub_total`, `_item_code`, `_item`, `_unit_price`, `_quantity`, `_total_amount`, `_emp_email`, `_emp_name`, `_emp_rate`, `_status` FROM `tbl_service_rendered` WHERE `_transaction_num` LIKE '$transaction_num'";
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