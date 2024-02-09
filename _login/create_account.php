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
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body style="overflow-y: scroll; background-attachment: fixed;padding-top: 50px;">
    <img class="wave" src="img/wave.png" />
    <div class="container">
        <div class="img">
            <img src="img/man.png" />
        </div>


        <div class="login-content" >

            <form >
                <img src="img/avatar.png" />
                <h2 class="title">GSM Pioneer</h2>
                <h3 style="margin-bottom: 20px;">Cellphone and Laptop Repair</h3>
           
                <div class="input-div one">
                    <div class="i">
                      
                    </div>
                    <div class="div">
                        <h5>E-mail address</h5>
                        <input type="email" class="input" id="email">
                    </div>
                </div>

                <div class="input-div one">
                    <div class="i">
                    
                    </div>
                    <div class="div">
                        <h5>First Name</h5>
                        <input type="text" class="input" id="firstname">
                    </div>
                </div>

                <div class="input-div one">
                    <div class="i">
                    
                    </div>
                    <div class="div">
                        <h5>Middle Name</h5>
                        <input type="text" class="input" id="middlename">
                    </div>
                </div>

                <div class="input-div one">
                    <div class="i">
                    
                    </div>
                    <div class="div">
                        <h5>Last Name</h5>
                        <input type="text" class="input" id="lastname">
                    </div>
                </div>

                <div class="input-div one">
                    <div class="i">
                    
                    </div>
                    <div class="div">
                        <h5>Contact</h5>
                        <input type="number" class="input" id="contact">
                    </div>
                </div>

                <div class="input-div one">
                    <div class="i">
                       
                    </div>
                    <div class="div">
                        <h5>Address</h5>
                        <input type="text" class="input" id="address">
                    </div>
                </div>

                <div class="input-div pass">
                    <div class="i">
                      
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" id="password">
                    </div>
            </div>

            <div class="input-div pass">
                    <div class="i">
                      
                    </div>
                    <div class="div">
                        <h5>Confirm Password</h5>
                        <input type="password" class="input" id="c_password">
                    </div>
            </div>
               <a href="login.php">Log-in</a>
                 <a style="color:white;text-align:center; vertical-align:center;" class="btn" id="btn_login"><center>Register</center></a>
               
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
    var firstname = document.getElementById("firstname").value.trim();
    var middlename = document.getElementById("middlename").value.trim();
    var lastname = document.getElementById("lastname").value.trim();
    var contact = document.getElementById("contact").value.trim();
    var address = document.getElementById("address").value.trim();
    var c_password = document.getElementById("c_password").value.trim();
   
     if (email ==''  || password == '' || firstname =='' || lastname =='' || contact =='' || address=='' || c_password=='') {
       alert("Please complete your account credentials!"); 
       return;
    }

     if (password != c_password) {
       alert("Password didnot match!"); 
       return;
    }



    var other_data = 'email='+email+
                     '&password='+password+
                     '&firstname='+firstname+
                     '&middlename='+middlename+
                     '&lastname='+lastname+
                     '&contact='+contact+
                     '&address='+address;

     $.ajax({

                  url:"functions/register.php?"+other_data, 
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
                          alert('Registration success! We have sent you a verification to your email. Thank you! ');
                           window.location="login.php";                 
                         
                      }else{
                         alert(data);
                      }
              } 

        });
   
});

function clearFields(){
  document.getElementById("email").value='';
  document.getElementById("password").value=''; 
}
</script>