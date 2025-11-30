<?php include _ROOT_PATH . '/config.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="<?php echo _APP_URL; ?>../style.css">
</head>
<body>
    <div class="container">
        <h1>Logowanie</h1>

        <?php if (count($messages) > 0) { ?>
            <div class="messages">
                <?php foreach ($messages as $msg) { ?>
                    <div class="message"><?php echo out($msg); ?></div>
                <?php } ?>
            </div>
        <?php } ?>

        <form method="POST" class="pure-form pure-form-stacked">
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" id="login" name="login" value="<?php echo out($form['login'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="pass">Hasło:</label>
                <input type="password" id="pass" name="pass" required>
            </div>

            <button type="submit" class="pure-button pure-button-primary">Zaloguj się</button>
        </form>

        <p style="margin-top: 20px; text-align: center; color: #666;">
            Dane testowe:<br>
            Login: admin | Hasło: admin<br>
            Login: user | Hasło: user
        </p>
    </div>
</body>
</html>