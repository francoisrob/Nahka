<div class="head">
	<h1 class="headertext">NAHKA</h1>
</div>
<section class="content">
	<div class="container">
		<h2 style="width: -moz-available;font-size: 2rem; margin: 0; width: fill-width;">Featured
			Products</h2>
		<div class="products">
			<?php foreach ($products as $product) { ?>
				<a href="<?php echo str_replace('{id}', $product['id'], $routes->get('product')->getPath()) ?>"
					style="text-decoration: none; color: black;" class="product">
					<div class="product_image_container">
						<div class="lds-ring">
							<div></div>
							<div></div>
							<div></div>
							<div></div>
						</div>
						<img class="product_image" src="<?php echo $product['image'] ?>">
					</div>
					<h3>
						<?php echo $product['product_name'] ?>
					</h3>
					<p>R
						<?php echo $product['price'] ?>
					</p>
				</a>
			<?php } ?>
		</div>
	</div>
</section>