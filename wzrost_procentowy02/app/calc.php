<?php

function getParams(&$form) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $form['stara'] = isset($_POST['stara']) ? trim($_POST['stara']) : '';
        $form['nowa'] = isset($_POST['nowa']) ? trim($_POST['nowa']) : '';
    }
}

function validate(&$form, &$messages) {
    if (empty($form['stara']) || empty($form['nowa'])) {
        $messages[] = 'Wypełnij wszystkie pola';
        return false;
    }

    if (!is_numeric($form['stara']) || !is_numeric($form['nowa'])) {
        $messages[] = 'Wartości muszą być liczbami';
        return false;
    }

    if ($form['stara'] == 0) {
        $messages[] = 'Wartość stara nie może być równa 0';
        return false;
    }

    return true;
}

function process($form, &$result) {
    $wzrost = (($form['nowa'] - $form['stara']) / $form['stara']) * 100;
    $result = round($wzrost, 2);
}

$form = array();
$messages = array();
$result = null;

getParams($form);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (validate($form, $messages)) {
        process($form, $result);
    }
}

include _ROOT_PATH . '/app/calc_view.php';
?>