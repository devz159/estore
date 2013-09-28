<div >
	<h3>Product Details</h3>
	<p><a href="<?php echo base_url ('admin/product/section/add');?>">  ADD PRODUCT </a></p>
	
	<table>
		<thead>
			<tr>
				<th>PRODUCT NAME</th>
				<th>PRODUCT DATE</th>
				<th>CATEGORY</th>
				<th>COLOR</th>
				<th>QUANTITY</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>
			<?php if(!empty($products)): ?>
				<?php foreach ($products as $product):?>
					
					<tr productid="<?php echo $product->product_ID; ?>">
						<td><?php echo $product->product_name; ?></td>
						<td><?php echo $product->product_date; ?></td>
						<td><?php echo $product->category; ?></td>
						<td><?php echo $product->color; ?> </td>
						<td><?php echo $product->quantity; ?> </td>
						<td><a href="<?php echo base_url() .  'admin/product/section/addquantity/' . $product->product_ID; ?>">ADD QUANTITY</a> | <a href="<?php echo base_url() .  'admin/product/section/editproduct/' . $product->product_ID; ?>">EDIT</a> | <a class="delete dltproduct"  href="<?php echo base_url() .  'admin/product/section/deleteproduct/' . $product->product_ID; ?>">DELETE</a></td>
					</tr>
				<?php endforeach ?>
			
			<?php else: ?>
			<tr>
				<td>No Products Added</td>
			</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>