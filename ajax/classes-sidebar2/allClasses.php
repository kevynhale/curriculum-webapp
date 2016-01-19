<?php include("../../authenticate.php"); ?>
<?php

include("../../php/dbConnect.php");
$id = $_SESSION['id'];
$today = date("Y-m-d");

?>

<div class="header-title">All</div>
<?php


$result = $mysqli->query("SELECT name, class_id FROM class_list WHERE user_id='".$id."'");
    
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>
    
	    <div class="header-sub add-one clickable class-item" class-id='<?php echo $row["class_id"]; ?>'>
    <?php echo $row["name"]; ?>
    <div class="delete-sidebar-row delete-class clickable" delete='<?php echo $row["class_id"]; ?>'>X</div>
    </div>
    
    <?php
        
    }
    }
?>
