<?php

$filename = "../dbconnect-info.php";
$filename2 = "../../../dbconnect-info.php";

if (file_exists($filename)) {
     include("../dbconnect-info.php");
 } 
 else if (file_exists($filename2)) {
      include("../../../dbconnect-info.php");
 }
 
 else {
     include("../../dbconnect-info.php");
 }



 // connect to database
$mysqli = new mysqli($host_name, $db_username, $db_password, $db_name);
        if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
        }
        
?>
