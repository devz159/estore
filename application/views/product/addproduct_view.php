<div>
	<p class="error"><?php if(!empty($error)){echo $error;}?></p>
    <?php echo form_open(base_url() . 'product/validate_addproduct');?>
     
     <p><label>Model Name</label> <input type="text" name="product_name" /></p>
   
    <?php echo form_open_multipart('upload/do_upload');?>
    <input type="file" name="userfile" size="20" />

     <p><label>Color</label>
     	<select name = "color">
     			<option> Select</option>
				<option value="Red"> Red</option>
				<option value="Blue"> Blue</option>
				<option value="Yellow"> Yellow</option>
				<option value="Purple/Violet"> Purple/Violet</option>
				<option value="Green"> Green</option>
		</select></p>						
     							
	<p><label>Category</label>
		<select name = "category">
				<option> Select</option>
				<option value="Handbag"> Handbag</option>
				<option value="Belt Bag"> Belt Bag</option>
				<option value="Backpack"> Backpack</option>
				<option value="Lugage"> Lugage</option>
				<option value="Sports Bag"> Sports Bag</option>
		</select></p>
		
	<p><label>Description</label> <input type= "text" name="description" /></p>
		

	<p><input type="submit" value="Submit" /></p>
</div>