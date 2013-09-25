<!DOCTYPE html>
<html lang="en">
<head>
	<title>Solar Industries E-Store</title>
	<meta charset="utf-8" />
	<meta name="url" content="<?php echo base_url();?>" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'js/utility.js';?>"></script>
    
</head>
<body>
	
	<?php $this->load->view('admin/includes/header'); ?>
	<?php $this->load->view('admin/includes/navigation'); ?>
	<?php $this->load->view($main_content);?>
	<?php $this->load->view('admin/includes/footer');?>
   
</body>
</html>