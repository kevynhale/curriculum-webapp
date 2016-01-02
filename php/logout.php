<?php
include("../authenticate.php");

// check to see if user is logging out
  // destroy session
  session_unset();
  $_SESSION = array();
  unset($_SESSION['user']);
  unset($_SESSION['image']);
  unset($_SESSION['email']);
  unset($_SESSION['name']);
  session_destroy();
  $jsonoutput = array();
  $jsonoutput['result'] = 'success';
  echo json_encode($jsonoutput);
?>