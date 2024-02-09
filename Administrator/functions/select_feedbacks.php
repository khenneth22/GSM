<?php
require ("../../db_connection/myConn.php");

$query = "SELECT `_id`, `_transaction_num`, `_date`, `_time`, `_customer_email`, `_customer_name`, `_customer_contact`, `_customer_address`, `_origin`, `_stall_id`, `_status`,`_cancel_reason`,`_rating`,`_feedback`,`_date_feedback`,`_date_completed`,`_emp_name` FROM `tbl_appointment` WHERE  `_date_feedback` NOT LIKE '0000-00-00'";


$columns = array("_id","_date_feedback","_date","_time","_id","_stall_id");



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
 
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_date_feedback"].'</center></div>';
$sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$customer.'</center></div>';

 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_stall_id"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_emp_name"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_rating"].' <i style="color:#FFD700;" class="fa fa-star" aria-hidden="true"></i></center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_feedback"].'</center></div>';	



 $data[] = $sub_array;
}
function get_all_data($con_str) {
require ("../../db_connection/myConn.php");
 $query = "SELECT `_id`, `_transaction_num`, `_date`, `_time`, `_customer_email`, `_customer_name`, `_customer_contact`, `_customer_address`, `_origin`, `_stall_id`, `_status` FROM `tbl_appointment` WHERE `_date_feedback` NOT LIKE '0000-00-00'";
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