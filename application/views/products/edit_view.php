<div>
	<p class="error"><?php if(!empty($error)){echo $error;}?></p>
    <?php echo form_open(base_url() . 'product/edit_view');?>
     
     <p><label>Model Name</label> <input type="text" name="product_name" /></p>
     <p><label>Quantity</label> <input type="number" name= "quanity" /></p>
     <p><label>Selling Price</label> <input type = "number" name="selling_price" /></p>
     <p><label>Discount Price</label> <input type = "number" name="discounted_price" /></p>
    
     <p><label>Color</label>
     	<select name = "color">	
				<option value="0"> White</option>
				<option value="1"> Black</option>
				<option value="2"> Grey</option>
				<option value="3"> Red</option>
				<option value="4"> Blue</option>
				<option value="5"> Yellow</option>   		
				<option value="6"> Pink</option>
				<option value="7"> Green</option>	
				<option value="8"> Violet</option>
     	</select> </p> 
     							
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