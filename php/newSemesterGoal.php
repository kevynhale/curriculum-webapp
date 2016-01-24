<?php
include("../authenticate.php");
include("dbConnect.php");

if (isset($_REQUEST['value'])) { $value = $_REQUEST['value']; }
if (isset($_REQUEST['semester_id'])) { $semester_id = $_REQUEST['semester_id']; }
$user_id = $_SESSION['id'];

$statement = $mysqli->prepare("INSERT INTO semester_goals (semester_id, user_id, goal) VALUES ('$semester_id', '$user_id', '$value');");
$statement->execute();
$jsonoutput = array();
  $jsonoutput['result'] = 'success';
  echo json_encode($jsonoutput);
?>
