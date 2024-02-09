<?php 
require ("../../db_connection/myConn.php");
session_start();
$stall_id = $_GET["stall_id"];
$transaction_num = $_GET["transaction_num"];

$qty=0;
$item_code='';


$tz = 'Asia/Hong_Kong';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp);
$now = date_format($dt,"Y-m-d H:i:s");

	$query="UPDATE `tbl_appointment` SET `_status` ='voided', `_date_processed` = '$now' WHERE `_transaction_num` LIKE '$transaction_num'";
					if(mysqli_query($con_str,$query)){

							$query="UPDATE `tbl_service_rendered` SET `_status` ='voided', `_date_processed` = '$now' WHERE `_transaction_num` LIKE '$transaction_num'";
										if(mysqli_query($con_str,$query)){
											echo '200';	
										}



				$sql2 = "SELECT `_item_code`,`_qty`,`_stall_id` FROM `tbl_service_rendered` WHERE `_transaction_num` LIKE '$transaction_num' AND `_service_type` LIKE 'Hardware'";
						$result2= $con_str->query($sql2);

						if($result2->num_rows > 0) {

							while($row2 = $result2->fetch_assoc()) {

								$qty=0;
								$item_code='';
								$qty=$row2["_qty"];
								$item_code=$row2["_item_code"];


								$sql = "SELECT `_item_code`,`_quantity`,`_item`,`description`,`_price` FROM `tbl_items` WHERE `_item_code` LIKE '$item_code' AND `_stall_id` LIKE '$stall_id'";
									$result= $con_str->query($sql);

									if($result->num_rows > 0) {

										while($row = $result->fetch_assoc()) {
											$currentqty=0;
											$item_name='';
											$description='';
											$price=0;
											$currentqty= $row["_quantity"];
											$item_name=$row["_item"];
											$description=$row["description"];
											$price=$row["_price"];
											$ending_qty = (Int)$currentqty + (Int)$qty;


											$query="INSERT INTO `tbl_inventory`(`_date`,`_item_code`, `_item`, `description`, `_price`, `_stall_id`, `_beginning`,`_void_sales`, `_ending`, `_user`) VALUES ('$now','$item_code','$item_name','$description',$price,'$stall_id',$currentqty,$qty,$ending_qty,'Administrator')";
											if(mysqli_query($con_str,$query)){
											
											}
										$query="UPDATE `tbl_items` SET  `_quantity` = `_quantity` + $qty WHERE `_item_code` LIKE '$item_code' AND `_stall_id` LIKE '$stall_id'";
											if(mysqli_query($con_str,$query)){
											echo '200';	
											}
											
										}
									}

							}

						}	


				}
	
?> 