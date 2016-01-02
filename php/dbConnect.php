<?php

########## MySql details  #############
$db_username = "2018160_cur"; //Database Username
$db_password = "curriculum123"; //Database Password
$host_name = "pdb6.runhosting.com"; //Mysql Hostname
$db_name = '2018160_cur'; //Database Name
###################################################################

 // connect to database
$mysqli = new mysqli($host_name, $db_username, $db_password, $db_name);
        if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
        }
        
?>