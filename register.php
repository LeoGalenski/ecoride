<?php include 'php/redirect_if_logged.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoRide - Inscription</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/register.css">
    <script src="js/register.js" defer></script>
</head>


<?php include 'php/header.php'; ?>

<body>
    <main>
        <h1>Inscription</h1>
        <form id="register-form">
            <div class="form-section">
                <label for="pseudo">Pseudo :</label>
                <input type="text" id="pseudo" required>
            </div>
            <div class="form-section">
                <label for="email">Email :</label>
                <input type="email" id="email" required>
            </div>
            <div class="form-section">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" required>
            </div>
            <div class="form-section">
                <label for="driver"><input type="checkbox" id="chauffeur"> Chauffeur</label>
            </div>
            <div class="form-section">
                <label for="passenger"><input type="checkbox" id="passager"> Passager</label>
            </div>
            <div class="form-section">
                <button type="submit">S'inscrire</button>
            </div>
            <a href="login.php">Déjà inscrit ? Connectez-vous</a>
        </form>
    </main>

</body>

</html>