<?php
require_once dirname(__FILE__).'/../config.php';

$messages = array();
$stara = isset($_POST['stara']) ? trim($_POST['stara']) : null;
$nowa = isset($_POST['nowa']) ? trim($_POST['nowa']) : null;
$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	if ($stara === "") {
		$messages[] = 'Nie podano wartości starej';
	}
	if ($nowa === "") {
		$messages[] = 'Nie podano wartości nowej';
	}

	if (empty($messages)) {
		if (!is_numeric($stara)) {
			$messages[] = 'Wartość stara nie jest liczbą';
		}
		if (!is_numeric($nowa)) {
			$messages[] = 'Wartość nowa nie jest liczbą';
		}

		if (is_numeric($stara) && $stara == 0) {
			$messages[] = 'Wartość stara nie może być zerem';
		}
	}

	if (empty($messages)) {
		$stara = floatval($stara);
		$nowa = floatval($nowa);

		$result = (($nowa - $stara) / $stara) * 100;
	}

}


include _ROOT_PATH.'/app/calc_view.php';
