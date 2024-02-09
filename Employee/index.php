
<?php
session_start();
$user_type='';
if(empty($_SESSION['_usertype'])) {
    header("Location: ../logout.php");
}else{
  $user_type =$_SESSION['_usertype']; 
  if ($user_type!='Employee') {
    header("Location: ../logout.php");
    
  }
  $photo = $_SESSION['_img'];
  $firstname = $_SESSION["_first_name"];
  $stall_id = $_SESSION["_stall"];
  if ($photo=='') {
    $photo='avatar.png';
  }
}
require ("../db_connection/myConn.php");
$requestcount=0;
$sql = "SELECT COUNT(_id) AS requests FROM `tbl_appointment`  WHERE `_status` LIKE 'pending' AND `_stall_id` LIKE '$stall_id'";
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

  <title>Appointments - GSM Pioneer</title>

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
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa fa-calendar-check"></i>
          <span>Appointments</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

     
      <li class="nav-item">
        <a class="nav-link" href="requests.php">
          <i class="fas fa-fw fa fa-calendar"></i>
          <span>Appointment Requests <sup><strong><?php echo $requestcount; ?></strong></sup></span></a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="walkin_appointment.php">
          <i class="fas fa-fw fa fa-universal-access"></i>
          <span>Walk-in Appointment</span></a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="cancelled.php">
          <i class="fas fa-fw fa fa-calendar-minus"></i>
          <span>Cancelled</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="declined_appointments.php">
          <i class="fas fa-fw fa fa-calendar-times"></i>
          <span>Declined</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="processing.php">
          <i class="fas fa-fw fa fa-spinner"></i>
          <span>On Process</span></a>
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
          <h3>APPOINTMENTS</h3>
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
                  $output.='<img class="img-profile rounded-circle" src="../Administrator/img/employees/'.$photo.'">';
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
                Your Approved Appointments
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
                             Customer
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

  <!-- Concern Modal-->
  <div class="modal fade" id="concernModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add concern</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <span>Device Type</span>
          <select onchange="fetchDevices();"  class="form-control" id="_type" style="margin-bottom: 20px;">
            <option value="" selected="" hidden="">Please select type...</option>
            <option value="Laptop">Laptop</option>
            <option value="Cellphone">Cellphone</option>
          </select>
          <span>Device Unit</span>
          <select id="_device_unit" class="form-control" style="margin-bottom: 20px;">
            <optgroup id="opt_container"></optgroup>
          </select> 
          <span>Service Type</span>
          <select onchange="fetchServices();" class="form-control" id="service_type"  style="margin-bottom: 20px;">
            <option value="" selected="" hidden="">Please select service type...</option>
            <option value="Software">Software</option>
            <option value="Hardware">Hardware</option>
          </select>                  
          <span>Service </span>
           <select onchange="fetchServiceDetails();" id="service" class="form-control" style="margin-bottom: 20px;">
            <optgroup id="_service_container"></optgroup>
          </select> 
  
          
          <span>Service Charge</span>
          <input onchange="ComputTotal();" onkeyup="ComputTotal();" onkeypress="ComputTotal();" class="form-control" type="number" min="0" id="service_charge" style="margin-bottom: 20px;" placeholder="Service charge..." disabled="">
           <span>Qty</span>

          <input onchange="ComputTotal();" onkeyup="ComputTotal();" onkeypress="ComputTotal();" class="form-control" type="number" min="0" id="qty" style="margin-bottom: 20px;" placeholder="Number of device">

          <span id="_item_code">Item code:</span><br>
          <span id="_item">Item:</span><br>
          <span id="_price">Item_price:</span><br>
          <span id="_current_stock">Current stock:</span><br>

          <strong><span id="total">Total:</span></strong>

          <input class="form-control" type="number" min="0" id="emp_rate" style="margin-bottom: 20px;display: none;" placeholder="Employee's rate...">
        
          
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" style="color:white;" id="btn_save">Add</a>
        </div>
      </div>
    </div>
  </div>

   <!-- Concern Modal-->
  <div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Appointment details</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <span>Stall</span>
          <select onchange="fetchTime();" id="stall_id" class="form-control" style="margin-bottom: 20px;">
            <optgroup id="stall_container"></optgroup>
          </select>
          <span>Date:</span>
          <input onchange="fetchTime();" class="form-control" type="date" id="_date" style="margin-bottom: 20px;">
          <span>Time:</span>
          <select class="form-control" id="_time" style="margin-bottom: 20px;">
            <optgroup id="time_container" label="Choose time">
              
            </optgroup>
          </select>


          

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" style="color:white;" id="btn_submit">Submit</a>
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
                            <th width="1%" class="text-center">
                              Action
                            </th>  
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
          <textarea class="form-control" id="opt_reason"></textarea>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          <a class="btn btn-danger" style="color:white;" id="btn_submit_cancel">Confirm</a>
        </div>
      </div>
    </div>
  </div>


   <div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Transfer?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <span>Stalls:</span>
          <select  id="stall_id_transfer" class="form-control" style="margin-bottom: 20px;">
            <optgroup id="stall_container_2"></optgroup>
          </select>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          <a class="btn btn-success" style="color:white;" id="btn_transfer">Transfer</a>
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
    var commandStr = '';
    var edit_id=0;
    var total_amount =0;
    var transaction_num='';
    var item_stall_id='';
    var service_item_code='';
    var service_item='';
    var service_price=0;
    var service_stock=0;
    var subtotal_item=0;
    var subtotal_service=0;

    $(document).ready(function() {
      commandStr = 'insert';
      setMinDate();
      fetchStallID();
      fetchRecord();
      fetchStallID_transfer();
    });

    function ComputTotal(){
      total_amount=0;
      subtotal_service=0;
      subtotal_item=0;
      var qty = document.getElementById("qty").value;
      var service_charge = document.getElementById("service_charge").value;
      subtotal_service = qty * service_charge;
      subtotal_item = qty * service_price;
      total_amount = subtotal_item+subtotal_service;
      document.getElementById("total").textContent='Total: ₱'+total_amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }
     function fetchStallID(){
    

    $.ajax({

            url:"functions/select_stall_id_opt.php", 
            type:"POST", 
            contentType:false,
            cache:false,
            processData:false,

            beforeSend:function() {

            },  
            error:function(data){
               
            }, 
            success:function(data){
          
              document.getElementById("stall_container").innerHTML=data;
            }
  });
  }

  function fetchStallID_transfer(){
    

    $.ajax({

            url:"functions/select_stall_id_transfer.php", 
            type:"POST", 
            contentType:false,
            cache:false,
            processData:false,

            beforeSend:function() {

            },  
            error:function(data){
               
            }, 
            success:function(data){
          
              document.getElementById("stall_container_2").innerHTML=data;
            }
  });
  }

  function fetchServices(){
    var service_type = document.getElementById("service_type").value.trim();
    var device_unit = document.getElementById("_device_unit").value.trim();
    document.getElementById("qty").value=0;
    document.getElementById("emp_rate").value=0;
    document.getElementById("service_charge").value=0;
    document.getElementById("total").textContent='Total: ';
    $.ajax({

            url:"functions/select_services.php?service_type="+service_type+'&device_unit='+device_unit, 
            type:"POST", 
            contentType:false,
            cache:false,
            processData:false,

            beforeSend:function() {

            },  
            error:function(data){
               
            }, 
            success:function(data){
          
              document.getElementById("_service_container").innerHTML=data;
            }
  });
  }
function fetchServiceDetails(){
    var service = document.getElementById("service").value.trim();
    var stall_id =item_stall_id;
    document.getElementById("qty").value=0;
    document.getElementById("emp_rate").value=0;
    document.getElementById("service_charge").value=0;
    document.getElementById("total").textContent='Total: ';
        $.ajax({

            url:"functions/select_service_details.php?service="+service+'&stall_id='+stall_id, 
            method:"POST",  
            dataType: "json",
            contentType:false,
            cache:false,
            processData:false,

            beforeSend:function() {

            },  
            error:function(data){
                 
            }, 
            success:function(data){
                 jQuery.each(data, function(index, itemData) {
                      document.getElementById("service_charge").value=itemData.service_charge;
                      document.getElementById("emp_rate").value=itemData.emp_rate;
                     document.getElementById("_item_code").textContent='Item code: '+itemData.item_code;
                     document.getElementById("_price").textContent='Item Price: '+itemData.price;
                     document.getElementById("_item").textContent='Item: '+itemData.item_name;
                     document.getElementById("_current_stock").textContent='Current stock: '+itemData.item_qty;
                      service_item_code=itemData.item_code;
                      service_item=itemData.item_name;
                      service_price=itemData.price;
                      service_stock=itemData.item_qty;
                     
                });
            }
  });
  }

  function fetchTime(){
    var _date = document.getElementById("_date").value.trim();
    var stall_id = document.getElementById("stall_id").value.trim();
    if (_date=='') {
     var element = document.getElementById("_date");
     element.classList.add("required-fields");
     return;
    }else{
      var element = document.getElementById("_date");
      element.classList.remove("required-fields");
    }

    if (stall_id=='') {
     var element = document.getElementById("stall_id");
     element.classList.add("required-fields");
     return;
    }else{
      var element = document.getElementById("stall_id");
      element.classList.remove("required-fields");
    }

    if (_date==''||stall_id=='') {
      return;
    }

    var other_data = '_date='+_date+'&stall_id='+stall_id;
    $.ajax({

            url:"functions/check_time_available.php?"+other_data, 
            type:"POST", 
            contentType:false,
            cache:false,
            processData:false,

            beforeSend:function() {

            },  
            error:function(data){
               
            }, 
            success:function(data){
          
              document.getElementById("time_container").innerHTML=data;
            }
  });
  }
  function setMinDate(){
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate()+1;
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

   
    $('#_date').attr('min', maxDate);
}
    function fetchDevices(){
      var _type = document.getElementById("_type").value.trim();
    $.ajax({

            url:"functions/select_device_opt.php?_type="+_type, 
            type:"POST", 
            contentType:false,
            cache:false,
            processData:false,

            beforeSend:function() {

            },  
            error:function(data){
               
            }, 
            success:function(data){
          
              document.getElementById("opt_container").innerHTML=data;
            }
  });
  }

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
     url:"functions/select_appointments.php?",
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
     url:"functions/select_concerns_request.php?transaction_num="+transaction_num,
     type:"POST",
     cache:false,

     beforeSend:function() {

                   
                }       
    },
    "autoWidth" : false
   });
}


  $(document).on("click", "#btn_save", function() {
    event.preventDefault();

    if (commandStr=='insert'){
      addRecord();
    }else if(commandStr=='update'){
      updateRecord();
    }
  });

  function addRecord(){
    var _type = document.getElementById("_type").value.trim();
    var _device_unit = document.getElementById("_device_unit").value.trim();
    var service_type = document.getElementById("service_type").value.trim();
    var service_charge = document.getElementById("service_charge").value;
    var emp_rate = document.getElementById("emp_rate").value;
    var qty = document.getElementById("qty").value;
    var service = document.getElementById("service").value.trim();

    if (service_stock<qty && service_type=='Hardware') {
       swal({title:"Warning!",text: "Insufficient stock!.", type:"error"}); 
       return;
    }
    if (_type=='') {
     var element = document.getElementById("_type");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("_type");
      element.classList.remove("required-fields");
    }
    if (_device_unit=='') {
     var element = document.getElementById("_device_unit");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("_device_unit");
      element.classList.remove("required-fields");
    }
    if (service_type=='') {
     var element = document.getElementById("service_type");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("service_type");
      element.classList.remove("required-fields");
    }

    if (service=='') {
     var element = document.getElementById("service");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("service");
      element.classList.remove("required-fields");
    }

    if (service_charge<1) {
     var element = document.getElementById("service_charge");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("service_charge");
      element.classList.remove("required-fields");
    }

    if (emp_rate<1) {
     var element = document.getElementById("emp_rate");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("emp_rate");
      element.classList.remove("required-fields");
    }
   

    if (qty<1) {
     var element = document.getElementById("qty");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("qty");
      element.classList.remove("required-fields");
    }

    if ( _type=='' || _device_unit=='' || service_charge < 1 || qty < 1 || emp_rate < 1 || service_type=='' || service=='') {
       swal({title:"Warning!",text: "Please complete the required fields.", type:"error"}); 
       return;
    }


    var other_data = '_type='+_type+
                     '&_device_unit='+_device_unit+
                     '&service_charge='+service_charge+
                     '&emp_rate='+emp_rate+
                     '&service_type='+service_type+
                     '&service='+service+
                     '&qty='+qty+
                     '&total_amount='+total_amount+
                     '&transaction_num='+transaction_num+
                     '&subtotal_item='+subtotal_item+
                     '&subtotal_service='+subtotal_service+
                     '&service_item_code='+service_item_code+
                     '&service_item='+service_item+
                     '&service_price='+service_price+
                     '&stall_id='+item_stall_id;


    swal({
                    title: "Continue?",
                    text: "Do you want to add this concern?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {
     $.ajax({

                  url:"functions/add_concern.php?"+other_data, 
                  type:"POST", 
                  contentType:false,
                  cache:false,
                  processData:false,

                  beforeSend:function() {

                  },  
                  error:function(data){
                                                   
                  }, 
                  success:function(data){   

                  if (data.includes('200')) { 
                      clearFields();
                      fetchRecord();
                      $('#concernModal').modal('hide');
                      swal({title:"Success!",text: "New service has been successfully added!", type:"success"}).then(okay => {
                              if (okay) {
                                             
                            }
                              });

                  }else{
                     swal({title:"Warning!",text: data, type:"error"}); 

                  }
              } 

          }); //end ajax
      } //end msg result
     }); // end swal
   } 

   

   function clearFields(){
      document.getElementById("_type").value='';
      document.getElementById("_device_unit").value='';
      document.getElementById("service_type").value='';
      document.getElementById("service_charge").value=0;
      document.getElementById("emp_rate").value=0;
      document.getElementById("qty").value=0;
      document.getElementById("service").value='';
      document.getElementById("total").textContent = "Total: ";
      document.getElementById("_item_code").textContent='Item code: ';
      document.getElementById("_price").textContent='Item Price: ';
      document.getElementById("_item").textContent='Item: ';
      document.getElementById("_current_stock").textContent='Current stock: ';
      service_item_code='';
      service_item='';
      service_price=0;
      service_stock=0;
      total_amount=0;
      commandStr='insert';
      var transaction_num='';
   }

   
   $(document).on("click", "#btn_concern", function() {
      clearFields();
     transaction_num = $(this).data("transaction_num");
     item_stall_id='';
     item_stall_id = $(this).data("stall_id");

   });

   $(document).on("click", "#btn_submit", function() {
    var _date = document.getElementById("_date").value.trim();
    var _time = document.getElementById("_time").value.trim();
    var stall_id = document.getElementById("stall_id").value.trim();
    if (_date=='') {
     var element = document.getElementById("_date");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("_date");
      element.classList.remove("required-fields");
    }

    if (_time=='') {
     var element = document.getElementById("_time");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("_time");
      element.classList.remove("required-fields");
    }
    if (stall_id=='') {
     var element = document.getElementById("stall_id");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("stall_id");
      element.classList.remove("required-fields");
    }

    if (_time=='' || _date == '' || stall_id=='') {
       swal({title:"Warning!",text: "Please complete the required fields!", type:"error"}); 
       return;
    }
    var other_data = '_date='+_date+
                     '&_time='+_time+
                     '&stall_id='+stall_id;


    swal({
                    title: "Continue?",
                    text: "Do you want to submit this request?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {
     $.ajax({

                  url:"functions/book_appointment.php?"+other_data, 
                  type:"POST", 
                  contentType:false,
                  cache:false,
                  processData:false,

                  beforeSend:function() {

                  },  
                  error:function(data){
                                                   
                  }, 
                  success:function(data){   
                    fetchRecord();
                  if (data.includes('200')) { 
                      document.getElementById("_date").value = '';
                      document.getElementById("_time").value = '';
                      document.getElementById("stall_id").value = '';
                      $('#requestModal').modal('hide');
                      swal({title:"Success!",text: "Your request has been successully submitted. You can add your concerns now and wait for the approval.", type:"success"}).then(okay => {
                              if (okay) {
                                             
                            }
                              });

                  }else{
                     swal({title:"Warning!",text: data, type:"error"}); 

                  }
              } 

          }); //end ajax
      } //end msg result
     }); // end swal
   });

  $(document).on("click", "#btn_view", function() {
      var transaction_num = $(this).data('transaction_num');
      fetchConcerns(transaction_num);
  });

   $(document).on("click", "#btn_minus", function() {
      var transaction_num = $(this).data('transaction_num');
      var qty = $(this).data('qty');
      var id = $(this).data('id');
      if (qty == 1){
        swal({title:"Warning!",text: "You reach the minimum device count.", type:"error"});
        return
      }
  
    $.ajax({

            url:"functions/minus_device.php?qty="+qty+"&id="+id, 
            type:"POST", 
            contentType:false,
            cache:false,
            processData:false,

            beforeSend:function() {

            },  
            error:function(data){
               
            }, 
            success:function(data){
                fetchConcerns(transaction_num);
                fetchRecord();
            }
  });
     });
    $(document).on("click", "#btn_void", function() {
    
      var transaction_num = $(this).data('transaction_num');
      var id = $(this).data('id');

    var other_data = 'id='+id;


    swal({
                    title: "Continue?",
                    text: "Do you want to void this concern?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {
     $.ajax({

                  url:"functions/void_concern.php?"+other_data, 
                  type:"POST", 
                  contentType:false,
                  cache:false,
                  processData:false,

                  beforeSend:function() {

                  },  
                  error:function(data){
                                                   
                  }, 
                  success:function(data){   

                  if (data.includes('200')) { 
                      
                      fetchRecord();
                      fetchConcerns(transaction_num);
                     
                      swal({title:"Success!",text: "Concern has been voided successfully!", type:"success"}).then(okay => {
                              if (okay) {
                                             
                            }
                              });

                  }else{
                     swal({title:"Warning!",text: data, type:"error"}); 

                  }
              } 

          }); //end ajax
      } //end msg result
     }); // end swal

    });



    $(document).on("click", "#btn_plus", function() {
      var transaction_num = $(this).data('transaction_num');
      var qty = $(this).data('qty');
      var id = $(this).data('id');
     

  
    $.ajax({

            url:"functions/add_device.php?qty="+qty+"&id="+id, 
            type:"POST", 
            contentType:false,
            cache:false,
            processData:false,

            beforeSend:function() {

            },  
            error:function(data){
               
            }, 
            success:function(data){
                fetchConcerns(transaction_num);
                fetchRecord();
            }
  });
     });

    var transaction_num_cancel ='';
    $(document).on("click", "#btn_cancel", function() {
        transaction_num_cancel= $(this).data('transaction_num');
    });

    $(document).on("click", "#btn_submit_cancel", function() {
    var reason = document.getElementById("opt_reason").value.trim();

     if (reason=='') {
     var element = document.getElementById("opt_reason");
     element.classList.add("required-fields");
    }else{
      var element = document.getElementById("opt_reason");
      element.classList.remove("required-fields");
    }

    if (reason=='') {
       swal({title:"Warning!",text: "Please choose a reason!", type:"error"}); 
       return;
    }
    var other_data = 'transaction_num='+transaction_num_cancel+'&reason='+reason;


    swal({
                    title: "Continue?",
                    text: "Do you want to cancel this appointment?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {
     $.ajax({

                  url:"functions/cancel_appointment.php?"+other_data, 
                  type:"POST", 
                  contentType:false,
                  cache:false,
                  processData:false,

                  beforeSend:function() {

                  },  
                  error:function(data){
                                                   
                  }, 
                  success:function(data){   

                  if (data.includes('200')) { 
                      transaction_num_cancel='';
                      document.getElementById("opt_reason").value='';
                      $("#cancelModal").modal('hide');
                      fetchRecord();
                      swal({title:"Success!",text: "Appointment has been cancelled successfully!", type:"success"}).then(okay => {
                              if (okay) {
                                             
                            }
                              });

                  }else{
                     swal({title:"Warning!",text: data, type:"error"}); 

                  }
              } 

          }); //end ajax
      } //end msg result
     }); // end swal

    });


     $(document).on("click", "#btn_process", function() {
    var transaction_num = $(this).data('transaction_num');
    var other_data = 'transaction_num='+transaction_num;


    swal({
                    title: "Continue?",
                    text: "Do you want to process this appointment?",
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {
     $.ajax({

                  url:"functions/process_appointment.php?"+other_data, 
                  type:"POST", 
                  contentType:false,
                  cache:false,
                  processData:false,

                  beforeSend:function() {

                  },  
                  error:function(data){
                                                   
                  }, 
                  success:function(data){   

                  if (data.includes('200')) { 
                      transaction_num_cancel='';
                      document.getElementById("opt_reason").value='';
                      $("#cancelModal").modal('hide');
                      fetchRecord();
                      swal({title:"Success!",text: "Appointment has been on process successfully!", type:"success"}).then(okay => {
                              if (okay) {
                                             
                            }
                              });

                  }else{
                     swal({title:"Warning!",text: data, type:"error"}); 

                  }
              } 

          }); //end ajax
      } //end msg result
     }); // end swal

    });

var transfer_t_num='';
$(document).on("click", "#mnu_transfer", function() {
  transfer_t_num=$(this).data('transaction_num');
});


 $(document).on("click", "#btn_transfer", function() {
  var stall=document.getElementById("stall_id_transfer").value;
    var other_data = 'transaction_num='+transfer_t_num+"&stall="+stall;


    swal({
                    title: "Continue?",
                    text: "Do you want to transfer this appointment to ?"+stall,
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#5cb85c",
                    cancelButtonColor: "#d9534f",
                    confirmButtonText: 'Confirm',
                    confirmButtonClass: "btn"
                    }).then((result) => {
                    if (result.value) {
     $.ajax({

                  url:"functions/transfer_appointment.php?"+other_data, 
                  type:"POST", 
                  contentType:false,
                  cache:false,
                  processData:false,

                  beforeSend:function() {

                  },  
                  error:function(data){
                                                   
                  }, 
                  success:function(data){   

                  if (data.includes('200')) { 
                      transaction_num_cancel='';
                      document.getElementById("stall_id_transfer").value='';
                      $("#transferModal").modal('hide');
                      fetchRecord();
                      swal({title:"Success!",text: "Appointment has been on transferred successfully!", type:"success"}).then(okay => {
                              if (okay) {
                                             
                            }
                              });

                  }else{
                     swal({title:"Warning!",text: data, type:"error"}); 

                  }
              } 

          }); //end ajax
      } //end msg result
     }); // end swal

    });
</script>
