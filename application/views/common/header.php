<?php
defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Register</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.css">
		<!--		<link rel="stylesheet" href="--><?php //echo base_url(); ?><!--/assets/css/font-awesome.min.css">-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/common.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/shopping-cart.css">
		<script src="<?php echo base_url(); ?>/assets/js/jquery-3.5.1.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/shopping-cart.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>


	</head>

	<body>
		<header>
			<nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-light fixed-top">
				<div class="container body-container">
					<a class="navbar-brand d-flex align-items-center" href="<?php echo base_url(); ?>index.php/menu">
						<svg width="40px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
							 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
							 style="enable-background:new 0 0 512 512;" xml:space="preserve">

							<img src="<?php echo base_url(); ?>/assets/img/logo-1.png" class="img-fluid logo"
								 alt="Pizza now">
						</svg>
						<span class="ml-3 font-weight-bold">PIZZA NOW</Span>
					</a>

					<div class="collapse navbar-collapse" id="navbar4">
						<ul class="navbar-nav mr-auto pl-lg-4">
							<li class="nav-item px-lg-2 active"><a class="nav-link"
																   href="<?php echo base_url(); ?>index.php/menu/pizza">
									<span class="d-inline-block d-lg-none icon-width">
										<i class="fas fa-pizza-slice"></i></span>PIZZA</a>
							</li>
							<li class="nav-item px-lg-2"><a class="nav-link"
															href="<?php echo base_url(); ?>index.php/menu/side">
									<span class="d-inline-block d-lg-none icon-width">
										<i class="fa fa-cutlery" aria-hidden="true"></i></span>SIDES</a>
							</li>
							<li class="nav-item px-lg-2"><a class="nav-link"
															href="<?php echo base_url(); ?>index.php/menu/specialDeal"">
									<span class="d-inline-block d-lg-none icon-width">
										<i class="fa fa-cutlery" aria-hidden="true"></i></span>SPECIAL DEALS</a></li>

							<li class="nav-item px-lg-2"><a class="nav-link"
															href="<?php echo base_url(); ?>index.php/menu/drink">
									<span class="d-inline-block d-lg-none icon-width">
										<i class="fa fa-glass" aria-hidden="true"></i></span>DRINKS</a></li>
						</ul>
					</div>
					<div class="row">
						<div class="container">
							<ul class="nav-account d-flex">
								<li>
								<?php if (isset($itemList)) { ?>
									<a href="<?php echo base_url(); ?>index.php/cart" class="round-icon-btn text-left cart-nav"
									   title=""
									   data-toggle="tooltip" data-placement="left" data-original-title="Your Basket">
										<i class="fa fa-shopping-basket" aria-hidden="true"></i>
										<label class="cart-items cart-item-count"
											   style="background-color: rgb(255, 0, 0);"><?php echo count($itemList);?></label>
									</a>
								<?php }else{ ?>
									<a href="<?php echo base_url(); ?>index.php/cart" class="round-icon-btn text-left cart-nav"
									   title=""
									   data-toggle="tooltip" data-placement="left" data-original-title="Your Basket">
										<i class="fa fa-shopping-basket" aria-hidden="true"></i>
										<label class="cart-items cart-item-count">0</label>
									</a>
									<?php } ?>
								</li>
								<li>
									<a href="<?php echo base_url(); ?>index.php/register" class="round-icon-btn shared-04"
									   data-toggle="tooltip" title="" data-placement="left"
									   data-original-title="My Account">
										<i class="fa fa-user-circle-o" aria-hidden="true"></i>
										Sign In/Register
									</a>
								</li>
							</ul>
						</div>
					</div>
					<button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse"
							data-target="#navbar4">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
			</nav>
		</header>
		<div class="container top">
