var fileTypes = ['jpg', 'jpeg'];
function Photo(input) {
	
		var extension = input.files[0].name.split('.').pop().toLowerCase(),  //file extension from input file
            isSuccess = fileTypes.indexOf(extension) > -1;  //is extension in acceptable types
			var fsize = input.files[0].size;
			
			alert(fsize);
			
			if (isSuccess) {  
				if(fsize<2000000){
			
					if (input.files && input.files[0]) {
						var reader = new FileReader();
		 
						reader.onload = function (e) {
						
							$('#photo_view').attr('src', e.target.result);
						};

						reader.readAsDataURL(input.files[0]);
					}
				}else {
					alert("File harus berukuran di bawah 2 mb");
					$('#photo_view').attr('src','http://www.waperd.or.id/FileUpload/no_image.gif');
					$('#photo').val('');
					
				}
			}
			else {  
				  alert("Harap menggunakan format '.jpg' atau '.jpeg'");
				  $('#photo_view').attr('src','http://www.waperd.or.id/FileUpload/no_image.gif');
				 $('#photo').val('');
				
			}
	
 
		 
           
        }
		
function Photoprsh(input) {
	
		var extension = input.files[0].name.split('.').pop().toLowerCase(),  //file extension from input file
            isSuccess = fileTypes.indexOf(extension) > -1;  //is extension in acceptable types
			var fsize = input.files[0].size;
			
			// alert(fsize);
			
			if (isSuccess) {  
				if(fsize<2000000){
			
					if (input.files && input.files[0]) {
						var reader = new FileReader();
		 
						reader.onload = function (e) {
						
							$('#photo_viewprsh').attr('src', e.target.result);
						};

						reader.readAsDataURL(input.files[0]);
					}
				}else {
					alert("File harus berukuran di bawah 2 mb");
					$('#photo_viewprsh').attr('src','http://www.waperd.or.id/FileUpload/no_image.gif');
					$('#photoprsh').val('');
					
				}
			}
			else {  
				  alert("Harap menggunakan format '.jpg' atau '.jpeg'");
				  $('#photo_viewprsh').attr('src','http://www.waperd.or.id/FileUpload/no_image.gif');
				 $('#photoprsh').val('');
				
			}
	
 
		 
           
        }	
	
function Ktp(input) {
	
		var extension = input.files[0].name.split('.').pop().toLowerCase(),  //file extension from input file
            isSuccess = fileTypes.indexOf(extension) > -1;  //is extension in acceptable types
			var fsize = input.files[0].size;
			
			// alert(fsize);
			
			if (isSuccess) {  
				if(fsize<2000000){
			
					if (input.files && input.files[0]) {
						var reader = new FileReader();
		 
						reader.onload = function (e) {
						
							$('#ktp_view').attr('src', e.target.result);
						};

						reader.readAsDataURL(input.files[0]);
					}
				}else {
					alert("File harus berukuran di bawah 2 mb");
					$('#ktp_view').attr('src','http://www.waperd.or.id/FileUpload/no_image.gif');
					$('#ktp').val('');
					
				}
			}
			else {  
				  alert("Harap menggunakan format '.jpg' atau '.jpeg'");
				  $('#ktp_view').attr('src','http://www.waperd.or.id/FileUpload/no_image.gif');
				 $('#ktp').val('');
				
			}
	
 
		 
           
        }
		
function SK(input) {
	
		var extension = input.files[0].name.split('.').pop().toLowerCase(),  //file extension from input file
            isSuccess = fileTypes.indexOf(extension) > -1;  //is extension in acceptable types
			var fsize = input.files[0].size;
			
			// alert(fsize);
			
			if (isSuccess) {  
				if(fsize<2000000){
			
					if (input.files && input.files[0]) {
						var reader = new FileReader();
		 
						reader.onload = function (e) {
						
							$('#sk_view').attr('src', e.target.result);
						};

						reader.readAsDataURL(input.files[0]);
					}
				}else {
					alert("File harus berukuran di bawah 2 mb");
					$('#sk_view').attr('src','http://www.waperd.or.id/FileUpload/no_image.gif');
					$('#sk').val('');
					
				}
			}
			else {  
				  alert("Harap menggunakan format '.jpg' atau '.jpeg'");
				  $('#sk_view').attr('src','http://www.waperd.or.id/FileUpload/no_image.gif');
				 $('#sk').val('');
				
			}
	
 
		 
           
        }

$(function(){ 

  var validator = $("#wizard-pribadi").validate({
		  rules: {
    "#password": "required",
    password_again: {
      equalTo: "#password"
    },
	faq_prsh: "required",
  }
,


        errorPlacement: function (error, element) {
            var type = $(element).attr("type");
            var id = $(element).attr("id");
            if (type === "radio") {
				// console.log(error.html());
                // custom placement
                // error.insertAfter(element).insertAfter('.err-radio');
				error.insertAfter(element.parents('.form-holder').find('.checkbox-circle'));
				// console.log(element.parents('.form-holder').find('.err-radio'));
				// element.parents('.form-holder').find('.err-radio').html(error.html());
            } else if (type === "checkbox") {
                // custom placement
                error.insertAfter(element.parents('.form-holder').find('.checkbox-circle'));
            } else {
                error.insertAfter(element).wrap('<div/>');
            }
        },
	
});


jQuery.extend(jQuery.validator.messages, {
    required: "Wajib diisi.",
    radio: "Radio",
    remote: "Please fix this field.",
    email: "Please enter a valid email address.",
    url: "Please enter a valid URL.",
    date: "Please enter a valid date.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Please enter a valid number.",
    digits: "Please enter only digits.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Please enter the same value again.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    minlength: jQuery.validator.format("Please enter at least {0} characters."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});






	$("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        onStepChanging: function (event, currentIndex, newIndex) { 
 	 
	
	 
		 var lanjut = true;
 $('.step'+currentIndex).each(function() {
	 
	if(!validator.element(this)){
lanjut = false;

	}	
	validator.element(this);
	 
	 
 });
	
		if(lanjut==true){

 
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
	


	     
		}


          return lanjut;
        },
        labels: {
            finish: "Submit",
            next: "Continue",
            previous: "Back"
        },onFinished: function (event, currentIndex) {
			
var	form = $("#wizard-pribadi ").submit();
		/* 	var lanjut = true;
 $('.step'+currentIndex).each(function() {
	 
	if(!validator.element(this)){
lanjut = false;

	}	
	validator.element(this);
	 
	 
 });
	
return lanjut; */
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

/*  $( "a:contains('Submit')" ).click(function () {
	  
	  if($('#tipe_daftar').val()==0){
			var  form = $("#wizard-pribadi").serialize();
			 
	  }else{
		var   form = $("#wizard-prsh ").serialize();
		 
		  
	  }
		 
			validator.element('step9');
		
     $.ajax({
       type: "POST",
       url: "<?php  echo site_url('Login/register'); ?>",
       data: form,

       success: function(response){
           alert(response); //Unterminated String literal fixed
       }

     });
     event.preventDefault();
     return false; 
	  
	});  */

$(function(){
	
		var validator_prsh = $("#wizard-perusahaan").validate({
		  rules: {
			"#password_prsh": "required",
			password_again_prsh: {
			  equalTo: "#password_prsh"
			},
			faq: "required",
		  },errorPlacement: function (error, element) {
					var type = $(element).attr("type");
					var id = $(element).attr("id");
					if (type === "radio") {
						// console.log(error.html());
						// custom placement
						// error.insertAfter(element).insertAfter('.err-radio');
						error.insertAfter(element.parents('.form-holder').find('.checkbox-circle'));
						// console.log(element.parents('.form-holder').find('.err-radio'));
						// element.parents('.form-holder').find('.err-radio').html(error.html());
					} else if (type === "checkbox") {
						// custom placement
						error.insertAfter(element.parents('.form-holder').find('.checkbox-circle'));
					} else {
						error.insertAfter(element).wrap('<div/>');
					}
				},
			
});
	
	$(".wizard-prsh").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        onStepChanging: function (event, currentIndex, newIndex) { 
 		
	

 
 
  var lanjut = true;
 $('.cek'+currentIndex).each(function() {
	 
	if(!validator_prsh.element(this)){
lanjut = false;

	}	
	validator_prsh.element(this);
	 
	 
 });
 
 
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
	


	    



            return lanjut; 
        },
        labels: {
            finish: "Submit",
            next: "Continue",
            previous: "Back"
        },onFinishing: function (event, currentIndex) {
			
		
			
			 var lanjut = true;
				$('.cek'+currentIndex).each(function() {
	 
	if(!validator_prsh.element(this)){
lanjut = false;

	}	
	validator_prsh.element(this);
	 
	 
 });
	
return lanjut;




 

 

},onFinished: function (event, currentIndex) {
	
var	form = $("#wizard-perusahaan ").submit();
	
	 
	
	
	
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
