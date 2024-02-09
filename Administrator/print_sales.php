<?php
session_start();
require ("../db_connection/myConn.php");
$stall = $_GET["stall"];
$type = $_GET["type"];
if ($type=='appointment'){
  $type="Appointment";
}else if ($type=='walkin'){
  $type="Walk-in";
}else{
  $type='';
}
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

          	<center><h5>Service Rendered / Sales Report</h5></center>
            <center><h5><?php echo $type; ?></h5></center>
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
                                                         
                                                            <th class="text-center" width="1%">
                                                              Type
                                                            </th>
                                                            <th class="text-center">
                                                              Date
                                                            </th>
                                                            <th class="text-center">
                                                              Transaction#
                                                            </th>
                                                            
                                                            <th class="text-center">
                                                             Customer
                                                            </th>
                                                            <th class="text-center">
                                                            Technician
                                                          </th>
                                                          <th class="text-center">
                                                              Service
                                                          </th>
                                                          <th class="text-center">
                                                              Service Charge
                                                          </th>
                                                            <th class="text-center">
                                                             Total
                                                            </th>
                                                            <th class="text-center">
                                                             Stall
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
  $date_filter = "AND (`_date_completed` BETWEEN '".$date_from."' AND '".$date_to."')";
}else if ($date_from!='' && $date_to =='') {
  $date_filter = "AND (`_date_completed` LIKE '".$date_from."')";
}else if ($date_from=='' && $date_to !='') {
  $date_filter = "AND (`_date_completed` BETWEEN '%%%%-%%-%%' AND '".$date_to."')";
}else{
  $date_filter="AND (`_date_completed` LIKE '%')";
}

$stall = $_GET["stall"];

if ($stall=='') {
  $stall_filter="AND `_stall_id` LIKE '%'";
}else{
  $stall_filter="AND `_stall_id` LIKE '$stall'";
}

$origin = $_GET["type"];
$originfilter='';
if ($origin=='') {
  $originfilter="AND `_origin` LIKE '%'";
}else{
  $originfilter="AND `_origin` LIKE '$origin'";
}
$query = "SELECT `_id`, `_transaction_num`, `_date`, `_time`, `_customer_email`, `_customer_name`, `_customer_contact`, `_customer_address`, `_origin`, `_stall_id`, `_status`,`_cancel_reason`,`_rating`,`_feedback`,`_date_feedback`,`_date_completed`,`_emp_name` FROM `tbl_appointment` WHERE `_status` LIKE 'completed'".$date_filter.$stall_filter.$originfilter;
				$result= $con_str->query($query);

				$output='';
        $total=0;
				if($result->num_rows > 0) {
					
					while($row = $result->fetch_assoc()) {
            $customer='Name: '. $row["_customer_name"] . '<br>Contact: '.$row["_customer_contact"]. '<br>Address: '.$row["_customer_address"];
 $technician='';
 $concerns='';
 $totalstr='';
 $total=0;
 $tn = $row["_transaction_num"];
 $totalSalary=0;
 $totalsalaryStr='';
 $sql = "SELECT `_service_charge`,`_unit_price`,`_service`,`_device_unit`,`_qty`,`_total_amount`,`_emp_name`,`_emp_rate` FROM `tbl_service_rendered` WHERE `_transaction_num` LIKE '$tn' AND `_status` LIKE 'completed'";
  $result2= $con_str->query($sql);

  if($result2->num_rows > 0) {

    while($row2 = $result2->fetch_assoc()) {
       $concerns.='('.$row2["_qty"].')'. $row2["_device_unit"]. ' - ' .$row2["_service"].' -> '.number_format($row2["_unit_price"],2).'<hr>';
       $total+=$row2["_total_amount"];
       $technician = $row2["_emp_name"];
       $totalSalary+=($row2["_service_charge"] * $row2["_qty"]);
    }
    $totalstr='₱'.number_format($total,2);
    $totalsalaryStr='₱'.number_format($totalSalary,2);
  } 
					$output.= '<tr>';	 
					$output.= '<td id="td_name'.$row["_id"].'"><center>'.$row["_origin"].'</center></td>';
 $output.= '<td id="td_name'.$row["_id"].'"><center>'.$row["_date_completed"].'</center></td>';
 $output.= '<td id="td_name'.$row["_id"].'"><center>'.$row["_transaction_num"].'</center></td>';

$output.= '<td id="td_name'.$row["_id"].'"><center>'.$customer.'</center></td>';
$output.= '<td id="td_name'.$row["_id"].'"><center>'.$technician.'</center></td>';
 $output.= '<td id="td_name'.$row["_id"].'"><center>'.$concerns.'</center></td>';
 $output.= '<td id="td_name'.$row["_id"].'"><center>'.$totalsalaryStr.'</center></td>';
 $output.= '<td id="td_name'.$row["_id"].'"><center>'.$totalstr.'</center></td>';

 $output.= '<td id="td_name'.$row["_id"].'"><center>'.$row["_stall_id"].'</center></td>';
							$output.= '</tr>';

		
					}
				
				}
				echo $output;
			?>

                                                      </table>
                                                      <hr>

            <span class="text-end" style="margin-top: 20px;font-style: italic;" ><strong>Total Sales: <?php echo $total; ?></strong></span><br>                                          
			
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