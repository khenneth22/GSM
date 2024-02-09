<?php
session_start();
$user_type='';
if(empty($_SESSION['_usertype'])) {
    header("Location: ../logout.php");
}else{
  $user_type =$_SESSION['_usertype']; 
  if ($user_type!='Administrator') {
    header("Location: ../logout.php");
    
  }
  $photo = $_SESSION['_img'];
  if ($photo=='') {
    $photo='avatar.png';
  }
}
require ("../db_connection/myConn.php");
$requestcount=0;
$sql = "SELECT COUNT(_id) AS requests FROM `tbl_appointment`  WHERE `_status` LIKE 'pending'";
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

    <title>Services - Administrator</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
    .required-fields {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        border-color: red;
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
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
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
    .dropdown-content a:hover {
        background-color: #ddd;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
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
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Store
            </div>
            <li class="nav-item">
                <a class="nav-link" href="stalls.php">
                    <i class="fas fa-fw fa fa-university"></i>
                    <span>Stall</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="employees.php">
                    <i class="fas fa-fw fa fa-user-circle"></i>
                    <span>Employees</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="salaries.php">
                    <i class="fas fa-fw fa fa-credit-card"></i>
                    <span>Salaries</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="items.php">
                    <i class="fas fa-fw fa fa-microchip"></i>
                    <span>Items</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="replenishment.php">
                    <i class="fas fa-fw fa fa-archive"></i>
                    <span>Replenishment</span></a>
            </li>



            <!-- Nav Item - Utilities Collapse Menu -->


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Appointments
            </div>
            <li class="nav-item">
                <a class="nav-link" href="appointments.php">
                    <i class="fas fa-fw fa fa-calendar-check"></i>
                    <span>Appointments</span></a>
            </li>


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
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Reports
            </div>
            <li class="nav-item">
                <a class="nav-link" href="inventory.php">
                    <i class="fas fa-fw fa-info-circle"></i>
                    <span>Inventory</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="service_rendered.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Service Rendered</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="feedbacks.php">
                    <i class="fas fa-fw fa fa fa-star"></i>
                    <span>Feedbacks</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Settings
            </div>
            <li class="nav-item">
                <a class="nav-link" href="device_list.php">
                    <i class="fas fa-fw fa fa-tablet"></i>
                    <span>Device List</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="services.php">
                    <i class="fas fa-fw fa fa-sign-language"></i>
                    <span>Services</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gallery.php">
                    <i class="fas fa-fw fa fa-file-image"></i>
                    <span>Gallery</span></a>
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
                    <h3>GSM SERVICES</h3>
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrator</span>
                                <img class="img-profile rounded-circle" src="img/<?php echo $photo; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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
                                    Services <a data-toggle="modal" data-target="#employeeModal" style="color:white;"
                                        class="btn btn-dark" onclick="clearFields();"><strong>+</strong></a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover" id="tbl_health">
                                        <thead class="table-header">
                                            <tr>
                                                <th width="1%" class="text-center">
                                                    Action
                                                </th>
                                                <th class="text-center">
                                                    Device Type
                                                </th>
                                                <th class="text-center">
                                                    Device Unit
                                                </th>
                                                <th class="text-center">
                                                    Service Type
                                                </th>
                                                <th class="text-center">
                                                    Service
                                                </th>
                                                <th class="text-center">
                                                    Service Charge
                                                </th>
                                                <th class="text-center">
                                                    Employee's Rate
                                                </th>
                                                <th class="text-center">
                                                    Item code
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
                            document.getElementById('copyright').appendChild(document.createTextNode(new Date()
                                .getFullYear()))
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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

    <!-- Stall Modal-->
    <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Service details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Device Type</span>
                    <select onchange="fetchDevices();" class="form-control" id="_type" style="margin-bottom: 20px;">
                        <option value="" selected="" hidden="">Please select type...</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Cellphone">Cellphone</option>
                    </select>
                    <span>Device Unit</span>
                    <select id="_device_unit" class="form-control" style="margin-bottom: 20px;">
                        <optgroup id="opt_container"></optgroup>
                    </select>
                    <span>Service Type</span>
                    <select onchange="fetchItemCode();" class="form-control" id="service_type"
                        style="margin-bottom: 20px;">
                        <option value="" selected="" hidden="">Please select service type...</option>
                        <option value="Software">Software</option>
                        <option value="Hardware">Hardware</option>
                    </select>
                    <span>Service </span>
                    <input class="form-control" type="text" id="service" style="margin-bottom: 20px;"
                        placeholder="Service...">

                    <span>Service Charge</span>
                    <input class="form-control" type="number" min="0" id="service_charge" style="margin-bottom: 20px;"
                        placeholder="Service charge...">
                    <span>Employee's rate</span>
                    <input class="form-control" type="number" min="0" id="emp_rate" style="margin-bottom: 20px;"
                        placeholder="Employee's rate...">
                    <span>Item</span>
                    <select class="form-control" id="item_code" style="margin-bottom: 20px;">
                        <optgroup id="item_container"></optgroup>
                    </select>


                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" style="color:white;" id="btn_save">Save</a>
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
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />

</body>

</html>

<script type="text/javascript">
var commandStr = '';
var edit_id = 0;
$(document).ready(function() {
    commandStr = 'insert';
    fetchRecord();
});

function fetchDevices() {
    var _type = document.getElementById("_type").value.trim();
    $.ajax({

        url: "functions/select_device_opt.php?_type=" + _type,
        type: "POST",
        contentType: false,
        cache: false,
        processData: false,

        beforeSend: function() {

        },
        error: function(data) {

        },
        success: function(data) {

            document.getElementById("opt_container").innerHTML = data;
        }
    });
}

function fetchRecord() {

    $('#tbl_health').DataTable().destroy();

    var dataTable1 = $('#tbl_health').DataTable({

        "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l>f<"pull-right"><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
        "processing": true,
        "bStateSave": true, //stay on this page
        "responsive": true,
        "serverSide": true,
        "order": [],
        "drawCallback": function(settings) {
            //console.log(settings.json);

        },
        "ajax": {
            url: "functions/select_services_table.php?",
            type: "POST",
            cache: false,

            beforeSend: function() {


            }
        },
        "autoWidth": false
    });
}

function fetchItemCode() {
    var service_type = document.getElementById("service_type").value.trim();
    if (service_type == 'Hardware') {

        $.ajax({

            url: "functions/select_item_code_services.php",
            type: "POST",
            contentType: false,
            cache: false,
            processData: false,

            beforeSend: function() {

            },
            error: function(data) {

            },
            success: function(data) {
                document.getElementById("item_container").innerHTML = data;
            }
        });
    } else {
        document.getElementById("item_container").innerHTML = '';
        document.getElementById("item_code").value = '';
    }
}

$(document).on("click", "#btn_save", function() {
    event.preventDefault();

    if (commandStr == 'insert') {
        addRecord();
    } else if (commandStr == 'update') {
        updateRecord();
    }
});

function addRecord() {
    var _type = document.getElementById("_type").value.trim();
    var _device_unit = document.getElementById("_device_unit").value.trim();
    var service_type = document.getElementById("service_type").value.trim();
    var service_charge = document.getElementById("service_charge").value;
    var emp_rate = document.getElementById("emp_rate").value;
    var service = document.getElementById("service").value.trim();
    var item_code = document.getElementById("item_code").value.trim();

    if (service_type == 'Hardware' && item_code == '') {
        var element = document.getElementById("item_code");
        element.classList.add("required-fields");
        return;
    } else {
        var element = document.getElementById("item_code");
        element.classList.remove("required-fields");
    }

    if (_type == '') {
        var element = document.getElementById("_type");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("_type");
        element.classList.remove("required-fields");
    }
    if (_device_unit == '') {
        var element = document.getElementById("_device_unit");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("_device_unit");
        element.classList.remove("required-fields");
    }
    if (service_type == '') {
        var element = document.getElementById("service_type");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("service_type");
        element.classList.remove("required-fields");
    }

    if (service == '') {
        var element = document.getElementById("service");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("service");
        element.classList.remove("required-fields");
    }

    if (service_charge < 1) {
        var element = document.getElementById("service_charge");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("service_charge");
        element.classList.remove("required-fields");
    }

    if (emp_rate < 1) {
        var element = document.getElementById("emp_rate");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("emp_rate");
        element.classList.remove("required-fields");
    }


    if (_type == '' || _device_unit == '' || service_charge < 1 || emp_rate < 1 || service_type == '' || service ==
        '') {
        swal({
            title: "Warning!",
            text: "Please complete the required fields.",
            type: "error"
        });
        return;
    }


    var other_data = '_type=' + _type +
        '&_device_unit=' + _device_unit +
        '&service_charge=' + service_charge +
        '&emp_rate=' + emp_rate +
        '&service_type=' + service_type +
        '&service=' + service +
        '&item_code=' + item_code;


    swal({
        title: "Continue?",
        text: "Do you want to add this service?",
        type: "question",
        showCancelButton: true,
        confirmButtonColor: "#5cb85c",
        cancelButtonColor: "#d9534f",
        confirmButtonText: 'Confirm',
        confirmButtonClass: "btn"
    }).then((result) => {
        if (result.value) {
            $.ajax({

                url: "functions/add_service.php?" + other_data,
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,

                beforeSend: function() {

                },
                error: function(data) {

                },
                success: function(data) {

                    if (data.includes('200')) {
                        clearFields();
                        fetchRecord();
                        $('#employeeModal').modal('hide');
                        swal({
                            title: "Success!",
                            text: "New service has been successfully added!",
                            type: "success"
                        }).then(okay => {
                            if (okay) {

                            }
                        });

                    } else {
                        swal({
                            title: "Warning!",
                            text: data,
                            type: "error"
                        });

                    }
                }

            }); //end ajax
        } //end msg result
    }); // end swal
}

function updateRecord() {
    var _type = document.getElementById("_type").value.trim();
    var _device_unit = document.getElementById("_device_unit").value.trim();
    var service_type = document.getElementById("service_type").value.trim();
    var service_charge = document.getElementById("service_charge").value;
    var emp_rate = document.getElementById("emp_rate").value;
    var service = document.getElementById("service").value.trim();
    var item_code = document.getElementById("item_code").value.trim();

    if (service_type == 'Hardware' && item_code == '') {
        var element = document.getElementById("item_code");
        element.classList.add("required-fields");
        return;
    } else {
        var element = document.getElementById("item_code");
        element.classList.remove("required-fields");
    }
    if (_type == '') {
        var element = document.getElementById("_type");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("_type");
        element.classList.remove("required-fields");
    }
    if (_device_unit == '') {
        var element = document.getElementById("_device_unit");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("_device_unit");
        element.classList.remove("required-fields");
    }
    if (service_type == '') {
        var element = document.getElementById("service_type");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("service_type");
        element.classList.remove("required-fields");
    }

    if (service == '') {
        var element = document.getElementById("service");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("service");
        element.classList.remove("required-fields");
    }

    if (service_charge < 1) {
        var element = document.getElementById("service_charge");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("service_charge");
        element.classList.remove("required-fields");
    }

    if (emp_rate < 1) {
        var element = document.getElementById("emp_rate");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("emp_rate");
        element.classList.remove("required-fields");
    }


    if (_type == '' || _device_unit == '' || service_charge < 1 || emp_rate < 1 || service_type == '' || service ==
        '') {
        swal({
            title: "Warning!",
            text: "Please complete the required fields.",
            type: "error"
        });
        return;
    }


    var other_data = '_type=' + _type +
        '&_device_unit=' + _device_unit +
        '&service_charge=' + service_charge +
        '&emp_rate=' + emp_rate +
        '&service_type=' + service_type +
        '&service=' + service +
        '&id=' + edit_id +
        '&item_code=' + item_code;


    swal({
        title: "Continue?",
        text: "Do you want to update this service?",
        type: "question",
        showCancelButton: true,
        confirmButtonColor: "#5cb85c",
        cancelButtonColor: "#d9534f",
        confirmButtonText: 'Confirm',
        confirmButtonClass: "btn"
    }).then((result) => {
        if (result.value) {
            $.ajax({

                url: "functions/update_service.php?" + other_data,
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,

                beforeSend: function() {

                },
                error: function(data) {

                },
                success: function(data) {

                    if (data.includes('200')) {
                        clearFields();
                        fetchRecord();
                        $('#employeeModal').modal('hide');
                        swal({
                            title: "Success!",
                            text: "Item has been successfully updated!",
                            type: "success"
                        }).then(okay => {
                            if (okay) {

                            }
                        });

                    } else {
                        swal({
                            title: "Warning!",
                            text: data,
                            type: "error"
                        });

                    }
                }

            }); //end ajax
        } //end msg result
    }); // end swal
}

function clearFields() {
    document.getElementById("_type").value = '';
    document.getElementById("_device_unit").value = '';
    document.getElementById("service_type").value = '';
    document.getElementById("service_charge").value = 0;
    document.getElementById("emp_rate").value = 0;
    document.getElementById("service").value = '';
    document.getElementById("item_code").value = '';
    commandStr = 'insert';
}


$(document).on("click", "#btn_edit", function() {
    clearFields();
    edit_id = $(this).data('id');
    selected_device = '';
    document.getElementById("_type").value = $(this).data('_type');
    fetchDevices();
    document.getElementById("_device_unit").value = $(this).data('_device_unit').trim();
    document.getElementById("service_type").value = $(this).data('service_type');
    fetchItemCode();
    document.getElementById("service_charge").value = $(this).data('service_charge');
    document.getElementById("emp_rate").value = $(this).data('emp_rate');
    document.getElementById("service").value = $(this).data('service');
    document.getElementById("item_code").value = $(this).data('item_code');
    commandStr = 'update';

});

$(document).on("click", "#btn_delete", function() {
    var id = $(this).data('id');

    var other_data = 'id=' + id;


    swal({
        title: "Continue?",
        text: "Do you want to delete this service?",
        type: "question",
        showCancelButton: true,
        confirmButtonColor: "#5cb85c",
        cancelButtonColor: "#d9534f",
        confirmButtonText: 'Confirm',
        confirmButtonClass: "btn"
    }).then((result) => {
        if (result.value) {
            $.ajax({

                url: "functions/delete_service.php?" + other_data,
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,

                beforeSend: function() {

                },
                error: function(data) {

                },
                success: function(data) {

                    if (data.includes('200')) {
                        clearFields();
                        fetchRecord();
                        $('#stallModal').modal('hide');
                        swal({
                            title: "Success!",
                            text: "Service has been successfully deleted!",
                            type: "success"
                        }).then(okay => {
                            if (okay) {

                            }
                        });

                    } else {
                        swal({
                            title: "Warning!",
                            text: data,
                            type: "error"
                        });

                    }
                }

            }); //end ajax
        } //end msg result
    }); // end swal
});
</script>