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
			// dataType: "json",
			data: {
				'id': id,
				'quantity': quantity
			},
			success: function() {
				location.reload();
			},
			error: function() {
				alert('please try again')
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
			data: id,
			success: function() {
				location.reload();
			},
			error: function() {
				alert('please try again')
			}
		})
		removeItem(this);
	});

	$('.btn-customize-mobile button').click( function() {

		let url = "http://localhost/2017296/PizzaNow/cart/addToCart";
		let item = {
			'type' : 'SIDE',
			'id' :$(this).data("side_id"),
			'name' :$(this).data("side_name"),
			'description' :$(this).data("side_description"),
			'imgUrl' :$(this).data("side_img_url"),
			'price' :$(this).data("side_price"),
			'qty' :$(this).data("side_qty"),
		}
		console.log(item);
		$.ajax({
			url: url,
			method: "POST",
			data: item,
			success: function() {
				window.location = '/2017296/PizzaNow/cart';
			},
			error: function() {
				alert('please try again');
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
