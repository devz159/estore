<div class = "login column">

	<p class="error"><?php if(!empty($error)){echo $error;}?></p>
    <?php echo form_open(base_url() . 'login/validatelogin');?>
    
     <div class = "login_form">
         <p><label>Username</label><input type="text" name="username" class = "form square" /> </p>
         <p><label>Password</label><input type="password" name="password"class = "form square" /></p>
         <p><input type="submit" value="submit" /></p>
	</div>
</div>