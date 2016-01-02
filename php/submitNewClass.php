<?php
include("../authenticate.php");
include("dbConnect.php");

if (isset($_REQUEST['title'])) { $title = $_REQUEST['title']; }
if (isset($_REQUEST['semester'])) { $semester = $_REQUEST['semester']; }
if (isset($_REQUEST['credits'])) { $credits = $_REQUEST['credits']; }
if (isset($_REQUEST['objective'])) { $review = $_REQUEST['objective']; }
$user_id = $_SESSION['id'];

$statement = $mysqli->prepare("INSERT INTO class_list (user_id, name, semester, credits, objective) VALUES ('".$user_id."', '".$title."', '".$semester."', '".$credits."', '".$review."')");
$statement->execute();
$jsonoutput = array();
  $jsonoutput['result'] = 'success';
  echo json_encode($jsonoutput);
?>