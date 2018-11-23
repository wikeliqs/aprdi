<?php
$system_name         = $this->db->get_where('settings', array('key' => 'system_name'))->row()->value;
$user_details        = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
$text_align          = $this->db->get_where('settings', array('key' => 'text_align'))->row()->value;
$logged_in_user_role = strtolower($this->session->userdata('role'));
?>
<!DOCTYPE html>
<html lang="en" dir="<?php if ($text_align == 'right-to-left') echo 'rtl'; ?>">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <title><?php echo $system_name; ?> | <?php echo get_phrase($page_title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link name="favicon" type="image/x-icon" href="<?php echo base_url() . 'assets/favicon.png' ?>"
          rel="shortcut icon"/>
    <!-- BEGIN PLUGIN CSS -->
	<?php include 'layout/includes_top.blade.php'; ?>
</head>
<!-- END HEAD -->
<body class="page-body" data-url="http://neon.dev">
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<?php include 'layout/navigation.blade.php' ?>
    <div class="main-content">
		<?php include 'layout/header.blade.php'; ?>
		
		<?php include $logged_in_user_role . '/' . $page_name . '.php'; ?>
		<?php include 'layout/footer.blade.php'; ?>
    </div>
</div>
</body>
<?php include 'layout/modal.blade.php'; ?>
<?php include 'layout/includes_bottom.blade.php'; ?>
