<?php

function getParamsLogin(&$form) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $form['login'] = isset($_POST['login']) ? trim($_POST['login']) : '';
        $form['pass'] = isset($_POST['pass']) ? trim($_POST['pass']) : '';
    }
}

function validateLogin(&$form, &$messages) {
    if (strlen($form['login']) == 0 || strlen($form['pass']) == 0) {
        $messages[] = 'Uzupełnij login i hasło';
        return false;
    }

    if ($form['login'] == "admin" && $form['pass'] == "admin") {
        session_start();
        $_SESSION['role'] = 'admin';
        return true;
    }

    if ($form['login'] == "user" && $form['pass'] == "user") {
        session_start();
        $_SESSION['role'] = 'user';
        return true;
    }

    $messages[] = 'Niepoprawny login lub hasło';
    return false;
}

$form = array();
$messages = array();

getParamsLogin($form);

if (!validateLogin($form, $messages)) {
    include _ROOT_PATH . '/app/security/login_view.php';
} else {
    header("Location: " . _APP_URL . "?action=calc");
    exit();
}
?>