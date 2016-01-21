var hideCurrent = 'hidden';
var hidePast = 'hidden';
var hideFuture = 'hidden';
var sidebar2Status = 'all';




$(document).ready(function(){

$('body').on('click', '#toggle-current', function() {
 toggle_semester_view('hide-current', 'toggle-current', 'hideCurrent');
});

$('body').on('click', '#toggle-future', function() {
 toggle_semester_view('hide-future', 'toggle-future', 'hideFuture');
});

$('body').on('click', '#toggle-past', function() {
 toggle_semester_view('hide-past', 'toggle-past', 'hidePast');
});


$('body').on('click', '#show-all-classes', function() {
 sidebar2Status = 'all';
 toggle_sidebar2_view(sidebar2Status);
});

$('body').on('click', '#show-current-classes', function() {
 sidebar2Status = 'current';
 toggle_sidebar2_view(sidebar2Status);
});

$('body').on('click', '#show-future-classes', function() {
 sidebar2Status = 'future';
 toggle_sidebar2_view(sidebar2Status);
});

$('body').on('click', '#show-past-classes', function() {
 sidebar2Status = 'past';
 toggle_sidebar2_view(sidebar2Status);
});

$('body').on('click', '.show-semester-name', function() {
 sidebar2Status = $(this).attr('name-value');
 toggle_sidebar2_view(sidebar2Status);
});


});


function toggle_sidebar2_view(option) {
        showLoading();
        if (option == 'all') {
                $( "#filler-sidebar2" ).load( "ajax/classes/allClasses.php", function() {
                hideLoading(); 
                }
                );
        
        }
        else if (option == 'current') {
                $( "#filler-sidebar2" ).load( "ajax/classes/currentClasses.php", function() {
                hideLoading(); 
                });
        
        }
        else if (option == 'future') {
                $( "#filler-sidebar2" ).load( "ajax/classes/futureClasses.php", function() {
                hideLoading(); 
                });
        
        }
        else if (option == 'past') {
                $( "#filler-sidebar2" ).load( "ajax/classes/pastClasses.php", function() {
                hideLoading(); 
                });
        
        }
        else {
                $( "#filler-sidebar2" ).load( "ajax/classes/semesterClasses.php", {'semester':option}, function() {
                hideLoading(); 
                });
        }
        

}

function toggle_semester_view(id, id2, id3) {
       var e = document.getElementById(id);
       var e2 = document.getElementById(id2);
       
       
       if(e.style.display == 'block') {
       var data = id3;
       eval(data + "='hidden';");
          e.style.display = 'none';
          $("#" + id2).mouseenter(function() {
            $(this).css({
        'background': 'url(images/down13.png)',
        'background-repeat': 'no-repeat',
        'background-size': '18px 18px' 
    });
                }).mouseleave(function() {
             $(this).css({
        'background': 'url(images/down13-light.png)',
        'background-repeat': 'no-repeat',
        'background-size': '18px 18px' 
    
                });
          })
}
else {
        var data = id3;
       eval(data + "='visible';");
          e.style.display = 'block';
         $("#" + id2).mouseenter(function() {
            $(this).css({
        'background': 'url(images/up21.png)',
        'background-repeat': 'no-repeat',
        'background-size': '18px 18px' 
    });
                }).mouseleave(function() {
             $(this).css({
        'background': 'url(images/up21-light.png)',
        'background-repeat': 'no-repeat',
        'background-size': '18px 18px' 
    
                });
          })
                
}
}
