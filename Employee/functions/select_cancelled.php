<?php
require ("../../db_connection/myConn.php");
session_start();
$stall_id = $_SESSION["_stall"];
$query = "SELECT `_id`, `_transaction_num`, `_date`, `_time`, `_customer_email`, `_customer_name`, `_customer_contact`, `_customer_address`, `_origin`, `_stall_id`, `_status`,`_cancel_reason` FROM `tbl_appointment` WHERE  `_status` LIKE 'cancelled'  AND `_stall_id` LIKE '$stall_id'";


$columns = array("_id","_transaction_num","_date","_time","_id","_stall_id");



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

 $concerns='';
 $totalstr='';
 $total=0;
 $tn = $row["_transaction_num"];
 $sql = "SELECT `_service`,`_device_unit`,`_qty`,`_total_amount` FROM `tbl_service_rendered` WHERE `_transaction_num` LIKE '$tn'";
	$result2= $con_str->query($sql);

	if($result2->num_rows > 0) {

		while($row2 = $result2->fetch_assoc()) {
			 $concerns.='('.$row2["_qty"].')'. $row2["_device_unit"]. ' - ' .$row2["_service"].'<br>';
			 $total+=$row2["_total_amount"];
		}
		$totalstr='₱'.number_format($total,2);
	}	

 $sub_array[] = '<div class="btn-group" id="td_name'.$row["_id"].'">
		    
		    <a  data-toggle="modal" data-target="#concernTableModal" style="color:white;" class="btn btn-dark"
		    data-transaction_num="'.$row["_transaction_num"].'"	
		     id="btn_view" 
		   
		    >View concern</a>

	</div>';

 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_transaction_num"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_date"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_time"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$customer.'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$concerns.'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$totalstr.'</center></div>';

 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_stall_id"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_cancel_reason"].'</center></div>';

 $data[] = $sub_array;
}
function get_all_data($con_str) {
require ("../../db_connection/myConn.php");
$stall_id = $_SESSION["_stall"];
 $query = "SELECT `_id`, `_transaction_num`, `_date`, `_time`, `_customer_email`, `_customer_name`, `_customer_contact`, `_customer_address`, `_origin`, `_stall_id`, `_status` FROM `tbl_appointment` WHERE `_status` LIKE 'cancelled'  AND `_stall_id` LIKE '$stall_id'";
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