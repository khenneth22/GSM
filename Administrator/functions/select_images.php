<?php
require ("../../db_connection/myConn.php");


$query = "SELECT `_id`, `_title`, `_img` FROM `tbl_gallery`";


$columns = array("_id","_title","_img");



if(isset($_POST["search"]["value"])) {
 $query .= ' WHERE (`_title` LIKE "%'.$_POST["search"]["value"].'%"
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
		    data-title="'.$row["_title"].'"
		   
		    data-img="'.$photo.'"
		    
		    >Edit</a>
		    <a id="btn_delete" data-id="'.$row["_id"].'"
		    >Delete</a>
		    
		  </div>
 		</div>
	</div>';
 
 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center><img src="img/gallery/'.$photo.'" style="height: 80px; width: 80px;border-radius: 15px;box-shadow: 20px 20px 50px lightgrey;"></center></div>';

 $sub_array[] = '<div id="td_name'.$row["_id"].'"><center>'.$row["_title"].'</center></div>';
 

 $data[] = $sub_array;
}
function get_all_data($con_str) {
require ("../../db_connection/myConn.php");
 $query = "SELECT `_id`, `_title`, `_img` FROM `tbl_gallery`";
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