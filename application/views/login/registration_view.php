<div>
	<p class="error"><?php if(!empty($error)){echo $error;}?></p>
    <?php echo form_open(base_url() . 'login/validateregistration');?>
     
     <p><label>Username</label><input type="text" name="username" /></p>
     <p><label>Password</label><input type="password" name="password" /> <?php echo form_error('password','<span class = "error">', "</span>"); ?></p>
     <p><label>Email Address</label><input type="text" name="email" value="<?php echo set_value("email") ?>" /><?php echo form_error('email','<span class ="error">',"</span>"); ?> </p>
     <p><label>Firstname</label><input type="text" name="firstname" /></p>
     <p><label>Middlename</label><input type="text" name="middlename" /></p>
     <p><label>Lastname</label><input type="text" name="lastname" /></p>
     <p><label>Contact Number</label><input type="number" name="contactnumber" /></p>
     <!--BIRTHDATE - datepicker -->

	<p><input type="submit" value="Submit" /></p>
