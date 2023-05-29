<?php require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/config/config.php';
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Nahka - Leather</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Discover a world of exquisite craftsmanship and timeless style at Nahka. We offer a wide range of premium leather products, handcrafted with precision and passion. From luxurious bags and wallets to stylish accessories, our collection is curated to elevate your everyday style. Experience the unmatched elegance of genuine leather that combines durability with unmatched sophistication. Shop now and indulge in the art of leather craftsmanship.">
    <meta name="author" content="Francois Robbertze">
    <link rel="icon" href="/Assets/favicon.svg" type="image/svg+xml">
    <meta property="og:title" content="Nahka - Finest Leather Products">
    <meta property="og:description" content="Discover a world of exquisite craftsmanship and timeless style at Nahka. We offer a wide range of premium leather products, handcrafted with precision and passion. From luxurious bags and wallets to stylish accessories, our collection is curated to elevate your everyday style. Experience the unmatched elegance of genuine leather that combines durability with unmatched sophistication. Shop now and indulge in the art of leather craftsmanship.">
    <meta property="og:image" content="/Assets/nahka_border.svg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="https://www.nahka.com">
    <link rel="stylesheet" href="/css/style.css">
</head>
<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once __DIR__ . "/../src/routes/web.php";

include_once "../src/Views/Partials/navbar.php";

require_once '../src/Router.php';

include_once "../src/Views/Partials/footer.php";