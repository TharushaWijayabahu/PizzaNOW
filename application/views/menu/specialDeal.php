<h1 class="text-md-center text-sm-center text-lg-center">SPECIAL DEALS</h1>
<?php if (isset($specialItem)) { ?>
	<div class="menu-container row">
		<?php
		foreach ($specialItem as $item) { ?>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 itemContainer">
				<div class="itemBorder">
					<div class="box">
						<div class="row">
							<div class="col-md-12 col-sm-5 col-xs-5 itemImageContainer">
								<div class="itemImage">
									<img src="<?php echo base_url(). $item->sm_img_url; ?>"
										 alt="Lunch Time Large Pizza Offer" class="data-gtag-item-image-promo">
								</div>
							</div>
							<div class="col-md-12 col-sm-7 col-xs-7 itemDetailContainer">
								<div class="row">
									<div class="col-md-12 text-left">
										<div class="hidden-sm hidden-xs" style="height:10px;"></div>
										<h3 style="text-align:left;" class="menu-item-name" title="" data-toggle="tooltip"
											data-original-title="Lunch Time Large Pizza Offer">Lunch Time Large Pizza Offer
											<span style="float:right;" class="hidden-sm hidden-xs">
                                   </span>
										</h3>
										<p style="text-align:left;" class="menu-item-desc hidden-sm hidden-xs">
											<?php echo $item->sm_description; ?>
										</p>
									</div>
								</div>
								<div class="menu-price-container-parent-not">
									<div class="menu-price-container-parent">
                                    <span class="font-family1">
								<span style="font-weight:bold; font-size: 20px;"> Rs <?php echo $item->sm_price; ?></span>
								<div class="btn-customize-mobile">
									<button class="btn btn-success btn-block"
											data-type="SPECIAL DEAL"
											data-id="<?php echo $item->sm_id; ?>"
											data-name="<?php echo $item->sm_name; ?>"
											data-description="<?php echo $item->sm_description; ?>"
											data-img_url="<?php echo $item->sm_img_url; ?>"
											data-price="<?php echo $item->sm_price; ?>"
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
<?php } else { ?>
	<div class="container" style="min-height: 250px;">
		<p class="text-center">No items</p>
	</div>
<?php } ?>
