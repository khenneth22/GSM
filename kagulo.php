<?php include("partials/header.php");?>




<?php

/*$id=$_GET['id'];
//php for Filling the whole record starts here
//But before the step 2 proceed on filling up data from database to display it on form
//Video tutorial 7 (4 mins:43 Sec)
$stall="";
$loca="";
$status="";
$image="";

$res=mysqli_query($link,"SELECT * FROM tbl_stall WHERE id=$id");
while($row=mysqli_fetch_array($res))
{
        $stall=$row["stall"];
        $loca=$row["loca"];
        $status=$row["status"];
     

}*/
?>
<link rel="stylesheet" type="text/css" href="assets/css/radio.css">

<link rel="stylesheet" type="text/css" href="assets/css/modal.css">





<div class="dash-content">
    <!---Content area starts here--->

    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <div class="search">
                <label>
                    <input type="text" placeholder="Search here">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div>

            <div class="user">
                <img src="assets/imgs/customer01.jpg" alt="">
            </div>
        </div>

        <div class="container">

            <div class="success" style="color:green; display: none;"></div>
            <a href="admin_manage_role.php"> <input type="submit" class="goback" value="< Go Back" name=""></a>
            <div class="title">Administrator Information</div>
            <div class="content">
                <form action="#" method="POST">

                    <div class="user-details">

                        <div class="input-box">

                            <span class="details">Role</span>
                            <input type="text" name="branch" style="text-transform: capitalize;" pattern=".{3,255}"
                                title="Role must be between 3 and 255 character in length and containes only letters e.g: Jane T. Doe(.)"
                                value="<?php /* echo $branch;*/?>">
                        </div>


                        <div class="input-box">
                            <span class="details">Description</span>
                            <textarea name="description"><?php /* echo $description;*/?></textarea>
                        </div>





                        <div class="input-box">
                            <span class="details" style="display: none;">id</span>
                            <input type="hidden" name="id" value="<?php /* echo $id;*/?>">
                        </div>

                        <div class="input-boxuser">
                            <p class="cate">Status</p>
                            <div class="radio-container">
                                <input type="radio" id="yes1"
                                    <?php /* if($status=="active" || $status=="Active") {echo "Checked";}*/?>
                                    value="active" name="status" />
                                <label class="rad" for="yes1">Active</label>

                                <input type="radio" id="no1"
                                    <?php /* if($status=="inactive" || $status=="Inactive") {echo "Checked";}*/?>
                                    value="inactive" name="status" />
                                <label class="rad" for="no1">Inactive</label>


                            </div>


                        </div>
                    </div>


                    <div class="button">
                        <input type="submit" value="Update" name="submit">
                    </div>


                </form>

            </div>
        </div>

    </div>

</div>
</div>



<script src="css/party/js/match.js"></script>
<script src="css/party/js/script.js"></script>
<script src="script.js"></script>


<?php

if(isset($_POST['submit']))
{

  //1.create sql query for update
   mysqli_query($link,"update tbl_stall set 
        stall='$_POST[stall]',
        loca='$_POST[loca]',
        status='$_POST[status]',
        image='$_POST[image]'
        
        where id=$id")or die (mysqli_error($link));

    //the php cuts here
        ?>
<script>
window.location = "admin_addstall.php";
</script>
<!--php continue here-->
<?php  


}

?>








<?php include("partials/footer.php");?>



<style type="text/css">
.goback {
    color: black;
    font-size: 15px;
    transform: translateY(50%);
    width: 100px;
    height: 40px;
    border: 1px solid transparent;


    border-radius: 10px;
}

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.container {
    margin-top: 20px;
    max-width: 900px;
    width: 100%;
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
}

.container .title {
    font-size: 25px;
    font-weight: 500;
    position: relative;
}

.container .title::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    border-radius: 5px;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
}

.content form .user-details {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 20px 0 12px 0;
}

form .user-details .input-box {
    margin-bottom: 15px;
    width: calc(100% / 2 - 20px);
}

form .input-box span.details {
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
}

.user-details .input-box input {
    height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
}

.user-details .input-box select {
    height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
    margin-right: 2px;
}

.user-details .input-box input:focus,
.user-details .input-box input:valid {
    border-color: #9b59b6;
}

form .gender-details .gender-title {
    font-size: 20px;
    font-weight: 500;
}

form .category {
    display: flex;
    width: 80%;
    margin: 14px 0;
    justify-content: space-between;
}

form .category label {
    display: flex;
    align-items: center;
    cursor: pointer;
}

form .category label .dot {
    height: 18px;
    width: 18px;
    border-radius: 50%;
    margin-right: 10px;
    background: #d9d9d9;
    border: 5px solid transparent;
    transition: all 0.3s ease;
}

#dot-1:checked~.category label .one,
#dot-2:checked~.category label .two,
#dot-3:checked~.category label .three {
    background: #9b59b6;
    border-color: #d9d9d9;
}

form input[type="radio"] {
    display: none;
}

form .button {
    height: 45px;
    margin: 35px 0
}

form .button input {
    height: 100%;
    width: 100%;
    border-radius: 5px;
    border: none;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
}

form .button input:hover {
    /* transform: scale(0.99); */
    background: linear-gradient(-135deg, #71b7e6, #9b59b6);
}

@media(max-width: 584px) {
    .container {
        max-width: 100%;
    }

    form .user-details .input-box {
        margin-bottom: 15px;
        width: 100%;
    }

    form .category {
        width: 100%;
    }

    .content form .user-details {
        max-height: 300px;
        overflow-y: scroll;
    }

    .user-details::-webkit-scrollbar {
        width: 5px;
    }
}

@media(max-width: 459px) {
    .container .content .category {
        flex-direction: column;
    }
}

}
</style>