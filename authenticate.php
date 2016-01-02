<?php
// Initialize session
session_start();

function authenticate($id, $token_id, $name, $email, $image) {
    if(empty($id) || empty($token_id)) return false;

########## MySql details  #############
$db_username = "2018160_cur"; //Database Username
$db_password = "curriculum123"; //Database Password
$host_name = "pdb6.runhosting.com"; //Mysql Hostname
$db_name = '2018160_cur'; //Database Name
###################################################################

 // connect to database
$mysqli = new mysqli($host_name, $db_username, $db_password, $db_name);
        if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
        }
        
//check if user exist in database using COUNT
    $result = $mysqli->query("SELECT COUNT(id) as usercount FROM curriculum_users WHERE id='".$id."'");
    
    $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist
 
// if it doesn't exist, create a new account. Else set session user.
    
    $jsonoutput = array();
    
   if ($user_count == 0) {
       $jsonoutput['result'] = 'fail';
      echo json_encode($jsonoutput);
    }
   else if ($user_count == 1) {
      $_SESSION['user'] = $token_id;
      $_SESSION['email'] = $email;
      $_SESSION['id'] = $id;
      $_SESSION['name'] = $name;
      $_SESSION['image'] = $image;
       $jsonoutput['result'] = 'success';
      echo json_encode($jsonoutput);
    } 
 }
?>