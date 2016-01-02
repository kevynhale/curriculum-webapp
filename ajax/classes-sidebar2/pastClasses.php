<?php include("../../authenticate.php"); ?>
<?php

include("../../php/dbConnect.php");
$id = $_SESSION['id'];
$today = date("Y-m-d");

?>

<div class="header-title">Past</div>

<?php
$result = $mysqli->query("SELECT name FROM semester_list WHERE user_id='".$id."' and finish < '".$today."'");
    
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            
            $semester = $row["name"];
    
            $result2 = $mysqli->query("SELECT name, class_id FROM class_list WHERE user_id='".$id."' and semester='".$semester."'");
                    if ($result2->num_rows > 0) {
                    // output data of each row
                    while($row2 = $result2->fetch_assoc()) {
                            $class = $row2["name"];
                            $classid = $row2["class_id"];
                    ?>
                            <div class="header-sub add-one clickable">
                            <?php echo $class; ?>
                            <div class="delete-sidebar-row delete-class clickable" delete='<?php echo $classid; ?>'>X</div>
                            </div>
                            </div>
    
    <?php
    
                    }
                    }
        
    }
    }
    ?>
</div>
