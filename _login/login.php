<?php
session_start();
$user_type='';
if(empty($_SESSION['_usertype'])) {
    
}else{
  $user_type =$_SESSION['_usertype']; 
  if ($user_type=='Customer') {
    header("Location: ../Customer/");
    
  }else if ($user_type=='Employee') {
    header("Location: ../Employee/");
    
  }else if ($user_type=='Administrator') {
    header("Location: ../Administrator/");
    
  }
 
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Log in</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
    <img class="wave" src="img/wave.png" />
    <div class="container">
        <div class="img">
            <img src="img/man.png" />
        </div>


        <div class="login-content">

            <form>
                <img src="img/avatar.png" />
                <h2 class="title">GSM Pioneer</h2>
                <h3 style="margin-bottom: 20px;">Cellphone and Laptop Repair</h3>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>E-mail address</h5>
                        <input type="email" class="input" id="email">
                    </div>
                </div>

                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" id="password">
                    </div>
                </div>
                <a href="create_account.php">Create account</a>
                <!-- <a href="#">Forgot Password?</a> -->

                <a style="color:white;text-align:center; vertical-align:center;" class="btn" id="btn_login">
                    <center>Login</center>
                </a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
    <!-- AJAX page will not work offline -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</body>

</html>
<script type="text/javascript">
$(document).on("click", "#btn_login", function() {

    var email = document.getElementById("email").value.trim();
    var password = document.getElementById("password").value.trim();

    if (email == '' || password == '') {
        alert("Please complete your login credentials!");
        return;
    }



    var other_data = 'email=' + email +
        '&password=' + password;

    $.ajax({

        url: "functions/login.php?" + other_data,
        type: "POST",
        contentType: false,
        cache: false,
        processData: false,

        beforeSend: function() {

        },
        error: function(data) {

        },
        success: function(data) {

            if (data.includes('Administrator')) {
                clearFields();

                window.location = "../Administrator/index.php";

            } else if (data.includes('Employee')) {
                clearFields();
                window.location = "../Employee/index.php";

            } else if (data.includes('Customer')) {
                clearFields();
                window.location = "../Customer/index.php";
            } else {
                alert(data);
            }
        }

    });

});

function clearFields() {
    document.getElementById("email").value = '';
    document.getElementById("password").value = '';
}
</script>