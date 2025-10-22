<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$waluta_z, &$waluta_do, &$kwota){
	$waluta_z = isset($_REQUEST['waluta_z']) ? $_REQUEST['waluta_z'] : null;
	$waluta_do = isset($_REQUEST['waluta_do']) ? $_REQUEST['waluta_do'] : null;
	$kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
}

function validate(&$waluta_z, &$waluta_do, &$kwota, &$messages){
	if ( ! (isset($waluta_z) && isset($waluta_do) && isset($kwota))) {
		return false;
	}

	if ( $kwota == "" || $kwota == null) {
		$messages [] = 'Nie podano kwoty';
	}
	if ( $waluta_z == "") {
		$messages [] = 'Nie wybrano waluty źródłowej';
	}
	if ( $waluta_do == "") {
		$messages [] = 'Nie wybrano waluty docelowej';
	}

	if (count ( $messages ) != 0) return false;

	if (! is_numeric( $kwota )) {
		$messages [] = 'Kwota nie jest liczbą';
	}

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$waluta_z, &$waluta_do, &$kwota, &$messages, &$result, &$kursy){
	global $role;
	
	$kwota = floatval($kwota);
	
	$kursy = pobierzKursy();
	
	if ($kursy === false) {
		$messages [] = 'Błąd pobierania kursów walut';
		return;
	}
	
	if ($waluta_z == $waluta_do) {
		$result = $kwota;
	} else {
		$kwota_pln = $kwota * $kursy[$waluta_z];
		$result = $kwota_pln / $kursy[$waluta_do];
	}
	
	$result = round($result, 2);
}

function pobierzKursy(){
	$url = "https://static.nbp.pl/dane/kursy/xml/lastA.xml";
	$xml = @simplexml_load_file($url);
	
	if ($xml === false) {
		return false;
	}
	
	$wybrane_waluty = ["EUR", "USD", "GBP"];
	$kursy = ["PLN" => 1.0];
	
	foreach($xml->pozycja as $pozycja){
		$kod = (string)$pozycja->kod_waluty;
		$kurs = str_replace(",", ".", (string)$pozycja->kurs_sredni);
		
		if(in_array($kod, $wybrane_waluty)){
			$kursy[$kod] = (float)$kurs;
		}
	}
	
	return $kursy;
}

$waluta_z = null;
$waluta_do = null;
$kwota = null;
$result = null;
$kursy = array();
$messages = array();

getParams($waluta_z, $waluta_do, $kwota);
if ( validate($waluta_z, $waluta_do, $kwota, $messages) ) {
	process($waluta_z, $waluta_do, $kwota, $messages, $result, $kursy);
} else {
	$kursy = pobierzKursy();
}

include 'calc_view.php';
