<h1 class="text-md-center text-sm-center text-lg-center">DRINKS</h1>
<div class="menu-container row">
	<?php
	foreach ($drinkItem as $item) { ?>
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 itemContainer">
		<div class="itemBorder">
			<div class="box">

				<div class="row">
					<div class="col-md-12 col-sm-5 col-xs-5 itemImageContainer">
						<div class="itemImage">

							<a href="#">
								<img src="<?php echo base_url() . $item->beverage_img_url; ?>"
										alt="<?php echo $item->beverage_name; ?>" class="data-gtag-item-image">
							</a>
						</div>
					</div>
					<div class="col-md-12 col-sm-7 col-xs-7 itemDetailContainer">
						<div style="height:10px;" class="hidden-md hidden-lg"></div>

						<div class="row">
							<div class="col-md-12">
								<h3 class="menu-item-name hidden-lg hidden-md"
									title="<?php echo $item->beverage_name; ?>" data-toggle="tooltip"
									data-original-title="<?php echo $item->beverage_name; ?>">
									<?php echo $item->beverage_name; ?></h3>

								<p class="hidden-xs hidden-sm menu-item-desc text-left"
								   title="<?php echo $item->beverage_description; ?>"
								   data-toggle="tooltip"
								   data-original-title="<?php echo $item->beverage_description; ?>">
									<?php echo $item->beverage_description; ?></p>
							</div>

						</div>


						<div class="menu-price-container-parent-not">
							<div class="menu-price-container-parent">
                                    <span class="font-family1">
								<span style="font-weight:bold;"> Rs <?php echo $item->beverage_price; ?></span>
								<div class="btn-customize-mobile">
									<button class="btn btn-success btn-block"
											data-type="DRINK"
											data-d="<?php echo $item->beverage_id; ?>"
											data-name="<?php echo $item->beverage_name; ?>"
											data-description="<?php echo $item->beverage_description; ?>"
											data-img_url="<?php echo $item->beverage_img_url; ?>"
											data-price="<?php echo $item->beverage_price; ?>"
											data-qty=1> Add to cart
									</button>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
