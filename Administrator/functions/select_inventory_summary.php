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


$query = "SELECT DISTINCT(`_item_code`) AS itemcode,`_item`,`description`,MIN(`_id`) AS MINID, SUM(`_in`) AS Replenishment, SUM(`_out`) AS Sales, SUM(`_void_sales`) AS VoidedSales, SUM(`_void_replenishment`) AS VoidedReplenishment , MAX(`_id`) AS MAXID FROM `tbl_inventory` ".$date_filter.$stall_filter;


$columns = array("_item_code","_item","description","_id","_id","_id","_id","_id","_id");


if(isset($_POST["search"]["value"])) {
 $query .= ' AND (`_item_code` LIKE "%'.$_POST["search"]["value"].'%"
 OR `_item` LIKE "%'.$_POST["search"]["value"].'%"
 OR `description` LIKE "%'.$_POST["search"]["value"].'%"
)';
}
$query.='GROUP BY itemcode';
$query1 = '';
// if(isset($_POST["order"])) {
//  $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
//  ';
// } else {
//  $query .= 'ORDER BY Date DESC ';
// }
// $query1 = '';

// if($_POST["length"] != -1) {
//  $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
// }

$number_filter_row = mysqli_num_rows(mysqli_query($con_str, $query));

$result = mysqli_query($con_str, $query . $query1);

$result = mysqli_query($con_str, $query );

$data = array();

while($row = mysqli_fetch_array($result)) {
  $sub_array = array();

$_in=$row["Replenishment"];
$sales=$row["Sales"];
$v_sales=$row["VoidedSales"];
$v_rep=$row["VoidedReplenishment"];
$MINID = $row["MINID"];
$MAXID = $row["MAXID"];

$beginning=0;
$ending=0;

$query = "SELECT  `_beginning` FROM `tbl_inventory` WHERE `_id` = $MINID";
	$result2= $con_str->query($query);

	if($result2->num_rows > 0) {

		while($row2 = $result2->fetch_assoc()) {
			  $beginning = $row2["_beginning"];

		}
	}

$query = "SELECT  `_ending` FROM `tbl_inventory` WHERE `_id` = $MAXID";
	$result2= $con_str->query($query);

	if($result2->num_rows > 0) {

		while($row2 = $result2->fetch_assoc()) {
			  $ending = $row2["_ending"];

		}
	}

 $sub_array[] = '<div id="td_name'.$row["itemcode"].'"><center>'.$row["itemcode"].'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["itemcode"].'"><center>'.$row["_item"].'</center></div>';

 $sub_array[] = '<div id="td_name'.$row["itemcode"].'"><center>'.$row["description"].'</center></div>';

 $sub_array[] = '<div id="td_name'.$row["itemcode"].'"><center>'.$beginning.'</center></div>';
 $sub_array[] = '<div id="td_name'.$row["itemcode"].'"><center>'.$_in.'</center></div>';
$sub_array[] = '<div id="td_name'.$row["itemcode"].'"><center>'.$sales.'</center></div>';
$sub_array[] = '<div id="td_name'.$row["itemcode"].'"><center>'.$v_sales.'</center></div>';
$sub_array[] = '<div id="td_name'.$row["itemcode"].'"><center>'.$v_rep.'</center></div>';
  $sub_array[] = '<div id="td_name'.$row["itemcode"].'"><center>'.$ending.'</center></div>';
 



 $data[] = $sub_array;
}
function get_all_data($con_str) {
require ("../../db_connection/myConn.php");
 $query = "SELECT DISTINCT(`_item_code`) AS itemcode,`_item`,`description`,MIN(`_id`) AS MINID, SUM(`_in`) AS Replenishment, SUM(`_out`) AS Sales, SUM(`_void_sales`) AS VoidedSales, SUM(`_void_replenishment`) AS VoidedReplenishment , MAX(`_id`) AS MAXID FROM `tbl_inventory` ";
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