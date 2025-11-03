<?php require_once dirname(__FILE__) .'/../config.php';
// zapewnij domyślne wartości, gdy widok jest otwierany bez kontrolera
if (!isset($messages)) $messages = array();
if (!isset($stara)) $stara = '';
if (!isset($nowa)) $nowa = '';
if (!isset($result)) $result = null;
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator Wzrostu Procentowego</title>
<link rel="stylesheet" href="<?php print(_APP_URL);?>/style.css" />
</head>
<body>

<h2>Kalkulator Wzrostu Procentowego</h2>
<p>Wzór: ((nowa - stara) / stara) × 100%</p>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_stara">Wartość stara: </label>
	<input id="id_stara" type="text" name="stara" value="<?php echo isset($stara) ? htmlspecialchars($stara, ENT_QUOTES, 'UTF-8') : ''; ?>" /><br />
	<label for="id_nowa">Wartość nowa: </label>
	<input id="id_nowa" type="text" name="nowa" value="<?php echo isset($nowa) ? htmlspecialchars($nowa, ENT_QUOTES, 'UTF-8') : ''; ?>" /><br />
	<input type="submit" value="Oblicz" />
</form>    

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (!empty($messages)) {
	echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
	foreach ($messages as $msg) {
		echo '<li>'.htmlspecialchars($msg, ENT_QUOTES, 'UTF-8').'</li>';
	}
	echo '</ol>';
}
?>

<?php if ($result !== null) { ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; width:300px;">
<?php echo 'Wzrost procentowy: '.round($result, 2).'%'; ?>
</div>
<?php } ?>

</body>
</html>