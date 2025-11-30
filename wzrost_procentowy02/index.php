<?php

define('_ROOT_PATH', dirname(__FILE__));
define('_APP_URL', 'http://localhost/app/');

include _ROOT_PATH . '/config.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'login';
}

switch ($action) {
    case 'login':
        include _ROOT_PATH . '/app/security/login.php';
        break;
    case 'logout':
        include _ROOT_PATH . '/app/security/logout.php';
        break;
    case 'calc':
        include _ROOT_PATH . '/app/security/check.php';
        include _ROOT_PATH . '/app/calc.php';
        break;
    case 'inna':
        include _ROOT_PATH . '/app/security/check.php';
        include _ROOT_PATH . '/app/inna_chroniona.php';
        break;
    default:
        include _ROOT_PATH . '/app/security/login.php';
}
?>