<?php
include('checksession.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta name="google-signin-client_id" content="23485161676-r11e2ct6i8fflcst4i9gh964gd2c7sud.apps.googleusercontent.com">
<link rel="shortcut icon" href="https://kevynhale.com/images/apple.jpeg">
<title>Curriculum Managemnt</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<script src="js/jquery-1.11.3.js"></script>
<script src="js/main.js"></script>
<script>
  function logOut() {
  showLoading();
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
     $.ajax({
      type: "post",
      url: "php/logout.php",
      dataType: 'json',
      data: {},
      success: function (response) {
        var result = response.result;
        if (result == 'success') {
                window.location = 'https://kevynhale.com/curriculum/login.php';
        }
   
      }
      });
  }
  
    function onLoad() {
      gapi.load('auth2', function() {
        gapi.auth2.init();
      });
    }
</script>
</head>

<body>
<div id="loading-container"><div id="loading-gif"><img src="images/359.GIF"></div></div>
<?php include 'sidebar.php' ?>
<div id="filler-body1"></div>
<div id="filler-body2"></div>
<div id="filler-body3"></div>

<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
</body>

</html>