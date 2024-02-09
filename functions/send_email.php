<?php
$subject = $_GET["subject"];
$email = $_GET["email"];
$msg = $_GET["message"];


   
                        
                        // use wordwrap() if lines are longer than 70 characters
                        $msg = wordwrap($msg,70);
                        
                      if (mail('gsmpioneer00@gmail.com',$subject,$msg,'From: '.$email)){
                      	echo '200';
                      }
?>