<?php
	if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
		header('Location: /login');
		exit();
	}
?>
<section class="content">
	<h1>Cart</h1>
	
</section>