<?php require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/config/config.php';
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Nahka Handmade Leather">
    <meta name="author" content="Francois Robbertze">
    <link rel="icon" href="/Assets/favicon.svg" type="image/svg+xml">
    <title>Nahka</title>
    <link rel="stylesheet" href="/css/style.css">
    <script>0</script>
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