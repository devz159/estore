<div>
	
    
     
     <?php foreach ($products as $product): ?>
     <?php echo form_open(base_url() . 'admin/product/validateeditproduct');?>
     		<p><label>Model Name</label> <input type="text" name="product_name" value="<?php echo $product->product_name; ?>"/></p>
     		<input type="hidden" name="product_ID"  value="<?php echo $product->product_ID; ?>"/>
     
  
    <p><label>Color</label>
     	<select name = "color">
     			<option value=""> Select</option>
				<option value="Red"> Red</option>
				<option value="Blue"> Blue</option>
				<option value="Yellow"> Yellow</option>
				<option value="Purple/Violet"> Purple/Violet</option>
				<option value="Green"> Green</option>
		</select></p>			
		
     							
	<p><label>Category</label>
		<select name = "category">
				<option value=""> Select</option>
				<option value="Handbag"> Handbag</option>
				<option value="Belt Bag"> Belt Bag</option>
				<option value="Backpack"> Backpack</option>
				<option value="Lugage"> Lugage</option>
				<option value="Sports Bag"> Sports Bag</option>
		</select></p>
		
	<p><label>Description</label> <input type= "text" name="description" value="<?php echo $product->description; ?>" /></p>
		

	<p><input type="submit" value="Submit" /></p>
	<?php endforeach; ?>
</div>
		
