<?php
// Określenie czy jest używany HTTPS
$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https://' : 'http://';

// Pobranie host i port z serwera
$server_name = $_SERVER['HTTP_HOST'] ?? 'localhost';

define('_SERVER_NAME', $server_name);
define('_SERVER_URL', $protocol._SERVER_NAME);
define('_APP_ROOT', '/php_01_widok_kontroler');
define('_APP_URL', _SERVER_URL._APP_ROOT);
define("_ROOT_PATH", dirname(__FILE__));

// Włączenie raportowania błędów (development)
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>