<?php include _ROOT_PATH . '/config.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="<?php echo _APP_URL; ?>../style.css">
</head>
<body>
    <div class="container">
        <button class="logout-btn" onclick="window.location.href='?action=logout'">Wyloguj</button>

        <h1>Kalkulator Wzrostu Procentowego</h1>

        <p>Wzór: ((nowa - stara) / stara) × 100%</p>

        <?php if (count($messages) > 0) { ?>
            <div class="messages">
                <?php foreach ($messages as $msg) { ?>
                    <div class="message"><?php echo out($msg); ?></div>
                <?php } ?>
            </div>
        <?php } ?>

        <form method="POST" class="pure-form pure-form-stacked">
            <div class="form-group">
                <label for="stara">Wartość stara:</label>
                <input type="text" id="stara" name="stara" value="<?php echo out($form['stara'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="nowa">Wartość nowa:</label>
                <input type="text" id="nowa" name="nowa" value="<?php echo out($form['nowa'] ?? ''); ?>" required>
            </div>

            <button type="submit" class="pure-button pure-button-primary">Oblicz</button>
        </form>

        <?php if ($result !== null) { ?>
            <div style="margin-top: 20px; padding: 15px; background-color: #e8f5e9; border: 1px solid #4CAF50; border-radius: 4px;">
                <strong>Wynik: <?php echo out($result); ?>%</strong>
            </div>
        <?php } ?>

        <div class="navigation">
            <a href="?action=inna">Inna chroniona strona</a>
        </div>
    </div>
</body>
</html>