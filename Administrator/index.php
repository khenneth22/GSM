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
  if(empty($_GET["_year"])){
  $_year='2022';
}else{
  $_year=$_GET['_year'];
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
<!--  -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <select class="form-control col-sm-3" style="font-style: italic;" id="opt_year">
                            <option selected="" hidden="" value="<?php echo $_year; ?>">as of year <?php echo $_year; ?>
                            </option>
                            <option value="2022">as of year 2022</option>
                            <option value="2023">as of year 2023</option>
                            <option value="2024">as of year 2024</option>
                            <option value="2025">as of year 2025</option>
                            <option value="2026">as of year 2026</option>
                            <option value="2027">as of year 2027</option>
                            <option value="2028">as of year 2028</option>
                            <option value="2029">as of year 2029</option>
                            <option value="2030">as of year 2030</option>
                        </select>
                        <a style="color:white;cursor:pointer;" id="btn_generate"
                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>



                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area" style="height: 450px;">
                                        <canvas id="sealseChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings by Stalls</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area" style="height: 450px;">
                                        <canvas id="stallSalesChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->

                    </div>

                    <!-- Content Row -->


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
var stall_id='';
$(document).ready(function() {
    fetchSaleReport();
    fetchStalls();
    fetchStallReport();
});
$(document).on("click", "#btn_generate", function() {
    window.location = "index.php?_year=" + document.getElementById("opt_year").value;
});

function fetchSaleReport() {

    var chartareavalues = '';
    var _year = document.getElementById("opt_year").value;
    $.ajax({

        url: "functions/select_sales_chart_values.php?_year=" + _year,
        method: "POST",
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,

        beforeSend: function(data) {

        },
        error: function(data) {

        },
        success: function(data) {
            chartareavalues = "[" + data + "]";
            var ctx = document.getElementById("sealseChart");
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct",
                        "Nov", "Dec"
                    ],
                    datasets: [{
                        label: "Sales",
                        lineTension: 0.3,
                        backgroundColor: "rgba(78, 115, 223, 0.05)",
                        borderColor: "rgba(78, 115, 223, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "rgba(78, 115, 223, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: JSON.parse(chartareavalues),
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return '₱' + number_format(value);
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex]
                                    .label || '';
                                return datasetLabel + ': ₱ ' + number_format(tooltipItem.yLabel,
                                    2);
                            }
                        }
                    }
                }
            });



            // });

        }

    });
}

function fetchStallReport() {

    var chartareavalues = '';
    var _year = document.getElementById("opt_year").value;
    $.ajax({

        url: "functions/select_stall_sales_chart.php?_year=" + _year,
        method: "POST",
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,

        beforeSend: function(data) {

        },
        error: function(data) {

        },
        success: function(data) {
            chartareavalues = "[" + data + "]";
            var ctx = document.getElementById("stallSalesChart");
            var myLineChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: stall_id,
                    datasets: [{
                        label: "Sales",
                        lineTension: 0.5,
                        backgroundColor: "rgba(78, 115, 223, 1)",
                        borderColor: "rgba(78, 115, 223, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "rgba(78, 115, 223, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: JSON.parse(chartareavalues),
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return '₱' + number_format(value);
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex]
                                    .label || '';
                                return datasetLabel + ': ₱ ' + number_format(tooltipItem.yLabel,
                                    2);
                            }
                        }
                    }
                }
            });



            // });

        }

    });
}

function fetchStalls() {

    var chartareavalues = '';
    var _year = document.getElementById("opt_year").value;
    $.ajax({

        url: "functions/select_stalls_chart_label.php",
        method: "POST",
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,

        beforeSend: function(data) {

        },
        error: function(data) {

        },
        success: function(data) {
           stall_id=data;;
        }
    })
}
</script>