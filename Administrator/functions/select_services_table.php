<?php
require ("../../db_connection/myConn.php");


$query = "SELECT `_id`, `_device_type`, `_device_unit`, `_service_type`, `_service`, `_service_charge`, `_emp_rate`,`_item_code` FROM `tbl_services`";


$columns = array("_id","_device_type","_device_unit","_service_type","_service","_service_charge","_emp_rate");



if(isset($_POST["search"]["value"])) {
 $query .= ' WHERE (`_device_type` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_device_unit` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_service_type` LIKE "%'.$_POST["search"]["value"].'%"
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


 

 $sub_array[] = '<div id="td_name'.$row["_id"].'">
 		<div class="dropdown">
 		  <a class ="btn btn-dark btn-circle text-center" style="color:white;">...</a>
 		  <div class="dropdown-content">
		    <a data-toggle="modal" data-target="#employeeModal" id="btn_edit" 
		    data-id="'.$row["_id"].'"
		    data-_type="'.$row["_device_type"].'"
		    data-_device_unit="'.$row["_device_unit"].'"
		    data-service_type="'.$row["_service_type"].'"
		    data-service="'.$row["_service"].'"
		    data-service_charge="'.$row["_service_charge"].'"
		    data-emp_rate="'.$row["_emp_rate"].'"
		    data-item_code="'.$row["_item_code"].'"
		    >Edit</a>
		    <a id="btn_delete" data-id="'.$row["_id"].'">Delete</a>
		  </div>
 		</div>
	</div>';

 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_device_type"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_device_unit"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_service_type"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_service"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_service_charge"],2).'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_emp_rate"],2).'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_item_code"].'</center></div>';

 $data[] = $sub_array;
}
function get_all_data($con_str) {
require ("../../db_connection/myConn.php");
 $query = "SELECT `_id`, `_device_type`, `_device_unit`, `_service_type`, `_service`, `_service_charge`, `_emp_rate` FROM `tbl_services`";
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