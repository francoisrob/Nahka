<section class="content">
	<div class="cartpage">
		<h1 style="padding:1rem; margin:0;text-align:center;">Cart</h1>
		<div class="cart_container">
			<div class="cart_items">
				<?php if ($cart) {
					$total = 0;
					foreach ($cart as $item) {
						$product = $product->getProduct($item['product_id']);
						$total += $product->getPrice() * $item['amount'];
						?>
						<div class="cartItem">
							<div class="cartImage_container">
								<img style="height: 10rem; width: 100%; object-fit: contain;"
									src="<?php echo $product->getImage() ?>" alt="">
							</div>
							<div class="cartItem_details">
								<h2 style="flex-grow:1;">
									<?php echo $product->getProduct_name() ?>
								</h2>
								<div style="padding: 1rem;">
									<p>
										Price: R
										<?php echo $product->getPrice() ?>
									</p>
									<p>
										Amount
										<?php echo $item["amount"] ?>
									</p>
								</div>
							</div>
						</div>
					<?php }
				} else { ?>
					Your cart is empty!
				<?php } ?>
			</div>
			<div class="cart_actions">
				<?php if ($cart) { ?>
					<h2 style="margin-bottom: 0;">Actions</h2>
					<p>Total: R
						<?php echo $total ?>
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
		const cartItems = document.querySelectorAll('.cart_items > div');
		const items = [];
		cartItems.forEach(item => {
			const name = item.querySelector('h2').textContent;
			const price = item.querySelector('p:first-of-type').textContent.replace('Price: R', '');
			const amount = item.querySelector('p:last-of-type').textContent.replace('Amount', '');
			items.push({ name, price, amount });
		});

		const xhr = new XMLHttpRequest();
		xhr.open('POST', '/cart/checkout', true);
		xhr.setRequestHeader('Content-Type', 'application/json');
		xhr.onload = function () {
			if (this.status == 200) {
				var message = document.getElementById('cart-message');
				message.innerHTML = 'Your order has been processed successfully!';
				message.style.color = 'green';
			} else {
				var message = document.getElementById('cart-message');
				message.innerHTML = 'There was an error processing your order. Please try again later.';
				message.style.color = 'red';
			}
		};
		xhr.send(JSON.stringify(items),1,1);
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
				actions.innerHTML = '<h2 style="margin-bottom: 0;">Actions</h2><a href="/product">Continue Shopping</a>';
			} else {
				var message = document.getElementById('cart-message');
				message.innerHTML = 'There was an error clearing your cart. Please try again later.';
				message.style.color = 'red';
			}
		};
		xhr.send();
	}

</script>