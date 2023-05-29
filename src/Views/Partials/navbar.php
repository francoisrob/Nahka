<div class="topnav">
    <?php if (isset($_SESSION['user_id'])): ?>
        <?php echo '<p>' . $_SESSION['user_name'].'</p>'; ?>
        <a href="<?php echo $routes->get('homepage')->getPath(); ?>">
            Home
        </a>
        <a href="<?php echo $routes->get('cart')->getPath(); ?>">Cart</a>
        <a href="<?php echo $routes->get('logout')->getPath(); ?>">Logout</a>
    <?php else: ?>
        <a href="<?php echo $routes->get('homepage')->getPath(); ?>">
            Home
        </a>
        <a href="<?php echo $routes->get('login')->getPath(); ?>">Login</a>
        <a href="<?php echo $routes->get('register')->getPath(); ?>">Register</a>
    <?php endif; ?>
</div>