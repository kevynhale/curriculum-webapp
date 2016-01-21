<?php include("../../authenticate.php"); ?>
<div class="header-title">Semesters</div>
<div id="newSemester" class="header-sub header-sub-longer add-one clickable"><p class="add-new">+</p>Add Semester</div>
<?php

include("../../php/dbConnect.php");
$id = $_SESSION['id'];

$result = $mysqli->query("SELECT name, semester_id FROM semester_list WHERE user_id='".$id."'");
    
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>
    
    <div class="header-sub add-one clickable semester-click" semester-id="<?php echo $row["semester_id"]; ?>">
    <?php echo $row["name"]; ?>
    <div class="delete-sidebar-row delete-semester clickable" delete='<?php echo $row["semester_id"]; ?>'>X</div>
    
    </div>
    
    <?php
        
    }
    }
?>
