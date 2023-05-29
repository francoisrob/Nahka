<?php
if (file_exists(__DIR__ . '/../../.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();
    $dotenv->required(['URL_ROOT', 'URL_SUBFOLDER', 'DB_HOST', 'DB_USER', 'DB_PASS', 'DB_NAME']);
    define('SITE_NAME', 'Nahka');

    define('APP_ROOT', dirname(dirname(__FILE__)) . '/');

    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $domain = $_SERVER['HTTP_HOST'];
    $urlRoot = $protocol . '://' . $domain . $_ENV['URL_ROOT'];
    define('URL_ROOT', $urlRoot);
    define('URL_SUBFOLDER', $_ENV['URL_SUBFOLDER']);

    define('DB_USER', $_ENV['DB_USER']);
    define('DB_PASS', $_ENV['DB_PASS']);
    define('DB_HOST', $_ENV['DB_HOST']);
    define('DB_PORT', $_ENV['DB_PORT']);
    define('DB_NAME', $_ENV['DB_NAME']);
    define('DB_SSL', $_ENV['DB_SSL']);
} else {
    $_SESSION['error'] = 'Please create .env file';
}