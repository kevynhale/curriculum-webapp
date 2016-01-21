var semesterTitle;
var semesterStart;
var semesterFinish;
var semesterReview;
var semester2delete;
var semester2show;
var semesterEdit;
var value2semesterEdit;
var checkValue;
var semesterCancel;
var semesterSave;
var semesterOptionsView = "semester-options-goals";

$(document).ready(function(){
$('body').on('mouseover', 'ul.navigator-list li', function() {
                                 $("#" + semesterOptionsView).removeClass('navigator-list-selected');
                                $(this).addClass('navigator-list-selected');
        });
$('body').on('mouseout', 'ul.navigator-list li', function() {
                                $(this).removeClass('navigator-list-selected');
                                 $("#" + semesterOptionsView).addClass('navigator-list-selected');
        });
$('body').on('click', 'ul.navigator-list li', function() {
	showLoading();
	$("#" + semesterOptionsView).removeClass('navigator-list-selected');
        $(this).addClass('navigator-list-selected');
	semesterOptionsView = $(this).attr('id');
	var page = $("#" + semesterOptionsView).attr('page');
	getSemesterListItem(page)
});


$('body').on('click', '#newSemester', function() {
showLoading();
resetSemesterPage()
	$("#filler-body2").load( "ajax/semesters/newSemesters.php" );
	toggle_visibility_inline('filler-body2')
        setTimeout(hideLoading, 500);
});

$('body').on('click', '.semester-edit', function() {
        semesterEdit = $(this).attr('edit');
        editSemesterEntry(semesterEdit);
});


$('body').on('click', '.semester-cancel', function() {
        semesterCancel = $(this).attr('edit');
        cancelSemesterEntry(semesterCancel);
});

$('body').on('click', '.semester-save', function() {
        semesterSave = $(this).attr('edit');
        saveSemesterEntry(semesterSave, semester2show);
});

$('body').on('click', '#submitNewSemester', function() {
semesterTitle = $('#semester-title').val();
semesterStart = $('#semester-start').val();
semesterFinish = $('#semester-finish').val();
semesterReview = $('#semester-review').val();
submitNewSemester(semesterTitle, semesterStart, semesterFinish, semesterReview);
});

$('body').on('click', '.delete-semester', function() {
semester2delete = $(this).attr('delete');
if (confirm("Are you sure you want to delete this class? All data will be lost.")) {
deleteSemester(semester2delete);
}
});

$('body').on('click', '.semester-click', function() {
        resetSemesterPage()
        showLoading();
        semester2show = $(this).attr('semester-id');
        showSemester(semester2show, semesterOptionsView);
});


});

function saveSemesterEntry(option, showId) {
	var idName = 'semester-edit-' + option + '-input';
	var value = $('#' + idName).val();

	showLoading();
  		$.ajax/semesters({
      		type: "post",
      		url: "php/editChangeSemester.php",
      		dataType: 'json',
      		data: {'type': option, 'value': value},
      		success: function (response) {
      			$( "#filler-sidebar" ).load( "ajax/semesters/semesters.php" );
        		$( "#filler-body2" ).load( "ajax/semesters/oneSemester.php", {'semester_id':showId}, function() {
                		hideLoading(); 
                	});
		}
	});

}

function cancelSemesterEntry(option) {
	var idName = 'semester-edit-' + option;
	var theDiv = $('#' + idName).attr('value');
	document.getElementById(idName).innerHTML = theDiv;
	$(".semester-save[edit='" + option + "']").css("display","none")
	$(".semester-cancel[edit='" + option + "']").css("display","none")
	$(".semester-edit[edit='" + option + "']").css("display","inline-block")
}


function editSemesterEntry (option) {
        checkValue = 'semester-edit-' + option;
        value2semesterEdit = $('#' + checkValue).attr('value');
        var inputType = $('#' + checkValue).attr('type');
        if (inputType == 'textarea') {
        document.getElementById(checkValue).innerHTML = '<textarea id="' + checkValue + '-input">' + value2semesterEdit + '</textarea>';
        }
        else {
        document.getElementById(checkValue).innerHTML = '<input type="' + inputType + '" value="' + value2semesterEdit + '" id="' + checkValue + '-input">';

        }
        $('#' + checkValue + '-input').select();
	$(".semester-save[edit='" + option + "']").css("display","inline-block")
	$(".semester-cancel[edit='" + option + "']").css("display","inline-block")
	$(".semester-edit[edit='" + option + "']").css("display","none")
}


function showSemester(option, view) {
        $( "#filler-body2" ).load( "ajax/semesters/oneSemester.php", {'semester_id':option}, function() {
                hideLoading(); 
                toggle_visibility_inline('filler-body2')
		$('#' + view).toggleClass('navigator-list-selected')
		var page = $("#" + view).attr('page');
        	getSemesterListItem(page)
                });
        
}


function deleteSemester(semester2delete) {
showLoading();
  $.ajax/semesters({
      type: "post",
      url: "php/deleteSemester.php",
      dataType: 'json',
      data: {'title': semester2delete},
      success: function (response) {
      
      $( "#filler-sidebar" ).load( "ajax/semesters/semesters.php" );
      setTimeout(hideLoading, 1000);
        
        
      }
  });
}


function submitNewSemester(semesterTitle, semesterStart, semesterFinish, semesterReview) {
showLoading();
  $.ajax/semesters({
      type: "post",
      url: "php/submitNewSemester.php",
      dataType: 'json',
      data: {'title': semesterTitle, 'start': semesterStart, 'finish': semesterFinish, 'review':semesterReview},
      success: function (response) {
      
      $( "#filler-body2" ).load( "ajax/semesters/newSemesters.php" );
      $( "#filler-sidebar" ).load( "ajax/semesters/semesters.php" );
      setTimeout(hideLoading, 1000);
        
        
      }
  });
}

function resetSemesterPage() {
        document.getElementById('filler-body2').innerHTML = '';
        document.getElementById('filler-body2').style.display = 'none';
    }
function getSemesterListItem(page) {
	$( ".body-of-content" ).load( "ajax/semesters/" + page + ".php", function() {
		hideLoading();
});


}
