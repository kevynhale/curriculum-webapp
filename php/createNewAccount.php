<?php
include("../authenticate.php");
include("dbConnect.php");


if (isset($_REQUEST['id'])) { $id = $_REQUEST['id']; }
if (isset($_REQUEST['token_id'])) { $token_id = $_REQUEST['token_id']; }
if (isset($_REQUEST['name'])) { $name = $_REQUEST['name']; }
if (isset($_REQUEST['email'])) { $email = $_REQUEST['email']; }


$statement = $mysqli->prepare("INSERT INTO curriculum_users (id, token_id, name, email) VALUES ('".$id."', '".$token_id."', '".$name."', '".$email."')");
$statement->execute();

$jsonoutput = array();
  $jsonoutput['result'] = 'success';
  echo json_encode($jsonoutput);
        
?>
