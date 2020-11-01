<h1 class="text-md-center text-sm-center text-lg-center">PIZZA</h1>
<?php if (isset($pizzaItem['pizzaItem'])) {
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
									Select Size *
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
											 data-pizza_description="<?php echo $pizzaItem['pizzaItem'][0]->pizza_description; ?>"
											 data-pizza_img_url="<?php echo $pizzaItem['pizzaItem'][0]->pizza_img_url; ?>"
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
											 data-pizza_description="<?php echo $pizzaItem['pizzaItem'][0]->pizza_description; ?>"
											 data-pizza_img_url="<?php echo $pizzaItem['pizzaItem'][0]->pizza_img_url; ?>"
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
											 data-pizza_description="<?php echo $pizzaItem['pizzaItem'][0]->pizza_description; ?>"
											 data-pizza_img_url="<?php echo $pizzaItem['pizzaItem'][0]->pizza_img_url; ?>"
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
								   type="number" id="quantity" value=1 min="1">
						</div>
						<div class="btn-customize-pizza col-lg-8 col-md-8 col-sm-4 col-xs-12 mx-auto">
							<button class="btn btn-success btn-block"
							data-pizza_id = <?php echo $pizzaItem['pizzaItem'][0]->pizza_id;?>
							>
								Add to cart Rs <span class="total-value">0. 00</span>
							</button>
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
		let total = 0;

		$(".customize-pizza-topping").on("click", function () {
			let topping = {
				'toppingId' : $(this).data('topping_id'),
				'toppingName': $(this).data('topping_name'),
				'toppingPrice' : $(this).data('topping_price'),
			}
			let index  = selectedTopping.findIndex(x => x.toppingId === topping.toppingId);

			if(index === -1){
				selectedTopping.push(topping);
			}else{
				selectedTopping.splice(index,1);
				if(selectedTopping.length ===0){
					topping.toppingName = 'please select your toppings'
				}
			}
			$(this).toggleClass('item-selected',this.checked);
			$(this).parent('.customization').toggleClass('d-block');
			$('#selected-topping').html(selectedTopping.map(x => x.toppingName) + ' selected');
			calculatePizzaTotal(this);
			console.log(selectedTopping)
		});

		$(".customize-pizza").click(function () {
			let pizza = {
				'pizzaId' : $(this).data('pizza_id'),
				'pizzaName': $(this).data('pizza_name'),
				'pizzaSize': $(this).data('pizza_size'),
				'pizzaPrice' : $(this).data('pizza_price'),
				'pizzaDescription' : $(this).data('pizza_description'),
				'pizzaImgUrl' : $(this).data('pizza_img_url'),
				'is_selected' : true
			}
			let index = selectedPizza.findIndex(x => x.pizzaId === pizza.pizzaId);
			// console.log(index,pizza);
			if(index === -1){
				selectedPizza.push(pizza);
			}else{
				if(index === 0 && selectedPizza.length === 0){
					pizza.pizzaSize = 'Please select size';
					pizza.is_selected = true
					selectedPizza.splice(index,1);
				}else {
					pizza.is_selected =true;
					selectedPizza.splice(index,1);
					selectedPizza.push(pizza);
				}
			}

			$('#selected-size').html(pizza.pizzaSize + ' selected');
			// $(this).toggleClass('item-selected', pizza.is_selected);
			calculatePizzaTotal(this);
			console.log(index ,pizza.is_selected, selectedPizza);
		});


		$('.pizza-quantity input').change(function () {
			let quantity = $(this).closest('.pizza-quantity').find('.quantity_val').val();
			calculatePizzaTotal(this);
			// console.log(quantity);
		})

		$('.btn-customize-pizza button').click( function() {

			if (selectedPizza.length < 1) {
				alert('Please select pizza size');
			} else {
				let quantity = $('.quantity_val').val();
				let url = "http://localhost/2017296/PizzaNow/cart/addToCart"

				let item = {
					'type' : 'PIZZA',
					'id': selectedPizza[0].pizzaId,
					'name': selectedPizza[0].pizzaName,
					'description': selectedPizza[0].pizzaDescription,
					'imgUrl': selectedPizza[0].pizzaImgUrl,
					'price': selectedPizza[0].pizzaPrice,
					'size' : selectedPizza[0].pizzaSize,
					'selectedTopping': selectedTopping,
					'qty': quantity,
					'total': total,
				}
				console.log(item);
				$.ajax({
					url: url,
					method: "POST",
					data: item,
					success: function (data) {
						window.location = '/2017296/PizzaNow/cart';
					},
					error: function (response) {
						console.log(response);
					}
				})
			}
		});

		function calculatePizzaTotal(){
			let toppingPrice = selectedTopping.map(x => parseFloat(x.toppingPrice));
			let pizzaPrice = selectedPizza.map(x => parseFloat(x.pizzaPrice));
			let totTopping = toppingPrice.reduce((a,b) => a + b, 0);
			let totPizza = pizzaPrice.reduce((a,b) => a + b, 0);
			let quantity = $('.quantity_val').val();

			total = (totTopping + totPizza) * parseInt(quantity);
			console.log(total , parseInt(quantity));
			$('.total-value').html(total.toFixed(2));
		}
	})
</script>
