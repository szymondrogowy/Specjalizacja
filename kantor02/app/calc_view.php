<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Walut</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Kalkulator Walut</h1>
        <h3>Przelicz <span style="color: blue;">kursy</span> swoich walut!</h3>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Strona główna</a></li>
            <li><a href="index.php">Kursy walut</a></li>
        </ul>
    </nav>

    <main>
    <?php
    $url = "https://static.nbp.pl/dane/kursy/xml/lastA.xml";
    $xml = simplexml_load_file($url);

    if ($xml === false) {
        die("Błąd: nie udało się pobrać kursów NBP.");
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

    echo "<br><h2>Aktualne kursy walut (NBP)</h2>";
    echo "<table border='1'>";

    foreach($xml->pozycja as $pozycja){
        $kod = (string)$pozycja->kod_waluty;
        $kurs = str_replace(",", ".", (string)$pozycja->kurs_sredni);
        if(in_array($kod, $wybrane_waluty)){
            echo "<tr><th>$kod: $kurs PLN</th></tr>";
        }
    }

    echo "</table>";
?>

    </main>

    <div id="kalkulator">
    <h2>Przelicznik walut</h2>
    <div class="kalkulator-form">

    <div class="wymiana">
        <label>Z waluty:</label>
        <select id="waluta_z" name="waluta_z" onchange="przelicz()">
            <option value="PLN">PLN</option>
            <option value="EUR" selected>EUR</option>
            <option value="USD">USD</option>
            <option value="GBP">GBP</option>
        </select>
        <input type="number" id="kwota_z" name="kwota_z" value="0" oninput="przelicz()">
    </div>

    <div class="wymiana">
        <label>Na walutę:</label>
        <select id="waluta_na" name="waluta_na" onchange="przelicz()">
            <option value="PLN" selected>PLN</option>
            <option value="EUR">EUR</option>
            <option value="USD">USD</option>
            <option value="GBP">GBP</option>
        </select>
        <input type="number" id="kwota_na" name="kwota_na" readonly>
    </div>

    <div id="wynik"></div>
    </div>
    </div>

    <script>
        const kursy = <?php echo json_encode($kursy); ?>;

        function przelicz() {
            let waluta_z = document.getElementById("waluta_z").value;
            let waluta_na = document.getElementById("waluta_na").value;
            let kwota_z = parseFloat(document.getElementById("kwota_z").value);

            if (isNaN(kwota_z)) kwota_z = 0;
            let wPLN = kwota_z * kursy[waluta_z];
            let wynik = wPLN / kursy[waluta_na];

            document.getElementById("kwota_na").value = wynik.toFixed(2);
            document.getElementById("wynik").innerText =
                kwota_z + " " + waluta_z + " = " + wynik.toFixed(2) + " " + waluta_na;
        }

        window.onload = przelicz;
    </script>

    <footer>
        <p>Stronę wykonał: Szymon Dróżga</p>
    </footer>
</body>
</html>