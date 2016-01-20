<?php include("../authenticate.php"); ?>
<div id="new-form2">
<div id="new-form-container">

<?php

include("../php/dbConnect.php");
$id = $_SESSION['id'];
if (isset($_REQUEST['semester_id'])) { $semester_id = $_REQUEST['semester_id']; }

$query = "SELECT name, DATE_FORMAT(finish, '%m-%d-%y') AS finish, DATE_FORMAT(start, '%m-%d-%y') as start, overview FROM semester_list WHERE user_id='".$id."' and semester_id = '".$semester_id."'";
$result = $mysqli->query($query);
    
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>
    
        <div class="semester-header"><div class="semester-name">  <?php echo $row['name']; ?> </div></div>
        <div class="semester-body">
        <div class="semester-title">Name:</div>
        <div class='semester-finish' id="semester-edit-name" value="<?php echo $row['name']; ?>" type="text">   <?php echo $row['name']; ?>  </div>
        <div class="semester-edit" edit="name"></div>
        <div class="semester-cancel" edit="name"></div>
        <div class="semester-save" edit="name"></div><br>
        <div class="semester-title">Start:</div>
        <div class='semester-finish' id="semester-edit-start" value="<?php echo $row['start']; ?>" type="date">   <?php echo $row['start']; ?>  </div>
        <div class="semester-edit" edit="start"></div>
        <div class="semester-cancel" edit="start"></div>
        <div class="semester-save" edit="start"></div><br>
        <div class="semester-title">Finish:</div>
        <div class='semester-finish' id="semester-edit-finish" value="<?php echo $row['finish']; ?>" type="date">   <?php echo $row['finish']; ?>  </div>
        <div class="semester-edit" edit="finish"></div>
        <div class="semester-cancel" edit="finish"></div>
        <div class="semester-save" edit="finish"></div><br>
        <div class="semester-title">Review:</div><br>
        <div class='semester-finish' id="semester-edit-overview" value="<?php echo $row['overview']; ?>" type="textarea">   <?php echo $row['overview']; ?>  </div>
        <div class="semester-edit" edit="overview"></div>
        <div class="semester-cancel" edit="overview"></div>
        <div class="semester-save" edit="overview"></div><br>
                
        
        
     
<?php
            }
    }
?>
	<div class="body-of-menu">
		<div class="navigator-of-menu">
			<ul class="navigator-list">
				<li class="clickable">
					Goals
				</li>

				<li class="clickable">
					Classes
				</li>
			</ul>
		</div> <!-- end of div navigator-of-menu -->
	</div> <!-- end of div body-of-menu -->
</div> <!-- end of div semester-body -->
</div> <!-- end of div new-form-container -->
</div> <!-- end of div new-form -->
