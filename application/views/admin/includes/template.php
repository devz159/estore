<!DOCTYPE html>
<html lang="en">
<head>
	<title>Solar Industries E-Store</title>
	<meta charset="utf-8" />
	<meta name="url" content="<?php echo base_url();?>" />
   	<!--<link rel = 'stylesheet" href="<?php echo base_url() . 'css/cms_xhtml/css/screen.css'; ?>" />-->
    <link rel="stylesheet" href="<?php echo base_url() . 'css/cms_xhtml/css/screen.css'; ?>" type="text/css" media="screen" title="default" />
    <link rel="stylesheet" href = "http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
    <!--Scripts-->
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script><!--Jquery-->
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'js/utility.js';?>"></script>
    
    <!--Checkbox-->
    <!--  checkbox styling script -->
<script src="<?php echo base_url() . 'css/cms_xhtml/js/jquery/ui.core.js'; ?>" type="text/javascript"></script>
<script src="<?php echo base_url() . 'css/cms_xhtml/js/jquery/ui.checkbox.js'; ?>" type="text/javascript"></script>
<script src="<?php echo base_url() . 'css/cms_xhtml/js/jquery/jquery.bind.js'; ?>" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>

  

    
</head>
<body>
	
	<?php $this->load->view('admin/includes/header'); ?>
	<?php $this->load->view('admin/includes/navigation'); ?>
	<?php $this->load->view($main_content);?>
	<?php $this->load->view('admin/includes/footer');?>
   
</body>
</html>