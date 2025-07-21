<?php include 'php/redirect_if_logged.php'; ?>

<!DOCTYPE html>
<html lang='fr'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoRide - Connexion</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/login.js" defer></script>
</head>

<?php include 'php/header.php'; ?>

<body>
    <main>
        <h1>Connexion</h1>
        <form id='login-form'>
            <div class="form-section">
                <label for="email">Email :</label>
                <input type='email' name='email' id='email' required>
            </div>
            <div class="form-section">
                <label for="password">Mot de passe :</label>
                <input type='password' name='password' id='password' required>
            </div>
            <div class="form-section">
                <button type='submit'>Se connecter</button>
            </div>
            <a href="register.php">Pas de compte ? Inscrivez-vous</a>
        </form>
    </main>
</body>

</html>