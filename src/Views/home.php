<section class="content">
	<h1>Homepage</h1>
	<p>
		<a href="<?php echo $routeToProduct ?>">Check the first product</a>
	</p>

	<?php
	// if logged in show products from databse neatly with inline css
	// if (isset($_SESSION["user_id"]))
	// {	
	// 	$db = new \App\Models\Database();
	// 	$db->query('SELECT * FROM products');
	// 	$products = $db->resultSet();

	// 	echo "<div style='display: flex; flex-wrap: wrap;'>";
	// 	foreach ($products as $product)
	// 	{
	// 		echo "<div style='border: 1px solid black; padding: 10px; margin: 10px;'>";
	// 		echo "<h3>" . $product["name"] . "</h3>";
	// 		echo "<p>" . $product["description"] . "</p>";
	// 		echo "<p>" . $product["price"] . "</p>";
	// 		echo "<a href='cart/add/" . $product["id"] . "'>Add to cart</a>";
	// 		echo "</div>";
	// 	}
	// 	echo "</div>";
	// }


	?>
</section>