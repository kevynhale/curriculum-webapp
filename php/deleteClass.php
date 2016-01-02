<?php
include("../authenticate.php");
include("dbConnect.php");

if (isset($_REQUEST['title'])) { $title = $_REQUEST['title']; }

$user_id = $_SESSION['id'];

$statement = $mysqli->prepare("DELETE FROM class_list WHERE user_id = '".$user_id."' and class_id = '".$title."'");
$statement->execute();
$jsonoutput = array();
  $jsonoutput['result'] = 'success';
  echo json_encode($jsonoutput);
?>