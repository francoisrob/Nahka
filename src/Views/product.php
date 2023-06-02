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
            <div style="display: flex; flex-direction: row;align-self: flex-end;">
                <p style="font-weight: bold;">
                    R
                    <?php echo $product->getPrice() ?>
                </p>
                <button type="submit" onclick="addToCart(<?php echo $product->getId() ?>)">Add to cart</button>
            </div>
        </div>
</section>
<script>
    function addToCart(productId) {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "/cart/add", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.onload = function () {
            if (this.status == 200) {
                // alert('Product added to cart');
                // var response = JSON.parse(this.responseText);
                // if (response.status == 'success') {
                //     alert('Product added to cart');
                // } else {
                //     alert('Error adding product to cart');
                // }
            }
        }
        xhttp.send("product_id=" + encodeURIComponent(productId));
    }
</script>