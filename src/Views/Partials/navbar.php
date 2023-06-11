<?php
try {
    var_dump($_SESSION);
    echo "</br>Connection success:". unserialize($_SESSION['user']);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<div class="topnav">
    <a href="/">Home</a>
    <?php if (isset($_SESSION['user'])): ?>
        <a href="/cart">Cart</a>
        <a href="/logout">Logout</a>
    <?php else: ?>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
    <?php endif; ?>
</div>