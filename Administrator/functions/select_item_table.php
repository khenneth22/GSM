<?php
require ("../../db_connection/myConn.php");


$query = "SELECT `_id`, `_item_code`, `_item`, `description`, `_price`, `_quantity`, `_img`, `_stall_id` FROM `tbl_items`";


$columns = array("_id","_id","_item_code","_item","description","_price","_quantity","_stall_id");



if(isset($_POST["search"]["value"])) {
 $query .= ' WHERE (`_stall_id` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_item_code` LIKE "%'.$_POST["search"]["value"].'%"
 OR `description` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_item` LIKE "%'.$_POST["search"]["value"].'%"
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
	$photo='no-image-available.png';
}
 $sub_array[] = '<div id="td_name'.$row["_id"].'">
 		<div class="dropdown">
 		  <a class ="btn btn-dark btn-circle text-center" style="color:white;">...</a>
 		  <div class="dropdown-content">
		    <a data-toggle="modal" data-target="#employeeModal" id="btn_edit" 
		    data-id="'.$row["_id"].'"
		    data-item_code="'.$row["_item_code"].'"
		    data-item_name="'.$row["_item"].'"
		    data-description="'.$row["description"].'"
		    data-qty="'.$row["_quantity"].'"
		    data-price="'.$row["_price"].'"
		    data-stall_id="'.$row["_stall_id"].'"
		    data-img="'.$photo.'"
		    data-stall_id="'.$row["_stall_id"].'"
		    >Edit</a>
		    <a id="btn_delete" data-id="'.$row["_id"].'"
		    data-item_code="'.$row["_item_code"].'"
			data-stall_id="'.$row["_stall_id"].'"
		    >Delete</a>
		    
		  </div>
 		</div>
	</div>';
 
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center><img src="img/items/'.$photo.'" style="height: 80px; width: 80px;border-radius: 15px;box-shadow: 20px 20px 50px lightgrey;"></center></div>';

 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_item_code"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_item"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["description"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>₱'.number_format($row["_price"],2).'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_quantity"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_stall_id"].'</center></div>';

 $data[] = $sub_array;
}
function get_all_data($con_str) {
require ("../../db_connection/myConn.php");
 $query = "SELECT `_id`, `_item_code`, `_item`, `description`, `_price`, `_quantity`, `_img`, `_stall_id` FROM `tbl_items`";
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