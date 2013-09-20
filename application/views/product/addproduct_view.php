<div>
	<p class="error"><?php if(!empty($error)){echo $error;}?></p>
    <?php echo form_open(base_url() . 'product/validate_addproduct');?>
     
     <p><label>Model Name</label> <input type="text" name="product_name" /></p>
   
    
     <p><label>Color</label><input type="text" name="color" /></p>
     							
	<p><label>Size</label>
		<select name = "size">
				<option value="0"> Small</option>
				<option value="1"> Medium</option>
				<option value="2"> Large</option>
				<option value="3"> Extra Large</option>
		</select> </p>
		
	<p><label>Description</label> <input type= "text" name="description" /></p>
		

	<p><input type="submit" value="Submit" /></p>
</div>