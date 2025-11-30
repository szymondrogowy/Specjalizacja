<?php

session_start();
session_destroy();

header("Location: " . _APP_URL . "?action=login");
exit();
?>