<?php

   if(!isset($_SESSION)) { 
  session_start(); 
} 
$link=mysqli_connect("localhost","root","") or die (mysqli_error($link));
mysqli_select_db($link,"db_gsm") or die(mysqli_error($link));

?>