var id;
var token_id;
var name;
var email;
var image;


function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  id = profile.getId();
  token_id = googleUser.getAuthResponse().id_token;
  name = profile.getName();
  email = profile.getEmail();
  image = profile.getImageUrl();
  $.ajax({
      type: "post",
      url: "submitLogin.php",
      dataType: 'json',
      data: {'id': id, 'token_id':token_id, 'email':email, 'name':name, 'image':image},
      success: function (response) {
        var result = response.result;
        if (result == 'success') {
                window.location = 'https://kevynhale.com/curriculum/main.php';
        }
        else {
                $( "#holder" ).load( "ajax/createAccount.php" );
        }
      }
      });
}
$(document).ready(function(){

$('body').on('click', '#createAccount', function() {
  
       $.ajax({
      type: "post",
      url: "php/createNewAccount.php",
      dataType: 'json',
      data: {'id': id, 'token_id':token_id, 'email':email, 'name':name},
      success: function (response) {
       
        }
      });
      });
        
});

