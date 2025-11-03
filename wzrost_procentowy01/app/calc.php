<?php
// KONTROLER strony kalkulatora wzrostu procentowego
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów i inicjalizacja zmiennych
$messages = array();
$stara = isset($_POST['stara']) ? trim($_POST['stara']) : null;
$nowa = isset($_POST['nowa']) ? trim($_POST['nowa']) : null;
$result = null;

// 2. walidacja i przetwarzanie parametrów - tylko gdy formularz został wysłany metodą POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ($stara === "") {
		$messages[] = 'Nie podano wartości starej';
	}
	if ($nowa === "") {
		$messages[] = 'Nie podano wartości nowej';
	}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (empty($messages)) {
		// sprawdzenie, czy $stara i $nowa są liczbami
		if (!is_numeric($stara)) {
			$messages[] = 'Wartość stara nie jest liczbą';
		}
		if (!is_numeric($nowa)) {
			$messages[] = 'Wartość nowa nie jest liczbą';
		}

		// sprawdzenie, czy wartość stara nie jest zerem (dzielenie przez zero)
		if (is_numeric($stara) && $stara == 0) {
			$messages[] = 'Wartość stara nie może być zerem';
		}
	}

	// 3. wykonaj zadanie jeśli wszystko w porządku
	if (empty($messages)) { // gdy brak błędów
		//konwersja parametrów na float
		$stara = floatval($stara);
		$nowa = floatval($nowa);

		//wykonanie operacji wzrostu procentowego
		//wzrost procentowy = ((nowa - stara) / stara) * 100%
		$result = (($nowa - $stara) / $stara) * 100;
	}

}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$stara,$nowa,$result)
//   będą dostępne w dołączonym skrypcie
include _ROOT_PATH.'/app/calc_view.php';
