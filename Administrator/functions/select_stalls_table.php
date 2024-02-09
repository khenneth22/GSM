<?php
require ("../../db_connection/myConn.php");


$query = "SELECT `_id`, `_stall_id`, `_location`, `_status` FROM `tbl_stall`";


$columns = array("_id","_stall_id","_location","_status");



if(isset($_POST["search"]["value"])) {
 $query .= ' WHERE (`_stall_id` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_location` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_status` LIKE "%'.$_POST["search"]["value"].'%"
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


 
 if($row["_status"]=='active'){
 $sub_array[] = '<div id="td_name'.$row["_id"].'">
 		<div class="dropdown">
 		  <a class ="btn btn-dark btn-circle text-center" style="color:white;">...</a>
 		  <div class="dropdown-content">
		    <a data-toggle="modal" data-target="#stallModal" id="btn_edit" 
		    data-id="'.$row["_id"].'"
		    data-stall_id="'.$row["_stall_id"].'"
		    data-_location="'.$row["_location"].'"
		    >Edit</a>
		    <a id="btn_delete" data-id="'.$row["_id"].'">Delete</a>
		    <a id="btn_deactivate" data-id="'.$row["_id"].'">Deactivate</a>
		  </div>
 		</div>
	</div>';
}else{
	$sub_array[] = '<div id="td_name'.$row["_id"].'">
 		<div class="dropdown">
 		  <a class ="btn btn-dark btn-circle text-center" style="color:white;">...</a>
 		  <div class="dropdown-content">
		    <a data-toggle="modal" data-target="#stallModal" id="btn_edit" 
		    data-id="'.$row["_id"].'"
		    data-stall_id="'.$row["_stall_id"].'"
		    data-_location="'.$row["_location"].'"
		    >Edit</a>
		    <a id="btn_delete" data-id="'.$row["_id"].'">Delete</a>
		    <a id="btn_activate" data-id="'.$row["_id"].'">Activate</a>
		  </div>
 		</div>
	</div>';
}
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_stall_id"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_location"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_status"].'</center></div>';

 $data[] = $sub_array;
}
function get_all_data($con_str) {
require ("../../db_connection/myConn.php");
 $query = "SELECT `_id`, `_stall_id`, `_location`, `_status` FROM `tbl_stall`";
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