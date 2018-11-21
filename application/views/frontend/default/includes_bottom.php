
<script src="<?php echo base_url().'assets/frontend/js/vendor/modernizr-3.5.0.min.js'; ?>"></script>

<script src="<?php echo base_url().'assets/frontend/js/popper.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/frontend/js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/frontend/js/slick.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/frontend/js/select2.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/frontend/js/tinymce.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/frontend/js/multi-step-modal.js'; ?>"></script>
<script src="<?php echo base_url().'assets/frontend/js/jquery.webui-popover.min.js'; ?>"></script>
<script src="https://content.jwplatform.com/libraries/O7BMTay5.js"></script>
<script src="<?php echo base_url().'assets/frontend/js/main.js'; ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 
<script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/bootstrap-select.min.js"></script>

  



<script>
 

function confirmation() {
	var allcode = $('#code1').val()  + $('#code2').val() + $('#code3').val() + $('#code4').val() + $('#code5').val() +  $('#code6').val();
	var nm_email = $('#email').text();	
	 if(allcode.length==6){
		 
		   $.ajax({
            url: '<?php echo site_url('login/ajax_confirmation');?>',
            type : 'POST',
            // data : {kode_konfirmasi : allcode,email : '<?php echo $this->session->userdata('email'); ?>'},
            data : {kode_konfirmasi : allcode,email : nm_email},
            success: function(response)
            {	
					 // var json = $.parseJSON(response);
					  // alert(response);
					    if (response == 0) {
						// alert('kosong');
						 $('#checkcode').html('<i  style="color:red;font-size:30px;" class="fa fa-times"></i>');
						}else{
							$('#checkcode').html('<i  style="color:green;font-size:30px;" class="fa fa-check"></i>');
							var role = "<?php echo $this->session->userdata('role_id'); ?>";
							if(role==1){
								location.href = "<?php echo site_url('admin/dashboard');?>";
							}else{
								location.href = "<?php echo site_url('home');?>";
								
							}
							
							
						}
            }
        });
	 }
}
 

$(".inline_input").keyup(function () {
	
    if (this.value.length == this.maxLength) {
		 
	  $(this).parent().next().find('.inline_input').focus();
    }
});	

	$("#code1").click(function() {
        
		 
		$('.inline_input').val('');
		
		 
    });
	
/* 	$("#resend_email").click(function() {
        
		resend_email($('#email').text());
		 
		 
		
		 
    }); */
	
	$("#code6").keyup(function() {
        
		confirmation();
		$(this).blur();
		
		 
    });
	
	</script>
	
 <?php if($this->router->fetch_method()=='signup'){ ?>

		<script>	
		var fileTypes = ['jpg', 'jpeg'];
		function readURL(input) {
			var extension = input.files[0].name.split('.').pop().toLowerCase(),  //file extension from input file
            isSuccess = fileTypes.indexOf(extension) > -1;  //is extension in acceptable types
			var fsize = input.files[0].size;
			 
		 
		 
			if (isSuccess) {  
				if(fsize<2000000){
			
					if (input.files && input.files[0]) {
						var reader = new FileReader();
		 
						reader.onload = function (e) {
						
							$('#blah').attr('src', e.target.result);
						};

						reader.readAsDataURL(input.files[0]);
					}
				}else {
					alert("File harus berukuran di bawah 2 mb");
					$('#blah').attr('src','http://placehold.it/180');
					$('#photo').val('');
					
				}
			}
			else {  
				  alert("Harap menggunakan format '.jpg' atau '.jpeg'");
				  $('#blah').attr('src','http://placehold.it/180');
				 $('#photo').val('');
				
			}
		 
		 
           
        }
		
		function readURLKTP(input) {
			
			
			var extension = input.files[0].name.split('.').pop().toLowerCase(),  //file extension from input file
            isSuccess = fileTypes.indexOf(extension) > -1;  //is extension in acceptable types
			var fsize = input.files[0].size;
			 
		 
		 
			if (isSuccess) {  
				if(fsize<2000000){
			
					if (input.files && input.files[0]) {
						var reader = new FileReader();
		 
						reader.onload = function (e) {
						
							$('#view_ktp').attr('src', e.target.result);
						};

						reader.readAsDataURL(input.files[0]);
					}
				}else {
					alert("File harus berukuran di bawah 2 mb");
					$('#view_ktp').attr('src','http://placehold.it/180');
					$('#ktp_upload').val('');
					
				}
			}
			else {  
				  alert("Harap menggunakan format '.jpg' atau '.jpeg'");
				  $('#view_ktp').attr('src','http://placehold.it/180');
				  $('#ktp_upload').val('');
				
			}
			
			
           
        }

// URLs images
var female_img = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSo8PcCxh7tT6MDFhJi2UaAT9SeciHqvZuaWtGg0y0-yyP8rMDz";
var male_img = "https://visualpharm.com/assets/217/Life%20Cycle-595b40b75ba036ed117d9ef0.svg";

// On page loaded
$( document ).ready(function() {
	
	 $('#tgl_lahir').datepicker({format: "dd/mm/yyyy",  startView: "years",  autoclose: true}); 
    // Set the sex image
    set_sex_img();
    
    // Set the "who" message
    set_who_message();

    // On change sex input
    $("#input_sex").change(function() {
        // Set the sex image
		 
        set_sex_img();
        set_who_message();
    });

    // On change fist name input
    $("#first_name").keyup(function() {
        // Set the "who" message
        set_who_message();
        
        if(validation_name($("#first_name").val()).code == 0) {
            $("#first_name").attr("class", "form-control is-invalid");
            $("#first_name_feedback").html(validation_name($("#first_name").val()).message);
        } else {
            $("#first_name").attr("class", "form-control");
        }
    });

    // On change last name input
    $("#last_name").keyup(function() {
        // Set the "who" message
        set_who_message();
        
        if(validation_name($("#last_name").val()).code == 0) {
            $("#last_name").attr("class", "form-control is-invalid");
            $("#last_name_feedback").html(validation_name($("#last_name").val()).message);
        } else {
            $("#last_name").attr("class", "form-control");
        }
    });
});

/**
*   Set image path (Mr. or Ms.)
*/
function set_sex_img() {
    var sex = $("#input_sex").val();
    if (sex == "L") {
        // male
        $("#img_sex").attr("src", male_img);
    } else {
        // female
        $("#img_sex").attr("src", female_img);
    }
}

/**
*   Set "who" message
*/
function set_who_message() {
    var sex = $("#input_sex").val();
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    
	if(sex=='L'){
		var initial = "Mr.";
	}else{
		var initial = "Ms.";
	}
	
    if (validation_name(first_name).code == 0 || 
        validation_name(last_name).code == 0) {
        // Informations not completed
        $("#who_message").html("Who are you ?");
    } else {
        // Informations completed
        $("#who_message").html(initial+" "+first_name+" "+last_name);
    }
}

/**
*   Validation function for last name and first name
*/
function validation_name (val) {
    if (val.length < 2) {
        // is not valid : name length
        return {"code":0, "message":"The name is too short."};
    }
    if (!val.match("^[a-zA-Z\- ]+$")) {
        // is not valid : bad character
        return {"code":0, "message":"The name use non-alphabetics chars."};
    }
    
    // is valid
    return {"code": 1};
}

 function AjaxKodepos(elem) {

	  $('#kelurahan').val('');
	  $('#kecamatan').val('');
	  $('#kabupaten').val('');
 
        $.ajax({
            url: '<?php echo site_url('signup/kodepos');?>',
            type : 'POST',
            data : {kodepos : elem.value},
            success: function(response)
            {	
					 var json = $.parseJSON(response);
					 
					    if (response == false) {
						
						
						} else { 
							
						  $('#kelurahan').val(json.kelurahan);
						  $('#kecamatan').val(json.kecamatan);
						  $('#kabupaten').val(json.kabupaten);
						
							
						}
					  
               /*  if (!response) {
                    $('#signInModal').modal('show');
                }else {
                    if ($(elem).hasClass('active')) {
                        $(elem).removeClass('active')
                    }else {
                        $(elem).addClass('active')
                    }
                    $('#wishlist_items').html(response);
                } */ 
            }
        });
    }
	
	 function AjaxKodeposKantor(elem) {

	  
	  $('#kabupaten_kantor').val('');
 
        $.ajax({
            url: '<?php echo site_url('signup/kodepos');?>',
            type : 'POST',
            data : {kodepos : elem.value},
            success: function(response)
            {	
					 var json = $.parseJSON(response);
					 
					    if (response == false) {
						
						
						} else { 
							
						 
						  $('#kabupaten_kantor').val(json.kabupaten);
						
							
						}
					  
               /*  if (!response) {
                    $('#signInModal').modal('show');
                }else {
                    if ($(elem).hasClass('active')) {
                        $(elem).removeClass('active')
                    }else {
                        $(elem).addClass('active')
                    }
                    $('#wishlist_items').html(response);
                } */
            }
        });
    }


</script>
<?php } ?>
<script>
 

$(document).ready(function(){
	
	
    $(document).ajaxStart(function(){
        $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
    });
    $("button").click(function(){
        $("#txt").load("demo_ajax_load.asp");
    });
});
</script>

<!-- SHOW TOASTR NOTIFIVATION -->
<?php if ($this->session->flashdata('flash_message') != ""):?>

<script type="text/javascript">
	toastr.success('<?php echo $this->session->flashdata("flash_message");?>');
</script>

<?php endif;?>

<?php if ($this->session->flashdata('error_message') != ""):?>

<script type="text/javascript">
	toastr.error('<?php echo $this->session->flashdata("error_message");?>');
</script>

<?php endif;?>
