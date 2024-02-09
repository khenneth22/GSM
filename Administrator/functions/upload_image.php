<?php 
require ("../../db_connection/myConn.php");
$title = $_GET["title"];

$image_name = $_GET["image_name"];
	

if(empty($_FILES["file_add"]["name"])){
	

}else{
	$test=explode(".", $_FILES["file_add"]["name"]);
	$extension=end($test);
	$image = $image_name.'.'.$extension;
	$location = '../img/gallery/'.$image;
	move_uploaded_file($_FILES["file_add"]["tmp_name"], $location);
	$query="INSERT INTO `tbl_gallery` (`_title`, `_img`) VALUES ('$title','$image')";
					if(mysqli_query($con_str,$query)){
						
							echo '200';	
						}
					
}

?>

