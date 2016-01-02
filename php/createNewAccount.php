<?php
if (isset($_REQUEST['id'])) { $id = $_REQUEST['id']; }
if (isset($_REQUEST['token_id'])) { $token_id = $_REQUEST['token_id']; }
if (isset($_REQUEST['name'])) { $name = $_REQUEST['name']; }
if (isset($_REQUEST['email'])) { $email = $_REQUEST['email']; }

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
$statement = $mysqli->prepare("INSERT INTO curriculum_users (id, token_id, name, email) VALUES ('".$id."', '".$token_id."', '".$name."', '".$email."')");
$statement->execute();

$jsonoutput = array();
  $jsonoutput['result'] = 'success';
  echo json_encode($jsonoutput);
        
?>