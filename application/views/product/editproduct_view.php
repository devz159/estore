<div>
	<p class="error"><?php if(!empty($error)){echo $error;}?></p>
    <?php echo form_open(base_url() . 'product/validate_editproduct');?>
     
     <?php foreach ($products as $product): ?>
     		<p><label>Model Name</label> <input type="text" name="product_name" value="<?php echo $product->product_name; ?>"/></p>
     
     <p><?php //echo $product->product_ID; ?></p>
     <input type="hidden" name="product_ID"  value="<?php echo $product->product_ID; ?>"/>
     <?php endforeach ?>
   <div>
	<p class="error"><?php if(!empty($error)){echo $error;}?></p>
    <?php echo form_open(base_url() . 'product/validate_editproduct');?>

   
    
     <p><label>Color</label><input type="text" name="color" value="<?php echo $product->color; ?>"/></p>
     							
	<p><label>Size</label>
		<select name = "size">
				<option value="0"> Small</option>
				<option value="1"> Medium</option>
				<option value="2"> Large</option>
				<option value="3"> Extra Large</option>
		</select> </p>
		
	<p><label>Description</label> <input type= "text" name="description" value="<?php echo $product->description; ?>" /></p>
		

	<p><input type="submit" value="Submit" /></p>
</div>
		
