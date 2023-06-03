<section class="content">
	<div class="cartpage">
		<h1 style="padding:1rem; margin:0;">Cart</h1>
		<div style="display:flex;flex-direction:row;width:100%;flex-grow:1;">
			<div class="cart_items">
				<?php if ($cart) {
					foreach ($cart as $item) {
						$product = $product->getProduct($item['product_id']);
						?>
						<div
							style="display: flex; flex-direction: row; width: 100%; border: 1px solid black; background-color:white; border-radius:.5rem; padding:0.2rem">
							<div style="height: 10rem; width: 10rem; background-color:white; width:30%;">
								<img style="height: 100%; width: 100%; object-fit: contain;"
									src="<?php echo $product->getImage() ?>" alt="">
							</div>
							<h2 style="width:50%;">
								<?php echo $product->getProduct_name() ?>
							</h2>
							<div style="width:20%; display:flex; flex-direction:column; justify-content:center;">
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
					<?php }
				} else { ?>
					Your cart is empty!
				<?php } ?>
			</div>
			<div style="gap:.5rem;" 
			class="cart_actions">
				<h2>Actions</h2>
				<?php if ($cart) { ?>
					<div id="cart-message"></div>
					<div style="display: flex; flex-direction: column; width: 100%;align-items:center;gap:.7rem;">
						<button class="clear_button" onclick="clearCart()">Clear Cart</button>
						<button class="checkout_button" onclick="checkout()">Checkout</button>
					</div>
				<?php } else { ?>
					<a href="<?= $routes->get('homepage')->getPath() ?>">Continue Shopping</a>
				<?php } ?>
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
		xhr.send(JSON.stringify(items));
	}
</script>