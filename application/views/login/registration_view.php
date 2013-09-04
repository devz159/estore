<div>
	<p class="error"><?php if(!empty($error)){echo $error;}?></p>
    <?php echo form_open(base_url() . 'login/validateregistration');?>
     
     <p><label>Username</label><input type="text" name="username" /></p>
     <p><label>Password</label><input type="password" name="password" /></p>
     <p><label>Email Address</label><input type="text" name="email" /></p>
     <p><label>Firstname</label><input type="text" name="firstname" /></p>
     <p><label>Middlename</label><input type="text" name="middlename" /></p>
     <p><label>Lastname</label><input type="text" name="lastname" /></p>
     <p><label>Contact Number</label><input type="text" name="contactnumber" /></p>
     <!--BIRTHDATE - datepicker -->

	<p><input type="submit" value="Submit" /></p>
</div>