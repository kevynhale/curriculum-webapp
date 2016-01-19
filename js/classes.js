var classTitle;
var classSemester;
var ClassCredits;
var classObjective;
var class2delete;
var classId;

$(document).ready(function(){
$('body').on('click', '#newClass', function() {
        showLoading();
	$("#filler-body3").load( "ajax/newClasses.php", function() {
                hideLoading(); 
                } );
	toggle_visibility_inline('filler-body3')
});

$('body').on('click', '.class-item', function() {
classId = $(this).attr('class-id');
showClassInfo(classId);
});


$('body').on('click', '#submitNewClass', function() {
classTitle = $('#class-title').val();
classSemester = $('#class-semester').val();
classCredits = $('#class-credits').val();
classObjective = $('#class-review').val();
submitNewClass(classTitle, classSemester, classCredits, classObjective);
});

$('body').on('click', '.delete-class', function() {
class2delete = $(this).attr('delete');
if (confirm("Are you sure you want to delete this class? All data will be lost.")) {
deleteClass(class2delete);
}
});

});

function deleteClass(class2delete) {
showLoading();
  $.ajax({
      type: "post",
      url: "php/deleteClass.php",
      dataType: 'json',
      data: {'title': class2delete},
      success: function (response) {
      
      $( "#filler-sidebar" ).load( "ajax/classes.php", function () {
        keepVisible ('hide-current', 'hide-future', 'hide-past');
        hideLoading();
});
      $( "#filler-body2" ).load( "ajax/newClasses.php" );
      toggle_sidebar2_view(sidebar2Status);
        
        
      }
  });
}


function submitNewClass(classTitle, classSemester, classCredits, classObjective) {
showLoading();
  $.ajax({
      type: "post",
      url: "php/submitNewClass.php",
      dataType: 'json',
      data: {'title': classTitle, 'semester': classSemester, 'credits': classCredits, 'objective':classObjective},
      success: function (response) {
      
      $( "#filler-sidebar" ).load( "ajax/classes.php", function () {
        keepVisible ('hide-current', 'hide-future', 'hide-past');
        hideLoading();
});
      sidebar2Status = classSemester;
      toggle_sidebar2_view(sidebar2Status);
      document.getElementById('filler-body3').innerHTML = '';
      $( "#filler-body3" ).load( "ajax/newClasses.php" );
        
        
      }
  });
}

function showClassInfo(id) {
	showLoading();
      	$( "#filler-body3" ).load( "ajax/oneClass.php", {'class_id':id}, function () {
		toggle_visibility_inline('filler-body3')
        	hideLoading();
	});


}

