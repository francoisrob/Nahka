<section class="content">
	<h1>Homepage</h1>
	<p>
		<a href="<?php echo $routeToProduct ?>">Check the first product</a>
	</p>
	<?php
	if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
		$db = new \App\Models\Database();
		$db->query('SELECT * FROM products');
		$products = $db->resultSet();
		?>
		<h2>Products</h2>
		<div class="container">
			<div class="products">
				<?php
				foreach ($products as $product) {
					echo '<div class="product">';
					echo '<div class="product_image_container">';
					echo '<img class="product_image" src=' . $product['image'] . '>';
					echo '</div>';
					echo '<h3>' . $product['product_name'] . '</h3>';
					echo '<p>R' . $product['price'] . '</p>';
					echo '</div>';
				}
				echo '</div>';
				echo '</div>';
	}
	?>
</section>