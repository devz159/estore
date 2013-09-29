<div class = "content">
<div class = "login column">
	<p class="error"><?php if(!empty($error)){echo $error;}?></p>
    <?php echo form_open(base_url() . 'login/validateregister');?>
    
     <div class = "login_form">
     <p><label>Username</label><input type="text" name="username" class = "form square"/><span><?php echo form_error('username'); ?></span></p>
     <p><label>Password</label><input type="password" name="password" class = "form square" /> <?php echo form_error('password','<span class = "error">', "</span>"); ?></p>
     <p><label>Email Address</label><input type="text" name="email" class = "form square" value="<?php echo set_value("email") ?>" /><?php echo form_error('email','<span class ="error">',"</span>"); ?> </p>
     <p><label>Firstname</label><input type="text" name="firstname"class = "form square" /><span><?php echo form_error('firstname'); ?></span></p>
     <p><label>Middlename</label><input type="text" name="middlename" class = "form square"/><span><?php echo form_error('middlename'); ?></span></p>
     <p><label>Lastname</label><input type="text" name="lastname" class = "form square"/><span><?php echo form_error('lastname'); ?></span></p>
     <p><label>Contact Number</label><input type="text" name="contact_number" class = "form square" /><span><?php echo form_error('contact_number'); ?></span></p>
	
	<p><input type="submit" value="Submit" class ="submit button"/></p>
    </div>
</div>
</div>
