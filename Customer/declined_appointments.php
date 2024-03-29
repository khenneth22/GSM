<?php
session_start();
$user_type='';
if(empty($_SESSION['_usertype'])) {
    header("Location: ../logout.php");
}else{
  $user_type =$_SESSION['_usertype']; 
  if ($user_type!='Customer') {
    header("Location: ../logout.php");
    
  }
  $photo = $_SESSION['_img'];
  $firstname = $_SESSION["_first_name"];
  $stall_id = $_SESSION["_stall"];
  if ($photo=='') {
    $photo='avatar.png';
  }
}

$email = $_SESSION["_email"];
require ("../db_connection/myConn.php");
$requestcount=0;
$sql = "SELECT COUNT(_id) AS requests FROM `tbl_appointment`  WHERE `_status` LIKE 'approved' AND `_customer_email` LIKE '$email'";
    $result= $con_str->query($sql);

  if($result->num_rows > 0) {
                
    while($row = $result->fetch_assoc()) {
      $requestcount = $row["requests"];
    }
  }
if ($requestcount==0){
  $requestcount ='';
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

  <title>Declined Appointments - GSM Pioneer</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style>
.required-fields { /* Chrome, Firefox, Opera, Safari 10.1+ */
  border-color:  red;
}
/* Dropdown Button */
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #333333;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <!-- <i class="fas fa-laugh-wink"></i> -->
          GSM
        </div>
        <div class="sidebar-brand-text mx-3">Pioneer</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa fa-calendar-check"></i>
          <span>Appointments <sup><strong><?php echo $requestcount; ?></strong></sup></span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

     
      <li class="nav-item">
        <a class="nav-link" href="requests.php">
          <i class="fas fa-fw fa fa-calendar"></i>
          <span>Appointment Requests</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cancelled.php">
          <i class="fas fa-fw fa fa-calendar-minus"></i>
          <span>Cancelled</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="declined_appointments.php">
          <i class="fas fa-fw fa fa-calendar-times"></i>
          <span>Declined</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="history.php">
          <i class="fas fa-fw fa fa-history"></i>
          <span>Repair History</span></a>
      </li>
     
      
    


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <h3>DECLINED APPOINTMENTS</h3>
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

         

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hi, <?php echo $firstname; ?></span>

                <?php
                $output='';
                if ($photo=='') {
                  $output.='<img class="img-profile rounded-circle" src="img/avatar.png">';
                }else{
                  $output.='<img class="img-profile rounded-circle" src="img/my-img/'.$photo.'">';
                }
                echo $output;
                ?>
                
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
              
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" style="margin-bottom: 20px;">

        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                Cancelled Appointments 
              </div>
                <div class="card-body">
                  <table class="table table-hover" id="tbl_health">
                      <thead class="table-header">
                          <tr> 
                            <th width="1%" class="text-center">
                              Action
                            </th>  
                            <th class="text-center">
                             Transaction #
                            </th>
                            <th class="text-center">
                             Date
                            </th>
                            <th class="text-center">
                             Time
                            </th>
                            <th class="text-center">
                             Concern(s)
                            </th>
                            <th class="text-center">
                             Total
                            </th>

                            <th class="text-center">
                             Stall
                            </th> 

                            <th class="text-center">
                             Reason
                            </th> 

                          </tr>
                      </thead>                      
                    </table>
                </div>
            </div>
          </div>
        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto" id="copyright">
            <span>Copyright &copy; GSM Pioneer <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

 

  <div class="modal fade" id="concernTableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Concerns</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container table-responsive">
           <table class="table table-hover" id="tbl_concerns">
                      <thead class="table-header">
                          <tr> 
                           
                            <th class="text-center">
                              Device
                            </th>
                            <th class="text-center">
                              Service
                            </th>
                            <th class="text-center">
                              Service charge
                            </th>
                            <th class="text-center">
                              Item
                            </th>
                            <th class="text-center">
                              Price
                            </th>
                            <th class="text-center">
                              Device count
                            </th>
                            <th class="text-center">
                             Total
                            </th>
                            
                          </tr>
                      </thead>                      
                    </table>
                  </div>

        </div>
        <div class="modal-footer">
        
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cancel?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <span>Reason</span>
          <select class="form-control" id="opt_reason">
            <option value="" selected="" hidden="" >Please select your reason...</option>
            <option value="Change of date or time">Change of date or time</option>
            <option value="Change of device/service/concern">Change of device/service/concern</option>
            <option value="Found much cheaper offer">Found much cheaper offer</option>
            <option value="Found a nearby repair shop">Found a nearby repair shop</option>
            <option value="Does not need repair anymore.">Does not need repair anymore.</option>
          </select>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          <a class="btn btn-danger" style="color:white;" id="btn_submit_cancel">Confirm</a>
        </div>
      </div>
    </div>
  </div>

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

</body>

</html>

<script type="text/javascript">

    $(document).ready(function() {
      fetchRecord();
    });

   
  function fetchRecord(){

    $('#tbl_health').DataTable().destroy();
  
   var dataTable1 = $('#tbl_health').DataTable({

    "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l>f<"pull-right"><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
    "processing" : true,
    "bStateSave": true, //stay on this page
    "responsive": true,
    "serverSide" : true,
    "order" : [],
    "drawCallback": function(settings) {
    //console.log(settings.json);
   
    },
    "ajax" : {
     url:"functions/select_declined.php?",
     type:"POST",
     cache:false,

     beforeSend:function() {

                   
                }       
    },
    "autoWidth" : false
   });
}

function fetchConcerns(transaction_num){

    $('#tbl_concerns').DataTable().destroy();
  
   var dataTable1 = $('#tbl_concerns').DataTable({

    "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l>f<"pull-right"><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
    "processing" : true,
    "bStateSave": true, //stay on this page
    "responsive": false,
    "serverSide" : true,
    "order" : [],
    "drawCallback": function(settings) {
    //console.log(settings.json);
   
    },
    "ajax" : {
     url:"functions/select_concerns.php?transaction_num="+transaction_num,
     type:"POST",
     cache:false,

     beforeSend:function() {

                   
                }       
    },
    "autoWidth" : false
   });
}


  $(document).on("click", "#btn_view", function() {
      var transaction_num = $(this).data('transaction_num');
      fetchConcerns(transaction_num);
  });

   
</script>
