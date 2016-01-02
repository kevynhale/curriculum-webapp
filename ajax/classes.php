<?php include("../authenticate.php"); ?>
<?php

include("../php/dbConnect.php");
$id = $_SESSION['id'];
$today = date("Y-m-d");

?>

<div class="header-title">Classes</div>
<div id="newClass" class="header-sub add-one clickable"><p class="add-new">+</p>Add Class</div>
<div class="header-sub">All<div id="show-all-classes" class="show-right clickable"></div></div>
<div class="header-sub">Current<div id="show-current-classes" class="show-right clickable"></div><div id="toggle-current" class="show-down clickable"></div></div>
<div id="hide-current">
<?php
$result = $mysqli->query("SELECT name FROM semester_list WHERE user_id='".$id."' and start < '".$today."' and finish > '".$today."'");
    
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>
    
    <div class="header-sub header-sub-sub clickable show-semester-name" name-value="<?php echo $row["name"]; ?>">
    <?php echo $row["name"]; ?>
    
    </div>
    
    <?php
        
    }
    }
    ?>
    </div>

<div class="header-sub">Future<div id="show-future-classes" class="show-right clickable"></div><div id="toggle-future" class="show-down clickable"></div></div>
<div id="hide-future">
<?php
$result = $mysqli->query("SELECT name FROM semester_list WHERE user_id='".$id."' and start > '".$today."'");
    
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>
    
    <div class="header-sub header-sub-sub clickable show-semester-name" name-value="<?php echo $row["name"]; ?>">
    <?php echo $row["name"]; ?>
    
    </div>
    
    <?php
        
    }
    }
    ?>
    </div>

<div class="header-sub">Past<div id="show-past-classes" class="show-right clickable"></div><div id="toggle-past" class="show-down clickable"></div></div>
<div id="hide-past">
<?php
$result = $mysqli->query("SELECT name FROM semester_list WHERE user_id='".$id."' and finish < '".$today."'");
    
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>
    
    <div class="header-sub header-sub-sub clickable show-semester-name" name-value="<?php echo $row["name"]; ?>">
    <?php echo $row["name"]; ?>
    
    </div>
    
    <?php
        
    }
    }
    ?>
 </div>



