<?php
  require ("db_connection/myConn.php");
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>GSM Pioneer Homepage</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/mystyle.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Gp - v4.9.0
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/0.0
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-lg-between">
            <h1 class="logo me-auto me-lg-0">
                <a href="index.php"><img src="assets/img/logo.png" width="50" height="500" alt="GSM PIONEER LOGO"></a>
                <a href="index.php">GSM PIONEER<span>.</span></a>

            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#tutorial">Tutorial</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>

                    <li><a class="nav-link scrollto" href="#portfolio">Gallery</a></li>

                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    <li class="dropdown"><a href="#"><span>Others</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="termsandcondition.php">Terms & Condition</a></li>
                            <li><a href="privacypolicy.php">Privacy Policy</a></li>

            </nav>
            <!-- .navbar -->

            <a href="#about" class="get-started-btn scrollto">Get Started</a>
        </div>

        <div class="action">
            <div class="profile">
                <a href="_login/login.php">
                    <img src="assets/img/user.png" style="height: 30px;width:30px;">
                </a>
            </div>
            <div class="menu">

                <ul>
                    <li>
                        <i class='bx bxs-user'></i><a href="">Login</a>
                    </li>


                </ul>

            </div>
        </div>

    </header>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                <div class="col-xl-6 col-lg-8">
                    <h1>Powerful Solutions With GSM Pioneer<span>.</span></h1>

                </div>
            </div>


        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <img style="border-radius: 8px;box-shadow: 20px 20px 50px grey;" src="assets/img/about.jpg"
                            class="img-fluid" alt="" />
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right"
                        data-aos-delay="100">
                        <h3>
                            GSM Pioneer has been helping the community in terms of fixing their gadgets since 2004.
                        </h3>
                        <p class="fst-italic">
                            GSM Pioneer is a gadget repair shop business located in 2nd floor Victory Market Tanauan
                            Batangas.
                        </p>
                        <ul>
                            <li>
                                <i class="ri-check-double-line"></i> FREE Check Up and Estimate for your mobile phones,
                                tablets and laptops.
                            </li>
                            <li>
                                <i class="ri-check-double-line"></i> We offer quality service and warranty.
                            </li>
                            <li>
                                <i class="ri-check-double-line"></i> Our technicians offer different sets of expertise
                                whom
                                could help you solve the problem with your gadgets.
                            </li>
                        </ul>
                        <p>
                            "We continue to serve you the best we can."
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->


        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="image col-lg-6"
                        style="background-image: url('assets/img/3gsm.jpg');border-radius: 8px;box-shadow: 20px 20px 50px grey;"
                        data-aos="fade-right"></div>
                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
                        <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
                            <i class="bx bx-receipt"></i>
                            <h4>Legitimacy</h4>
                            <p>
                                Our Business is legal and has all the document listed in <a href="">here</a>
                            </p>
                        </div>
                        <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
                            <i class="bx bx-cube-alt"></i>
                            <h4>Service Offers</h4>
                            <p>
                                We Offer a variety of services here. Hardware and Software problem repair.
                            </p>
                        </div>
                        <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
                            <i class='bx bx-wrench'></i>
                            <h4>Service Quality</h4>
                            <p>
                                Our Business offers a High Quality Service that conform the expectation of our
                                Customers.
                            </p>
                        </div>
                        <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
                            <i class="bx bx-shield"></i>
                            <h4>Security</h4>
                            <p>
                                Clients can ensure the safety and security of their gadgets because our staff will
                                handle
                                it
                                with care.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Features Section -->


        <!-- ======= tutorial section ======= -->
        <section id="tutorial" class="services">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Tutorial</h2>
                    <p>How to Schedule an Appointment?</p>
                </div>
                <br><br>
                <!-- ======= Tutorial ======= -->

                <!--<section id="tutorial" class="services">-->
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <br> <br> <br>
                        <img src="assets/img/t1.png" height="200%" id=sample1 alt="img" />
                        <p id=s1> <strong> Step 1: &nbsp; &nbsp; </strong> First step search for &nbsp; <a
                                href="index.php">
                                <span>gsm-pioneer.com</span>
                            </a>&nbsp;
                            website
                            then
                            you
                            will
                            be
                            directed on their homepage, click profile to Log-in or Sign-up. <br>

                            <hr><br><br><br>

                            <img src="assets/img/t2.png" height="200%" id=sample1 alt=" img" />
                        <p id=s1> <strong> Step 2: &nbsp; &nbsp;</strong> After clicking the profile you
                            will be
                            directed in
                            Log-in page, if
                            you are registered customer, you can just log-in your account. But if you
                            are not
                            registered yet just click create account. <br>

                            <hr><br><br><br><img src="assets/img/t3.png" height="200%" id=sample1 alt=" img" />
                        <p id=s1> <strong>Step 3:&nbsp; &nbsp; </strong> When you click create account
                            you will be
                            directed
                            in
                            sign-up
                            page, just fill-up your personal and needed information to create customers
                            account
                            to registered and complete your profile. <br>

                            <hr><br><br><br> <img src="assets/img/t4.png" height="200%" id=sample1 alt=" img" />
                        <p id=s1> <strong>Step 4: &nbsp; &nbsp; &nbsp; &nbsp;</strong> After creating
                            customers
                            account you can
                            log-in and
                            directly
                            connect to the system. After logging in, click the plus(+) sign button on
                            the upper
                            left corner and choose your desired date, time, and stall on where do you
                            want your
                            services proceed. <br>

                            <hr><br><br><br>
                            <img src="assets/img/t5.png" height="200%" id=sample1 alt="img" />
                        <p id=s1> <strong>Step 5: &nbsp;</strong> After placing a request of an
                            appointment,
                            your
                            request
                            will be
                            pending you have to wait for about 30 minutes to approved your request.
                            <br>

                            <hr><br><br><br>
                            <img src="assets/img/t6.png" height="200%" id=sample1 alt="img" />
                        <p id=s1> <strong>Step 6: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>
                            While your
                            account is pending
                            you can add
                            your
                            concerns
                            choose
                            device type, device unit, and service type then click add. After adding a
                            request,
                            you can add more concerns for multiple devices that you wanted to fix. In
                            this case
                            having a concern will immediately approve your request. <br>

                            <hr>


                        </p>
                    </div>
        </section>


        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Services</h2>
                    <p>Check our Services</p>
                </div>


                <div class="row">
                    <?php

              

                $sql = "SELECT `_id`, `_device_type`, `_device_unit`, `_service_type`, `_service`, `_service_charge`, `_emp_rate`, `_item_code` FROM `tbl_services` ";
                $result= $con_str->query($sql);
                $output='';
                if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $photo='';
                            $itemcode='';
                            $_item_code='';
                            $itemcode=$row["_item_code"];
                            $sql = "SELECT `_img` FROM `tbl_items` WHERE `_item_code` LIKE '$itemcode'";
                            $result2= $con_str->query($sql);

                            if($result2->num_rows > 0) {

                                while($row2 = $result2->fetch_assoc()) {
                                    $photo = $row2["_img"];
                                }

                            }
                            if ($photo==''){
                                $photo='no-image-available.png';
                            }

                            $output.='<div class="col-lg-4 col-md-6 align-items" data-aos="zoom-in" data-aos-delay="100" style="margin-bottom:25px;">
                    <div class="icon-box">
                        <img src="Administrator/img/items/'.$photo.'" style="height: 180px; width: 180px;border-radius: 5px;box-shadow: 20px 20px 50px grey;margin-bottom:20px;">
                        <h4><a href="">'.$row["_service"].'</a></h4>
                        <p>
                            '.$row["_device_unit"].'
                            <br>
                            for only <strong>₱'.number_format($row["_service_charge"],2).'</strong>
                        </p>

                    </div>
                </div>';
                        }

                }

                echo $output;
            ?>






                </div>
            </div>
        </section>
        <!-- End Services Section -->



        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Gallery</h2>
                    <p>Check our Gallery</p>
                </div>



                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">


                    <?php 

                 $sql = "SELECT `_id`, `_title`, `_img` FROM `tbl_gallery` ";
                $result= $con_str->query($sql);
                $output='';
                if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $output.='<div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                    <div class="portfolio-wrap">
                                        <img src="Administrator/img/gallery/'.$row["_img"].'" class="img-fluid" alt="" />
                                        <div class="portfolio-info">
                                          
                                            <p>'.$row["_title"].'</p>
                                            <div class="portfolio-links">
                                                <a href="Administrator/img/gallery/'.$row["_img"].'" data-gallery="portfolioGallery"
                                                    class="portfolio-lightbox" title="'.$row["_title"].'"><i class="bx bx-plus"></i></a>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }
                    }
                    echo $output;

                ?>






                </div>
            </div>
        </section>
        <!-- End Portfolio Section -->


        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="zoom-in">
                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">



                        <?php 

                        $sql = "SELECT `_feedback`,`_customer_email`,`_customer_name` FROM `tbl_appointment` WHERE `_date_feedback` NOT LIKE '0000-00-00' ";
                        $result= $con_str->query($sql);
                        $output='';
                        if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $customer_email = $row["_customer_email"];
                                    $sql = "SELECT `_img` FROM `tbl_users` WHERE `_email` LIKE '$customer_email'";
                                        $result2= $con_str->query($sql);

                                        if($result2->num_rows > 0) {

                                            while($row2 = $result2->fetch_assoc()) {
                                                $photo = $row2["_img"];
                                            }

                                        }

                                        if ($photo==''){
                                            $photo ='avatar.png';
                                        }

                                    $output.='<div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="Customer/img/my-img/'.$photo.'" class="testimonial-img" alt="" />
                            <h3>'.$row["_customer_name"].'</h3>
                            <h4>Customer</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                '.$row["_feedback"].'
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>';

                                }
                        }
                        echo $output;
                ?>




                        <!-- End testimonial item -->
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- End Testimonials Section -->



        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Contact</h2>
                    <p>Contact Us</p>
                </div>

                <div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241.868471766145!2d121.14648620734022!3d14.083342800000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd6f53d3ee52c9%3A0x8ab9f1073983356!2sVictory%20Mall%20and%20Market%20Tanauan!5e0!3m2!1sen!2sph!4v1664079440342!5m2!1sen!2sph"
                        width="1300" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>2nd floor victory Market Tanauan Batangas, Tanauan,
                                    Philippines, 4232</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>gsm@gmail.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+639245234232</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required />
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required />
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required />
                            </div>
                            <div class="form-group mt-3">
                                <textarea id="message" class="form-control" name="message" rows="5" placeholder="Message"
                                    required></textarea>
                            </div>
                           
                            <div class="text-center">
                               <div class="text-center"  ><button style="margin-top: 20px;" class="btn btn-warning" id="btn_send">Send Message</button></div>
                            </div>
                     
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Section -->
    </main>
    <!-- End #main -->
    <footer id="footer">

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>GSM Pioneer</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/sweetalert2.all.min.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
<script type="text/javascript">
     $(document).on("click", "#btn_send", function() {
    var _name = document.getElementById("name").value.trim();
    var subject = document.getElementById("subject").value.trim();
    var email = document.getElementById("email").value.trim();
    var message = document.getElementById("message").value.trim();
    if(_name == '' || subject =='' || email =='' || message==''){
       swal({title:"Warning!",text: "Complete your message", type:"warning"}); 
      return;
    }

    var other_data = '_name='+_name+'&subject='+subject+'&email='+email+'&message='+message;
     swal({
                            customClass: 'swal-wide',
                            title: "", 
                            text: "Do you want send this email?", 
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

                                            url:'functions/send_email.php?='+other_data, 
                                            method:"POST",                                            
                                            contentType:false,
                                            cache:false,
                                            processData:false,

                                            beforeSend:function() {

                                            },  
                                            error:function(data){
                                                   
                                            }, 
                                            success:function(data){   

                                             if(data.includes('200')){
                                                   swal({title:"Success!",text: "Your email has been sent. Thank you!", type:"success"});  

                                       document.getElementById("name").value='';
                                       document.getElementById("subject").value='';
                                       document.getElementById("email").value='';
                                       document.getElementById("message").value='';                                                        
                                            }else{
                                               swal({title:"Warning!",text: data, type:"warning"}); 

                                            }
                                        } 

                                 });
    
                      // else result
                 }
                      });
  });
</script>