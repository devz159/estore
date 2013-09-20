<div> 

	<p class="error"><?php if(!empty($error)){echo $error;}?></p>
	 <?php echo form_open(base_url() . 'product/validate_addquantity');?>
	
	<p><label> ADD QUANTITY TO AN EXISTING PRODUCT </label></p>
	

	
	<?php foreach ($products as $product):?>
		<p>product: <?php echo $product->product_name; ?>, </p>
		<input type="hidden" name="product_ID"  value="<?php echo $product->product_ID; ?>"/>
	<?php endforeach; ?>
 	<p><label>Discounted Price</label> <input type="number" name="discounted_price" /></p>
 	<p><label> Quantity</label> <input type="number" name= "quantity" /> </p>
 	<p><label> Unit Price</label> <input type="number" name="unit_price" /></p>
 	
	<p><input type="submit" value="Submit" /></p>
	
</div>