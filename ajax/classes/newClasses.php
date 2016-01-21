<?php include("../../authenticate.php"); ?>
<div id="new-form3">
        <div id="new-form-container">
        <div class="new-form-entry">
        <p>Class Title</p>
        <input type="text" name="semester-title" id="class-title">
        </div>
        <div class="new-form-entry">
        <p>Semester</p>
        <select id="class-semester" class="clickable">
                <?php 
                    include("../../php/dbConnect.php");
                    $id = $_SESSION['id'];

                        $result = $mysqli->query("SELECT name FROM semester_list WHERE user_id='".$id."'");
    
                        if ($result->num_rows > 0) {
                            // output data of each row
                           while($row = $result->fetch_assoc()) {
                            ?>
    
            <option value="<?php echo $row["name"]; ?>">
            <?php echo $row["name"]; ?>
             </option>
        
            <?php
                
            }
            }
?>
        </select>
        </div>
        <div class="new-form-entry">
        <p>Credits</p>
        <input type="number" min="1" step="1" max="12" name="class-credits" id="class-credits">
        </div>
        <div class="new-form-entry">
        <p>Class Objective</p>
        <textarea id="class-review"></textarea>
        </div>
        <div class="full-submit-button clickable" id="submitNewClass">Submit New Class</div>
        </div> <!-- end of div new-form-container -->
</div> <!-- end of div new-form -->
