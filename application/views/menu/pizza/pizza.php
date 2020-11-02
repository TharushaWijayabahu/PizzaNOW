<h1 class="text-md-center text-sm-center text-lg-center">PIZZA</h1>
<div class="menu-container row">
	<?php
	foreach ($pizzaItem as $item) {?>
		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 itemContainer">
			<div class="itemBorder">
				<div class="box">
					<div class="row">
						<div class="col-md-12 col-sm-5 col-xs-5 itemImageContainer">
							<div class="itemImage">
								<a href="<?php echo base_url().'menu/pizzaCustomize/'. $item->pizza_id;?>">
									<img
											src="<?php echo base_url(). $item->pizza_img_url; ?>"
											alt="<?php echo $item->pizza_name; ?>" class="data-gtag-item-image">
								</a>
							</div>
						</div>
						<div class="col-md-12 col-sm-7 col-xs-7 itemDetailContainer">
							<div class="hidden-md hidden-lg"></div>

							<div class="row">
								<div class="col-md-12">
									<h3 class="menu-item-name hidden-sm hidden-xs text-center"
										title="<?php echo $item->pizza_name;?>" data-toggle="tooltip"
										data-original-title="<?php echo $item->pizza_name;?>">
										<?php echo $item->pizza_name; ?> </h3>

									<p class="hidden-xs hidden-sm menu-item-desc text-left"
									   title="<?php echo $item->pizza_description;?>"
									   data-toggle="tooltip"
									   data-original-title="<?php echo $item->pizza_description;?>">
										<?php echo $item->pizza_description;?></p>
								</div>
							</div>

							<div class="menu-price-container-parent-not">
								<div class="menu-price-container-parent">
                                    <span class="font-family1">
                                        <span"> Starting from </span>
									<span style="font-weight:bold;"> Rs <?php echo $item->pizza_s_price;?></span>
									<a href="<?php echo base_url().'menu/pizzaCustomize/'. $item->pizza_id;?>"
									   class="btn btn-success btn-customize-mobile data-gtag-customize">
										Customize
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
