<section class="footer">
    <?php
    if (isset($_SESSION['error'])) {
        echo '<div style="color: white; background-color:red;padding:1rem; font-size: 1rem; text-align: center;">' . ($_SESSION['error'] ?? '') . '</div>';
    }
    ?>
    <img src="https://nahka.fra1.cdn.digitaloceanspaces.com/full_icon.svg" alt="full icon" height="100rem">
    <div class="footer-text">
        <p>© 2023 Nahka. All rights reserved.</p>
        <p>Terms of Service</p>
        <p>Privacy Policy</p>
        <a href="https://storyset.com/web"
            style="text-decoration: none; color: white; font-size: 0.8rem; margin-top: 1rem;">Storyset</a>
    </div>
</section>
<?php
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
?>