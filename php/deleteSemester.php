<?php
include("../authenticate.php");
include("dbConnect.php");

if (isset($_REQUEST['title'])) { $title = $_REQUEST['title']; }

$user_id = $_SESSION['id'];

$result = $mysqli->query("SELECT name FROM semester_list WHERE user_id='".$id."' and semester_id = '".$title."'");
    
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            $name = $row["name"];
    }
    }
    
$statement = $mysqli->prepare("DELETE FROM semester_list WHERE user_id = '".$user_id."' and semester_id = '".$title."'");
$statement->execute();

$statement2 = $mysqli->prepare("UPDATE class_list SET semester = '' WHERE user_id = '".$user_id."' and semester = '".$name."'");
$statement2->execute();



$jsonoutput = array();
  $jsonoutput['result'] = 'success';
  echo json_encode($jsonoutput);
?>