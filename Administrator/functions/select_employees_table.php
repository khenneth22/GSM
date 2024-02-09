<?php
require ("../../db_connection/myConn.php");


$query = "SELECT `_id`, `_email`, `_first_name`, `_middle_name`, `_surname`, `_contact`, `_address`, `_usertype`, `_password`, `_status`, `_stall`, `_img` FROM `tbl_users` WHERE `_usertype` LIKE 'Employee'";


$columns = array("_id","_id","_email","_first_name","_contact","_address","_stall","_status");



if(isset($_POST["search"]["value"])) {
 $query .= ' AND (`_email` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_first_name` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_contact` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_address` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_stall` LIKE "%'.$_POST["search"]["value"].'%"
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

$photo=$row["_img"];
if($photo==''){
	$photo='avatar.png';
}
 
 if($row["_status"]=='active'){
 $sub_array[] = '<div id="td_name'.$row["_id"].'">
 		<div class="dropdown">
 		  <a class ="btn btn-dark btn-circle text-center" style="color:white;">...</a>
 		  <div class="dropdown-content">
		    <a data-toggle="modal" data-target="#employeeModal" id="btn_edit" 
		    data-id="'.$row["_id"].'"
		    data-email="'.$row["_email"].'"
		    data-firstname="'.$row["_first_name"].'"
		    data-middlename="'.$row["_middle_name"].'"
		    data-lastname="'.$row["_surname"].'"
		    data-contact="'.$row["_contact"].'"
		    data-stall_id="'.$row["_stall"].'"
		    data-address="'.$row["_address"].'"
		    data-img="'.$photo.'"
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
		    <a data-toggle="modal" data-target="#employeeModal" id="btn_edit" 
		    data-id="'.$row["_id"].'"
		    data-email="'.$row["_email"].'"
		    data-firstname="'.$row["_first_name"].'"
		    data-middlename="'.$row["_middle_name"].'"
		    data-lastname="'.$row["_surname"].'"
		    data-contact="'.$row["_contact"].'"
		    data-stall_id="'.$row["_stall"].'"
		    data-address="'.$row["_address"].'"
		    data-img="'.$row["_img"].'"
		    >Edit</a>
		    <a id="btn_delete" data-id="'.$row["_id"].'">Delete</a>
		    <a id="btn_activate" data-id="'.$row["_id"].'">Activate</a>
		  </div>
 		</div>
	</div>';
}
$sub_array[] = '<div id="td_name'.$row["_id"].'"><center><img src="img/employees/'.$photo.'" style="height: 80px; width: 80px;border-radius: 50%;box-shadow: 20px 20px 50px lightgrey;"></center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_email"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_first_name"]. ' ' . $row["_middle_name"]. ' ' . $row["_surname"] .'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_contact"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_address"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_stall"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_status"].'</center></div>';

 $data[] = $sub_array;
}
function get_all_data($con_str) {
require ("../../db_connection/myConn.php");
 $query = "SELECT `_id`, `_email`, `_first_name`, `_middle_name`, `_surname`, `_contact`, `_address`, `_usertype`, `_password`, `_status`, `_stall`, `_img` FROM `tbl_users`";
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