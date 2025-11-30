<?php

session_start();

if (!isset($_SESSION['role'])) {
    header("Location: " . _APP_URL . "?action=login");
    exit();
}
?>