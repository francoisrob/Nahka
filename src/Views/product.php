<section class="content">
	<h1>My Product:</h1>
	<ul>
		<li>
			<?php echo $product->getTitle(); ?>
		</li>
		<li>
			<?php echo $product->getDescription(); ?>
		</li>
		<li>
			<?php echo $product->getPrice(); ?>
		</li>
		<li>
			<?php echo $product->getSku(); ?>
		</li>
		<li>
			<?php echo $product->getImage(); ?>
		</li>
	</ul>
</section>