<?php
require ("../../db_connection/myConn.php");
	session_start();
	$email = $_GET['email'];
	$password = $_GET['password'];
	$status='';
	$sql = "SELECT `_id`, `_email`, `_first_name`, `_middle_name`, `_surname`, `_contact`, `_address`, `_usertype`, `_password`, `_status`, `_stall`, `_img` FROM `tbl_users` WHERE (`_email` LIKE '$email' ) And (_password LIKE BINARY '$password')  ";
	$result= $con_str->query($sql);

	if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$status= $row["_status"];
				$_SESSION['_usertype'] = $row["_usertype"];
				$_SESSION['_email'] = $row["_email"];
				$_SESSION['_first_name'] = $row["_first_name"];
				$_SESSION['_middle_name'] = $row["_middle_name"];
				$_SESSION['_surname'] = $row["_surname"];
				$_SESSION['_stall'] = $row["_stall"];
				$_SESSION['_contact'] = $row["_contact"];
				$_SESSION['_address'] = $row["_address"];
				$_SESSION['_img'] = $row["_img"];
				$_SESSION['_password'] = $row["_password"];
				$_usertype = $_SESSION['_usertype'];
			}
			if ($status!='active') {
				if ($_usertype=='Customer') {
					session_destroy();
					$_usertype = 'Your account is not verified!';
				}else{
					session_destroy();
					$_usertype = 'Your account is deactivated!';
				}
				
			}
			
	}else{
		$_usertype='Invalid e-mail address or password!';


	}

 	echo $_usertype;
 	$con_str->close();

?>