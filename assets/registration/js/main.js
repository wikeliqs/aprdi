$(function(){
	$("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        onStepChanging: function (event, currentIndex, newIndex) { 
 	  alert(newIndex );
 
	


            if ( newIndex === 1 ) { 
                $('.wizard > .steps ul').addClass('step-2'); 
		 
	    } else {
                $('.wizard > .steps ul').removeClass('step-2');
            }
            if ( newIndex === 2 ) {
                $('.wizard > .steps ul').addClass('step-3');
            } else {
                $('.wizard > .steps ul').removeClass('step-3');
            }
	    if ( newIndex === 3 ) {
                $('.wizard > .steps ul').addClass('step-4');
            } else {
                $('.wizard > .steps ul').removeClass('step-4');
            }
	    if ( newIndex === 4 ) {
                $('.wizard > .steps ul').addClass('step-5');
            } else {
                $('.wizard > .steps ul').removeClass('step-5');
            }
            if ( newIndex === 5 ) {
                $('.wizard > .steps ul').addClass('step-6');
            } else {
                $('.wizard > .steps ul').removeClass('step-6');
            }
	    if ( newIndex === 6 ) {
                $('.wizard > .steps ul').addClass('step-7');
            } else {
                $('.wizard > .steps ul').removeClass('step-7');
            }
	    if ( newIndex === 7 ) {
                $('.wizard > .steps ul').addClass('step-8');
            } else {
                $('.wizard > .steps ul').removeClass('step-8');
            }
	     if ( newIndex === 8 ) {
                $('.wizard > .steps ul').addClass('step-9');
            } else {
                $('.wizard > .steps ul').removeClass('step-9');
            }
	    if ( newIndex === 9 ) {
                $('.wizard > .steps ul').addClass('step-10');
            } else {
                $('.wizard > .steps ul').removeClass('step-10');
            }
	    if ( newIndex === 10 ) {
                $('.wizard > .steps ul').addClass('step-11');
				$('.wizard > .action a').addClass('simpan'); 
				
            } else {
                $('.wizard > .steps ul').removeClass('step-11');
            }
			
			
			
	    if ( newIndex === 11 ) {
                $('.wizard > .steps ul').addClass('step-12');
            } else {
                $('.wizard > .steps ul').removeClass('step-12');
            }
	     if ( newIndex === 12 ) {
                $('.wizard > .steps ul').addClass('step-13');
            } else {
                $('.wizard > .steps ul').removeClass('step-13');
            }
	    if ( newIndex === 13 ) {
                $('.wizard > .steps ul').addClass('step-14');
            } else {
                $('.wizard > .steps ul').removeClass('step-14');
            }
	    if ( newIndex === 14 ) {
                $('.wizard > .steps ul').addClass('step-15');
            } else {
                $('.wizard > .steps ul').removeClass('step-15');
            }
	


	    



            return true; 
        },
        labels: {
            finish: "Submit",
            next: "Continue",
            previous: "Back"
        }
    });
    // Custom Button Jquery Steps
    $('.forward').click(function(){
    	$("#wizard").steps('next');
    })
    $('.backward').click(function(){
        $("#wizard").steps('previous');
    })
    // Date Picker
       var dp1 = $('#dp1').datepicker().data('datepicker');
  
	     // var dp1 = $('#dp1').datepicker({format: "dd/mm/yyyy",  startView: "years",  autoclose: true}); 
	   /*  dp1.View("years");  
	    dp1.minView("years");  
	    dp1.formatDate("dd/mm/yyyy");  */ 
})



$(function(){
	$(".wizard-prsh").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        onStepChanging: function (event, currentIndex, newIndex) { 
 	 // alert(newIndex );
 
 
	    if ( newIndex === 1 ) {
                $('.wizard-prsh> .steps ul').addClass('step-12');
            } else {
                $('.wizard-prsh> .steps ul').removeClass('step-12');
            }
	     if ( newIndex === 2 ) {
                $('.wizard-prsh> .steps ul').addClass('step-13');
            } else {
                $('.wizard-prsh> .steps ul').removeClass('step-13');
            }
	    if ( newIndex === 3 ) {
                $('.wizard-prsh> .steps ul').addClass('step-14');
            } else {
                $('.wizard-prsh> .steps ul').removeClass('step-14');
            }
	    if ( newIndex === 4 ) {
                $('.wizard-prsh> .steps ul').addClass('step-15');
            } else {
                $('.wizard-prsh> .steps ul').removeClass('step-15');
            }
	


	    



            return true; 
        },
        labels: {
            finish: "Submit",
            next: "Continue",
            previous: "Back"
        }
    });
    // Custom Button Jquery Steps
    $('.forward').click(function(){
    	$("#wizard").steps('next');
    })
    $('.backward').click(function(){
        $("#wizard").steps('previous');
    })
    // Date Picker
  /*   var dp1 = $('#dp1').datepicker().data('datepicker');
    dp1.selectDate(new Date()); */
	
	
})
