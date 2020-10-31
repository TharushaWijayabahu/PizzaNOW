<h1 class="text-md-center text-sm-center text-lg-center">SIDES</h1>
<div class="menu-container row">
	<?php
	foreach ($sideItem as $item) { ?>
		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 itemContainer">
			<div class="itemBorder">
				<div class="box">
					<div class="row">
						<div class="col-md-12 col-sm-5 col-xs-5 itemImageContainer">
							<!--					<div class="col-xs-12 col-sm-6 col-md-4 itemImageContainer">-->
							<div class="itemImage">
								<a href="#">
									<img
										src="<?php echo base_url() . $item->side_img_url; ?>"
										alt="<?php echo $item->side_name; ?>" class="data-gtag-item-image">
								</a>
							</div>
						</div>
						<div class="col-md-12 col-sm-7 col-xs-7 itemDetailContainer">
							<div class="hidden-md hidden-lg"></div>

							<div class="row">
								<div class="col-md-12">
									<h3 class="menu-item-name hidden-sm hidden-xs text-center"
										title="<?php echo $item->side_name; ?>" data-toggle="tooltip"
										data-original-title="<?php echo $item->side_name; ?>">
										<?php echo $item->side_name; ?> </h3>

									<p class="hidden-xs hidden-sm menu-item-desc text-left"
									   title="<?php echo $item->side_description; ?>"
									   data-toggle="tooltip"
									   data-original-title="<?php echo $item->side_description; ?>">
										<?php echo $item->side_description; ?></p>
								</div>
							</div>

							<div class="menu-price-container-parent-not">
								<div class="menu-price-container-parent">
                                    <span class="font-family1">
                                        <span"> Starting from </span>
									<span style="font-weight:bold;"> Rs <?php echo $item->side_price; ?></span>
									<div class="btn-customize-mobile">
									<button class="btn btn-success btn-block"
											data-side_id="<?php echo $item->side_id; ?>"
											data-side_name="<?php echo $item->side_name; ?>"
											data-side_description="<?php echo $item->side_description; ?>"
											data-side_img_url="<?php echo $item->side_img_url; ?>"
											data-side_price="<?php echo $item->side_price; ?>"
											data-url="<?php echo base_url()."side/addToCart" ?>"
											data-side_qty=1> Add to cart
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
