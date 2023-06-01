<section class="content">
    <div class="productpage">
        <div class="image_container">
            <img class="productImage" src="<?php echo $product->getImage() ?>" alt="product image">
        </div>
        <div class="product_details">
            <h1 style="text-align: center; margin-bottom: 0;">
                <?php echo $product->getProduct_name() ?>
            </h1>
            <p class="product_description">
                <?php echo $product->getProduct_Description() ?>
            </p>
            <!-- align price and cart to bottom and flex align rows -->
            <div style="display: flex; flex-direction: row;align-self: flex-end;">
                <p style="font-weight: bold;">
                    R
                    <?php echo $product->getPrice() ?>
                </p>
                <button type="submit" onclick="">Add to cart</button>
            </div>
        </div>
</section>