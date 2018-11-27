<script src="<?php echo base_url().'assets/frontend/js/vendor/modernizr-3.5.0.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/frontend/js/vendor/jquery-3.2.1.min.js'; ?>"></script>
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
 
 
 


/* 
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
} */
 

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
