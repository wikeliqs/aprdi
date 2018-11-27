
<!DOCTYPE html>
<html lang="en">
<head>

	<title><?php echo ucwords($page_title); ?></title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Udemy Clone - Creativeitem" />
	<meta name="author" content="Creativeitem" />
	<link name="favicon" type="image/x-icon" href="<?php echo base_url().'assets/favicon.png' ?>" rel="shortcut icon" />
	<?php include 'includes_top.php';?>

</head>
<body class="gray-bg">

	<?php
	if ($this->session->userdata('user_login')) {
		include 'logged_in_header.php';
	}else {
		include 'logged_out_header.php';
	}  
	
	 
	
	// echo "<div class='wrap'>";
	include $page_name.'.php';
	// echo "</div>";
	?>
	
	<?php
	 
	
	include 'footer.php';
	
	include 'includes_bottom.php';
	include 'modal.php';
	?>
	
</body>
</html>
<div id="wait" class="container col-sm-6 col-sm-offset-3" style="display:none;position: fixed;z-index: 999;height: 2em;width: 15em;overflow: show;margin: auto;top: 0;left: 0;bottom: 0;right: 0;" ><img class="img-responsive" src='<?php echo base_url().'assets/loader.gif'; ?>' style="float: none;margin: 0 auto;" /></div>
