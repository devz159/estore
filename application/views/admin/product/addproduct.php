<div>
	<p class="error"><?php if(!empty($error)){echo $error;}?></p>
    <?php echo form_open(base_url() . 'admin/product/validateaddproduct');?>
     
     <p><label>Model Name</label> <input type="text" name="product_name" /><?php echo form_error('product_name', '<span class="error">','</span>' );?></p>
   

     <p><label>Color</label>
     	<select name = "color">
     			<option value=""> Select</option>
				<option value="Red"> Red</option>
				<option value="Blue"> Blue</option>
				<option value="Yellow"> Yellow</option>
				<option value="Purple/Violet"> Purple/Violet</option>
				<option value="Green"> Green</option>
				
		</select>
		<?php echo form_error('color', '<span class="error">','</span>' );?>
		</p>						
     							
	<p><label>Category</label>
		<select name = "category">
				<option  value=""> Select</option>
				<option value="Handbag"> Handbag</option>
				<option value="Belt Bag"> Belt Bag</option>
				<option value="Backpack"> Backpack</option>
				<option value="Lugage"> Lugage</option>
				<option value="Sports Bag"> Sports Bag</option>
		</select>
		<?php echo form_error('category', '<span class="error">','</span>' );?>
		</p>
		
	<p><label>Description</label> <input type= "text" name="description" /><?php echo form_error('description', '<span class="error">','</span>' );?></p>
		

	<p><input type="submit" value="Submit" /></p>
</div>