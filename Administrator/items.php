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

    <title>Items - Administrator</title>

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
            <li class="nav-item active">
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
            <li class="nav-item">
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
                    <h3>GSM ITEMS</h3>
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
                                    List of your Items per Stall <a data-toggle="modal" data-target="#employeeModal"
                                        style="color:white;" class="btn btn-dark"
                                        onclick="clearFields();"><strong>+</strong></a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover" id="tbl_health">
                                        <thead class="table-header">
                                            <tr>
                                                <th width="1%" class="text-center">
                                                    Action
                                                </th>
                                                <th class="text-center" width="1%">
                                                    Image
                                                </th>
                                                <th class="text-center">
                                                    Item code
                                                </th>
                                                <th class="text-center">
                                                    Item
                                                </th>
                                                <th class="text-center">
                                                    Description
                                                </th>
                                                <th class="text-center">
                                                    Price
                                                </th>
                                                <th class="text-center">
                                                    Qty
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
                    <h5 class="modal-title" id="exampleModalLabel">Item details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <center> <img class="" id="image_add" src="img/no-image-available.png"
                                    style="height: 230px; width: 230px;border-radius: 8px;box-shadow: 20px 20px 50px lightgrey;margin-bottom: 20px;">
                                <div class="col-sm-12" style="margin-left: 0px;">
                                    <label class="btn btn-dark " style="color:#fff; border-radius:8px;">
                                        <input class="form-control" type="hidden" name="size" value="10000000">
                                        <center> <span></span>&nbsp;Browse<input type="file" id="file_add" name="image"
                                                style="display: none;"></center>
                                    </label>
                                </div>
                            </center>
                        </div>
                    </div>
                    <span>Item code </span>
                    <input class="form-control" type="email" id="item_code" style="margin-bottom: 20px;"
                        placeholder="Item code...">
                    <span>Item name </span>
                    <input class="form-control" type="email" id="item_name" style="margin-bottom: 20px;"
                        placeholder="Item name...">
                    <span>Description</span>
                    <input class="form-control" type="text" id="description" style="margin-bottom: 20px;"
                        placeholder="Description...">
                    <span>Price</span>
                    <input class="form-control" type="number" min="0" id="price" style="margin-bottom: 20px;"
                        placeholder="Price">
                    <span>Quantity</span>
                    <input class="form-control" type="number" min="0" id="qty" style="margin-bottom: 20px;"
                        placeholder="Quantity">

                    <span>Stall</span>
                    <select id="stall_id" class="form-control" style="margin-bottom: 20px;">
                        <optgroup id="opt_container"></optgroup>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" style="color:white;" id="btn_save_all">Save to all stalls</a>
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
    fetchStallID();
    fetchRecord();
});

function fetchStallID() {

    $.ajax({

        url: "functions/select_stall_id_opt.php",
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
            url: "functions/select_item_table.php?",
            type: "POST",
            cache: false,

            beforeSend: function() {


            }
        },
        "autoWidth": false
    });
}

$(document).on("click", "#btn_save_all", function() {
    if (commandStr == 'insert') {
        saveAll();
    } else if (commandStr == 'update') {
        updateAll();
    }
});

function saveALl() {
    var item_code = document.getElementById("item_code").value.trim();
    var item_name = document.getElementById("item_name").value.trim();
    var description = document.getElementById("description").value.trim();
    var price = document.getElementById("price").value;
    var qty = document.getElementById("qty").value;
    document.getElementById("stall_id").value = '';
    var file_property = document.getElementById("file_add").files[0];
    var image = document.getElementById("file_add").value;
    var fd = new FormData();
    fd.append("file_add", file_property);


    if (item_code == '') {
        var element = document.getElementById("item_code");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("item_code");
        element.classList.remove("required-fields");
    }
    if (item_name == '') {
        var element = document.getElementById("item_name");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("item_name");
        element.classList.remove("required-fields");
    }

    if (description == '') {
        var element = document.getElementById("description");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("description");
        element.classList.remove("required-fields");
    }

    if (price < 1) {
        var element = document.getElementById("price");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("price");
        element.classList.remove("required-fields");
    }


    if (item_code == '' || description == '' || price < 1 || stall_id == '' || item_name == '') {
        swal({
            title: "Warning!",
            text: "Please complete the required fields.",
            type: "error"
        });
        return;
    }


    var other_data = 'item_code=' + item_code +
        '&item_name=' + item_name +
        '&description=' + description +
        '&price=' + price +
        '&qty=' + qty +
        '&image_name=' + new Date().getTime();


    swal({
        title: "Continue?",
        text: "Do you want to add this new item to all active stall?",
        type: "question",
        showCancelButton: true,
        confirmButtonColor: "#5cb85c",
        cancelButtonColor: "#d9534f",
        confirmButtonText: 'Confirm',
        confirmButtonClass: "btn"
    }).then((result) => {
        if (result.value) {
            $.ajax({

                url: "functions/add_item_to_all.php?" + other_data,
                type: "POST",
                data: fd,
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
                            text: "New item has been successfully added!",
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

function updateAll() {
    var item_code = document.getElementById("item_code").value.trim();
    var item_name = document.getElementById("item_name").value.trim();
    var description = document.getElementById("description").value.trim();
    var price = document.getElementById("price").value;
    var qty = document.getElementById("qty").value;
    document.getElementById("stall_id").value = '';
    var file_property = document.getElementById("file_add").files[0];
    var image = document.getElementById("file_add").value;
    var fd = new FormData();
    fd.append("file_add", file_property);


    if (item_code == '') {
        var element = document.getElementById("item_code");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("item_code");
        element.classList.remove("required-fields");
    }
    if (item_name == '') {
        var element = document.getElementById("item_name");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("item_name");
        element.classList.remove("required-fields");
    }

    if (description == '') {
        var element = document.getElementById("description");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("description");
        element.classList.remove("required-fields");
    }

    if (price < 1) {
        var element = document.getElementById("price");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("price");
        element.classList.remove("required-fields");
    }


    if (item_code == '' || description == '' || price < 1 || stall_id == '' || item_name == '') {
        swal({
            title: "Warning!",
            text: "Please complete the required fields.",
            type: "error"
        });
        return;
    }


    var other_data = 'item_code=' + item_code +
        '&item_name=' + item_name +
        '&description=' + description +
        '&price=' + price +
        '&qty=' + qty +
        '&image_name=' + new Date().getTime();


    swal({
        title: "Continue?",
        text: "Do you want to update item to all active stall?",
        type: "question",
        showCancelButton: true,
        confirmButtonColor: "#5cb85c",
        cancelButtonColor: "#d9534f",
        confirmButtonText: 'Confirm',
        confirmButtonClass: "btn"
    }).then((result) => {
        if (result.value) {
            $.ajax({

                url: "functions/update_item_to_all.php?" + other_data,
                type: "POST",
                data: fd,
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
                            text: "Item details has been successfully updated!",
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

$(document).on("click", "#btn_save", function() {
    event.preventDefault();

    if (commandStr == 'insert') {
        addRecord();
    } else if (commandStr == 'update') {
        updateRecord();
    }
});

function addRecord() {
    var item_code = document.getElementById("item_code").value.trim();
    var item_name = document.getElementById("item_name").value.trim();
    var description = document.getElementById("description").value.trim();
    var price = document.getElementById("price").value;
    var qty = document.getElementById("qty").value;
    var stall_id = document.getElementById("stall_id").value.trim();
    var file_property = document.getElementById("file_add").files[0];
    var image = document.getElementById("file_add").value;
    var fd = new FormData();
    fd.append("file_add", file_property);

    if (stall_id == '') {
        var element = document.getElementById("stall_id");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("stall_id");
        element.classList.remove("required-fields");
    }
    if (item_code == '') {
        var element = document.getElementById("item_code");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("item_code");
        element.classList.remove("required-fields");
    }
    if (item_name == '') {
        var element = document.getElementById("item_name");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("item_name");
        element.classList.remove("required-fields");
    }

    if (description == '') {
        var element = document.getElementById("description");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("description");
        element.classList.remove("required-fields");
    }

    if (price < 1) {
        var element = document.getElementById("price");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("price");
        element.classList.remove("required-fields");
    }


    if (item_code == '' || description == '' || price < 1 || stall_id == '' || item_name == '') {
        swal({
            title: "Warning!",
            text: "Please complete the required fields.",
            type: "error"
        });
        return;
    }


    var other_data = 'item_code=' + item_code +
        '&item_name=' + item_name +
        '&description=' + description +
        '&price=' + price +
        '&stall_id=' + stall_id +
        '&qty=' + qty +
        '&image_name=' + new Date().getTime();


    swal({
        title: "Continue?",
        text: "Do you want to add this new item for " + stall_id + " ?",
        type: "question",
        showCancelButton: true,
        confirmButtonColor: "#5cb85c",
        cancelButtonColor: "#d9534f",
        confirmButtonText: 'Confirm',
        confirmButtonClass: "btn"
    }).then((result) => {
        if (result.value) {
            $.ajax({

                url: "functions/add_item.php?" + other_data,
                type: "POST",
                data: fd,
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
                            text: "New item has been successfully added!",
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
    var item_code = document.getElementById("item_code").value.trim();
    var item_name = document.getElementById("item_name").value.trim();
    var description = document.getElementById("description").value.trim();
    var price = document.getElementById("price").value;
    var qty = document.getElementById("qty").value;
    var stall_id = document.getElementById("stall_id").value.trim();
    var file_property = document.getElementById("file_add").files[0];
    var image = document.getElementById("file_add").value;
    var fd = new FormData();
    fd.append("file_add", file_property);

    if (stall_id == '') {
        var element = document.getElementById("stall_id");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("stall_id");
        element.classList.remove("required-fields");
    }
    if (item_code == '') {
        var element = document.getElementById("item_code");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("item_code");
        element.classList.remove("required-fields");
    }
    if (item_name == '') {
        var element = document.getElementById("item_name");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("item_name");
        element.classList.remove("required-fields");
    }

    if (description == '') {
        var element = document.getElementById("description");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("description");
        element.classList.remove("required-fields");
    }

    if (price < 1) {
        var element = document.getElementById("price");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("price");
        element.classList.remove("required-fields");
    }


    if (item_code == '' || description == '' || price < 1 || stall_id == '' || item_name == '') {
        swal({
            title: "Warning!",
            text: "Please complete the required fields.",
            type: "error"
        });
        return;
    }


    var other_data = 'item_code=' + item_code +
        '&item_name=' + item_name +
        '&description=' + description +
        '&price=' + price +
        '&stall_id=' + stall_id +
        '&qty=' + qty +
        '&image_name=' + new Date().getTime();


    swal({
        title: "Continue?",
        text: "Do you want to update this item for " + stall_id + " ?",
        type: "question",
        showCancelButton: true,
        confirmButtonColor: "#5cb85c",
        cancelButtonColor: "#d9534f",
        confirmButtonText: 'Confirm',
        confirmButtonClass: "btn"
    }).then((result) => {
        if (result.value) {
            $.ajax({

                url: "functions/update_item.php?" + other_data,
                type: "POST",
                data: fd,
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
    document.getElementById("item_code").value = '';
    document.getElementById("item_name").value = '';
    document.getElementById("description").value = '';
    document.getElementById("price").value = 0;
    document.getElementById("qty").value = 0;
    document.getElementById("stall_id").value = '';
    document.getElementById("file_add").value = '';
    document.getElementById("item_code").disabled = false;
    document.getElementById("qty").disabled = false;
    document.getElementById("stall_id").disabled = false;
    document.getElementById("image_add").src = "img/no-image-available.png";
    commandStr = 'insert';
}

$(document).on("click", "#btn_edit", function() {
    clearFields();
    edit_id = $(this).data('id');
    document.getElementById("item_code").value = $(this).data('item_code');
    document.getElementById("item_name").value = $(this).data('item_name');
    document.getElementById("description").value = $(this).data('description');
    document.getElementById("price").value = $(this).data('price');
    document.getElementById("qty").value = $(this).data('qty');
    document.getElementById("stall_id").value = $(this).data('stall_id');
    document.getElementById("item_code").disabled = true;
    document.getElementById("qty").disabled = true;
    document.getElementById("stall_id").disabled = true;
    document.getElementById("image_add").src = "img/items/" + $(this).data('img');
    commandStr = 'update';

});

$(document).on("click", "#btn_delete", function() {
    var id = $(this).data('id');
    var item_code = $(this).data('item_code');
    var stall_id = $(this).data('stall_id');

    var other_data = 'id=' + id;


    swal({
        title: "Continue?",
        text: "Do you want to delete this item: " + item_code + " at stall " + stall_id + " ?",
        type: "question",
        showCancelButton: true,
        confirmButtonColor: "#5cb85c",
        cancelButtonColor: "#d9534f",
        confirmButtonText: 'Confirm',
        confirmButtonClass: "btn"
    }).then((result) => {
        if (result.value) {
            $.ajax({

                url: "functions/delete_item.php?" + other_data,
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
                            text: "Item has been successfully deleted!",
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

$(document).on("click", "#btn_deactivate", function() {
    var id = $(this).data('id');


    var other_data = 'id=' + id;


    swal({
        title: "Continue?",
        text: "Do you want to deactivate this employee's account?",
        type: "question",
        showCancelButton: true,
        confirmButtonColor: "#5cb85c",
        cancelButtonColor: "#d9534f",
        confirmButtonText: 'Confirm',
        confirmButtonClass: "btn"
    }).then((result) => {
        if (result.value) {
            $.ajax({

                url: "functions/deactivate_employee.php?" + other_data,
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
                        swal({
                            title: "Success!",
                            text: "Employee's account has been successfully deactivated!",
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

$(document).on("click", "#btn_activate", function() {
    var id = $(this).data('id');


    var other_data = 'id=' + id;


    swal({
        title: "Continue?",
        text: "Do you want to activate this employee?",
        type: "question",
        showCancelButton: true,
        confirmButtonColor: "#5cb85c",
        cancelButtonColor: "#d9534f",
        confirmButtonText: 'Confirm',
        confirmButtonClass: "btn"
    }).then((result) => {
        if (result.value) {
            $.ajax({

                url: "functions/activate_employee.php?" + other_data,
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
                        swal({
                            title: "Success!",
                            text: "Employee's account has been successfully activated!",
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
$(document).on("change", "#file_add", function() {
    event.preventDefault();

    //get file details
    var property = this.files[0];
    var image_name = property.name;
    var image_extension = image_name.split('.').pop().toLowerCase();
    var image_size = property.size;

    //filter extension
    if (jQuery.inArray(image_extension, ['gif', 'png', 'jpg', 'jpeg', 'jfif']) == -1) {

        swal({
            title: "Invalid File Type!",
            text: "Image must be in 'gif','png','jpg','jpeg' format!",
            type: "error",
            showCancelButton: false,
            confirmButtonColor: "#5cb85c",
            confirmButtonText: '<span class="glyphicon glyphicon-ok"></span>&nbspProceed',
            confirmButtonClass: "btn"
        }).then((result) => {
            if (result.value) {

                this.value = "";
                document.getElementById("image_add").src = "img/avatar.png";

            }
        });

    }

    //filter size
    else if (image_size > 2000000) {

        swal({
            title: "Invalid File Size!",
            text: "Please select an image with size lower than 2MB!",
            type: "error",
            showCancelButton: false,
            confirmButtonColor: "#5cb85c",
            confirmButtonText: '<span class="glyphicon glyphicon-ok"></span>&nbspProceed',
            confirmButtonClass: "btn"
        }).then((result) => {
            if (result.value) {

                this.value = "";
                document.getElementById("image_add").src = "img/avatar.png";

            }
        });

    } else if (this.files && this.files[0]) {
        document.getElementById("image_add").classList.remove("required-fields");
        var obj = new FileReader();
        obj.onload = function(data) {
            document.getElementById("image_add").src = data.target.result;
        }
        obj.readAsDataURL(this.files[0]);
    }

});
</script>