<?php 
require ("../../db_connection/myConn.php");
$title = $_GET["title"];

$image_name = $_GET["image_name"];
$id = $_GET["id"];	

if(empty($_FILES["file_add"]["name"])){
	$query="UPDATE `tbl_gallery` SET `_title`='$title' WHERE `_id` = $id";
					if(mysqli_query($con_str,$query)){
						
							echo '200';	
						}
					

}else{
	$test=explode(".", $_FILES["file_add"]["name"]);
	$extension=end($test);
	$image = $image_name.'.'.$extension;
	$location = '../img/gallery/'.$image;
	move_uploaded_file($_FILES["file_add"]["tmp_name"], $location);
	$query="UPDATE `tbl_gallery` SET `_title`='$title', `_img`='$image' WHERE `_id` = $id";
					if(mysqli_query($con_str,$query)){
						
							echo '200';	
						}
					
}

?>

