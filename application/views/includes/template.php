<!DOCTYPE html>
<html lang="en">
<head>
	<title>Solar Industries E-Store</title>
	<meta charset="utf-8" />
	<meta name="url" content="<?php echo base_url();?>" />
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="<?php echo base_url() . 'images/';?>favicon.ico" type="image/x-icon"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/style.css" /> 
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'js/engine1/style.css';?>" />
	
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'js/utility.js';?>"></script>

    
    <link rel="stylesheet" href="flexslider.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="jquery.flexslider.js"></script>
  

</head>
<body>
	
	<?php $this->load->view('includes/header'); ?>
	<?php $this->load->view('includes/navigation'); ?>
	<?php $this->load->view($main_content);?>
	<?php $this->load->view('includes/footer');?>
    

</body>
</html>