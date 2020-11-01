<h1 align="center">Shopping Cart</h1>
<div class="shopping-cart">
	<?php if (isset($itemList)) {
		?>
		<div class="container cart-container" id="cartDiv" style="min-height: 250px;">
			<div class="column-labels">
				<label class="product-image">Image</label>
				<label class="product-details">Product</label>
				<label class="product-price">Price</label>
				<label class="product-quantity">Quantity</label>
				<label class="product-removal">Remove</label>
				<label class="product-line-price">Total</label>
			</div>
			<?php foreach ($itemList as $key => $item) {
				if ($item->type == 'PIZZA') {
					$total = $item->price;
					?>
					<div class="product">
						<div class="product-image">
							<img src="<?php echo base_url() . $item->imgUrl ?>">
						</div>
						<div class="product-details">
							<div class="product-title"><?php echo $item->name . ' (' . $item->size . ') - Rs ' .$item->price?>
							</div>
							<?php
							if (isset($item->selectedTopping)) { ?>
								<h5 style="font-size: 15px;">Topping</h5>
								<?php foreach (($item->selectedTopping) as $row => $topping) {
									$total += $topping['toppingPrice'];
									?>
									<div class="row" style="font-size: 13px;">
										<div class="col-6">
											<ul>
												<li><?php echo $topping['toppingName'] ?></li>
											</ul>
										</div>
										<div class="col-6">
											<p><?php echo 'Rs '. $topping['toppingPrice'] ?></p>
										</div>
									</div>
								<?php }
							} else { ?>
								<p class="product-description"> <?php echo $item->description ?></p>
							<?php }
							?>
						</div>
						<div class="product-price"><?php echo $total ?></div>
						<div class="product-quantity">
							<input class="quantity_val" type="number" onkeydown="return false" id="quantity" value="<?php echo $item->qty ?>"
								   min="1">
							<input class="item_id_val" type="hidden" id="id" value="<?php echo $key ?>">
						</div>

						<div class="product-removal">
							<button class="remove-product" data-id="<?php echo $key; ?>">
								Remove
							</button>
						</div>
						<div class="product-line-price"><?php echo $item->total ?></div>
					</div>
				<?php } else { ?>
					<div class="product">
						<div class="product-image">
							<img src="<?php echo base_url() . $item->imgUrl ?>">
						</div>
						<div class="product-details">
							<div class="product-title"><?php echo $item->name ?></div>
							<p class="product-description"> <?php echo $item->description ?></p>
						</div>
						<div class="product-price"><?php echo $item->price ?></div>
						<div class="product-quantity">
							<input class="quantity_val" type="number" id="quantity" value="<?php echo $item->qty ?>"
								   min="1">
							<input class="item_id_val" type="hidden" id="id" value="<?php echo $key ?>">
						</div>

						<div class="product-removal">
							<button class="remove-product" data-id="<?php echo $key; ?>">
								Remove
							</button>
						</div>
						<div class="product-line-price"><?php echo $item->total ?></div>
					</div>
				<?php }
			} ?>
			<div class="totals" id="totals">
				<div class="totals-item">
					<label>Total</label>
					<div class="totals-value" id="cart-subtotal"><?php echo $totalAmount ?></div>
				</div>
			</div>
			<button class="checkout">Checkout</button>
		</div>
	<?php } else { ?>
		<div class="container cart-container" id="emptyCartDiv" style="min-height: 250px;">
			<p class="text-center">No items</p>
		</div>
	<?php } ?>
</div>

