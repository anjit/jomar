<?php
$filename = 'lets.php';
if (file_exists($filename)) {
  header('location:install.php'); 
   } 
   else{
     header('location:login.php'); 	
   }
