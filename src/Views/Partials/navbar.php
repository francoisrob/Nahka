<div class="topnav">
    <?php if (isset($_SESSION['user'])): ?>
        <a href="<?= $routes->get('homepage')->getPath() ?>">Home</a>
        <a href="<?= $routes->get('cart')->getPath() ?>">Cart</a>
        <a href="<?= $routes->get('logout')->getPath() ?>">Logout</a>
    <?php else: ?>
        <a href="<?= $routes->get('homepage')->getPath() ?>">Home</a>
        <a href="<?= $routes->get('login')->getPath() ?>">Login</a>
        <a href="<?= $routes->get('register')->getPath() ?>">Register</a>
    <?php endif; ?>
</div>