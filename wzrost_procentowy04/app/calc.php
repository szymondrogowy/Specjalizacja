<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';

use Smarty\Smarty;

// 1. Pobranie parametrów
function getParams(&$form){
	$form['v1'] = isset($_REQUEST['v1']) ? $_REQUEST['v1'] : null;
	$form['v2'] = isset($_REQUEST['v2']) ? $_REQUEST['v2'] : null;
}

// 2. Walidacja
function validate(&$form, &$infos, &$msgs, &$hide_intro){
	if ( ! (isset($form['v1']) && isset($form['v2']))) return false;	
	
	$hide_intro = true;
	$infos [] = 'Przekazano dane do obliczeń.';

	if ( $form['v1'] == "") $msgs [] = 'Nie podano wartości początkowej';
	if ( $form['v2'] == "") $msgs [] = 'Nie podano wartości końcowej';
	
	if ( count($msgs) == 0 ) {
		if (! is_numeric( $form['v1'] )) $msgs [] = 'Wartość początkowa nie jest liczbą';
		if (! is_numeric( $form['v2'] )) $msgs [] = 'Wartość końcowa nie jest liczbą';
		
		// Specyficzna walidacja dla wzrostu procentowego
		if (count($msgs) == 0 && floatval($form['v1']) == 0) {
			$msgs [] = 'Wartość początkowa nie może być zerem (dzielenie przez zero).';
		}
	}
	
	return (count($msgs) > 0) ? false : true;
}
	
// 3. Obliczenia
function process(&$form, &$infos, &$msgs, &$result){
	$infos [] = 'Parametry poprawne. Obliczam procentową zmianę.';
	
	$v1 = floatval($form['v1']);
	$v2 = floatval($form['v2']);
	
	// Wzór: ((V2 - V1) / V1) * 100
	$res = (($v2 - $v1) / abs($v1)) * 100;
	
	// Zaokrąglenie do 2 miejsc po przecinku
	$result = number_format($res, 2, ',', ' ');
}

// Inicjacja zmiennych
$form = null;
$infos = array();
$messages = array();
$result = null;
$hide_intro = false;

getParams($form);
if ( validate($form, $infos, $messages, $hide_intro) ){
	process($form, $infos, $messages, $result);
}

// 4. Przygotowanie Smarty
$smarty = new Smarty();

$smarty->assign('app_url', _APP_URL);
$smarty->assign('root_path', _ROOT_PATH);
$smarty->assign('page_title', 'Kalkulator %');
$smarty->assign('page_description', 'Obliczanie wzrostu lub spadku procentowego.');
$smarty->assign('page_header', 'Wzrost Procentowy');

$smarty->assign('form', $form);
$smarty->assign('result', $result);
$smarty->assign('messages', $messages);
$smarty->assign('infos', $infos);

// 5. Wyświetlenie
$smarty->display(_ROOT_PATH.'/app/calc.html');