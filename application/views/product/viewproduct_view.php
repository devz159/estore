<div>

	<p><a href="<?php echo base_url ('product/section/addproduct');?>">  ADD PRODUCT </a></p>

	<table>
		<thead>
			<th>PRODUCT NAME</th>
			<th>PRODUCT DATE</th>
			<th>ACTION</th>
		</thead>
		<tbody>
			<?php if(!empty($products)): ?>
				<?php foreach ($products as $product):?>
					
					<tr productid="<?php echo $product->product_ID; ?>">
						<td><?php echo $product->product_name; ?></td>
						<td><?php echo $product->product_date; ?></td>
						<td><a href="<?php echo base_url() .  'product/section/addquantity/' . $product->product_ID; ?>">ADD QUANTITY</a> | <a href="<?php echo base_url() .  'product/section/editproduct/' . $product->product_ID; ?>">EDIT</a> | <a class="delete dltproduct"  href="<?php echo base_url() .  'product/section/deleteproduct/' . $product->product_ID; ?>">DELETE</a></td>
					</tr>
				<?php endforeach ?>
			
			<?php else: ?>
			<?php endif; ?>
		</tbody>
	</table>
</div>