<div> 
	<h3>Add quantity to a product</h3>
	
	<?php echo form_open(base_url() . 'admin/product/validateaddquantity');?>
	
	<?php foreach ($products as $product):?>
		<p>product: <?php echo $product->product_name; ?></p>
		<input type="hidden" name="product_ID"  value="<?php echo $product->product_ID; ?>"/>
		<p><label>Discounted Price</label> <input type="number" name="discounted_price" /><?php echo form_error('discounted_price', '<span class="error">','</span>' );?></p>
	 	<p><label> Quantity</label> <input type="number" name= "quantity" value="<?php echo $product->quantity; ?>"/> <?php echo form_error('quantity', '<span class="error">','</span>' );?></p>
	 	<p><label> Unit Price</label> <input type="number" name="unit_price" value="<?php echo $product->price; ?>"/><?php echo form_error('unit_price', '<span class="error">','</span>' );?></p>
 	<?php endforeach; ?>
	<p><input type="submit" value="Submit" /><a href="<?php echo base_url(). 'admin/product';?>">Cancel</a></p>
	<?php echo form_close();?>
	
</div>