<?php
session_start();
require ("../db_connection/myConn.php");
$stall = $_GET["stall"];
?>
 
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Print | GSM Pioneer</title>
  <link rel="icon" type="image/x-icon" href="img/logo.png">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <link href="css/sidepanel.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
   
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        
          

        <!-- Begin Page Content -->
        <div class="container-fluid">
         

          <div class="row"> 
           
          <div class="table-responsive" id="tbl">
          	<center><h4>GSM Pioneer</h4></center>
          	<center><h6><?php echo $stall; ?></h6></center>

          	<center><h5>Inventory Summary Report</h5></center>
          	<?php

          	$date_from=$_GET["date_from"];
			$date_to=$_GET["date_to"];
          	if ($date_from!='' && $date_to !='') {
				echo '<center><h6> for '.$date_from . ' to ' . $date_to .'</h6></center>';
			}else if ($date_from!='' && $date_to =='') {
				echo '<center><h6> for '.$date_from.'</h6></center>';
			}else if ($date_from=='' && $date_to !='') {
				echo '<center><h6> for '. $date_to.'</h6></center>';
			}else{
				
			}

          	?>
              <table class="table" id="tbl_sales" >
                                                        <thead class="">
                                                          <tr>
                                                         
                                                          
                                                            <th class="text-center">
                                                              Item Code
                                                            </th>
                                                            <th class="text-center">
                                                              Item
                                                            </th>
                                                            
                                                            <th class="text-center">
                                                             Desctiption
                                                            </th>
                                                            <th class="text-center">
                                                             Beginning
                                                            </th>

                                                            <th class="text-center">
                                                             Replenishment
                                                            </th>
                                                            <th class="text-center">
                                                             Sales
                                                            </th>
                                                            <th class="text-center">
                                                             Voided Sales
                                                            </th>

                                                            <th class="text-center">
                                                             Voided Replenishment
                                                            </th>
                                                          
                                                          </tr>
                                                        </thead>
                                                        <hr>
			<?php

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
$query = "SELECT DISTINCT(`_item_code`) AS itemcode,`_item`,`description`,MIN(`_id`) AS MINID, SUM(`_in`) AS Replenishment, SUM(`_out`) AS Sales, SUM(`_void_sales`) AS VoidedSales, SUM(`_void_replenishment`) AS VoidedReplenishment , MAX(`_id`) AS MAXID FROM `tbl_inventory` ".$date_filter.$stall_filter."GROUP BY itemcode";

				$output='';
        $result= $con_str->query($query);
				if($result->num_rows > 0) {
					
					while($row = $result->fetch_assoc()) {


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

					$output.= '<tr>';	 
					$output.= '<td id="td_name'.$row["itemcode"].'"><center>'.$row["itemcode"].'</center></td>';
 $output.= '<td id="td_name'.$row["itemcode"].'"><center>'.$row["_item"].'</center></td>';

 $output.= '<td id="td_name'.$row["itemcode"].'"><center>'.$row["description"].'</center></td>';

 $output.= '<td id="td_name'.$row["itemcode"].'"><center>'.$beginning.'</center></td>';
 $output.= '<td id="td_name'.$row["itemcode"].'"><center>'.$_in.'</center></td>';
$output.= '<td id="td_name'.$row["itemcode"].'"><center>'.$sales.'</center></td>';
$output.= '<td id="td_name'.$row["itemcode"].'"><center>'.$v_sales.'</center></td>';
$output.= '<td id="td_name'.$row["itemcode"].'"><center>'.$v_rep.'</center></td>';
  $output.= '<td id="td_name'.$row["itemcode"].'"><center>'.$ending.'</center></td>';
				

							$output.= '</tr>';
					}
				
				}
				echo $output;
			?>

                                                      </table>
                                                      <hr>
                </div>
                   </div>

<!-- end of side panel -->


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
    
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
 

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="js/sweetalert2.all.min.js"></script>
 
 <script src="datatables/jquery.dataTables.min.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="datatables/datatables.min.js"></script>
 <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>


  <!-- Page level custom scripts -->
  <script src="datatables/datatables-demo.js"></script>
 


</body>

</html>
<script type="text/javascript">
$(document).ready(function() {
  createPDF();
});


  function createPDF() {
     window.print();
    }
</script>
</script>