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
  $password = $_SESSION['_password'];
  $email = $_SESSION['_email'];
  $firstname = $_SESSION['_first_name'];
  $middlename = $_SESSION['_middle_name'];
  $surname = $_SESSION['_surname'];
  $contact = $_SESSION['_contact'];
  $address = $_SESSION['_address'];
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

    <title>Administrator - Profile</title>

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
                                <!--  <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="porfile.php">
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
                <div class="container-fluid">

                    <div class="container">
                        <div class="row">

                            <div class="col-sm-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="col-md-12 pr-1">
                                            <div class="form-group">
                                                <center> <img class="" id="image_add" src="img/<?php echo $photo; ?>"
                                                        style="height: 230px; width: 230px;border-radius: 50%;box-shadow: 20px 20px 50px lightgrey;margin-bottom: 20px;">
                                                    <div class="col-sm-12" style="margin-left: 0px;">
                                                        <label class="btn btn-dark "
                                                            style="color:#fff; border-radius:8px;">
                                                            <input class="form-control" type="hidden" name="size"
                                                                value="10000000">
                                                            <center> <span></span>&nbsp;Browse<input type="file"
                                                                    id="file_add" name="image" style="display: none;">
                                                            </center>
                                                        </label>
                                                    </div>
                                                </center>
                                            </div>
                                        </div>
                                        <span>E-mail address... </span>
                                        <input class="form-control" type="email" id="email" style="margin-bottom: 20px;"
                                            placeholder="Email..." disabled="" value="<?php echo $email; ?>">
                                        <span>First name</span>
                                        <input class="form-control" type="text" id="firstname"
                                            style="margin-bottom: 20px;" placeholder="First name..."
                                            value="<?php echo $firstname; ?>">
                                        <span>Middle name</span>
                                        <input class="form-control" type="text" id="middlename"
                                            style="margin-bottom: 20px;" placeholder="Middle name..."
                                            value="<?php echo $middlename; ?>">
                                        <span>Last name</span>
                                        <input class="form-control" type="text" id="lastname"
                                            style="margin-bottom: 20px;" placeholder="Last name..."
                                            value="<?php echo $surname; ?>">
                                        <span>Contact #</span>
                                        <input class="form-control" type="number" maxlength="11" id="contact"
                                            style="margin-bottom: 20px;" placeholder="Contact number..."
                                            value="<?php echo $contact; ?>">
                                        <span>Address</span>
                                        <input class="form-control" type="text" id="address"
                                            style="margin-bottom: 20px;" placeholder="Address..."
                                            value="<?php echo $address; ?>">

                                    </div>
                                    <div class="card-footer">
                                        <a class="btn btn-dark" style="color:white;float:right;"
                                            id="btn_save">Update</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="card card-chart">
                                    <div class="card-header">
                                        <h5 class="card-category">Change Password</h5>


                                    </div>
                                    <div class="card-body">

                                        <h4>Password</h4>
                                        <span>Current password:</span>
                                        <input class="form-control" type="password" name="" id="current_password">
                                        <span>New password:</span>
                                        <input class="form-control" type="password" name="" id="new_password">
                                        <span>Re-type password:</span>
                                        <input class="form-control" type="password" name="" id="confirm_password">

                                    </div>

                                    <div class="card-footer">

                                        <a class="btn btn-dark" id="btn_save_password"
                                            style="color:white;float: right;margin-bottom: 20px;"
                                            data-password="<?php echo $password; ?>"> Update</a>
                                    </div>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
<script type="text/javascript">
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


function updateRecord() {
    var email = document.getElementById("email").value.trim();
    var firstname = document.getElementById("firstname").value.trim();
    var middlename = document.getElementById("middlename").value.trim();
    var lastname = document.getElementById("lastname").value.trim();
    var contact = document.getElementById("contact").value.trim();
    var address = document.getElementById("address").value.trim();

    var file_property = document.getElementById("file_add").files[0];
    var image = document.getElementById("file_add").value;
    var fd = new FormData();
    fd.append("file_add", file_property);


    if (firstname == '') {
        var element = document.getElementById("firstname");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("firstname");
        element.classList.remove("required-fields");
    }

    if (lastname == '') {
        var element = document.getElementById("lastname");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("lastname");
        element.classList.remove("required-fields");
    }

    if (contact == '') {
        var element = document.getElementById("contact");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("contact");
        element.classList.remove("required-fields");
    }

    if (address == '') {
        var element = document.getElementById("address");
        element.classList.add("required-fields");
    } else {
        var element = document.getElementById("address");
        element.classList.remove("required-fields");
    }





    if (email == '' || firstname == '' || lastname == '' || contact == '' || address == '') {
        swal({
            title: "Warning!",
            text: "Please complete the required fields.",
            type: "error"
        });
        return;
    }


    var other_data = 'email=' + email +
        '&firstname=' + firstname +
        '&middlename=' + middlename +
        '&lastname=' + lastname +
        '&firstname=' + firstname +
        '&contact=' + contact +
        '&address=' + address +
        '&image_name=' + new Date().getTime();


    swal({
        title: "Continue?",
        text: "Do you want to update this employee?",
        type: "question",
        showCancelButton: true,
        confirmButtonColor: "#5cb85c",
        cancelButtonColor: "#d9534f",
        confirmButtonText: 'Confirm',
        confirmButtonClass: "btn"
    }).then((result) => {
        if (result.value) {
            $.ajax({

                url: "functions/update_information.php?" + other_data,
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
                        swal({
                            title: "Success!",
                            text: "Your profile has been updated! Login again for security purposes",
                            type: "success"
                        }).then(okay => {
                            if (okay) {
                                window.location = '../logout.php';
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
    updateRecord();
});

$(document).on("click", "#btn_save_password", function() {
    event.preventDefault();
    var current_password = document.getElementById("current_password").value;
    var new_password = document.getElementById("new_password").value;
    var confirm_password = document.getElementById("confirm_password").value;
    var oldpass = $(this).data('password');

    if (confirm_password != new_password) {
        swal({
            title: "Warning!",
            text: "Password mismatch!",
            type: "warning"
        });
        return;
    }

    if (confirm_password == '' || new_password == '' || current_password == '') {
        swal({
            title: "Warning!",
            text: "Please complete the password fields!",
            type: "warning"
        });
        return;
    }

    if (current_password != oldpass) {
        swal({
            title: "Warning!",
            text: "Password mismatch!",
            type: "warning"
        });
        return;
    }


    var other_data = "new_password=" + new_password;
    swal({
        customClass: 'swal-wide',
        title: "Do you want update your password?",
        text: "",
        type: "question",
        showCancelButton: true,
        confirmButtonColor: "#5cb85c",
        cancelButtonColor: "#d9534f",
        confirmButtonText: '<span class="glyphicon glyphicon-ok"></span>&nbspProceed',
        cancelButtonText: '<span class="glyphicon glyphicon-remove"></span>&nbspDecline',
        confirmButtonClass: "btn",
        cancelButtonClass: "btn"
    }).then((result) => {

        if (result.value) {
            $.ajax({

                url: 'functions/update_password.php?' + other_data,
                method: "POST",
                contentType: false,
                cache: false,
                processData: false,

                beforeSend: function() {

                },
                error: function(data) {

                },
                success: function(data) {

                    if (data.includes('200')) {

                        swal({
                            title: "Success!",
                            text: "Your password has been updated! Login again for security purposes.",
                            type: "success"
                        }).then(okay => {
                            if (okay) {
                                window.location.href = "../logout.php";
                            }
                        });
                    } else {
                        swal({
                            title: "Warning!",
                            text: data,
                            type: "warning"
                        });

                    }
                }

            });

            // else result
        }
    });
});
</script>