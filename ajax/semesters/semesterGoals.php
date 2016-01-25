<?php include("../../authenticate.php"); ?>
<div id="semester-goals-header">
	<ul id="semester-goals-bullet">
		<li id="semester-goals-goal" class="semester-goals-item">
		Goal
		</li>
		<li id="semester-goals-status" class="semester-goals-item">
		Status
		</li>
		<li id="semester-goals-add" class="semester-goals-item">
		+
		</li>
	</ul>

</div> <!-- end of div semester-goals-header -->
<div id="semester-goals-body">
	<div id="semester-goals-input-row">
	</div>
<?php

include("../../php/dbConnect.php");
$id = $_SESSION['id'];
if (isset($_REQUEST['semester_id'])) { $semester_id = $_REQUEST['semester_id']; }

$query = "SELECT goal_id, goal, status FROM semester_goals WHERE user_id='".$id."' and semester_id = '".$semester_id."';";
$result = $mysqli->query($query);

    if ($result->num_rows > 0) {
    // output data of each row
	    	echo "<div id='semester-goal-row'>";
         while($row = $result->fetch_assoc()) {
?>
		<div class="semester-goal"><div class="semester-goal-name"><?php echo $row['goal']; ?></div><div class="semester-goal-box <?php echo $row['status']; ?>" goalid="<?php echo $row['goal_id']; ?>" status="<?php echo $row['status']; ?>"></div></div>
<?php

	}
		echo "</div>";
}
	else {
	
	echo "<div id='semester-no-goals'>No goals have been added.</div>";
	echo "<div id='semester-goal-row'></div>";
	}


?>


</div> <!-- end of div semester-goals-body -->
