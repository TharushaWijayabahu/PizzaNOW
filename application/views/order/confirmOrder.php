<div class="container">
	<div class="card">
		<div class="card-header">
			Invoice
			<strong><?php echo date('m/d/Y'); ?></strong>
			<span class="float-right"> <strong>Status:</strong> <?php echo $orderStatus ?></span>

		</div>
		<div class="card-body">
			<?php
			if ($this->session->flashdata('message')) { ?>
				<div class="alert alert-danger text-center">
					<?php echo $this->session->flashdata("message") ?>
				</div>

			<?php }
			?>
			<div class="row mb-4">
				<div class="col-sm-6">
					<h6 class="mb-3">Customer details</h6>
					<div>
						<strong><?php echo $customer->name; ?></strong>
					</div>
					<div><?php echo $customer->address; ?></div>
					<div>Email: <?php echo $customer->email; ?></div>
					<div>Phone: <?php echo $customer->number; ?></div>
				</div>

			</div>

			<div class="table-responsive-sm">
				<table class="table table-striped">
					<thead>
						<tr>
							<th class="center">#</th>
							<th>Item</th>
							<th>Description</th>

							<th class="right">Unit Cost</th>
							<th class="center">Qty</th>
							<th class="right">Total</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($itemList as $row => $item) {
							?>
							<tr>
								<td class="center"><?php echo $row + 1; ?></td>
								<td class="left strong"><?php echo $item->name; ?></td>
								<?php if ($item->type == 'PIZZA') {
									if (isset($item->selectedTopping)) { ?>
										<td class="left">
											<p style="font-size: 16px; font-weight: bold;">Toppings</p>
											<?php foreach ($item->selectedTopping as $topping) {
												?>
												<?php echo $topping['toppingName'] . ' - Rs ' . $topping['toppingPrice']; ?>
												<br/>
											<?php } ?>
										</td>
									<?php } else {
										?>
										<td class="left"><?php echo $item->description; ?></td>
									<?php } ?>
									<td class="right">Rs <?php echo $item->itemTotal; ?></td>
								<?php } else { ?>
									<td class="left"><?php echo $item->description; ?></td>
									<td class="right">Rs <?php echo $item->price; ?></td>
								<?php } ?>
								<td class="center"><?php echo $item->qty; ?></td>
								<td class="right">Rs <?php echo $item->total; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="row">
				<div class="col-lg-4 col-sm-5">
				</div>
				<div class="col-lg-4 col-sm-5 ml-auto">
					<table class="table table-clear">
						<tbody>
							<tr>
								<td class="left">
									<strong>Total</strong>
								</td>
								<td class="right">
									<strong>Rs <?php echo $totalAmount; ?></strong>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<a href="<?php echo base_url() . 'index.php/order/placeOrder'; ?>"
			   class="btn btn-success checkout">
				Place order
			</a>
		</div>

	</div>
</div>
