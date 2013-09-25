<!DOCTYPE html>
<html lang="en">
<head>
	<title>Solar Industries E-Store</title>
	<meta charset="utf-8" />
	<meta name="url" content="<?php echo base_url();?>" />
   <!--   <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/style.css" /> -->
   
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'js/utility.js';?>"></script>
    
</head>
<body>
	<?php $this->load->view('includes/header2'); ?>
	<?php $this->load->view('includes/navigation'); ?>
	<?php $this->load->view($main_content);?>
	<?php $this->load->view('includes/footer');?>
    
</body>
</html>