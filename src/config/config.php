<?php
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