<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-lg-between">
        <h1 class="logo me-auto me-lg-0">
            <a href="index.php">GSM PIONEER<span>.</span></a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto" href="#portfolio">Gallery</a></li>
                
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->

        <a href="#about" class="get-started-btn scrollto">Get Started</a>
    </div>

    <div class="action">
        <div class="profile" onclick="menuToggle();">
            <img src="assets/img/user.png" style="height: 30px;width:30px;">
        </div>
        <div class="menu">
           
            <ul>
                <li>
                    <i class='bx bxs-user'></i><a href="_login/login.php">Login</a>
                </li>
                

            </ul>

        </div>
    </div>
    <script>
    function menuToggle() {
        const toggleMenu = document.querySelector(".menu");
        toggleMenu.classList.toggle("active");
    }
    </script>
</header>
<!-- End Header -->