<?php
include("authenticate.php");
if (isset($_REQUEST['id'])) { $id = $_REQUEST['id']; }
if (isset($_REQUEST['token_id'])) { $token_id = $_REQUEST['token_id']; }
if (isset($_REQUEST['name'])) { $name = $_REQUEST['name']; }
if (isset($_REQUEST['email'])) { $email = $_REQUEST['email']; }
if (isset($_REQUEST['image'])) { $image = $_REQUEST['image']; }
authenticate($id, $token_id, $name, $email, $image);
 
?>