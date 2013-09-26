<div class = "content register">
	<p class="error"><?php if(!empty($error)){echo $error;}?></p>
    <?php echo form_open(base_url() . 'login/validateregister');?>
     
     <p><label>Username</label><input type="text" name="username" /><span><?php echo form_error('username'); ?></span></p>
     <p><label>Password</label><input type="password" name="password" /> <?php echo form_error('password','<span class = "error">', "</span>"); ?></p>
     <p><label>Email Address</label><input type="text" name="email" value="<?php echo set_value("email") ?>" /><?php echo form_error('email','<span class ="error">',"</span>"); ?> </p>
     <p><label>Firstname</label><input type="text" name="firstname" /><span><?php echo form_error('firstname'); ?></span></p></p>
     <p><label>Middlename</label><input type="text" name="middlename" /><span><?php echo form_error('middlename'); ?></span></p></p>
     <p><label>Lastname</label><input type="text" name="lastname" /><span><?php echo form_error('lastname'); ?></span></p></p>
     <p><label>Contact Number</label><input type="text" name="contact_number" /><span><?php echo form_error('contact_number'); ?></span></p></p>
	
	<p><input type="submit" value="Submit" /></p>
</div>
