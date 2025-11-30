<?php include _ROOT_PATH . '/config.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chroniona strona</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="<?php echo _APP_URL; ?>../style.css">
</head>
<body>
    <div class="container">
        <button class="logout-btn" onclick="window.location.href='?action=logout'">Wyloguj</button>

        <h1>Inna chroniona strona</h1>

        <p>To jest inna chroniona strona aplikacji internetowej.</p>

        <div class="navigation">
            <a href="?action=calc">Powrót do kalkulatora</a>
        </div>
    </div>
</body>
</html>