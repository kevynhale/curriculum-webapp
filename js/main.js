var subMenu;
var id;
var token_id;
var name;
var email;
var image;


$(document).ready(function(){
$.getScript("js/dashboards.js" );
$.getScript("js/semesters.js" );
$.getScript("js/classes.js" );
$.getScript("js/notes.js" );
$.getScript("js/flashcards.js" );
$.getScript("js/exams.js" );
$.getScript("js/calendars.js" );
$.getScript("js/logout.js" );
$.getScript("js/sidebar.js" );

$('body').on('click', '.sidebar-item', function() {
document.getElementById('filler-body3').innerHTML = '';
document.getElementById('filler-body3').style.display = 'none';
document.getElementById('filler-body2').innerHTML = '';
document.getElementById('filler-body2').style.display = 'none';
document.getElementById('filler-body1').innerHTML = '';
document.getElementById('filler-body1').style.display = 'none';
document.getElementById('filler-sidebar').innerHTML = '';
document.getElementById('filler-sidebar').style.display = 'none';
document.getElementById('filler-sidebar2').innerHTML = '';
document.getElementById('filler-sidebar2').style.display = 'none';
subMenu = $(this).attr('item');
	if (subMenu == 'dashboard') {
		showDashboard();
	}
	else if (subMenu == 'semesters') {
		showSemesters();
	}
	else if (subMenu == 'classes') {
		showClasses();
	}
	else if (subMenu == 'notes') {
		showNotes();
	}
	else if (subMenu == 'flashcards') {
		showFlashcards();
	}
	else if (subMenu == 'exams') {
		showExams();
	}
	else if (subMenu == 'calendars') {
		showCalendars();
	}
        else if (subMenu == 'logout') {
		logOut();
	}
});



});
function showDashboard() {
showLoading();
var div = document.getElementById('filler-sidebar');
$( "#filler-sidebar" ).load( "ajax/dashboard/dashboard.php", function() {
                hideLoading(); 
                } );
toggle_visibility_inline('filler-sidebar')

}
function showSemesters() {
showLoading();
var div = document.getElementById('filler-sidebar');
$( "#filler-sidebar" ).load( "ajax/semesters/semesters.php", function() {
                hideLoading(); 
                } );
toggle_visibility_inline('filler-sidebar')
}
function showClasses() {
showLoading();
var div = document.getElementById('filler-sidebar');
$( "#filler-sidebar" ).load( "ajax/classes/classes.php", function () {
        keepVisible ('hide-current', 'hide-future', 'hide-past');
        hideLoading();
});
toggle_sidebar2_view(sidebar2Status);
toggle_visibility_inline('filler-sidebar')
toggle_visibility_inline('filler-sidebar2')

}

function showNotes() {
showLoading();
var div = document.getElementById('filler-sidebar');
$( "#filler-sidebar" ).load( "ajax/notes/notes.php", function() {
                hideLoading(); 
                } );
toggle_visibility_inline('filler-sidebar')
}
function showFlashcards() {
showLoading();
var div = document.getElementById('filler-sidebar');
$( "#filler-sidebar" ).load( "ajax/flashcards/flashcards.php", function() {
                hideLoading(); 
                } );
toggle_visibility_inline('filler-sidebar')
}
function showExams() {
showLoading();
var div = document.getElementById('filler-sidebar');
$( "#filler-sidebar" ).load( "ajax/exams/exams.php", function() {
                hideLoading(); 
                } );
toggle_visibility_inline('filler-sidebar')
}
function showCalendars() {
showLoading();
var div = document.getElemen
tById('filler-sidebar');
$( "#filler-sidebar" ).load( "ajax/calendars/calendars.php", function() {
                hideLoading(); 
                } );
toggle_visibility_inline('filler-sidebar')
}

 function toggle_visibility_inline(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'inline-block')
          e.style.display = 'none';
       else
          e.style.display = 'inline-block';
}

 function toggle_visibility_block(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
}

  


function showLoading() {

$("#loading-container").fadeIn(200).css('display','table');
}

function hideLoading() {

$("#loading-container").fadeOut(200)
}

function keepVisible(id, id2, id3) {
                if (hideCurrent == 'visible') {
                document.getElementById(id).style.display = 'block';
                }

                if (hideFuture == 'visible') {
                document.getElementById(id2).style.display = 'block';
                }

                if (hidePast == 'visible') {
                document.getElementById(id3).style.display = 'block';
                }
        
}
