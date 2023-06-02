<?php
$id = unserialize($_SESSION['user']);
echo $id;

$db = new \App\Models\Database();
$db->query('SELECT cart FROM users WHERE id = :id');
$db->bind(':id', $id);
$result = $db->single();
?>
<section class="content">
	<div class="productpage">
		<div class="product_details" style="height:50vh; width:50vw;">
			<h1>Cart</h1>
			<div>
			</div>
		</div>
</section>