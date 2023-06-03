<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/config/config.php';
session_start();
require_once __DIR__ . "/../src/routes/web.php";

require_once '../src/Router.php';