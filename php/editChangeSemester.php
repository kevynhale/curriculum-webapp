<?php
include("../authenticate.php");
include("dbConnect.php");

if (isset($_REQUEST['value'])) { $value = $_REQUEST['value']; }
if (isset($_REQUEST['type'])) { $type = $_REQUEST['type']; }
if (isset($_REQUEST['id'])) { $semester_id = $_REQUEST['id']; }
$user_id = $_SESSION['id'];

$statement = $mysqli->prepare("UPDATE semester_list SET $type='$value' WHERE user_id = '$user_id' AND semester_id = '$semester_id';");
$statement->execute();
$jsonoutput = array();
  $jsonoutput['result'] = 'success';
  echo json_encode($jsonoutput);
?>
