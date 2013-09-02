<div>
	<p class="error"><?php if(!empty($error)){echo $error;}?></p>
    <?php echo form_open(base_url() . 'login/validatelogin');?>
     
     <p><label>Username</label><input type="text" name="username" /></p>
     <p><label>Password</label><input type="password" name="password" /></p>
	<p><input type="submit" value="submit" /></p>
</div>