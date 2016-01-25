<?php
include("../authenticate.php");
include("dbConnect.php");

if (isset($_REQUEST['goal_id'])) { $goal_id = $_REQUEST['goal_id']; }
if (isset($_REQUEST['semester_id'])) { $semester_id = $_REQUEST['semester_id']; }
if (isset($_REQUEST['status'])) { $status = $_REQUEST['status']; }
$user_id = $_SESSION['id'];

if ($status == "unchecked") {
	$newStatus = "checked"; 
}
else {
	$newStatus = "unchecked";
}

$statement = $mysqli->prepare("UPDATE semester_goals SET status='$newStatus' WHERE user_id = '$user_id' AND semester_id = '$semester_id' AND goal_id='$goal_id';");
$statement->execute();
$jsonoutput = array();
  $jsonoutput['result'] = 'success';
  echo json_encode($jsonoutput);
?>
