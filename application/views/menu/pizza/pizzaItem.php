<h1 class="text-md-center text-sm-center text-lg-center">PIZZA</h1>
<?php if (isset($pizzaItem['pizzaItem'])) {
	$total = 0.00;
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12 mx-auto">
				<div class="card">
					<img src="<?php echo base_url() . $pizzaItem['pizzaItem'][0]->pizza_img_url; ?>"
						 class="card-img-top" alt="<?php echo $pizzaItem['pizzaItem'][0]->pizza_name; ?>">
					<div class="card-body">
						<h3 class="card-title">
							<?php echo $pizzaItem['pizzaItem'][0]->pizza_name; ?>
						</h3>
						<p class="card-text" id="addedItem">
							<?php echo $pizzaItem['pizzaItem'][0]->pizza_description; ?>
						</p>
						<div id="area-custom" class="customization d-none">
							<h3 class="font-family-main">Customization </h3>
							<h4 class="selected-size-desc margin-bottom-10px font-family-main">
								<span></span>
							</h4>
							<h4 class="selected-extras-desc margin-bottom-10px font-family-main">
								<span>Extra Toppings:<br>
									<span style="font-size:13px;"></span>
								</span>
							</h4>
							<h3 class="selected-price-desc margin-bottom-10px font-family-main">
								<span style="font-size:16px;"></span>
							</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-6 col-sm-12 col-xs-12 mx-auto">
				<div id="accordion">
					<div class="card">
						<div class="card-header" id="headingOne">
							<h5 class="mb-0">
								<button class="btn btn-link customize-btn" data-toggle="collapse"
										data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Select Size
									<span id="selected-size"></span>
								</button>
							</h5>
						</div>
						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
							 data-parent="#accordion">
							<div class="card-body">
								<div class="row">
									<div class="selected-pizza-data col-lg-4 col-md-6 col-sm-6 col-xs-6">
										<div data-pizza_name="<?php echo $pizzaItem['pizzaItem'][0]->pizza_name; ?>"
											 data-pizza_id="<?php echo $pizzaItem['pizzaItem'][0]->pizza_id; ?>"
											 data-pizza_size="Small"
											 data-pizza_price="<?php echo $pizzaItem['pizzaItem'][0]->pizza_s_price; ?>"
											 class="customize-pizza">
											<div class="row">
												<div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
													<center style="font-size: 24px;">
														<i class="fas fa-pizza-slice"></i>
													</center>
												</div>
												<div class="col-lg-8 col-md-12 col-xs-12 col-sm-12">
													<h6 class="topping-heading">Small</h6>
													<span class="secondry-color" style="font-size: 13px">
														Rs. <?php echo $pizzaItem['pizzaItem'][0]->pizza_s_price; ?>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="selected-pizza-data col-lg-4 col-md-6 col-sm-6 col-xs-6">
										<div data-pizza_name="<?php echo $pizzaItem['pizzaItem'][0]->pizza_name; ?>"
											 data-pizza_id="<?php echo $pizzaItem['pizzaItem'][0]->pizza_id; ?>"
											 data-pizza_size="Medium"
											 data-pizza_price="<?php echo $pizzaItem['pizzaItem'][0]->pizza_m_price; ?>"
											 class="customize-pizza">
											<div class="row">
												<div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
													<center style="font-size: 24px;">
														<i class="fas fa-pizza-slice"></i>
													</center>
												</div>
												<div class="col-lg-8 col-md-12 col-xs-12 col-sm-12">
													<h6 class="topping-heading">Medium</h6>
													<span class="secondry-color" style="font-size: 13px">
														Rs. <?php echo $pizzaItem['pizzaItem'][0]->pizza_m_price; ?>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="selected-pizza-data col-lg-4 col-md-6 col-sm-6 col-xs-6">
										<div data-pizza_name="<?php echo $pizzaItem['pizzaItem'][0]->pizza_name; ?>"
											 data-pizza_id="<?php echo $pizzaItem['pizzaItem'][0]->pizza_id; ?>"
											 data-pizza_size="Large"
											 data-pizza_price="<?php echo $pizzaItem['pizzaItem'][0]->pizza_m_price; ?>"
											 class="customize-pizza">
											<div class="row">
												<div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
													<center style="font-size: 24px;">
														<i class="fas fa-pizza-slice"></i>
													</center>
												</div>
												<div class="col-lg-8 col-md-12 col-xs-12 col-sm-12">
													<h6 class="topping-heading">Large</h6>
													<span class="secondry-color" style="font-size: 13px">
														Rs. <?php echo $pizzaItem['pizzaItem'][0]->pizza_m_price; ?>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="headingTwo">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed customize-btn" data-toggle="collapse"
										data-target="#collapseTwo"
										aria-expanded="false" aria-controls="collapseTwo">
									Add something extra <span id="selected-topping"></span>
								</button>
							</h5>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
							<div class="card-body">
								<div class="row">
									<?php if (isset($topping['topping'])) {
										foreach ($topping['topping'] as $row => $item) {
//											print_r($item->topping_name);
											?>
											<div class="selected-topping-data col-md-6 col-lg-6 col-sm-12 col-xs-12">
												<div data-topping_name="<?php echo $item->topping_name; ?>"
													 data-topping_id="<?php echo $item->topping_id; ?>"
													 data-topping_price="<?php echo $item->topping_price; ?>"
													 class="customize-pizza-topping">
													<div class="row">
														<div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
															<center style="font-size: 24px;">
																<img src="<?php echo base_url() . $item->topping_img_url; ?>"
																	 width="50px" alt="<?php echo $item->topping_name; ?>">
															</center>
														</div>
														<div class="col-lg-8 col-md-12 col-xs-12 col-sm-12">
															<h6 class="topping-heading">
																<?php echo $item->topping_name; ?>
															</h6>
															<span class="secondry-color text-center">
																Rs. <?php echo $item->topping_price; ?>
															</span>
														</div>
													</div>
												</div>
											</div>
										<?php }
									} ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="btn-add-pizza-cart">
					<div class="row">
						<div class="pizza-quantity col-lg-4 col-md-8 col-sm-8 col-xs-12 mx-auto">
							<input class="quantity_val text-center"
								   style="height: 38px;margin-top: 7px; float: left; width: 50px;"
								   type="number" id="quantity" value="1" min="1">
						</div>
						<div class="col-lg-8 col-md-8 col-sm-4 col-xs-12 mx-auto">
							<a href="#"
							   class="btn btn-success btn-customize-mobile"
							   style="margin-top: 7px; border-radius: 3px; padding: 8px;">
								Add to cart Rs <?php echo $total ?>.00
							</a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
<?php } ?>
<script type="text/javascript">
	$(document).ready(function() {
		let selectedTopping = [];
		let selectedPizza = [];
		let is_checked = true;
		$(".customize-pizza-topping").on("click", function () {
			let id = $(this).data('topping_id');
			let name = $(this).data('topping_name');
			let price = $(this).data('topping_price');
			selectedTopping.push(id);
			console.log(id, name, price, selectedTopping);
			$(this).toggleClass('item-selected',this.checked);
			$(this).parent('.customization').toggleClass('d-block');
			// $('.customize-pizza-topping').addClass('item-selected');
			$('#selected-topping').html(name + ' selected, ');

		});

		$(".customize-pizza").click(function (e) {

			let pizza_id = $(this).data('pizza_id');
			let pizza_name = $(this).data('pizza_name');
			let pizza_size = $(this).data('pizza_size');
			let pizza_price = $(this).data('pizza_price');
			let pizza = {
				'pizzaId' : pizza_id,
				'pizzaName': pizza_name,
				'pizzaSize' :pizza_size,
				'pizzaPrice' : pizza_price,
				'is_selected' : true
			}

			console.log(selectedPizza.findIndex(x => x.pizzaId === pizza.pizzaId));
			if((selectedPizza.findIndex(x => x.pizzaId === pizza.pizzaId)) === -1){
				selectedPizza.push(pizza);
				is_checked = true;
			}else{
				selectedPizza = [];
			}
			$('#selected-size').html(pizza_size + ' selected');

			if(is_checked){
				$(this).toggleClass('item-selected', is_checked);
				is_checked = false;
			}else{
				$(this).toggleClass('item-selected', is_checked);
			}
			console.log(is_checked, selectedPizza);
		});


		$('.pizza-quantity input').change(function () {
			let quantity = $(this).closest('.pizza-quantity').find('.quantity_val').val();
			console.log(quantity);
		})

		function updateView(){

		}
	})
</script>
