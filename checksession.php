<?php
include("authenticate.php");


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
  }
else if (!isset($_SESSION['id'])) {
     header("Location: login.php");
  }   

  ?>