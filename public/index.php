<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Nahka - Leather</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Discover a world of exquisite craftsmanship and timeless style at Nahka. We offer a wide range of premium leather products, handcrafted with precision and passion. From luxurious bags and wallets to stylish accessories, our collection is curated to elevate your everyday style. Experience the unmatched elegance of genuine leather that combines durability with unmatched sophistication. Shop now and indulge in the art of leather craftsmanship.">
    <meta property="og:url" content="https://nahka.studio/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Nahka - Leather">
    <meta property="og:description"
        content="Discover a world of exquisite craftsmanship and timeless style at Nahka. We offer a wide range of premium leather products, handcrafted with precision and passion. From luxurious bags and wallets to stylish accessories, our collection is curated to elevate your everyday style. Experience the unmatched elegance of genuine leather that combines durability with unmatched sophistication. Shop now and indulge in the art of leather craftsmanship.">
    <meta property="og:image" content="https://nahka.studio/Assets/ogimage.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="nahka.studio">
    <meta property="twitter:url" content="https://nahka.studio/">
    <meta name="twitter:title" content="Nahka - Leather">
    <meta name="twitter:description"
        content="Discover a world of exquisite craftsmanship and timeless style at Nahka. We offer a wide range of premium leather products, handcrafted with precision and passion. From luxurious bags and wallets to stylish accessories, our collection is curated to elevate your everyday style. Experience the unmatched elegance of genuine leather that combines durability with unmatched sophistication. Shop now and indulge in the art of leather craftsmanship.">
    <meta name="twitter:image" content="https://nahka.studio/Assets/ogimage.png">
    <meta name="author" content="Francois Robbertze">
    <link rel="stylesheet" href="/css/style.css">
    <script>0</script>
</head>
<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/config/config.php';
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once __DIR__ . "/../src/routes/web.php";

include_once "../src/Views/Partials/navbar.php";

require_once '../src/Router.php';

include_once "../src/Views/Partials/footer.php";