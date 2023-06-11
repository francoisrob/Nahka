<?php
function displayCart($item, $product, $cartItems, $count)
{
	$product = $cartItems[$count];
	?>
	<div class="cartItem">
		<div class="cartImage_container">
			<img style="height: 10rem; width: 100%; object-fit: contain;" src="<?php echo $product['image'] ?>" alt="">
		</div>
		<div class="cartItem_details">
			<h3 style="padding:.5rem; margin:0.5rem; flex-grow:1; text-align:left;">
				<?php echo $product['product_name'] ?>
		</h3>
		<div style="padding: .5rem; display: flex; flex-direction:column;text-align:right; justify-content:end;">
			<p style="margin:0.1rem">
				<b>Price:</b> R
					<?php echo $product['price'] ?>
			</p>
			<p style="margin:0.1rem">
				<b>Amount:</b>
					<?php echo $item["amount"] ?>
			</p>
		</div>
	</div>
</div>
<hr style="width: 99%; margin: 0;">
<?php }
?>
<section class="content">
	<div class="cartpage">
		<h1 style="padding:1rem; margin:0;text-align:center;">Cart</h1>
		<div class="cart_container">
			<div class="cart_items">
				<hr style="width: 99%; margin: 0;">
				<?php if ($cart) {
					$count = 0;
					$total = 0;
					foreach ($cart as $item) {
						$total += $item['amount'] * $cartItems[$count]['price'];
						displayCart($item, $product, $cartItems, $count++);
					}
				} else { ?>
				Your cart is empty!
				<?php } ?>
			</div>
			<div class="cart_actions">
				<?php if ($cart) { ?>
				<h2 style="margin-bottom: 0;">Actions</h2>
				<p><b>Total:</b> R
						<?php
						echo number_format($total, 2, '.', ',');
						?>
				</p>
				<div id="cart-message"></div>
				<div class="cartActions">
					<button class="clear_button" onclick="clearCart()">Clear Cart</button>
					<button class="checkout_button" onclick="checkout()">Checkout</button>
				</div>
				<?php } else { ?>
				<h2 style="margin-bottom: 0;">Actions</h2>
				<a href="<?= $routes->get('homepage')->getPath() ?>">Continue Shopping</a>
				<?php } ?>
			</div>
		</div>
	</div>
	</div>
</section>

<script>
	function checkout() {
		button = document.querySelector('.checkout_button')
		button.disabled = true;
		button.style.pointerEvents = 'none';
		const cartItems = document.querySelectorAll('.cart_items > div');
		const items = [];
		var message = document.getElementById('cart-message');
		message.innerHTML = 'Please wait...';
		cartItems.forEach(item => {
			const name = item.querySelector('h3').textContent.trim();
			const price = item.querySelector('p:first-of-type').textContent.replace('Price: R', '').trim();
			const amount = item.querySelector('p:last-of-type').textContent.replace('Amount:', '').trim();
			items.push([name, price, amount]);
		});
		const xhr = new XMLHttpRequest();
		xhr.open('POST', '/cart/checkout', true);
		xhr.setRequestHeader('Content-Type', 'application/json');
		xhr.onload = function () {
			if (this.status == 200) {
				message.innerHTML = 'Your order has been processed successfully!</br> Redirecting...';
				message.style.color = 'green';
				// reditrect after 3 seconds
				setTimeout(function () {
					window.location.href = '<?= $routes->get('homepage')->getPath() ?>';
				}, 3000);
			} else {
				document.querySelector('.checkout_button').disabled = false;
				message.innerHTML = 'There was an error processing your order. Please try again later.';
				message.style.color = 'red';
			}
			button.disabled = false;
			button.style.pointerEvents = 'auto';
		};
		xhr.send(JSON.stringify(items));
	}

	function clearCart() {
		const xhr = new XMLHttpRequest();
		xhr.open('POST', '/cart/clear', true);
		xhr.setRequestHeader('Content-Type', 'application/json');
		xhr.onload = function () {
			if (this.status == 200) {
				var message = document.getElementById('cart-message');
				message.innerHTML = 'Your cart has been cleared!';
				message.style.color = 'green';
				var itemContainer = document.querySelector('.cart_items');
				itemContainer.innerHTML = 'Your cart is empty!';
				var actions = document.querySelector('.cart_actions');
				actions.innerHTML = '<h2 style="margin-bottom: 0;">Actions</h2><a href="<?= $routes->get('homepage')->getPath() ?>">Continue Shopping</a>';
			} else {
				var message = document.getElementById('cart-message');
				message.innerHTML = 'There was an error clearing your cart. Please try again later.';
				message.style.color = 'red';
			}
		};
		xhr.send();
	}

</script>