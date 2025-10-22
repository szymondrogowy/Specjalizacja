<?php
// Ścieżka do głównego katalogu aplikacji
$app_root = "/path/to/your/app";
define("_APP_ROOT", $app_root);

// Ścieżka systemowa do głównego katalogu aplikacji
$root_path = dirname(__FILE__);
define("_ROOT_PATH", $root_path);

// Główny adres aplikacji
$app_url = "http://localhost".$app_root;
define("_APP_URL", $app_url);

// Funkcja bezpiecznego wyświetlania danych
function out($txt) {
    echo htmlspecialchars($txt);
}

// Dodajemy możliwość dostępu do zmiennej $role w całej aplikacji
global $role;
?>