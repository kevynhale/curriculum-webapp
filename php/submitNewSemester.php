<?php
include("../authenticate.php");
include("dbConnect.php");

if (isset($_REQUEST['title'])) { $title = $_REQUEST['title']; }
if (isset($_REQUEST['start'])) { $start = $_REQUEST['start']; }
if (isset($_REQUEST['finish'])) { $finish = $_REQUEST['finish']; }
if (isset($_REQUEST['review'])) { $review = $_REQUEST['review']; }
$user_id = $_SESSION['id'];

$statement = $mysqli->prepare("INSERT INTO semester_list (user_id, name, start, finish, overview) VALUES ('".$user_id."', '".$title."', '".$start."', '".$finish."', '".$review."')");
$statement->execute();
$jsonoutput = array();
  $jsonoutput['result'] = 'success';
  echo json_encode($jsonoutput);
?>