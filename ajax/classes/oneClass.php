<?php include("../../authenticate.php"); ?>
<div id="new-form3">
<div id="new-form-container">

<?php

include("../../php/dbConnect.php");
$id = $_SESSION['id'];
if (isset($_REQUEST['class_id'])) { $class_id = $_REQUEST['class_id']; }

$query = "SELECT name, semester, objective FROM class_list WHERE user_id='".$id."' and class_id = '".$class_id."'";
$result = $mysqli->query($query);
    
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>
    
        <div class="class-header"><div class="class-name">  <?php echo $row['name']; ?> </div></div>
        <div class="class-body">
        <div class="class-title">Name:</div>
        <div class='class-finish' id="class-edit-name" value="<?php echo $row['name']; ?>" type="text">   <?php echo $row['name']; ?>  </div>
        <div class="class-edit" edit="name"></div>
        <div class="class-cancel" edit="name"></div>
        <div class="class-save" edit="name"></div><br>
        <div class="class-title">Semester:</div>
        <div class='class-finish' id="class-edit-finish" value="<?php echo $row['semester']; ?>" type="date">   <?php echo $row['semester']; ?>  </div>
        <div class="class-edit" edit="finish"></div>
        <div class="class-cancel" edit="finish"></div>
        <div class="class-save" edit="finish"></div><br>
        <div class="class-title">Review:</div><br>
        <div class='class-finish' id="class-edit-objective" value="<?php echo $row['objective']; ?>" type="textarea">   <?php echo $row['objective']; ?>  </div>
        <div class="class-edit" edit="objective"></div>
        <div class="class-cancel" edit="objective"></div>
        <div class="class-save" edit="objective"></div><br>
                
        
        
     
<?php
            }
    }
?>
</div> <!-- end of div class-body -->
</div> <!-- end of div new-form-container -->
</div> <!-- end of div new-form -->
