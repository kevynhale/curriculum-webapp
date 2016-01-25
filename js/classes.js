var classTitle;
var classSemester;
var ClassCredits;
var classObjective;
var class2delete;
var classId;
var classEdit;
var classCancel;
var classSave;

$(document).ready(function(){

$('body').on('click', '.class-edit', function() {
        classEdit = $(this).attr('edit');
        editClassEntry(classEdit);
});


$('body').on('click', '.class-cancel', function() {
        classCancel = $(this).attr('edit');
        cancelClassEntry(classCancel);
});

$('body').on('click', '.class-save', function() {
        classSave = $(this).attr('edit');
	var classid = $('#new-form-container').attr('classid');
        saveClassEntry(classSave, classid);
});



$('body').on('click', '#newClass', function() {
	resetClassPage()
        showLoading();
	$("#filler-body3").load( "ajax/classes/newClasses.php", function() {
                hideLoading(); 
                } );
	toggle_visibility_inline('filler-body3')
});

$('body').on('click', '.class-item', function() {
resetClassPage()
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
      
      $( "#filler-sidebar" ).load( "ajax/classes/classes.php", function () {
        keepVisible ('hide-current', 'hide-future', 'hide-past');
        hideLoading();
});
      $( "#filler-body2" ).load( "ajax/classes/newClasses.php" );
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
      
      $( "#filler-sidebar" ).load( "ajax/classes/classes.php", function () {
        keepVisible ('hide-current', 'hide-future', 'hide-past');
        hideLoading();
});
      sidebar2Status = classSemester;
      toggle_sidebar2_view(sidebar2Status);
      document.getElementById('filler-body3').innerHTML = '';
      $( "#filler-body3" ).load( "ajax/classes/newClasses.php" );
        
        
      }
  });
}

function showClassInfo(id) {
	showLoading();
      	$( "#filler-body3" ).load( "ajax/classes/oneClass.php", {'class_id':id}, function () {
		toggle_visibility_inline('filler-body3')
        	hideLoading();
	});


}

function saveClassEntry(option, showId) {
        var idName = 'class-edit-' + option + '-input';
        var value = $('#' + idName).val();

        showLoading();
                $.ajax({
                type: "post",
                url: "php/editChangeClass.php",
                dataType: 'json',
                data: {'type': option, 'value': value},
                success: function (response) {
                        $( "#filler-sidebar" ).load( "ajax/classes/classs.php" );
                        $( "#filler-body3" ).load( "ajax/classes/oneClass.php", {'class_id':showId}, function() {
                                hideLoading();
                        });
                }
        });

}

function cancelClassEntry(option) {
        var idName = 'class-edit-' + option;
        var theDiv = $('#' + idName).attr('value');
        document.getElementById(idName).innerHTML = theDiv;
        $(".class-save[edit='" + option + "']").css("display","none")
        $(".class-cancel[edit='" + option + "']").css("display","none")
        $(".class-edit[edit='" + option + "']").css("display","inline-block")
}


function editClassEntry (option) {
        checkValue = 'class-edit-' + option;
        value2classEdit = $('#' + checkValue).attr('value');
        var inputType = $('#' + checkValue).attr('type');
        if (inputType == 'textarea') {
        document.getElementById(checkValue).innerHTML = '<textarea id="' + checkValue + '-input">' + value2classEdit + '</textarea>';
        }
        else {
        document.getElementById(checkValue).innerHTML = '<input type="' + inputType + '" value="' + value2classEdit + '" id="' + checkValue + '-input">';

        }
        $('#' + checkValue + '-input').select();
        $(".class-save[edit='" + option + "']").css("display","inline-block")
        $(".class-cancel[edit='" + option + "']").css("display","inline-block")
        $(".class-edit[edit='" + option + "']").css("display","none")
}


function resetClassPage() {
        document.getElementById('filler-body3').innerHTML = '';
        document.getElementById('filler-body3').style.display = 'none';
    }
