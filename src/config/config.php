<?php
// Check if .env file exists
try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();
} catch (Exception $e) {
}

// URL
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$domain = $_SERVER['HTTP_HOST'];
$urlRoot = $protocol . '://' . $domain . $_ENV['URL_ROOT'];
define('URL_ROOT', $urlRoot);
define('URL_SUBFOLDER', $_ENV['URL_SUBFOLDER']);

// Database
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASS', $_ENV['DB_PASS']);
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_PORT', $_ENV['DB_PORT']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_SSL', $_ENV['DB_SSL']);

# Mailer
define("SMTP_USERNAME", $_ENV['SMTP_USERNAME']);
define("SMTP_PASSWORD", $_ENV['SMTP_PASSWORD']);
define("SMTP_HOST", $_ENV['SMTP_HOST']);
define("SMTP_PORT", $_ENV['SMTP_PORT']);
define("SMTP_ENCRYPTION", $_ENV['SMTP_ENCRYPTION']);
define("SMTP_FROM", $_ENV['SMTP_FROM']);
define("SMTP_FROM_NAME", $_ENV['SMTP_FROM_NAME']);