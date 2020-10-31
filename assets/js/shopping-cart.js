$(document).ready(function() {

	/* Set rates + misc */
	let taxRate = 0.05;
	let shippingRate = 15.00;
	let fadeTime = 300;

	/* Assign actions */
	$('.product-quantity input').change( function() {
		let quantity = $(this).closest('.product-quantity').find('.quantity_val').val();
		let id = $(this).closest('.product-quantity').find('.item_id_val').val();
		let url = "http://localhost/2017296/PizzaNow/cart/addQuantity"

		$.ajax({
			url: url,
			method: "POST",
			dataType: "json",
			data: {
				'id': id,
				'quantity': quantity
			},
			success: function(response) {
				console.log(response.data());
				updateQuantity(this);
			},
			error: function(response) {
				console.log(response);
			}
		})
		updateQuantity(this);
	});

	$('.product-removal button').click( function() {
		let id = $(this).data("id");
		let url = "http://localhost/2017296/PizzaNow/cart/removeItem"
		$.ajax({
			url: url,
			method: "POST",
			dataType: "json",
			data: id,
			success: function(response) {
				console.log(response.data);
			},
			error: function(response) {
				console.log(response.data);
			}
		})
		removeItem(this);
	});

	$('.btn-customize-mobile button').click( function() {

		let sideID = $(this).data("side_id");
		let sideName = $(this).data("side_name");
		let sideDescription = $(this).data("side_description");
		let sideImgURL = $(this).data("side_img_url");
		let sidePrice = $(this).data("side_price");
		let sideQty = $(this).data("side_qty");
		let url = "http://localhost/2017296/PizzaNow/cart/addToCart"

		let item = {
			'sideID' :sideID,
			'sideName' :sideName,
			'sideDescription' :sideDescription,
			'sideImgURL' :sideImgURL,
			'sidePrice' :sidePrice,
			'sideQty' :sideQty,
		}
		console.log(item);
		$.ajax({
			url: url,
			method: "POST",
			dataType: "json",
			data: item,
			success: function(response) {
				console.log(response);
			},
			error: function(response) {
				console.log(response);
			}
		})
	});

	/* Recalculate cart */
	function recalculateCart()
	{
		let subtotal = 0;

		/* Sum up row totals */
		$('.product').each(function () {
			subtotal += parseFloat($(this).children('.product-line-price').text());
		});

		/* Calculate totals */
		// let tax = subtotal * taxRate;
		// let shipping = (subtotal > 0 ? shippingRate : 0);
		let total = subtotal ;
			// + tax + shipping;

		/* Update totals display */
		$('.totals-value').fadeOut(fadeTime, function() {
			$('#cart-subtotal').html(subtotal.toFixed(2));
			// $('#cart-tax').html(tax.toFixed(2));
			// $('#cart-shipping').html(shipping.toFixed(2));
			// $('#cart-total').html(total.toFixed(2));
			if(total === 0){
				$('.checkout').fadeOut(fadeTime);
			}else{
				$('.checkout').fadeIn(fadeTime);
			}
			$('.totals-value').fadeIn(fadeTime);
		});
	}


	/* Update quantity */
	function updateQuantity(quantityInput)
	{
		/* Calculate line price */
		let productRow = $(quantityInput).parent().parent();
		let price = parseFloat(productRow.children('.product-price').text());
		let quantity = $(quantityInput).val();
		let linePrice = price * quantity;
		console.log('quantity ..' , quantity)
		/* Update line price display and recalc cart totals */
		productRow.children('.product-line-price').each(function () {
			$(this).fadeOut(fadeTime, function() {
				$(this).text(linePrice.toFixed(2));
				recalculateCart();
				$(this).fadeIn(fadeTime);
			});
		});
	}


	/* Remove item from cart */
	function removeItem(removeButton)
	{
		/* Remove row from DOM and recalc cart total */
		let productRow = $(removeButton).parent().parent();
		productRow.slideUp(fadeTime, function() {
			productRow.remove();
			recalculateCart();
		});
	}

	function addToCart(addToCartButton){
		let productRow = $(addToCartButton).parent().parent();
	}
});
