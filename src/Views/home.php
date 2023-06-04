<?php
function displayProduct($product, $routes)
{
	$productLink = str_replace('{id}', $product['id'], $routes->get('product')->getPath());
	$productName = $product['product_name'];
	$productPrice = $product['price'];
	$productImage = $product['image'];
	?>
	<a href="<?php echo $productLink ?>" class="product">
		<div class="product_image_container">
			<div class="lds-ring">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
			<img class="product_image" src="<?php echo $productImage ?>">
		</div>
		<div class="productDescription">
			<h3 style="margin:0;">
				<?php echo $productName ?>
			</h3 style="text-align:right;">
			<p style="margin:0; text-align:right;">R
				<?php echo $productPrice ?>
			</p>
		</div>
	</a>
	<?php
}

?>
<div class="head">
	<h1 class="headertext">NAHKA</h1>
</div>
<section class="content">
	<div class="container">
		<?php if (!empty($featuredProducts)) { ?>
			<h2 style="font-size: 2rem; margin:1rem">Featured Products</h2>
			<div class="products">
				<?php foreach ($featuredProducts as $product) { ?>
					<?php displayProduct($product, $routes); ?>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
	<div class="container">
		<?php if (!empty($products) && isset($_SESSION['user'])) { ?>
			<h2 style="font-size: 2rem; margin:1rem">All Products</h2>
			<div class="products">
				<?php foreach ($products as $product) { ?>
					<?php displayProduct($product, $routes); ?>
				<?php } ?>
			</div>
		<?php } ?>
</section>